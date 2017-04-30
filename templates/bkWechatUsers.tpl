<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>微信用户管理</title>
<!-- Bootstrap core CSS -->
<link href="css/bootstrap.css" rel="stylesheet">
<!-- Add custom CSS here -->
<link href="css/sb-admin.css" rel="stylesheet">
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<link href="css/admin.css" rel="stylesheet">
</head>
<body>
<div id="wrapper"> 
  <!-- Sidebar -->
  <{include file='backendLeft.tpl'}>
  <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h1>微信用户管理 <small>WechatUsers management</small></h1>
        <ol class="breadcrumb">
          <li><a href="/backend/"><i class="icon-dashboard"></i> 系统主页</a></li>
          <li class="active"><i class="icon-file-alt"></i> <{$title}></li>
        </ol>
      </div>
    </div>
    <!-- /.row -->
    <!--Start wandering clues-->
    <div class="row">
      <div class="col-md-12">
        <table class='table table-hover table-bordered'>
          <thead>
            <tr>
              <th>编号</th>
              <th>OPENID</th>
              <th>头像</th>
              <th>用户昵称</th>
              <th>用户性别</th>
              <th>所在地</th>
              <th>关注时间</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
          <{if $usersList}>
          <{foreach from=$usersList key=key item=item name=name}>
            <tr>
              <td><{$smarty.foreach.name.iteration}></td>
              <td><{$item->openid}></td>
              <td><img src='<{$item->headimgurl}>' style='width:50px;height:50px;'/></td>
              <td><{$item->nickname}></td>
              <td><{$item->sex}></td>
              <td><{$item->country}><{$item->province}><{$item->city}></td>
              <td><{$item->subscribe_time}></td>
              <td>
                <a href="javascript:void(0);" class='btn btn-info btn-xs clues-detail' data-id='<{$item->id}>'><span class='glyphicon glyphicon-eye-open' title='查看详情'></span></a>
                <a href="#" class='btn btn-danger btn-xs btn-delete' title='删除'><span class='glyphicon glyphicon-trash'></span></a>
              </td>
            </tr>
          <{/foreach}>
          <{else}>
            <tr style='text-align:center;'><td colspan="8">没有任何数据</td></tr>
          <{/if}>
          </tbody>
        </table>
        <!--Start page-->
        <{$pageList}>
        <!--End page-->
      </div>
    </div>
    <!--End wandering clues-->
  </div>
  <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- JavaScript --> 
<script src="js/jquery-1.10.2.js"></script> 
<script src="js/bootstrap.js"></script>
</body>
</html>