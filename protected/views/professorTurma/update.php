<?php
/* @var $this ProfessorTurmaController */
/* @var $model ProfessorTurma */

$this->breadcrumbs=array(
	'Professor Turmas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProfessorTurma', 'url'=>array('index')),
	array('label'=>'Create ProfessorTurma', 'url'=>array('create')),
	array('label'=>'View ProfessorTurma', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProfessorTurma', 'url'=>array('admin')),
);
?>

<h1>Update ProfessorTurma <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>