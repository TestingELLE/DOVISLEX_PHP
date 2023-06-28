<?php include("connection.php"); ?>
<!-- menu.php -->
<link rel="stylesheet" href="css/menu.css">
<div class="menu-container">
    <div class="menu">
        <div class="card">
            <div class="card-header">
                <h2 style="color: #0335fc">Dovislex -
                    <?php echo isset($_SESSION['type']) ? $_SESSION['type'] : ''; ?></h2>

            </div>
            <div class="card-content">
                <a href="create_post.php">Create Posts</a>
                <a href="posts.php">Manage Posts</a>
                <a href="../en/index.php?page=news_sql">View News Page</a>
                <a href="logout.php" class="logout-btn">Logout - User: 
                    <span style="color: #0335fc"><?php echo isset($_SESSION['uname']) ? $_SESSION['uname'] : ''; ?></span>
                </a>
            </div>
        </div>
    </div>
</div>
