<?php

include_once APPLICATION_PATH.'/models/pais.php';
include_once APPLICATION_PATH.'/models/pedidos.php';
class CarrinhoController extends Zend_Controller_Action
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
    
    
    public function checkoutAction() {    
        $pais = new Models_Pais();
        $this->view->estados = $pais->estados();
    }
    
    public function cidadeAction() {
        $params = $this->_request->getParams();
        
        $pais = new Models_Pais();
        $cidades = $pais->cidades($params['estado']);
        
        $this->getResponse()
         ->setHeader('Content-Type', 'application/json');
        
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        $this->_helper->json($params); 
    }
    
    public function excluirprodutoAction() {
        $params = $this->_request->getParams();
                        
        $storage = new Zend_Auth_Storage_Session();
        $data = $storage->read();
        
        $idVenta = $params['idventa'];
        
        $novo = array();
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]['idVenta'] != $idVenta) {
                array_push($novo, $data[$i]);
            }
        }

        $storage->clear();
        $storage->write($novo);
        
        $this->getResponse()
         ->setHeader('Content-Type', 'application/json');
        
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        $this->_helper->json($storage->read()); 
        
    }
    
    function encerrarAction() {
        $params = $this->_request->getParams();
        
        $pedidos = new Models_Pedidos();
        
        $idPedido = $pedidos->save($params);
        
        $storage = new Zend_Auth_Storage_Session();
        $data = $storage->read();
        
        $pedidos->save_produtos($idPedido, $data);
        
        $this->redirect();  
    }
}

