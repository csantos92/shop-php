<?php if(isset($_SESSION['user'])):?>
    <h1>Hacer pedido</h1>
    <p>
		<a href="<?=base_url?>chart/index">Ver los productos y el precio del pedido</a>
	</p>
    <br/>

	<h3>Dirección para el envío de los billetes:</h3>
	<form action="<?=base_url.'order/add'?>" method="POST">
		<label for="province">Provincia</label>
		<input type="text" name="province" required />
		
		<label for="location">Ciudad</label>
		<input type="text" name="location" required />
		
		<label for="address">Dirección</label>
		<input type="text" name="address" required />
		
		<input type="submit" value="Confirmar pedido" />
	</form>

<?php else:?>
    <h1>Necesitas estar identificado</h1>
    <p>Inicia sesión para realizar pedidos</p>
<?php endif;?>