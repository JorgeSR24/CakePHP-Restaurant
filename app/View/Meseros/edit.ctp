<h2>Editar un Mesero</h2>

<?php

echo $this->Form->create('Mesero');


echo $this->Form->input('dni');

echo $this->Form->input('nombre');

echo $this->Form->input('apellidos');

echo $this->Form->end('Editar Mesero');

echo $this->Html->link('Volver', array('controller' => 'Meseros', 'action' => 'index'));

 ?>