<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pedido
 *
 * @author Martin Dymenstein
 */
class Models_Pedidos extends Zend_Db_Table {
    
    protected $_name = "Pedidos";
    
    function save($params) {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        $info = array(
            'ST_NOME_PED' => $params['nome'],
            'ST_SOBRENOME_PED' => $params['sobrenome'],
            'ST_EMAIL_PED' => $params['email'],
            'ST_TELEFONE_PED' => $params['telefone'],
            'ST_ENDERECO_PED' => $params['endereco'],
            'ID_ESTADO_PED' => $params['estado'],
            'ID_CIDADE_PED' => $params['cidade'],
            'ID_PAIS_PED' => $params['pais'],
            'ST_CEP_PED' => $params['CEP'],
            'ST_COMENTARIO_PED' => $params['comentario'],
        );
        
        $db->insert($this->_name, $info);
        return $db->lastInsertId($this->_name);
    }
    
    /*
     * $data = $storage->read();
     */
    function save_produtos($idPedido, $data) {
        $db = Zend_Db_Table::getDefaultAdapter();

        for ($i = 0; $i < count($data); $i++) {
            $info = array('ID_ID_PED' => $idPedido, 'ID_PRODUTO_PED' => $data[$i]['id']);                        
            $db->insert("pedidos_produtos",$info);            
        }
        
        
    }
}
