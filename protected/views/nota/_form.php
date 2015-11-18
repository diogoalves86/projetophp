<?php
/* @var $this NotaController */
/* @var $model Nota */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'nota-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<table class="data-table">
		<thead>
			<th>1ªC</th>
			<th>REC 1</th>
			<th>2ªC</th>
			<th>REC 2</th>
			<th>3ªC</th>
			<th>REC 3</th>
			<th>Disciplina</th>
			<th>Usuário</th>
		</thead>
		<tbody>
			<td><?php echo $form->textField($model,'primeira_certificacao'); ?>
		<?php echo $form->error($model,'primeira_certificacao'); ?></td>
			<td><?php echo $form->textField($model,'primeira_recuperacao'); ?>
		<?php echo $form->error($model,'primeira_recuperacao'); ?></td>
			<td><?php echo $form->textField($model,'segunda_certificacao'); ?>
		<?php echo $form->error($model,'segunda_certificacao'); ?></td>
			<td><?php echo $form->textField($model,'segunda_recuperacao'); ?>
		<?php echo $form->error($model,'segunda_recuperacao'); ?></td>
			<td><?php echo $form->textField($model,'terceira_certificacao'); ?>
		<?php echo $form->error($model,'terceira_certificacao'); ?></td>
			<td><?php echo $form->textField($model,'terceira_recuperacao'); ?>
		<?php echo $form->error($model,'terceira_recuperacao'); ?></td>
			<td><?php echo $form->textField($model,'disciplina_id'); ?>
		<?php echo $form->error($model,'disciplina_id'); ?></td>
			<td><?php echo $form->textField($model,'usuario_id'); ?>
		<?php echo $form->error($model,'usuario_id'); ?></td>
		</tbody>
	</table>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->