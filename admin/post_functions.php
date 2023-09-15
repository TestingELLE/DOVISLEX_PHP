<?php
include_once 'connection.php';
// Post variables
$post_id = 0;
$isEditingPost = false;
$published = 0;
$title = "";
$post_slug = "";
$body = "";
$featured_image = "";
$image = "";
$imageFloat = "";
$imageAlt = "";

/* - - - - - - - - - - 
  -  Post functions
  - - - - - - - - - - - */

// get all posts from DB
function getAllPosts() {
    global $connection;

    // Admin or Maintainer can view all posts
    if ($_SESSION['type'] == "Admin" || $_SESSION['type'] == "Maintainer" || $_SESSION['type'] == "Programmer") {
        $sql = "SELECT * FROM news_en ORDER BY place DESC";
    } else {
        // if this user is not an Admin or Maintainer, we can restrict the view here
        // Fetching user_id based on the username stored in the session
        $username = $_SESSION['uname'];
        $user_id_result = mysqli_query($connection, "SELECT id FROM accounts WHERE username='$username'");
        $user_id_data = mysqli_fetch_assoc($user_id_result);
        $user_id = $user_id_data['id'];

        $sql = "SELECT * FROM news_en WHERE user_id=$user_id";
    }

    $result = mysqli_query($connection, $sql);
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $final_posts = array();
    foreach ($posts as $post) {
        array_push($final_posts, $post);
    }
    return $final_posts;
}

function getPostById($post_id) {
    global $connection;
    $sql = "SELECT * FROM news_en WHERE id=$post_id LIMIT 1";
    $result = mysqli_query($connection, $sql);
    $post = mysqli_fetch_assoc($result);
    return $post;
}

// get the author/username of a post
function getPostAuthorById($user_id) {
    global $connection;
    $sql = "SELECT username FROM accounts WHERE id=1";
    $result = mysqli_query($connection, $sql);
    if ($result->num_rows > 0) {
        // Fetch results or perform other operations
    } else {
        // Handle the error, e.g., echo an error message
        echo "No results returned from the query.";
    }
    if ($result) {
        return mysqli_fetch_assoc($result)['username'];
    } else {
        return null;
    }
}

/* - - - - - - - - - - 
  -  Post actions
  - - - - - - - - - - - */
// if user clicks the create post button
if (isset($_POST['create_post'])) {
    createPost($_POST);
}
// if user clicks the Edit post button
if (isset($_GET['edit-post'])) {
    $isEditingPost = true;
    $post_id = $_GET['edit-post'];
    editPost($post_id);
}
// if user clicks the update post button
if (isset($_POST['update_post'])) {
    updatePost($_POST);
}
// if user clicks the Delete post button
if (isset($_GET['delete-post'])) {
    $post_id = $_GET['delete-post'];
    deletePost($post_id);
}

/* - - - - - - - - - - 
  -  Post functions
  - - - - - - - - - - - */

function createPost($request_values) {
    global $connection, $errors, $post_id, $title, $body, $image_float;

    $title = mysqli_real_escape_string($connection, $request_values['title']);
    $date = mysqli_real_escape_string($connection, $request_values['date']);
    $body = mysqli_real_escape_string($connection, $request_values['body']);
    $image = mysqli_real_escape_string($connection, $request_values['image']);
    $image_float = mysqli_real_escape_string($connection, $request_values['image_float']);
    $published = isset($request_values['published']) ? 1 : 0;

    if (empty($title)) {
        array_push($errors, "Post title is required");
    }
    if (empty($body)) {
        array_push($errors, "Post body is required");
    }

    // Get the username from the session
    $updatedBy = $_SESSION['uname'];

    // Create current date and time in Rome's timezone for updatedAt
    $updatedAt = new DateTime();
    $updatedAt->setTimezone(new DateTimeZone('Europe/Rome'));
    $updatedAt_str = $updatedAt->format('Y-m-d H:i:s');

    // Create post if there are no errors in the form
    if (count($errors) == 0) {
        $query = "INSERT INTO news_en (title, date, image, image_float, body, published, updatedAt, updatedBy) VALUES ('$title', '$date', '$image', '$image_float', '$body', '$published', '$updatedAt_str', '$updatedBy')";
        if (mysqli_query($connection, $query)) { // If post created successfully
            $_SESSION['message'] = "Post created successfully";

            // After inserting a new post, update the place
            $postID = mysqli_insert_id($connection);
            $maxPlaceResult = mysqli_query($connection, "SELECT MAX(place) AS maxPlace FROM news_en");
            $maxPlaceRow = mysqli_fetch_assoc($maxPlaceResult);
            $maxPlace = isset($maxPlaceRow['maxPlace']) ? $maxPlaceRow['maxPlace'] : 0;
            $newPostPlace = $maxPlace + 1;
            $updatePlaceSQL = "UPDATE news_en SET place = $newPostPlace WHERE id = $postID";
            mysqli_query($connection, $updatePlaceSQL);

            header("Location: posts.php");
            exit(0);
        }
    }
}


