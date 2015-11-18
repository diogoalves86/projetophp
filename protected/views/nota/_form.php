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
			<?php foreach ($aluno_turma as $aluno): ?>
				<tr>
					<td><?php echo $aluno->nome; ?></td>
					
					<?php if(Yii::app()->user->isInRole("PROFESSOR") !== false): ?>
						<?php $notas_aluno = $model->findAll("usuario_id='".$aluno->id."' && disciplina_id='".$disciplina_professor."'"); ?>
					
					<?php elseif(Yii::app()->user->isInRole("ALUNO") !== false): ?>
						<?php $notas_aluno = $model->findAll("usuario_id='".Yii::app()->user->id."'"); ?>
					
					<?php else: ?>
						<?php $notas_aluno = $model->findAll("usuario_id='".$aluno->id."'"); ?>

					<?php endif; ?>

					<?php foreach ($notas_aluno as $nota_aluno): ?>
						<td><?php echo $form->numberField($nota_aluno,'primeira_certificacao', array('max'=>10, 'min'=>0)); ?>
						<?php echo $form->error($nota_aluno,'primeira_certificacao'); ?></td>

						<td><?php echo $form->numberField($nota_aluno,'primeira_recuperacao', array('max'=>10, 'min'=>0)); ?>
						<?php echo $form->error($nota_aluno,'primeira_recuperacao'); ?></td>
					
						<td><?php echo $form->numberField($nota_aluno,'segunda_certificacao', array('max'=>10, 'min'=>0)); ?>
						<?php echo $form->error($nota_aluno,'segunda_certificacao'); ?></td>

						<td><?php echo $form->numberField($nota_aluno,'segunda_recuperacao', array('max'=>10, 'min'=>0)); ?>
						<?php echo $form->error($nota_aluno,'segunda_recuperacao'); ?></td>

						<td><?php echo $form->numberField($nota_aluno,'terceira_certificacao', array('max'=>10, 'min'=>0)); ?>
						<?php echo $form->error($nota_aluno,'terceira_certificacao'); ?></td>

						<td><?php echo $form->numberField($nota_aluno,'terceira_recuperacao', array('max'=>10, 'min'=>0)); ?>
						<?php echo $form->error($nota_aluno,'terceira_recuperacao'); ?></td>
						<td></td>
				</tr>
					<?php endforeach; ?>
			<?php endforeach; ?>

		</tbody>
	</table>
	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Cadastrar' : 'Salvar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->