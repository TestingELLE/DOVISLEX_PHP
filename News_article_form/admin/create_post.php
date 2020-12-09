<link rel="stylesheet" href="../static/css/main.css"/>
<link rel="stylesheet" href="../static/css/create_post_styling.css"/>

<?php include('../config.php'); ?>

<?php include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/post_functions.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/head_section.php'); ?>

<!-- Get all admin posts from DB -->
<?php $posts = getAllPosts(); ?>
<!-- Testing -->

<?php include(ROOT_PATH . '/includes/public_functions.php'); ?>
<?php
if (isset($_GET['post-slug'])) {
    $post = getPost($_GET['post-slug']);
}
?>
<!-- End Testing -->



<title>Admin | Create Post</title>
</head>
<body>
    <!-- admin navbar -->
    <!-- <?php include(ROOT_PATH . '/admin/includes/navbar.php') ?> -->

    <div class="container content">
        <!-- Left side menu -->
        <?php include(ROOT_PATH . '/admin/includes/menu.php') ?>

        <!-- Middle form - to create and edit  -->
        <div class="action create-post-div">
            <h1 class="page-title">Create/Edit Post</h1>
            <form method="post" enctype="multipart/form-data" action="<?php echo BASE_URL . 'admin/create_post.php'; ?>" >
                <!-- validation errors for the form -->
                <?php include(ROOT_PATH . '/includes/errors.php') ?>

                <!-- if editing post, the id is required to identify that post -->
                <?php if ($isEditingPost === true): ?>
                    <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                <?php endif ?>

                <input type="text" name="title" value="<?php echo $title; ?>" placeholder="Title">
                <label style="float: left; margin: 5px auto 5px;">Featured image</label>
                <input type="file" name="featured_image" >
                <textarea name="body" id="body" cols="30" rows="10"><?php echo $body; ?></textarea>

                <!-- Only admin users can view publish input field -->
                <?php if ($_SESSION['user']['role'] == "Admin"): ?>
                    <!-- display checkbox according to whether post has been published or not -->
                    <?php if ($published == true): ?>
                        <label for="publish">
                            Publish
                            <input type="checkbox" value="1" name="publish" checked="checked">&nbsp;
                        </label>
                    <?php else: ?>
                        <label for="publish">
                            Publish
                            <input type="checkbox" value="1" name="publish">&nbsp;
                        </label>
                    <?php endif ?>
                <?php endif ?>

                <!-- if editing post, display the update button instead of create button -->
                <?php if ($isEditingPost === true): ?> 
         
                    <button type="submit" class="btn" name="update_post">Update</button>
                
                    <button onClick="window.location.reload();" class="btn">View</button>
                   

                <?php else: ?>

                    <button type="submit" class="btn" name="create_post">Save Post</button>
                    <button onClick="window.location.reload();" class="btn">View</button>
                <?php endif ?>

            </form>

            <!-- // Middle form - to create and edit -->
        </div>

    </div>

    <?php if ($isEditingPost === true): ?>
        <div class="news_post">
            <div style="background-color: #eeeeee;" class="container content">

                <h1>Preview News Post</h1>  
<div id="main-content">
                <div class="clearfix"> 
                    <span class="news_line"></span>
                    <h4> 2020</h4>

                    <h3 style ="font-family: 'Open Sans', sans-serif;" class="news_title"><?php echo $title; ?></h3>
                    <ul class="news">
                        <?php echo $body; ?>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    <?php endif ?>

</body>

</html>

<script>
    CKEDITOR.replace('body');
</script>