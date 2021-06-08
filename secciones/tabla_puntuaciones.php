<table class="tabla_posiciones">
	<thead>
		<tr>
			<th>Participante</th>
			<th>Puntos</th>
			<th></th>
		</tr>
	</tbody>
	<tbody>
		<?php foreach ( $puntuaciones as $reg ) { ?>
			<tr>
				<td><?php echo $reg["participante"] ?></td>
				<td><?php echo $reg["total"] ?></td>
				<td><i class="ti-layout-media-right-alt"></td>
			</tr>
		<?php } ?>
	</tbody>
</table>