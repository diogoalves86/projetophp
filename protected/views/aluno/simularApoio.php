<?php
/* @var $this NotaController */
/* @var $model Nota */
/* @var $form CActiveForm */
?>
<div class="form">
	<script type="text/javascript">
		function simularNota () {
			var primeira_certificacao = $("#primeira_certificacao").val();
			var segunda_certificacao = $("#segunda_certificacao").val();
			var terceira_certificacao = $("#terceira_certificacao").val();
			var media_anual = ((primeira_certificacao * 3) + (segunda_certificacao * 3) + (terceira_certificacao * 4)) / 10;
			var resultado = 25 - ((media_anual*3)/2);
			console.log("Media Anual: "+media_anual);
			console.log("Resultado: "+resultado);
			//alert("Você precisa de "+resultado+" nesta disciplina. Boa sorte!");
		}
	</script>
	<p>Entre com suas notas para simular os resultados.</p>
	<table data-table>
		<thead>
			<th>1ºC</th>
			<th>2º C</th>
			<th>3º C</th>
			<th>Ação</th>
		</thead>
		<tbody>
			<td><?php echo CHtml::textField("", "", array('id'=>'primeira_certificacao')) ?></td>
			<td><?php echo CHtml::textField("", "", array('id'=>'segunda_certificacao')) ?></td>
			<td><?php echo CHtml::textField("", "", array('id'=>'terceira_certificacao')) ?></td>
			<td><?php echo CHtml::htmlButton("Simular", array('onClick'=>'simularNota()')) ?></td>
		</tbody>
	</table>
</div><!-- form -->