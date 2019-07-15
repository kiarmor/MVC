<?php

namespace Controller\Admin;

use Framework\BaseController;
use Framework\Request;

class DefaultController extends BaseController
{

    public function indexAction(Request $request)
    {
       return $this->render('index.phtml');
    }
}