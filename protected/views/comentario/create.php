<?php
/* @var $this ComentarioController */
/* @var $model Comentario */

$this->breadcrumbs=array(
	'Comentarios'=>array('index'),
	'Cadastrar',
);

$this->menu=array(
	array('label'=>'Exibir Comentários', 'url'=>array('index')),
	array('label'=>'Gerenciar Comentário', 'url'=>array('admin')),
);
?>

<h2>Cadastrar novo comentário</h2>

<?php $this->renderPartial('_form', array('model'=>$model, 'lista_professores'=>$lista_professores)); ?>