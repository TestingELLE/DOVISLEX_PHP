<?php 
require_once('../admin/c_connection.php'); 
require_once('../admin/public_functions.php'); 
?>

<!-- Your HTML markup -->
<body>
    <div id="main-content">
        <?php include('crumbs.html'); ?>
        <article>
            <h1>News</h1>
            <?php 
            $posts = getPublishedPosts();
            if($posts) {
                foreach ($posts as $post): ?>
                    <div class="clearfix">
                        <span class="news_line"></span>
                        <h4><?php echo $post['date']; ?></h4>
                        <h3 class="news_title"><?php echo $post['title']; ?></h3>
                        <a>
                            <img class="img_news <?php echo $post['image_float']; ?>" src="<?php echo $post['image']; ?>" alt="<?php echo $post['image_alt']; ?>">
                        </a>
                        <?php echo $post['body']; ?>
                    </div>
                <?php endforeach;
            } else {
                echo "No posts to display.";
            }
            ?>
        </article>
    </div>
</body>
<!-- Your HTML markup -->
</html>




