<?php
/**
 * @author xialeistudio <xialeistudio@gmail.com>
 */

namespace app\index\controller;

use app\common\service\AdminService;
use think\Exception;
use think\exception\DbException;
use think\Request;

/**
 * 管理
 * Class Admin
 * @package app\index\controller
 */
class Admin extends BaseController
{
    public function login()
    {
        return $this->fetch();
    }

    public function do_login(Request $request)
    {
        $errmsg = $this->validate($request->post(), [
            'username|账号' => 'require|max:20',
            'password|密码' => 'require|max:40'
        ]);
        if ($errmsg !== true) {
            $this->error($errmsg);
        }
        try {
            AdminService::Factory()->login($request->post('username'), $request->post('password'), request()->ip());
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
        $this->redirect('/');
    }
}