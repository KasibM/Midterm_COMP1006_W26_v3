<?php 
    //connect to database
    require "connect.php";


    //check if method is post
    if($_SERVER['REQUEST_METHOD']!=='POST'){
        die('Invalid request!');

    }

    //sanitise input
    
    $title = trim(filter_input(INPUT_POST, 'title',FILTER_SANITIZE_SPECIAL_CHARS));
    $author = trim(filter_input(INPUT_POST, 'author',FILTER_SANITIZE_SPECIAL_CHARS));
    $rating = trim(filter_input(INPUT_POST, 'rating',FILTER_SANITIZE_SPECIAL_CHARS));
    $review_text = trim(filter_input(INPUT_POST, 'review_text',FILTER_SANITIZE_SPECIAL_CHARS));
    $id = trim(filter_input(INPUT_POST, 'id',FILTER_SANITIZE_SPECIAL_CHARS));

    //vallidation

    $errors = [];

    if($title === null || $title === ''){
        $errors[] = "title is required.";
    }

    if($author === null || $author === ''){
        $errors[] = "author is required.";
    }

    if($rating === null || $rating === ''){
        $errors[] = "rating is required.";
    } else if (!filter_var($rating, FILTER_VALIDATE_INT)){
        $errors[] = "rating must be an integer.";
    } else if (!($rating > 0 && $rating < 6)){
        $errors[] = "rating must be a number from 1 to 6.";
    }

    if($review_text === null || $review_text === ''){
        $errors[] = "review_text is required.";
    }

    //if invalid list errors and exit code
    if (!empty($errors)) { ?>
    <p>Failed to insert data due to the following errors:</p>
    <?php foreach ($errors as $error) : ?>
        <li><?= $error ?> </li>
    <?php endforeach;
    //stop the script from executing  
    exit;
}

    //sql query with named placeholders
    $sql = "UPDATE reviews SET title = :title, author = :author, rating = :rating, review_text = :review_text WHERE id = :id";

    //prepare (precompile) sql query
    $stmt = $pdo->prepare($sql);

    //map named placeholders
    $stmt -> bindParam(':title', $title);
    $stmt -> bindParam(':author', $author);
    $stmt -> bindParam(':rating', $rating);
    $stmt -> bindParam(':review_text', $review_text);
    $stmt -> bindParam(':id', $id);

    //execute the query
    $stmt -> execute();

    //close connection
    $_pdo = null;

    // send back to admin page 
    header("Location: admin.php"); 
    exit; 

?>

