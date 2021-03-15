<!DOCTYPE html>
<html lang="en">
  {{-- Include our header --}}
  @include('layouts.header')
  
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
