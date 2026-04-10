<h1>Agregar Plato</h1>

<?php
echo $this->Form->create('Platillo', array('type' => 'file'));
echo $this->Form->input('nombre', array('label' => 'Nombre del Plato', 'class' => 'form-control'));
echo $this->Form->input('descripcion', array('label' => 'Descripción', 'class' => 'form-control'));
echo $this->Form->input('precio', array('label' => 'Precio', 'class' => 'form-control'));
echo $this->Form->input('foto', array('type' => 'file', 'label' => 'Imagen del Plato', 'class' => 'form-control'));
echo $this->Form->input('categoria_platillo_id', array(
    'label' => 'Categoría',
    'options' => $categorias,
    'empty' => 'Selecciona una categoría',
    'class' => 'form-control'
));
echo $this->Form->input('Cocinero', array(
    'label' => 'Cocineros',
    'type' => 'select',
    'multiple' => true,
    'options' => $cocineros,
    'class' => 'form-control'
));
echo $this->Form->end('Crear Plato'); 

?>