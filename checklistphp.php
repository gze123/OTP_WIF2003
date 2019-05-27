<?php
session_start();
include_once("config.php");
$tripID = $_POST["tripID"];
$location = "activity.php?tripID="."$tripID";
if($_SESSION['logged_in'] ==true){
    if (isset($_POST['Submit'])) {
        if(isset($_POST["check"])){
            $checklist = $_POST["check"];
            $tripID = $_POST["tripID"];
            $state = $_POST["state"];
            if ($checklist == "") {
                echo "<script>" . "alert('You must write something');" . "</script>";
            }
            try {
                $pdo->beginTransaction();
        
                
                $sql = "INSERT INTO checklist(checkname,state,tripID) VALUES('$checklist','$state','$tripID')";
                $pdo->query($sql);
                
                $pdo->commit();
                
            } catch (Exception $e) {
                $pdo->rollback();
            }
            $pdo = null;
        }else{
            echo "No input";
        }
        
    }
    
    else if (isset($_POST['checkState'])) {
        $check1 = $_POST['state'];
        $checkname = $_POST['check_name'];
        if ($check1 == 'Pending') {
    
            try {
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql2 = "UPDATE checklist SET state='1' where checkname = '$checkname' and tripID='$tripID'";
                $pdo->exec($sql2);
            } catch (PDOException $e) {
                echo $sql2 . $e->getMessage();
            }
        } else if ($check1 == 'Completed') {
    
            try {
                $pdo->beginTransaction();
                $sql3 = "UPDATE checklist set state='0' where checkname='$checkname'and tripID='$tripID'";
                $pdo->query($sql3);
                $pdo->commit();
    
            } catch (Exception $e) {
                $pdo->rollback();
            }
        }
        $pdo = null;
        
    }
    
    else if(isset($_POST['delete'])) {
        $checkname = $_POST['check_name'];
        try {
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql4 = "DELETE FROM checklist where checkname='$checkname' and tripID='$tripID'";
            $pdo->exec($sql4);
        } catch (PDOException $e) {
            echo $sql4 . $e->getMessage();
        }
        $pdo = null;
        
    }
    header("Location:$location");
}else{
    echo "Unauthorized Access";
}



?>