<?php

namespace Controller\Admin;

use Framework\BaseController;
use Framework\Request;
use Framework\Exception\NotFoundException;
use Framework\Session;
use Model\Entity\Book;
use Model\Form\CreateBookForm;
use Model\Repository\BookRepository;

class BookController extends BaseController
{
    const BOOKS_PER_PAGE = 50;

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

    public function editAction(Request $request)
    {

    }

    public function createAction(Request $request)
    {
        $form = new CreateBookForm(
            $request->post('title'),
            $request->post('description'),
            $request->post('price'),
            $request->post('category_id'),
            $request->post('is_active')
            );

        if ($request->isPost()) {
            if ($form->isValid()) {
                 $this
                    ->getRepository('Book')
                    ->saveBook($form);

                Session::setFlash('Book added');
            }
        }
        return $this->render('create.phtml',[
            'form' => $form
        ]);

    }

    public function deleteAction(Request $request)
    {
        $id = $request->get('id'); //$_GET['id']
        $book = $this
            ->getRepository('Book')
            ->delete($id)
        ;

        if ($book){
            throw new NotFoundException('Book not found');
        }

        Session::setFlash('Book was delete');
        return $this->render('show.phtml');
/*
        time_sleep_until(3);
        $this
            ->getRouter()
            ->redirect('http://localhost/webroot/index.php?controller=Admin\Book&action=index');*/

    }
}