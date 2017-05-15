<?php 
	require_once('db.php');

	query_database('DROP TABLE Customers');

	$CreateTable = 'CREATE TABLE Customers (
			ID int NOT NULL AUTO_INCREMENT PRIMARY KEY, 
			Nick VARCHAR(32) NOT NULL,
			Password VARCHAR(32) NOT NULL,
			Email VARCHAR(64) NOT NULL
		)';
	query_database($CreateTable);
	query_database('INSERT INTO Customers VALUES (0,"Ika","secret","example@mail.com")');

 ?>