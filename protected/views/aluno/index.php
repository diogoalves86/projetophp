<div class="user-index">
	<?php
	/* @var $this AlunoController */
	/* @var $dataProvider CActiveDataProvider */

	$this->breadcrumbs=array(
		'Alunos',
	);

	$this->menu=array(
		array('label'=>'Cadastrar Aluno', 'url'=>array('create')),
		array('label'=>'Gerenciar Alunos', 'url'=>array('admin')),
	);
	?>
</div>
<h1>Alunos cadastrados no sistema</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
