<?php 
?>
<div class="form">

	<h1>Aluno: <?php echo $aluno->nome; ?></h1>
	<table data-table>
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
				<tr>
					<td><?php echo $nota_aluno->disciplina->nome;  ?></td>				
					<td><?php echo $nota_aluno->primeira_certificacao == null ? "" : $nota_aluno->primeira_certificacao ?></td>
					<td><?php echo $nota_aluno->primeira_recuperacao == null ? "" : $nota_aluno->primeira_recuperacao ?></td>
					<td><?php echo $nota_aluno->segunda_certificacao == null ? "" : $nota_aluno->segunda_certificacao ?></td>
					<td><?php echo $nota_aluno->segunda_recuperacao == null ? "" : $nota_aluno->segunda_recuperacao ?></td>
					<td><?php echo $nota_aluno->terceira_certificacao == null ? "" : $nota_aluno->terceira_certificacao ?></td>

					<?php if($nota_aluno->terceira_recuperacao == null): ?>
						<?php //Se o aluno não ficou de PFV, então sua média anual é igual a média final. ?>
						<td></td>
						<td>
							<?php 
								$media_anual = Nota::calcularMediaAnual($nota_aluno->primeira_certificacao, $nota_aluno->segunda_certificacao, $nota_aluno->terceira_certificacao);
								$media_final = $media_anual;
								echo $media_final;
							 ?>
						</td>
						<td><?php echo $media_anual ?></td>
						<td><?php echo Nota::situacaoAluno($media_final); ?></td>
						
					<?php else: ?>
						<td><?php echo $nota_aluno->terceira_recuperacao ?></td>
						<td>
							<?php $nota_final_terceira_recuperacao = ($nota_aluno->terceira_certificacao + $nota_aluno->terceira_recuperacao) / 2 ?>
							<?php 
								$media_final = Nota::calcularMediaAnual($nota_aluno->primeira_certificacao, $nota_aluno->segunda_certificacao, $nota_final_terceira_recuperacao); 
								echo $media_final;
							?>
						</td>
						<td>
							<?php
						 		$media_anual =  Nota::calcularMediaAnual($nota_aluno->primeira_certificacao, $nota_aluno->segunda_certificacao, $nota_aluno->terceira_certificacao);
						 		echo $media_anual;
						 	?>
					 	</td>
						<td><?php echo Nota::situacaoAluno($media_final); ?></td>
					
					<?php endif; ?>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div><!-- form -->