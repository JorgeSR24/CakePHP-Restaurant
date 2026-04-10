<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
	<a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
		<svg class="bi me-2" width="40" height="32">
			<use xlink:href="#bootstrap"></use>
		</svg>
		<span class="fs-4">Restaurante</span>
	</a>

	<ul class="nav nav-pills">
		<li class="nav-item"><?php echo $this->Html->link('Inicio', array('controller' => 'Pages', 'action' => 'display'), array('class' => 'nav-link')); ?></li>
		<li class="nav-item"><?php echo $this->Html->link('Mesas', array('controller' => 'Mesas', 'action' => 'index'), array('class' => 'nav-link')); ?></li>
		<li class="nav-item"><?php echo $this->Html->link('Cocineros', array('controller' => 'Cocineros', 'action' => 'index'), array('class' => 'nav-link')); ?></li>
		<li class="nav-item"><?php echo $this->Html->link('Clientes', array('controller' => 'Clientes', 'action' => 'index'), array('class' => 'nav-link')); ?></li>
		<li class="nav-item">
			<?php echo $this->Html->link(
				'Platos',
				array('controller' => 'platillos', 'action' => 'index'),
				array('class' => 'nav-link')
			); ?>
		</li>
		<li class="nav-item"><?php echo $this->Html->link('Categorías de Platos', array('controller' => 'CategoriaPlatillos', 'action' => 'index'), array('class' => 'nav-link')); ?></li>
		<li class="nav-item"><?php echo $this->Html->link('Pedidos', array('controller' => 'Pedidos', 'action' => 'index'), array('class' => ' btn btn-success navbar-btn')); ?></li>
	</ul>
</header>