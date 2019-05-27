<?php
session_start();
$userID = $_SESSION['user_id'];
include_once("config.php");
if($_SESSION['logged_in'] == true){
    if(empty($_POST['text']) || empty($_POST['rating'])){
        header("Location: rateUs.php?action=empty");
    }
    if(isset($_POST['Submit']) && !empty($_POST['text']) && !empty($_POST['rating'])){
    
        try{
            $text=$_POST['text'];
            $rate = $_POST['rating'];
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO review values ('','$text','$rate',CURDATE(),'$userID')";
            $pdo->exec($sql);
            echo "New record created successfully";
            }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage();
            }
        $pdo = null;        
        header("Location: rateUs.php");
    }
}else{
    echo "Unauthorized Access!";
}



?>