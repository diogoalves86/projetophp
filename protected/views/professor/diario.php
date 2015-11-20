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
		'method'=>'get',
	)); ?>

		<script type="text/javascript">
			function cadastraNota(id){
				var data = {
					'primeira_certificacao':document.getElementById("primeira_certificacao_"+id).value,
					'primeira_recuperacao':document.getElementById("primeira_recuperacao_"+id).value,
					'segunda_certificacao':document.getElementById("segunda_certificacao_"+id).value,
					'segunda_recuperacao':document.getElementById("segunda_recuperacao_"+id).value,
					'terceira_certificacao':document.getElementById("terceira_certificacao_"+id).value,
					'terceira_recuperacao':document.getElementById("terceira_recuperacao_"+id).value,
				};
					$.ajax({
					  type: "POST",
					  url: "<?php echo Yii::app()->createAbsoluteUrl('nota/novaNota'); ?>",
					  data: JSON.parse(data),
					  success: function(data){
				  			alert(data);
			  			},
					  dataType: 'json'
					});
			}
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
					<?php for ($i=0; $i < count($notas_alunos["aluno"]); $i++): ?>
						<?php //var_dump(count($notas_alunos)); exit;?>	
						<tr>
							<td><?php echo $notas_alunos["aluno"][$i]->nome ?></td>
							<?php if (empty($notas_alunos["nota"][$i])): ?>
								<td><?php echo CHtml::numberField('', '' , array('min'=>0, 'max'=>10, 'id'=>'primeira_certificacao_'.$notas_alunos["aluno"][$i]->id)) ?></td>
								<td><?php echo CHtml::numberField('', '' , array('min'=>0, 'max'=>10, 'id'=>'primeira_recuperacao_'.$notas_alunos["aluno"][$i]->id)) ?></td>
								<td><?php echo CHtml::numberField('', '' , array('min'=>0, 'max'=>10, 'id'=>'segunda_certificacao_'.$notas_alunos["aluno"][$i]->id)) ?></td>
								<td><?php echo CHtml::numberField('', '' , array('min'=>0, 'max'=>10, 'id'=>'segunda_recuperacao_'.$notas_alunos["aluno"][$i]->id)) ?></td>
								<td><?php echo CHtml::numberField('', '' , array('min'=>0, 'max'=>10, 'id'=>'terceira_certificacao_'.$notas_alunos["aluno"][$i]->id)) ?></td>
								<td><?php echo CHtml::numberField('', '' , array('min'=>0, 'max'=>10, 'id'=>'terceira_recuperacao_'.$notas_alunos["aluno"][$i]->id)) ?></td>
							<?php else: ?>
								<td><?php echo $notas_alunos["nota"][$i][0]->primeira_certificacao; ?></td>
								<td><?php echo $notas_alunos["nota"][$i][0]->primeira_recuperacao; ?></td>
								<td><?php echo $notas_alunos["nota"][$i][0]->segunda_certificacao; ?></td>
								<td><?php echo $notas_alunos["nota"][$i][0]->segunda_recuperacao; ?></td>
								<td><?php echo $notas_alunos["nota"][$i][0]->terceira_certificacao; ?></td>
								<td><?php echo $notas_alunos["nota"][$i][0]->terceira_recuperacao; ?></td>
							<?php endif; ?>
							<td></td>
							<td><?php echo CHtml::htmlButton('Salvar', array('onClick'=>'cadastraNota('.$notas_alunos["aluno"][$i]->id.');')); ?></td>
						</tr>
							
							
					<?php endfor; ?>

				</tbody>
			</table>
			<div class="buttons">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Cadastrar' : 'Salvar'); ?>
			</div>
	<?php $this->endWidget(); ?>
</div><!-- form -->