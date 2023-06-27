<?php
include_once("connection.php");
///* * * * * * * * * * * * * * *
// * Returns all published posts
// * * * * * * * * * * * * * * */

function getPublishedPosts() {
    global $connection; 
    $sql = "SELECT * FROM news_en WHERE published=true";
    $result = mysqli_query($connection, $sql);

    if($result) {
        // if the query successfully executed
        if(mysqli_num_rows($result) > 0) {
            // if there are any results
            $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $posts;
        } else {
            echo "No published posts found.";
            return null;
        }
    } else {
        // if there was an error with the query
        echo "Error: " . mysqli_error($connection);
        return null;
    }
}

/* * * * * * * * * * * * * * *
 * Returns a single post
 * * * * * * * * * * * * * * */

function getPost($slug) {
    global $connection;   
    // Get single post slug
    $post_slug = $_GET['post-slug'];

    $sql = "SELECT * FROM news_en WHERE slug='$post_slug' AND published=true";

    $result = mysqli_query($connection, $sql);

    // fetch query results as associative array.
    $post = mysqli_fetch_assoc($result);
    if ($post) {
        
    }
    return $post;
}

