<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpsertCarRequest;
use App\Models\Car;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Throwable;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Enums\Car\Make;
use App\Enums\Car\BodyShape;
use App\Enums\Car\Fuel;
use App\Enums\Car\Transmission;
use App\Enums\Car\Status;
use OpenApi\Annotations as OA;

    /**
    * @OA\OpenApi(
    *   @OA\Info(
    *     title="ProjectCRUD",
    *     version="1.0.0",
    *     description="API documentation for the ProjectCRUD application."
    *   ),
    * )
    */
class CarController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *      path="/cars",
     *      operationId="indexCars",
     *      tags={"Cars"},
     *      summary="Get list of cars",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal server error",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="message", type="string", example="Internal server error")
     *          )
     *      )
     * )
     */
    public function index(): View
    {
        try {
            return view("cars.index", [
                'cars' => Car::paginate(10)
            ]);
        } catch (Throwable $e) {
            // Obsługa błędu
            abort(500, 'Wystąpił błąd');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *      path="/cars/create",
     *      operationId="createCar",
     *      tags={"Cars"},
     *      summary="Show the form for creating a new car",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="carmake", type="array", @OA\Items(type="string", enum={"Audi", "BMW", "Ford", "Jaguar", "Kia", "Land Rover", "Lexus", "Mercedes Benz", "MINI", "Nissan", "SEAT", "Skoda", "Toyota", "Vauxhall", "Volkswagen", "Volvo"})),
     *              @OA\Property(property="carbodyshape", type="array", @OA\Items(type="string", enum={"Combi", "Covertible", "Coupe", "Estate", "Hatchback", "MPV", "Saloon", "Sedan", "SUV"})),
     *              @OA\Property(property="carfuel", type="array", @OA\Items(type="string", enum={"Electric", "Hybrid", "Petrol", "Oil"})),
     *              @OA\Property(property="cartransmission", type="array", @OA\Items(type="string", enum={"Manual", "Automatic"})),
     *              @OA\Property(property="carstatus", type="array", @OA\Items(type="string", enum={"Fabric", "Modified"}))
     *          )
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal server error",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="message", type="string", example="Internal server error")
     *          )
     *      )
     * )
     */
    public function create(): View
    {
        try {
            return view("cars.create", [
                'carmake' => Make::TYPES,
                'carbodyshape' => BodyShape::TYPES,
                'carfuel' => Fuel::TYPES,
                'cartransmission' => Transmission::TYPES,
                'carstatus' => Status::TYPES
            ]);
        } catch (Throwable $e) {
            // Obsługa błędu
            abort(500, 'Wystąpił błąd');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UpsertCarRequest  $request
     * @return RedirectResponse
     *
     * @OA\Post(
     *      path="/cars",
     *      operationId="storeCar",
     *      tags={"Cars"},
     *      summary="Store a newly created car in storage",
     *      @OA\RequestBody(
     *          @OA\JsonContent(ref="#/components/schemas/UpsertCarRequest")
     *      ),
     *      @OA\Response(
     *          response=302,
     *          description="Successful operation - Redirect to index",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="status", type="string", example="Success")
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Validation error",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="errors", type="object")
     *          )
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal server error",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="message", type="string", example="Internal server error")
     *          )
     *      )
     * )
     */
    public function store(UpsertCarRequest $request): RedirectResponse
    {
        $car = new Car($request->all());

        //if ($request->hasFile('image')) {
        $car->image_path = $request->file('image')->store('cars');
        //

        $car->save();

        return redirect(route('cars.index'))->with('status', __('crud.message.cars.success_car_stored'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Car  $car
     * @return View
     * 
     * @OA\Get(
     *     path="/cars/{car}",
     *     operationId="showCar",
     *     tags={"Cars"},
     *     summary="Display the specified car",
     *     @OA\Parameter(
     *         name="car",
     *         in="path",
     *         description="ID of the car to show",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Car not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Car not found")
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
    public function show(Car $car): View
    {
        try {
            return view("cars.show", [
                'car' => $car,
                'carmake' => Make::TYPES,
                'carbodyshape' => BodyShape::TYPES,
                'carfuel' => Fuel::TYPES,
                'cartransmission' => Transmission::TYPES,
                'carstatus' => Status::TYPES
            ]);
        } catch (Throwable $e) {
            // Obsługa błędu
            abort(500, 'Wystąpił błąd');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Car  $car
     * @return View
     * 
     * @OA\Get(
     *     path="/cars/edit/{car}",
     *     operationId="editCar",
     *     tags={"Cars"},
     *     summary="Show the form for editing the specified car",
     *     @OA\Parameter(
     *         name="car",
     *         in="path",
     *         description="ID of the car to edit",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="carmake", type="array", @OA\Items(type="string", enum={"Audi", "BMW", "Ford", "Jaguar", "Kia", "Land Rover", "Lexus", "Mercedes Benz", "MINI", "Nissan", "SEAT", "Skoda", "Toyota", "Vauxhall", "Volkswagen", "Volvo"})),
     *             @OA\Property(property="carbodyshape", type="array", @OA\Items(type="string", enum={"Combi", "Covertible", "Coupe", "Estate", "Hatchback", "MPV", "Saloon", "Sedan", "SUV"})),
     *             @OA\Property(property="carfuel", type="array", @OA\Items(type="string", enum={"Electric", "Hybrid", "Petrol", "Oil"})),
     *             @OA\Property(property="cartransmission", type="array", @OA\Items(type="string", enum={"Automatic", "Manual"})),
     *             @OA\Property(property="carstatus", type="array", @OA\Items(type="string", enum={"Fabric", "Modified"}))
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Car not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Car not found")
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
    public function edit(Car $car): View
    {
        try {
            return view("cars.edit", [
                'car' => $car,
                'carmake' => Make::TYPES,
                'carbodyshape' => BodyShape::TYPES,
                'carfuel' => Fuel::TYPES,
                'cartransmission' => Transmission::TYPES,
                'carstatus' => Status::TYPES
            ]);
        } catch (Throwable $e) {
            abort(500, 'Wystąpił błąd');
        }
    }

    public function modify(Car $car): View
    {
        try {
            return view("cars.modify", [
                'car' => $car,
                'carmake' => Make::TYPES,
                'carbodyshape' => BodyShape::TYPES,
                'carfuel' => Fuel::TYPES,
                'cartransmission' => Transmission::TYPES,
                'carstatus' => Status::TYPES
            ]);
        } catch (Throwable $e) {
            // Obsługa błędu
            abort(500, 'Wystąpił błąd');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpsertCarRequest  $request
     * @param  Car  $car
     * @return RedirectResponse
     * 
     *     *@OA\Post(
     *     path="/cars/{car}",
     *     operationId="updateCar",
     *     tags={"Cars"},
     *     summary="Update the specified car in storage",
     *     @OA\Parameter(
     *         name="car",
     *         in="path",
     *         description="ID of the car to update",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\RequestBody(
     *         @OA\JsonContent(ref="#/components/schemas/UpsertCarRequest")
     *     ),
     *     @OA\Response(
     *         response=302,
     *         description="Successful operation - Redirect to cars.index",
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
    public function update(UpsertCarRequest $request, Car $car): RedirectResponse
    {
        try {
            $oldImagePath = $car->image_path;
            $car->fill($request->validated());

            if ($request->hasFile('image')) {
                if (Storage::exists($oldImagePath)) {
                    Storage::delete($oldImagePath);
                }
                $car->image_path = $request->file('image')->store('cars');
            }

            $car->save();

            return redirect(route('cars.index'))->with('status', __('crud.message.cars.success_car_updated'));
        } catch (Throwable $e) {
            // Obsługa błędu
            return Redirect::back()->withErrors(['error' => __('cars.message.error_occurred')]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Car  $car
     * @return JsonResponse
     * 
     * @OA\Delete(
     *     path="/cars/{car}",
     *     operationId="destroyCar",
     *     tags={"Cars"},
     *     summary="Remove the specified car from storage",
     *     @OA\Parameter(
     *         name="car",
     *         in="path",
     *         description="ID of the car to delete",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="string", example="Success")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Car not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Car not found")
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
    public function destroy(Car $car): JsonResponse
    {
        try {
            $car->delete();
            Session::flash('status', __('crud.message.cars.success_car_deleted'));
            return response()->json([
                'status' => 'success',
            ]);
        } catch (Throwable $e) {
            // Obsługa błędu
            return response()->json([
                'status' => 'error',
                'message' => __('cars.message.error_occurred')
            ])->setStatusCode(500);
        }
    }

    /**
     * Download image of the specified resource in storage.
     *
     * @param  Car  $car
     * @return RedirectResponse|StreamedResponse
     * 
     * @OA\Get(
     *     path="/cars/{car}/download",
     *     operationId="downloadCarImage",
     *     tags={"Cars"},
     *     summary="Download image of the specified car from storage",
     *     @OA\Parameter(
     *         name="car",
     *         in="path",
     *         description="ID of the car to download image from",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation - Download the car image",
     *         @OA\MediaType(
     *             mediaType="image/jpeg",
     *             @OA\Schema(type="string", format="binary")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Car not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Car not found")
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
    public function downloadImage(Car $car)
    {
        try {
            if (Storage::exists($car->image_path)) {
                return Storage::download($car->image_path);
            }

            return Redirect::back()->withErrors(['error' => __('cars.message.error_occurred')]);
        } catch (Throwable $e) {
            // Obsługa błędu
            return Redirect::back()->withErrors(['error' => __('cars.message.error_occurred')]);
        }
    }
}