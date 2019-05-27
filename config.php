<?php
try {	
	$connectionString = "mysql:host=localhost;dbname=travellerplan";
	$databaseUsername = 'user';
	$databasePassword = 'userpwd';

	$pdo = new PDO($connectionString, $databaseUsername, $databasePassword);
	// set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	

	
    }
catch(PDOException $e)
    {
    echo "Database connection failed: " . $e->getMessage();
    }
