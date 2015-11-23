<?php
/* @var $this ComentarioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Comentarios',
);

$this->menu=array(
	array('label'=>'Gerenciar Comentarios', 'url'=>array('admin')),
);
?>

<h2>Comentários</h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
