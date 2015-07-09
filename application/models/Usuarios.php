<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuarios
 *
 * @author Martin Dymenstein
 */
class Models_Usuarios extends Zend_Db_Table {
        protected $_name = 'Usuarios';
        protected $_db;
        
    function __construct($config = array(), $definition = null) {
        parent::__construct($config, $definition);
        $this->_db = Zend_Db_Table::getDefaultAdapter();
    }
    
    function save($params) {
        
        $db = $this->_db;
        
        $info = array(
            'ST_EMAIL_USU' => $params['ST_EMAIL_USU'],
            'ST_USUARIO_USU' => $params['ST_USUARIO_USU'],
            'ST_SENHA_USU' => $params['ST_SENHA_USU']
        );
        
        $db->save($info);
    }
    
    function load($params) {
        
    }
}
