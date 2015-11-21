<?php
/* @var $this ProfessorTurmaController */
/* @var $model ProfessorTurma */

$this->breadcrumbs=array(
	'Professor Turmas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProfessorTurma', 'url'=>array('index')),
	array('label'=>'Create ProfessorTurma', 'url'=>array('create')),
	array('label'=>'Update ProfessorTurma', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProfessorTurma', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProfessorTurma', 'url'=>array('admin')),
);
?>

<h1>View ProfessorTurma #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'professor_id',
		'turma_id',
	),
)); ?>
