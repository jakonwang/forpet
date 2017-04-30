<?php /* Smarty version 2.6.30, created on 2017-02-27 16:57:36
         compiled from bkWechatUsers.tpl */ ?>
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
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'backendLeft.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h1>微信用户管理 <small>WechatUsers management</small></h1>
        <ol class="breadcrumb">
          <li><a href="/backend/"><i class="icon-dashboard"></i> 系统主页</a></li>
          <li class="active"><i class="icon-file-alt"></i> <?php echo $this->_tpl_vars['title']; ?>
</li>
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
          <?php if ($this->_tpl_vars['usersList']): ?>
          <?php $_from = $this->_tpl_vars['usersList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['name']['iteration']++;
?>
            <tr>
              <td><?php echo $this->_foreach['name']['iteration']; ?>
</td>
              <td><?php echo $this->_tpl_vars['item']->openid; ?>
</td>
              <td><img src='<?php echo $this->_tpl_vars['item']->headimgurl; ?>
' style='width:50px;height:50px;'/></td>
              <td><?php echo $this->_tpl_vars['item']->nickname; ?>
</td>
              <td><?php echo $this->_tpl_vars['item']->sex; ?>
</td>
              <td><?php echo $this->_tpl_vars['item']->country; ?>
<?php echo $this->_tpl_vars['item']->province; ?>
<?php echo $this->_tpl_vars['item']->city; ?>
</td>
              <td><?php echo $this->_tpl_vars['item']->subscribe_time; ?>
</td>
              <td>
                <a href="javascript:void(0);" class='btn btn-info btn-xs clues-detail' data-id='<?php echo $this->_tpl_vars['item']->id; ?>
'><span class='glyphicon glyphicon-eye-open' title='查看详情'></span></a>
                <a href="#" class='btn btn-danger btn-xs btn-delete' title='删除'><span class='glyphicon glyphicon-trash'></span></a>
              </td>
            </tr>
          <?php endforeach; endif; unset($_from); ?>
          <?php else: ?>
            <tr style='text-align:center;'><td colspan="8">没有任何数据</td></tr>
          <?php endif; ?>
          </tbody>
        </table>
        <!--Start page-->
        <?php echo $this->_tpl_vars['pageList']; ?>

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