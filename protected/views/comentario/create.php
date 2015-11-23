<?php
/* @var $this ComentarioController */
/* @var $model Comentario */

$this->breadcrumbs=array(
	'Comentarios'=>array('index'),
	'Cadastrar',
);
?>

<h2>Cadastrar novo comentário</h2>

<?php $this->renderPartial('_form', array('model'=>$model, 'lista_professores'=>$lista_professores)); ?>