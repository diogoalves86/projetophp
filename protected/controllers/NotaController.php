<?php

class NotaController extends Controller
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
			array('allow',
				'actions'=>array('create'),
				'users'=>array(Yii::app()->user->name),
				'expression'=>'Yii::app()->user->isInRole("ADMIN") !== false',
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
			'model'=>$this->loadModel($id),
		));
	}

	public function actionGerarBoletim($id)
	{
		$model = Nota::model()->findAll("usuario_id=".$id);
		$this->render('view', array(
				'model'=>$model,
			));
	}

	public function actionGerarNotas($id)
	{
		$model = Disciplina::model()->findAll("disciplina_id=".$id);
		$this->render('view', array(
				'model'=>$model,
			));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id, $turma)
	{
		$model=new Nota;
		$disciplinas = Disciplina::model()->find("id=".$id);
		$lista_alunos = array();
		$turma = Turma::model()->find("nome='".$turma."'");
		$aluno_turma = AlunoTurma::model()->findAll("turma_id=".$turma->id);
		
		if(Yii::app()->user->isInRole("PROFESSOR") !== false){
			$disciplina = Usuario::model()->findByPk(Yii::app()->user->id);
			$disciplina_professor = $disciplina->professorDisciplinas[0]->disciplina_id;	
		}

		foreach ($aluno_turma as $aluno) {
			array_push($lista_alunos, Usuario::model()->find("id='".$aluno->aluno_id."'"));
		}

		$lista_disciplinas = CHtml::listData($disciplinas, "id", "nome");

		if(Yii::app()->user->isInRole("ALUNO") !== false){
			unset($lista_alunos);
			$lista_alunos[] = Usuario::model()->find("id='".Yii::app()->user->id."'");	
		}


		//$lista_alunos = CHtml::listData($alunos, "id", "nome");

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Nota']))
		{
			$model->attributes=$_POST['Nota'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'aluno'=>Usuario::model()->findAll(),
			'aluno_turma'=>$lista_alunos,
			'disciplina'=>$lista_disciplinas,
			'disciplina_professor'=>isset($disciplina_professor) ? $disciplina_professor : null,
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
		$disciplinas = $model->disciplina;
		$lista_disciplinas = Disciplina::model()->find("id=".$model->disciplina_id);
		$lista_alunos = Usuario::model()->find("id=".$model->usuario_id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Nota']))
		{
			$model->attributes=$_POST['Nota'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'aluno'=>$lista_alunos,
			'disciplina'=>$lista_disciplinas,
			'model'=>$model,
		));
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Nota');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Nota('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Nota']))
			$model->attributes=$_GET['Nota'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Nota the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Nota::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Nota $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='nota-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
