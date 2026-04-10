<?php

class MeserosController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash', 'Time', 'Paginator', 'Js');
    public $components = array('Flash', 'Paginator', 'Session', 'RequestHandler');

    public $paginate = array(
        'limit' => 4,
        'order' => array(
            'Mesero.id' => 'asc'
        )
    );

    public function index() {
    
    $this->Mesero->recursive = 0;

    $this->paginate['Mesero']['limit'] = 4;
    $this->paginate['Mesero']['order'] = array('Mesero.id' => 'asc');
    $this->Paginator->settings = $this->paginate;
        $meseros = $this->Paginator->paginate();
        $this->set('meseros', $meseros);
    }

    public function view ($id = null){
        if (!$id){
            throw new NotFoundException("Datos invalidos");
        }

        $mesero = $this->Mesero->findById($id);

        if(!$mesero) {
            throw new NotFoundException("El mesero no Existe");
        }
            

        $this->set('mesero', $mesero);
    }

    public function add(){
        if($this->request->is('POST')){
            $this->Mesero->create();

            if($this->Mesero->save($this->request->data)){
                $this->Flash->success('El Mesero ha sido creado');
                return $this->redirect(array('action' => 'index'));
            }
            else{
                $this->Flash->error('No se puedo crear el Mesero');
            }
        }
    }

    public function edit($id = null){
        if(!$id){
            throw new NotFoundException("Mesero invalido");
        }

        $mesero = $this->Mesero->findById($id);
        
        if(!$mesero){
            throw new NotFoundException("Mesero invalido");
        }

        if($this->request->is(array('POST', 'PUT'))){
            $this->Mesero->id = $id;

            if($this->Mesero->save($this->request->data)){
                $this->Flash->success("Mesero ha sido modificado");
                return $this->redirect(array('action' => 'index'));
            }
            else{
                $this->Flash->success("No se ha podido actualizar");
            }
        }

        if(!$this->request->data){
            $this->request->data = $mesero;
        }
    }

    public function delete($id){
        if($this->request->is('GET')){
            throw new MethodNotAllowedException("Metodo no permitido");
        }

         $this->request->allowMethod(['post']);
        if($this->Mesero->delete($id)){
            $this->Flash->success(__("El Mesero con id: %s ha sido eliminado", h($id)));
        }
        else{
            $this->Flash->error(__("El Mesero con id: %s no pudo ser eliminado", h($id)));
            
        }

        return $this->redirect(array('action' => 'index'));
    }
}