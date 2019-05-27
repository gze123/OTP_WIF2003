<?php
    include_once("config.php");
    if(isset($_POST['newEmail'])&&isset($_POST['newName'])&&isset($_POST['newPassword'])){
        $newEmail = $_POST['newEmail'];
        $newName = $_POST['newName'];
        $newPassword = $_POST['newPassword'];
        try {
            // begin a transaction
            $pdo->beginTransaction();
            // a set of queries: if one fails, an exception will be thrown
            $sql = "SELECT email from members";
            $pdo->query($sql);
            $result = $pdo->query($sql);
            $check = false;
            while($row = $result->fetch()){
            $registeredEmail = $row['email'];
                if($newEmail==$registeredEmail){
                    $check = true; 
                    break;}     
            }
            if($check==true){
                header('Location: login.php?status=signup_failed');
            }
            else{
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $sqlInsert = "INSERT INTO members(email,name,password) VALUES('$newEmail','$newName','$hashedPassword')";
                $pdo->query($sqlInsert);
                $sqlID = "SELECT userid from members WHERE email='$newEmail'";
                $id = $pdo->query($sqlID);
                $userid = $id ->fetch();
                session_start();
                $_SESSION['logged_in'] = true;
                $_SESSION['user_id'] = $userid['userid'];
                header('Location: trip.php');
    
            }
    
            // if we arrive here, it means that no exception was thrown
            // which means no query has failed, so we can commit the
            // transaction
            $pdo->commit();
        } catch (Exception $e) {
            // we must rollback the transaction since an error occurred
            // with insert
            $pdo->rollback();
        }
        $pdo=null;	
    }else{
        echo "Error";
    }
