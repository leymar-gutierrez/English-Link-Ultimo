@extends('panel.app')
@section('content')
      <div id="app">
            <avatar-vue>
            </avatar-vue>
            <save-image-component :user="{{auth()->user()}}"></save-image-component>
            <profile-component :user="{{auth()->user()}}">
            </profile-component>
      </div>
@endsection
