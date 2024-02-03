<?php
	try
	{
		if($_SESSION['local']===true){
			$DB_HOST = 'localhost';
			$DB_NAME = $_SESSION['db']; //'garage_parrot';
			$DB_USER = 'root';
			$DB_PASS = '';
			$BD_PORT = '3307';
		}
		else{
			$DB_HOST = ''; //'db5014881374.hosting-data.io';
			$DB_NAME = $_SESSION['db']; //'dbs12361480';
			$DB_USER = ''; //'dbu2247510';
			$DB_PASS = ''; //'MarLud7772!';
			$BD_PORT = ''; //'3306';
		}
		

		$bdd = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;port=$BD_PORT", $DB_USER, $DB_PASS);
	}
	catch (Exception $e)
	{
		die("Erreur de connexion à la base de données :" . $e->GetMessage());
	}
?>