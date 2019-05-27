<?php
    session_start();
    $userID = $_SESSION['user_id'];
    include_once("config.php");
    if($_SESSION['logged_in'] == true){
        $placeName = $_GET['placeName'];
        $sqlFindPlace = "SELECT placeName FROM savedplace where placeName='$placeName'and userid='$userID' ";
        $result = $pdo->query($sqlFindPlace);
        if($result->rowCount()>0){
            header('Location: myPlace.php?status=placeExist');
        }else{
            $insertPlace = "INSERT INTO savedPlace(placeName,userid) VALUES('$placeName','$userID')";
            $pdo->query($insertPlace);
            header('Location: myPlace.php');
        }
        
    }else{
        echo "Unauthorized Access!";
    }
   


?>