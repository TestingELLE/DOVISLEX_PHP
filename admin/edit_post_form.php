<?php
        include_once('session_manager.php');
        include("admin_functions.php");
        include("post_functions.php");
        include("head_section.php");
        include("c_head.php");
        $posts = getAllPosts();
        ?>

<?php
require_once 'post_functions.php';

$post_id = 0;
if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
    $post = getPostById($post_id);
}

if (isset($_POST['update_post'])) {
    $title = $_POST['title'];
    $slug = $_POST['slug'];
    $body = $_POST['body'];
    $image = $_FILES['image'];

    updatePost($post_id, $title, $slug, $body, $image);
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Edit Post</title>
    </head>

    <body>
        <h1 class="page-title">Edit Post</h1>

        <form method="post" enctype="multipart/form-data" action="edit_post_form.php?post_id=<?php echo $post_id; ?>">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" placeholder="Title" required value="<?php echo $post['title']; ?>">

            <label for="slug">Slug</label>
            <input type="text" id="slug" name="slug" placeholder="Slug" required value="<?php echo $post['slug']; ?>">

            <label for="image">Image</label>
            <input type="file" id="image" name="image">

            <label for="body">Body</label>
            <textarea id="body" name="body" cols="30" rows="10" required><?php echo $post['body']; ?></textarea>

            <button type="submit" name="update_post">Update Post</button>
        </form>

        <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
        <script>
                CKEDITOR.replace('body');
        </script>
    </body>

</html>
