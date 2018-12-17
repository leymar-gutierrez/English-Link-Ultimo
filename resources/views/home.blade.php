@extends('layouts.app')

@section('content')

  {{-- LOGIN DE USUARIO --}}

<save-image-component :user="{{auth()->user()}}"></save-image-component>

<my-course-component>
</my-course-component>
@endsection
