<?php

// This is the database connection configuration.
return array(
	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	
	'connectionString' => 'pgsql:host=ec2-54-83-53-120.compute-1.amazonaws.com;port=5432;dbname=d9abmsi1cmlnj9',
	'emulatePrepare' => true,
	'username' => 'dhvecwnbuqordr',
	'password' => 'LEgJosKgbSeW6AHxGytYKRQrFm',
	'charset' => 'utf8',
);