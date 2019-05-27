<?php
session_start();
$userID = $_SESSION['user_id'];
$reviewID = $_POST['reviewID'];
include_once("config.php");
if($_SESSION['logged_in'] == true){
    if(isset($_POST['delete'])==false){
        header("Location: rateUs.php");
    }
    if(isset($_POST['delete'])){
    
        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM review WHERE ReviewID = $reviewID";
            $pdo->exec($sql);
            echo "Record deleted successfully!";
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