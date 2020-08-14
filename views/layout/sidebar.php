<!-- ASIDE -->

<aside id="side">

    <div id="chart" class="block_aside">
        <h3>Mi carrito</h3>
        <ul>
        <?php $stats = Utils::statsChart(); ?>
            <li>Productos (<?=$stats['count']?>)</li>
            <li>Total: <?=$stats['total']?> €</li>
            <li><a href="<?=base_url?>chart/index">Ver carrito</a></li>
        </ul>
    </div>

    <div id="login" class="block_aside">

        <?php if(!isset($_SESSION['user'])): ?>
            <h3>Entrar a la web</h3>
            <form action="<?=base_url?>user/login" method="post">
                <label for="email">Email</label>
                <input type="email" name="email" />
                <label for="password">Contraseña</label>
                <input type="password" name="password" />
                <input type="submit" value="Enviar" />
            </form>
        <?php else: ?>
            <h3>Bienvenido, <?=$_SESSION['user']->name?></h3>
        <?php endif; ?>

        <ul>
            <?php if(isset($_SESSION['user'])): ?>
                <li><a href="<?=base_url?>order/my_orders">Mis pedidos</a></li>
                <?php if(isset($_SESSION['admin'])): ?>
                    <li><a href="<?=base_url?>order/management">Gestionar pedidos</a></li>
                    <li><a href="<?=base_url?>category/index">Gestionar categorias</a></li>
                    <li><a href="<?=base_url?>product/management">Gestionar productos</a></li>
                <?php endif; ?>
                <li><a href="<?=base_url?>user/logout">Cerrar sesión</a></li>
            <?php else: ?>
                <a href="<?=base_url?>user/register">Registrarse</a>
            <?php endif; ?>
        </ul>   
    </div>

</aside>

<!-- CONTENIDO CENTRAL -->
<div id="central">