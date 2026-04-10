<h1>Detalle Cocinero</h1>
<p><strong>Nombre:</strong> <?= $cocinero['Cocinero']['nombre'] ?></p>
<p><strong>Apellido:</strong> <?= $cocinero['Cocinero']['apellido'] ?></p>
<p><strong>Creado:</strong> <?= $this->Time->format('d-m-Y | h:i A' ,$cocinero['Cocinero']['created'])  ?></p>
<p><strong>Modificado:</strong> <?= $this->Time->format('d-m-Y | h:i A' ,$cocinero['Cocinero']['modified'])  ?></p> 

<h3>Cocinero Asociado a los Platos </h3>

<ul>
    <?php foreach($cocinero['Platillo'] as $platillo) : ?>
        <li><?= $this->Html->link($platillo['nombre'], array('controller' => 'Platillos', 'action' => 'view', $platillo['id'])) ?></li>
    <?php endforeach ?>
</ul>
<?=  $this->Html->link('Volver', array('controller' =>'Cocineros', 'action' => 'index')) ?>