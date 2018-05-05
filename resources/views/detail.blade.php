@extends('layouts.notfooter')
@section('title', 'henry detail')
@section('my-css')
<link rel="stylesheet" href="{{asset('/swiper/css/swiper.min.css')}}">
@endsection
@section('content')
<div class="navbar">
  <a href="javascript:window.history.back();" class="nav-icon"><img src="{{asset('/images/back.png')}}"></a>
  <div class="title">大标题大标题大标题大标题</div>
</div>
<article class="weui-article">
  <h1>大标题</h1>
  <section>
    <h2 class="title">章标题</h2>
    <section>
      <h3>1.1 节标题</h3>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat.
      </p>
      <p>
        <img src="./images/pic_article.png" alt="">
        <img src="./images/pic_article.png" alt="">
      </p>
    </section>
    <section>
      <h3>1.2 节标题</h3>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
    </section>
  </section>
</article>
@endsection
@section('my-js')
<script src="{{asset('/swiper/js/swiper.min.js')}}"></script>
<script>
  var mySwiper = new Swiper ('.swiper-container', {
    //direction: 'vertical',
    autoplay: true,//可选选项，自动滑动
    loop: true,
    // 如果需要分页器
    pagination: {
      el: '.swiper-pagination',
    },

    // 如果需要前进后退按钮
    // navigation: {
    //   nextEl: '.swiper-button-next',
    //   prevEl: '.swiper-button-prev',
    // },

    // 如果需要滚动条
    // scrollbar: {
    //   el: '.swiper-scrollbar',
    // },
  })
  </script>
@endsection
