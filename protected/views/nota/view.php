<?php
/* @var $this NotaController */
/* @var $model Nota */

$this->breadcrumbs=array(
	'Notas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Nota', 'url'=>array('index')),
	array('label'=>'Create Nota', 'url'=>array('create')),
	array('label'=>'Update Nota', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Nota', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Nota', 'url'=>array('admin')),
);
?>

<h1>Visualizar Nota #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'primeira_certificacao',
		'segunda_certificacao',
		'terceira_certificacao',
		'primeira_recuperacao',
		'segunda_recuperacao',
		'terceira_recuperacao',
		'disciplina_id',
		'usuario_id',
	),
)); ?>
