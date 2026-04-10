<?php

App::uses('AppModel', 'Model');

class Comanda extends AppModel {
    public $useTable = 'comandas';
    public $primaryKey = 'id';


    public $belongsTo = array(
        'Mesa' => array(
            'className' => 'Mesa',
            'foreignKey' => 'mesa_id'
        ),
        'Mesero' => array(
            'className' => 'Mesero',
            'foreignKey' => 'mesero_id'
        )
    );

    public $validate = array(
        'mesa_id' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Debe seleccionar una mesa válida'
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