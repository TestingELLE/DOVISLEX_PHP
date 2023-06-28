
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

//echo '<pre>', var_dump($_SESSION), '</pre>';
// get all posts from DB
function getAllPosts() {
    global $connection;

    // Admin or Maintainer can view all posts
    if ($_SESSION['type'] == "Admin" || $_SESSION['type'] == "Maintainer" || $_SESSION['type'] == "Programmer") {
        $sql = "SELECT * FROM news_en";
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
// echo '<pre>', var_dump($posts), '</pre>';
    $final_posts = array();
    foreach ($posts as $post) {
        //$post['author'] = getPostAuthorById($post['user_id']);
        //var_dump($post);
        array_push($final_posts, $post);
    }
    // var_dump($final_posts);
    return $final_posts;
}

// get the author/username of a post
function getPostAuthorById($user_id) {
    //var_dump($user_id);
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
        // return username
        //var_dump($result);
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
    global $connection, $errors, $title, $featured_image, $topic_id, $body, $published;
    $title = esc($request_values['title']);
    $body = htmlentities(esc($request_values['body']));
    if (isset($request_values['topic_id'])) {
        $topic_id = esc($request_values['topic_id']);
    }
    if (isset($request_values['publish'])) {
        $published = esc($request_values['publish']);
    }
    // create slug: if title is "The Storm Is Over", return "the-storm-is-over" as slug
    $post_slug = makeSlug($title);
    // validate form
    if (empty($title)) {
        array_push($errors, "Post title is required");
    }
    if (empty($body)) {
        array_push($errors, "Post body is required");
    }

    // Get image name
//	  	$featured_image = $_FILES['featured_image']['name'];
//	  	if (empty($featured_image)) { array_push($errors, "Featured image is required"); }
//	  	// image file directory
    $target = "../static/images/" . basename($featured_image);
//	  	if (!move_uploaded_file($_FILES['featured_image']['tmp_name'], $target)) {
//	  		array_push($errors, "Failed to upload image. Please check file settings for your server");
//	  	}
    // Ensure that no post is saved twice. 
    $post_check_query = "SELECT * FROM news_en WHERE slug='$post_slug' LIMIT 1";
    $result = mysqli_query($connection, $post_check_query);

    if (mysqli_num_rows($result) > 0) { // if post exists
        array_push($errors, "A post already exists with that title.");
    }
    // create post if there are no errors in the form
    if (count($errors) == 0) {
        $query = "INSERT INTO news_en (user_id, date, title, slug, image, body, published) VALUES(1, now(), '$title', '$post_slug', '$featured_image', '$body', $published)";
        if (mysqli_query($connection, $query)) { // if post created successfully
            $inserted_post_id = mysqli_insert_id($connection);
            // create relationship between post and topic //what does this do???
            $sql = "INSERT INTO post_topic (post_id, topic_id) VALUES($inserted_post_id, $topic_id)";
            mysqli_query($connection, $sql);

            $_SESSION['message'] = "Post created successfully";
            header('location: posts.php');
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
    global $conn, $errors, $post_id, $title, $featured_image, $topic_id, $body, $published;

    $title = esc($request_values['title']);
    $body = esc($request_values['body']);
    $post_id = esc($request_values['post_id']);
    if (isset($request_values['topic_id'])) {
        $topic_id = esc($request_values['topic_id']);
    }
    // create slug: if title is "The Storm Is Over", return "the-storm-is-over" as slug
    $post_slug = makeSlug($title);

    if (empty($title)) {
        array_push($errors, "Post title is required");
    }
    if (empty($body)) {
        array_push($errors, "Post body is required");
    }
    // if new featured image has been provided
    if (isset($_POST['featured_image'])) {
        // Get image name
        $featured_image = $_FILES['featured_image']['name'];
        // image file directory
        $target = "../static/images/" . basename($featured_image);
        if (!move_uploaded_file($_FILES['featured_image']['tmp_name'], $target)) {
            array_push($errors, "Failed to upload image. Please check file settings for your server");
        }
    }

    // register topic if there are no errors in the form
    if (count($errors) == 0) {
        $query = "UPDATE news_en SET title='$title', slug='$post_slug', views=0, image='$featured_image', body='$body', published=$published, updated_at=now() WHERE id=$post_id";
        // attach topic to post on post_topic table
        if (mysqli_query($connection, $query)) { // if post created successfully
            if (isset($topic_id)) {
                $inserted_post_id = mysqli_insert_id($connection);
                // create relationship between post and topic
                $sql = "INSERT INTO post_topic (post_id, topic_id) VALUES($inserted_post_id, $topic_id)";
                mysqli_query($connection, $sql);
                $_SESSION['message'] = "Post created successfully";
                header("Location: create_post.php?edit-post=$post_id");
                exit(0);
            }
        }
        $_SESSION['message'] = "Post updated successfully";
        header("Location: create_post.php?edit-post=$post_id");
        exit(0);
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

// delete blog post
//function togglePublishPost($post_id, $message) {
//    global $connection;
//    $sql = "UPDATE posts SET published=!published WHERE id=$post_id";
//
//    if (mysqli_query($connection, $sql)) {
//        $_SESSION['message'] = $message;
//        header("location: posts.php");
//        exit(0);
//    }
//}

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