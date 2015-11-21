<dl>
	<dt>Turmas</dt>
		<?php if(empty($lista_turmas)): ?>
			<dd>Você não leciona para nenhuma turma.</dd>

		<?php else: ?>
			<?php foreach ($lista_turmas as $turma): ?>
				<dd><a href="<?php echo Yii::app()->createUrl('professor/diario/'.$turma->nome) ?>"><?php echo $turma->nome; ?></a></dd>
			<?php endforeach; ?>
		<?php endif; ?>
</dl>
<dl>
	<dt>Funções</dt>
		<dd><a href="">Alunos em PAF</a></dd>
		<dd><a href="<?php echo Yii::app()->createUrl('comentario/paramim'); ?>">Checar comentários para mim</a></dd>
</dl>