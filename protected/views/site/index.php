<div class="container">
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
				<dd><a href="<?php echo Yii::app()->createUrl('usuario/atualizarCadastro/', array('id'=>$model->matricula)) ?>">Alterar senha</a></dd>
				<dd><a href="<?php echo Yii::app()->createUrl('site/logout')?>">Sair do sistema</a></dd>
		</dl>
	</div>

	<div class="role-painel">
		<?php if(Yii::app()->user->isInRole('PROFESSOR') !== false): ?>
			<?php $this->renderPartial('//professor/professor', array('model'=>$model,
			 	'lista_turmas'=>ProfessorTurma::model()->listaTurmas(Yii::app()->user->id)

			 )); ?>
		<?php elseif(Yii::app()->user->isInRole('ALUNO') !== false): ?>
			<?php $this->renderPartial('//aluno/aluno', array('model'=>$model)); ?>
		<?php else: ?>
			<?php $this->renderPartial('//admin/admin', array('model'=>$model)); ?>
		<?php endif; ?>
	</div>
</div>