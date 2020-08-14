<h1>Carrito de la compra</h1>

<?php if(isset($_SESSION['chart']) && count($_SESSION['chart']) >= 1): ?>
    
    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
        </tr>

        <?php 
            foreach($chart as $index => $element): 
            $product = $element['product'];
        ?>
    
        <tr>
            <td>
                <?php if ($product->image != null): ?>
                    <img src="<?= base_url ?>uploads/images/<?= $product->image ?>" class="img_chart" />
                <?php else: ?>
                    <img src="<?= base_url ?>assets/img/logo.png" class="img_chart" />
                <?php endif; ?>
            </td>
            <td>
                <a href="<?= base_url ?>product/show&id=<?=$product->id?>"><?=$product->name?></a>
            </td>
            <td>
                <?=$product->price?> €
            </td>
            <td>
                <?=$element['units']?>
                <div class="updown-units">
                    <a href="<?=base_url?>chart/up&index=<?=$index?>" class="button">+</a>
                    <a href="<?=base_url?>chart/down&index=<?=$index?>" class="button">-</a>
                </div>
            </td>
            <td>
                <a href="<?=base_url?>chart/delete&index=<?=$index?>" class="button button-chart button-red">Quitar producto</a>
            </td>
        </tr>
        
        <?php endforeach; ?>
    </table>

    <br/>

    <div class="delete-chart">
	    <a href="<?=base_url?>chart/delete_all" class="button button-delete button-red">Vaciar carrito</a>
    </div>
    <div class="total-chart">
	    <?php $stats = Utils::statsChart(); ?>
	    <h3>Precio total: <?=$stats['total']?> €</h3>
	    <a href="<?=base_url?>order/make" class="button button-order">Hacer pedido</a>
    </div>

<?php else: ?>
	<p>El carrito está vacio, añade algun producto</p>
<?php endif; ?>