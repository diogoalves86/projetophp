<?php 
?>
<div class="form data-table">

	<h1>Aluno: <?php echo $aluno->nome; ?></h1>
	<table class="data-table">
		<thead>
			<th>Disciplinas</th>
			<th>1ºC</th>
			<th>REC 1</th>
			<!--<th>MÉDIA 1</th>-->
			<th>2º C</th>
			<th>REC 2</th>
			<!--<th>MÉDIA 2</th>-->
			<th>3º C</th>
			<th>PFV</th>
			<th>MÉDIA FINAL</th>
			<th>MÉDIA ANUAL</th>
			<th>SITUAÇÃO</th>
		</thead>
		<tbody>
			<?php foreach ($notas_aluno as $nota_aluno):?>
				<?php $medias = Nota::calcularMediasTrimestrais($nota_aluno); ?>
				<tr>
					<td><?php echo $nota_aluno->disciplina->nome;  ?></td>				
					<td><?php echo $nota_aluno->primeira_certificacao == null ? "" : $nota_aluno->primeira_certificacao ?></td>
					<td><?php echo $nota_aluno->primeira_recuperacao == null ? "" : $nota_aluno->primeira_recuperacao ?></td>
					<td><?php echo $nota_aluno->segunda_certificacao == null ? "" : $nota_aluno->segunda_certificacao ?></td>
					<td><?php echo $nota_aluno->segunda_recuperacao == null ? "" : $nota_aluno->segunda_recuperacao ?></td>
					<td><?php echo $nota_aluno->terceira_certificacao == null ? "" : $nota_aluno->terceira_certificacao ?></td>
					<?php $media_anual = Nota::calcularMediaAnual($medias["primeira"], $medias["segunda"], $medias["terceira"]); ?>
					<?php if($nota_aluno->terceira_recuperacao == null): $media_final = $media_anual; ?>
						<td></td>
						<td><?php echo $media_final ?></td>
						<td><?php echo $media_anual ?></td>
						<td><?php echo Nota::situacaoAluno($media_final); ?></td>
					
					<?php else: ?>
						<?php
							$pfv = $nota_aluno->terceira_recuperacao;
							$media_com_pfv = Nota::calcularMediaComPfv($media_anual, $pfv);
						?>
						<td><?php echo $nota_aluno->terceira_recuperacao ?></td>
						<td><?php echo $media_com_pfv; ?></td>
						<td><?php echo $media_anual ?></td>
						<td><?php echo Nota::situacaoAlunoComPfv($media_com_pfv); ?></td>

					<?php endif; ?>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div><!-- form -->