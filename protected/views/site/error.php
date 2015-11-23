<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<div class="error">
	<h2 id="error-title">Erro</h2>

	<ul id="error-ul">
		<li><a href="javascript:history.back()">Voltar para a página anterior</a></li>
		<li><a href="<?php echo Yii::app()->createUrl('site/index') ?>">Voltar para o início</a></li>
		<li><a href="<?php echo Yii::app()->createUrl('site/contato')?>">Informe o erro pra gente</a></li>
	</ul>
</div>
