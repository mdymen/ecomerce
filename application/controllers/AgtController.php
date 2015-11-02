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
class AgtController extends Zend_Controller_Action {
    
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
}
