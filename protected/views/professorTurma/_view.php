<?php
/* @var $this ProfessorTurmaController */
/* @var $data ProfessorTurma */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('professor_id')); ?>:</b>
	<?php echo CHtml::encode($data->professor_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('turma_id')); ?>:</b>
	<?php echo CHtml::encode($data->turma_id); ?>
	<br />


</div>