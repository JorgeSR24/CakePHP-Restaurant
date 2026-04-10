<h1>Editar Plato</h1>

<?php
echo $this->Form->create('Platillo', array('type' => 'file'));
echo $this->Form->input('nombre', array('value' => $platillo['Platillo']['nombre']));
echo $this->Form->input('descripcion', array('value' => $platillo['Platillo']['descripcion']));
echo $this->Form->input('precio', array('value' => $platillo['Platillo']['precio']));
if(isset($platillo['Platillo']['foto']) && !empty($platillo['Platillo']['foto'])) {
    echo '<p>Imagen actual:</p>';
    echo '<img src="' . $this->Html->url("/app/webroot/img/" . $platillo['Platillo']['foto']) . '" alt="' . $platillo['Platillo']['nombre'] . '" style="width: 100px; height: auto;">';
}
echo $this->Form->input('foto', array('type' => 'file', 'label' => 'Imagen del Plato'));
echo $this->Form->input('categoria_platillo_id', array(
    'label' => 'Categoría',
    'options' => $categorias,
    'empty' => 'Selecciona una categoría',
    'default' => $platillo['Platillo']['categoria_platillo_id']
));
echo $this->Form->input('Cocinero', array(
    'label' => 'Cocineros',
    'type' => 'select',
    'multiple' => true,
    'options' => $cocineros,
    'class' => 'form-control',
    'default' => Hash::extract($platillo['Cocinero'], '{n}.id')
));
echo $this->Form->end('Actualizar Plato'); 
?>