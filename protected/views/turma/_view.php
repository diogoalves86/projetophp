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
			<td><a href="<?php echo Yii::app()->createUrl('turma/alunos/'.$data->nome) ?>" class="lista-turmas"><?php echo CHtml::encode($data->nome); ?></a></td>
			<td><?php echo CHtml::encode($data->turno); ?></td>
		</tbody>
	</table>

</div>