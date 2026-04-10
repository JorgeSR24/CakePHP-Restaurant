<?php
App::uses('AppModel', 'Model');

class CategoriaPlatillo extends AppModel {
    public $useTable = 'categoria_platillos';
    public $primaryKey = 'id';
    
    public $displayField = 'categoria';
    

    public $validate = array(
        'categoria' => array(
            'notEmpty' => array(
                'rule' => 'notBlank',
                'message' => 'El nombre no puede estar vacío'
            )
        )
    );
}