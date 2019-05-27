<?php
    include_once("config.php");
    $location = $_POST['location'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $tripName = $_POST['tripName'];
    $description = $_POST['description'];
    $tripID = $_GET['tripID'];
    try {
        // begin a transaction
        $pdo->beginTransaction();
        // a set of queries: if one fails, an exception will be thrown
        $sql = "UPDATE trips SET Location='$location',startDate='$startDate',endDate='$endDate', TripName = '$tripName', Description = '$description' WHERE TripID=$tripID";
        $pdo->query($sql);//run the query & returns a PDOStatement object
        // if we arrive here, it means that no exception was thrown
        // which means no query has failed, so we can commit the
        // transaction
        $pdo->commit();
      } catch (Exception $e) {
        // we must rollback the transaction since an error occurred
        // with insert
        $pdo->rollback();
      }
      
      //redirectig to the display page. In our case, it is index.php
      header("Location: trip.php");
      
      //Step 5: Freeing Resources and Closing Connection using mysqli
      $pdo = null;
?>