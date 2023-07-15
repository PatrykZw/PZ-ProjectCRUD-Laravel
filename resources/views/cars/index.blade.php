@extends('layouts.app')
@section('css-files')
<link rel="stylesheet" type="text/css" href="{{ asset('css/cars.css') }}">
@endsection
@section('content')
<div class="container">
  @include('helpers.flash-messages')
  <div class="row">
    <div class="col-6">
      <h1><i class="fa-sharp fa-solid fa-clipboard-list"></i> {{ __('crud.cars.main.carslist') }}</h1>
    </div>
    <div class="col-6">
      <a class="float-right" href="{{ route('cars.create') }}">
      <button type="button" class="btn btn-primary"><i class="fa-solid fa-plus fa-lg"></i></button>
      </a>
    </div>
  </div>
  <div class="row">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">{{ __('crud.cars.main.id') }}</th>
          <th scope="col">{{ __('crud.cars.main.make') }}</th>
          <th scope="col">{{ __('crud.cars.main.model') }}</th>
          <th scope="col">{{ __('crud.cars.main.bodyshape') }}</th>
          <th scope="col">{{ __('crud.cars.main.dayrepayment') }}</th>
          <th scope="col">{{ __('crud.cars.main.rentaldate') }}</th>
          <th scope="col">{{ __('crud.cars.main.returndate') }}</th>
          <th scope="col">{{ __('crud.cars.main.action') }}</th>
        </tr>
      </thead>
      <tbody>
      @foreach($cars as $car)
        <tr>
          <th scope="row">{{ $car->id }}</th>
          <td>{{ $car->make }}</td>
          <td>{{ $car->model }}</td>
          <td>{{ $car->body_shape }}</td>
          <td>{{ $car->day_repayment }}</td>
          <td>{{ $car->rental_date }}</td>
          <td>{{ $car->return_date }}</td>
          <td>
            <a href="{{ route('cars.show', $car->id) }}">
              <button class="btn btn-primary btn-sm">
              <i class="fa-solid fa-magnifying-glass"></i>
              </button>
            </a>
            <a href="{{ route('cars.edit', $car->id) }}">
              <button class="btn btn-success btn-sm">
              <i class="fa-regular fa-pen-to-square"></i>
              </button>
            </a>
            <a href="{{ route('cars.modify', $car->id) }}">
              <button class="btn btn-success btn-sm">
              <i class="fa-sharp fa-solid fa-screwdriver-wrench"></i>
              </button>
            </a>
            <button class="btn btn-danger btn-sm delete" data-id="{{ $car->id }}" data-name="{{ $car->id }}">
              <i class="fa-regular fa-trash-can"></i>
            </button>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
{{ $cars->links() }}
</div>
@endsection
@section('javascript')
  const deleteUrl = "{{ url('cars') }}/"
  const confirmDelete = " {{ __('crud.message.confirm.cars') }}";
@endsection
@section('js-files')
  <script src="{{ asset('js/delete.js') }}"></script>
@endsection