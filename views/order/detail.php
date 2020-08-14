<h1>Detalle del pedido</h1>

<?php if (isset($order)): ?>
		<?php if(isset($_SESSION['admin'])): ?>
			<h3>Cambiar estado del pedido</h3>
			<form action="<?=base_url?>order/status" method="POST">
				<input type="hidden" value="<?=$order->id?>" name="order_id"/>
				<select name="status">
					<option value="confirm" <?=$order->status == "confirm" ? 'selected' : '';?>>Pendiente</option>
					<option value="preparation" <?=$order->status == "preparation" ? 'selected' : '';?>>En preparación</option>
					<option value="ready" <?=$order->status == "ready" ? 'selected' : '';?>>Preparado para enviar</option>
					<option value="sended" <?=$order->status == "sended" ? 'selected' : '';?>>Enviado</option>
				</select>
				<input type="submit" value="Cambiar estado" />
			</form>
			<br/>
		<?php endif; ?>

		<h3>Dirección de envío</h3>
		Provincia: <?= $order->province ?>   <br/>
		Ciudad: <?= $order->location ?> <br/>
		Direccion: <?= $order->address ?>   <br/><br/>

		<h3>Datos del pedido:</h3>
		Estado: <?=Utils::showStatus($order->status)?> <br/>
		Número de pedido: <?= $order->id ?>   <br/>
		Total a pagar: <?= $order->cost ?> $ <br/>
		Productos: <br/>

		<table>
			<tr>
				<th>Imagen</th>
				<th>Nombre</th>
				<th>Precio</th>
				<th>Unidades</th>
			</tr>
			<?php while ($product = $products->fetch_object()): ?>
				<tr>
					<td>
						<?php if ($product->image != null): ?>
							<img src="<?= base_url ?>uploads/images/<?= $product->image ?>" class="img_chart" />
						<?php else: ?>
							<img src="<?= base_url ?>assets/img/camiseta.png" class="img_chart" />
						<?php endif; ?>
					</td>
					<td>
						<a href="<?= base_url ?>product/show&id=<?= $product->id ?>"><?= $product->name ?></a>
					</td>
					<td>
						<?= $product->price ?>
					</td>
					<td>
						<?= $product->units ?>
					</td>
				</tr>
			<?php endwhile; ?>
		</table>

	<?php endif; ?>