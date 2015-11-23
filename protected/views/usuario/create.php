<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

?>


<?php 
	if($dados_usuario == false)
		$this->renderPartial('_formInicial', array('dados_usuario'=>$dados_usuario, 'model'=>$model)); 
	else
		$this->renderPartial('_form', array('dados_usuario'=>$dados_usuario, 'model'=>$model)); 
?>