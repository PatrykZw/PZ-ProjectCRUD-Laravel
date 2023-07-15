@extends('layouts.app')
@section('css-files')
<link rel="stylesheet" type="text/css" href="{{ asset('css/borrow.css') }}">
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('crud.welcome.borrowed', ['make' => $car->make, 'model' => $car->model]) }}</div>

                <div class="card-body">
                <form method="POST" action="{{ route('borrow.update', $car->id) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                        <label for="make" class="col-md-4 col-form-label text-md-right">{{ __('crud.cars.main.make') }}</label>

                            <div class="col-md-6">
                                <input id="make" type="text" maxlength="500" class="form-control @error('make') is-invalid @enderror" name="make" value="{{ $car->make }}" readonly>

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
                                <input id="model" type="text" maxlength="500" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ $car->model }}" readonly>

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
                                <input id="body_shape" type="text" maxlength="500" class="form-control @error('body_shape') is-invalid @enderror" name="body_shape" value="{{ $car->body_shape }}" readonly>

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
                                <input id="fuel" type="text" maxlength="500" class="form-control @error('fuel') is-invalid @enderror" name="fuel" value="{{ $car->fuel }}" readonly>

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
                                <input id="transmission" type="text" maxlength="500" class="form-control @error('transmission') is-invalid @enderror" name="transmission" value="{{ $car->transmission }}" readonly>

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
                                <input id="engine" type="text" maxlength="500" class="form-control @error('engine') is-invalid @enderror" name="engine" value="{{ $car->engine }}" required autocomplete="engine" readonly>

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
                                <input id="engine_capacity" type="text" maxlength="500" class="form-control @error('engine_capacity') is-invalid @enderror" name="engine_capacity" value="{{ $car->engine_capacity }}" readonly>

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
                                <input id="status" type="text" maxlength="500" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ $car->status }}" readonly>

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
                                <input id="day_repayment" type="text" maxlength="500" class="form-control @error('day_repayment') is-invalid @enderror" name="day_repayment" value="{{ $car->day_repayment }}" readonly>

                                @error('day_repayment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rental_date" class="col-md-4 col-form-label text-md-right">Rental date</label>

                            <div class="col-md-6">
                                <input id="rental_date" type="date" class="form-control @error('rental_date') is-invalid @enderror" name="rental_date" readonly>

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
                                <input id="return_date" type="date" class="form-control @error('return_date') is-invalid @enderror" name="return_date" value="{{ $car->return_date }}">

                                @error('return_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sum_cost" class="col-md-4 col-form-label text-md-right">{{ __('crud.cars.main.allcost') }}</label>
                            <div class="col-md-6 d-flex align-items-center">
                                <span id="sum_cost">0</span> zł
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                {{ __('crud.button.borrowed') }}
                                </button>
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
@section('js-files')
  <script src="{{ asset('js/welcome.js') }}"></script>
@endsection