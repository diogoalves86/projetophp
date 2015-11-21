<?php
/* @var $this ComentarioController */
/* @var $aluno Usuario */
?>
<div class="view">
	<table class="data-table">
		<thead>
			<th>Professor</th>
			<th>Assunto</th>
			<th>Mensagem</th>
			<th>Visualizada</th>
		</thead>
		<tbody>
			<?php foreach ($comentarios_aluno as $comentario_aluno):?>
				<tr>
					<td><?php echo $comentario_aluno->professor->nome ?></td>
					<td><?php echo $comentario_aluno->assunto ?></td>
					<td><?php echo $comentario_aluno->mensagem ?></td>
					<td><?php echo $comentario_aluno->visualizada == true ? "Sim":"Não" ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>

	</table>
</div>