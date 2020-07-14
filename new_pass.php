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
	<form class="login-form1" action="new_pass.php" method="post">
		<h2 class="form-title">
			New password
		</h2>
		<!-- form validation messages -->
		<div class="input-group">
			<label>
				New Password
			</label>
			<input type="password" name="new_pass">
		</div>
		<div class="input-group">
			<label>
				Confirm New Password
			</label>
			<input type="password" name="new_pass_c">
		</div>
		<div class="input-group">
			<button type="submit" name="new_pass" class="btn">
				Change Password
			</button>
		</div>
	</form>
</body>
</html>