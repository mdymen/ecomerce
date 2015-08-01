<?php

require_once APPLICATION_PATH.'/Models/Usuarios.php';
class indexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    function xml2array ( $xmlObject, $out = array () )
{
    foreach ( (array) $xmlObject as $index => $node )
        $out[$index] = ( is_object ( $node ) ) ? $this->xml2array ( $node ) : $node;

    return $out;
}
    
    public function indexAction()       
    {
//        $xml = file_get_contents("http://ws.correios.com.br/calculador/CalcPrecoPrazo.asmx/CalcPreco?nCdEmpresa=&sDsSenha=&nCdServico=40010&sCepOrigem=13015130&sCepDestino=13010215&nVlPeso=1&nCdFormato=1&nVlComprimento=16.0&nVlAltura=2.0&nVlLargura=11.0&nVlDiametro=1.0&sCdMaoPropria=N&nVlValorDeclarado=0&sCdAvisoRecebimento=N");
//        
//        $res = new SimpleXMLElement($xml);
//        
//         $out = $this->xml2array($res);
//        
//        print_r($out);
//        die('.');
//        
        
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

