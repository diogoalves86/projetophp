<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<fieldset>
		<h2>Login</h2>
		<ul id="login-ul">
			<li>
				<div class="row">
					<?php echo $form->labelEx($model,'username'); ?>
					<?php echo $form->textField($model,'username', array('class'=>'textbox_login')); ?>
				</div>
				<span>
					<?php echo $form->error($model,'username'); ?>
				</span>
			</li>
			
			<li>
				<div class="row">
					<?php echo $form->labelEx($model,'password'); ?>
					<?php echo $form->passwordField($model,'password', array('class'=>'textbox_login')); ?>
				</div>
				<span>
					<?php echo $form->error($model,'password'); ?>
				</span>
			</li>

			<li>
				<div class="row rememberMe">
					<?php echo $form->checkBox($model,'rememberMe'); ?>
					<?php echo $form->label($model,'rememberMe'); ?>
					<?php echo $form->error($model,'rememberMe'); ?>
				</div>
			</li>

		
			<li>
				<div id="login-button" class="row buttons">
					<?php echo CHtml::submitButton('Login'); ?>
				</div>
			</li>
		</ul>
	</fieldset>
<?php $this->endWidget(); ?>
</div><!-- form -->
