<div class="menu">
	<div class="card">
		<div class="card-header">
                    <h2 style="color: red">Dovislex - Admin</</h2>
			<h2>ACTIONS:</h2>
		</div>
		<div class="card-content">
			<a href="<?php echo BASE_URL . 'admin/create_post.php' ?>">Create Posts</a>
			<a href="<?php echo BASE_URL . 'admin/posts.php' ?>">Manage Posts</a>
			<a href="<?php echo BASE_URL . 'admin/users.php' ?>">Manage Users</a>
                         <a href="<?php echo BASE_URL . '/logout.php'; ?>" class="logout-btn">Logout - User: <?php echo $_SESSION['user']['username'] ?></a>
	
		</div>
	</div>
</div>