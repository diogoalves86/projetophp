<?php
/* @var $this ProfessorTurmaController */
/* @var $model ProfessorTurma */

$this->breadcrumbs=array(
	'Professor Turmas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Professores', 'url'=>array('index')),
	array('label'=>'Gerenciar Professores', 'url'=>array('admin')),
);
?>

<h1>Cadastrar Professor</h1>

<?php $this->renderPartial('//professorTurma/_form', array('model'=>$model, 'disciplinas'=>$disciplinas)); ?>