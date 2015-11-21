<?php 
?>
<div class="form">

	<h1>Aluno: <?php echo $aluno->nome; ?></h1>
	<table data-table>
		<thead>
			<th>Disciplinas</th>
			<th>1ºC</th>
			<th>REC 1</th>
			<th>MÉDIA 1</th>
			<th>2º C</th>
			<th>REC 2</th>
			<th>MÉDIA 2</th>
			<th>3º C</th>
			<th>MÉDIA ANUAL</th>
			<th>PFV</th>
			<th>MÉDIA FINAL</th>
			<th>SITUAÇÃO</th>
		</thead>
		<tbody>
			<?php foreach ($notas_aluno as $nota_aluno):?>
				<tr>
					<td><?php echo $nota_aluno->disciplina->nome;  ?></td>				
					<td><?php echo $nota_aluno->primeira_certificacao == null ? "" : $nota_aluno->primeira_certificacao ?></td>
					<td><?php echo $nota_aluno->primeira_recuperacao == null ? "" : $nota_aluno->primeira_recuperacao ?></td>
					<td></td>
					<td><?php echo $nota_aluno->segunda_certificacao == null ? "" : $nota_aluno->segunda_certificacao ?></td>
					<td><?php echo $nota_aluno->segunda_recuperacao == null ? "" : $nota_aluno->segunda_recuperacao ?></td>
					<td></td>
					<td><?php echo $nota_aluno->terceira_certificacao == null ? "" : $nota_aluno->terceira_certificacao ?></td>
					<td><?php echo Nota::calcularMediaAnual($nota_aluno->primeira_certificacao, $nota_aluno->segunda_certificacao, $nota_aluno->terceira_certificacao) ?></td>
					<td><?php echo $nota_aluno->terceira_recuperacao == null ? "" : $nota_aluno->terceira_recuperacao ?></td>
					<td></td>
					<td><!--<?php /*echo Nota::situacaoAluno()*/ ?>--></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div><!-- form -->