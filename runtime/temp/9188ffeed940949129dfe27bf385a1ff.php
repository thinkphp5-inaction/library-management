<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:118:"/Users/xialeistudio/PhpStormProjects/think5-inaction/library-management/public/../application/index/view/user/add.html";i:1556011121;s:106:"/Users/xialeistudio/PhpStormProjects/think5-inaction/library-management/application/index/view/layout.html";i:1555820434;}*/ ?>
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
    <li><a href="<?php echo url('user/index'); ?>">读者管理</a></li>
    <li class="active">添加读者</li>
</ol>
<div class="panel-default panel">
    <div class="panel-body">
        <form action="<?php echo url('do_add'); ?>" class="form-horizontal" method="post">
            <div class="form-group">
                <label for="realname" class="control-label col-md-1">姓名</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" id="realname" name="realname" placeholder="读者姓名" maxlength="20" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-1">性别</label>
                <div class="col-md-4">
                    <label class="radio-inline">
                        <input type="radio" name="sex" value="1" checked> 男
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="sex" value="2"> 女
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="phone" class="control-label col-md-1">手机</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="phone" id="phone" required placeholder="读者手机" maxlength="11">
                </div>
            </div>
            <div class="form-group">
                <label for="remark" class="control-label col-md-1">备注</label>
                <div class="col-md-4">
                    <textarea name="remark" id="remark" class="form-control" rows="10"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4 col-lg-offset-1">
                    <button type="submit" class="btn btn-primary">保存</button>
                </div>
            </div>
        </form>
    </div>
</div></div>
<footer class="text-center">图书管理系统 &copy<?= date('Y') ?></footer>
</body>
</html>