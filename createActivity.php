<?php 
include_once("config.php");
session_start();
$tripID = $_GET['tripID'];
if($_SESSION['logged_in'] == true){
    if(isset($_POST['activityName'])&&isset($_POST['location'])&&isset($_POST['description'])&&isset($_POST['type'])&&isset($_POST['startDate'])&&isset($_POST['startTime'])&&isset($_POST['endDate'])&&isset($_POST['endTime'])){
        $activity = $_POST['activityName'];
        $location = $_POST['location'];
        $description = $_POST['description'];
        $type = $_POST['type'];
        $startDate =  $_POST['startDate'];
        $startTime =  $_POST['startTime'];
        $endDate =  $_POST['endDate'];
        $endTime =  $_POST['endTime'];
        try {
            // begin a transaction
            $pdo->beginTransaction();
            // a set of queries: if one fails, an exception will be thrown
            
            $sqlInsert = "INSERT INTO activity(activity_name,description,location,type,start_date,start_time,end_date,end_time,tripID) VALUES('$activity','$description','$location','$type','$startDate','$startTime','$endDate','$endTime','$tripID')";
            $pdo->query($sqlInsert);
            
            
        
            // if we arrive here, it means that no exception was thrown
            // which means no query has failed, so we can commit the
            // transaction
            $location = 'Location: activity.php?tripID='.$tripID;
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
    }
}else{
    echo "Unauthorized access!";
}


?>