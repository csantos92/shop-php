<?php if (isset($management)): ?>
	<h1>Gestionar pedidos</h1>
<?php else: ?>
	<h1>Mis pedidos</h1>
<?php endif; ?>
<table>
	<tr>
		<th>Nº Pedido</th>
		<th>Coste</th>
		<th>Fecha</th>
		<th>Estado</th>
	</tr>
	<?php
	while ($ord = $orders->fetch_object()):
		?>

		<tr>
			<td>
				<a href="<?= base_url ?>order/detail&id=<?= $ord->id ?>"><?= $ord->id ?></a>
			</td>
			<td>
				<?= $ord->cost ?> $
			</td>
			<td>
				<?= $ord->date ?>
			</td>
			<td>
                <?=Utils::showStatus($ord->status)?>
			</td>
		</tr>

	<?php endwhile; ?>
</table>