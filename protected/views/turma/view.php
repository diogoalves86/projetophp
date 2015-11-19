<?php
/* @var $this TurmaController */
/* @var $model Turma */

$this->breadcrumbs=array(
	'Turmas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Exibir Turmas', 'url'=>array('index')),
	array('label'=>'Cadastrar Turma', 'url'=>array('cadastrar')),
	array('label'=>'Atualizar Turma', 'url'=>array('atualizar', 'id'=>$model->id)),
	array('label'=>'Excluir Turma', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gerenciar Turmas', 'url'=>array('admin')),
);
?>

<h1>Visualizando Turma: <b>#<?php echo $model->nome; ?></b></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nome',
		'turno',
	),
)); ?>
