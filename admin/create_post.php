<link rel="stylesheet" href="../static/css/main.css"/>
<link rel="stylesheet" href="../static/css/create_post_styling.css"/>

<!-- protects page from unauthorized users -->
<?php include_once("session_manager.php");?>

<?php //include('../config.php'); ?>

<?php //include(ROOT_PATH . '/admin/includes/admin_functions.php');
 include 'admin_functions.php';
?>
<?php //include(ROOT_PATH . '/admin/includes/post_functions.php'); 
 include 'post_functions.php';
?>
<?php //include(ROOT_PATH . '/admin/includes/head_section.php');
 include 'head_section.php';
?>


<!-- Get all admin posts from DB -->
<?php $posts = getAllPosts(); ?>

<?php //include(ROOT_PATH . '/includes/public_functions.php');
 include 'public_functions.php';
?>
<?php
if (isset($_GET['post-slug'])) {
    $post = getPost($_GET['post-slug']);
}
?>

<?php if ($isEditingPost === true): ?>

    <div id="page">

        
            <h1>Preview News Post</h1>  

            <div id="tableDiv">
                <div id="main-content">
                    <div class="clearfix"> 
                        <span class="news_line"></span
                        <!-- date not working  -->
                        <h4><?php echo $post['date']; ?>
                        *Example Date*</h4>

                        <h3 style ="font-family: 'Open Sans', sans-serif;" class="news_title"><?php echo $title; ?></h3>
                        <ul class="news">
                            <?php echo $body; ?>
                        </ul>
                    </div>


                </div>
                <div id='buttons-container'>
                    <!-- goes into div id="buttons-container" -->
                    <ul class="items">
                        <li><a href="index.php?page=concorrenza">

                                <div class="outerContainer" style="background-image: url(../images/Dovislex_Sailboat5_Sprite3_3KT.png);">
                                    <div class="innerContainer">
                                        <div>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>

                            </a></li>
                        <li><a href="index.php?page=arbitration">

                                <div class="outerContainer">
                                    <div class="innerContainer">
                                        <div>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>

                            </a></li>
                        <li><a href="index.php?page=import-export">

                                <div class="outerContainer">
                                    <div class="innerContainer">
                                        <div>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>

                            </a></li>

                        <li ><a href="index.php?page=scambi">

                                <div class="outerContainer">
                                    <div class="innerContainer">
                                        <div>
                                            <p> </p>
                                        </div>
                                    </div>
                                </div>

                            </a></li>
                        <li><a href="index.php?page=settori">

                                <div class="outerContainer">
                                    <div class="innerContainer">
                                        <div>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>

                            </a></li>
                        <li><a href="index.php?page=penale-amministrativo">
                                </div>
            </div>
        
    </div>
                            <?php endif ?>


                            <title>Admin | Create Post</title>
                            </head>
                            <body>
                                <!-- admin navbar -->
                                <!-- <?php //include(ROOT_PATH . '/admin/includes/navbar.php')
                                    include 'navbar.php';
                                ?> -->

                                <div class="container content">
                                    <!-- Left side menu -->
                                    <?php //include(ROOT_PATH . '/admin/includes/menu.php')
                                                include 'menu.php';
                                    ?>

                                    <!-- Middle form - to create and edit  -->
                                    <div class="action create-post-div">
                                        <h1 class="page-title">Create/Edit Post</h1>
                                        <form method="post" enctype="multipart/form-data" action="<?php //echo BASE_URL . 'admin/create_post.php';
                                        echo BASE_URL . 'create_post.php';
                                        ?>" >
                                            <!-- validation errors for the form -->
                                            <?php //include(ROOT_PATH . '/includes/errors.php') ?>

                                            <!-- if editing post, the id is required to identify that post -->
                                            <?php if ($isEditingPost === true): ?>
                                                <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                                            <?php endif ?>
                                            
                                           
                                            <input type="text" name="title" value="<?php echo $title; ?>" placeholder="Title">
                                          

                                            <textarea name="body" id="body" cols="30" rows="10"><?php echo $body; ?></textarea>

                                            <!-- Only admin users can view publish input field -->
                                            <?php //if ($_SESSION['user']['role'] == "Admin"): 
                                            if ($_SESSION['type'] == "Admin" || $_SESSION['type'] == "Maintainer" || $_SESSION['type'] == "Programmer"):
                                            ?>
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

                                                <button type="submit" class="btn" name="update_post" onclick='updatePost($request_values)'>Update</button>

                                            <?php else: ?>

                                                <button type="submit" class="btn" name="create_post" onclick='createPost($request_values)'>Save Post</button>

                                            <?php endif ?>

                                        </form>

                                        <!-- // Middle form - to create and edit -->
                                    </div>

                                </div>




                            </body>

                            </html>

                            <script>
                                CKEDITOR.replace('body');
                            </script>





