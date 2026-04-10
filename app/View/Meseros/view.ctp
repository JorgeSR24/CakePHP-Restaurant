<h1>Bienvenido <strong> <?= $mesero['Mesero']['nombre'] ?> </strong> </h1>

<h2>Vista detallada del candidato</h2>

<p>ID Mesero: <?= $mesero['Mesero']['id'] ?> </p>
<p>Dni Mesero: <?= $mesero['Mesero']['dni'] ?> </p>
<p>Nombre Mesero: <?= $mesero['Mesero']['nombre'] ?> </p>
<p>Apellidos Mesero: <?= $mesero['Mesero']['apellidos'] ?> </p>
<p>Fecha Creación Mesero: <?= $mesero['Mesero']['created'] ?> </p>

<h3>Encargado de las mesas: </h3>

<?php if (empty($mesero['Mesa'])) : ?>
    <p> No tiene mesas asignadas </p>
<?php endif; ?>

<ul>
    <?php foreach($mesero['Mesa'] as $mesa) : ?>
        <li>Código Mesa: <?= $mesa['codigo'] ?> - Capacidad Mesa: <?= $mesa['descripcion'] ?> </li>
    <?php endforeach; ?>
</ul>

<?=  $this->Html->link('Volver', array('controller' =>'Meseros', 'action' => 'index')) ?>