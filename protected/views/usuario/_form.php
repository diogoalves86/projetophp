<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form user">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
	<h2>Editar Dados</h2>
	<dl>
		<dt>Nome</dt>
		<dd><?php echo $form->textField($model,'nome',array('class'=>'textbox_login', 'size'=>60,'maxlength'=>100, 'disabled'=>'true')); ?>
				<?php echo $form->error($model,'nome'); ?></dd>
		<dt>CPF</dt>
		<dd><?php echo $form->textField($model,'cpf',array('class'=>'textbox_login', 'size'=>14,'maxlength'=>14, 'disabled'=>'true')); ?>
				<?php echo $form->error($model,'cpf'); ?></dd>
		<dt>Matrícula</dt>
		<dd><?php echo $form->textField($model,'matricula',array('class'=>'textbox_login', 'size'=>14,'maxlength'=>14, 'disabled'=>'true')); ?>
				<?php echo $form->error($model,'matricula'); ?></dd>
		<dt>Nível</dt>
		<dd><?php echo $form->dropDownList($nivel_usuario, "nome", array($nivel_usuario->nome), array('name'=>'Usuario[nivel]', 'disabled'=>'true')); ?>
				<?php echo $form->error($model,'nivel'); ?></dd>
		<dt>Email</dt>
		<dd><?php echo $form->textField($model,'email',array('class'=>'textbox_login', 'size'=>20,'maxlength'=>20, 'disabled'=>'true')); ?>
				<?php echo $form->error($model,'email'); ?></dd>
		<dt>Senha</dt>
		<dd><?php echo $form->passwordField($model,'senha',array('class'=>'textbox_login', 'size'=>20,'maxlength'=>20)); ?>
				<?php echo $form->error($model,'senha'); ?></dd>
		<div class="row buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Cadastrar' : 'Salvar'); ?>
		</div>
	</dl>
<?php $this->endWidget(); ?>

</div><!-- form -->