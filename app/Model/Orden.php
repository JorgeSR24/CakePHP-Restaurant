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
}