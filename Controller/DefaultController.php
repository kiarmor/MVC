<?php

namespace Controller;

use Framework\BaseController;
use Framework\Request;
use Model\Entity\Feedback;
use Model\Form\FeedbackForm;
use Framework\Session;

class DefaultController extends BaseController
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        //$this->pdo = $pdo;
    }

    public function indexAction(Request $request) //дает возможность обращаться к $_GET, $_POST параметрам класса Request
    {
        return $this->render('index.phtml');
    }

    public function feedbackAction(Request $request)
    {
        $form = new FeedbackForm(
            $request->post('email'), // $_POST['email']
            $request->post('message')
        );

        if ($request->isPost()){
            if ($form->isValid()){

                $feedback = new Feedback(
                    $form->email,
                    $form->message
                );

                $this->getRepository('Feedback')->save($feedback);

                Session::setFlash('Saved');

                $this
                    ->getRouter()
                    ->redirect('http://localhost/webroot/index.php?controller=Default&action=feedback');
            }
            Session::setFlash('Form invalid');
        }
        return $this->render('feedback.phtml', [
            'form' => $form
        ]);
    }

}