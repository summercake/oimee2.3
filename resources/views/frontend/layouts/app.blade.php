<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Token --}}
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="description" content="@yield('description', 'LaraBBS 爱好者社区')" />
    {{-- Title --}}
    <title>@yield('title', 'Oimee') - 欧米</title>
    {{-- Style --}}
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
<div id="app" class="container-fluid {{ route_class() }}-page">
    @include('frontend.layouts._header')
    @yield('content')
    <div style="height: 230px; width: 100%; background: none;"></div>
    @include('frontend.layouts._footer')
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('/js/font-awesome.js') }}"></script>
@yield('scripts')
</body>
</html>