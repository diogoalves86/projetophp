<?php 
Yii::import('application.controllers.UsuarioController');
class ProfessorController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'users'=>array("@"),
			),
		);
	}

	public function actionDiario($id)
	{
		if(Yii::app()->user->isInRole("PROFESSOR") == false)
			throw new CHttpException(404, "A página solicitada não existe");
			

		$model = Usuario::model()->find("id='".Yii::app()->user->id."'");
		$turma = Turma::model()->find("nome='".$id."'");
		$alunos_turma = AlunoTurma::model()->findAll("turma_id='".$turma->id."'");
		$disciplina_professor = ProfessorDisciplina::model()->find("professor_id='".Yii::app()->user->id."'");
		$notas_alunos = array();
		foreach ($alunos_turma as $chave=>$aluno_turma) {
			$aluno = Usuario::model()->find("id='".$aluno_turma->aluno_id."'");
			$nota_aluno = Nota::model()->findAll("usuario_id='".$aluno->id."' && disciplina_id='".$disciplina_professor->disciplina->id."'");
			$notas_alunos["aluno"][$chave] = $aluno;
			$notas_alunos["nota"][$chave] = $nota_aluno;
		}
		$this->render('diario', array(
			'notas_alunos'=>$notas_alunos,
			'disciplina_professor'=>$disciplina_professor,
			'model'=>$model
		));
	}
}