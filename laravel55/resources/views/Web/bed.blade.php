<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>岁月静好-新浪图床</title>
    <link rel="stylesheet" href="{{url('/private/bed/css/main.css?ver=1.9.2')}}" />
    <script src="https://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/jquery.qrcode/1.0/jquery.qrcode.min.js"></script>
    <style>
        body{margin:0 auto;text-align:center}
        .container{max-width:580px;padding:15px;margin:0 auto}
        momll-img{max-width:80%;display:block}
        #选图{position:absolute;z-index:1;cursor:pointer;opacity:0}
        #box,#选图{background:#b485e2;color:#FFF;display:block;height:40px;line-height:40px;text-align:center}
    </style>
</head>
<body class="is-loading">

<!-- Wrapper -->
<div id="wrapper">

    <!-- Main -->
    {{--<div style="text-align:center;">--}}
        {{--<img src="../img/logo.png" alt="" />--}}
    {{--</div>--}}
    <section id="main">
        <div>
              <span class="avatar"><a href="https://wpa.qq.com/msgrd?v=3&uin=1350840808&site=qq&menu=yes" target="_blank"><img src="{{url('/images/avatar.jpg')}}" alt="100"></a>
				</span>
        </div>
        <div class="panel-body">
            <form method='post'>
                <footer id="footer">
                    <ul class="copyright">
                    </ul>
                    <span><a>专为中小站长解决图片外链难题！</a></span>
                </footer>
                <br/>
                <div id="box" ><input type="file" class="form-sign"  type="file"name="file"id="选图">选择图片上传或拖动到此处</div>
            </form>
            <img id="图片" style=" width: 100%;">
            <hr>
            <span><a>本图库对接新浪API接口 不用担心图片丢失问题~</a></span>
            <p id="文本" style="background: rgba(255, 251, 251, 0.7);display: block;width: 100%;font-size: 14px;color: #555;border: 1px solid #ccc;border-radius: 4px;"></p>
            <script>
                选图.onchange=function(){
                    if(!this.files||!this.files[0])
                        return alert('选取文件出错！')
                    var
                        图片文件=this.files[0]
                    if(图片文件.type.indexOf('image')!=0)
                        return alert('这不是一个图像或音频！')
                    UP(图片文件,function(pid){
                        文本.innerHTML=
                            图片.src='https://ww2.sinaimg.cn/large/'+pid+ '.jpg'
                    },function(){
                        alert('上传文件出错了！')
                    },function(进度){
                        文本.innerHTML=进度*100+'%'
                    })
                }
            </script>
            <script>var
                    UP=function(o,success,error,upload,x,file,A){
                        if(typeof success=='function')
                            file=o;
                        else{
                            if(!o.file)
                                return console.log('并没有传入需要上传的文件')
                            if(A=o.success)
                                success=A
                            if(A=o.upload)
                                upload=A
                            if(A=o.error)
                                error=A
                        }
                        x=new XMLHttpRequest()
                        x.open('POST','https://x.mouto.org/wb/x.php?up&_r='+Math.random(),1)
                        if(upload)
                            x.upload.onprogress=function(e){
                                upload(e.loaded/e.total)
                            }
                        x.onload=function(r){
                            r=JSON.parse(x.responseText)
                            if(r.error&&error)
                                return error(r.error)
                            if(r.pid&&success)
                                return success(r.pid)
                        }
                        x.send(file)
                    }</script>

            <!-- Scripts -->
            <!--[if lte IE 8]><script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script><![endif]-->
            <script>
                if ('addEventListener' in window) {
                    window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-loading\b/, ''); });
                    document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
                }
            </script>
            <ul class="icons">
                <li><a href="http://www.syjh.me" class="fa-home">主页</a></li>
                <li><a href="https://wpa.qq.com/msgrd?v=3&uin=1350840808&site=qq&menu=yes" class="fa-qq">QQ</a></li>
                <li><a href="https://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=1350840808@qq.com" class="fa-envelope-o">邮箱</a></li>
                <li><a href="http://v.syjh.me" class="fa-weibo">影视</a></li>
            </ul>
        </div>
    </section>
</div>
</body>
</html>
{{--Copyright:Lich--}}