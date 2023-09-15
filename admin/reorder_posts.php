<?php
include_once('session_manager.php');
include("admin_functions.php");
include("post_functions.php");
include_once 'connection.php';

function reorderPosts($ids) {
    global $connection;
    
    if (!$connection instanceof mysqli) {
        die("Database connection not established.");
    }

    // Check if only two IDs are passed
    if (count($ids) != 2) {
        $_SESSION['flash_message'] = "Error: Incorrect number of posts selected.";
        return;
    }

    // Fetch 'place' values for the two posts
    $sql_fetch_places = "SELECT id, place FROM news_en WHERE id IN (" . implode(",", $ids) . ")";
    $result = mysqli_query($connection, $sql_fetch_places);
    $places = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $places[$row['id']] = $row['place'];
    }

    // Swap the 'place' values
    $sql1 = "UPDATE news_en SET place = " . $places[$ids[1]] . " WHERE id = " . $ids[0];
    $sql2 = "UPDATE news_en SET place = " . $places[$ids[0]] . " WHERE id = " . $ids[1];

    mysqli_query($connection, $sql1);
    mysqli_query($connection, $sql2);
}

// Handle the reorder post action
if (isset($_POST['reorder'])) {
    $selected_ids = $_POST['reorder'];
    reorderPosts($selected_ids);
    $_SESSION['flash_message'] = "Posts reordered successfully!";
    header("Location: posts.php"); // Redirect to the posts page with a success message.
    exit;
}
?>
