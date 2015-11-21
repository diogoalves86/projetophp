<?php
/* @var $this ProfessorTurmaController */
/* @var $model ProfessorTurma */

$this->breadcrumbs=array(
	'Professor Turmas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ProfessorTurma', 'url'=>array('index')),
	array('label'=>'Create ProfessorTurma', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#professor-turma-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Professor Turmas</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'professor-turma-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'professor_id',
		'turma_id',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
