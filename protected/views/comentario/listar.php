<?php
/* @var $this ComentarioController */
/* @var $aluno Usuario */

?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comentario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
	<div class="view">
		<table class="data-table">
			<thead>
				<?php if(Yii::app()->user->isInRole('PROFESSOR')): ?>
					<th>Aluno</th>
				<?php elseif (Yii::app()->user->isInRole('ALUNO')): ?>
					<th>Professor</th>
				<?php endif; ?>
				<th>Assunto</th>
				<th>Mensagem</th>
				<th>Visualizada</th>
			</thead>
			<tbody>
				<?php if(Yii::app()->user->isInRole('ALUNO')): ?>
					<?php foreach ($comentarios_aluno as $comentario_aluno):?>
						<tr>
							<td><?php echo $comentario_aluno->professor->nome ?></td>
							<td><?php echo $comentario_aluno->assunto ?></td>
							<td><?php echo $comentario_aluno->mensagem ?></td>
							<td><?php echo $comentario_aluno->visualizada == true ? "Sim":"Não" ?></td>
						</tr>
					<?php endforeach; ?>

				<?php elseif  (Yii::app()->user->isInRole('PROFESSOR')):  ?>

					<script type="text/javascript">
						function visualizarNota(comentario_id){
							var checked = $("#comentario_"+comentario_id).is(':checked') == true ? 1:0;
							var requisicao = "<?php echo Yii::app()->createAbsoluteUrl('comentario/visualizarComentario/"+comentario_id+"?visualizada_status="+checked+"'); ?>";
							location.href = requisicao;
						}
					</script>

					<?php foreach ($comentarios_professor as $comentario_professor):?>
						<tr>
							<td><?php echo $comentario_professor->aluno->nome ?></td>
							<td><?php echo $comentario_professor->assunto ?></td>
							<td><?php echo $comentario_professor->mensagem ?></td>
							<td><?php echo CHtml::checkBox('Comentario[visualizada]', $comentario_professor->visualizada, array('id'=>'comentario_'.$comentario_professor->id, 'onClick'=>"visualizarNota(".$comentario_professor->id.")")) ?></td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
<?php $this->endWidget(); ?>