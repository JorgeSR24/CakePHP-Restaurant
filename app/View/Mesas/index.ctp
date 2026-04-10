<h1>Lista de Mesas</h1>

<?php
echo $this->Html->link('Crear Nueva Mesa', array('controller' =>'Mesas', 'action' => 'add'));
?>

<table class="table">
    <thead>
        <tr>
            <td>ID Mesa</td>
            <td>Código Mesa</td>
            <td>Descripción Mesa</td>
            <td>Creada</td>
            <td>Modificada</td>
            <td>Encargado</td>
            <td>Acciones</td>
        </tr>
    </thead>

    <tbody>
        <?php
            foreach($mesas as $mesa) : ?>
        <tr>
            <td><?= $mesa['Mesa']['id'] ?></td>
            <td><?= $mesa['Mesa']['codigo'] ?></td>
            <td><?= $mesa['Mesa']['descripcion'] ?></td>
            <td><?= $this->Time->format('d-m-Y | h:i A' ,$mesa['Mesa']['created'])  ?></td>
            <td><?= $this->Time->format('d-m-Y | h:i A' ,$mesa['Mesa']['modified'])  ?></td>
            <td><?= $this->Html->link($mesa['Mesero']['nombre'], array('controller' =>'Meseros', 'action' => 'view', $mesa['Mesero']['id'])) ?></td>
            <td><?= $this->Html->link('Editar', array('controller' =>'Mesas', 'action' => 'edit', $mesa['Mesa']['id'])) ?></td>
            <td><?= $this->Form->postLink('Eliminar', array('controller' =>'Mesas', 'action' => 'delete', $mesa['Mesa']['id']), array('confirm' => '¿Estás seguro de eliminar la mesa? ' . $mesa['Mesa']['codigo'])) ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>


<?php echo $this->Html->link('Volver', array('controller' => 'Meseros', 'action' => 'index')); ?>