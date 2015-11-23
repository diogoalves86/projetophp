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

	public function actionAlunosPFV()
	{
		
	}

	public function actionCadastrar()
	{
		if(Yii::app()->user->isInRole("ADMIN") == false)
			throw new CHttpException(404, "A página solicitada não existe");

		$model = new Usuario();
		$disciplinas = Disciplina::model()->findAll();
		$disciplinas = CHtml::listData($disciplinas, "id", "nome");
		$professor_disciplina = new ProfessorDisciplina();

		if (isset($_POST['Usuario'])) {
			$model->setAttribute("ativo", 1);
			$model->attributes = $_POST['Usuario'];
			if($model->save()){
				$professor_disciplina->setAttribute("professor_id", $model->id);
				$professor_disciplina->setAttribute("disciplina_id", $_POST['Usuario']['disciplina']);
				if($professor_disciplina->save())
					$this->redirect(Yii::app()->createAbsoluteUrl("/site/index"));
			}
		}

		$this->render('//professorTurma/create', array(
				'disciplinas'=>$disciplinas,
				'model'=>$model,
		));
			
	}

	public function actionDiario($id)
	{
		if(Yii::app()->user->isInRole("PROFESSOR") == false)
			throw new CHttpException(404, "A página solicitada não existe");
			
		$model = Usuario::model()->find("id='".Yii::app()->user->id."'");
		$disciplina_professor = ProfessorDisciplina::model()->find("professor_id='".Yii::app()->user->id."'");

		$notas_alunos = $this->notasAlunosPorTurma($id, $disciplina_professor);

		//Depois de salvar as notas, o professor volta ao diário
		Yii::app()->user->setReturnUrl("professor/diario/".$id);

		$this->render('diario', array(
			'notas_alunos'=>$notas_alunos,
			'disciplina_professor'=>$disciplina_professor,
			'model'=>$model
		));
	}

	private function notasAlunosPorTurma($id, $disciplina_professor)
	{
		$turma = Turma::model()->find("nome='".$id."'");
		$alunos_turma = AlunoTurma::model()->findAll("turma_id='".$turma->id."'");
		$notas_alunos = array();
		foreach ($alunos_turma as $chave=>$aluno_turma) {
			$aluno = Usuario::model()->find("id='".$aluno_turma->aluno_id."'");
			$nota_aluno = Nota::model()->findAll("usuario_id='".$aluno->id."' && disciplina_id='".$disciplina_professor->disciplina->id."'");
			$notas_alunos["aluno"][$chave] = $aluno;
			$notas_alunos["nota"][$chave] = $nota_aluno;
		}
		return $notas_alunos;
	}
}