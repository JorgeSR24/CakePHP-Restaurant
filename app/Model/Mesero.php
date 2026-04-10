<?php

class Mesero extends AppModel {
   // public $useTable = 'meseros';
    public $useTable = 'meseros';
    public $primaryKey = 'id';

    public $virtualFields = array(
        'nombre_completo' => "CONCAT(Mesero.nombre, ' ', Mesero.apellidos)"
    );


    public $validate = array(
        'dni' => array(
            'notEmpty' => array(
                'rule' => 'notBlank'
            ),
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'El valor debe ser numérico'
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'El DNI ya se encuentra en nuestra Base de Datos'
            )
        ),
        'nombre' => array(
            'rule' => 'notBlank'
        ),
        'apellidos' => array (
              'rule' => 'notBlank'
        )
    );

    public $hasMany = array(
        'Mesa' => array(
            'className' => 'Mesa',
            'foreignKey' => 'mesero_id',
            'conditions' => '',
            'order' => 'Mesa.codigo DESC',
            'dependent' => false 
        )
    );
}