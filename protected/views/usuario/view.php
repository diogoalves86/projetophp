<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array(
			'class'=> 'data-table',		
	),
	'attributes'=>array(
		'nome',
		'cpf',
		'matricula',
		'nivel',
		'email',
	),
)); ?>
