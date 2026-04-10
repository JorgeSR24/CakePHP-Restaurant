<?php
App::uses('AppController', 'Controller');

class ComandasController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash', 'Time');
    public $components = array('Flash', 'Paginator', 'Session', 'RequestHandler');

    public function index() {
        $comandas = $this->Comanda->find('all');
        $this->set('comandas', $comandas);
    }

    public function add() {
        if ($this->request->is('POST')) {
            $this->Comanda->create();

            if ($this->Comanda->save($this->request->data)) {
                $this->Flash->success('La Comanda ha sido creada');
                return $this->redirect(array('action' => 'index'));
                
            } else {
                $this->Flash->error('No se puedo crear la Comanda');
            }
        }

        $mesas = $this->Comanda->Mesa->find('list', array('fields' => array('Mesa.id', 'Mesa.codigo')));
        $meseros = $this->Comanda->Mesero->find('list', array('fields' => array('Mesero.id', 'Mesero.nombre_completo')));
        $this->set(compact('mesas', 'meseros'));
    }
}