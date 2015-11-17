<?php
/* @var $this TurmaController */
/* @var $model Turma */

$this->breadcrumbs=array(
	'Turmas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Turma', 'url'=>array('index')),
	array('label'=>'Create Turma', 'url'=>array('create')),
	array('label'=>'View Turma', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Turma', 'url'=>array('admin')),
);
?>

<h1>Update Turma <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>