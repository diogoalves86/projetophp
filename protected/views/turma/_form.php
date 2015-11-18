<?php
/* @var $this TurmaController */
/* @var $model Turma */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'turma-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
	<table>
		<thead>
			<th>Nome</th>
			<th>Turno</th>
		</thead>
			<tbody>
				<td><?php echo $form->textField($model,'nome',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'nome'); ?></td>
				<td><?php echo $form->textField($model,'turno',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'turno'); ?></td>
			</tbody>
	</table>

<?php $this->endWidget(); ?>

</div><!-- form -->