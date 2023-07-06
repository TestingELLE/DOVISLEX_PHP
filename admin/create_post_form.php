<?php
require_once 'post_functions.php';

if (isset($_POST['create_post'])) {
    $title = $_POST['title'];
    $slug = $_POST['slug'];
    $body = $_POST['body'];
    $image = $_FILES['image']; 

    createPost($title, $slug, $body, $image);
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Create Post</title>
    </head>

    <body>
        <h1 class="page-title">Create Post</h1>

        <form method="post" enctype="multipart/form-data" action="create_post_form.php">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" placeholder="Title" required>

            <label for="slug">Slug</label>
            <input type="text" id="slug" name="slug" placeholder="Slug" required>

            <label for="image">Image</label>
            <input type="file" id="image" name="image">

            <label for="body">Body</label>
            <textarea id="body" name="body" cols="30" rows="10" required></textarea>

            <button type="submit" name="create_post" onclick='createPost($request_values)'>Save Post</button>
        </form>

        <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
        <script>
                CKEDITOR.replace('body');
        </script>
    </body>

</html>
