<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Treino
 *
 * @author Martin Dymenstein
 */
class Models_Treinos extends Zend_Db_Table {
    
    protected $_name = "Treinos";
    protected $_db;
    
    function __construct($config = array(), $definition = null) {
        parent::__construct($config, $definition);
        $this->_db = Zend_Db_Table::getDefaultAdapter();
    }
    
    function treino($params) {
        $db = $this->_db;
        
        $info = array(
            'ID_LUTADOR_TRE' => 1,
            'ID_CARACUM_TRE' => $params['carac1'],
            'ID_CARACDOIS_TRE' => $params['carac2'],
            'ID_CARACTREIS_TRE' => $params['carac3'],
            'VL_DIAS_TRE' => 3
        );

        $result = $db->insert($this->_name, $info);
        
        return $result;
    }
}
