<?php
/* @var $this TurmaController */
/* @var $model Turma */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<dl>
		<dt><?php echo $form->label($model,'nome'); ?></dt>
			<dd><?php echo $form->textField($model,'nome',array('size'=>20,'maxlength'=>20)); ?></dd>
		<dt><?php echo $form->label($model,'turno'); ?></dt>
			<dd><?php echo $form->textField($model,'turno',array('size'=>10,'maxlength'=>10)); ?></dd>
	</dl>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->