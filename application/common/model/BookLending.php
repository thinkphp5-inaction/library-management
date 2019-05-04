<?php
/**
 * @author xialeistudio <xialeistudio@gmail.com>
 */

namespace app\common\model;

/**
 * 借出记录
 * Class BookLending
 * @package app\common\model
 * @property int $book_id
 * @property int $user_id
 * @property string $lending_date
 * @property string $should_return_date
 * @property int $return_at
 * @property int $created_at
 * @property int $updated_at
 * @property string $remark
 */
class BookLending extends BaseModel
{
    protected $autoWriteTimestamp = true;
    protected $createTime         = 'created_at';
    protected $updateTime         = 'updated_at';

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'book_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}