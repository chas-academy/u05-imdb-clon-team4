<!DOCTYPE html>
<html lang="en">
  {{-- Include head --}}
  @include('layouts.head')

  <body>
    {{-- Include main navigation --}}
    @include('navigation.main')


    {{-- Yielded content goes here --}}
    <main class="container mt-5 mb-5">
      @yield('content')
    </main>

    {{-- Include static footer --}}
    @include('layouts.footer')
    </body>
</html>
