<h1>Gestión de productos</h1>

<a href="<?=base_url?>product/create" class="button button-small">
    Crear producto
</a>

<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'completed'): ?>
    <strong class="alert_green">El producto se ha eliminado correctamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'completed'): ?>
    <strong class="alert_red">Error al eliminar el producto</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete');?>

<?php if(isset($_SESSION['product']) && $_SESSION['product'] == 'completed'): ?>
    <strong class="alert_green">El producto se ha creado correctamente</strong>
<?php elseif(isset($_SESSION['product']) && $_SESSION['product'] != 'completed'): ?>
    <strong class="alert_red">Error al crear el producto</strong>
<?php endif; ?>
<?php Utils::deleteSession('product');?>

<table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
    <?php while($pro = $products->fetch_object()): ?>
        <tr>
            <td><?= $pro->id ;?></td>
            <td><?= $pro->name ;?></td>
            <td><?= $pro->price ;?></td>
            <td><?= $pro->stock ;?></td>
            <td>
                <a href="<?=base_url?>product/edit&id=<?=$pro->id?>" class="button button-gestion">Editar</a>
                <a href="<?=base_url?>product/delete&id=<?=$pro->id?>" class="button button-gestion button-red">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
