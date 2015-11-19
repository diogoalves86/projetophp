<?php
/* @var $this TurmaController */
/* @var $model Turma */

$this->breadcrumbs=array(
	'Turmas'=>array('index'),
	'Cadastrar',
);

$this->menu=array(
	array('label'=>'Exibir Turmas', 'url'=>array('index')),
	array('label'=>'Gerenciar Turmas', 'url'=>array('admin')),
);
?>

<h1>Cadastrar Turma</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>