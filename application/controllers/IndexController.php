<?php

class indexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }
    
    public function acabarAction() {}
    
    public function sobreAction() {}
    
    public function contatoAction() {}
    
    public function loginAction() {}
    
    public function cadastroAction() {}
    
    public function cadastrarAction() {
        $params = $this->request->getParams();
        
        $usuario = new Models_Usuarios();
        $usuario->save($params);
        
        //$users = new Models_Usuarios();
//        $auth = Zend_Auth::getInstance();
//            $authAdapter = new Zend_Auth_Adapter_DbTable($usuario->getAdapter(),'Usuarios');
//            $authAdapter->setIdentityColumn('ST_USUARIO_USU')
//                        ->setCredentialColumn('ST_SENHA_USU');
//            $authAdapter->setIdentity($params['ST_USUARIO_USU'])
//                        ->setCredential($params['ST_SENHA_USU']);
//
//            $result = $auth->authenticate($authAdapter);
//
//            if ($result->isValid()) {         
//                $storage = new Zend_Auth_Storage_Session();
//                $storage->write($authAdapter->getResultRowObject());
//            } 
//            
//            
//        
//        $this->_mail($params);       
        $this->redirect();
    }
}

