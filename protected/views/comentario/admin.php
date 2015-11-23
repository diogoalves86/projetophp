<?php
/* @var $this ComentarioController */
/* @var $model Comentario */

$this->breadcrumbs=array(
	'Comentarios'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Exibir Comentários', 'url'=>array('index')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#comentario-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Comentarios</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'comentario-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'assunto',
		'mensagem',
		'aluno_id',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
