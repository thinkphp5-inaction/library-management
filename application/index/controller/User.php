<?php
/**
 * @author xialeistudio <xialeistudio@gmail.com>
 */

namespace app\index\controller;


use app\common\service\UserService;
use think\Exception;
use think\exception\DbException;
use think\Request;

class User extends BaseController
{
    protected function _initialize()
    {
        $this->loginRequired();
    }

    public function index(Request $request)
    {
        $list = UserService::Factory()->list(30, $request->param('keyword'));
        $this->assign('list', $list);
        return $this->fetch();
    }

    public function add()
    {
        return $this->fetch();
    }

    public function do_add(Request $request)
    {
        $errmsg = $this->validate($request->post(), [
            'realname|姓名' => 'require|max:20',
            'sex|性别' => 'require|number',
            'phone|手机' => 'require|max:11',
            'remark|备注' => 'string'
        ]);
        if ($errmsg !== true) {
            $this->error($errmsg);
        }

        try {
            UserService::Factory()->create($request->post());
            $this->success('添加成功', 'index');
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }

    public function update(Request $request)
    {
        $userId = $request->param('id');
        if (empty($userId)) {
            $this->error('您的请求有误');
        }
        try {
            $user = UserService::Factory()->findOne($userId);
            $this->assign('user', $user);
            return $this->fetch();
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }

    public function do_update(Request $request)
    {
        $errmsg = $this->validate($request->param(), [
            'id' => 'require|number',
            'realname|姓名' => 'require|max:20',
            'sex|性别' => 'require|number',
            'phone|手机' => 'require|max:11',
        ]);
        if ($errmsg !== true) {
            $this->error($errmsg);
        }
        try {
            UserService::Factory()->update($request->param('id'), $request->post());
            $this->success('编辑成功', 'index');
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }
}