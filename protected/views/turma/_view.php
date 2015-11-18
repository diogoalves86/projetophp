<?php
/* @var $this TurmaController */
/* @var $data Turma */
?>

<div class="view">
	<table class="data-table">
		<thead>
			<th>Nome</th>
			<th>Turno</th>
		</thead>
		<tbody>
			<td><?php echo CHtml::encode($data->nome); ?></td>
			<td><?php echo CHtml::encode($data->turno); ?></td>
		</tbody>
	</table>

</div>