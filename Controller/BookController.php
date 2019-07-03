<?php

namespace Controller;

use Framework\BaseController;
use Framework\Request;
use Model\Repository\BookRepository;

class BookController extends BaseController
{
    private $pdo;
    protected $repository;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->repository = new BookRepository();
        $this->repository->setPdo($pdo);
        //
    }

    public function indexAction(Request $request)
    {
        //
        //

        $books = $this->repository->findAllBooks();
        echo '<pre>';
        print_r($books);
        echo '<pre>';

        //fetch books
        //render template
        $books = [
            'book1',
            'book2'
        ];

        $test = 123;

        return $this->render('index.phtml', [
            'books' => $books,
            'a' => $test
        ]);
    }

    public function showAction(Request $request)
    {
        return $this->render('show.phtml');
    }

}