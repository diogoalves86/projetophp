<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'usuario-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
	)); ?>

	<ul>
		<li>
			<div class="row">
				<?php echo $form->labelEx($model,'matricula'); ?>
				<?php echo $form->textField($model,'matricula',array('class'=>'textbox_login', 'size'=>20,'maxlength'=>20)); ?>
				<?php echo $form->error($model,'matricula'); ?>
			</div>
		</li>

		<li>
			<div class="row buttons">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Verificar Dados' : 'Salvar'); ?>
			</div>
		</li>
	</ul>

	<?php $this->endWidget(); ?>

</div><!-- form -->