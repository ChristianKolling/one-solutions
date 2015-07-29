<?php

namespace Application\Controller;

use Core\Controller\ActionController as ActionController;
use Zend\View\Model\ViewModel;

use Application\Form\Login as LoginForm;
use Application\Form\EsqueceuSuaSenha as EsqueceuSuaSenhaForm;
use Application\Form\Cadastro as CadastroForm;

use Application\Validator\Cadastro as validacaoCadastro;

class IndexController extends ActionController
{
    public function indexAction()
    {   
        $form = new LoginForm();
        if($this->getRequest()->isPost()){
            $this->redirect()->toUrl('/main');
        }
        return new ViewModel(array(
            'form' => $form
        ));
    }
    
    public function cadastreSeAction()
    {
        $form = new CadastroForm();
        $validacaoCadastro = new validacaoCadastro();
        $request = $this->getRequest();
        if($request->isPost()){
            $form->setInputFilter($validacaoCadastro->getInputFilter());
            $form->setData($request->getPost());
            if($form->isValid()){
                die('certo');
            }
        }
        return new ViewModel(array(
            'form' => $form
        ));
    }
    
    public function esqueceuSuaSenhaAction()
    {
        $form = new EsqueceuSuaSenhaForm();
        
        return new ViewModel(array(
            'form' => $form
        ));
    }
}
