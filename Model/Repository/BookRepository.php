<?php

//dependency injection

namespace Model\Repository;

use Model\Entity\Book;

class BookRepository
{
    /**
     * @var \PDO
     */
    protected $pdo;

    public function setPdo(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findAll()
    {
        $collection = [];
        $sth = $this->pdo->query('SELECT * FROM book');

        while ($res = $sth->fetch(\PDO::FETCH_ASSOC)){
            $book = (new Book())
                ->setId($res['id'])
                ->setTitle($res['title'])
                ->setDescription($res['description'])
                ->setPrice($res['price'])
                ->setIsActive($res['is_active'])
                ->setCategory($res['category_id'])
            ;

            $collection[] = $book;
        }
        return $collection;
    }

}