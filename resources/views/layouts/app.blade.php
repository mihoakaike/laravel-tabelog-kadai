<!DOCTYPE html>
<html>
    <head>
        <title>NAGOYAMESHI</title>
        <meta charset="UTF-8">
        <meta name="description" content="店舗一覧ページ">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <!-- Font Awesome -->
        <link href=”https://use.fontawesome.com/releases/v6.0.0/css/all.css” rel=”stylesheet”>
        <script src="https://kit.fontawesome.com/c669828915.js" crossorigin="anonymous"></script>
        <!-- Google Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    </head>

    <body>

    @component('components.header')
      @endcomponent
      @yield('content')
      @component('components.footer')
      @endcomponent

    </body>
</html>