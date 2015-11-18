<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	<table class="data-table">
		<thead>
			<th>Nome</th>
			<th>CPF</th>
			<th>Matricula</th>
			<th>Nivel</th>
			<th>Email</th>
			<th>Senha</th>
		</thead>
		<tbody>
			<td><?php echo $form->textField($model,'nome',array('size'=>60,'maxlength'=>100)); ?></td>
			<td><?php echo $form->textField($model,'cpf',array('size'=>14,'maxlength'=>14)); ?></td>
			<td><?php echo $form->textField($model,'matricula',array('size'=>20,'maxlength'=>20)); ?></td>
			<td><?php echo $form->textField($model,'nivel'); ?></td>
			<td><?php echo $form->textField($model,'email',array('size'=>20,'maxlength'=>20)); ?></td>
			<td><?php echo $form->textField($model,'senha',array('size'=>20,'maxlength'=>20)); ?></td>
		</tbody>
	</table>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->