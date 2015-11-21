<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Entre em contato';
$this->breadcrumbs=array(
	'Contato',
);
?>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

	<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'contact-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); ?>		
	<fieldset>
		<h2>Entre em contato</h2>

		<?php echo $form->errorSummary($model); ?>

		<ul id="contact-ul">
			<li><div class="row">
				<?php echo $form->labelEx($model,'Nome'); ?>
				<?php echo $form->textField($model,'name'); ?>
				<?php echo $form->error($model,'name'); ?>
			</div></li>

			<li><div class="row">
				<?php echo $form->labelEx($model,'Email'); ?>
				<?php echo $form->textField($model,'email'); ?>
				<?php echo $form->error($model,'email'); ?>
			</div></li>

			<li><div class="row">
				<?php echo $form->labelEx($model,'Assunto'); ?>
				<?php echo $form->textField($model,'subject',array('size'=>40,'maxlength'=>100)); ?>
				<?php echo $form->error($model,'subject'); ?>
			</div></li>

			<li><div class="row">
				<?php echo $form->labelEx($model,'Contexto'); ?>
				<?php echo $form->textArea($model,'body',array('rows'=>5, 'cols'=>40)); ?>
				<?php echo $form->error($model,'body'); ?>
			</div></li>

			<?php if(CCaptcha::checkRequirements()): ?>
			<li><div class="row code">
				<?php echo $form->labelEx($model,'verifyCode'); ?>
				<?php $this->widget('CCaptcha'); ?></div></li>
			<li><div class="row">
				<p>Digite o código a seguir</p>
				<?php echo $form->textField($model,'verifyCode'); ?>
				<?php echo $form->error($model,'verifyCode'); ?>
			</div></li>
			<?php endif; ?>
		
			<li><div class="row buttons">
				<?php echo CHtml::submitButton('Enviar'); ?>
			</div></li>
		</ul>

	</fieldset>
	<?php $this->endWidget(); ?>
</div><!-- form -->

<?php endif; ?>