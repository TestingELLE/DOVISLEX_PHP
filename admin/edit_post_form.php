<?php
include_once('session_manager.php');
include("admin_functions.php");
include("post_functions.php");
include("head_section.php");
include("c_head.php");
require_once 'post_functions.php';

$posts = getAllPosts();

$post = array(
    'title' => '',
    'date' => '',
    'image' => '',
    'body' => '',
);

$post_id = 0;
if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
    $post = getPostById($post_id);
}

if (isset($_POST['update_post'])) {
    $title = $_POST['title'];
    $date = $_POST['date'];
    $body = $_POST['body'];
    $image = $_POST['image']; // image as a string (path)
    $post_id = $_POST['post_id']; // make sure this is set in the form as a hidden input
    echo '<pre>', var_dump($post_id), '</pre>';
    $post_data = [
        'id' => $post_id,
        'title' => $title,
        'date' => $date,
        'body' => $body,
        'image' => $image
    ];

    updatePost($post_data);
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Edit Post</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <style>
            .d-none {
                display: none !important;
            }
        </style>
    </head>

    <body class="container">
        <h1 class="my-4 text-center">Edit Post</h1>

        <form id="postForm" method="post" enctype="multipart/form-data" action="edit_post_form.php?post_id=<?php echo $post_id; ?>">

            <input type="hidden" name="post_id" value="<?= $post_id ?>" />

            <label for="title">Title</label>
            <input type="text" id="title" name="title" placeholder="Title" required value="<?php echo htmlspecialchars($post['title']); ?>" class="form-control">

            <label for="date">Date</label>
            <input type="text" id="date" name="date" placeholder="Date" required value="<?php echo htmlspecialchars($post['date']); ?>" class="form-control">

            <label for="image">Image path</label>
            <input type="text" id="image" name="image" placeholder="../images/img_name" class="form-control" value="<?php echo htmlspecialchars($post['image']); ?>">


            <label for="body">Body</label>
            <textarea id="body" name="body" cols="30" rows="10" required class="form-control"><?php echo htmlspecialchars($post['body']); ?></textarea>

            <button type="submit" name="update_post" class="btn btn-primary my-3">Update Post</button>
            <button type="button" id="preview_post" class="btn btn-secondary my-3">Preview</button>
        </form>

        <div id="postPreview" class="bg-light text-dark" style="display:none;">
            <div class="clearfix">
                <hr class="my-0 border-top border-bottom border-light w-100">
                <h3 id="postDate" class="pl-3 h6" style="color: #b09b4c; font-family: 'Palatino Linotype', Palatino, Palladio, 'URW Palladio L', 'Book Antiqua', Baskerville, 'Bookman Old Style', 'Bitstream Charter', 'Nimbus Roman No9 L', Garamond, 'Apple Garamond', 'ITC Garamond Narrow', 'New Century Schoolbook', 'Century Schoolbook', 'Century Schoolbook L', Georgia, serif; font-weight: 400; font-style: italic; font-size: 18px; margin: 0;"></h3>
                <div>
                    <h6 class="news_title pl-3" id="postTitle" style="color: #004d68; font-size: 20px;"></h6>
                </div>
                <div class="d-flex">
                    <img id="postImage" class="p-3 flex-shrink-0" style="width: 300px; height: 200px; padding: 10px 25px 5px 5px;" alt="Image preview">
                    <ul class="news pl-3 flex-grow-1" id="postBody"></ul>
                </div>
            </div>

        </div>

        <script>
            CKEDITOR.replace('body', {
                toolbar: [
                    {name: 'styles', items: ['Bold', 'Italic']},
                    {name: 'paragraph', items: ['BulletedList']},
                    {name: 'editing', items: ['Undo', 'Redo']}
                ]
            });

            document.getElementById('preview_post').addEventListener('click', function () {
                var title = document.getElementById('title').value;
                var date = document.getElementById('date').value;
                var body = CKEDITOR.instances.body.getData();
                var imagePath = document.getElementById('image').value; // Image path as string

                var postTitle = document.getElementById('postTitle');
                postTitle.innerText = title;

                var postDate = document.getElementById('postDate');
                postDate.innerText = date;

                var postImage = document.getElementById('postImage');
                postImage.src = imagePath;
                postImage.classList.toggle('d-none', !imagePath.trim()); // Hide image if it is empty or contains only whitespace

                var postBody = document.getElementById('postBody');
                postBody.innerHTML = body;
                postBody.classList.toggle('d-none', !body.trim()); // Hide body if it is empty or contains only whitespace

                document.getElementById('postPreview').style.display = 'block';
            });
        </script>

    </body>

</html>
