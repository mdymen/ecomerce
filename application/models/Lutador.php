<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Lutador
 *
 * @author Martin Dymenstein
 */
class Lutador extends Zend_Db_Table {
        protected $_name = 'Lutador';
        protected $_db;
        
    function __construct($config = array(), $definition = null) {
        parent::__construct($config, $definition);
        $this->_db = Zend_Db_Table::getDefaultAdapter();
    }
    
    function load($id) {
        $select = $this->_db->select()->from("lutador")->where("ID_ID_LUT = ? ",$id);

        $res = $select->query()->fetch();
        
        if ($res != "") {
            return $res;
        }
        return "";
    }
    
    function save($params) {
        
        $db = $this->_db;
        
        $info = array(
            'ST_NOME_LUT' => $params['nome'],
            'ID_ID_ACA' => $params['academia'],
            'VL_BOXE_LUT' => rand(0,5),
            'VL_JOELHADA_LUT' => rand(0,5),
            'VL_COTOVELO_LUT' => rand(0,5),
            'VL_CHUTE_LUT' => rand(0,5),
            'VL_CLINCH_LUT' => rand(0,5),
            'VL_RESISTENCIA_LUT' => rand(0,5),
            'VL_EXPLOCAO_LUT' => rand(0,5),
            'VL_VELOCIDADE_LUT' => rand(0,5),
            'VL_ESTADOFISICO_LUT' => rand(0,5)
        );

        $result = $db->insert($this->_name, $info);

        return $result;
    }
}
