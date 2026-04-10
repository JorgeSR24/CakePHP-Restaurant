<?php

App::uses('AppController', 'Controller');

class CategoriaPlatillosController extends AppController {

    public $components = array('Paginator');

    public function index() {
        $this->CategoriaPlatillo->recursive = 0;
        // $categoriaPlatillos = $this->CategoriaPlatillo->find('all');
        $categoriaPlatillos = $this->Paginator->paginate();
        $this->set('categoriaPlatillos', $categoriaPlatillos);
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Categoría de Platillo no encontrada'));
        }

        $categoriaPlatillo = $this->CategoriaPlatillo->findById($id);
        if (!$categoriaPlatillo) {
            throw new NotFoundException(__('Categoría de Platillo no encontrada'));
        }
        $this->set(compact('categoriaPlatillo'));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->CategoriaPlatillo->create();
            if ($this->CategoriaPlatillo->save($this->request->data)) {
                $this->Flash->success(__('La categoría de platillo ha sido guardada.'));
                return $this->redirect(array('action' => 'index'));
            }
            debug($this->CategoriaPlatillo->validationErrors);
            $this->Flash->error(__('No se pudo guardar la categoría de platillo. Por favor, inténtalo de nuevo.'));
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Categoría de Platillo no encontrada'));
        }

        $categoriaPlatillo = $this->CategoriaPlatillo->findById($id);
        if (!$categoriaPlatillo) {
            throw new NotFoundException(__('Categoría de Platillo no encontrada'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->CategoriaPlatillo->id = $id;
            if ($this->CategoriaPlatillo->save($this->request->data)) {
                $this->Flash->success(__('La categoría de platillo ha sido actualizada.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('No se pudo actualizar la categoría de platillo. Por favor, inténtalo de nuevo.'));
        }

        if (!$this->request->data) {
            $this->request->data = $categoriaPlatillo;
        }
    }
    
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }

        if (!$id) {
            throw new NotFoundException(__('Categoría de Platillo no encontrada'));
        }

        if ($this->CategoriaPlatillo->delete($id)) {
            $this->Flash->success(__('La categoría de platillo ha sido eliminada.'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('No se pudo eliminar la categoría de platillo. Por favor, inténtalo de nuevo.'));
        return $this->redirect(array('action' => 'index'));
    }   

}