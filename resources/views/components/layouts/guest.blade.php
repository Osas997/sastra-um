<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ $title }}</title>

  @vite(['resources/sass/app.scss', 'resources/js/app.js'])

  {{-- plugin --}}
  @stack('plugin')

  {{-- custom style --}}
  @stack('style')
</head>

<body>
  {{ $slot }}

  @stack('script')
</body>

</html>