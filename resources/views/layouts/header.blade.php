<!DOCTYPE HTML>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Boobkers</title>
  <!-- cssをインポート -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
  @yield('content')
  <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>