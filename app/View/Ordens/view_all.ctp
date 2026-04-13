<?php
$this->Paginator->options(array(
    'update' => '#contenedor-ordens',
    'before' => $this->Js->get('#processando')->effect('fadeIn'),array('buffer' => false),
    'complete' => $this->Js->get('#processando')->effect('fadeOut'),array('buffer' => false)
));

?>

<?php if(empty($ordens)): ?>
    <h2>No existen ordenes disponibles.</h2>
<?php else: ?>


<div id="contenedor-ordens">
    <h1>Lista de Ordenes</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Mesa</th>
                <th><?php echo $this->Paginator->sort('Nombre Cliente'); ?></th>
                <th>Platillo ID</th>
                <th>Cantidad</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ordens as $orden): ?>
                <tr>
                    <td><?php echo $orden['Mesa']['codigo']; ?></td>
                    <td><?php echo $orden['Orden']['cliente']; ?></td>
                    <td><?php echo $orden['Orden']['dni']; ?></td>
                    <td><?php echo $orden['Orden']['total']; ?></td>
                    <td><?php echo $this->Time->format('d-m-Y h:i A', h($orden['Orden']['created'])); ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link('Ver Pedidos', array('controller' => 'Orden_items', 'action' => 'view', $orden['Orden']['id']), array('class' => 'btn btn-sm btn-info')); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php endif; ?>