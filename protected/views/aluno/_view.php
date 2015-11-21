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
			<th>Email</th>
		</thead>
		<tbody>
			<td><a href="<?php echo Yii::app()->createUrl('aluno/'.$data->matricula) ?>"><?php echo CHtml::encode($data->nome); ?></a></td>
			<td><?php echo CHtml::encode($data->cpf); ?></td>
			<td><?php echo CHtml::encode($data->matricula); ?></td>
			<td><?php echo CHtml::encode($data->email); ?></td>
		</tbody>
	</table>

</div>