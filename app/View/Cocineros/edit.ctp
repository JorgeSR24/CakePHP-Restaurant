<h1>Editar Cocinero</h1>

<?php
echo $this->Form->create('Cocinero');
echo $this->Form->input('nombre');
echo $this->Form->input('apellido');
echo $this->Form->end('Guardar Cambios');
echo $this->Html->link('Volver', array('controller' => 'Cocineros', 'action' => 'index'));
?>