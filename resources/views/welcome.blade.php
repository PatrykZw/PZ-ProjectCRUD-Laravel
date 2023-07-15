@extends('layouts.app')
@section('css-files')
<link rel="stylesheet" type="text/css" href="{{ asset('css/welcome.css') }}">
@endsection
@section('content')
<div class="container">
@include('helpers.flash-messages')
              <div class="row">
                <div class="col-md-8 order-md-2 col-lg-12">
                  <div class="container-fluid">
                    <div class="row   mb-5">
                      <?php $accessibleCars = $cars->filter(function ($car) {
                      return $car->return_date < now() || $car->return_date === null;
                      }); ?>
                      <h3 class="mt-0 mb-5">{{ __('crud.welcome.accessiblecarsnumber') }}: <span class="text-primary">{{ $accessibleCars->count() }}</span></h3>
                      <div class="col-12">
                        <div class="dropdown text-md-left text-center float-md-left mb-3 mt-3 mt-md-0 mb-md-0">
                          {{ $cars->links() }}
                        </div>
                        <div class="dropdown float-right">
                        </div>
                      </div>
                    </div>
                    <div class="row" id="cars-wrapper">
                        @foreach($cars as $car)
                      <div class="col-6 col-md-6 col-lg-2 mb-3">
                        <div class="card h-100 border-0">
                          <div class="card-img-top">
                            @if(!is_null($car->image_path))
                            <img src="{{ asset('storage/' . $car->image_path) }}" class="img-fluid mx-auto d-block" alt="Zdjęcie produktu">
                            @else
                            <img src="{{ $defaultImage }}" class="img-fluid mx-auto d-block" alt="Zdjęcie produktu">
                            @endif
                          </div>
                          <div class="card-body text-center">
                            <h4 class="card-title">
                                {{ $car->make }}
                            </h4>
                            <h4 class="card-title">  
                              <i>{{ $car->model }}</i>
                            </h4>
                            <h5 class="card-price small">
                              <i>{{ $car->day_repayment }} {{ __('crud.welcome.perday') }}</i>
                            </h5>
                            <h5 class="card-price small">
                            @if ($car->return_date < now())
                              <i class="green">{{ __('crud.welcome.accessible') }}</i>
                            @else
                              <i class="red">{{ __('crud.welcome.unaccessible') }}</i>
                            @endif
                            </h5>
                          </div>
                          <a href="{{ route('borrow', $car->id) }}">
                            <button class="btn btn-success w-100" data-id="{{ $car->id }}" @guest disabled @endguest>
                              <i class="fas fa-cart-plus"></i> {{ __('crud.welcome.borrow') }}
                            </button>
                          </a>
                        </div>
                      </div>
                      @endforeach
                    </div>
                    <div class="row sorting mb-5 mt-5">
                      <div class="col-12">
                        <div class="dropdown float-md-right">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
@endsection
@section('javascript')
  const WELCOME_DATA = {
    storagePath: '{{ asset('storage') }}/',
    defaultImage: '{{ $defaultImage }}',
    addToCart: '{{ url('cart') }}/',
    listCart: '{{ url('cart') }}',
    isGuest: '{{ $isGuest }}'
  }
@endsection
@section('js-files')
  <script src="{{ asset('js/welcome.js') }}"></script>
@endsection