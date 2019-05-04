<?php
/**
 * @author xialeistudio <xialeistudio@gmail.com>
 */

namespace app\common\model;

/**
 * Class Admin
 * @package app\common\model
 * @property int $admin_id
 * @property string $username
 * @property string $password
 * @property int $created_at
 * @property int $login_at
 * @property string $login_ip
 *
 */
class Admin extends BaseModel
{
    protected $autoWriteTimestamp = true;
    protected $createTime         = 'created_at';
    protected $updateTime         = false;
}