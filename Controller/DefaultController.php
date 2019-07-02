<?php

namespace Controller;

use Framework\BaseController;
use Framework\Request;

class DefaultController extends BaseController
{
    public function indexAction(Request $request) //дает возможность обращаться к $_GET, $_POST параметрам класса Request
    {
        return $this->render('index.phtml');
    }

    public function feedbackAction(Request $request)
    {
        //$_POST

        return $this->render('feedback.phtml');
    }

}