<!DOCTYPE HTML>
<html>
<head>
    <title>岁月静好-防红链接</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="{{url('/private/url/js/jquery-1.11.1.min.js')}}"></script>
    <link rel="stylesheet" href="{{url('private/url/css/main.css')}}" />

</head>
<body class="is-loading">

<!-- Wrapper -->
<div id="wrapper">

    <!-- Main -->
    <section id="main">
        <header>
            <span class="avatar"><img src="{{asset('private/url/images/avatar.jpg')}}" alt="" /></span>
            <h1>防红短链接</h1>
            {{--<p>防红短链接</p>--}}
        </header>
        <form class="form-inline" id="myform">
            {{--<div id="Gtype">--}}
                {{--<input id="dwz" name="api" type="radio" value="dwz" checked="checked">--}}
                {{--<label for="dwz">生成</label>--}}
                {{--<input id="tj" name="api" type="radio" value="tj">--}}
                {{--<label for="tj">还原</label>--}}
            {{--</div>--}}
            <div class="form-group">
                <input type="text"  class="form-control" size="50" name="longurl" id="longurl" placeholder="不需要输入http://">
            </div>
            <div class="form-group">
                <button class="btn btn-secondary btn-single" id="shengcheng">执行</button>
            </div>
        </form>
        <div class="col-md-8" id="jg">

            <ul class="list-group list-group-minimal" id="xsjg">
            </ul>
        </div>
        <hr />
        <footer>
            <ul class="icons">
                <li><a href="http://www.syjh.me" class="fa-home">主页</a></li>
                <li><a href="https://wpa.qq.com/msgrd?v=3&uin=1350840808&site=qq&menu=yes" class="fa-qq">QQ</a></li>
                <li><a href="https://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=1350840808@qq.com" class="fa-envelope-o">邮箱</a></li>
                <li><a href="http://v.syjh.me" class="fa-weibo">影视</a></li>
            </ul>
        </footer>

    </section>

    <!-- Footer -->
    <footer id="footer">
        <ul class="copyright">
            <li>&copy; Lich</li><li>Design: <a href="/">WWW.SYJH.ME</a></li>
        </ul>
    </footer>
</div>
{{--生成结果--}}


<!-- Scripts -->
<!--[if lte IE 8]><script src="url/js/respond.min.js"></script><![endif]-->
<script>
    $(function () {
        $('#shengcheng').click(function () {
            var url = $('#longurl').val();
            if(url==''){
                layer.msg('请填写完整信息');
                return false;
            }
            var fm = new FormData($('#myform')[0]);
            var radionum = document.getElementsByName("api");
            for(var i=0;i<radionum.length;i++){
                if(radionum[i].checked){Gtype = radionum[i].value;}
            }
//            if (Gtype == 'dwz' ) {
            $.ajax({
                type:"post",
                url:"{{asset('shorturl')}}",
                dataType:"json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: fm,
                processData: false,
                contentType: false,
                success: function (resp){
                    if(resp.status==200){
                        var str = '<li class="list-group-item">'+resp.shorturl+'</li>';
//                        alert(resp.shorturl);
                        $('#xsjg').html(str);
                        $('#jg').show();
                    }
                    else {
                        layer.msg('生成失败')
                    }
                }
            });
//            }else if (Gtype == 'tj' ) {
////                window.location.href='tj.php?longurl='+url;
//                alert("还原功能正在紧急开发中...");
//            }

            return false;
        })
    })
</script>
<script>
    if ('addEventListener' in window) {
        window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-loading\b/, ''); });
        document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
    }
</script>
</body>
</html>
{{--Copyright:Lich--}}