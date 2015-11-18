<?php
/* @var $this UsuarioController */
/* @var $data Usuario */
?>

<div class="view">
	<table class="data-table">
		<thead>
			<th>Nome</th>
			<th>CPF</th>
			<th>Matricula</th>
			<th>Nivel</th>
			<th>Email</th>
		</thead>
		<tbody>
			<td><?php echo CHtml::encode($data->nome); ?></td>
			<td><?php echo CHtml::encode($data->cpf); ?></td>
			<td><?php echo CHtml::encode($data->matricula); ?></td>
			<td><?php echo CHtml::encode($data->nivel); ?></td>
			<td><?php echo CHtml::encode($data->email); ?></td>
		</tbody>
	</table>

</div>