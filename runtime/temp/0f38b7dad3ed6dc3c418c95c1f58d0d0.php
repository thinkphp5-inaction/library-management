<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:121:"/Users/xialeistudio/PhpStormProjects/think5-inaction/library-management/public/../application/index/view/admin/login.html";i:1555825494;s:106:"/Users/xialeistudio/PhpStormProjects/think5-inaction/library-management/application/index/view/simple.html";i:1555580164;}*/ ?>
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
    </div>
</div>
<div class="container main-box">
<div class="panel panel-default">
    <div class="panel-heading">登录</div>
    <div class="panel-body">
        <form action="<?php echo url('do_login'); ?>" class="form-horizontal" method="post">
            <div class="form-group">
                <label for="username" class="col-md-2 col-lg-offset-2 control-label">账号</label>
                <div class="col-md-4">
                    <input type="text" id="username" name="username" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-md-2 col-lg-offset-2 control-label">密码</label>
                <div class="col-md-4">
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-2 col-lg-offset-4">
                    <button type="submit" class="btn btn-primary">登录</button>
                </div>
            </div>
        </form>
    </div>
</div></div>
<footer class="text-center">图书管理系统 &copy<?= date('Y') ?></footer>
</body>
</html>