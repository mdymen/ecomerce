<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Martin Dymenstein
 */
class Models_Usuario extends Zend_Db_Table {
    
    protected $_name = "Usuario";
    protected $_db;
    
    function __construct($config = array(), $definition = null) {
        parent::__construct($config, $definition);
        $this->_db = Zend_Db_Table::getDefaultAdapter();
    }
    
    function save($param) {
        
        $db = $this->_db;
        
        $info = array(
            'ST_USUARIO_USU' => $param['usuario'],
            'ST_SENHA_USU' => $param['senha'],
            'ST_EMAIL_USU' => $param['email'],
            'ST_CEP_USU' => $param['cep']
        );
        
        $db->insert($this->_name, $info);        
    }
    
    function verificarUsuario($param) {
        
        $select = $this->_db->select()->from("usuario")->where("ST_USUARIO_USU = ? ",$param['usuario'])
                ->where("ST_SENHA_USU = ?", $param['senha']);

        $res = $select->query()->fetch();
        
        if ($res != "") {
            return $res["ID_ID_USU"];
        }
        return "";
    }
    
}
