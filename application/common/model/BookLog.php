<?php
/**
 * @author xialeistudio <xialeistudio@gmail.com>
 */

namespace app\common\model;

/**
 * 书籍历史记录
 * Class BookLog
 * @package app\common\model
 * @property int $log_id
 * @property int $action
 * @property string $msg
 * @property int $created_at
 * @property string $created_ip
 * @property mixed $params
 * @property int $book_id
 */
class BookLog extends BaseModel
{
    protected $autoWriteTimestamp = true;
    protected $createTime         = 'created_at';
    protected $updateTime         = false;

    const ACTION_STORAGE = 1; // 入库
    const ACTION_LEND = 2; // 借出
    const ACTION_RETURN = 3; // 归还
    const ACTION_UPDATE = 4; // 编辑书籍

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'book_id');
    }

    protected function initialize()
    {
        self::beforeInsert(function (BookLog $log) {
            $log->params = is_array($log->params) ? json_encode($log->params, 320) : $log->params;
        });
    }
}