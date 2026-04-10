<h2>Crear un Nuevo Mesero</h2>
<?php

echo $this->Form->create('Mesero');


echo $this->Form->input('dni');

echo $this->Form->input('nombre');

echo $this->Form->input('apellidos');

 echo $this->Form->end('Crear Mesero');

 ?>