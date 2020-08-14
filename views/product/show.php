<?php if(isset($pro)):?>
    <h1><?=$pro->name?></h1>
    
    <div id="detail-product">
        <div class="image">
            <?php if($pro->image != null):?> 
                <img src="<?=base_url?>uploads/images/<?=$pro->image?>" />
            <?php else:?>
                <img src="<?=base_url?>assets/img/logo.png"/>
            <?php endif; ?>
        </div>

        <div class="data">
            <p class="description"><?= $pro->description?></p>
            <p class="price"><?= $pro->price?> €</p>
            <a href="<?=base_url?>chart/add&id=<?=$pro->id?>" class="button">Comprar</a>
        </div>

    </div>

<?php else:?>
    <h1>El producto no existe</h1>
<?php endif; ?>