<h1>Lista de Meseros</h1>

<?= $this->Html->link(
    'Crear Mesero',
    array('controller' => 'Meseros',
         'action' => 'add'),
    array('class' => 'btn btn-primary')
); ?>

<table class="table">
   <thead>
    <tr>
        <th><?= $this->Paginator->sort('id', 'Id') ?></th>
        <th><?= $this->Paginator->sort('dni', 'DNI') ?></th>
        <th><?= $this->Paginator->sort('nombre', 'Nombre') ?></th>
        <th><?= $this->Paginator->sort('apellidos', 'Apellidos') ?></th>
        <th><?= $this->Paginator->sort('created', 'Creada') ?></th>
        <th><?= $this->Paginator->sort('modified', 'Modificada') ?></th>
        <th>Acciones</th>
    </tr>
</thead>

    <tbody>
        <?php
            foreach($meseros as $mesero) : ?>
        <tr>
            <td><?= $mesero['Mesero']['id'] ?></td>
            <td><?= $mesero['Mesero']['dni'] ?></td>
            <td><?= $mesero['Mesero']['nombre'] ?></td>
            <td><?= $mesero['Mesero']['apellidos'] ?></td>
            <td><?= $this->Time->format('d-m-Y | h:i A' ,$mesero['Mesero']['created'])  ?></td>
            <td><?= $mesero['Mesero']['modified'] ?> </td>
            <td>
                <?= $this->Html->link('Detalle', array('controller' => 'meseros', 'action' => 'view', $mesero['Mesero']['id'])) ?>
                <?= $this->Html->link('Editar', array('controller' => 'meseros', 'action' => 'edit', $mesero['Mesero']['id'])) ?>
                <?= $this->Form->postLink('Eliminar', array('action' => 'delete', $mesero['Mesero']['id']), array('confirm' => '¿Estás seguro de eliminar a '. $mesero['Mesero']['nombre'] .'?')) ?>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>


<?= $this->Html->link(
    'Ver Mesas',
    array('controller' => 'Mesas',
         'action' => 'index')
); ?>

<div class="pager">
   <?php echo $this->Paginator->prev('« Anterior') ?>
   <?php echo $this->Paginator->numbers() ?>        
   <?php echo $this->Paginator->next('Siguiente »') ?>             


</div>