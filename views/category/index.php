<h1>Gestionar categorías</h1>

<a href="<?=base_url?>category/create" class="button button-small">
    Crear categoría
</a>

<table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
        </tr>
    <?php while($cat = $categories->fetch_object()): ?>
        <tr>
            <td><?= $cat->id ;?></td>
            <td><?= $cat->name ;?></td>
        </tr>
    <?php endwhile; ?>
</table>
