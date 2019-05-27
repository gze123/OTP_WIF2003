<?php
include_once("config.php");
if(isset($_POST['delete'])==false){
    header("Location: rateUs.php");
}
if(isset($_POST['delete'])){

    try{
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM usercomment WHERE userid='WIF170041'";
        $conn->exec($sql);
        echo "Record deleted successfully!";
        }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }
 $conn = null;
 header("Location: rateUs.php");
}

?>