<?php
Yii::import('application.controllers.NotaController');
class TurmaController extends Controller
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
				'actions'=>array(),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('admin','view', 'notas','atualizar', 'create', 'delete', 'alunos', 'associarAluno', 'novoAluno', 'associarProfessor', 'novoProfessor'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>Turma::model()->find("nome='".$id."'"),
		));
	}

	public function actionNotas($id)
	{
		if(Yii::app()->user->isInRole('ALUNO'))
			throw new CHttpException(404, "A página solicitada não existe");
			
		$turma = Turma::model()->find("nome='".$id."'");
		$alunos_turma = AlunoTurma::model()->findAll("turma_id='".$turma->id."'");
		$notas_turma = array();
		//$notas_aluno = array();
		foreach ($alunos_turma as $indice=>$aluno_turma) {
			if(Yii::app()->user->isInRole('PROFESSOR')){
				$professor_disciplina = ProfessorDisciplina::model()->find("professor_id='".Yii::app()->user->id."'");
				$notas_aluno = Nota::model()->findAll("usuario_id='".$aluno_turma->aluno_id."' && disciplina_id='".$professor_disciplina->disciplina_id."'");
			}
			else
				$notas_aluno = Nota::model()->findAll("usuario_id='".$aluno_turma->aluno_id."'");

			$notas_turma["aluno"][$indice] = $aluno_turma->aluno;
			$notas_turma["nota"][$indice] = $notas_aluno;

			//array_push($notas_turma, isset($notas_aluno) ? $notas_aluno : null);
		}
		$this->render('notas', array(
					'model'=>$turma,
					'notas_turma'=>$notas_turma,
			));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Turma;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Turma']))
		{
			$model->attributes=$_POST['Turma'];
			if($model->save())
				$this->redirect(array('visualizar','id'=>$model->nome));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Turma']))
		{
			$model->attributes=$_POST['Turma'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionAlunos($id)
	{
		if(Yii::app()->user->isInRole('ADMIN') == false)
			throw new CHttpException(404, "A página solicitada não existe.");
			
		$turma = Turma::model()->find("nome='".$id."'");
		$alunos_turma = $turma->alunoTurmas;

		$this->render('alunos', array(
				'alunos_turma'=>$alunos_turma
			));
	}

	public function actionAssociarProfessor()
	{
		if(Yii::app()->user->isInRole('ADMIN') == false)
			throw new CHttpException(404, "A página solicitada não existe.");

		$professores_sem_turma = array();
		$professores_turmas = ProfessorTurma::model()->findAll();
		$turmas = Turma::model()->findAll();			
		$lista_turmas = CHtml::listData($turmas, "id", "nome");
		$professores =  Usuario::model()->findAll("nivel=3");
		foreach ($professores as $professor){
			$professor_turma = ProfessorTurma::model()->find("professor_id='".$professor->id."'");
			if ($professor_turma == null)
				array_push($professores_sem_turma, $professor);
		}
		Yii::app()->user->setReturnUrl("turma/associarProfessor");
		$this->render('associarProfessores', array(
				'professores_sem_turma'=>$professores_sem_turma,
				'lista_turmas'=>$lista_turmas
			));
	}

	public function actionNovoProfessor($id, $professor_id)
	{
		if(Yii::app()->user->isInRole('ADMIN') == false)
			throw new CHttpException(404, "A página solicitada não existe.");
		
		$professor_turma = new ProfessorTurma();
		$professor_turma->setAttribute("professor_id", $professor_id);
		$professor_turma->setAttribute("turma_id", $id);
		if($professor_turma->save())
			$this->redirect(Yii::app()->createAbsoluteUrl(Yii::app()->user->returnUrl));
	}

	public function actionAssociarAluno()
	{
		if(Yii::app()->user->isInRole('ADMIN') == false)
			throw new CHttpException(404, "A página solicitada não existe.");

		$alunos_sem_turma = array();
		$alunos_turmas = AlunoTurma::model()->findAll();
		$turmas = Turma::model()->findAll();
		$lista_turmas = CHtml::listData($turmas, "id", "nome");
		$alunos = Usuario::model()->findAll("nivel=2");

		foreach ($alunos as $aluno){
			$aluno_turma = AlunoTurma::model()->find("aluno_id='".$aluno->id."'");
			if ($aluno_turma == null)
				array_push($alunos_sem_turma, $aluno);
		}

		Yii::app()->user->setReturnUrl("turma/associarAluno");

		$this->render('associarAlunos', array(
				'alunos_sem_turma'=>$alunos_sem_turma,
				'lista_turmas'=>$lista_turmas
			));

	}


	public function actionNovoAluno($id, $aluno_id)
	{
		if(Yii::app()->user->isInRole('ADMIN') == false)
			throw new CHttpException(404, "A página solicitada não existe.");
		
		$aluno_turma = new AlunoTurma();
		$aluno_turma->setAttribute("aluno_id", $aluno_id);
		$aluno_turma->setAttribute("turma_id", $id);
		if($aluno_turma->save())
			$this->redirect(Yii::app()->createAbsoluteUrl(Yii::app()->user->returnUrl));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		if(Yii::app()->user->isInRole('ALUNO'))
			throw new CHttpException(403, "Você não possui autorização de acesso a esta página.");
			
		$dataProvider=new CActiveDataProvider('Turma');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Turma('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Turma']))
			$model->attributes=$_GET['Turma'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Turma the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Turma::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Turma $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='turma-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
