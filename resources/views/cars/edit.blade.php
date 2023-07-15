@extends('layouts.app')
@section('css-files')
<link rel="stylesheet" type="text/css" href="{{ asset('css/cars.css') }}">
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('crud.cars.edit.editcar', ['make' => $car->make, 'model' => $car->model]) }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('cars.update', $car->id) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                        <label for="make" class="col-md-4 col-form-label text-md-right">{{ __('crud.cars.main.make') }}</label>

                            <div class="col-md-6">
                                <select id="make" class="form-control @error('make') is-invalid @enderror" name="make" required autofocus>
                                    @foreach($carmake as $make)
                                        <option value="{{ $make }}" @if($car->make == $make)selected @endif>{{ $make }}</option>
                                    @endforeach
                                </select>

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
                                <input id="model" type="text" maxlength="500" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ $car->model }}" required autocomplete="model" autofocus>

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
                                <select id="body_shape" class="form-control @error('body_shape') is-invalid @enderror" name="body_shape" required autofocus>
                                    @foreach($carbodyshape as $body_shape)
                                        <option value="{{ $body_shape }}" @if($car->body_shape == $body_shape)selected @endif>{{ $body_shape }}</option>
                                    @endforeach
                                </select>

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
                                <select id="fuel" class="form-control @error('fuel') is-invalid @enderror" name="fuel" required autofocus>
                                    @foreach($carfuel as $fuel)
                                        <option value="{{ $fuel }}" @if($car->fuel == $fuel)selected @endif>{{ __('crud.enums.fuel.'.$fuel) }}</option>
                                    @endforeach
                                </select>

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
                                <select id="transmission" class="form-control @error('transmission') is-invalid @enderror" name="transmission" required autofocus>
                                    @foreach($cartransmission as $transmission)
                                        <option value="{{ $transmission }}" @if($car->transmission == $transmission)selected @endif>{{ __('crud.enums.transmission.'.$transmission) }}</option>
                                    @endforeach
                                </select>

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
                                <input id="engine" type="text" maxlength="500" class="form-control @error('engine') is-invalid @enderror" name="engine" value="{{ $car->engine }}" required autocomplete="engine" autofocus>

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
                                <input id="engine_capacity" type="text" maxlength="500" class="form-control @error('engine_capacity') is-invalid @enderror" name="engine_capacity" value="{{ $car->engine_capacity }}" required autocomplete="engine_capacity" autofocus>

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
                                <select id="status" class="form-control @error('status') is-invalid @enderror" name="status" required autofocus>
                                    @foreach($carstatus as $status)
                                        <option value="{{ $status }}" @if($car->status == $status)selected @endif>{{ __('crud.enums.status.'.$status) }}</option>
                                    @endforeach
                                </select>

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
                                <input id="day_repayment" type="text" maxlength="500" class="form-control @error('day_repayment') is-invalid @enderror" name="day_repayment" value="{{ $car->day_repayment }}" required autocomplete="day_repayment" autofocus>

                                @error('day_repayment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('crud.cars.main.image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                {{ __('crud.button.save') }}
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