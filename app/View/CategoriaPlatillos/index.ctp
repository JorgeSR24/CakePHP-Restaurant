<h1>Categoria de Platos</h1>
<?php
echo $this->Html->link('Crear Nueva Categoria', array('controller' =>'CategoriaPlatillos', 'action' => 'add'));
?>

<table>
    <thead>
        <tr>
            <td>ID</td>
            <td>Nombre</td>
            <td>Acciones</td>
        </tr>

    </thead>

    <tbody>
        <?php
            foreach($categoriaPlatillos as $categoriaPlatillo) : ?>
        <tr>
            <td><?= $categoriaPlatillo['CategoriaPlatillo']['id'] ?></td>
            <td><?= $categoriaPlatillo['CategoriaPlatillo']['categoria'] ?></td>
            <td><?= $this->Html->link('Editar', array('controller' =>'CategoriaPlatilllos', 'action' => 'edit', $categoriaPlatillo['CategoriaPlatillo']['id'])) ?></td>
            <td><?= $this->Form->postLink('Eliminar', array('controller' =>'CategoriaPlatilllos', 'action' => 'delete', $categoriaPlatillo['CategoriaPlatillo']['id']), array('confirm' => '¿Estás seguro de eliminar la categoria? ' . $categoriaPlatillo['CategoriaPlatillo']['categoria'])) ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>