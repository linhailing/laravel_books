<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{config('app.name')}}-@yield('title')</title>
  <link rel="stylesheet" href="{{asset('/weui/weui.css')}}">
  <!-- <link rel="stylesheet" href="{{asset('/weui/example.css')}}"> -->
  @yield('my-css')
  <link rel="stylesheet" href="{{asset('/css/home_custom.css')}}">
  <script src="{{asset('/js/jquery-3.3.1.min.js')}}"></script>
</head>
<body ontouchstart>
  <div class="container" id="container">
    @yield('content')
  </div>
  <script src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
  <script src="https://res.wx.qq.com/open/libs/weuijs/1.0.0/weui.min.js"></script>
@yield('my-js')
</body>
</html>
