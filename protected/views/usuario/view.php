<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nome',
		'cpf',
		'matricula',
		'nivel',
		'email',
		'senha',
	),
)); ?>
