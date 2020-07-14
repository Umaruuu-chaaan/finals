<?php 
	include('server.php'); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>
		Reset Password
	</title>
	<link rel="stylesheet" href="assets/css/login.css?v=<?php echo time(); ?>">
</head>
<body>
	<div class="imgcontainer2">
		<img src="https://ae01.alicdn.com/kf/HTB1if8sXSf2gK0jSZFPq6xsopXag/Anime-Himouto-Umaru-chan-Badge-Fashion-Japanese-Cartoon-Figure-Round-Metal-Brooch-Pin-Bag-Decoration-Collections.jpg_50x50.jpg"
			alt="Avatar" class="avatar">
	</div>
	<h2>
		Welcome to Online Shopping
	</h2>
	<form class="login-form3" action="login.php" method="post">
		<p>
			We sent an email to  <b><?php echo $_GET['email'] ?></b> to help you recover your account. 
		</p>
	    <p>
			Please login into your email account and click on the link we sent to reset your password
		</p>
		<a href="login.php">
          <button type="button" class="btn">
            Back
          </button>
        </a>
	</form>
		
</body>
</html>