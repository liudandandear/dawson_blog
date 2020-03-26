<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PHP面试网</title>
    <meta name="description" content="PHP面试网"/>
    <meta name="keyword" content="PHP面试网"/>

    <!-- Styles -->
    <link href="{{ asset('web/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('web/css/semantic.min.css') }}">
    @yield('styles')
</head>

<body>
<div id="app" class="{{ route_class() }}-page">

    @include('web.layouts._header')

    <div class="container">
        @include('web.layouts._message')
        @yield('content')
        <div class="ui divider"></div>

    </div>

    @include('web.layouts._footer')
</div>

<!-- Scripts -->
<script src="{{ asset('web/js/app.js') }}"></script>
<script src="{{ asset('web/js/semantic.min.js')}}"></script>
@yield('scripts')

<script type="text/javascript">
    //百度统计
    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?84409055f1221299ffd6056602cd2268";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
</body>
</html>
