<?php
/* @var $this TurmaController */
/* @var $data Turma */
?>

<div class="view">
	<script type="text/javascript">
		function associarAluno (aluno_id) {
			var turma_id = $("#lista_turmas_"+aluno_id).val();
			var redirect = "<?php echo Yii::app()->createAbsoluteUrl('turma/novoAluno') ?>/"+turma_id+"/?aluno_id="+aluno_id;
			location.href = redirect;
		}
	</script>
	<?php if(empty($alunos_sem_turma)): ?>
		<h2>Não existem alunos cadastrados no sistema que não possuam turma.</h2>
	<?php else: ?>
		<table class="data-table">
			<thead>
				<th>Aluno</th>
				<th>Matrícula</th>
				<th>Turmas</th>
				<th>Ação</th>
			</thead>
			<tbody>
				
				<?php foreach ($alunos_sem_turma as $aluno_sem_turma): ?>
					<tr>
						<td><?php echo $aluno_sem_turma->nome ?></td>
						<td><?php echo $aluno_sem_turma->matricula ?></td>
						<td><?php echo CHtml::dropDownList("turmas", "", $lista_turmas, array('id'=>'lista_turmas_'.$aluno_sem_turma->id)) ?></td>
						<td><?php echo CHtml::htmlButton("Associar aluno", array('onClick'=>'associarAluno('.$aluno_sem_turma->id.')'));  ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	<?php endif; ?>

</div>