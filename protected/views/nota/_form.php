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
			<th>Nomes</th>
			<th>1ºC</th>
			<th>REC 1</th>
			<th>2º C</th>
			<th>REC 2</th>
			<th>3º C</th>
			<th>REC 3</th>
			<th>MÉDIA ANUAL</th>
		</thead>
		<tbody>
			<td></td>

			<td><?php echo $form->numberField(($model->usuario,'primeira_certificacao', array('max'=>10, 'min'=>0)); ?>
			<?php echo $form->error(($model->usuario,'primeira_certificacao'); ?></td>

			<td><?php echo $form->numberField(($model->usuario,'primeira_recuperacao', array('max'=>10, 'min'=>0)); ?>
			<?php echo $form->error(($model->usuario,'primeira_recuperacao'); ?></td>

			<td><?php echo $form->numberField(($model->usuario,'segunda_certificacao', array('max'=>10, 'min'=>0)); ?>
			<?php echo $form->error(($model->usuario,'segunda_certificacao'); ?></td>

			<td><?php echo $form->numberField(($model->usuario,'segunda_recuperacao', array('max'=>10, 'min'=>0)); ?>
			<?php echo $form->error(($model->usuario,'segunda_recuperacao'); ?></td>

			<td><?php echo $form->numberField(($model->usuario,'terceira_certificacao', array('max'=>10, 'min'=>0)); ?>
			<?php echo $form->error(($model->usuario,'terceira_certificacao'); ?></td>

			<td><?php echo $form->numberField(($model->usuario,'terceira_recuperacao', array('max'=>10, 'min'=>0)); ?>
			<?php echo $form->error(($model->usuario,'terceira_recuperacao'); ?></td>
			<td></td>

		</tbody>

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