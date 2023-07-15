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
    public function update(UpsertBorrowRequest $request, Car $car): RedirectResponse
    {
            $car->fill($request->validated());

            $car->save();
            return redirect(route('welcome'))->with('status', __('crud.message.cars.success_car_borrowed'));
    }
}