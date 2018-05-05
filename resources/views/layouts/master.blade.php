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
    <div class="page">
      <div class="weui-tab">
        <div class="weui-tab__panel">
          @yield('content')
        </div>
        <div class="weui-tabbar">
          <a href="javascript:;" class="weui-tabbar__item weui-bar__item_on">
            <span style="display: inline-block;position: relative;">
              <img src="./images/icon_tabbar.png" alt="" class="weui-tabbar__icon">
              <span class="weui-badge" style="position: absolute;top: -2px;right: -13px;">8</span>
            </span>
            <p class="weui-tabbar__label">微信</p>
          </a>
          <a href="javascript:;" class="weui-tabbar__item">
            <img src="./images/icon_tabbar.png" alt="" class="weui-tabbar__icon">
            <p class="weui-tabbar__label">通讯录</p>
          </a>
          <a href="javascript:;" class="weui-tabbar__item">
            <span style="display: inline-block;position: relative;">
              <img src="./images/icon_tabbar.png" alt="" class="weui-tabbar__icon">
              <span class="weui-badge weui-badge_dot" style="position: absolute;top: 0;right: -6px;"></span>
            </span>
            <p class="weui-tabbar__label">发现</p>
          </a>
          <a href="javascript:;" class="weui-tabbar__item">
            <img src="./images/icon_tabbar.png" alt="" class="weui-tabbar__icon">
            <p class="weui-tabbar__label">我</p>
          </a>
        </div>
      </div>
    </div>
  </div>
  <script src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
  <script src="https://res.wx.qq.com/open/libs/weuijs/1.0.0/weui.min.js"></script>
  <!-- <script src="{{asset('/weui/example.js')}}"></script> -->
  <script type="text/javascript">
  $(function(){
    $('.weui-tabbar__item').on('click', function () {
      $(this).addClass('weui-bar__item_on').siblings('.weui-bar__item_on').removeClass('weui-bar__item_on');
    });
  });
</script>
@yield('my-js')
</body>
</html>
