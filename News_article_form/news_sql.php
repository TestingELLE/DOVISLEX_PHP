<?php require_once('config.php') ?>

<?php require_once( ROOT_PATH . '/includes/public_functions.php') ?>
<?php require_once( ROOT_PATH . '/includes/registration_login.php') ?> 

<!DOCTYPE html>
<div id="main-content">

    <?php include('crumbs.html'); ?> 
    <style>
        #aboutuspage {
            color: #b09b4c;
        }
    </style>

    <br/><br/>

    <article>
        <h1>News</h1>  

        <div class="clearfix"> 
            <span class="news_line"></span>

            <!-- Retrieve all posts from database  -->
            <?php $posts = getPublishedPosts(); ?>


            <?php foreach ($posts as $post): ?>
                <div>
                    <img src="<?php echo BASE_URL . '/static/images/' . $post['image']; ?>" class="post_image" alt="">

                    <div>
                        <h4><?php echo $post['date'] ?></h4>
                        <h3 class="news-title"><?php echo $post['title'] ?></h3>

                        <?php echo $post['body'] ?>

                    </div>
                    </a>
                </div>
            <?php endforeach ?>
        </div>
    </article>

</div> <!-- #main-content -->
</html>