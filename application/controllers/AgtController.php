<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AgtController
 *
 * @author Martin Dymenstein
 */
require_once APPLICATION_PATH.'/Models/Usuario.php';
require_once APPLICATION_PATH.'/Models/Academia.php';
require_once APPLICATION_PATH.'/Models/Lutador.php';
require_once APPLICATION_PATH.'/Models/Treino.php';
require_once APPLICATION_PATH.'/Models/Luta.php';
class AgtController extends Zend_Controller_Action {
    
    protected $nomes = array("Carlos", "Roberto", "Rodrigo", "Hernan","Pedro","Henrique","Pablo");
    protected $sobenome = array("Gutierrez","Silva","Perez","Santos","Gilmar","Sires","Ramos");
    
    public function autolutadoresAction() {

        $lutador = new Lutador();
        for ($i = 0; $i < 10; $i++) {
            $nome = $this->nomes[rand(0,6)]." ".$this->sobenome[rand(0,6)];
            $params = array("nome" => $nome, "academia" => 1);
            $lutador->save($params);
        }
        
        print_r(".");
        die(".");
       
    }
    
    public function armarlutasAction() {
        $lutador = new Lutador();
        
        $lutadores1 = $lutador->lutadores();
        $lutadores2 = $lutador->lutadores();
        
        foreach ($lutadores1 as $l) {
            $rival = rand(0, count($lutadores2));
            
            $lutador1 = $l['ID_ID_LUT'];
            $lutador2 = $lutadores2[$rival];
            
           // print_r($l."-");
            
            $info = array(
                'data' => date("Y-m-d"),
                'lut1' => $lutador1,
                'lut2' => $lutador2['ID_ID_LUT']
            );
            
            //print_r($info);
            $luta = new Models_Luta();
            $luta->save($info);

        }
        
        die("-");
        
    }
    
    public function signinAction() {
        try {

            $params = $this->_request->getParams();
            $usuario = new Models_Usuario();
            $usuario->save($params);

            $this->_helper->json(true);                    
        }
        catch (Exception $e) {
            
            $this->_helper->json($e); 
        }
        
        $this->getResponse()
             ->setHeader('Content-Type', 'application/json');

        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
    }
    
    public function loginAction() {
        $params = $this->_request->getParams();
        
        $usuario = new Models_Usuario();
        $existe = $usuario->verificarUsuario($params);
        
        $this->getResponse()
             ->setHeader('Content-Type', 'application/json');

        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        
        $this->_helper->json((int)$existe);
    }
    
    public function logoutAction() {
        
    }
    
    public function cadastrolutadorAction() {
        
    }
    
    public function meuslutadores() {
        
    }
    
    public function lutadores() {
        
    }
    
    public function meusdados() {
        
    }
    
    public function mudardados() {
        
    }
    
    public function getlutador() {
        
    }
    
    public function getluta() {
        
    }
    
    public function treinarAction() {
        $params = $this->_request->getParams();
  
        $treinar = new Models_Treinos();
        $result = $treinar->treino($params);
        
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        
        $this->_helper->json($result);
    }
    
    public function getlutadorAction() {
        $params = $this->_request->getParams();
        
        $lutador = new Lutador();
        
        $result = $lutador->load($params["id"]);
        
        $this->getResponse()
             ->setHeader('Content-Type', 'application/json');

        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        
        $this->_helper->json($result);
    }
    
    
    public function adicionarlutadorAction() {
        $params = $this->_request->getParams();
        
        $lutador = new Lutador();
        $return = $lutador->save($params);
        
        $this->getResponse()
             ->setHeader('Content-Type', 'application/json');

        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        
        if (is_numeric($return)) {
            $this->_helper->json((int)$return);
        } else {
            $this->_helper->json("error");
        }
    }
    
    public function adicionaracademiaAction() {
        $params = $this->_request->getParams();
        
        $academia = new Academia();
        $return = $academia->save($params);
        
                $this->getResponse()
             ->setHeader('Content-Type', 'application/json');

        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        
        if (is_numeric($return)) {
            $this->_helper->json((int)$return);
        } else {
            $this->_helper->json("error");
        }
    }
    
    public function getacademiaAction() {
        $params = $this->_request->getParams();
        
        $academia = new Academia();
        $result = $academia->load($params);
        
        $this->load();
        
        $this->_helper->json($result);
    }
    
    public function load() {
        $this->getResponse()
             ->setHeader('Content-Type', 'application/json');

        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
    }
    
    public function getlutasAction() {
        $luta = new Models_Luta();
        
        $result = $luta->load_actual();
        
        $this->getResponse()
             ->setHeader('Content-Type', 'application/json');

        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        
        $this->_helper->json($result);        
    }
    
    public function getlutaAction() {
        $params = $this->_request->getParams();
        
        $luta = new Models_Luta();
        
        $result = $luta->getluta($params['id']);
        
        $this->getResponse()
             ->setHeader('Content-Type', 'application/json');

        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        
        $this->_helper->json($result);        
    }
    
    public function adicionarlutaAction() { 
        $params = $this->_request->getParams();
        
        $luta = new Models_Luta();
        
        $result = $luta->save($params);
        
        
        $this->getResponse()
             ->setHeader('Content-Type', 'application/json');

        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        
        $this->_helper->json($result);
    }
    
    
}
