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
use App\Enums\Car\Audi;
use App\Enums\Car\ModelBMW;
use App\Enums\Car\BodyShape;
use App\Enums\Car\Fuel;
use App\Enums\Car\Transmission;
use App\Enums\Car\Status;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     */
    public function create(): View
    {
        try {
            return view("cars.create", [
                'carmake' => Make::TYPES,
                'Audi' => Audi::TYPES,
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