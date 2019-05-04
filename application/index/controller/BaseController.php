<?php
/**
 * @author xialeistudio <xialeistudio@gmail.com>
 */

namespace app\index\controller;


use app\common\service\AdminService;
use think\Controller;

/**
 * Class BaseController
 * @package app\index\controller
 */
class BaseController extends Controller
{
    protected function loginRequired()
    {
        $logged = AdminService::Factory()->loggedAdmin();
        if (empty($logged)) {
            $this->redirect('admin/login');
        }
    }

    protected function adminId()
    {
        $admin = AdminService::Factory()->loggedAdmin();
        return $admin ? $admin['admin_id'] : null;
    }
}