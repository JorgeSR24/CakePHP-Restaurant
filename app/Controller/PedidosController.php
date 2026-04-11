<?php

App::uses('AppController', 'Controller');

class PedidosController extends AppController
{

    public $components = array('Session', 'Paginator', 'RequestHandler');
    public $helpers = array('Html', 'Form', 'Time');

    public function index()
    {
        $this->Pedido->recursive = 0;
        $pedidos = $this->Pedido->find('all');
        //$pedidos = $this->Paginator->paginate();

        $totalPedidos = $this->Pedido->find('all', array(
            'fields' => array('SUM(Pedido.subtotal) AS total')
        ));
        
        if(count($pedidos) === 0){
            $this->Session->setFlash(__('No hay pedidos en este momento.'), 'default', array('class' => 'alert alert-info'));
        }

        $this->set('pedidos', $pedidos);
        $this->set('totalPedidos', $totalPedidos);
    }

    public function view($id = null)
    {
        if (!$id) {
            throw new NotFoundException(__('Pedido no encontrado'));
        }

        $pedido = $this->Pedido->findById($id);
        if (!$pedido) {
            throw new NotFoundException(__('Pedido no encontrado'));
        }
        $this->set(compact('pedido'));
    }

  public function add()
{
    $this->autoRender = false;
    
    if ($this->request->is('ajax')) {

        $id = $this->request->data['id'];
        $cantidad = $this->request->data['cantidad'];

        // 🔍 Obtener precio
        $platillo = $this->Pedido->Platillo->find('first', [
            'fields' => ['Platillo.precio'],
            'conditions' => ['Platillo.id' => $id]
        ]);

        $precio = $platillo['Platillo']['precio'];

        // 🔍 Buscar si ya existe
        $existePedido = $this->Pedido->find('first', [
            'conditions' => ['Pedido.platillo_id' => $id]
        ]);

        if ($existePedido) {

            // 🔁 YA EXISTE → SUMAR CANTIDAD
            $this->Pedido->id = $existePedido['Pedido']['id'];

            $nuevaCantidad = $existePedido['Pedido']['cantidad'] + $cantidad;
            $nuevoSubtotal = $nuevaCantidad * $precio;

            $this->Pedido->save([
                'cantidad' => $nuevaCantidad,
                'subtotal' => $nuevoSubtotal
            ]);

            echo json_encode([
                'success' => true,
                'cantidad' => $nuevaCantidad,
                'subtotal' => $nuevoSubtotal,
                'msg' => 'Cantidad actualizada'
            ]);

        } else {

            // 🆕 NO EXISTE → CREAR
            $subtotal = $cantidad * $precio;

            $pedido = [
                'platillo_id' => $id,
                'cantidad' => $cantidad,
                'subtotal' => $subtotal
            ];

            $this->Pedido->create();
            $this->Pedido->save($pedido);

            echo json_encode([
                'success' => true,
                'cantidad' => $cantidad,
                'subtotal' => $subtotal,
                'msg' => 'Producto agregado'
            ]);
        }

        exit;
    }
}

    public function delete($id){
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }

        $pedido = $this->Pedido->findById($id);
        if (!$pedido) {
            throw new NotFoundException(__('Pedido no encontrado'));
        }

        if ($this->Pedido->delete($id)) {
            $this->Flash->success(__('El pedido ha sido eliminado.'), array('class' => 'alert alert-success'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('No se pudo eliminar el pedido. Por favor, inténtalo de nuevo.'), array('class' => 'alert alert-danger'));
    }

    public function deleteAll(){
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Pedido->deleteAll(true)) {
            $this->Flash->success(__('Todos los pedidos han sido eliminados.'), array('class' => 'alert alert-success'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('No se pudieron eliminar los pedidos. Por favor, inténtalo de nuevo.'), array('class' => 'alert alert-danger'));
    }
}