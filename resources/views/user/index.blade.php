@extends('layouts.app')

@section('content')
  <h1>Hi {{ auth()->user()->name }}</h1>
  <p>This page will only show if a user is logged in. Otherwise visitor will be redirected to create account page.</p>
@endsection