<?php
include_once('session_manager.php');
include("admin_functions.php");
include("post_functions.php");
include("head_section.php");
include("c_head.php");
require_once 'post_functions.php';

//var_dump($_SESSION);

$post = array(
    'title' => '',
    'date' => '',
    'image' => '',
    'body' => '',
);

if (isset($_POST['create_post'])) {
    $post_data = [
        'title' => $_POST['title'],
        'date' => $_POST['date'],
        'body' => $_POST['body'],
        'image' => $_POST['image'],
        'image_float' => $_POST['image_float'],
        //'user_id' => $_POST['user_id'],
        'published' => isset($_POST['published']) ? 1 : 0
    ];
    createPost($post_data);
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Create Post</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container">
            <h1 class="my-4 text-center">Create Post</h1>

            <form method="post" enctype="multipart/form-data" action="create_post_form.php">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="date">Date</label>
                        <input type="text" id="date" name="date" placeholder="Date" required class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="imageFloat">Image Position</label>
                        <select class="form-control" id="imageFloat" name="image_float">
                            <option value="left">Left</option>
                            <option value="right">Right</option>
                        </select>
                    </div>
                </div>

                <!--                <div class="form-group">
                                    <label for="user_id">User ID</label>
                                    <input type="text" id="user_id" name="user_id" placeholder="User ID" required class="form-control">
                                </div>-->

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" placeholder="Title" required class="form-control">
                </div>

                <label for="image">Image path</label>
                <div class="input-group">
                    <input type="text" id="image" name="image" placeholder="images/img_name" class="form-control" value="<?php echo htmlspecialchars($post['image']); ?>">
                    <div class="input-group-append">
                        <input id="fileInput" type="file" style="display: none;">
                        <button id="addImage" type="button" class="btn btn-outline-secondary">Add Image</button>
                    </div>
                </div>

                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea id="body" name="body" cols="30" rows="10" required class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="published" name="published">
                        <label class="form-check-label" for="published">
                            Publish Post
                        </label>
                    </div>
                </div>

                <button type="submit" name="create_post" class="btn btn-primary">Save Post</button>
            </form>
            <script>
                CKEDITOR.replace('body', {
                    toolbar: [
                        {name: 'styles', items: ['Bold', 'Italic']},
                        {name: 'paragraph', items: ['BulletedList']},
                        {name: 'editing', items: ['Undo', 'Redo']}
                    ]
                });


                // Fetch images on page load and add to autocomplete source
                fetch('get_images.php')
                        .then(response => response.json())
                        .then(images => {
                            $("#image").autocomplete({
                                source: images.map(image => "images/" + image)
                            });
                        });

                document.getElementById('addImage').addEventListener('click', function () {
                    document.getElementById('fileInput').click();
                });

                document.getElementById('fileInput').addEventListener('change', function () {
                    var file = this.files[0];
                    var formData = new FormData();
                    formData.append('image', file);

                    fetch('upload_image.php', {
                        method: 'POST',
                        body: formData
                    })
                            .then(response => response.text())
                            .then(imagePath => {
                                document.getElementById('image').value = imagePath;
                            })
                            .catch(error => console.error('Error:', error));
                });
            </script>
        </div>
    </body>

</html>
