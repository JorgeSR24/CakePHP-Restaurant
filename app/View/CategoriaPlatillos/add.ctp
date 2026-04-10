<h1>Crear nueva Categoria Plato</h1>

<?php
echo $this->Form->create('CategoriaPlatillo'); 
echo $this->Form->input('categoria');
echo $this->Form->end('Guardar Categoria');

?>