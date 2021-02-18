<?php
session_start();
if (!isset($_SESSION['uname'])) {

    header("Location:logout.php");
    exit();
}
$user = $_SESSION['uname'];
$type = $_SESSION['type'];
?>


<?php include('../config.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/head_section.php'); ?>
<title>Admin | Dashboard</title>
</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="////////<?php echo BASE_URL . 'admin/dashboard.php' ?>">
                <h1>Dovislex -  <?php
                    echo $_SESSION['type'];
                    echo "<br>";
                    echo $user;
                    ?></h1>

            </a>
        </div>

    </div>
    <div class="container dashboard">
        <h1>Welcome</h1>
        <div class="stats">
            <a href="users.php" class="first">
                <span>
                    # <!-- Write PHP to display number of users -->
                </span> <br>
                <span>Newly registered users</span>
            </a>
            <a href="posts.php">
                <span>
                    # <!-- Write PHP to display number of posts -->
                </span> <br>
                <span>Published posts</span>
            </a>
            <a>
                <span>
                    # <!-- Write PHP to display number of comments -->
                </span> <br>
                <span>Published comments</span>
            </a>
        </div>
        <br><br><br>
        <div class="buttons">
            <a href="users.php">Add Users</a>
            <a href="posts.php">Add Posts</a>
        </div>
    </div>

</body>
</html>