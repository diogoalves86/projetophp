<?php
/* @var $this ProfessorTurmaController */
/* @var $model ProfessorTurma */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'professor-turma-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<h2>Cadastro de professores</h2>
	<dl>
		<dt>Nome</dt>
		<dd><?php echo $form->textField($model,'nome',array('class'=>'textbox_login', 'size'=>60,'maxlength'=>100)); ?>
				<?php echo $form->error($model,'nome'); ?></dd>
		
		<dt>CPF</dt>
		<dd><?php echo $form->textField($model,'cpf',array('class'=>'textbox_login', 'size'=>14,'maxlength'=>14)); ?>
				<?php echo $form->error($model,'cpf'); ?></dd>
		
		<dt>Matrícula</dt>
		<dd><?php echo $form->textField($model,'matricula',array('class'=>'textbox_login', 'size'=>14,'maxlength'=>14)); ?>
				<?php echo $form->error($model,'matricula'); ?></dd>
		
		<dt>Nível</dt>
		<dd><?php echo CHtml::dropDownList('Usuario[nivel]', "nome", array(3=>'Professor')); ?>
				<?php echo $form->error($model,'nivel'); ?></dd>
		<dt>Disciplina</dt>
		<dd><?php echo CHtml::dropDownList('Usuario[disciplina]', "nome", array($disciplinas)) ?></dd>

		<dt>Email</dt>
		<dd><?php echo $form->textField($model,'email',array('class'=>'textbox_login', 'size'=>20,'maxlength'=>20)); ?>
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