<?php 
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
			<?php for ($i=0; $i < count($notas_turma["aluno"]); $i++):?>
				<tr>
					<td><?php echo $notas_turma["aluno"][$i]->nome;?></td>
					<?php if(empty($notas_turma["nota"][$i])): ?>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					<?php else: ?>
							<td><?php echo $notas_turma["nota"][$i][0]->primeira_certificacao; ?></td>
							<td><?php echo $notas_turma["nota"][$i][0]->primeira_recuperacao; ?></td>
							<td><?php echo $notas_turma["nota"][$i][0]->segunda_certificacao; ?></td>
							<td><?php echo $notas_turma["nota"][$i][0]->segunda_recuperacao; ?></td>
							<td><?php echo $notas_turma["nota"][$i][0]->terceira_certificacao; ?></td>
							<td><?php echo $notas_turma["nota"][$i][0]->terceira_recuperacao; ?></td>
						</tr>
					<?php endif; ?>
			<?php endfor; ?>
		</tbody>
	</table>
<?php $this->endWidget(); ?>
	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Cadastrar' : 'Salvar'); ?>
	</div>
</div><!-- form -->