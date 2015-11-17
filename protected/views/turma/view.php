<?php
/* @var $this TurmaController */
/* @var $model Turma */

$this->breadcrumbs=array(
	'Turmas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Turma', 'url'=>array('index')),
	array('label'=>'Create Turma', 'url'=>array('create')),
	array('label'=>'Update Turma', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Turma', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Turma', 'url'=>array('admin')),
);
?>

<h1>View Turma #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nome',
	),
)); ?>
