<?php

App::uses('AppController', 'Controller');


class CocinerosController extends AppController {

    public $components = array('Paginator');

    public function index() {
        $this->Cocinero->recursive = 0;
        // $cocineros = $this->Cocinero->find('all');
        $cocineros = $this->Paginator->paginate();
        $this->set('cocineros', $cocineros);
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Cocinero no encontrado'));
        }

        $cocinero = $this->Cocinero->findById($id);
        if (!$cocinero) {
            throw new NotFoundException(__('Cocinero no encontrado'));
        }
        $this->set(compact('cocinero'));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Cocinero->create();
            if ($this->Cocinero->save($this->request->data)) {
                $this->Flash->success(__('El cocinero ha sido guardado.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('No se pudo guardar el cocinero. Por favor, inténtalo de nuevo.'));
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Cocinero no encontrado'));
        }

        $cocinero = $this->Cocinero->findById($id);
        if (!$cocinero) {
            throw new NotFoundException(__('Cocinero no encontrado'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Cocinero->id = $id;
            if ($this->Cocinero->save($this->request->data)) {
                $this->Flash->success(__('El cocinero ha sido actualizado.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('No se pudo actualizar el cocinero. Por favor, inténtalo de nuevo.'));
        }

        if (!$this->request->data) {
            $this->request->data = $cocinero;
        }
    }

    public function delete($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Cocinero no encontrado'));
        }

        $this->request->allowMethod('post', 'delete');

        if ($this->Cocinero->delete($id)) {
            $this->Flash->success(__('El cocinero ha sido eliminado.'));
        } else {
            $this->Flash->error(__('No se pudo eliminar el cocinero. Por favor, inténtalo de nuevo.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}