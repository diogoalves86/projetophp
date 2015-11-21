<?php
/* @var $this ComentarioController */
/* @var $data Comentario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('assunto')); ?>:</b>
	<?php echo CHtml::encode($data->assunto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mensagem')); ?>:</b>
	<?php echo CHtml::encode($data->mensagem); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('visualizada')); ?>:</b>
	<?php echo CHtml::encode($data->visualizada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aluno_id')); ?>:</b>
	<?php echo CHtml::encode($data->aluno_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('professor_id')); ?>:</b>
	<?php echo CHtml::encode($data->professor_id); ?>
	<br />


</div>