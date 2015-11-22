<?php
/* @var $this TurmaController */
/* @var $data Turma */

?>

<div class="view">
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
</div>