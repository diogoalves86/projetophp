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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'users'=>array("@"),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Nota;
		$disciplina = Disciplina::model()->findAll();
		$alunos = Usuario::model()->findAll("nivel=2");
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$lista_alunos = array();
		
		if(Yii::app()->user->isInRole("PROFESSOR") !== false){
			$disciplina = Usuario::model()->findByPk(Yii::app()->user->id);
			$disciplina_professor = $disciplina->professorDisciplinas[0]->disciplina_id;	
		}


		//$lista_disciplinas = CHtml::listData($disciplinas, "id", "nome");
		$lista_alunos = CHtml::listData($alunos, "id", "nome");

		if(Yii::app()->user->isInRole("ALUNO") !== false){
			unset($lista_alunos);
			$lista_alunos[] = Usuario::model()->find("id='".Yii::app()->user->id."'");	
		}

		if(isset($_POST['Nota']))
		{
			$model->attributes=$_POST['Nota'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('//aluno/boletim',array(
			'lista_alunos'=>$lista_alunos,
			'disciplina'=>$disciplina,
			'model'=>$model,
		));
	}

	public function actionNovaNota($id, $disciplina_id, array $notas)
	{
		if (Yii::app()->user->isInRole('ALUNO'))
			throw new CHttpException(404, "A página solicitada não existe");
			
		$model= Nota::model()->find("usuario_id='".$id."' && disciplina_id='".$disciplina_id."'");

		//Os dados vem do javascript como string
		foreach ($notas as $key=>$nota)
			if($nota === "null")
				$notas[$key] = null;

		if(isset($notas))
		{
			$model->setAttribute("disciplina_id", $disciplina_id);
			$model->setAttribute("usuario_id", $id);
			$model->attributes=$notas;
			if($model->update())
				$this->redirect(Yii::app()->createUrl('site/index'));
		}
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

		if(isset($_POST['Nota']))
		{
			$model->attributes=$_POST['Nota'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
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
		if(Yii::app()->user->isInRole('ALUNO'))
			$criteria = "usuario_id='".Yii::app()->user->id."'";
		else
			$criteria = "";
	
		$dataProvider=new CActiveDataProvider('Nota', array(
		    'criteria'=>array(
		        'condition'=>$criteria,
	        ),
		));
		$this->render('index', array(
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
