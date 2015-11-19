<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">-->
	<!---<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">-->
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">-->
	<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/Site.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

	<header>
		
		<div id="logo-cp2">	               
            <a href="<?php echo Yii::app()->createUrl('site/index')?>">
                <img src="<?php echo Yii::app()->baseUrl.'/images' ?>/Pedro-II-logo-W.png" />
            </a>            
        </div>

	    <div class="title">
    		<h2>Diário Online</h2>
		</div>
        
    	<div class="main-menu">
    		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
					array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
					array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
				),
			)); ?>
    	</div>			
	</header>
	<div class="mainContent">
	
		<?php echo $content; ?>

	</div>
	<footer>
		<p><?php echo date('Y'); ?> - Projeto Final CP2 ENII</p>
		<ul>
			<li><a href="">Sobre o Projeto</a></li>
			<li><a href="<?php echo Yii::app()->createUrl('site/contato')?>">Fale Conosco</a></li>
		</ul>
	</footer>

	</body>
</html>
