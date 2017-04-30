<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>寻宠百科管理</title>
<!-- Bootstrap core CSS -->
<link href="css/bootstrap.css" rel="stylesheet">
<!-- Add custom CSS here -->
<link href="css/sb-admin.css" rel="stylesheet">
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<link href="css/admin.css" rel="stylesheet">
<link href="css/addArticle.css" rel="stylesheet">
<!--Start载入ueditor-->
<script  src="/ueditor/ueditor.config.js"></script>
<script  src="/ueditor/ueditor.all.min.js"> </script>
<!--End载入ueditor-->
</head>
<body>
<div id="wrapper"> 
  <!-- Sidebar -->
  <{include file='backendLeft.tpl'}>
  <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h1>寻宠百科管理 <small>Encyclopedia management</small></h1>
        <ol class="breadcrumb">
          <li><a href="index.html"><i class="icon-dashboard"></i> 系统主页</a></li>
          <li class="active"><i class="icon-file-alt"></i> <{$title}></li>
        </ol>
      </div>
    </div>
    <!-- /.row -->
    <{if $showList}>
    <!--S showList显示百科列表--> 
    <div class="row">
      <div class="col-lg-12">
        <table class='table table-bordered table-hover table-condensed'>
          <thead>
            <tr>
                <th><input type="checkbox" id='selectAll'></th>
                <th>ID</th>
                <th>百科标题</th>
                <th>更新时间</th>
                <th>点击</th>
                <th>百科作者</th>
                <th>操作</th>
              </tr>
          </thead>
          <tbody>
          <{if $articleList}>
          <{foreach from=$articleList key=key item=item name=name}>
            <tr>
                <td><input type="checkbox" name='ids[]' value='<{$item->id}>'></td>
                <td><{$smarty.foreach.name.iteration}></td>
                <td><{$item->title}></td>
                <td><{$item->lastpost}></td>
                <td><{$item->click}></td>
                <td><{$item->writer}></td>
                <td>
                  <a href="bkEncyclopedia.php?action=updateArticle&id=<{$item->id}>" class='btn btn-primary btn-xs' title='修改'>
                    <span class='glyphicon glyphicon-pencil'></span>
                  </a>
                  <a href="bkEncyclopedia.php?action=deleteArticle&id=<{$item->id}>" class='btn btn-danger btn-xs btn-delete' title='删除' >
                    <span class='glyphicon glyphicon-trash'></span>
                  </a>
                  <a href="/encyclopedia.php?action=showDetail&id=<{$item->id}>" class='btn btn-success btn-xs' title='预览' target='_blank'>
                    <span class='glyphicon glyphicon-eye-open'></span>
                  </a>
                </td>
            </tr>
            <{/foreach}>
            <{else}>
            <tr><td colspan='7' style='text-align:center;'>没有任何内容</td></tr>
             <{/if}>
            <tr>
              <td colspan='7'>
              <a href="bkEncyclopedia.php?action=addArticle" class='btn btn-primary btn-sm'>添加文档</a>
              <button type='submit' class='btn btn-danger btn-sm'>批量删除</button>
              <a href="bkEncyclopedia.php?action=showRubbish" class='btn btn-warning btn-sm'>回收站</a>
              <a href="javascript:history.back();" class='btn btn-default btn-sm' style=''>返回</a>
              </td>
            </tr>
            <!--Start 分页-->
            <tr><td colspan='7'><{$pageList}></td></tr>
            <!--End 分页-->
          </tbody>
        </table>
      </div>
    </div>
    <!--E showList-->
     <{/if}>
    <!--S showRubbish显示回收站-->
    <{if $showRubbish}>
    <!--S showList--> 
    <div class="row">
      <div class="col-lg-12">
        <table class='table table-bordered table-hover table-condensed'>
          <thead>
            <tr>
                <th><input type="checkbox" id='selectAll'></th>
                <th>ID</th>
                <th>百科标题</th>
                <th>更新时间</th>
                <th>点击</th>
                <th>百科作者</th>
                <th>操作</th>
              </tr>
          </thead>
          <tbody>
          <{if $rubbishList}>
          <{foreach from=$rubbishList key=key item=item name=name}>
            <tr>
                <td><input type="checkbox" name='ids[]' value='<{$item->id}>'></td>
                <td><{$smarty.foreach.name.iteration}></td>
                <td><{$item->title}></td>
                <td><{$item->lastpost}></td>
                <td><{$item->click}></td>
                <td><{$item->writer}></td>
                <td>
                  <a href="bkEncyclopedia.php?action=recoverArticle&id=<{$item->id}>" class='btn btn-primary btn-xs' title='恢复'>
                    <span class='glyphicon glyphicon-repeat'></span>
                  </a>
                  <a href="bkEncyclopedia.php?action=dropArticle&id=<{$item->id}>" class='btn btn-danger btn-xs btn-delete' title='删除' >
                    <span class='glyphicon glyphicon-trash'></span>
                  </a>
                  <a href="/encyclopedia.php?action=showDetail&id=<{$item->id}>" class='btn btn-success btn-xs' title='预览' target='_blank'>
                    <span class='glyphicon glyphicon-eye-open'></span>
                  </a>
                </td>
            </tr>
            <{/foreach}>
            <{else}>
            <tr><td colspan='7' style='text-align:center;'>没有任何内容</td></tr>
             <{/if}>
            <tr>
              <td colspan='7'>
              <a href="bkEncyclopedia.php?action=addArticle" class='btn btn-primary btn-sm'>添加文档</a>
              <button type='submit' class='btn btn-danger btn-sm'>批量删除</button>
              <a href="javascript:history.back();" class='btn btn-default btn-sm' style=''>返回</a>
              </td>
            </tr>
            <!--Start 分页-->
            <tr><td colspan='7'><{$pageList}></td></tr>
            <!--End 分页-->
          </tbody>
        </table>
      </div>
    </div>
    <!--E showList-->
     <{/if}>
    <!--E showRubbish-->
    <{if $addArticle}>
    <!--S addArticle-->
    <form action="bkEncyclopedia.php?action=addArticle" class='addArticle' enctype="mutiple/form-data" method='post' id='addArticle'>
      <div class="form-group title">
        <label for="">百科标题：</label>
        <input type="text" placeholder="请输入百科标题" name='title'>
      </div>
      <div class="form-group title">
         <label for="">百科作者：</label>
        <input type="text" placeholder="请输入百科作者" name='writer'>
      </div>
      <div class="form-group keywords">
        <label for="">关&nbsp;键&nbsp;词&nbsp;：</label>
        <input type="text" name="keywords" id="">(手动填写用","分开)
      </div>
       <div class="form-group litpic">
        <label for="">缩&nbsp;略&nbsp;图&nbsp;：</label>
        <input type="text" name='litpic' id='uploadText'>
        <input type='file' value='本地上传' class='upload'  id='uploadImg'>
      </div>
      <div class="upload-img">
         <img src="" alt="">
      </div>
      <div class="form-group description-label">
        <label for="">百科描述：</label>
      </div>
      <div class="form-group description">
         <textarea  placeholder="请输入百科描述" name='description'></textarea>
      </div>
      <div class="form-group body">
        <label for="" class='body-title'>百科内容：</label>
      </div>
      <div class='form-group editor'>
        <script id="editor" type="text/plain" style='height:500px;'></script>
      </div>
      <div class="form-submit">
        <button type="submit" class='btn btn-success' name='send'>确定</button>
        <button type="reset" class='btn btn-warning'>重置</button>
        <a href="javascript:history.back();" class='btn btn-default' style='margin-left:20px;'>返回</a>
      </div>
    </form>
    <script type="text/javascript">
      var ue = UE.getEditor('editor');
    </script>
    <!--E addArticle-->
    <{/if}>
    <{if $updateArticle}>
    <!--S updateArticle-->
    <form action="bkEncyclopedia.php?action=updateArticle" class='addArticle' enctype="mutiple/form-data" method='post' id='addArticle'>
    <input type="hidden" name='id' value='<{$oneArticle->id}>'>
      <div class="form-group title">
        <label for="">百科标题：</label>
        <input type="text" placeholder="请输入百科标题" name='title' value='<{$oneArticle->title}>'>
      </div>
      <div class="form-group title">
        <label for="">百科作者：</label>
        <input type="text" placeholder="请输入百科作者" name='writer' value='<{$oneArticle->writer}>'>
      </div>
      <div class="form-group keywords">
        <label for="">关&nbsp;键&nbsp;词：&nbsp;</label>
        <input type="text" name="keywords" id="" value='<{$oneArticle->keywords}>'>(手动填写用","分开)
      </div>
       <div class="form-group litpic">
        <label for="">缩&nbsp;略&nbsp;&nbsp;图：&nbsp;</label>
        <input type="text" name='litpic' id='uploadText' value='<{$oneArticle->litpic}>' class='form-control'>
        <input type='file' value='本地上传' class='upload'  id='uploadImg'>
      </div>
      <div class="upload-img" <{if $oneArticle->litpic}>style='display:block'<{/if}>>
         <img src="<{$oneArticle->litpic}>" alt="<{$oneArticle->title}>">
      </div>
      <div class="form-group description-label">
        <label for="">百科描述：</label>
      </div>
      <div class="form-group description">
         <textarea  placeholder="请输入百科描述" name='description'><{$oneArticle->description}></textarea>
      </div>
      <div class="form-group body">
        <label for="" class='body-title'>百科内容：</label>
      </div>
      <div class='form-group editor'>
        <script id="editor" type="text/plain" style='height:500px;'><{$oneArticle->body}></script>
      </div>
      <div class="form-submit">
        <button type="submit" class='btn btn-success' name='send'>确定</button>
        <button type="reset" class='btn btn-warning'>重置</button>
        <a href="javascript:history.back();" class='btn btn-default' style='margin-left:20px;'>返回</a>
      </div>
    </form>
    <script type="text/javascript">
      var ue = UE.getEditor('editor');
    </script>
    <!--E updateArticle-->
    <{/if}>
  </div>
  <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- JavaScript --> 
<script src="js/jquery-1.10.2.js"></script> 
<script src="js/bootstrap.js"></script>
<script src='js/encyclopedia.js'></script>
<script src="js/uploadImg.js"></script>
</body>
</html>