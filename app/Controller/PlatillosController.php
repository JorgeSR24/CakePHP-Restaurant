<?php

App::uses('AppController', 'Controller');


class PlatillosController extends AppController
{

    public $components = array('Paginator');

    public function index()
    {
        $this->Platillo->recursive = 0;
        // $platillos = $this->Platillo->find('all');
        $platillos = $this->Paginator->paginate();
        $this->set('platillos', $platillos);
    }

    public function view($id = null)
    {
        if (!$id) {
            throw new NotFoundException(__('Platillo no encontrado'));
        }

        $platillo = $this->Platillo->findById($id);
        if (!$platillo) {
            throw new NotFoundException(__('Platillo no encontrado'));
        }
        $this->set(compact('platillo'));
    }

    public function add()
    {

        $categorias = $this->Platillo->CategoriaPlatillo->find('list');
        $cocineros = $this->Platillo->Cocinero->find('list');
        $this->set(compact('categorias', 'cocineros'));

        if ($this->request->is('post')) {
            $fileObjecto = $this->request->data['Platillo']['foto'];

            if ($fileObjecto['error'] === UPLOAD_ERR_OK) {
                $fileName = $fileObjecto['name'];
                $fileExtension = $fileObjecto['type'];
                $allowedExtensions = array('image/jpeg', 'image/png', 'image/gif');
                if (in_array($fileExtension, $allowedExtensions)) {
                    $uploadPath = WWW_ROOT . 'img' . DS . 'platillos' . DS;
                    $uploadFile = $uploadPath . $fileName;

                    if ($fileObjecto['size'] < 200000000 && is_uploaded_file($fileObjecto['tmp_name'])) {
                        move_uploaded_file($fileObjecto['tmp_name'], $uploadFile);
                        $this->request->data['Platillo']['foto'] = 'platillos/' . $fileName;
                    } else {
                        $this->Flash->error(__('El archivo es demasiado grande. El tamaño máximo permitido es de 2MB.'));
                        $this->request->data['Platillo']['foto'] = null; // O puedes asignar una imagen por defecto
                        return;
                    }
                } else {
                    $this->Flash->error(__('No se permite la subida. Solo se permiten imágenes JPEG, PNG o GIF.'));
                    $this->request->data['Platillo']['foto'] = null;
                    return;
                }


                $this->Platillo->create();
                if ($this->Platillo->save($this->request->data)) {
                    $this->Flash->success(__('El platillo ha sido guardado.'));
                    return $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->Flash->error(__('Error al subir la imagen. Por favor, inténtalo de nuevo.'));
                $this->request->data['Platillo']['foto'] = null; // O puedes asignar una imagen por defecto
            }
        }
    }
    public function edit($id = null)
    {
        if (!$id) {
            throw new NotFoundException(__('Platillo no encontrado'));
        }

        $platillo = $this->Platillo->findById($id);
        if (!$platillo) {
            throw new NotFoundException(__('Platillo no encontrado'));
        }

        $categorias = $this->Platillo->CategoriaPlatillo->find('list');
        $cocineros = $this->Platillo->Cocinero->find('list');
        $this->set(compact('categorias', 'cocineros', 'platillo'));

        if ($this->request->is(array('post', 'put'))) {
            $this->Platillo->id = $id;
            $fileObjecto = $this->request->data['Platillo']['foto'];
            if (!empty($fileObjecto['name'])) {
                if ($fileObjecto['error'] === UPLOAD_ERR_OK) {
                    $fileName = $fileObjecto['name'];
                    $uploadPath = WWW_ROOT . 'img' . DS . 'platillos' . DS;
                    $uploadFile = $uploadPath . $fileName;

                    if ($fileObjecto['size'] < 2000000 && is_uploaded_file($fileObjecto['tmp_name'])) {
                        if (move_uploaded_file($fileObjecto['tmp_name'], $uploadFile)) {
                            $this->request->data['Platillo']['foto'] = 'platillos/' . $fileName;
                        } else {
                            $this->Flash->error(__('Error al subir la imagen. Por favor, inténtalo de nuevo.'));
                            return;
                        }
                    } else {
                        $this->request->data['Platillo']['foto'] = null; // O puedes asignar una imagen por defecto
                    }
                } else {
                    $this->request->data['Platillo']['foto'] = null; // O puedes asignar una imagen por defecto
                }
            } else {
                $this->request->data['Platillo']['foto'] = $platillo['Platillo']['foto']; // Mantener la imagen actual si no se sube una nueva
            }

            if ($this->Platillo->save($this->request->data)) {
                $this->Flash->success(__('El platillo ha sido actualizado.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('No se pudo actualizar el platillo. Por favor, inténtalo de nuevo.'));
        }

        if (!$this->request->data) {
            $this->request->data = $platillo;
        }
    }

    public function delete($id = null)
    {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }

        $platillo = $this->Platillo->findById($id);
        if (!$platillo) {
            throw new NotFoundException(__('Platillo no encontrado'));
        }

        if ($this->Platillo->delete($id)) {
            $this->Flash->success(__('El platillo ha sido eliminado.'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('No se pudo eliminar el platillo. Por favor, inténtalo de nuevo.'));
    }
}
