<?php
/* @var $this NotaController */
/* @var $data Nota */
?>

<div class="view">
	<table class="data-table">
		<thead>
			<th>1ªC</th>
			<th>REC 1</th>
			<th>2ªC</th>
			<th>REC 2</th>
			<th>3ªC</th>
			<th>PFV</th>
			<th>Média</th>
		</thead>
		<tbody>
			<td><?php echo CHtml::encode($data->primeira_certificacao); ?></td>
			<td><?php echo CHtml::encode($data->primeira_recuperacao); ?></td>
			<td><?php echo CHtml::encode($data->segunda_certificacao); ?></td>
			<td><?php echo CHtml::encode($data->segunda_recuperacao); ?></td>
			<td><?php echo CHtml::encode($data->terceira_certificacao); ?></td>
			<td><?php echo CHtml::encode($data->terceira_recuperacao); ?></td>
			<td></td>
		</tbody>
	</table>

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('disciplina_id')); ?>:</b>
	<?php echo CHtml::encode($data->disciplina_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_id')); ?>:</b>
	<?php echo CHtml::encode($data->usuario_id); ?>
	<br />

	*/ ?>

</div>