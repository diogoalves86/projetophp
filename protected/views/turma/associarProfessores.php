<?php
/* @var $this TurmaController */
/* @var $data Turma */
?>

<div class="view">
	<script type="text/javascript">
		function associarProfessor (professor_id) {
			var turma_id = $("#lista_turmas_"+professor_id).val();
			var redirect = "<?php echo Yii::app()->createAbsoluteUrl('turma/novoProfessor') ?>/"+turma_id+"/?professor_id="+professor_id;
			location.href = redirect;
		}
	</script>
	<?php if(empty($professores_sem_turma)): ?>
		<h2>Não existem professores cadastrados no sistema que não possuam turma.</h2>
	<?php else: ?>
		<table class="data-table">
			<thead>
				<th>Professor</th>
				<th>Matrícula</th>
				<th>Turmas</th>
				<th>Ação</th>
			</thead>
			<tbody>
				<?php foreach ($professores_sem_turma as $professor_sem_turma): ?>
					<tr>
						<td><?php echo $professor_sem_turma->nome ?></td>
						<td><?php echo $professor_sem_turma->matricula ?></td>
						<td><?php echo CHtml::dropDownList("turmas", "", $lista_turmas, array('id'=>'lista_turmas_'.$professor_sem_turma->id)) ?></td>
						<td><?php echo CHtml::htmlButton("Associar professor", array('onClick'=>'associarProfessor('.$professor_sem_turma->id.')'));  ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	<?php endif; ?>

</div>