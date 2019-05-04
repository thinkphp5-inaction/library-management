<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:121:"/Users/xialeistudio/PhpStormProjects/think5-inaction/library-management/public/../application/index/view/lend/update.html";i:1556021458;s:106:"/Users/xialeistudio/PhpStormProjects/think5-inaction/library-management/application/index/view/layout.html";i:1555820434;}*/ ?>
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
    <li><a href="<?php echo url('user/index'); ?>">借书管理</a></li>
    <li class="active">编辑出借书籍</li>
</ol>
<div class="panel-default panel">
    <div class="panel-body">
        <form action="<?php echo url('do_update',['user_id'=>$lend['user_id'],'book_id'=>$lend['book_id']]); ?>" class="form-horizontal" method="post">
            <div class="form-group">
                <label for="book_id" class="control-label col-md-1">书籍</label>
                <div class="col-md-4">
                    <select id="book_id" name="book_id" required class="form-control" readonly>
                        <?php if(is_array($books) || $books instanceof \think\Collection || $books instanceof \think\Paginator): $i = 0; $__LIST__ = $books;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$book): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $book['book_id']; ?>" <?php if($lend['book_id'] == $book['book_id']): ?>selected<?php endif; ?>>[<?php echo $book['book_id']; ?>]<?php echo $book['title']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="user_id" class="control-label col-md-1">用户</label>
                <div class="col-md-4">
                    <select id="user_id" name="user_id" required class="form-control" readonly>
                        <?php if(is_array($users) || $users instanceof \think\Collection || $users instanceof \think\Paginator): $i = 0; $__LIST__ = $users;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $user['user_id']; ?>" <?php if($user['user_id'] == $lend['user_id']): ?>selected<?php endif; ?>>[<?php echo $user['phone']; ?>]<?php echo $user['realname']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="lending_date" class="control-label col-md-1">借出日期</label>
                <div class="col-md-4">
                    <p id="lending_date" class="form-control"><?php echo $lend['lending_date']; ?></p>
                </div>
            </div>
            <div class="form-group">
                <label for="should_return_date" class="control-label col-md-1">应还日期</label>
                <div class="col-md-4">
                    <p id="should_return_date" class="form-control"><?php echo $lend['should_return_date']; ?></p>
                </div>
            </div>
            <div class="form-group">
                <label for="remark" class="control-label col-md-1">备注</label>
                <div class="col-md-4">
                    <textarea name="remark" id="remark" class="form-control" rows="10"><?php echo $lend['remark']; ?></textarea>
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