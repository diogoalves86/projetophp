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
	<table class="data-table">
		<thead>
			<th>Nome</th>
			<th>CPF</th>
			<th>Matricula</th>
			<th>Nivel</th>
			<th>Email</th>
			<th>Senha</th>
		</thead>
		<tbody>
			<td><?php echo $form->textField($model,'nome',array('class'=>'textbox_login', 'size'=>60,'maxlength'=>100, 'disabled'=>'true')); ?>
				<?php echo $form->error($model,'nome'); ?></td>
			<td><?php echo $form->textField($model,'cpf',array('class'=>'textbox_login', 'size'=>14,'maxlength'=>14, 'disabled'=>'true')); ?>
				<?php echo $form->error($model,'cpf'); ?></td>
			<td><?php echo $form->textField($model,'matricula',array('class'=>'textbox_login', 'size'=>14,'maxlength'=>14, 'disabled'=>'true')); ?>
				<?php echo $form->error($model,'matricula'); ?></td>
			<td><?php echo $form->dropDownList($nivel_usuario, "nome", array($nivel_usuario->nome), array('name'=>'Usuario[nivel]', 'disabled'=>'true')); ?>
				<?php echo $form->error($model,'nivel'); ?></td>
			<td><?php echo $form->textField($model,'email',array('class'=>'textbox_login', 'size'=>20,'maxlength'=>20, 'disabled'=>'true')); ?>
				<?php echo $form->error($model,'email'); ?></td>
			<td><?php echo $form->passwordField($model,'senha',array('class'=>'textbox_login', 'size'=>20,'maxlength'=>20)); ?>
				<?php echo $form->error($model,'senha'); ?></td>
		</tbody>
	</table>
			<div class="row buttons">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Cadastrar' : 'Salvar'); ?>
			</div>

<?php $this->endWidget(); ?>

</div><!-- form -->