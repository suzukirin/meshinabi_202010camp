<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>めしナビ - @yield('title'){{-- ビュー毎に異なる部分 --}}</title>
    <script src="{{ asset('js/app.js')}}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @include('layouts.header')
    <div class="container">
        {{-- ビュー毎に異なる部分 --}}
        @yield('content')
    </div>  
</body>
</html>
