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
    
    public function executarlutaAction() {
        $params = $this->_request->getParams();
        
        $lutaobj = new Models_Luta();
        $luta = $lutaobj->getluta(1);
        
        $caract = array(
            "Boxe",
            "Cotovelo",
            "Chute",
            "Joelhada",
            "Clinch",
            "Resistencia",
            "Velocidade",
            "Explocao",
            "Estadofisico"
        );
        
        $puntagem_1 = 0;
        $puntagem_2 = 0;
        
        for ($i = 0; $i < 36; $i++) {
            $c = rand(0,8);
            $stc = $caract[$c];
            
            print_r($stc."<br>");
            
            $lut1 = $luta["lu1".$stc];
            $lut2 = $luta["lu2".$stc];
            
            $res = $lut1 - $lut2;
            
            if ($res > 0) { $mayor = true; }
            if ($res < 0) { $mayor = false; }
            if ($res == 0) { $mayor = "empate"; }
            
            $mayor = $res > 0;
            $ventaja = $res > 0 ? "ventaja 1" : "ventaja 2"; 
            print_r($ventaja."  con   ".abs($res)."<br>");
            
            $g = 0;
            if (strcmp("emptate",$mayor) == 0) {
                $ganador = $this->executarempate("lut1", "lut2", abs($res));
            } else {
                if ($mayor) {
                    $ganador = $this->executar("lut1", "lut2", abs($res));
                } else  {
                    $ganador = $this->executar("lut2", "lut1", abs($res));
                } 
            }
    
            if (strcmp($ganador, "lut1") == 0) {
                $g = 1;
                $puntagem_1 = $puntagem_1 + 1;
                print_r("ganador 1  - ".$puntagem_1." a ".$puntagem_2."<br>");
            } else {
                $g = 2;
                $puntagem_2 = $puntagem_2 + 1;
                print_r("ganador 2  - ".$puntagem_1." a ".$puntagem_2."<br>");
            }
           
            $comentarios = $this->getComentarios();
            $res_comentarios = $comentarios[rand(0,30)];
            print_r($res_comentarios."<br>");
            
            $lutaobj->save_comentario(array(
                'id' => $luta['ID_ID_LUTA'],
                'comentario' => $res_comentarios,
                'ganador' => $luta["lu".$g."Luta"]
            ));
        }
        
        die(".");
    }
    
    function executarempate($lut1, $lut2) {
        $r = rand(0,1);
        if ($r == 0) {
            return $lut1;
        }
        return $lut2;
    }
    
    function executar($mayor, $menor, $dif) {
        
        for ($i = -1; $i < $dif; $i++) {
            $ganador = rand(0,1);
            if ($ganador == 0) {
                return $mayor;
            }
        }
        return $menor;
    }
    
    function getComentarios() {
        $comentarios = array();
        for ($i = 0; $i < 30; $i++) {
            $comentarios[$i] = "comentarios ".$i;
        }
        return $comentarios;
    }
    
}
