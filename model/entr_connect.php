<?php 
	require 'entr_config.php';
	$entr_dsn ="mysql:host=$entr_host;dbname=$entr_db;charset=UTF8";
	try {
		$entr_pdo = new PDO($entr_dsn, $entr_user, $entr_password);
		if ($entr_pdo) {
			return $entr_pdo;
		}
	} catch (PDOException $e) 
	{
		echo $e->getMessage();
	}


?>