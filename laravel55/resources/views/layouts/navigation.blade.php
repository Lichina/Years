<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lich</title>
    <link rel="stylesheet" href="{{url('private/navigation/css/index.css')}}">
    <link rel="stylesheet" href="{{url('private/auth/css/register.css')}}">
    <script src="{{url('/jquery/jquery-1.12.4.min.js')}}"></script>
</head>
<body>
{{--背景图片--}}
<div class="background-images" id="img">
    <ul></ul>
</div>
{{--导航--}}
<div class="head_navigation">
    <div class="navigation">
        <ul class="main_navigation">
            <li class="li_navigation"><a href="#">首页</a></li>
            <li class="li_navigation"><a href="#">文章</a></li>
            <li class="li_navigation"><a href="#">图片</a></li>


            <li class="user_li"><a href="#">注册</a></li>
            <li class="user_li"><a href="#">登录</a></li>
        </ul>
    </div>
</div>
{{--<div>--}}
    {{--<p class="center-code" id="center-code">--}}
        {{--代码改变世界--}}
    {{--</p>--}}
{{--</div>--}}
{{--<div class="search">--}}
    {{--<form action="{{url('search')}}" method="get">--}}
        {{--<input type="text" placeholder="搜索你不会的" name="search" autocomplete="off">--}}
    {{--</form>--}}
{{--</div>--}}
@yield('content')
</body>
{{--<script>--}}

    {{--//    字体淡入--}}
    {{--$(document).ready(function(){--}}
        {{--$("#center-code").fadeIn(6000);--}}
    {{--});--}}
{{--</script>--}}
</html>