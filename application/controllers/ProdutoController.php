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
  
      //  $storage->clear();
        
        $data = $storage->read();

        $produto = $this->producto($params);
//
        if (empty($data)) {
            $data = array();
        }
        
        $produto['idVenta'] = $params['idVenta']; 
        array_push($data,$produto);
        //$data[count($data)] = $produto; 
//        $storage->clear();
        $storage->write($data);

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
    
    
    public function limparAction() {
        $storage = new Zend_Auth_Storage_Session();
        $storage->clear();
        
        $this->redirect();
    }
    
    function xml2array ( $xmlObject, $out = array () )
    {
        foreach ( (array) $xmlObject as $index => $node ) {
            $out[$index] = ( is_object ( $node ) ) ? $this->xml2array ( $node ) : $node;
        }
            
        return $out;
    }
    
    public function correioAction() {
        $params = $this->_request->getParams();
        
        $prazo = file_get_contents("http://ws.correios.com.br/calculador/CalcPrecoPrazo.asmx/CalcPrazo?nCdServico=40010&sCepOrigem=13010215&sCepDestino=".$params['CEP']);
        
        $preco = file_get_contents("http://ws.correios.com.br/calculador/CalcPrecoPrazo.asmx/CalcPreco?nCdEmpresa=&sDsSenha=&nCdServico=40010&sCepOrigem=13010215&sCepDestino=".$params['CEP']."&nVlPeso=1&nCdFormato=1&nVlComprimento=16.0&nVlAltura=2.0&nVlLargura=11.0&nVlDiametro=1.0&sCdMaoPropria=N&nVlValorDeclarado=0&sCdAvisoRecebimento=N");

        $res = $this->xml2array(new SimpleXMLElement($preco));
        $resPrazo = $this->xml2array(new SimpleXMLElement($prazo));
        
        $resultado['Preco'] = $res['Servicos']['cServico'];
        $resultado['Prazo'] = $resPrazo['Servicos']['cServico'];
//        print_r($xml);
//        die(".");
                
                        $this->getResponse()
         ->setHeader('Content-Type', 'application/json');
        
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        $this->_helper->json($resultado); 
    }
    
}

