<h2>Crear nueva Mesa</h2>
<?php

echo $this->Form->create('Mesa');


echo $this->Form->input('codigo');

echo $this->Form->input('tipo');

echo $this->Form->input('descripcion');

echo $this->Form->input('mesero_id', array('options' => $meseros));


 echo $this->Form->end('Crear Mesa');

 echo $this->Html->link('Volver', array('controller' => 'Mesas', 'action' => 'index'));

 ?>