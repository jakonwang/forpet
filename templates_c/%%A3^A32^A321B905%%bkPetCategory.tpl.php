<?php /* Smarty version 2.6.30, created on 2017-04-18 22:46:27
         compiled from bkPetCategory.tpl */ ?>
﻿<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>寻宠分类管理</title>
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
        <h1>宠物分类管理 <small>Pet category management</small></h1>
        <ol class="breadcrumb">
          <li><a href="index.html"><i class="icon-dashboard"></i> 系统主页</a></li>
          <li class="active"><i class="icon-file-alt"></i> <?php echo $this->_tpl_vars['title']; ?>
</li>
        </ol>
      </div>
    </div>
    <!-- /.row -->
    <?php if ($this->_tpl_vars['showCategory']): ?>
    <!--S row-->
    <div class="row">
      <div class="col-md-12">
        <table class='table table-bordered table-hover'>
          <thead>
            <tr>
              <td colspan="5">
                <form class="navbar-form navbar-left cateForm" action='bkPetCategory.php?action=addCategory'  method='post'>
                  <div class="form-group">
                    <input type="hidden" name="pid" value='<?php echo $this->_tpl_vars['pid']; ?>
'>
                    <input type="text" class="form-control" name='category_name' placeholder="请输入分类名称">
                  </div>
                  <button type="submit" class="btn btn-primary" name='send'>添加分类</button>
                  <a class='btn btn-default' href='javascript:history.back();'>返回</a>
                </form>
              </td>
            </tr>
            <tr>
                <th><input type="checkbox" id='selectAll'></th>
                <th>ID</th>
                <th>分类名称</th>
                <th>添加下级分类</th>
                <th>操作</th>
              </tr>
          </thead>
          <tbody>
          <?php if ($this->_tpl_vars['categoryList']): ?>
            <form action="bkPetCategory.php?action=multiDelete" method='post'>
            <?php $_from = $this->_tpl_vars['categoryList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
            <tr>
                <td><input type="checkbox" name='ids[]' value='<?php echo $this->_tpl_vars['item']->id; ?>
'></td>
                <td><?php echo $this->_tpl_vars['item']->id; ?>
</td>
                <td><?php echo $this->_tpl_vars['item']->category_name; ?>
</td>
                <td>
                 <a href="bkPetCategory.php?action=showCategory&pid=<?php echo $this->_tpl_vars['item']->id; ?>
">查看下级分类</a>
                </td>
                <td>
                  <a href="bkPetCategory.php?action=addCategory&pid=<?php echo $this->_tpl_vars['item']->id; ?>
" class='btn btn-info btn-xs' title='添加子分类'><span class='glyphicon glyphicon-plus'></span></a>
                  <a href="bkPetCategory.php?action=updateCategory&id=<?php echo $this->_tpl_vars['item']->id; ?>
" class='btn btn-info btn-xs' title='修改'><span class='glyphicon glyphicon-pencil'></span></a>
                  <a href="bkPetCategory.php?action=deleteCategory&id=<?php echo $this->_tpl_vars['item']->id; ?>
" class='btn btn-danger btn-xs btn-delete' title='删除'><span class='glyphicon glyphicon-trash'></span></a>
                </td>
              </tr>
              <?php endforeach; endif; unset($_from); ?>
              <tr>
                <td colspan='5'>
                <button type='submit' class='btn btn-danger btn-sm'>批量删除</button>
                </td>
              </tr>
          </form>
          <?php else: ?>
            <tr>
              <td colspan='5' style='text-align:center;'>没有任何分类</td>
            </tr>
          <?php endif; ?>
          </tbody>
        </table>
        <!--S pagelist-->
        <?php echo $this->_tpl_vars['pagelist']; ?>

        <!--E pagelist-->
      </div>
    </div>
    <?php endif; ?>
    <!--E row-->
    <!--S updateCategory-->
    <?php if ($this->_tpl_vars['updateCategory']): ?>
    <div class="row">
      <div class="col-md-6">
        <div class="panel panel-success">
          <div class="panel-heading">修改分类名称</div>
          <div class="panel-body">
            <form action="bkPetCategory.php?action=updateCategory" class='navbar-form navbar-left' method='post'>
              <div class="form-group">
                <input type="hidden" name="id" value='<?php echo $this->_tpl_vars['oneCategory']->id; ?>
'>
                <input type="text" name='category_name' class='form-control' placeholder="请输入宠物分类名称" value='<?php echo $this->_tpl_vars['oneCategory']->category_name; ?>
'>
              </div>
              <button type='submit' class='btn btn-primary' name='send'>修改</button>
              <a href="javascript:history.back();" class='btn btn-default'>返回</a>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <!--E updateCategory-->
    <!--S addCategory-->
    <?php if ($this->_tpl_vars['addCategory']): ?>
    <div class="row">
      <div class="col-md-6">
        <div class="panel panel-success">
          <div class="panel-heading">上级分类名称：<?php echo $this->_tpl_vars['oneCategory']->category_name; ?>
</div>
          <div class="panel-body">
            <form action="bkPetCategory.php?action=addCategory" class='navbar-form navbar-left cateForm' method='post'>
              <div class="form-group">
                <input type="hidden" name="pid" value='<?php echo $this->_tpl_vars['oneCategory']->id; ?>
'>
                <input type="text" name='category_name' class='form-control' placeholder="请输入宠物分类名称" value=''>
              </div>
              <button type='submit' class='btn btn-primary' name='send'>添加</button>
              <a href="javascript:history.back();" class='btn btn-default'>返回</a>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <!--E addCategory-->
  </div>
  <!-- /#page-wrapper -->
  <div class="modal fade" tabindex="-1" role="dialog" id='showWrong'>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">警告</h4>
      </div>
      <div class="modal-body">
        <p>分类名称不能为空！</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">关闭</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<!-- /#wrapper -->
<!-- JavaScript --> 
<script src="js/jquery-1.10.2.js"></script> 
<script src="js/bootstrap.js"></script>
<script src='js/checkCategory.js'></script>
</body>
</html>