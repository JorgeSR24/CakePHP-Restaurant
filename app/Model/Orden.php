<?php

class Orden extends AppModel
{
    public $useTable = 'ordens'; // Especifica el nombre de la tabla en la base de datos
    public $belongsTo = array(
        'Mesa' => array(
            'className' => 'Mesa',
            'foreignKey' => 'mesa_id'
        )
    );

    public $hasMany = array(
        'OrdenItem' => array(
            'className' => 'OrdenItem',
            'foreignKey' => 'orden_id',
            'dependent' => true
         )
    );

    public $validate = array(
        'cliente' => array(
            'notEmpty' => array(
                'rule' => 'notBlank',
                'message' => 'El cliente no puede estar vacío'
            ),
        ),
        'dni' => array(
            'notEmpty' => array(
                'rule' => 'notBlank',
                'message' => 'El DNI no puede estar vacío'
            ),
        ),
        'total' => array(
            'notEmpty' => array(
                'rule' => 'notBlank',
                'message' => 'El total no puede estar vacío'
            ),
        )
    );

}