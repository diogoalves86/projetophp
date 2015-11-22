<?php
/* @var $this TurmaController */
/* @var $data Turma */

?>

<div class="view">
	<?php if(empty($alunos_turma)): ?>
		<h2>Esta turma não possui alunos cadastrados.</h2>
	<?php else: ?>
		<table class="data-table">
			<thead>
				<th>Nome</th>
				<th>Matrícula</th>
			</thead>
			<tbody>
				<?php foreach ($alunos_turma as $aluno_turma):?>
					<tr>
						<td><?php echo $aluno_turma->aluno->nome ?></td>
						<td><?php echo $aluno_turma->aluno->matricula ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<?php endif; ?>
</div>