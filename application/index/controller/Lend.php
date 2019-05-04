<?php
/**
 * @author xialeistudio
 */

namespace app\index\controller;

use app\common\model\BookLending;
use app\common\service\BookLendService;
use app\common\service\BookService;
use app\common\service\UserService;
use think\Request;

/**
 * 借书
 * Class Lend
 * @package app\index\controller
 */
class Lend extends BaseController
{
    protected function _initialize()
    {
        $this->loginRequired();
    }

    public function index(Request $request)
    {
        $list = BookLendService::Factory()->lendList(10, $request->param('keyword'), $request->param('status'));
        $this->assign('list', $list);
        return $this->fetch();
    }

    public function add()
    {
        $books = BookService::Factory()->list(999, null, \app\common\model\Book::STATUS_NORMAL);
        $users = UserService::Factory()->list(999);
        $this->assign('books', $books);
        $this->assign('users', $users);
        return $this->fetch();
    }

    public function do_add(Request $request)
    {
        $errmsg = $this->validate($request->post(), [
            'book_id|书籍ID' => 'require|number',
            'user_id|用户ID' => 'require|number',
            'lending_date|出借日期' => 'require|date',
            'should_return_date|应还日期' => 'require|date'
        ]);
        if ($errmsg !== true) {
            $this->error($errmsg);
        }
        BookLendService::Factory()->lend($request->post('book_id'), $request->post('user_id'), $this->adminId(), $request->ip(), [
            'lending_date' => $request->post('lending_date'),
            'should_return_date' => $request->post('should_return_date'),
            'remark' => $request->post('remark')
        ]);
        $this->success('操作成功', 'index');
    }

    public function update(Request $request)
    {
        $bookId = $request->param('book_id');
        $userId = $request->param('user_id');

        if (empty($bookId) || empty($userId)) {
            $this->error('您的请求有误');
        }

        $books = BookService::Factory()->list(999);
        $users = UserService::Factory()->list(999);
        $lend = BookLendService::Factory()->findOne($bookId, $userId);
        $this->assign('lend', $lend);
        $this->assign('books', $books);
        $this->assign('users', $users);
        return $this->fetch();
    }

    public function do_update(Request $request)
    {
        $errmsg = $this->validate($request->param(), [
            'book_id|书籍ID' => 'require|number',
            'user_id|用户ID' => 'require|number',
        ]);
        if ($errmsg !== true) {
            $this->error($errmsg);
        }

        BookLendService::Factory()->update($request->param('book_id'), $request->param('user_id'), $request->post(), $this->adminId(),
            $request->ip());
        $this->success('编辑成功', 'index');
    }

    public function return(Request $request)
    {
        $errmsg = $this->validate($request->param(), [
            'book_id|书籍ID' => 'require|number',
            'user_id|用户ID' => 'require|number',
        ]);
        if ($errmsg !== true) {
            $this->error($errmsg);
        }
        BookLendService::Factory()->return($request->param('book_id'), $request->param('user_id'), $this->adminId(), $request->ip());
        $this->success('操作成功');
    }
}