<!DOCTYPE html>
<html lang="en">
  {{-- Include head --}}
  @include('includes.head')

  <body>
    {{-- Include header --}}
    @include('includes.header')

    {{-- Yielded content goes here --}}
    <main class="container mt-5 mb-5">
      {{-- Dynamic content --}}
      @yield('content')
    </main>

    {{-- Include static footer --}}
    @include('includes.footer')
    </body>
</html>
