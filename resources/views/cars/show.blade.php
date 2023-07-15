@extends('layouts.app')
@section('css-files')
<link rel="stylesheet" type="text/css" href="{{ asset('css/cars.css') }}">
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('crud.cars.show.viewcar', ['make' => $car->make, 'model' => $car->model]) }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('cars.show', $car->id) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                        <label for="make" class="col-md-4 col-form-label text-md-right">{{ __('crud.cars.main.make') }}</label>

                            <div class="col-md-6">
                                <input id="make" type="text" maxlength="500" class="form-control @error('make') is-invalid @enderror" name="make" value="{{ $car->make }}" disabled>

                                @error('make')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="model" class="col-md-4 col-form-label text-md-right">{{ __('crud.cars.main.model') }}</label>

                            <div class="col-md-6">
                                <input id="model" type="text" maxlength="500" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ $car->model }}" disabled>

                                @error('model')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="body_shape" class="col-md-4 col-form-label text-md-right">{{ __('crud.cars.main.bodyshape') }}</label>

                            <div class="col-md-6">
                                <input id="body_shape" type="text" maxlength="500" class="form-control @error('body_shape') is-invalid @enderror" name="body_shape" value="{{ $car->body_shape }}" disabled>

                                @error('body_shape')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fuel" class="col-md-4 col-form-label text-md-right">{{ __('crud.cars.main.fuel') }}</label>

                            <div class="col-md-6">
                                <input id="fuel" type="text" maxlength="500" class="form-control @error('fuel') is-invalid @enderror" name="fuel" value="{{ __('crud.enums.fuel.'.$car->fuel) }}" disabled>

                                @error('fuel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="transmission" class="col-md-4 col-form-label text-md-right">{{ __('crud.cars.main.transmission') }}</label>

                            <div class="col-md-6">
                                <input id="transmission" type="text" maxlength="500" class="form-control @error('transmission') is-invalid @enderror" name="transmission" value="{{ __('crud.enums.transmission.'.$car->transmission) }}" disabled>

                                @error('transmission')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="engine" class="col-md-4 col-form-label text-md-right">{{ __('crud.cars.main.engine') }}</label>

                            <div class="col-md-6">
                                <input id="engine" type="text" maxlength="500" class="form-control @error('engine') is-invalid @enderror" name="engine" value="{{ $car->engine }}" required autocomplete="engine" disabled>

                                @error('engine')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="engine_capacity" class="col-md-4 col-form-label text-md-right">{{ __('crud.cars.main.enginecapacity') }}</label>

                            <div class="col-md-6">
                                <input id="engine_capacity" type="text" maxlength="500" class="form-control @error('engine_capacity') is-invalid @enderror" name="engine_capacity" value="{{ $car->engine_capacity }}" disabled>

                                @error('engine_capacity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('crud.cars.main.carstatus') }}</label>

                            <div class="col-md-6">
                                <input id="status" type="text" maxlength="500" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ __('crud.enums.status.'.$car->status) }}" disabled>

                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="day_repayment" class="col-md-4 col-form-label text-md-right">{{ __('crud.cars.main.dayrepayment') }}</label>

                            <div class="col-md-6">
                                <input id="day_repayment" type="text" maxlength="500" class="form-control @error('day_repayment') is-invalid @enderror" name="day_repayment" value="{{ $car->day_repayment }}" disabled>

                                @error('day_repayment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rental_date" class="col-md-4 col-form-label text-md-right">{{ __('crud.cars.main.rentaldate') }}</label>

                            <div class="col-md-6">
                                <input id="rental_date" type="date" class="form-control @error('rental_date') is-invalid @enderror" name="rental_date" value="{{ $car->rental_date }}" disabled>

                                @error('rental_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="return_date" class="col-md-4 col-form-label text-md-right">{{ __('crud.cars.main.returndate') }}</label>

                            <div class="col-md-6">
                                <input id="return_date" type="date" class="form-control @error('return_date') is-invalid @enderror" name="return_date" value="{{ $car->return_date }}" disabled>

                                @error('return_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <img src = "{{ asset('storage/'.$car->image_path) }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection