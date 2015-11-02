<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Academia
 *
 * @author Martin Dymenstein
 */
class Academia extends Zend_Db_Table {
        protected $_name = 'Academia';
        protected $_db;
        
    function __construct($config = array(), $definition = null) {
        parent::__construct($config, $definition);
        $this->_db = Zend_Db_Table::getDefaultAdapter();
    }
    
    function save($params) {
        
        $db = $this->_db;
        
        $info = array(
            'ST_NOME_ACA' => $params['nome'],
            'ST_DESCRICAO_ACA' => $params['descricao'],
            'ID_USUARIO_ACA' => $params['usuario']
        );
        
        
        $result = $db->insert($this->_name, $info);

        return $result;
    }
    
    //put your code here
}
