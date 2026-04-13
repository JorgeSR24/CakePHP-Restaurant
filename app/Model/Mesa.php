<?php


class Mesa extends AppModel {  

public $displayField = 'codigo';

    public $belongsTo = array(
        'Mesero' => array(
            'foreignKey' => 'mesero_id'
        )
    );

    public $hasMany = array(
        'Orden' => array(
            'foreignKey' => 'mesa_id',
            'dependent' => false
        )
    );

    public $validate = array(
        'codigo' => array(
            'notEmpty' => array(
                'rule' => 'notBlank',
                'message' => 'El código no puede estar vacío'
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'El código ya existe'
            ),
            'numeric' =>array(
                'rule' => 'numeric',
                'message' => 'El código debe ser numérico'
            )
        ),
        'tipo' => array(
            'notEmpty' => array(
                'rule' => 'notBlank',
                'message' => 'El tipo no puede estar vacío'
            )
        ),
        'descripcion' => array(
            'notEmpty' => array(
                'rule' => 'notBlank',
                'message' => 'La descripción no puede estar vacía'
            )
        ),
        'mesero_id' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Debe seleccionar un mesero válido'
            )
        )
    );

}