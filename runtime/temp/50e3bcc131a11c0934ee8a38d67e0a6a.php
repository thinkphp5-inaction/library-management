<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:120:"/Users/xialeistudio/PhpStormProjects/think5-inaction/library-management/public/../application/index/view/user/index.html";i:1556011321;s:106:"/Users/xialeistudio/PhpStormProjects/think5-inaction/library-management/application/index/view/layout.html";i:1555820434;}*/ ?>
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
    <li class="active">读者管理</li>
</ol>
<div class="clearfix">
    <form action="" class="form-inline pull-left" method="get">
        <input type="search" class="form-control" placeholder="姓名或手机" id="keyword" name="keyword" value="<?php echo \think\Request::instance()->get('keyword'); ?>">
        <button class="btn btn-default" type="submit">筛选</button>
    </form>
    <a href="<?php echo url('user/add'); ?>" class="btn btn-primary pull-right">添加读者</a>
</div>
<hr>
<?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?>
    <p>暂时没有读者</p>
    <?php else: ?>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <tr>
                <td>ID</td>
                <td>姓名</td>
                <td>性别</td>
                <td>手机</td>
                <td>添加时间</td>
                <td>备注</td>
                <td>操作</td>
            </tr>
            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo $item['user_id']; ?></td>
                    <td><?php echo $item['realname']; ?></td>
                    <td>
                        <?php if($item['sex'] == '1'): ?>
                            男
                            <?php else: ?>
                            女
                        <?php endif; ?>
                    </td>
                    <td><?php echo $item['phone']; ?></td>
                    <td><?php echo $item['created_at']; ?></td>
                    <td><?php echo $item['remark']; ?></td>
                    <td>
                        <a href="<?php echo url('user/update',['id'=>$item['user_id']]); ?>">编辑</a>
                    </td>
                </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
    </div>
    <?php echo $list->render(); endif; ?></div>
<footer class="text-center">图书管理系统 &copy<?= date('Y') ?></footer>
</body>
</html>