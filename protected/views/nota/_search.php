<?php
/* @var $this NotaController */
/* @var $model Nota */
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
		<?php echo $form->label($model,'primeira_certificacao'); ?>
		<?php echo $form->textField($model,'primeira_certificacao'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'segunda_certificacao'); ?>
		<?php echo $form->textField($model,'segunda_certificacao'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'terceira_certificacao'); ?>
		<?php echo $form->textField($model,'terceira_certificacao'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'primeira_recuperacao'); ?>
		<?php echo $form->textField($model,'primeira_recuperacao'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'segunda_recuperacao'); ?>
		<?php echo $form->textField($model,'segunda_recuperacao'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'terceira_recuperacao'); ?>
		<?php echo $form->textField($model,'terceira_recuperacao'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'disciplina_id'); ?>
		<?php echo $form->textField($model,'disciplina_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usuario_id'); ?>
		<?php echo $form->textField($model,'usuario_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->