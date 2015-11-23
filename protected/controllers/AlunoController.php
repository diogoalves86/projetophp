<?php
Yii::import('application.controllers.UsuarioController');
class AlunoController extends Controller
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
				'actions'=>array('cadastro','update', 'view', 'boletim', 'simularApoio', 'listaPaf'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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
		$model = Usuario::model()->find("nivel=2 && matricula='".$id."'");
		if($model != null)
			Yii::app()->runController('usuario/view', array('id'=>$model->id));
		else
			throw new CHttpException(404, "A página solicitada não existe.");
			
	}

	public function actionBoletim($id=0)
	{
		if(Yii::app()->user->isInRole('ALUNO'))
			$aluno = Usuario::model()->find("id='".Yii::app()->user->id."'");
		elseif (Yii::app()->user->isInRole('ALUNO') == false && $id != 0)
			$aluno = Usuario::model()->find("matricula='".$id."'");
		else
			throw new CHttpException(404, "A página solicitada não existe.");

		$notas_aluno = Nota::model()->findAll("usuario_id='".$aluno->id."'");

		$this->render('boletim', array(
				'aluno'=>$aluno,
				'notas_aluno'=>$notas_aluno,
		));
			
	}

	public function actionListaPaf()
	{
		$notas_alunos = Nota::model()->findAll();

		$this->render('listaPaf', array(
					'notas_alunos'=>$notas_alunos
			));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCadastro()
	{
		if (Yii::app()->user->isInRole('ALUNO') || Yii::app()->user->isInRole('PROFESSOR') )
			throw new CHttpException(403, "Você não possui autorização para acessar esta página");

		Yii::app()->runController('usuario/cadastrar');
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

	public function actionSimularApoio()
	{
		if(Yii::app()->user->isInRole('ALUNO') == false)
			throw new CHttpException(404, "A página solicitada não existe.");
			

		$this->render('simularApoio');
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
			$criteria = "id=".Yii::app()->user->id." && nivel=2 && ativo=1";

		else
			$criteria = "nivel=2 && ativo=1";

		$dataProvider=new CActiveDataProvider('Usuario', array(
		    'criteria'=>array(
		        'condition'=>$criteria,
	        ),
		));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		if (Yii::app()->user->isInRole('ALUNO') || Yii::app()->user->isInRole('PROFESSOR') )
			throw new CHttpException(404, "A página solicitada não existe");

		Yii::app()->runController('usuario/admin');
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
