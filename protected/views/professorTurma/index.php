<?php
/* @var $this ProfessorTurmaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Professor Turmas',
);

$this->menu=array(
	array('label'=>'Create ProfessorTurma', 'url'=>array('create')),
	array('label'=>'Manage ProfessorTurma', 'url'=>array('admin')),
);
?>

<h1>Professor Turmas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
