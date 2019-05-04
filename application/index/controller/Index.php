<?php
/**
 * @author xialeistudio <xialeistudio@gmail.com>
 */

namespace app\index\controller;

use app\common\service\AdminService;
use app\common\service\BookService;
use think\Exception;
use think\exception\DbException;
use think\Request;

/**
 * 首页
 * Class Index
 * @package app\index\controller
 */
class Index extends BaseController
{
    protected function _initialize()
    {
        $this->loginRequired();
    }

    public function index(Request $request)
    {
        $status = $request->param('status');
        if ($status === '') {
            $status = null;
        }
        $list = BookService::Factory()->list(10, $request->param('keyword'), $status);
        $this->assign('list', $list);
        return $this->fetch();
    }

    public function logout()
    {
        AdminService::Factory()->logout();
        $this->redirect('/');
    }

    public function changepwd()
    {
        return $this->fetch();
    }

    /**
     * @param Request $request
     * @throws Exception
     * @throws DbException
     */
    public function do_changepwd(Request $request)
    {
        $errmsg = $this->validate($request->post(), [
            'old_password|当前密码' => 'require',
            'new_password|新密码' => 'require',
            'new_password_confirm|确认密码' => 'require|confirm:new_password'
        ]);
        if ($errmsg !== true) {
            $this->error($errmsg);
        }
        AdminService::Factory()->changePwd($this->adminId(), $request->post('old_password'), $request->post('new_password'));
        $this->success('操作成功', 'index');
    }
}