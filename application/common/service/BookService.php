<?php
/**
 * @author xialeistudio <xialeistudio@gmail.com>
 */

namespace app\common\service;


use app\common\BaseObject;
use app\common\model\AdminLog;
use app\common\model\BaseModel;
use app\common\model\Book;
use app\common\model\BookLog;
use app\common\repository\Repository;
use think\Db;
use think\Exception;
use think\exception\DbException;
use think\Paginator;

/**
 * 书籍
 * Class BookService
 * @package app\common\service
 */
class BookService extends BaseObject
{
    /**
     * 添加书籍
     * @param array $data
     * @param int $adminId
     * @param string $ip
     * @return Book
     */
    public function add(array $data, $adminId, $ip)
    {
        return Db::transaction(function () use ($data, $adminId, $ip) {
            /** @var Book $book */
            $book = Repository::ModelFactory(Book::class)->insert($data);
            AdminService::Factory()->log($adminId, AdminLog::ACTION_ADD_BOOK, "添加书籍:{$book->title}", [
                'book_id' => $book->book_id,
            ], $ip);
            $this->log($book->book_id, BookLog::ACTION_STORAGE, '入库', ['admin_id' => $adminId], $ip);
            return $book;
        });
    }

    /**
     * 日志
     * @param int $bookId
     * @param int $action
     * @param string $msg
     * @param mixed $params
     * @param mixed $ip
     * @return BaseModel|mixed
     * @throws Exception
     */
    public function log($bookId, $action, $msg, $params, $ip)
    {
        return Repository::ModelFactory(BookLog::class)->insert([
            'book_id' => $bookId,
            'action' => $action,
            'msg' => $msg,
            'params' => $params,
            'created_ip' => $ip
        ]);
    }

    /**
     * 查找书籍
     * @param int $bookId
     * @return BaseModel|mixed|Book
     * @throws Exception
     * @throws DbException
     */
    public function findOne($bookId)
    {
        $book = Repository::ModelFactory(Book::class)->findOne(['book_id' => $bookId]);
        if (empty($book)) {
            throw new Exception('书籍不存在');
        }
        return $book;
    }

    /**
     * 编辑书籍
     * @param int $bookId
     * @param array $data
     * @param int $adminId
     * @param string $ip
     * @return mixed
     */
    public function update($bookId, array $data, $adminId, $ip)
    {
        return Db::transaction(function () use ($bookId, $data, $adminId, $ip) {
            $book = $this->findOne($bookId);
            $oldBook = $book;
            /** @var Book $book */
            $book = Repository::ModelFactory(Book::class)->update($book, $data);
            AdminService::Factory()->log($adminId, AdminLog::ACTION_UPDATE_BOOK, '修改书籍', ['book_id' => $bookId], $ip);
            $this->log($bookId, BookLog::ACTION_UPDATE, '修改', $oldBook->getData(), $ip);
            return $book;
        });
    }

    /**
     * 书籍列表
     * @param int $size
     * @param null $keyword
     * @param null $status
     * @return Paginator
     * @throws DbException
     */
    public function list($size = 10, $keyword = null, $status = null)
    {
        $condition = [];
        if (isset($status)) {
            $condition['status'] = $status;
        }
        return Repository::ModelFactory(Book::class)->listBySearch($size, $condition, 'title|author|publisher', $keyword);
    }
}