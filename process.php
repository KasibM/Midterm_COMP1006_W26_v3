<?php 
    //connect to database
    require "connect.php";


    //check if method is post
    if($_SERVER['REQUEST_METHOD']!=='POST'){
        die('Invalid request!');

    }

    //sanitise input
    $title = trim(filter_input(INPUT_POST, '',FILTER_SANITIZE_SPECIAL_CHARS));
    $author = trim(filter_input(INPUT_POST, '',FILTER_SANITIZE_SPECIAL_CHARS));
    $rating = trim(filter_input(INPUT_POST, '',FILTER_SANITIZE_SPECIAL_CHARS));
    $review_text = trim(filter_input(INPUT_POST, '',FILTER_SANITIZE_SPECIAL_CHARS));

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
        $errors[] = "rating must be an integer."
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




?>