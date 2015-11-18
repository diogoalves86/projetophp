<div class="user-painel">
	<h3>Bem vindo, <?php echo $model->nome?></h3>
	<ul>
		<li>Nome</li>
		<li>Matrícula</li>
		<li>Email</li>
			<ul>
				<li><a href="">Editar</a></li>
			</ul>
	</ul>
	<ul>
		<li><a href="">Alterar senha</a></li>
		<li><a href="">Alterar cadastro</a></li>
		<li><a href="">Sair do sistema</a></li>
	</ul>
</div>

<div class="role-painel">
	<?php if(Yii::app()->user->isInRole('PROFESSOR') !== false): ?>
		<?php $this->renderPartial('professor', array('model'=>$model)); ?>
	<?php elseif(Yii::app()->user->isInRole('ALUNO') !== false): ?>
		<?php $this->renderPartial('aluno', array('model'=>$model)); ?>
	<?php else: ?>
		<?php $this->renderPartial('admin', array('model'=>$model)); ?>
	<?php endif; ?>
</div>