<?php
    session_start();

    try
    {
        $DBH = new PDO("mysql:host=localhost;dbname=bookswapperph", "root", "");

        $name = $_POST['username'];
        $pass = $_POST['password'];

        $data = array('name' => $name);
     
        $STH = $DBH->prepare("SELECT * FROM users WHERE userName = :name");
        $STH->execute($data);
        $users = $STH->fetchAll(PDO::FETCH_OBJ);

        if(isset($users[0]) AND password_verify($_POST['password'], $users[0]->password))
        {
            $_SESSION['name'] = $users[0]->userName;
            $_SESSION['id'] = $users[0]->userID;
            $_SESSION['isLoggedIn'] = TRUE;
            $_SESSION['isAdmin'] = $users[0]->isAdmin;
        }

        $DBH = null;
        header('Location: ../index.php');
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
?>