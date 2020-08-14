<?php if (isset($_SESSION['order']) && $_SESSION['order'] == 'completed'): ?>
	<h1>Tu pedido se ha confirmado</h1>
	<p>
		Tu pedido ha sido guardado con exito, una vez que realices la transferencia
		bancaria a la cuenta 7382947289239ADD con el coste del pedido, será procesado y enviado.
	</p>
	<br/>
	<?php if (isset($order)): ?>
		<h3>Datos del pedido:</h3>

		Número de pedido: <?= $order->id ?>   <br/>
		Total a pagar: <?= $order->cost ?> € <br/>
		Productos:

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
							<img src="<?= base_url ?>assets/img/logo.png" class="img_chart" />
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

<?php elseif (isset($_SESSION['order']) && $_SESSION['order'] != 'completed'): ?>
	<h1>Tu pedido NO ha podido procesarse</h1>
<?php endif; ?>
