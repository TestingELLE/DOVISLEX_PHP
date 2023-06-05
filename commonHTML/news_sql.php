<?php require_once('../admin/public_functions.php'); ?>
<!-- <?php require_once('../admin/registration_login.php'); ?> -->

<!DOCTYPE html>
<html>
<head>
    <!-- Add any necessary head elements, such as meta tags and CSS stylesheets -->
    <style>
        #aboutuspage {
            color: #b09b4c;
        }
    </style>
</head>
<body>
    <div id="main-content">
        <?php include('crumbs.html'); ?>

        <br/><br/>

        <article>
            <h1>News</h1>

            <!-- Retrieve all posts from the database -->
            <?php $posts = getPublishedPosts(); ?>

            <?php foreach ($posts as $post): ?>

                <div class="clearfix">
                    <span class="news_line"></span>

                    <!-- Retrieve date from data -->
                    <h4><?php echo $post['date']; ?></h4>

                    <!-- Retrieve title from data -->
                    <h3 class="news_title"><?php echo $post['title']; ?></h3>

                    <!-- Retrieve src, class, and alt (for image if applicable) from data -->
                    <a>
                        <img class="img_news <?php echo $post['image_float']; ?>" src="<?php echo $post['image']; ?>" alt="<?php echo $post['image_alt']; ?>">
                    </a>

                    <!-- Retrieve body from data -->
                    <?php echo $post['body']; ?>

                </div> <!-- #clearfix -->
            <?php endforeach; ?>

        </article>

    </div> <!-- #main-content -->
</body>
</html>
