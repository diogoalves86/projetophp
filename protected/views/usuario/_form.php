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

	<?php echo $form->errorSummary($model); ?>

	<ul>
		<li>
			<div class="row">
				<?php echo $form->labelEx($model,'nome'); ?>
				<?php echo $form->textField($model,'nome',array('class'=>'textbox_login', 'size'=>60,'maxlength'=>100)); ?>
				<?php echo $form->error($model,'nome'); ?>
			</div>
		</li>

		<li>
			<div class="row">
				<?php echo $form->labelEx($model,'cpf'); ?>
				<?php echo $form->textField($model,'cpf',array('class'=>'textbox_login', 'size'=>14,'maxlength'=>14)); ?>
				<?php echo $form->error($model,'cpf'); ?>
			</div>
		</li>

		<li>
			<div class="row">
				<?php echo $form->labelEx($model,'nivel'); ?>
				<?php echo $form->textField($model,'nivel'); ?>
				<?php echo $form->error($model,'nivel'); ?>
			</div>
		</li>

		<li>
			<div class="row">
				<?php echo $form->labelEx($model,'email'); ?>
				<?php echo $form->textField($model,'email',array('class'=>'textbox_login', 'size'=>20,'maxlength'=>20)); ?>
				<?php echo $form->error($model,'email'); ?>
			</div>
		</li>

		<li>
			<div class="row">
				<?php echo $form->labelEx($model,'senha'); ?>
				<?php echo $form->textField($model,'senha',array('class'=>'textbox_login', 'size'=>20,'maxlength'=>20)); ?>
				<?php echo $form->error($model,'senha'); ?>
			</div>
		</li>

		<li>
			<div class="row buttons">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Cadastrar' : 'Salvar'); ?>
			</div>
		</li>
	</ul>

<?php $this->endWidget(); ?>

</div><!-- form -->