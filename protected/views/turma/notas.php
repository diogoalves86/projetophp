<?php 
$notas_primeira_certificacao_aluno = array();
$notas_segunda_certificacao_aluno = array();
$notas_terceira_certificacao_aluno = array();
$notas_primeira_recuperacao_aluno = array();
$notas_segunda_recuperacao_aluno = array();
$notas_terceira_recuperacao_aluno = array();
 ?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'nota-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'action'=> Yii::app()->createUrl('nota/create/'.$_GET['id']),
	'method'=>'get',
)); ?>

	<table data-table>
		<?php echo $form->errorSummary($model); ?>
		<thead>
			<th>Nomes</th>
			<th>1ºC</th>
			<th>REC 1</th>
			<th>2º C</th>
			<th>REC 2</th>
			<th>3º C</th>
			<th>REC 3</th>
			<th>MÉDIA ANUAL</th>
			<th>Ação</th>
		</thead>
		<tbody>
			<?php foreach ($notas_aluno as $nota_aluno):?>
				<tr>
					<?php $nome_aluno_atual = $nota_aluno->usuario->nome; ?>
					<td><?php echo $nota_aluno->usuario->nome;?></td>
					<td><?php echo $nota_aluno->primeira_certificacao; ?></td>
					<td><?php echo $nota_aluno->segunda_certificacao; ?></td>
					<td><?php echo $nota_aluno->terceira_certificacao; ?></td>
					<td><?php echo $nota_aluno->primeira_recuperacao; ?></td>
					<td><?php echo $nota_aluno->segunda_recuperacao; ?></td>
					<td><?php echo $nota_aluno->terceira_recuperacao; ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php $this->endWidget(); ?>
	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Cadastrar' : 'Salvar'); ?>
	</div>
</div><!-- form -->