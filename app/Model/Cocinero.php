<?php

App::uses('AppModel', 'Model');

class Cocinero extends AppModel {

public $displayField = 'nombre';

public $validate = array(
    
    'nombre' => array(
        'notEmpty' => array(
            'rule' => 'notBlank',
            'message' => 'El nombre no puede estar vacío'
        )
    ),
    'apellidos' => array(
        'notEmpty' => array(
            'rule' => 'notBlank',
            'message' => 'Los apellidos no pueden estar vacíos'
        )
    )
);

public $hasAndBelongsToMany = array(
    'Platillo' => array(
        'className' => 'Platillo',
        'joinTable' => 'cocineros_platillos',
        'foreignKey' => 'cocinero_id',
        'associationForeignKey' => 'platillo_id',
        'unique' => true,
    )
);
}