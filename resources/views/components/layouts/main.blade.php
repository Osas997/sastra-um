<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ $title }}</title>

  @vite(['resources/sass/app.scss', 'resources/js/app.js'])

  {{-- custom style --}}
  @stack('style')
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
  {{ $slot }}

  {{-- plugin --}}
  @stack('plugin')

  @stack('script')
</body>

</html>