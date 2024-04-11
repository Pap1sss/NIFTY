<?php

    error_reporting(0);

	include 'backup_function.php';

	if(isset($_POST['backupnow'])){
		
		$server = 'localhost';
		$username = 'NIFTYSHOES';
		$password = 'pa$$word1';
		$dbname = 'website';

		
		backDb($server, $username, $password, $dbname);

		exit();
		
	}
	else{
		echo 'Add All Required Field';
	}

?>