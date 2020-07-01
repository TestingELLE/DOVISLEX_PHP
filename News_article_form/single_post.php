<?php  include('config.php'); ?>
<?php  include('includes/public_functions.php'); ?>
<?php 
	if (isset($_GET['post-slug'])) {
		$post = getPost($_GET['post-slug']);
	}
	
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $post['title'] ?> | Dovislex</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

        <!--All page specific code goes above this line which loads the common head-->
        <?php include('../commonHTML/commonHead.html'); ?>
        <script src="load-contents.js" defer></script>
    </head>

    <body onload="loadContents();">
        <div id="supra-header"></div>
        <div id="page">
            <div id="header"> 
                <?php include('header.php'); ?> 
            </div>
            <div id="main-container" class="clear"> 
                 
                <div id="tableDiv">
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

        <div class="clearfix"> <!--Milano Finanza -->   
            <span class="news_line"></span>
            <h4> 2020</h4>

            <h3 class="news_title"><?php echo $post['title']; ?></h3>
            <ul class="news">
                <?php echo html_entity_decode($post['body']); ?>

            </ul>

        </div>  <!--Milano Finanza -->   <div
    </article>

                </div>
            </div>

            
            <footer id="colophon" class="clearfix notranslate"> 
                <?php include('../commonHTML/footer.html'); ?> 
            </footer>
        </div>
    </body>
</html>