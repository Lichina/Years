<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=1024" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title>岁月静好-引导页</title>

    <link href="{{url('/private/guide/css/index.css')}}" rel="stylesheet" />
<body class="impress-not-supported" onload="timedCount()">

<div class="fallback-message">
    <p>您的浏览器不支持HTML5，看不到<ddd> 3D </ddd>特效，肿么办？</p>
    <p><b>不用怕！</b></p><p>请下载最新的 <b>Chrome</b>, <b>Safari</b> 或者 <b>Firefox</b> 浏览器(360急速，搜狗的“极速模式”也可以哦~)</p>
</div>
<div id="impress">
    <div id="bored" class="step slide" data-x="-1000" data-y="-1500">
        <q><p>你觉得这仅仅是个 </p><p><b> 简单的 </b>网页PPT？</p></q>
    </div>

    <div class="step slide" data-x="0" data-y="-1500">
        <q>再敲一敲键盘看看  O(∩_∩)O哈哈~</q>
    </div>

    <div class="step slide" data-x="1000" data-y="-1500">
        <q><p>What？这好像真的是个网页PPT哎。</p><p>不对啊，<b> 右边 </b>好像没有了？往下面看看！！</p></q>
    </div>

    <div id="title" class="step" data-x="0" data-y="0" data-scale="4">
        <p><span class="try">Lich</span></p>
        <p>&nbsp;</p>
        <p><span class="px60 STYLE3">岁月静好 现世安稳</span>
            <!--span class="footnote"><sup>*</sup> no rhyme intended</span-->
    </div>

    <div id="its" class="step" data-x="850" data-y="3000" data-rotate="90" data-scale="5">
        <p>很高兴和你见面</p>
    </div>

    <div id="big" class="step" data-x="3500" data-y="2100" data-rotate="180" data-scale="6">
        <p>我已经和你携手走过了<b><span id="shijian"></span></b><span class="thoughts">秒</span></p>
    </div>


    <div id="tiny" class="step" data-x="2825" data-y="2325" data-z="-3000" data-rotate="300" data-scale="1">
        <p>代码<b>改变</b>世界</p>
    </div>


    <div id="ing" class="step" data-x="3500" data-y="-850" data-rotate="270" data-scale="6">
        <p><span class="px60">山</span> <b class="positioning">有木兮</b><b class="rotating">木有枝</b><br> <span class="px60">心</span> <b class="scaling">悦君兮君不知</b><br /><xiaozi>弃我去者，昨日之日不可留。</xiaozi></p>
    </div>

    <div id="imagination" class="step" data-x="6700" data-y="-300" data-scale="6">
        <p>请记住我的名字 <br /><b class="imagination">Lich</b></p>
    </div>

    <div id="source" class="step" data-x="6300" data-y="2000" data-rotate="20" data-scale="4">
        <p>别人的引导页页都 <br /><b>弱爆了好么！</b></p>
    </div>

    <div id="one-more-thing" class="step" data-x="6000" data-y="4000" data-scale="2">
        <p>还有一句话......</p>
    </div>


    <div id="its-in-3d" class="step" data-x="6200" data-y="4300" data-z="-100" data-rotate-x="-40" data-rotate-y="10" data-scale="2">
        <p><span class="have">这</span> <span class="you">个</span> <span class="noticed">逼</span> <span class="its">我装定了！</span></p>
        <span class="footnote">(访问网站 <a href="http://www.syjh.me">www.syjh.me</a>)</span>
    </div>


    <div id="overview" class="step" data-x="3000" data-y="1500" data-scale="10">
    </div>

</div>


<div class="hint">
    <p>请使用 "空格键" 或者 "↑ ↓ ← →" 操控</p>
</div>
<script>
    if ("ontouchstart" in document.documentElement) {
        document.querySelector(".hint").innerHTML = "<p>按下 ← → 操控</p>";
    }
</script>

<script src="http://121.43.184.114/js/js_zb_yhc.js"></script>
<script src="http://121.43.184.114/js/js_zb_main.js" charset="utf-8"></script>
{{--<script src="{{asset('/private/guide/js/index.js')}}" charset="utf-8"></script>--}}
{{--<script src="{{url('/private/guide/js/main.js')}}" charset="utf-8"></script>--}}
<script>impress().init();</script>


<div style="display: none">
    <audio autoplay="autoplay" loop="loop" src="http://121.43.184.114/mp3/mp3gq20180225.mp3"></audio>
</div>
</body>
</html>