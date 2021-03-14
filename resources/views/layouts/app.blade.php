<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IMDB Clone</title>
    {{-- Bootstrap --}}
    {{-- Scripts --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- Styles --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
  
  <body>
    {{-- Include our main navigation --}}
    @include('navigation.main')
    
    {{-- We'll use this for dynamic page content
    and add a wrapping section with some padding.
    We can remove this later on if we want side-to-side content --}}
    <div class="container mt-3">
      @yield('content')
    </div>
    
    {{-- Include our static footer --}}
    @include('layouts.footer')
    </body>
</html>
