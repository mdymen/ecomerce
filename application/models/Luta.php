<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Luta
 *
 * @author Martin Dymenstein
 */
class Models_Luta extends Zend_Db_Table {
        protected $_name = 'Luta';
        protected $_db;
        
    function __construct($config = array(), $definition = null) {
        parent::__construct($config, $definition);
        $this->_db = Zend_Db_Table::getDefaultAdapter();
    }
    
    function save($params) {
        $db = $this->_db;
        
        $info = array(
            'DT_DATA_LUTA' => date(),
            'ID_LUTADORUM_LUTA' => $params['lut1'],
            'ID_LUTADORDOIS_LUTA' => $params['lut2'],
            'ST_RESULTADO_LUTA' => "",
        );

        $result = $db->insert($this->_name, $info);
        
        return $result;
    }
    
    function load_actual() {
        $select = $this->_db->select()->from("luta")
            ->joinInner(array("l1" => "lutador"),"luta.ID_LUTADORUM_LUTA = l1.ID_ID_LUT")
            ->joinInner(array("l2" => "lutador"),"luta.ID_LUTADORDOIS_LUTA = l2.ID_ID_LUT")
            ->where("luta.ST_RESULTADO_LUTA <> ? ","");

        $res = $select->query()->fetch();
        
        if ($res != "") {
            return $res;
        }
        return "";
    }
    
    function getluta($id) {
                $select = $this->_db->select()->from("luta")
            ->joinInner(array("l1" => "lutador"),"luta.ID_LUTADORUM_LUTA = l1.ID_ID_LUT")
            ->joinInner(array("l2" => "lutador"),"luta.ID_LUTADORDOIS_LUTA = l2.ID_ID_LUT")
            ->where("luta.ID_ID_LUTA <> ? ",$id);

        $res = $select->query()->fetch();
        
        if ($res != "") {
            return $res;
        }
        return "";
    }
}
