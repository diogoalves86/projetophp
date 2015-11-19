<?php
/* @var $this AlunoController */
/* @var $model Usuario */
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
	'action'=> Yii::app()->createUrl('nota/create/'.$_GET['id']),
	'method'=>'get',
)); ?>

<script type="text/javascript">
	$(document).ready(function(){
		alert("a");
	});
</script>
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
			<th>Ação</th>
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
					<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'nota-form',
						'htmlOptions'=>array(
							'name'=>'Nota_'.$aluno->id."_Disciplina_".$_GET['id']
							),
						// Please note: When you enable ajax validation, make sure the corresponding
						// controller action is handling ajax validation correctly.
						// There is a call to performAjaxValidation() commented in generated controller code.
						// See class documentation of CActiveForm for details on this.
						'enableAjaxValidation'=>false,
						'action'=> Yii::app()->createUrl('nota/create/'.$_GET['id']),
						'method'=>'get',
					)); ?>
						<?php echo CHtml::hiddenField('nota_id['.$aluno->id."]", $nota_aluno->id); ?>
						<td><?php echo $form->numberField($nota_aluno,'primeira_certificacao', array('max'=>10, 'min'=>0, 'name'=>'primeira_certificacao_'.$aluno->id)); ?>
						<?php echo $form->error($nota_aluno,'primeira_certificacao'); ?></td>

						<td><?php echo $form->numberField($nota_aluno,'primeira_recuperacao', array('max'=>10, 'min'=>0, 'name'=>'primeira_recuperacao_'.$aluno->id)); ?>
						<?php echo $form->error($nota_aluno,'primeira_recuperacao'); ?></td>
					
						<td><?php echo $form->numberField($nota_aluno,'segunda_certificacao', array('max'=>10, 'min'=>0, 'name'=>'segunda_certificacao_'.$aluno->id)); ?>
						<?php echo $form->error($nota_aluno,'segunda_certificacao'); ?></td>

						<td><?php echo $form->numberField($nota_aluno,'segunda_recuperacao', array('max'=>10, 'min'=>0, 'name'=>'segunda_recuperacao_'.$aluno->id)); ?>
						<?php echo $form->error($nota_aluno,'segunda_recuperacao'); ?></td>

						<td><?php echo $form->numberField($nota_aluno,'terceira_certificacao', array('max'=>10, 'min'=>0, 'name'=>'terceira_certificacao_'.$aluno->id)); ?>
						<?php echo $form->error($nota_aluno,'terceira_certificacao'); ?></td>

						<td><?php echo $form->numberField($nota_aluno,'terceira_recuperacao', array('max'=>10, 'min'=>0, 'name'=>'terceira_recuperacao_'.$aluno->id)); ?>
						<?php echo $form->error($nota_aluno,'terceira_recuperacao'); ?></td>
						<td></td>

						<td>
							<input type="submit" value="Salvar" />
						</td>
					<?php $this->endWidget(); ?>
				</tr>
					<?php endforeach; ?>
			<?php endforeach; ?>

		</tbody>
	</table>
	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Cadastrar' : 'Salvar'); ?>
	</div>
</div><!-- form -->