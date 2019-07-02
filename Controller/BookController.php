<?php

namespace Controller;

use Framework\BaseController;
use Framework\Request;

class BookController extends BaseController
{
    public function indexAction(Request $request)
    {
        //get db connection
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