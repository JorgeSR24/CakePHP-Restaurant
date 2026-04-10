<h1>Lista de Platos</h1>

<?php
echo $this->Html->link('Crear Nuevo Plato', array('controller' => 'Platillos', 'action' => 'add'), array('class' => 'btn btn-primary mb-3'));
?>


<?php
if (!empty($platillos)): ?>
    <div class="grid">
        
            <?php foreach ($platillos as $platillo): ?>
                <div class="col col-md-3">
                    <div class="card">
                        <img src='<?php echo $this->Html->url("/app/webroot/img/" . $platillo['Platillo']['foto']); ?>' alt="<?= $platillo['Platillo']['nombre'] ?>" style="width: 400px; height: auto;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $platillo['Platillo']['nombre'] ?></h5>
                            <p class="card-text"><?= $platillo['Platillo']['descripcion'] ?></p>
                            <p class="card-text"><small class="text-muted">Precio: $<?= $platillo['Platillo']['precio'] ?></small></p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-tools-kitchen-3">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M7 4v17m-3 -17v3a3 3 0 1 0 6 0v-3" />
                                <path d="M14 8a3 4 0 1 0 6 0a3 4 0 1 0 -6 0" />
                                <path d="M17 12v9" />
                            </svg>
                            <p class="card-text"><small class="text-muted"><?= $platillo['CategoriaPlatillo']['categoria'] ?></small></p>

                        </div>
                        <div class="card-footer">
                            <?= $this->Html->link('Ver', array('controller' => 'Platillos', 'action' => 'view', $platillo['Platillo']['id']), array('class' => 'btn btn-info')) ?>
                            <?= $this->Form->postLink('Eliminar',
                                array('controller' => 'Platillos', 'action' => 'delete', $platillo['Platillo']['id']),
                                array(
                                    'confirm' => '¿Estás seguro de eliminar el plato "' . $platillo['Platillo']['nombre'] . '"?',
                                    'class' => 'btn btn-danger'
                                )
                            ) ?>

                        </div>
                    
                </div>
             </div>   
            <?php endforeach; ?>
        
    </div>
<?php endif; ?>

<style>
.grid{
	display: grid;  
    grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
    gap: 20px;
}
</style>