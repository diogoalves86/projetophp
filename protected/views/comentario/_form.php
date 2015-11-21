<?php
/* @var $this ComentarioController */
/* @var $model Comentario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comentario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'assunto'); ?>
		<?php echo $form->textField($model,'assunto',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'assunto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mensagem'); ?>
		<?php echo $form->textArea($model,'mensagem',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'mensagem'); ?>
	</div>

	<div class="row">
		<?php if ($model->isNewRecord): ?>
			<?php echo CHtml::dropDownList('Comentario[professor_id]', '', $lista_professores); ?>
		
		<?php else: ?>
			<?php echo CHtml::dropDownList('Comentario[professor_id]', '', array($model->professor->id=>$model->professor->nome)); ?>
		
		<?php endif; ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->