<?php echo $this->Html->script('cart', array('inline' => false)); ?>

<?php
if (count($pedidos) > 0): ?>


    <h1>Pedidos</h1>

    <div class="row">

        <div class="col col-sm-1"></div>
        <div class="col col-sm-7"></div>
        <div class="col col-sm-1"></div>
        <div class="col col-sm-1"></div>
        <div class="col col-sm-1"></div>
        <div class="col col-sm-1"></div>
    </div>

    <?php //debug($totalPedidos); 
    ?>

    <?php foreach ($pedidos as $pedido): ?>
        <div class="row" id="row-<?= $pedido['Pedido']['id'] ?>">
            <div class="col col-sm-3">
                <figure>
                    <?php echo $this->Html->image('/img/' . $pedido['Platillo']['foto'], array('alt' => $pedido['Platillo']['nombre'], 'style' => 'width: 100%; height: auto;')); ?>
                    <figcaption><?php echo $pedido['Platillo']['nombre']; ?></figcaption>
                </figure>
            </div>

            <div class="col col-sm-3">
                <p><strong>Cantidad:</strong>
                    <span id="cantidad-<?= $pedido['Platillo']['id'] ?>">
                        <?= $pedido['Pedido']['cantidad']; ?>
                    </span>
                </p>
                <div>
                    <button class="btn btn-success addMore" data-id="<?= $pedido['Platillo']['id'] ?>">
                        Agregar
                    </button>
                    <button style="border: none;" data-id="<?= $pedido['Pedido']['id'] ?>"> <?= $this->Form->postLink('Eliminar', array('action' => 'delete', $pedido['Pedido']['id']), array('confirm' => '¿Estás seguro de que quieres eliminar este pedido?', 'class' => 'btn btn-danger')) ?></button>
                </div>

                <div class="mt-3">
                    <p><strong>SubTotal</strong> $
                        <span id="subtotal-<?= $pedido['Platillo']['id'] ?>">
                            <?= $pedido['Platillo']['precio'] * $pedido['Pedido']['cantidad']; ?>
                        </span>
                    </p>
                </div>
            </div>


        </div>
    <?php endforeach; ?>

    <div class="row" id="row-ID">
        <div class="col col-sm-1">
              <span>Total Pedidos: $<span id="total-general">
    <?= $totalPedidos[0][0]['total']; ?>
</span></span>
        </div>
    </div>

  

<?php endif; ?>