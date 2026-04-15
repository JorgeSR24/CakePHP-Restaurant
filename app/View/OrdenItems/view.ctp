<?php
$this->Paginator->options(array(
    'update' => '#contenedor-ordens',
    'before' => $this->Js->get('#processando')->effect('fadeIn'),array('buffer' => false),
    'complete' => $this->Js->get('#processando')->effect('fadeOut'),array('buffer' => false)
));

?>

<div>
    <div>
        <h2>Detalles de la Orden <?php echo $ordenItems[0]['OrdenItem']['orden_id']; ?></h2>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('Platillo'); ?></th>
                <th><?php echo $this->Paginator->sort('Cantidad'); ?></th>
                <th><?php echo $this->Paginator->sort('Subtotal'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ordenItems as $item): ?>
                <tr>
                    <td><?php echo $item['Platillo']['nombre']; ?></td>
                    <td><?php echo $item['OrdenItem']['cantidad']; ?></td>
                    <td><?php echo $item['OrdenItem']['subtotal']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h3>Total: <?php echo $ordenItems[0]['OrdenItem']['subtotal']; ?></h3>

    <?php echo $this->Html->link('Volver a Ordenes', array('controller' => 'Ordens', 'action' => 'viewAll'), array('class' => 'btn btn-primary')); ?>

</div>