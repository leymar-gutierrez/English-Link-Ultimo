@extends('layouts.app')

@section('content')

  {{-- LOGIN DE USUARIO --}}



      <save-image-component :user="{{auth()->user()}}"></save-image-component>
      <profile-component :user="{{auth()->user()}}">
      </profile-component>


@endsection
