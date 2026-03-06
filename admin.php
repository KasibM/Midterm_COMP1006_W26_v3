<?php 
    //connect to db
    require "connect.php";

    //build sql query to show all
    $sql = "SELECT * FROM reviews ORDER BY author";

    //prepare the sql query
    $stmt = $pdo->prepare($sql);

    //execute the query
    $stmt -> execute();

    //fetch query results
    $tasks = $stmt->fetchALL();

?>