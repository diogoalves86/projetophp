<ul class="boletim-ul">
	<li>Grau: Médio</li>
	<li>Matrícula: <?php echo $model->matricula ?></li>
	<li>Nome: <?php echo $model->nome; ?></li>
	<li>Turma: <?php echo $turma->nome ?></li>
	<li>Turno: <?php echo $turma->turno ?></li>
</ul>
<table class='data-table'>
	<thead>
		<th colspan="1">Disciplina</th>
		<th colspan="3">1ªC</th>
		<th colspan="3">2ªC</th>
		<th colspan="3">3ªC</th>
		<th colspan="3">Média Final</th>
	</thead>
	<tbody>
		<tr>
			<td>Nomes</td>
			<td colspan="1">Graus</td>
			<td colspan="1">Rec</td>
			<td colspan="1">Média</td>
			<td colspan="1">Graus</td>
			<td colspan="1">Rec</td>
			<td colspan="1">Média</td>
			<td colspan="1">Graus</td>
			<td colspan="1">Rec</td>
			<td colspan="1">Média</td>
			<td colspan="1">MA</td>
			<td colspan="1">PFV</td>
			<td colspan="1">MF</td>
		</tr>
		<tr>
			<?php foreach ($notas as $nota): ?>
				<td rowspan="2"><?php echo $nota->primeira_certificacao ?></td>
				<td rowspan="2"><?php echo $nota->segunda_certificacao ?></td>
				<td rowspan="2"><?php echo $nota->terceira_certificacao ?></td>
				<td rowspan="2"><?php echo $nota->primeira_recuperacao ?></td>
				<td rowspan="2"><?php echo $nota->segunda_recuperacao ?></td>
				<td rowspan="2"><?php echo $nota->terceira_recuperacao ?></td>
			<?php endforeach; ?>
		</tr>
	</tbody>
</table>
