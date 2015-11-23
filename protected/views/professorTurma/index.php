<?php
/* @var $this ProfessorTurmaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Professor Turmas',
);
?>
<h1>Professor Turmas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
