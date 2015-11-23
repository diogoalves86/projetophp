<?php

class ComentarioController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('inserir','update', 'listar', 'paramim', 'visualizarComentario', 'admin'),
				'users'=>array('@'),
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
			'model'=>$this->loadModel($id),
		));
	}

	public function actionListar($id)
	{
		$aluno = Usuario::model()->find("matricula='".$id."'");
		$comentarios_aluno = Comentario::model()->findAll("aluno_id='".$aluno->id."'");
		$this->render('listar', array(
				'aluno'=>$aluno,
				'comentarios_aluno'=>$comentarios_aluno,
			));
	}

	public function actionParaMim()
	{
		if(Yii::app()->user->isInRole('PROFESSOR') == false)
			throw new CHttpException(404, "A página solicitada não existe.");

		$professor = Usuario::model()->find("nivel=3 && id='".Yii::app()->user->id."'");
		$comentarios_professor = Comentario::model()->findAll("professor_id='".Yii::app()->user->id."'");

		Yii::app()->user->setReturnUrl("comentario/paramim");
		$this->render('listar', array(
					'comentarios_professor'=>$comentarios_professor,
					'professor'=>$professor
			));

	}

	public function actionVisualizarComentario($id, $visualizada_status)
	{
		$comentario = Comentario::model()->find("id='".$id."'");
		$comentario->setAttribute("visualizada", $visualizada_status);
		if($comentario->save())
			$this->redirect(Yii::app()->createAbsoluteUrl(Yii::app()->user->returnUrl));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionInserir()
	{
		if(Yii::app()->user->isInRole('PROFESSOR'))
			throw new CHttpException(404, "A página solicitada não existe.");

		if(Yii::app()->user->isInRole('ADMIN'))
			throw new CHttpException(403, "É necessário ser aluno para cadastrar comentários.");
			
		$model=new Comentario;
		$aluno = Usuario::model()->find("id='".Yii::app()->user->id."' && nivel=2");
		$professores = Usuario::model()->findAll("nivel=3");
		$lista_professores = CHtml::listData($professores, "id", "nome");
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Comentario']))
		{
			$model->attributes=$_POST['Comentario'];
			$model->setAttribute("aluno_id", $aluno->id);
			$model->setAttribute("visualizada", 0);
			if($model->save())
				$this->redirect(array('listar','id'=>$aluno->matricula));
		}

		$this->render('create',array(
			'lista_professores'=>$lista_professores,
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

		if(isset($_POST['Comentario']))
		{
			$model->attributes=$_POST['Comentario'];
			if($model->save())
				$this->redirect(array('visualizar','id'=>$model->id));
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
			throw new CHttpException(404, "A página solicitada não existe.");
			
		$dataProvider=new CActiveDataProvider('Comentario');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		if(Yii::app()->user->isInRole('ADMIN') == false)
			throw new CHttpException(403, "É necessário ser aluno para cadastrar comentários.");

		$model=new Comentario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Comentario']))
			$model->attributes=$_GET['Comentario'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Comentario the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Comentario::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Comentario $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='comentario-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
