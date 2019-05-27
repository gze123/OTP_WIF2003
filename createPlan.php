<?php 
    session_start();
    $userID = $_SESSION['user_id'];
    include_once("config.php");
    if($_SESSION['logged_in'] == true){
        if(isset($_POST['location'])&&isset($_POST['startDate'])&&isset($_POST['endDate'])&&isset($_POST['tripName'])&&isset($_POST['description'])){
            $location = $_POST['location'];
            $startDate = $_POST['startDate'];
            $endDate = $_POST['endDate'];
            $tripName = $_POST['tripName'];
            $description =  $_POST['description'];
            try {
                // begin a transaction
                $pdo->beginTransaction();
                // a set of queries: if one fails, an exception will be thrown
            
                $sqlInsert = "INSERT INTO trips(Location,startDate,endDate,TripName,Description,userid) VALUES('$location','$startDate','$endDate','$tripName','$description','$userID')";
                $pdo->query($sqlInsert);
                
                $latestTripIDSQL = "SELECT MAX(TripID) as latest from trips where userid = '$userID'";
                $result = $pdo ->query($latestTripIDSQL);
                $row = $result -> fetch();
                $latestID = $row['latest'];
               
                
            
        
                // if we arrive here, it means that no exception was thrown
                // which means no query has failed, so we can commit the
                // transaction
                $location = 'Location: activity.php?tripID='.$latestID;
                header($location);
                $pdo->commit();
            } catch (Exception $e) {
                // we must rollback the transaction since an error occurred
                // with insert
                echo "<h1>Trip created failed.</h1><br>";
                $pdo->rollback();
            }
            $pdo=null;	    
             }else{
            echo "Error";
        }echo "Unauthorized Access";
    }
   
    


?>