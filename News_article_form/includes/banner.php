<?php if (isset($_SESSION['user']['username'])) { ?>
	<div class="logged_in_info">
		<span>welcome <?php echo $_SESSION['user']['username'] ?></span>
		|
		<span><a href="logout.php">logout</a></span>
	</div>
<?php }else{ ?>

<div class="banner">
	<div class="welcome_msg">
		<h1>Donà Viscardini</h1>
		<p> 
		    Studio legale <br> 
		    Cabinet d'Avocats <br> 
		    International Law Firm <br> 
		    Anwaltskanzlei <br> 
		    Abogados <br>
			<span>NEWS</span>
		</p>
		
	</div>

	<div class="login_div">
			<form action="<?php echo BASE_URL . 'index.php'; ?>" method="post" >
				<h2>Login</h2>
				<div style="width: 60%; margin: 0px auto;">
					
				</div>
				<input type="text" name="username" value="<?php echo $username; ?>" placeholder="Username">
				<input type="password" name="password"  placeholder="Password"> 
				<button class="btn" type="submit" name="login_btn">Sign in</button>
			</form>
		</div>
	</div>
<?php } ?>