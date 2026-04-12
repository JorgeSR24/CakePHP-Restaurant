<?php

class OrdensController extends AppController
{
    public $components = array('Paginator', 'Session');
    public $helpers = array('Html', 'Form');

    public function index()
    {
        $this->Orden->recursive = 0;
        $this->set('ordens', $this->Paginator->paginate());
    }

    public function view($id = null)
    {
        if (!$id) {
            throw new NotFoundException(__('Orden no encontrada'));
        }

        $orden = $this->Orden->findById($id);
        if (!$orden) {
            throw new NotFoundException(__('Orden no encontrada'));
        }
        $this->set(compact('orden'));
    }

    public function add()
    {
                 
          
        // $mesas = $this->Orden->Mesa->find('list');
    
        //$this->autoRender = false;
        

        if($this->request->is('post')) {

            $this->loadModel('Pedido');

            $ordensItems = $this->Pedido->find('all', array('order' => array('Pedido.id ASC')));

            if(count($ordensItems) === 0){
                $this->Session->setFlash(__('No hay pedidos para crear una orden.'), 'default', array('class' => 'alert alert-info'));
                return $this->redirect(array('controller' => 'Pedidos', 'action' => 'index'));
            }

            $totalPedidos = $this->Pedido->find('all', array(
             'fields' => array('SUM(Pedido.subtotal) AS total')
            ));

            $totalPedidosCantidad = $totalPedidos[0][0]['total'];
            $mesas = $this->Orden->Mesa->find('list');
            $this->set(compact('ordensItems', 'totalPedidosCantidad', 'mesas'));

            $this->Orden->create();

           

            if ($this->Orden->save($this->request->data)) {
                $this->Session->setFlash(__('La orden ha sido guardada.'));
                return $this->redirect(array('controller' => 'Pedidos', 'action' => 'index'));
            }
        $this->Session->setFlash(__('No se pudo guardar la orden. Por favor, inténtalo de nuevo.'));
        }
        
    
    }
}