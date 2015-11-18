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
	<table data-table>
		<?php echo $form->errorSummary($model); ?>
		<thead>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
	
		</thead>
		<tbody>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>

		</tbody>
		<div class="row">
			<?php echo $form->labelEx($model,'primeira_certificacao'); ?>
			<?php echo $form->numberField($model,'primeira_certificacao', array('max'=>10, 'min'=>0)); ?>
			<?php echo $form->error($model,'primeira_certificacao'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'segunda_certificacao'); ?>
			<?php echo $form->numberField($model,'segunda_certificacao', array('max'=>10, 'min'=>0)); ?>
			<?php echo $form->error($model,'segunda_certificacao'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'terceira_certificacao'); ?>
			<?php echo $form->numberField($model,'terceira_certificacao', array('max'=>10, 'min'=>0)); ?>
			<?php echo $form->error($model,'terceira_certificacao'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'primeira_recuperacao'); ?>
			<?php echo $form->numberField($model,'primeira_recuperacao', array('max'=>10, 'min'=>0)); ?>
			<?php echo $form->error($model,'primeira_recuperacao'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'segunda_recuperacao'); ?>
			<?php echo $form->numberField($model,'segunda_recuperacao', array('max'=>10, 'min'=>0)); ?>
			<?php echo $form->error($model,'segunda_recuperacao'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'terceira_recuperacao'); ?>
			<?php echo $form->numberField($model,'terceira_recuperacao', array('max'=>10, 'min'=>0)); ?>
			<?php echo $form->error($model,'terceira_recuperacao'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'disciplina_id'); ?>
			<?php if($model->isNewRecord): ?>
				<?php echo CHtml::dropDownList('Nota[disciplina_id]', Disciplina::model(), $disciplina, array(
		    									'empty' => 'Selecione uma disciplina',
		    									'class' => 'form-control')); 
		    	?>
	    	<?php else: ?>
	    		<?php echo CHtml::dropDownList('Nota[disciplina_id]', Disciplina::model(), array($disciplina->id=>$disciplina->nome),
	    		 		array(
							'class' => 'form-control'
							)); 
		    	?>
	    	<?php endif; ?>
			<?php echo $form->error($model,'disciplina_id'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'usuario_id'); ?>
			<?php if($model->isNewRecord): ?>
				<?php echo CHtml::dropDownList('Nota[usuario_id]', Usuario::model(), $aluno, array(
		    									'empty' => 'Selecione um aluno',
		    									'class' => 'form-control')); ?>
			<?php else: ?>
				<?php echo CHtml::dropDownList('Nota[usuario_id]', Usuario::model(), array($aluno->id=>$aluno->nome),
	    		 		array(
							'class' => 'form-control'
							)); 
		    	?>
			<?php endif; ?>
			<?php echo $form->error($model,'usuario_id'); ?>
		</div>
	</table>
	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Cadastrar' : 'Salvar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->