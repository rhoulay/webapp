<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wx5ee7eb4c8db61ac7", "62a35a63c75a99f9bc620e57ab0ca0ed");
$signPackage = $jssdk->GetSignPackage();
?>

<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="description" content="">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name='viewport' content='width=device-width, initial-scale=1.0; maximum-scale=1.0; user-scalable=0;' />
    <meta http-equiv="cleartype" content="on">

    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="lib/animate.min.css">

    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>

        <script>
        var _hmt = _hmt || [];
        (function() {
          var hm = document.createElement("script");
          hm.src = "//hm.baidu.com/hm.js?6fd2b54ea5091a7022104ba1f977247c";
          var s = document.getElementsByTagName("script")[0];
          s.parentNode.insertBefore(hm, s);
        })();
        </script>

</head>

<body>
<audio id="bg-audio" src="img/bg.mp3" loop style="display: none;position: absolute"></audio>
<div id="bg"></div>
<div class="page">
    <img src="img/loading.svg" id="loading" style="position:absolute;width: 64px;height: auto; top:44%; left: 50%;margin-left: -32px;">
    <img src="img/open_button.svg" id="open-button" style="display:none;position:absolute;width: 32%;height: auto; top:55%; left: 50%;margin-left: -16%;" class="animated tada infinite">

    <img src="img/mountain.png" id="mountain-pic" class="" style="display:none;position:absolute;width: auto;height: 45%; top:10px; right: 10px;">
    <div id="mountain" style="display:none;"></div>
    <div id="gote" style="display:none;"></div>
    <div id="gote-small" style="display:none;"></div>
    <img src="img/logo.svg" id="logo" style="display:none;position:absolute;width: 25%;height: auto; top:10px; left: 10px;">
    <img src="img/title.svg" id="title" style="display:none; position:absolute;width: 14%;height: auto; top:10px; right: 10px;">
    <img src="img/text-1.svg" id="text-1" style="display:none; position:absolute;width: 46%;height: auto; top:55%; right: 10%;">

    <img src="img/text.svg" id="text" style="display:none; position:absolute;width: 48%;height: auto; top:83%; left: 50%; margin-left: -24%;">

    <div id="scroll" style="display:none;">
        <span class="left"></span>
        <span class="middle">
            <img src="img/text-2.svg" id="scroll-content" style="display:none;">
        </span>
        <span class="right"></span>
    </div>

    <script type="text/javascript" src="lib/zepto.min.js"></script>

    <script>
        document.ontouchmove = function(e) {e.preventDefault()};
        $(document).ready(function() {
            var scale = $(window).width()/320;
            $('#gote').animate({ transform: 'scale('+ scale +')' }, 0);
            $('#gote-small').animate({ transform: 'scale('+ scale *.6 +')' }, 0);




            var overLoading = function(){
                document.getElementById('bg-audio').play();
                $('#loading').addClass('animated bounceOut').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){


                    $('#open-button').show();
                    $('#gote').show();
                    $('#gote-small').show();


                });
            };

            var openCard = function(){
                $('#mountain-pic').show();
                $('#mountain').show();

                window.setTimeout(function(){
                    $('#scroll').show();
                    $('#scroll').addClass('open');
                    window.setTimeout(function(){
                        $('#scroll-content').show();
                        $('#scroll-content').addClass('animated bounce');
                    },1000);


                    window.setTimeout(function(){
                        $('#logo').show();
                        $('#logo').addClass('animated fadeIn');

                        $('#title').show();
                        $('#title').addClass('animated bounceInDown');

                        $('#text-1').show();
                        $('#text-1').addClass('animated bounceInRight');

                        window.setTimeout(function(){
                            $('#text').show();
                            $('#text').addClass('animated tada infinite');
                        },1500);
                    },3000);
                },1500);
            };

            window.setTimeout(function(){
                overLoading();

                $(window).on('click', function(e) {
                    document.getElementById('bg-audio').play();
                    $('#open-button').hide();
                    openCard();
                });

            },2500);

        });
    </script>
</div>
<script>
        wx.config({
          appId: '<?php echo $signPackage["appId"];?>',
          timestamp: <?php echo $signPackage["timestamp"];?>,
          nonceStr: '<?php echo $signPackage["nonceStr"];?>',
          signature: '<?php echo $signPackage["signature"];?>',
            jsApiList: [
                'onMenuShareTimeline',
                'onMenuShareAppMessage'

                // 所有要调用的 API 都要加到这个列表中
            ]
        });

        wx.ready(function () {
            // 在这里调用 API
            wx.onMenuShareTimeline({
                title: '【太平人寿贺春矩献】让健康永远伴您不停步!', // 分享标题
                link: 'http://weixinapp.weburner.com/gote/', // 分享链接
                imgUrl: 'http://weixinapp.weburner.com/gote/img/icon.jpg', // 分享图标
                success: function () {
                    // 用户确认分享后执行的回调函数
                },
                cancel: function () {
                    // 用户取消分享后执行的回调函数
                }
            });

            wx.onMenuShareAppMessage({
                title: '【太平人寿贺春矩献】让健康永远伴您不停步!', // 分享标题
                desc: '太平人寿贺春矩献，福禄满堂，3.6全球首发，祝您幸福“羊”帆！', // 分享描述
                link: 'http://weixinapp.weburner.com/gote/', // 分享链接
                imgUrl: 'http://weixinapp.weburner.com/gote/img/icon.jpg', // 分享图标
                success: function () {
                    // 用户确认分享后执行的回调函数
                },
                cancel: function () {
                    // 用户取消分享后执行的回调函数
                }
            });


        });
</script>
</body>
</html>