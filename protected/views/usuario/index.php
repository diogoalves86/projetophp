<div class="user-index">
	<?php
	/* @var $this UsuarioController */
	/* @var $dataProvider CActiveDataProvider */

	$this->breadcrumbs=array(
		'Usuarios',
	);

	$this->menu=array(
		array('label'=>'Cadastrar Usuário', 'url'=>array('cadastrar')),
		array('label'=>'Gerenciar Usuários', 'url'=>array('admin')),
	);
	?>
</div>
<h1>Usuarios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
