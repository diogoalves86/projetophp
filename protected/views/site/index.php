<div class="user-painel">
	<dl>
		<dt>Dados</dt>
			<dd>Nome: 
				<?php if(Yii::app()->user->isGuest == false) echo $model->nome ?>
			</dd>
			<dd>Matrícula:
				<?php if(Yii::app()->user->isGuest == false) echo $model->matricula ?>
			</dd>
			<dd>Email:
				<?php if(Yii::app()->user->isGuest == false) echo $model->email ?>
			</dd>
	</dl>
	<dl>
		<dt>Configurações</dt>
			<dd><a href="">Alterar senha</a></dd>
			<dd><a href="">Alterar cadastro</a></dd>
			<dd><a href="">Sair do sistema</a></dd>
	</dl>
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