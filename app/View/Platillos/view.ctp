<?php echo $this->Html->script('addToCart', array('inline' => false)); ?>


<h1>Detalles del Plato</h1>
<?= $this->Html->link('Editar', array('controller' => 'Platillos', 'action' => 'edit', $platillo['Platillo']['id']), array('class' => 'btn btn-warning')) ?>
<?php
echo '<h2>' . $platillo['Platillo']['nombre'] . '</h2>';
echo $this->Html->image('/img/' . $platillo['Platillo']['foto'], array('alt' => $platillo['Platillo']['nombre'], 'style' => 'width: 400px; height: auto;'));
echo '<p><strong>Descripción:</strong> ' . $platillo['Platillo']['descripcion'] . '</p>';
echo '<p><strong>Precio:</strong> $' . $platillo['Platillo']['precio'] . '</p>';
echo '<p><strong>Creado:</strong> ' . $this->Time->format('d-m-Y | h:i A' ,$platillo['Platillo']['created']) . '</p>';
echo '<p><strong>Modificado:</strong> ' . $this->Time->format('d-m-Y | h:i A' ,$platillo['Platillo']['modified']) . '</p>';
            if (!empty($platillo['Cocinero'])) {
                    foreach ($platillo['Cocinero'] as $cocinero) {
                        echo $this->Html->link(
                            $cocinero['nombre'],
                            array('controller' =>'Cocineros', 'action' => 'view', $cocinero['id'])
                        );
                        echo '<br>';
                    }
                } else {
                    echo 'Sin cocineros';
                }
               
echo $this->Form->button('Agregar al Pedido', array('class' => 'btn btn-success mb-3 addToCart', 'data-id' => $platillo['Platillo']['id'])); ?>

<div>
<?php echo $this->Html->link('Volver', array('controller' => 'Platillos', 'action' => 'index'), array('class' => 'btn btn-primary')); ?>
</div>     

