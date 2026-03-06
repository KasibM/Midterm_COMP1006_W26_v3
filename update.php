<?php 
    require "connect.php";
    // pull from get url id
    $id = $_GET['id'];

    //build query with named placeholder 
    $sql = "SELECT * FROM reviews WHERE id = :id";

    //prepare the query
    $stmt = $pdo->prepare($sql);

    //bind param to placeholder
    $stmt -> bindParam(':id', $id);

    //execute the query
    $stmt -> execute();

    //fetch query results
    $review = $stmt->fetch();

    //close connection
    $_pdo = null;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Book Review</title>
</head>
<body>

    <h1>Update Book Review</h1>

    <form action="update-process.php" method="POST">
    
        <label for="title">ID:</label>
        <input type="text" id="id" name="id" value="<?=  htmlspecialchars($review['id'])?>" readonly/>

        <label for="title">Book Title:</label>
        <input type="text" id="title" name="title" value="<?=  htmlspecialchars($review['title'])?>" />

        <label for="author">Author:</label>
        <input type="text" id="author" name="author" value="<?=  htmlspecialchars($review['author'])?>" />

        <label for="rating">Rating (1 to 5):</label>
        <input type="number" id="rating" name="rating" min="1" max="5" value="<?=  htmlspecialchars($review['rating'])?>" />

        <label for="review_text">Review:</label>
        <textarea id="review_text" name="review_text" rows="6" cols="40" value=""><?=  htmlspecialchars($review['review_text'])?></textarea>

        <button type="submit">Submit Changes</button>

    </form>

    <p>
        <a href="admin.php">Go to Admin Page</a>
    </p>

</body>
</html>