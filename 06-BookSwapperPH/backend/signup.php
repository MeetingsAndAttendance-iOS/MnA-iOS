<?php
	try
	{
		$DBH = new PDO("mysql:host=localhost;dbname=bookswapperph", "root", "");
		
		$name = $_POST['username'];
		$email = $_POST['email'];
		$pass1 = $_POST['password1'];
		$pass2 = $_POST['password2'];
		$location = $_POST['location'];
		$contact = $_POST['contactno'];
		
		if($pass1 == $pass2)
		{
			$hash = password_hash($pass1, PASSWORD_DEFAULT);
			
				$data = array('name' => $name, 'password' => $hash, 'email' => $email, 'location' => $location, 'contactno' => $contact);
				$STH = $DBH->prepare("INSERT INTO users (userName, email, password, displayName, location, contactNo) VALUES (:name, :email, :password, :name, :location, :contact)");
	
			$STH->execute($data);

			$DBH = null;
			header('Location: ../index.php');
		}
		
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
?>