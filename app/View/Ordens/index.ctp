<div class="container">

<div class="row">

    <div class="col-md-6">
        <?php echo $this->Form->create('Orden', array('controller' => 'Ordens', 'url' => 'add'), array('class' => 'form-horizontal')); ?>
        <fieldset>
            <h1>Agregar Orden</h1>

            <?php echo $this->Form->input('cliente', array('type' => 'text', 'class' => 'form-control')); ?>
            <?php echo $this->Form->input('dni', array('type' => 'text', 'class' => 'form-control')); ?>
            <?php echo $this->Form->input('mesa_id', array('type' => 'select', 'class' => 'form-control form-group', 'options' => $mesas)); ?>
        </fieldset>

        <h2>Pedidos</h2>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Platillo</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ordensItems as $item): ?>
                    <tr>
                        <td><?= $item['Platillo']['nombre']; ?></td>
                        <td>$<?= $item['Platillo']['precio']; ?></td>
                        <td><?= $item['Pedido']['cantidad']; ?></td>
                        <td>$<?= $item['Pedido']['subtotal']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <p>
            <span>Total Orden:</span>
            <span>$<?= $totalPedidosCantidad; ?></span>
        <?php echo $this->Form->input('total', array('type' => 'hidden', 'value' => $totalPedidosCantidad)); ?>
        </p>

    </div>

    <?php echo $this->Form->end(array('label' => 'Procesar Orden', 'class' => 'btn btn-primary')); ?>
