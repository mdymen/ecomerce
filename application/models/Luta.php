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
            'DT_DATA_LUTA' => $params['data'],
            'ID_LUTADORUM_LUTA' => $params['lut1'],
            'ID_LUTADORDOIS_LUTA' => $params['lut2'],
            'ST_RESULTADO_LUTA' => "",
        );

        $result = $db->insert($this->_name, $info);
        
        return $result;
    }
    
    function load_actual() {
        $select = $this->_db->select()->from("luta")
            ->joinInner(array("l1" => "lutador"),"luta.ID_LUTADORUM_LUTA = l1.ID_ID_LUT",array( "lutador1" => "l1.ST_NOME_LUT", "luta" => "luta.ID_ID_LUTA"))
            ->joinInner(array("l2" => "lutador"),"luta.ID_LUTADORDOIS_LUTA = l2.ID_ID_LUT",array( "lutador2" => "l2.ST_NOME_LUT"))
            ->where("luta.ST_RESULTADO_LUTA = ? ","");
        
        $res = $select->query()->fetchAll();
        
        if ($res != "") {
            return $res;
        }
        return "";
    }
//                DT_DATA_LUTA,
//            ID_LUTADORUM_LUTA,
//            ID_LUTADORDOIS_LUTA,
//            ST_RESULTADO_LUTA,
//            ID_ID_LUT,
//            ST_NOME_LUT,
//            VL_GANHADAS_LUT,
//            VL_PERDIDAS_LUT,
//            VL_EMPATADAS_LUT,
//            VL_KOS_LUT,
//            VL_BOXE_LUT,
//            VL_JOELHADA_LUT,
//            VL_COTOVELO_LUT,
//            VL_CHUTE_LUT,
//            VL_CLINCH_LUT,
//            VL_RESISTENCIA_LUT,
//            VL_EXPLOCAO_LUT,
//            VL_VELOCIDADE_LUT,
//            VL_ESTADOFISICO_LUT

    function getluta($id) {
        
        $select = $this->_db->select()->from("luta")
            ->joinInner(array("l1" => "lutador"),"luta.ID_LUTADORUM_LUTA = l1.ID_ID_LUT",
                                array ("lu1Luta" => "l1.ID_ID_LUT",
                                    "lu1Nome" => "l1.ST_NOME_LUT",
                                    "lu1Ganhadas" => "l1.VL_GANHADAS_LUT",
                                    "lu1Perdidas" => "l1.VL_PERDIDAS_LUT",
                                    "lu1Empatadas" => "l1.VL_EMPATADAS_LUT",
                                    "lu1Kos" => "l1.VL_KOS_LUT",
                                    "lu1Boxe" => "l1.VL_BOXE_LUT",
                                    "lu1Joelhada" => "l1.VL_JOELHADA_LUT",
                                    "lu1Cotovelo" => "l1.VL_COTOVELO_LUT",
                                    "lu1Chute" => "l1.VL_CHUTE_LUT",
                                    "lu1Clinch" => "l1.VL_CLINCH_LUT",
                                    "lu1Resistencia" => "l1.VL_RESISTENCIA_LUT",
                                    "lu1Explocao" => "l1.VL_EXPLOCAO_LUT",
                                    "lu1Velocidade" => "l1.VL_VELOCIDADE_LUT",
                                    "lu1EstadoFisico" => "l1.VL_ESTADOFISICO_LUT"))
            ->joinInner(array("l2" => "lutador"),"luta.ID_LUTADORDOIS_LUTA = l2.ID_ID_LUT",
                                array ("lu2Luta" => "l2.ID_ID_LUT",
                                    "lu2Nome" => "l2.ST_NOME_LUT",
                                    "lu2Ganhadas" => "l2.VL_GANHADAS_LUT",
                                    "lu2Perdidas" => "l2.VL_PERDIDAS_LUT",
                                    "lu2Empatadas" => "l2.VL_EMPATADAS_LUT",
                                    "lu2Kos" => "l2.VL_KOS_LUT",
                                    "lu2Boxe" => "l2.VL_BOXE_LUT",
                                    "lu2Joelhada" => "l2.VL_JOELHADA_LUT",
                                    "lu2Cotovelo" => "l2.VL_COTOVELO_LUT",
                                    "lu2Chute" => "l2.VL_CHUTE_LUT",
                                    "lu2Clinch" => "l2.VL_CLINCH_LUT",
                                    "lu2Resistencia" => "l2.VL_RESISTENCIA_LUT",
                                    "lu2Explocao" => "l2.VL_EXPLOCAO_LUT",
                                    "lu2Velocidade" => "l2.VL_VELOCIDADE_LUT",
                                    "lu2EstadoFisico" => "l2.VL_ESTADOFISICO_LUT"))
            ->where("luta.ID_ID_LUTA = ? ",$id);
                
        $res = $select->query()->fetch();

        if ($res != "") {
            return $res;
        }
        return "";
    }
}
