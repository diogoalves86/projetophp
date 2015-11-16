<?php

// This is the database connection configuration.
return array(
	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	
	'connectionString' => 'mysql:host=mysql.hostinger.com.br;dbname=u993183977_adm',
	'emulatePrepare' => true,
	'username' => 'u993183977_admin',
	'password' => 'projetofinal',
	'charset' => 'utf8',
);