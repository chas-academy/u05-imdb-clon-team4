@extends('layouts.default')

@section('content')
<div class="row">
  <div class="offset-4 col-4 mt-3 ">

  <h1>Create account</h1>

    <form class="p-3 formcontainer border border-2 rounded" action="{{ route('user_create') }}" method="post">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Your name</label>
        <input type="text" class="form-control @error('name') border-danger @enderror" name="name" id="name" value="{{ old('name') }}">

        @error('name')
          <div class="text-danger small mt-2">
            {{ $message }}
          </div>
        @enderror
      </div>
      
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
      
      <div class="mb-3">
        <label for="password_confirmation" class="form-label">Repeat password</label>
        <input type="password" class="form-control @error('password_confirmation') border-danger @enderror" name="password_confirmation" id="password_confirmation">

        @error('password_confirmation')
          <div class="text-danger small mt-2">
            {{ $message }}
          </div>
        @enderror
      </div>
      
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" name="accept-user-terms" id="accept-user-terms">
        <label class="form-check-label" for="accept-user-terms">I accept the <button type="button" class="btn p-0 btn-link" data-toggle="modal" data-target="#user-terms-modal">terms</button>
        </label>

        @error('accept-user-terms')
        <div class="text-danger small mt-2">
         You must accept the user terms
        </div>
      @enderror
      </div>

      <button type="submit" class="btn logbtn">Create account</button>
    </form>
    
    <p class="mt-2 small text-muted">Already have an account? <a href="{{ route('user_login') }}">Login</a>
  </div>
</div>

<div class="modal fade" id="user-terms-modal" tabindex="-1" role="dialog" aria-labelledby="modal-label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
        <h4 class="modal-title" id="modal-label">
          {{-- {{$test->someTitle}} --}}
          Title
        </h4>
      </div>
      
      <div class="modal-body">
        {{-- {{$test->someField}} --}}
        Body content
      </div>

      <div class="modal-footer">        
        <button type="button" class="btn btn-default" data-dismiss="modal">
          Close
        </button>
      </div>

    </div>
  </div>
</div>
@endsection