<?php
/* @var $this ProfessorTurmaController */
/* @var $data ProfessorTurma */
?>

<div class="view prof">
	<table class="data-table">
		<thead>
			<th>Turma</th>
			<th>Professor</th>
		</thead>
		<tbody>
			<td><?php echo CHtml::encode($data->turma->nome); ?></td>
			<td><?php echo CHtml::encode($data->professor->nome); ?></td>
		</tbody>
	</table>
</div>