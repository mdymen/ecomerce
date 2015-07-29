<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pais
 *
 * @author Martin Dymenstein
 */
class Models_Pais extends Zend_Db_Table {
    //put your code here
    
    function cidades($estado) {
        $db = Zend_Db_Table::getDefaultAdapter();
        return $db->select()->from("cidade")->where("estado = ?", $estado)->query()->fetchAll();
    }
    
    function estados() {
        $db = Zend_Db_Table::getDefaultAdapter();
        return $db->select()->from("estado")->query()->fetchAll();
    }
}
