
<?php
//include_once("c_session.php");
include_once("c_connection.php");
/* * * * * * * * * * * * * * *
 * Returns all published posts
 * * * * * * * * * * * * * * */

function getPublishedPosts() {
    // use global $conn object in function
    global $connection;

    $sql = "SELECT * FROM news_en WHERE published=true";



    $result = mysqli_query($connection, $sql);

    // fetch all posts as an associative array called $posts
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $posts;
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

?>