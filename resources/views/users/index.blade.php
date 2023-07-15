@extends('layouts.app')
@section('css-files')
<link rel="stylesheet" type="text/css" href="{{ asset('css/users.css') }}">
@endsection
@section('content')
<div class="container">
  @include('helpers.flash-messages')
  <div class="row">
    <div class="col-6">
      <h1><i class="fa-solid fa-users"></i> {{ __('crud.users.main.userslist') }}</h1>
    </div>
    <div class="col-6">
      <a class="float-right" href="{{ route('users.create') }}">
      <button type="button" class="btn btn-primary"><i class="fa-solid fa-plus fa-lg"></i></button>
      </a>
    </div>
  </div>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">{{ __('crud.users.main.id') }}</th>
      <th scope="col">{{ __('crud.users.main.email') }}</th>
      <th scope="col">{{ __('crud.users.main.name') }}</th>
      <th scope="col">{{ __('crud.users.main.role') }}</th>
      <th scope="col">{{ __('crud.users.main.action') }}</th>
    </tr>
  </thead>
  <tbody>
  @foreach($users as $user)
    <tr>
      <th scope="row">{{ $user->id }}</th>
      <td>{{ $user->email }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ __('crud.enums.role.'.$user->role) }}</td>
      <td>
        <a href="{{ route('users.edit', $user->id) }}">
          <button class="btn btn-success btn-sm">
            <i class="fa-regular fa-pen-to-square"></i>
          </button>
        </a>
        <button class="btn btn-danger btn-sm delete" data-id="{{ $user->id }}">
          <i class="fa-regular fa-trash-can"></i>
        </button
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
{{ $users->links() }}
</div>
@endsection
@section('javascript')
  const deleteUrl = "{{ url('users') }}/"
  const confirmDelete = " {{ __('crud.message.confirm.users') }}";
@endsection
@section('js-files')
  <script src="{{ asset('js/delete.js') }}"></script>
@endsection