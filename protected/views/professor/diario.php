<?php
/* @var $this NotaController */
/* @var $model Nota */
/* @var $form CActiveForm */
?>
<div class="form diary">
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
	<table class="data-table">
		<thead>
			<th>Nomes</th>
			<th>1ºC</th>
			<th>REC 1</th>
			<th>2º C</th>
			<th>REC 2</th>
			<th>3º C</th>
			<th>PFV</th>
			<th>MÉDIA ANUAL</th>
			<th>MÉDIA FINAL</th>
			<th>Situação aluno</th>
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
						<td></td>
						<td></td>
						<td><?php echo CHtml::htmlButton('Salvar', array('onClick'=>'cadastrarNota('.$notas_alunos["aluno"][$i]->id.', '.$disciplina_professor->disciplina->id.');')); ?></td>
					
					<?php else: ?>
						<?php $medias = Nota::calcularMediasTrimestrais($notas_alunos["nota"][$i][0]); ?>
						<td><?php echo CHtml::textField('', $notas_alunos["nota"][$i][0]->primeira_certificacao, array('min'=>0, 'max'=>10,  'id'=>'primeira_certificacao_'.$notas_alunos["aluno"][$i]->id)) ?></td>
						<td><?php echo CHtml::textField('', $notas_alunos["nota"][$i][0]->primeira_recuperacao,  array('min'=>0, 'max'=>10, 'id'=>'primeira_recuperacao_'.$notas_alunos["aluno"][$i]->id)) ?></td>
						<td><?php echo CHtml::textField('', $notas_alunos["nota"][$i][0]->segunda_certificacao,  array('min'=>0, 'max'=>10,  'id'=>'segunda_certificacao_'.$notas_alunos["aluno"][$i]->id)) ?></td>
						<td><?php echo CHtml::textField('', $notas_alunos["nota"][$i][0]->segunda_recuperacao,  array('min'=>0, 'max'=>10, 	'id'=>'segunda_recuperacao_'.$notas_alunos["aluno"][$i]->id)) ?></td>
						<td><?php echo CHtml::textField('', $notas_alunos["nota"][$i][0]->terceira_certificacao, array('min'=>0, 'max'=>10,  'id'=>'terceira_certificacao_'.$notas_alunos["aluno"][$i]->id)) ?></td>

						<?php $media_anual = Nota::calcularMediaAnual($medias["primeira"], $medias["segunda"], $medias["terceira"]); ?>
						<?php if($notas_alunos["nota"][$i][0]->terceira_recuperacao == null): ?>

							<td><?php echo CHtml::textField('', '' , array('min'=>0, 'max'=>10, 'id'=>'terceira_recuperacao_'.$notas_alunos["aluno"][$i]->id)) ?></td>
						
							<td><?php echo $media_anual ?></td>
							<?php 	if($media_anual >= 7) 
										$media_final = $media_anual; 
									else $media_final="*"; 
							?>
							<td><?php echo $media_final ?></td>
							<?php if (Nota::situacaoAluno($media_final) == "Aprovado"): ?>
								<td class="approved"><?php echo Nota::situacaoAluno($media_final); ?></td>

							<?php elseif (Nota::situacaoAluno($media_final) == "Reprovado"): ?>
								<td class="reproved"><?php echo Nota::situacaoAluno($media_final); ?></td>

							<?php elseif (Nota::situacaoAluno($media_final) == "Em Andamento"): ?>
								<td class="progress"><?php echo Nota::situacaoAluno($media_final); ?></td>
							<?php endif; ?>
							<td><?php echo CHtml::htmlButton('Salvar', array('onClick'=>'cadastrarNota('.$notas_alunos["aluno"][$i]->id.', '.$disciplina_professor->disciplina->id.');')); ?></td>
						<?php else: ?>
							<?php
								$pfv = $notas_alunos["nota"][$i][0]->terceira_recuperacao;
								$media_com_pfv = Nota::calcularMediaComPfv($media_anual, $pfv);
							?>
							<td><?php echo CHtml::textField('', $notas_alunos["nota"][$i][0]->terceira_recuperacao, array('min'=>0, 'max'=>10,  'id'=>'terceira_recuperacao_'.$notas_alunos["aluno"][$i]->id)) ?></td>
							<td><?php echo $media_anual ?></td>
							<td><?php echo $media_com_pfv; ?></td>
							
							<?php if (Nota::situacaoAlunoComPfv($media_com_pfv) == "Aprovado"): ?>
								<td class="approved"><?php echo Nota::situacaoAlunoComPfv($media_com_pfv); ?></td>
							<?php elseif (Nota::situacaoAlunoComPfv($media_com_pfv) == "Reprovado"): ?>
								<td class="reproved"><?php echo Nota::situacaoAlunoComPfv($media_com_pfv); ?></td>

							<?php elseif (Nota::situacaoAlunoComPfv($media_com_pfv) == "Em Andamento"): ?>
								<td class="progress"><?php echo Nota::situacaoAlunoComPfv($media_com_pfv); ?></td>
							<?php endif; ?>
							<td><?php echo CHtml::htmlButton('Salvar', array('onClick'=>'cadastrarNota('.$notas_alunos["aluno"][$i]->id.', '.$disciplina_professor->disciplina->id.');')); ?></td>
						<?php endif; ?>
					<?php endif; ?>
				</tr>
			<?php endfor; ?>
		</tbody>
	</table>
</div><!-- form -->