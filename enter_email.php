<?php 
	include('server.php'); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Reset Password
	</title>
	<link rel="stylesheet" href="assets/css/login.css?v=<?php echo time(); ?>">
</head>
<body>
	<div class="imgcontainer1">
		<img src="https://ae01.alicdn.com/kf/HTB1if8sXSf2gK0jSZFPq6xsopXag/Anime-Himouto-Umaru-chan-Badge-Fashion-Japanese-Cartoon-Figure-Round-Metal-Brooch-Pin-Bag-Decoration-Collections.jpg_50x50.jpg"
			alt="Avatar" class="avatar">
	</div>
	<h2>
		Reset Password
	</h2>
	<form class="login-form2" action="enter_email.php" method="post">
		<!-- form validation messages -->
		<?php include('errors.php'); ?>
		<div class="input-group">
			<label>Your email address</label>
			<input type="email" name="email">
		</div>
		<div class="input-group">
			<button type="submit" name="reset-password" class="btn">Submit</button>
		</div>
		<a href="login.php">
          <button type="button" class="btn">
            Back
          </button>
        </a>
	</form>
</body>
</html>