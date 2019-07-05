<?php

namespace Controller;

use Framework\BaseController;
use Framework\Request;
use Model\Repository\BookRepository;

class BookController extends BaseController
{
    public function indexAction(Request $request)
    {
        $books = $this
            ->getRepository('Book') //'Book" Repository object
            ->findAll()
        ;

        return $this->render('index.phtml', [
            'books' => $books
        ]);
    }

    public function showAction(Request $request)
    {
        return $this->render('show.phtml');
    }
}