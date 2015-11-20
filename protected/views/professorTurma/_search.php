<?php
/* @var $this ProfessorTurmaController */
/* @var $model ProfessorTurma */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'professor_id'); ?>
		<?php echo $form->textField($model,'professor_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'turma_id'); ?>
		<?php echo $form->textField($model,'turma_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->