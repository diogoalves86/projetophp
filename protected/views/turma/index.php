<?php
/* @var $this TurmaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Turmas',
);

$this->menu=array(
	array('label'=>'Cadastrar Turma', 'url'=>array('cadastrar')),
	array('label'=>'Gerenciar Turmas', 'url'=>array('admin')),
);
?>

<h1>Turmas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
