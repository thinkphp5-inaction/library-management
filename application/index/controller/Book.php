<?php
/**
 * @author xialeistudio <xialeistudio@gmail.com>
 */

namespace app\index\controller;

use app\common\service\BookService;
use think\Exception;
use think\Request;

/**
 * 书籍管理
 * Class Book
 * @package app\index\controller
 */
class Book extends BaseController
{
    protected function _initialize()
    {
        $this->loginRequired();
    }

    public function add()
    {
        return $this->fetch();
    }

    public function do_add(Request $request)
    {
        $errmsg = $this->validate($request->post(), [
            'isbn' => 'require|number',
            'title|标题' => 'require|max:100',
            'author|作者' => 'require|max:40',
            'publisher|出版社' => 'require|max:40',
            'price|价格' => 'require|number'
        ]);
        if ($errmsg !== true) {
            $this->error($errmsg);
        }
        BookService::Factory()->add($request->post(), $this->adminId(), $request->ip());
        $this->success('操作成功', '/');
    }

    public function edit(Request $request)
    {
        $bookId = $request->param('id');
        if (empty($bookId)) {
            $this->error('您的请求有误');
        }

        try {
            $book = BookService::Factory()->findOne($bookId);
            $this->assign('book', $book);
            return $this->fetch();
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }

    public function do_edit(Request $request)
    {
        $bookId = $request->param('id');
        if (empty($bookId)) {
            $this->error('您的请求有误');
        }

        $errmsg = $this->validate($request->post(), [
            'isbn' => 'require|number',
            'title|标题' => 'require|max:100',
            'author|作者' => 'require|max:40',
            'publisher|出版社' => 'require|max:40',
            'price|价格' => 'require|number'
        ]);
        if ($errmsg !== true) {
            $this->error($errmsg);
        }
        BookService::Factory()->update($bookId, $request->post(), $this->adminId(), $request->ip());
        $this->success('编辑成功', '/');
    }
}