<?php
/**
 * @author xialeistudio <xialeistudio@gmail.com>
 */

namespace app\common\model;

/**
 * 书籍
 * Class Book
 * @package app\common\model
 * @property int $book_id
 * @property string $isbn
 * @property string $title
 * @property string $author
 * @property string $publisher
 * @property int $created_at
 * @property int $updated_at
 * @property int $status
 * @property double $price
 */
class Book extends BaseModel
{
    protected $autoWriteTimestamp = true;
    protected $createTime         = 'created_at';
    protected $updateTime         = 'updated_at';

    const STATUS_NORMAL = 0; // 正常
    const STATUS_LEND = 1; // 已借出
    protected $type = [
    ];
}