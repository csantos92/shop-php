<?php if(isset($category)):?>
    <h1><?=$category->name?></h1>
    <?php if($products->num_rows == 0): ?>
        <p>No hay productos para mostrar</p>
    <?php else: ?>
        <?php while($pro = $products->fetch_object()): ?>
            <div class="product">
                <a href="<?= base_url ?>product/show&id=<?=$pro->id?>">
                    <?php if($pro->image != null):?> 
                        <img src="<?=base_url?>uploads/images/<?=$pro->image?>" />
                    <?php else:?>
                        <img src="<?=base_url?>assets/img/camiseta.png"/>
                    <?php endif; ?>
                    <h2><?= $pro->name?></h2>
                </a>
                <p><?= $pro->price?></p>
                <a href="<?= base_url ?>chart/add&id=<?=$pro->id?>" class="button">Comprar</a>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
<?php else:?>
    <h1>La categoría no existe</h1>
<?php endif; ?>