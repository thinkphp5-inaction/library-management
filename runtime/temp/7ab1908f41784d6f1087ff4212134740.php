<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:121:"/Users/xialeistudio/PhpStormProjects/think5-inaction/library-management/public/../application/index/view/index/index.html";i:1555831091;s:106:"/Users/xialeistudio/PhpStormProjects/think5-inaction/library-management/application/index/view/layout.html";i:1555820434;}*/ ?>
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
    <li class="active">书籍管理</li>
</ol>
<div class="clearfix">
    <form action="" class="form-inline pull-left" method="get">
        <label for="status" class="control-label">状态</label>
        <select name="status" id="status" class="form-control">
            <option value="" <?php if(\think\Request::instance()->get('status') == ''): ?>selected<?php endif; ?>>全部</option>
            <option value="0" <?php if(\think\Request::instance()->get('status') == '0'): ?>selected<?php endif; ?>>正常</option>
            <option value="1" <?php if(\think\Request::instance()->get('status') == '1'): ?>selected<?php endif; ?>>已出借</option>
        </select>
        <input type="search" class="form-control" placeholder="书名搜索" id="keyword" name="keyword" value="<?php echo \think\Request::instance()->get('keyword'); ?>">
        <button class="btn btn-default" type="submit">筛选</button>
    </form>
    <a href="<?php echo url('book/add'); ?>" class="btn btn-primary pull-right">添加书籍</a>
</div>
<hr>
<?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?>
    <p>暂时没有书籍</p>
    <?php else: ?>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <tr>
                <td>ID</td>
                <td>ISBN</td>
                <td>标题</td>
                <td>作者</td>
                <td>出版社</td>
                <td>价格</td>
                <td>状态</td>
                <td>添加时间</td>
                <td>最后更新时间</td>
                <td>操作</td>
            </tr>
            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo $item['book_id']; ?></td>
                    <td><?php echo $item['isbn']; ?></td>
                    <td><?php echo $item['title']; ?></td>
                    <td><?php echo $item['author']; ?></td>
                    <td><?php echo $item['publisher']; ?></td>
                    <td>￥<?php echo $item['price']; ?></td>
                    <td>
                        <?php if($item['status'] == '0'): ?>
                            <span class="label label-success">正常</span>
                            <?php else: ?>
                            <span class="label label-warning">已借出</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo $item['created_at']; ?></td>
                    <td><?php echo $item['updated_at']; ?></td>
                    <td>
                        <a href="<?php echo url('book/edit',['id'=>$item['book_id']]); ?>">编辑</a>
                    </td>
                </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
    </div>
    <?php echo $list->render(); endif; ?></div>
<footer class="text-center">图书管理系统 &copy<?= date('Y') ?></footer>
</body>
</html>