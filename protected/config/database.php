<?php

// This is the database connection configuration.
return array(
	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	
	'connectionString' => 'mysql:host=mysql4.000webhost.com;dbname=a3283470_projeto',
	'emulatePrepare' => true,
	'username' => 'a3283470_admin',
	'password' => 'projetofinal123',
	'charset' => 'utf8',
);