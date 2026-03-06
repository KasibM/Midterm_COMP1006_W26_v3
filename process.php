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

    //






?>