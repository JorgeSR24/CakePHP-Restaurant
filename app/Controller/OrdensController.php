<?php

class OrdensController extends AppController
{
    public $components = array('Paginator', 'Session');
    public $helpers = array('Html', 'Form');

    public $paginate = array(
        'limit' => 10,
        'order' => array('Orden.id' => 'desc')
    );

    public function index()
    {
        $this->Orden->recursive = 0;
        $this->set('ordens', $this->Paginator->paginate());

        $this->loadModel('Pedido');
        $ordensItems = $this->Pedido->find('all', array('order' => array('Pedido.id ASC')));
        
        if (count($ordensItems) === 0) {
            $this->Session->setFlash(__('No hay pedidos para crear una orden.'), 'default', array('class' => 'alert alert-info'));
            return $this->redirect(array('controller' => 'Pedidos', 'action' => 'index'));
        }

        $totalPedidos = $this->Pedido->find('all', array(
            'fields' => array('SUM(Pedido.subtotal) AS total')
        ));

        $totalPedidosCantidad = $totalPedidos[0][0]['total'];

        $mesas = $this->Orden->Mesa->find('list');
        $this->set(compact('ordensItems', 'totalPedidosCantidad', 'mesas'));

    }

    public function viewAll()
    {
        $this->Orden->recursive = 0;
        $ordens = $this->paginate('Orden');
        $this->set('ordens', $ordens);
    }


    public function add()
    {
        $this->loadModel('Pedido');
        $ordensItems = $this->Pedido->find('all', array('order' => array('Pedido.id ASC')));
        $totalPedidos = $this->Pedido->find('all', array(
            'fields' => array('SUM(Pedido.subtotal) AS total')
        )); 
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $this->Orden->create();
            if ($this->Orden->save($this->request->data)) {
                $id_orden = $this->Orden->id;

                foreach ($ordensItems as $item) {
                    $this->Orden->OrdenItem->create();
                    $this->Orden->OrdenItem->save(array(
                        'orden_id' => $id_orden,
                        'platillo_id' => $item['Pedido']['platillo_id'],
                        'cantidad' => $item['Pedido']['cantidad'],
                        'subtotal' => $item['Pedido']['subtotal']
                    ));
                }
                $this->Pedido->deleteAll(1, false);
                $this->Session->setFlash(__('La orden ha sido guardada con éxito.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('controller' => 'Platillos', 'action' => 'index'));
            }
            else
            {
                $this->Session->setFlash(__('No se pudo guardar la orden. Por favor, inténtalo de nuevo.'), 'default', array('class' => 'alert alert-danger'));
            }
        }


    }
}
