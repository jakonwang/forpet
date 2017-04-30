<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>流浪线索管理</title>
<!-- Bootstrap core CSS -->
<link href="css/bootstrap.css" rel="stylesheet">
<!-- Add custom CSS here -->
<link href="css/sb-admin.css" rel="stylesheet">
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<link href="css/admin.css" rel="stylesheet">
<link rel="stylesheet" href="css/bkWanderingClues.css">
</head>
<body>
<div id="wrapper"> 
  <!-- Sidebar -->
  <{include file='backendLeft.tpl'}>
  <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h1>流浪线索管理 <small>WanderingClues management</small></h1>
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
              <td colspan='7'>
              <form action="bkWanderingClues.php?action=searchByNickname" class='navbar-form navbar-left' method='post'>
                <div class="form-group">
                   <input type="text" class='form-control' name='nickname' placeholder="请输入微信用户昵称">
                </div>
                <button type='submit' class='btn btn-info'>搜索</button>
                <a href="bkWanderingClues.php?action=sendToUsers" class='btn btn-default'>推送图文给用户</a>
              </td>
              </form>
            </tr>
            <tr>
              <th>编号</th>
              <th>微信用户</th>
              <th>宠物昵称</th>
              <th>宠物性别</th>
              <th>流浪描述</th>
              <th>发布时间</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
          <{if $cluesList}>
          <{foreach from=$cluesList key=key item=item name=name}>
            <tr>
              <td><{$smarty.foreach.name.iteration}></td>
              <td><{$item->nickname}></td>
              <td><{$item->pnickname}></td>
              <td><{$item->sex}></td>
              <td><{$item->description}></td>
              <td><{$item->pubdate}></td>
              <td>
                <a href="javascript:void(0);" class='btn btn-info btn-xs clues-detail' data-id='<{$item->id}>'><span class='glyphicon glyphicon-eye-open' title='查看详情'></span></a>
                <a href="bkWanderingClues.php?action=deleteOneClue&id=<{$item->id}>" class='btn btn-danger btn-xs btn-delete' title='删除'><span class='glyphicon glyphicon-trash'></span></a>
              </td>
            </tr>
          <{/foreach}>
          <{else}>
            <tr style='text-align:center;'><td colspan="7">没有任何数据</td></tr>
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
<!--Start clue-detail-->
<div class="modal fade" tabindex="-1" role="dialog" id='showClueDetail'>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">微信用户：<span class='nickname'></span></h4>
      </div>
      <div class="modal-body"  style='height:400px;overflow:auto;'>
        <div class="row">
          <div class="col-md-12 headbg" ><p class='headimgurl'></p></div>
          <div class="col-md-12"><h4>宠物昵称：</h4><p class='pnickname'></p></div>
          <div class="col-md-12"><h4>宠物性别：</h4><p class='sex'></p></div>
          <div class="col-md-12"><h4>流浪描述：</h4><p class='description'></p></div>
          <div class="col-md-12"><h4>流浪图片：</h4><p class='imgsrc'></p></div>
          <div class="col-md-12"><h4>发布时间：</h4><p class='pubdate'></p></div>
          <div class="col-md-12"><h4>联系人：</h4><p class='publisher'></p></div>
          <div class="col-md-12"><h4>联系方式：</h4><p class='telephone'></p></div>
          <div class="col-md-12"><h4>位置：</h4><p class='location'></p></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">关闭</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--End clue-detail-->
<!-- JavaScript --> 
<script src="js/jquery-1.10.2.js"></script> 
<script src="js/bootstrap.js"></script>
<script src='js/bkWanderingClues.js'></script>
</body>
</html>