<?php
/* @var $this NotaController */
/* @var $data Nota */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('primeira_certificacao')); ?>:</b>
	<?php echo CHtml::encode($data->primeira_certificacao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('segunda_certificacao')); ?>:</b>
	<?php echo CHtml::encode($data->segunda_certificacao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('terceira_certificacao')); ?>:</b>
	<?php echo CHtml::encode($data->terceira_certificacao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('primeira_recuperacao')); ?>:</b>
	<?php echo CHtml::encode($data->primeira_recuperacao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('segunda_recuperacao')); ?>:</b>
	<?php echo CHtml::encode($data->segunda_recuperacao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('terceira_recuperacao')); ?>:</b>
	<?php echo CHtml::encode($data->terceira_recuperacao); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('disciplina_id')); ?>:</b>
	<?php echo CHtml::encode($data->disciplina_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_id')); ?>:</b>
	<?php echo CHtml::encode($data->usuario_id); ?>
	<br />

	*/ ?>

</div>