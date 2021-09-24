

<?php require_once('../admin/public_functions.php') ?>
// <?php require_once( '../admin/registration_login.php') ?> 

<?php echo "HI" ?> 

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

        <!-- Retrieve all posts from database  -->
        <?php $posts = getPublishedPosts(); ?>

        <?php foreach ($posts as $post): ?>

            <div class="clearfix"> 
                <span class="news_line"></span>         
               
                <!-- retrieve date from data -->
                <h4><?php echo $post['date'] ?></h4>

                <!-- retrieve title from data -->
                <h3 class="news_title"><?php echo $post['title'] ?></h3>

                <!-- retrieve src, class, and alt (for image if applicable) from data -->
                <a>
                    <img class="img_news <?php echo $post['image_float'] ?>" src="<?php echo $post['image'] ?>" alt="<?php echo $post['image_alt'] ?>">
                </a>

                <!-- retreive body from data -->
                <?php echo $post['body'] ?>

            </div> <!-- #clearfix -->
        <?php endforeach ?>

    </article>

</div> <!-- #main-content -->
</html>