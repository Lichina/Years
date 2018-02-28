<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lich</title>
</head>
<body>
<div class="input-group input-group-lg" style="margin-bottom: 10px;">
    <input type="text" class="form-control link-input" id="douyin_link" placeholder="请将APP里复制的视频链接粘贴到这里">
    <div class="input-group-btn">
        <div class="btn-clear"></div>
        <button class="btn btn-default" type="button" id="jiexi">解析视频</button>
    </div>
</div>
<div style="text-align: center; display: none;" class="alert alert-danger" id="error">请输入正确的视频链接</div>
<div style="text-align: center; display: none;" id="loading" >
    <img src="{{url('private/douyin/img/loading.gif')}}" style="width: 80px;height: 80px;">
</div>

<div class="thumbnail" style="display: none;" id="success">
    <div class="caption" style="padding:5px 0 0;">
        <p style="text-align: center;">
            <a target="_blank" rel="noreferrer" id="video_url" href="" download="douyin.cfzs.org.mp4"class="btn btn-success">下载视频</a>
            <a target="_blank" rel="noreferrer" id="cover_url" href="" class="btn btn-info">视频封面</a>
        </p>
        <p style="text-align: center;">
            <a href="javascript:void(0);" class="btn btn-danger" id="rest">清空</a>
        </p>
    </div>
</div>
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#jiexi").click(function(){
            $("#success").css("display","none");
            $("#error").css("display","none");
            $("#loading").css("display","block");
            var douyin_link = $("#douyin_link").val();
            console.log(douyin_link);
            if(douyin_link.length == 0){
                $("#error").html("请先将视频链接粘贴到上面的输入框");
                $("#error").css("display","block");
                $("#loading").css("display","none");
            }else{
                var c = douyin_link.lastIndexOf("http://");
                c = (c === -1) ? douyin_link.lastIndexOf("https://") : c;
                if(c === -1){
                    $("#error").html("请输入正确的视频链接");
                    $("#error").css("display","block");
                    $("#loading").css("display","none");
                }else{
                    douyin_link = douyin_link.substr(c);
                    console.log(douyin_link);
                    if(parseURL(douyin_link).host=="www.douyin.com"){
                        $.ajax({
                            type: "POST",
                            url: "http://127.0.0.1:8080/Years/laravel55/resources/views/Web/douyin.php",
                            data: {
                                url:douyin_link,
                            },
                            dataType: "json",
                            success: function(data){
                                $("#loading").css("display","none");
                                if(data.code == 1){
                                    $("#success").css("display","block");
                                    $("#video_url").attr("href",data.video_url);
                                    $("#cover_url").attr("href",data.cover_url);
                                }else{
                                    $("#error").html(data.msg);
                                    $("#error").css("display","block");
                                }
                            },

                        });
                    }else{
                        $("#error").html("请输入正确的视频链接");
                        $("#error").css("display","block");
                        $("#loading").css("display","none");
                    }
                }
            }

        });
        $("#rest").click(function(){
            $("#success").css("display","none");
            $("#error").css("display","none");
            $("#loading").css("display","none");
            $("#douyin_link").val("");
        });
    });

    function parseURL(url) {
        var a = document.createElement('a');
        a.href = url;
        return {
            source: url,
            protocol: a.protocol.replace(':', ''),
            host: a.hostname,
            port: a.port,
            query: a.search,
            params: (function() {
                var ret = {},
                    seg = a.search.replace(/^\?/, '').split('&'),
                    len = seg.length,
                    i = 0,
                    s;
                for (; i < len; i++) {
                    if (!seg[i]) {
                        continue;
                    }
                    s = seg[i].split('=');
                    ret[s[0]] = s[1];
                }
                return ret;
            })(),
            file: (a.pathname.match(/\/([^\/?#]+)$/i) || [, ''])[1],
            hash: a.hash.replace('#', ''),
            path: a.pathname.replace(/^([^\/])/, '/$1'),
            relative: (a.href.match(/tps?:\/\/[^\/]+(.+)/) || [, ''])[1],
            segments: a.pathname.replace(/^\//, '').split('/')
        };
    }
</script>
<script>
    (function(){
        var bp = document.createElement('script');
        var curProtocol = window.location.protocol.split(':')[0];
        if (curProtocol === 'https') {
            bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
        }else {
            bp.src = 'http://push.zhanzhang.baidu.com/push.js';
        }
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(bp, s);
    })();
</script>
<script src="https://s22.cnzz.com/z_stat.php?id=1270963628&web_id=1270963628" language="JavaScript"></script>

</body>
</html>