<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    	<?php
    	$one=$_POST['one'];
    	$two=$_POST['two'];
    	$three=$_POST['three'];
    	$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "eg"; 
		$conn = new mysqli($servername, $username, $password, $dbname);
		for ($i=0; $i < sizeof($one); $i++) { 
			if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
			} 

			$sql = "INSERT INTO eg (name, lastname, age)
			VALUES ('$one[$i]', '$two[$i]', '$three[$i]')";

			if ($conn->query($sql) === TRUE) {
			    echo "New record created successfully";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
		$conn->close();
    	 ?>
    </body>
</html>
