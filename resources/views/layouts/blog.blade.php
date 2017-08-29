<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token (security) -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'WATCHBLOG') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body id="app">
  @include('include.navbar')
  <main class="main-content container">
      @include('include.messages')
      @yield('content')
  </main>
  @include('include.footer')

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
  <script>
      CKEDITOR.replace( 'article-ckeditor' );
      // CK EDITOR (forms) https://docs.ckeditor.com/#!/guide/dev_installation
  </script>

</body>
</html>
