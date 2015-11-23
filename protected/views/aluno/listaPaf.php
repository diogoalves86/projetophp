<?php 

/*foreach ($notas_alunos as $notas_aluno) {
	$medias = Nota::calcularMediasTrimestrais($nota_aluno);
	$media_anual = Nota::calcularMediaAnual($medias["primeira"], $medias["segunda"], $medias["terceira"]);
	if($media_anual >= 7) 
		$media_final = $media_anual; 
	else $media_final="*"; 
}*/
 ?>
<div class="form data-table">
	<table class="data-table">
		<thead>
			<th>Aluno</th>
			<th>Turma</th>
			<th>Disciplina</th>
			<th>Média Anual</th>
		</thead>
		<tbody>
			<?php foreach ($notas_alunos as $nota_aluno): ?>
				<tr>
					<?php $medias = Nota::calcularMediasTrimestrais($nota_aluno);?>
					<?php $media_anual = Nota::calcularMediaAnual($medias["primeira"], $medias["segunda"], $medias["terceira"]);  ?>
					<?php if($media_anual <= 7): ?>
						<td><?php echo $nota_aluno->usuario->nome?></td>
						<td><?php echo $nota_aluno->usuario->alunoTurmas[0]->turma->nome ?></td>
						<td><?php echo $nota_aluno->disciplina->nome?></td>
						<td><?php echo $media_anual?></td>
					<?php endif; ?>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>