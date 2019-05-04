<?php
/**
 * @author xialeistudio <xialeistudio@gmail.com>
 */

namespace app\common\service;

use app\common\BaseObject;
use app\common\model\BaseModel;
use app\common\model\User;
use app\common\repository\Repository;
use think\Exception;
use think\exception\DbException;
use think\Paginator;

/**
 * Class UserService
 * @package app\common\service
 */
class UserService extends BaseObject
{
    /**
     * 添加用户
     * @param array $data
     * @return User
     * @throws Exception
     * @throws DbException
     */
    public function create(array $data)
    {
        $user = Repository::ModelFactory(User::class)->findOne(['phone' => $data['phone']]);
        if (!empty($user)) {
            throw new Exception('手机号码已存在');
        }
        return Repository::ModelFactory(User::class)->insert($data);
    }

    /**
     * 查找用户
     * @param int $userId
     * @return User
     * @throws DbException
     * @throws Exception
     */
    public function findOne($userId)
    {
        $user = Repository::ModelFactory(User::class)->findOne(['user_id' => $userId]);
        if (empty($user)) {
            throw new Exception('用户不存在');
        }
        return $user;
    }

    /**
     * 编辑用户
     * @param int $userId
     * @param array $data
     * @return BaseModel|mixed
     * @throws DbException
     * @throws Exception
     */
    public function update($userId, array $data)
    {
        $user = $this->findOne($userId);
        return Repository::ModelFactory(User::class)->update($user, $data);
    }

    /**
     * 分页列表
     * @param int $size
     * @param null $keyword
     * @return Paginator
     * @throws DbException
     */
    public function list($size = 10, $keyword = null)
    {
        return Repository::ModelFactory(User::class)->listBySearch($size, [], 'realname|phone', $keyword);
    }
}