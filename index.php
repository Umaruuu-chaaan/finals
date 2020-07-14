<?php
	session_start();
	
	if (!isset($_SESSION['user_id'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user_id']);
		header("location: login.php");
	}
	
	include('db.php');
	$status="";
	if (isset($_POST['code']) && $_POST['code']!=""){
		$code = $_POST['code'];
		$result = mysqli_query($con,"SELECT * FROM `products` WHERE `code`='$code'");
		$row = mysqli_fetch_assoc($result);
		$name = $row['name'];
		$code = $row['code'];
		$price = $row['price'];
		$image = $row['image'];

	$cartArray = array(
		$code=>array(
		'name'=>$name,
		'code'=>$code,
		'price'=>$price,
		'quantity'=>1,
		'image'=>$image)
	);

		if(empty($_SESSION["shopping_cart"])) {
			$_SESSION["shopping_cart"] = $cartArray;
			$status = "<div class='box'>Product is added to your cart!</div>";
		}else{
			$array_keys = array_keys($_SESSION["shopping_cart"]);
			if(in_array($code,$array_keys)) {
				$status = "<div class='box' style='color:red;'>
				Product is already added to your cart!</div>";	
			} else {
			$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
			$status = "<div class='box'>Product is added to your cart!</div>";
			}
		}
	}
?>
<html>
	<head>
		<title>Online Shopping </title>
		<link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">

	</head>
	<body>
		<div style="width:700px; margin:50 auto;">
			<img class ="imgcontainer"
				src="https://ae01.alicdn.com/kf/HTB1if8sXSf2gK0jSZFPq6xsopXag/Anime-Himouto-Umaru-chan-Badge-Fashion-Japanese-Cartoon-Figure-Round-Metal-Brooch-Pin-Bag-Decoration-Collections.jpg_50x50.jpg">
			<div>
				<?php  
					if (isset($_SESSION['user_id'])) : 
				?>
					Welcome
				<strong>
					<?php echo $_SESSION['user_id']; 
					?>
				</strong>
			</div>
			<a href="index.php?logout='1'">
				<button type="submit" class="btn">
					logout
				</button>
			</a>
			<?php endif ?>
			<div class="content">
				<?php if (isset($_SESSION['success'])) : ?>
					<div class="error success">
						<h3>
							<?php 
								echo $_SESSION['success']; 
								unset($_SESSION['success']);
							?>
						</h3>
					</div>
				<?php endif ?>
			<?php
				if(!empty($_SESSION["shopping_cart"])) {
					$cart_count = count(array_keys($_SESSION["shopping_cart"]));
			?>
			<div class="cart_div">
				<a href="cart.php"><img src="assets/images/cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a>
			</div>
			<?php
			}
			$result = mysqli_query($con,"SELECT * FROM `products`");
			while($row = mysqli_fetch_assoc($result)){
					echo "<div class='product_wrapper'>
						<form method='post' action=''>
						<input type='hidden' name='code' value=".$row['code']." />
						<div class='image'><img src='".$row['image']."' /></div>
						<div class='name'>".$row['name']."</div>
						<div class='price'>$".$row['price']."</div>
						<button type='submit' class='buy'>Buy Now</button>
						</form>
						</div>";
					}
			mysqli_close($con);
			?>

			<div style="clear:both;"></div>
			<div class="message_box" style="margin:10px 0px;">
				<?php echo $status; ?>
			</div>
			<br /><br />
		</div>
</body>
</html>