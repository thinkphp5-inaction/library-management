<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:125:"/Users/xialeistudio/PhpStormProjects/think5-inaction/library-management/public/../application/index/view/index/changepwd.html";i:1556461638;s:106:"/Users/xialeistudio/PhpStormProjects/think5-inaction/library-management/application/index/view/layout.html";i:1555820434;}*/ ?>
<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo (isset($title) && ($title !== '')?$title:'图书管理系统'); ?></title>
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <link rel="stylesheet" href="/static/css/style.css">
    <script src="/static/js/jquery-3.3.1.min.js"></script>
    <script src="/static/js/bootstrap.min.js"></script>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand hidden-sm" href="<?php echo url('/'); ?>">图书管理系统</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo url('index/index'); ?>">书籍管理</a></li>
                <li><a href="<?php echo url('lend/index'); ?>">借书管理</a></li>
                <li><a href="<?php echo url('user/index'); ?>">读者管理</a></li>
            </ul>
            <ul class="navbar-nav navbar-right nav">
                <li><a href="<?php echo url('index/changepwd'); ?>">修改密码</a></li>
                <li><a href="<?php echo url('index/logout'); ?>">退出登录</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container main-box">
<ol class="breadcrumb">
    <li><a href="<?php echo url('/'); ?>">首页</a></li>
    <li class="active">修改密码</li>
</ol>
<div class="panel panel-default">
    <div class="panel-heading">修改密码</div>
    <div class="panel-body">
        <form action="<?php echo url('do_changepwd'); ?>" class="form-horizontal" method="post">
            <div class="form-group">
                <label for="old_password" class="col-md-2 col-lg-offset-2 control-label">当前密码</label>
                <div class="col-md-4">
                    <input type="password" id="old_password" name="old_password" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label for="new_password" class="col-md-2 col-lg-offset-2 control-label">新密码</label>
                <div class="col-md-4">
                    <input type="password" id="new_password" name="new_password" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label for="new_password_confirm" class="col-md-2 col-lg-offset-2 control-label">确认密码</label>
                <div class="col-md-4">
                    <input type="password" id="new_password_confirm" name="new_password_confirm" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-2 col-lg-offset-4">
                    <button type="submit" class="btn btn-primary">确认修改</button>
                </div>
            </div>
        </form>
    </div>
</div></div>
<footer class="text-center">图书管理系统 &copy<?= date('Y') ?></footer>
</body>
</html>