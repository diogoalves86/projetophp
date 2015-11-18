<?php
/* @var $this NotaController */
/* @var $model Nota */
?>


<?php $this->renderPartial('_form', array('model'=>$model, 'disciplina'=>$disciplina, 'aluno'=>$aluno, 'aluno_turma'=>$aluno_turma, 'disciplina_professor'=>isset($disciplina_professor) ? $disciplina_professor : null)); ?>