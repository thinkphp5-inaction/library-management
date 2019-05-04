<?php
/**
 * @author xialeistudio <xialeistudio@gmail.com>
 */

namespace app\common\model;

/**
 * 用户
 * Class Admin
 * @package app\common\model
 * @property int $user_id
 * @property string $realname
 * @property int $sex
 * @property string $phone
 * @property int $created_at
 * @property string $remark
 */
class User extends BaseModel
{
    protected $autoWriteTimestamp = true;
    protected $createTime         = 'created_at';
    protected $updateTime         = false;
}