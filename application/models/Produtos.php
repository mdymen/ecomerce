<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of produtos
 *
 * @author Martin Dymenstein
 */
class Models_Produtos extends Zend_Db_Table {
    
    protected $_name = "Produtos";
    protected $_db;
    
    function __construct($config = array(), $definition = null) {
        parent::__construct($config, $definition);
        $this->_db = Zend_Db_Table::getDefaultAdapter();
    }
    
    function save($params) {
        
    }
    
    function getProduto($id) {
        
    }
    
    
    
}
