<?php

namespace Controller;

use Framework\BaseController;
use Framework\Request;
use Model\Form\LoginForm;

class SecurityController extends BaseController
{
    public function loginAction(Request $request)
    {
        $form = new LoginForm(
            $request->post('email'),
            $request->post('password')
        );

        if ($request->isPost()) {
            if ($form->isValid()) {
                //search in DB user with ths email
                //if email and pass match -> save to session
            }
        }
        //$form -> isPost-> isValid -> save to session
        return $this->render('login.phtml', [
            'form' => $form
        ]);
    }

    public function logoutAction()
    {
        // remove from session
    }

    public function registerAction()
    {
        //add user to DB
    }

    public function resetAction()
    {

    }

    public function activateAction()
    {

    }

}