
<h1>Lista de Cocineros  </h1>

<?php

echo $this->Html->link('Crear Nuevo Cocinero', array('controller' =>'Cocineros', 'action' => 'add'));
?>

<table class="table">
    <thead>
        <tr>
            <td>ID Cocinero</td>
            <td>Nombre</td>
            <td>Apellidos</td>
            <td>Creado</td>
            <td>Modificado</td>
            <td>Acciones</td>
        </tr>
    </thead>

    <tbody>
        <?php
            foreach($cocineros as $cocinero) : ?>
        <tr>
            <td><?= $cocinero['Cocinero']['id'] ?></td>
            <td><?= $cocinero['Cocinero']['nombre'] ?></td>
            <td><?= $cocinero['Cocinero']['apellido'] ?></td>
            <td><?= $this->Time->format('d-m-Y | h:i A' ,$cocinero['Cocinero']['created'])  ?></td>
            <td><?= $this->Time->format('d-m-Y | h:i A' ,$cocinero['Cocinero']['modified'])  ?></td>
            <td>
                <?= $this->Html->link('Detalle', array('controller' => 'Cocineros', 'action' => 'view', $cocinero['Cocinero']['id'])) ?>
                <?= $this->Html->link('Editar', array('controller' => 'Cocineros', 'action' => 'edit', $cocinero['Cocinero']['id'])) ?>
                <?= $this->Form->postLink('Eliminar', array('controller' =>'Cocineros', 'action' => 'delete', $cocinero['Cocinero']['id']), array('confirm' => '¿Estás seguro de eliminar el cocinero? ' . $cocinero['Cocinero']['nombre'])) ?>
            </td>
            
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
