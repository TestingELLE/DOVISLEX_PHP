 <?php include("connection.php"); ?>
<div class="menu">
    <div class="card">
        <div class="card-header">
            <h2 style="color: red">Dovislex -
                <?php echo isset($_SESSION['type']) ? $_SESSION['type'] : ''; ?></h2>

        </div>
        <div class="card-content">
            <a href="create_post.php">Create Posts</a>
            <a href="posts.php">Manage Posts</a>
            <a href="../en/index.php?page=news_sql">View News Page</a>

            <a href="logout.php" class="logout-btn">Logout - User: <h3 style="color: red"><?php echo isset($_SESSION['uname']) ? $_SESSION['uname'] : ''; ?></h3></a>

        </div>
    </div>
</div>
