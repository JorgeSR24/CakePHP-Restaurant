<?php

class Pedido extends AppModel
{
    public $useTable = 'pedidos';
    public $primaryKey = 'id';

    public $belongsTo = array(

        'Platillo' => array(
            'className' => 'Platillo',
            'foreignKey' => 'platillo_id'
        )
    );

    public $validate = array(
        'comanda_id' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Debe seleccionar una comanda válida'
            )
        ),
        'platillo_id' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Debe seleccionar un platillo válido'
            )
        )
    );
}