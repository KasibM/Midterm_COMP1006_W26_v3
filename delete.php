<?php 
    require "connect.php";
    // pull from get url id
    $id = $_GET['id'];

    // create the sql query to delete 
    $sql = "DELETE from reviews WHERE id = :id"; 

    // prepare statement
    $stmt = $pdo->prepare($sql); 

    // bind $id to :id
    $stmt->bindParam(':id', $id);

    // execute
    $stmt->execute(); 

    //close connection
    $pdo = null;

    // send back to admin page 
    header("Location: admin.php"); 
    exit; 
?>
