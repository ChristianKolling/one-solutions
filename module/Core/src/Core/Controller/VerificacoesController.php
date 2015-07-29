<?php

namespace Core\Controller;

use Core\Controller\ActionController as ActionController;

class VerificacoesController extends ActionController 
{
    public function verificaEmailUsuarioAction($email = null)
    {
        if ($this->getRequest()->isPost()) {
            $email = $this->getRequest()->getPost();
            $usuario = $this->getObjectManager()->getRepository('Application\Model\Usuario')
                    ->findOneBy(array(
                'email' => $email['email']
            ));
            if ($usuario) {
                echo json_encode(array(
                    'status' => false,
                    'msg' => 'Usuário já cadastrado'
                ));
                exit;
            } else {
                echo json_encode(array(
                    'status' => true,
                    'msg' => 'Ok'
                ));
                exit;
            }
        }
    }

}
