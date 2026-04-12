<div class="container">

<div class="row">

    <div class="col-md-6">
        <?php echo $this->Form->create('Orden', array('class' => 'form-horizontal')); ?>
        <fieldset>
            <h1>Agregar Orden</h1>

            <?php echo $this->Form->label('Cliente'); ?>
            <?php echo $this->Form->input('cliente', array('type' => 'text', 'class' => 'form-control')); ?>
            <?php echo $this->Form->label('DNI'); ?>
            <?php echo $this->Form->input('dni', array('type' => 'text', 'class' => 'form-control')); ?>
            <?php echo $this->Form->label('Mesa'); ?>
            <?php echo $this->Form->select('mesa_id', $mesas, array('class' => 'form-control')); ?>
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
                        <td>$<?= $item['Pedido']['precio']; ?></td>
                        <td><?= $item['Pedido']['cantidad']; ?></td>
                        <td>$<?= $item['Pedido']['subtotal']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
    <h1>Agregar Orden</h1>

    <?php echo $this->Form->create('Orden'); ?>
    <div class="form-group">
        <?php echo $this->Form->label('Mesa'); ?>
        <?php echo $this->Form->select('mesa_id', $mesas, array('class' => 'form-control')); ?>
    </div>
    <div class="form-group

</div>