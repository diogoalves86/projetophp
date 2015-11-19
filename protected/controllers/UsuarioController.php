<?php

class UsuarioController extends Controller
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
				'actions'=>array('cadastrar'),
				'expression'=>'Yii::app()->user->isInRole("ADMIN") !== false',
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionVisualizar($id)
	{
		$this->render('view',array(
			'model'=>Usuario::model()->find("matricula='".$id."'"),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id)
	{
		$model=new Usuario;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);;
		$dados_usuario = $model->pegarDadosCadastro($id);
		if(isset($_POST['Usuario']))
		{
			$model->attributes=$_POST['Usuario'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
			'dados_usuario'=> $dados_usuario != null ? $dados_usuario : false,
		));
	}

	public function actionCadastrar()
	{
		if (Yii::app()->user->isInRole('ALUNO') || Yii::app()->user->isInRole('PROFESSOR') )
			throw new CHttpException(403, "Você não possui autorização para acessar esta página");

		$model=new Usuario;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);;
		if(isset($_POST['Usuario']['matricula']))
		{
			$dados_usuario = Usuario::model()->find("matricula='".$_POST['Usuario']['matricula']."'");
			if($dados_usuario != null)
				$this->redirect(array('usuario/update/', 'id'=>(int)$dados_usuario->matricula));
				//$this->actionCreate($dados_usuario->matricula);
		}

		$this->render('create',array(
			'model'=>$model,
			'dados_usuario'=> isset($dados_usuario) ? $dados_usuario : false,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionAtualizarCadastro($id)
	{
		$model = Usuario::model()->find("matricula='".$id."'");
		$nivel_usuario = $model->nivel_relacao;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Usuario']))
		{
			$model->attributes=$_POST['Usuario'];
			$model->setAttribute('ativo', 1);
			$model->setAttribute('nivel', $model->nivel_relacao->id);
			if($model->update())
				$this->redirect(array('view','id'=>$model->id));
		}
		$this->render('update',array(
			'nivel_usuario'=>$nivel_usuario,
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
		if(Yii::app()->user->isInRole('ALUNO') || Yii::app()->user->isInRole('PROFESSOR'))
			throw new CHttpException(404, "A página solicitada não existe.");

		$dataProvider=new CActiveDataProvider('Usuario');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Usuario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Usuario']))
			$model->attributes=$_GET['Usuario'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Usuario the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Usuario::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Usuario $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuario-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
