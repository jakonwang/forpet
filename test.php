<?php
require_once(dirname(__FILE__).'/init.inc.php');
$jssdk = new JssdkWechat(APPID,APPSECRET);
$signPackage = $jssdk->getSignPackage();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>微信JS-SDK Demo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
  <link rel="stylesheet" href="css/test.css">
</head>
<body>
<div class="wxapi_container">
    <div class="wxapi_index_container">
      <ul class="label_box lbox_close wxapi_index_list">
        <li class="label_item wxapi_index_item"><a class="label_inner" href="#menu-basic">基础接口</a></li>
         <li class="label_item wxapi_index_item"><a class="label_inner" href="#menu-image">本地选图</a></li>
      </ul>
    </div>
    <div class="lbox_close wxapi_form">
      <h3 id="menu-basic">基础接口</h3>
      <span class="desc">判断当前客户端是否支持指定JS接口</span>
      <button class="btn btn_primary" id="checkJsApi">checkJsApi</button>
      <h3 id="menu-image">图像接口</h3>
      <span class="desc">拍照或从手机相册中选图接口</span>
      <button class="btn btn_primary" id="chooseImage">chooseImage</button>
      <div id="showpic">显示图片</div>
      <h3 id="menu-image">图像接口</h3>
      <span class="desc">上传图片</span>
      <button class="btn btn_primary" id="uploadImage">uploadImage</button>
    </div>
  </div>
</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
  wx.config({
      debug: true,
      appId: '<?php echo $signPackage["appId"];?>',
      timestamp: <?php echo $signPackage["timestamp"];?>,
      nonceStr: '<?php echo $signPackage["nonceStr"];?>',
      signature: '<?php echo $signPackage["signature"];?>',
      jsApiList: [
        'checkJsApi',
        'onMenuShareTimeline',
        'onMenuShareAppMessage',
        'onMenuShareQQ',
        'onMenuShareWeibo',
        'onMenuShareQZone',
        'hideMenuItems',
        'showMenuItems',
        'hideAllNonBaseMenuItem',
        'showAllNonBaseMenuItem',
        'translateVoice',
        'startRecord',
        'stopRecord',
        'onVoiceRecordEnd',
        'playVoice',
        'onVoicePlayEnd',
        'pauseVoice',
        'stopVoice',
        'uploadVoice',
        'downloadVoice',
        'chooseImage',
        'previewImage',
        'uploadImage',
        'downloadImage',
        'getNetworkType',
        'openLocation',
        'getLocation',
        'hideOptionMenu',
        'showOptionMenu',
        'closeWindow',
        'scanQRCode',
        'chooseWXPay',
        'openProductSpecificView',
        'addCard',
        'chooseCard',
        'openCard'
      ]
  });
</script>
<script src="js/zepto.min.js"></script>
<script>
  wx.ready(function () {
  // 1 判断当前版本是否支持指定 JS 接口，支持批量判断
    document.querySelector('#checkJsApi').onclick = function () {
      wx.checkJsApi({
        jsApiList: [
          'getNetworkType',
          'previewImage'
        ],
        success: function (res) {
          alert(JSON.stringify(res));
        }
      });
    };
    var images = {
      localId: [],
      serverId: []
    };
    document.querySelector('#chooseImage').onclick = function () {
      wx.chooseImage({
        success: function (res) {
          images.localId = res.localIds;
          alert('已选择 ' + res.localIds.length + ' 张图片');
          var showpic = document.getElementById('showpic');
          var newimg = document.createElement('img');
          newimg.src = images.localId;
          showpic.appendChild(newimg);
        }
      });
    };
    document.querySelector('#uploadImage').onclick = function () {
    if (images.localId.length == 0) {
      alert('请先使用 chooseImage 接口选择图片');
      return;
    }
    var i = 0, length = images.localId.length;
    images.serverId = [];
    function upload() {
      wx.uploadImage({
        localId: images.localId[i],
        success: function (res) {
          i++;
          //alert('已上传：' + i + '/' + length);
          images.serverId.push(res.serverId);
          if (i < length) {
            upload();
          }
        },
        fail: function (res) {
          alert(JSON.stringify(res));
        }
      });
    }
    upload();
  };
});
</script>
</html>
