<?php

namespace Controller\Admin;

use Framework\BaseController;
use Framework\Request;
use Framework\Session;

class DefaultController extends BaseController
{

    public function indexAction(Request $request)
    {
        if (!Session::has('user')){
            throw new \Exception('Access denied');
        }

       return $this->render('index.phtml');
    }
}