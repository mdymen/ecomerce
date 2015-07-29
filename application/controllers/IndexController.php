<?php

require_once APPLICATION_PATH.'/Models/Usuarios.php';
class indexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
//        $xml = file_get_contents("http://ws.correios.com.br/calculador/CalcPrecoPrazo.asmx/CalcPrazo?nCdServico=40010&sCepOrigem=13015130&sCepDestino=13010215");
//        print_r($xml);
//        die(".");
    }
    
    public function acabarAction() {}
    
    public function sobreAction() {}
    
    public function contatoAction() {}
    
    public function loginAction() {}
    
    public function cadastroAction() {}
    
    public function cadastrarAction() {
        $params = $this->_request->getParams();
        
        $usuario = new Models_Usuarios();
        $usuario->save($params);
        
        $users = new Models_Usuarios();
        $auth = Zend_Auth::getInstance();
        $authAdapter = new Zend_Auth_Adapter_DbTable($users->getAdapter(),'Usuarios');
        $authAdapter->setIdentityColumn('ST_EMAIL_USU')
                    ->setCredentialColumn('ST_SENHA_USU');
        $authAdapter->setIdentity($params['email'])
                    ->setCredential($params['senha']);

        $result = $auth->authenticate($authAdapter);

        if ($result->isValid()) {         
            $storage = new Zend_Auth_Storage_Session();
            $storage->write($authAdapter->getResultRowObject());
            
                $storage = new Zend_Auth_Storage_Session();
            $data = (get_object_vars($storage->read()));
            print_r($data);
            die('.');
        }

        $this->redirect();
    }
}

