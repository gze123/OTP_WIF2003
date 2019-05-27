<?php 
session_start();
include_once("config.php");
if(isset($_POST['userEmail'])&&isset($_POST['userPassword'])){
    $userEmail = $_POST['userEmail'];
    $userPasswrod = $_POST['userPassword'];
    $sqlStatement = "SELECT userid,email,password from members";
    $result= $pdo->query($sqlStatement);
    while($row = $result->fetch()){
        $registeredEmail = $row['email'];
        $registeredID = $row['userid'];
        $registeredPassword = $row['password'];
        if($userEmail==$registeredEmail&&password_verify($userPasswrod,$registeredPassword)){
            $_SESSION['logged_in'] = true;
            $_SESSION['user_email'] = $registeredEmail;
            $_SESSION['user_id'] = $registeredID;
            header('Location: trip.php');
        }
        else{
            header('Location: login.php?status=login_failed');
        }
    }
}else{
    echo "Error";
}


?>