<?php 
    include('server.php'); 

    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
		$secret = '6LdB_LAZAAAAALMyTNfllu-ace6uZ_GXqIayDp2a';
		$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
		$responseData = json_decode($verifyResponse);
		if($responseData->success) {
			$succMsg = 'Your contact request have submitted successfully.';
		}
		else {
			$errMsg = 'Robot verification failed, please try again.';
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
    <title>
        Sign Up
    </title>
    <link rel="stylesheet" href="assets/css/login.css?v=<?php echo time(); ?>">
    <script src='https://www.google.com/recaptcha/api.js' async defer ></script>
</head>

<body>
    <div class="imgcontainer">
        <img src="https://ae01.alicdn.com/kf/HTB1if8sXSf2gK0jSZFPq6xsopXag/Anime-Himouto-Umaru-chan-Badge-Fashion-Japanese-Cartoon-Figure-Round-Metal-Brooch-Pin-Bag-Decoration-Collections.jpg_50x50.jpg"
            alt="Avatar" class="avatar">
    </div>    
    <h2>
        Welcome to Online Shopping
    </h2>
    <form method="post" action="signup.php">
        <?php 
            include('errors.php'); 
        ?>
        <div class="input-group">
            <label>
                Username
            </label>
            <input type="text" name="user_id" value="<?php echo $user_id; ?>">
        </div>
        <div class="input-group">
  	    <label>
            Email
        </label>
  	    <input type="email" name="email" value="<?php echo $email; ?>">
  	    </div>
        <div class="input-group">
            <label>
                Password
            </label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label>
                Confirm password
            </label>
            <input type="password" name="password_2">
        </div>
        <div class="g-recaptcha" data-sitekey="6LdB_LAZAAAAAGEeddv-mOPnOkC7CnVJ4Ey0-x-C"></div>  
        <div class="input-group">
            <button type="submit" class="btn" name="reg_user">
                Sign Up
            </button>
        <a href="login.php">
          <button type="button" class="btn">
            Cancel
          </button>
        </a>
        </div>
    </form>
</body>
</html>