<dl>
	<dt>Turmas</dt>
		<dd><a href="<?php echo $this->createUrl('turma/index')?>">Todas as turmas</a></dd>
		<dd><a href="<?php echo $this->createUrl('turma/associarAluno')?>">Associar aluno a turma</a></dd>
		<dd><a href="<?php echo $this->createUrl('turma/associarProfessor')?>">Associar professor a turma</a></dd>
</dl>
<dl>
	<dt>Informações</dt>
		<dd><a href="<?php echo $this->createUrl('aluno/listaPaf')?>">Alunos em PAF por Turma</a></dd>
		<dd><a href="<?php echo $this->createUrl('comentario/index')?>">Checar Comentários</a></dd>
</dl>

<dl>
	<dt>Gerenciar Usuários</dt>
		<dd><a href="<?php echo $this->createUrl('aluno/cadastrar')?>">Cadastrar Aluno</a></dd>
		<dd><a href="<?php echo $this->createUrl('professor/cadastrar')?>">Cadastrar Professor</a></dd>
		<dd><a href="<?php echo $this->createUrl('usuario/index')?>">Todos os usuários do Sistema</a></dd>
</dl>