<?php
    session_start();
    include_once("config.php");
    $activityID = $_GET['activityID'];
    $tripID = $_GET['tripID'];
    if($_SESSION['logged_in']==true){
      if(isset($_POST['activityName'])&&isset($_POST['location'])&&isset($_POST['description'])&&isset($_POST['type'])&&isset($_POST['startDate'])&&isset($_POST['startTime'])&&isset($_POST['endDate'])&&isset($_POST['endDate'])){
        $activity = $_POST['activityName'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $location = $_POST['location'];
        $type = $_POST['type'];
        $startTime = $_POST['startTime'];
        $endTime = $_POST['endTime'];
        $description = $_POST['description'];
        $header = "Location: activity.php?tripID=".$tripID;
        if($_POST['button']=="Save"){
          try {
              $pdo->beginTransaction();
              $sql = "UPDATE activity SET activity_name='$activity', description='$description', location='$location',type='$type',start_Date='$startDate',start_time='$startTime',end_Date='$endDate',end_time='$endTime' WHERE activity_id = $activityID";
              $pdo->query($sql);
              $pdo->commit();
            } catch (Exception $e) {
              $pdo->rollback();
            }
             $header = "Location: activity.php?tripID=".$tripID;
             header($header);
            $pdo = null;
      }else{
          try {
              $pdo->beginTransaction();
              $sql = "DELETE FROM activity WHERE activity_id=$activityID";
              $pdo->query($sql);
              $pdo->commit();
            } catch (Exception $e) {
              $pdo->rollback();
            }
            $pdo = null;
            header($header);
      }}else{
        echo "Error";
      }
    }else{
      echo "Unauthorized Access!";
    }
      
?>