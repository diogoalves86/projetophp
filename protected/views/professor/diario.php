<?php
/* @var $this NotaController */
/* @var $model Nota */
/* @var $form CActiveForm */
?>
<div class="form">
	<script type="text/javascript">
		function cadastrarNota(id, disciplina_id){
			var data = {
				'primeira_certificacao': $("#primeira_certificacao_"+id).val() == "" ? null : $("#primeira_certificacao_"+id).val(),
				'primeira_recuperacao':  $("#primeira_recuperacao_"+id).val() == "" ? null : $("#primeira_recuperacao_"+id).val(),
				'segunda_certificacao':  $("#segunda_certificacao_"+id).val() == "" ? null : $("#segunda_certificacao_"+id).val(),
				'segunda_recuperacao':   $("#segunda_recuperacao_"+id).val() == "" ? null : $("#segunda_recuperacao_"+id).val(),
				'terceira_certificacao': $("#terceira_certificacao_"+id).val() == "" ? null : $("#terceira_certificacao_"+id).val(),
				'terceira_recuperacao':  $("#terceira_recuperacao_"+id).val() == "" ? null : $("#terceira_recuperacao_"+id).val()
			};
			var requisicao = "<?php echo Yii::app()->createAbsoluteUrl('nota/novaNota'); ?>/"+id+"/?disciplina_id="+disciplina_id+"&notas[primeira_certificacao]=" +data.primeira_certificacao +"&notas[primeira_recuperacao]="+ data.primeira_recuperacao + "&notas[segunda_certificacao]="+ data.segunda_certificacao + "&notas[segunda_recuperacao]="+ data.segunda_recuperacao + "&notas[terceira_certificacao]="+ data.terceira_certificacao + "&notas[terceira_recuperacao]="+ data.terceira_recuperacao;

			location.href = requisicao;
		}
	</script>
	<table data-table>
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
				<tr>
					<td><?php echo $notas_alunos["aluno"][$i]->nome ?></td>
					<?php if (empty($notas_alunos["nota"][$i])): ?>
						<td><?php echo CHtml::textField('', '' , array('min'=>0, 'max'=>10, 'id'=>'primeira_certificacao_'.$notas_alunos["aluno"][$i]->id)) ?></td>
						<td><?php echo CHtml::textField('', '' , array('min'=>0, 'max'=>10, 'id'=>'primeira_recuperacao_'.$notas_alunos["aluno"][$i]->id)) ?></td>
						<td><?php echo CHtml::textField('', '' , array('min'=>0, 'max'=>10, 'id'=>'segunda_certificacao_'.$notas_alunos["aluno"][$i]->id)) ?></td>
						<td><?php echo CHtml::textField('', '' , array('min'=>0, 'max'=>10, 'id'=>'segunda_recuperacao_'.$notas_alunos["aluno"][$i]->id)) ?></td>
						<td><?php echo CHtml::textField('', '' , array('min'=>0, 'max'=>10, 'id'=>'terceira_certificacao_'.$notas_alunos["aluno"][$i]->id)) ?></td>
						<td><?php echo CHtml::textField('', '' , array('min'=>0, 'max'=>10, 'id'=>'terceira_recuperacao_'.$notas_alunos["aluno"][$i]->id)) ?></td>
					<?php else: ?>
						<td><?php echo CHtml::textField('', $notas_alunos["nota"][$i][0]->primeira_certificacao, array('min'=>0, 'max'=>10,  'id'=>'primeira_certificacao_'.$notas_alunos["aluno"][$i]->id)) ?></td>
						<td><?php echo CHtml::textField('', $notas_alunos["nota"][$i][0]->primeira_recuperacao,  array('min'=>0, 'max'=>10, 'id'=>'primeira_recuperacao_'.$notas_alunos["aluno"][$i]->id)) ?></td>
						<td><?php echo CHtml::textField('', $notas_alunos["nota"][$i][0]->segunda_certificacao,  array('min'=>0, 'max'=>10,  'id'=>'segunda_certificacao_'.$notas_alunos["aluno"][$i]->id)) ?></td>
						<td><?php echo CHtml::textField('', $notas_alunos["nota"][$i][0]->segunda_recuperacao,  array('min'=>0, 'max'=>10, 	'id'=>'segunda_recuperacao_'.$notas_alunos["aluno"][$i]->id)) ?></td>
						<td><?php echo CHtml::textField('', $notas_alunos["nota"][$i][0]->terceira_certificacao, array('min'=>0, 'max'=>10,  'id'=>'terceira_certificacao_'.$notas_alunos["aluno"][$i]->id)) ?></td>
						<td><?php echo CHtml::textField('', $notas_alunos["nota"][$i][0]->terceira_recuperacao,  array('min'=>0, 'max'=>10, 'id'=>'terceira_recuperacao_'.$notas_alunos["aluno"][$i]->id)) ?></td>
					<?php endif; ?>
					<td>Média</td>
					<td><?php echo CHtml::htmlButton('Salvar', array('onClick'=>'cadastrarNota('.$notas_alunos["aluno"][$i]->id.', '.$disciplina_professor->disciplina->id.');')); ?></td>
				</tr>
			<?php endfor; ?>
		</tbody>
	</table>
</div><!-- form -->