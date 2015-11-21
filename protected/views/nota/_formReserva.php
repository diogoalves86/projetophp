<?php
/* @var $this NotaController */
/* @var $model Nota */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'nota-_form-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // See class documentation of CActiveForm for details on this,
    // you need to use the performAjaxValidation()-method described there.
    'enableAjaxValidation'=>false,
)); ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'disciplina_id'); ?>
        <?php echo $form->textField($model,'disciplina_id'); ?>
        <?php echo $form->error($model,'disciplina_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'usuario_id'); ?>
        <?php echo $form->textField($model,'usuario_id'); ?>
        <?php echo $form->error($model,'usuario_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'primeira_certificacao'); ?>
        <?php echo $form->textField($model,'primeira_certificacao'); ?>
        <?php echo $form->error($model,'primeira_certificacao'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'segunda_certificacao'); ?>
        <?php echo $form->textField($model,'segunda_certificacao'); ?>
        <?php echo $form->error($model,'segunda_certificacao'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'terceira_certificacao'); ?>
        <?php echo $form->textField($model,'terceira_certificacao'); ?>
        <?php echo $form->error($model,'terceira_certificacao'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'primeira_recuperacao'); ?>
        <?php echo $form->textField($model,'primeira_recuperacao'); ?>
        <?php echo $form->error($model,'primeira_recuperacao'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'segunda_recuperacao'); ?>
        <?php echo $form->textField($model,'segunda_recuperacao'); ?>
        <?php echo $form->error($model,'segunda_recuperacao'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'terceira_recuperacao'); ?>
        <?php echo $form->textField($model,'terceira_recuperacao'); ?>
        <?php echo $form->error($model,'terceira_recuperacao'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton('Cadastrar'); ?>
    </div>

<?php $this->endWidget(); ?>
