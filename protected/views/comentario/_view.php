<?php
/* @var $this ComentarioController */
/* @var $data Comentario */
?>

<div class="view">
	<table class="data-table">
		<thead>
			<th>Assunto</th>
			<th>Mensagem</th>
			<th>Visualizada</th>
			<th>Aluno</th>
			<th>Professor</th>
		</thead>
		<tbody>
			<td><?php echo CHtml::encode($data->assunto); ?></td>
			<td><?php echo CHtml::encode($data->mensagem); ?></td>
			<td><?php echo CHtml::encode($data->visualizada); ?></td>
			<td><?php echo CHtml::encode($data->aluno->nome); ?></td>
			<td><?php echo CHtml::encode($data->professor->nome); ?></td>
		</tbody>
	</table>
</div>