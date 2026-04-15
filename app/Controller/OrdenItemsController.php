<?php

class OrdenItemsController extends AppController
{
    public $components = array('Paginator', 'Session');
    public $helpers = array('Html', 'Form', 'Time');

    public $paginate = array(
        'limit' => 2,
        'order' => array('OrdenItem.id' => 'desc')
    );

    public function view($id = null)
    {
        $this->OrdenItem->recursive = 2;
        
        if (!$this->OrdenItem->exists($id)) {
            throw new NotFoundException(__('Orden no encontrada'));
        }

        $this->paginate["OrdenItem"]["conditions"] = array("OrdenItem.orden_id" => $id);
        
        $this->set('ordenItems', $this->paginate('OrdenItem'));

    }
}