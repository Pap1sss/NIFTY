<?php

    error_reporting(0);

	include 'backup_function.php';

	if(isset($_POST['backupnow'])){
		
		$server = 'localhost';
		$username = 'root';
		$password = '';
		$dbname = 'website';

		
		backDb($server, $username, $password, $dbname);

		exit();
		
	}
	else{
		echo 'Add All Required Field';
	}

?>