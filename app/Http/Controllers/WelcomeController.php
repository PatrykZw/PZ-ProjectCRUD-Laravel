<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpsertBorrowRequest;
use App\Enums\Car\BodyShape;
use App\Enums\Car\Make;
use App\Models\Car;
use Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Throwable;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View|JsonResponse
     *
     * @OA\Get(
     *     path="/",
     *     operationId="indexWelcome",
     *     tags={"Welcome"},
     *     summary="Display a listing of cars",
     *     @OA\Parameter(
     *         name="filter[day_repayment_min]",
     *         in="query",
     *         description="Minimum day repayment",
     *         @OA\Schema(type="number", format="double")
     *     ),
     *     @OA\Parameter(
     *         name="filter[day_repayment_max]",
     *         in="query",
     *         description="Maximum day repayment",
     *         @OA\Schema(type="number", format="double")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="defaultImage", type="string"),
     *             @OA\Property(property="isGuest", type="boolean")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Internal server error")
     *         )
     *     )
     * )
     */
    public function index(Request $request)
    {
        $filters = $request->query('filter');
        $paginate = 12;
        $query = Car::query();
        
        if (!is_null($filters)) {
            if (!is_null($filters['day_repayment_min'])) {
                $query = $query->where('day_repayment', '>=', $filters['day_repayment_min']);
            }
            if (!is_null($filters['day_repayment_max'])) {
                $query = $query->where('day_repayment', '<=', $filters['day_repayment_max']);
            }
            if ($request->wantsJson()) {
                return response()->json($query->paginate($paginate));
            }
        }

        return view("welcome", [
            'cars' => $query->paginate($paginate),
            'defaultImage' => config('projectcrud.defaultImage'),
            'isGuest' => Auth::guest()
        ]);
    }

    /**
     * Borrow a car.
     *
     * @param  Car  $car
     * @return View
     *
     * @OA\Get(
     *     path="/borrow/{car}",
     *     operationId="borrowCar",
     *     tags={"Welcome"},
     *     summary="Borrow a car",
     *     @OA\Parameter(
     *         name="car",
     *         in="path",
     *         description="ID of the car to borrow",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="carmake", type="array", @OA\Items(type="string", enum={"Audi", "BMW"})),
     *             @OA\Property(property="carbodyshape", type="array", @OA\Items(type="string", enum={"Sedan", "SUV"}))
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Internal server error")
     *         )
     *     )
     * )
     */
    public function borrow(Car $car): View
    {
        try {
            return view("borrow", [
                'car' => $car,
                'carmake' => Make::TYPES,
                'carbodyshape' => BodyShape::TYPES
            ]);
        } catch (Throwable $e) {
            // Obsługa błędu
            abort(500, 'Wystąpił błąd');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpsertBorrowRequest  $request
     * @param  Car  $car
     * @return RedirectResponse
     *
     * @OA\Post(
     *     path="/borrow/{car}",
     *     operationId="updateBorrow",
     *     tags={"Welcome"},
     *     summary="Update the specified resource in storage",
     *     @OA\Parameter(
     *         name="car",
     *         in="path",
     *         description="ID of the car to update",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\RequestBody(
     *         @OA\JsonContent(ref="#/components/schemas/UpsertBorrowRequest")
     *     ),
     *     @OA\Response(
     *         response=302,
     *         description="Successful operation - Redirect to welcome",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="string", example="Success")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="errors", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Internal server error")
     *         )
     *     )
     * )
     */
    public function update(UpsertBorrowRequest $request, Car $car): RedirectResponse
    {
        $car->fill($request->validated());

            $car->save();
            return redirect(route('welcome'))->with('status', __('crud.message.cars.success_car_borrowed'));
    }
}
