@extends('layouts.default')

@section('content')
<div class="row">
    
    <div class="offset-4 col-4 mt-3 ">

    @if (session('status'))
        <div class="alert alert-danger mb-3" role="alert">
            {{session('status')}}  
        </div>
    @endif

    <h1>Login</h1>

    <form class="p-3 formcontainer border border-2 rounded" action="{{ route('user_login') }}" method="post">
      @csrf
      <div class="mb-3">
        <label for="email" class="form-label">Your email</label>
        <input type="text" class="form-control @error('email') border-danger @enderror" name="email" id="email" value="{{ old('email') }}">

        @error('email')
          <div class="text-danger small mt-2">
            {{ $message }}
          </div>
        @enderror
      </div>
      
      <div class="mb-3">
        <label for="password" class="form-label">Choose password</label>
        <input type="password" class="form-control @error('password') border-danger @enderror" name="password" id="password">

        @error('password')
          <div class="text-danger small mt-2">
            {{ $message }}
          </div>
        @enderror
      </div>

      <button type="submit" class="btn logbtn">Login</button>
    </form>

    <p class="mt-2 small text-muted">Don't have an account? <a href="{{ route('user_create') }}">Create account</a>
</div>
</div>
@endsection