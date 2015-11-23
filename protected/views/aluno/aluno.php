<dl>
	<dt>Painel de Controle</dt>
		<dd><a href="<?php echo Yii::app()->createUrl('aluno/boletim/'.$model->matricula) ?>">Boletim Online</a></dd>
		<dd><a href="<?php echo Yii::app()->createUrl('aluno/simularApoio') ?>">Simular nota para PFV</a></dd>
	<dt>Comentários</dt>
		<dd><a href="<?php echo Yii::app()->createUrl('comentario/listar/'.$model->matricula); ?>">Meus comentários</a></dd>
		<dd><a href="<?php echo Yii::app()->createUrl('comentario/inserir'); ?>">Novo comentário</a></dd>
</dl>