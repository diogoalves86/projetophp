<?php
/* @var $this ProfessorTurmaController */
/* @var $model ProfessorTurma */

$this->breadcrumbs=array(
	'Professor Turmas'=>array('index'),
	'Create',
);
?>
<h1>Cadastrar Professor</h1>

<?php $this->renderPartial('//professorTurma/_form', array('model'=>$model, 'disciplinas'=>$disciplinas)); ?>