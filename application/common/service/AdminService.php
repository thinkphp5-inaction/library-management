<?php
/**
 * @author xialeistudio <xialeistudio@gmail.com>
 */

namespace app\common\service;


use app\common\BaseObject;
use app\common\model\Admin;
use app\common\model\AdminLog;
use app\common\model\BaseModel;
use app\common\model\User;
use app\common\repository\Repository;
use think\Exception;
use think\exception\DbException;
use think\Paginator;
use think\Session;

/**
 * 管理员
 * Class AdminService
 * @package app\common\service
 */
class AdminService extends BaseObject
{
    const SESSION_KEY = 'index';
    const SESSION_LOGIN_KEY = 'index.login';

    /**
     * 记录日志
     * @param int $adminId
     * @param int $action
     * @param string $msg
     * @param mixed $params
     * @param $ip
     * @return BaseModel|mixed
     * @throws Exception
     */
    public function log($adminId, $action, $msg, $params, $ip)
    {
        return Repository::ModelFactory(AdminLog::class)->insert([
            'admin_id' => $adminId,
            'action' => $action,
            'msg' => $msg,
            'params' => $params,
            'created_ip' => $ip
        ]);
    }

    /**
     * 日志列表
     * @param int $adminId
     * @param int $size
     * @return Paginator
     * @throws DbException
     */
    public function logs($adminId, $size = 10)
    {
        return Repository::ModelFactory(AdminLog::class)->listByPage($size, ['admin_id' => $adminId], [], ['log_id' => 'desc']);
    }


    /**
     * 登录
     * @param string $username
     * @param string $password
     * @param string $ip
     * @return Admin
     * @throws DbException
     * @throws Exception
     */
    public function login($username, $password, $ip)
    {
        /** @var Admin $admin */
        $admin = Repository::ModelFactory(Admin::class)->findOne(['username' => $username]);
        if (empty($admin) || !password_verify($password, $admin->password)) {
            throw new Exception('账号或密码错误');
        }

        session(self::SESSION_LOGIN_KEY, [$admin->login_at, $admin->login_ip]);
        session(self::SESSION_KEY, $admin);
        Repository::ModelFactory(Admin::class)->update($admin, ['login_at' => time(), 'login_ip' => $ip]);
        $this->log($admin->admin_id, AdminLog::ACTION_LOGIN, '登录', [], $ip);
        return $admin;
    }

    /**
     * 退出登录
     */
    public function logout()
    {
        Session::clear();
    }

    /**
     * 获取已登录用户
     * @return mixed
     */
    public function loggedAdmin()
    {
        return session(self::SESSION_KEY);
    }

    /**
     * 注册
     * @param string $username
     * @param string $password
     * @return BaseModel|mixed|Admin
     * @throws DbException
     * @throws Exception
     */
    public function register($username, $password)
    {
        $admin = Repository::ModelFactory(Admin::class)->findOne(['username' => $username]);
        if (!empty($admin)) {
            throw new Exception('管理员已存在');
        }
        return Repository::ModelFactory(Admin::class)->insert([
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ]);
    }

    /**
     * 修改密码
     * @param string $userId
     * @param string $oldPassword
     * @param true $newPassword
     * @return BaseModel|mixed
     * @throws DbException
     * @throws Exception
     */
    public function changePwd($userId, $oldPassword, $newPassword)
    {
        /** @var Admin $admin */
        $admin = Repository::ModelFactory(Admin::class)->findOne(['admin_id' => $userId]);
        if (empty($admin)) {
            throw new Exception('用户不存在');
        }
        if (!password_verify($oldPassword, $admin->password)) {
            throw new Exception('当前密码错误');
        }
        return Repository::ModelFactory(Admin::class)->update($admin, [
            'password' => password_hash($newPassword, PASSWORD_DEFAULT)
        ]);
    }
}