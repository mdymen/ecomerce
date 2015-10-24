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
        $usuario->verificarUsuario($params);
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
}
