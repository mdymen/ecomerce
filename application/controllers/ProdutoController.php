<?php

include_once APPLICATION_PATH.'/Models/Produtos.php';
class ProdutoController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $params = $this->_request->getParams();
        
        $producto = new Models_Produtos();
        
        $p = $producto->getProduto($params['id']);
        
        $this->view->producto = $p;
        
    }
    
    public function adicionarAction() {
        $params = $this->_request->getParams();
        
        
        
        $this->getResponse()
         ->setHeader('Content-Type', 'application/json');
        
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        $this->_helper->json($params); 
        
    }
    
    public function acabarAction() {}
    
    public function comparacaoAction() {}
    
    
}

