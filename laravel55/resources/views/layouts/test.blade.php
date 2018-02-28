<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lich</title>
</head>
<style type="text/css">
    *{margin:0;padding:0;list-style-type:none;}
    a,img{border:0;}
    body{font:12px/180% Arial, Helvetica, sans-serif, "新宋体";}
    /* flash */
    .flash{width:395px;height:511px;overflow:hidden;position:relative;margin:20px auto;}
    .flash li{position:absolute;left:0;top:0;width:395px;height:511px;}
</style>
<body>
<div class="flash">
    <ul>
        <li><a href="#"><img width="395" height="511" alt="美女" src="{{url('/private/navigation/images/1.jpg')}}" /></a></li>
        <li><a href="#"><img width="395" height="511" alt="美女" src="{{url('/private/navigation/images/2.jpg')}}" /></a></li>
        <li><a href="#"><img width="395" height="511" alt="美女" src="{{url('/private/navigation/images/3.jpg')}}" /></a></li>
        <li><a href="#"><img width="395" height="511" alt="美女" src="{{url('/private/navigation/images/2.jpg')}}" /></a></li>
    </ul>
</div>
<script type="text/javascript" src="{{url('/jquery/jquery-1.4.2.min.js')}}"></script>

<script type="text/javascript">
    //图片简单切换调用语句 imgtransition({speed: 3000, animate: 1000});
    $.fn.imgtransition = function(o){
        var defaults = {
            speed : 5000,
            animate : 1000
        };
        o = $.extend(defaults, o);

        return this.each(function(){
            var arr_e = $("li", this);
            arr_e.css({position: "absolute"});
            arr_e.parent().css({margin: "0", padding: "0", "list-style": "none", overflow: "hidden"});

            function shownext(){
                var active = arr_e.filter(".active").length ? arr_e.filter(".active") : arr_e.first();
                var next =  active.next().length ? active.next() : arr_e.first();
                active.css({"z-index": 9});
                next.css({opacity: 0.0, "z-index": 10}).addClass('active').animate({opacity: 1.0}, o.animate, function(){
                    active.removeClass('active').css({"z-index": 8});
                });
            }

            arr_e.first().css({"z-index": 9});
            setInterval(function(){
                shownext();
            },o.speed);

        });
    };
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.flash').imgtransition({
            speed:3000,  //图片切换时间
            animate:1000 //图片切换过渡时间
        });
    });
</script>

</body>
</html>