/* * * * * * * * * * * * * * * * * * * * *
 * - Takes post id as parameter
 * - Fetches the post from database
 * - sets post fields on form for editing
 * * * * * * * * * * * * * * * * * * * * * */

function editPost($post_id) {
    global $connection, $title, $post_slug, $body, $published, $isEditingPost, $post_id;
    $sql = "SELECT * FROM news_en WHERE id=$post_id LIMIT 1";
    $result = mysqli_query($connection, $sql);
    $post = mysqli_fetch_assoc($result);
    // set form values on the form to be updated
    $title = $post['title'];
    $body = $post['body'];
    $published = $post['published'];
}

function updatePost($request_values) {
    global $connection, $errors, $post_id, $title, $body;

    $title = mysqli_real_escape_string($connection, $request_values['title']);
    $date = mysqli_real_escape_string($connection, $request_values['date']);
    $body = mysqli_real_escape_string($connection, $request_values['body']);
    $image = mysqli_real_escape_string($connection, $request_values['image']); // Image as a string (path)
    $post_id = mysqli_real_escape_string($connection, $request_values['post_id']);

    if (empty($title)) {
        array_push($errors, "Post title is required");
    }
    if (empty($body)) {
        array_push($errors, "Post body is required");
    }

    // Get the username from the session
    $updatedBy = $_SESSION['uname'];

    // Create current date and time in Rome's timezone for updatedAt
    $updatedAt = new DateTime();
    $updatedAt->setTimezone(new DateTimeZone('Europe/Rome'));
    $updatedAt_str = $updatedAt->format('Y-m-d H:i:s');

    // Register topic if there are no errors in the form
    if (count($errors) == 0) {
        $query = "UPDATE news_en SET title='$title', date='$date', image='$image', body='$body', updatedAt='$updatedAt_str', updatedBy='$updatedBy' WHERE id=$post_id";
        if (mysqli_query($connection, $query)) { // If post updated successfully
            $_SESSION['message'] = "Post updated successfully";
            header("Location: posts.php");
            exit(0);
        }
    }
}

// delete blog post
function deletePost($post_id) {
    global $connection;
    $sql = "DELETE FROM news_en WHERE id=$post_id";
    if (mysqli_query($connection, $sql)) {
        $_SESSION['message'] = "Post successfully deleted";
        header("location: posts.php");
        exit(0);
    }
}

// if user clicks the publish post button
if (isset($_GET['publish']) || isset($_GET['unpublish'])) {
    $message = "";
    if (isset($_GET['publish'])) {
        $message = "Post published successfully";
        $post_id = $_GET['publish'];
    } else if (isset($_GET['unpublish'])) {
        $message = "Post successfully unpublished";
        $post_id = $_GET['unpublish'];
    }
    togglePublishPost($post_id, $message);
}

function togglePublishPost($post_id, $message) {
    global $connection;

    // Fetch the current 'published' value for the post
    $sqlFetch = "SELECT published FROM news_en WHERE id=$post_id";
    $result = mysqli_query($connection, $sqlFetch);
    $row = mysqli_fetch_assoc($result);
    $currentState = $row['published'];

    // Toggle the 'published' value
    $newState = $currentState ? 0 : 1;

    // Update the post with the toggled 'published' value
    $sqlUpdate = "UPDATE news_en SET published=$newState WHERE id=$post_id";

    if (mysqli_query($connection, $sqlUpdate)) {
        $_SESSION['message'] = $message;
        header("location: posts.php");
        exit(0);
    }
}
?>