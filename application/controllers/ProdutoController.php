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
        
        $storage = new Zend_Auth_Storage_Session();
        
        $storage->clear();
        
        $data = $storage->read();
        
        // for ($i = 0; $i < $params['quantidade']; $i++) {
        
        $produto = $this->producto($params);
//            $produto['id'] = $params['produto'];
//            $produto['titulo'] = $params['titulo'];
//            $produto['tamanho'] = $params['tamanho'];
//            $produto['preco'] = $params['preco'];
//            $produto['quantidade'] = $params['quantidade'];
        $data[count($data)] = $produto; 
        $storage->write($data);
       // }
       // $storage->clear();
        $this->getResponse()
         ->setHeader('Content-Type', 'application/json');
        
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        $this->_helper->json($storage->read()); 
        
    }
    
    public function producto($params) {
        $produto['id'] = $params['produto'];
        $produto['titulo'] = $params['titulo'];
        $produto['tamanho'] = $params['tamanho'];
        $produto['preco'] = $params['preco'];
        $produto['quantidade'] = $params['quantidade'];
        
        return $produto;
    }
    
    public function excluirproductoAction() {
        $params = $this->_request->getParams();
        
        $storage = new Zend_Auth_Storage_Session();
        
        $storage->clear();
        
        $data = $storage->read();        
        
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]['id'] == $params['id']) {
                
            }
        }
        
        
        $this->getResponse()
         ->setHeader('Content-Type', 'application/json');
        
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        $this->_helper->json($storage->read()); 
        
    }
    
    public function acabarAction() {}
    
    public function comparacaoAction() {}
    
    
}

