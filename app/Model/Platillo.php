<?php

App::uses('AppModel', 'Model');

class Platillo extends AppModel {
    public $useTable = 'platillos';
    public $primaryKey = 'id';

   public $belongsTo = array(
        'CategoriaPlatillo' => array(
            'className' => 'CategoriaPlatillo',
            'foreignKey' => 'categoria_platillo_id'
        )
    );

    public $hasAndBelongsToMany = array(
        'Cocinero' => array(
            'className' => 'Cocinero',
            'joinTable' => 'cocineros_platillos',
            'foreignKey' => 'platillo_id',
            'associationForeignKey' => 'cocinero_id',
            'unique' => 'keepExisting'
        )
    );

    public $hasMany = array(
        'Pedido' => array(
            'className' => 'Pedido',
            'foreignKey' => 'platillo_id',
            'dependent' => false
        )
    );


    public $validate = array(
        'nombre' => array(
            'notEmpty' => array(
                'rule' => 'notBlank',
                'message' => 'El nombre no puede estar vacío'
            )
        ),
        'precio' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'El precio debe ser un número válido'
            )
        ),
        'categoria_platillo_id' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Debe seleccionar una categoría de platillo válida'
            )
        )
    );

}   