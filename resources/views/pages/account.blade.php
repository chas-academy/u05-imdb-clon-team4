@extends('layouts.default')

@section('content')
  {{-- <h1>Hi {{ auth()->user()->name }}</h1> --}}
  <h1>Hi {{ $user->name }}</h1>
  <p>This page will only show if a user is logged in. Otherwise visitor who navigate to <em>'account'</em> will be redirected to <em>'register'</em> page.</p>
  <section class="lh-lg border border-2 rounded alert-primary border-primary p-3 font-monospace">
    <h3>Some <span class="fw-lighter small">(not so) fun facts</span></h3>
    <p>User <strong>{{ $user->name }}</strong> <span class="small">(ID: <strong>{{ $user->id }}</strong>, Role: <strong>{{-- {{ $user->getRoleNames()[0] }}) --}}</strong></span>, was created <strong>{{ $user->created_at->diffForHumans() }}</strong> and can be reached at <strong><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></strong></p>
  </section>
@include('components.watchlist')
@endsection
