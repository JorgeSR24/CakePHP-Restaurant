<?php

class OrdenItem extends AppModel
{
    public $useTable = 'orden_items'; // Especifica el nombre de la tabla en la base de datos

    public $belongsTo = array(
        'Orden' => array(
            'className' => 'Orden',
            'foreignKey' => 'orden_id'
        ),
        'Platillo' => array(
            'className' => 'Platillo',
            'foreignKey' => 'platillo_id'
        )
    );

    public $validate = array(
        'cantidad' => array(
            'notEmpty' => array(
                'rule' => 'notBlank',
                'message' => 'La cantidad no puede estar vacía'
            ),
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'La cantidad debe ser un número'
            )
        ),
        'subtotal' => array(
            'notEmpty' => array(
                'rule' => 'notBlank',
                'message' => 'El subtotal no puede estar vacío'
            ),
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'El subtotal debe ser un número'
            )
        )
    );
}