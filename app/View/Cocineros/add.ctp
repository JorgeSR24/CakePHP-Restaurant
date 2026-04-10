<h1>Crear Nuevo Cocinero</h1>

<?php
echo $this->Form->create('Cocinero');
echo $this->Form->input('nombre');
echo $this->Form->input('apellido');
echo $this->Form->end('Crear Cocinero');
echo $this->Html->link('Volver', array('controller' => 'Cocineros', 'action' => 'index'));
?>