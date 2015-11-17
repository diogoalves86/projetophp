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
	<div class="container" id="page">
	    <div class="content-wrapper">
	        <div id="logo_cp2" class="site-title">
	            <div>
	                <h2>Diário Online</h2>
	                <p>
	                    <a href="~/">
	                        <img src="<?php echo Yii::app()->baseUrl.'/images'?>/Pedro-II-logo-W.png" />
	                    </a>
	                </p>
	            </div>
	        </div>

		<div id="mainmenu">
			<div class="header_action">
				<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
						array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
					),
				)); ?>
	        </div>
			
		</div><!-- mainmenu -->
		<div id="body">
			<section id="loginForm">
				<fieldset>
					<?php echo $content; ?>
				</fieldset>
			</section>
		</div>

		<div class="clear"></div>

		<div id="footer">
			&copy; <?php echo date('Y'); ?> - Projeto Final CP2 ENII
		</div><!-- footer -->
	</div><!-- page -->
</header>
</body>
</html>
