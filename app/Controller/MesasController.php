<?php

class MesasController extends AppController
{
    public $helpers = array('Html', 'Form', 'Flash', 'Time');
    public $components = array('Flash');

    public function index()
    {
        $mesas = $this->Mesa->find('all');
        $this->set('mesas', $mesas);
    }

    public function add()
    {
        if ($this->request->is('POST')) {
            $this->Mesa->create();

            if ($this->Mesa->save($this->request->data)) {
                $this->Flash->success('La Mesa ha sido creada');
                return $this->redirect(array('action' => 'index'));
                
            } else {
                $this->Flash->error('No se puedo crear la Mesa');
            }

            
        }

        $meseros = $this->Mesa->Mesero->find('list', array('fields' => array('Mesero.id', 'Mesero.nombre_completo')));
        $this->set(compact('meseros'));
    }

    public function edit($id = null){
        if(!$id){
            throw new NotFoundException("Mesa invalida");
        }

        $mesa = $this->Mesa->findById($id);
        $meseros = $this->Mesa->Mesero->find('list', array('fields' => array('Mesero.id', 'Mesero.nombre_completo')));
        
        
        if(!$mesa){
            throw new NotFoundException("Mesa invalida");
        }

        if($this->request->is(array('POST', 'PUT'))){
            $this->Mesa->id = $id;

            if($this->Mesa->save($this->request->data)){
                $this->Flash->success("Mesa ha sido modificada");
                return $this->redirect(array('action' => 'index'));
            }
            else{
                $this->Flash->error("No se ha podido actualizar");
            }
        }

        if(!$this->request->data){
            $this->request->data = $mesa;
        }

        $this->set(compact('meseros'));
    }

    public function delete($id)
    {
        if ($this->request->is('GET')) {
            throw new MethodNotAllowedException();
        }

         $this->request->allowMethod(['post']);
        if ($this->Mesa->delete($id)) {
            $this->Flash->success('La Mesa con id: ' . $id . ' ha sido eliminada.');
            return $this->redirect(array('action' => 'index'));
        }
    }

}
