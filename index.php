<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Josefin+Slab|Hind' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">

</head>
<body>
	<!-- Code for order form -->
	<?php
		$order = '';
		$emailaddress = '';
		$telephone = '';
		$name = '';
		$donebydate = '';

		if( isset($_POST['submitorder'])) {
			$formValidated = true;

			if(!isset($_POST['order']) || $_POST['order'] === '') {
				$formValidated = false;
			} else {
				$order = $_POST['order'];
			}
			if(!isset($_POST['emailaddress']) || $_POST['emailaddress'] === '') {
				$formValidated = false;
			} else {
				$emailaddress = $_POST['emailaddress'];
			}
			if(!isset($_POST['telephone']) || $_POST['telephone'] === '') {
				$formValidated = false;
			} else {
				$telephone = $_POST['telephone'];
			}
			if(!isset($_POST['name']) || $_POST['name'] === '') {
				$formValidated = false;
			} else {
				$name = $_POST['name'];
			}
			if(!isset($_POST['donebydate']) || $_POST['donebydate'] === '') {
				$formValidated = false;
			} else {
				$donebydate = $_POST['donebydate'];
			}
			if($formValidated){
				printf('Order: %s 
					 <br>Email Address: %s
					 <br>Telephone: %s
					 <br>Name: %s
					 <br>To be done by: %s',
					 htmlspecialchars($order),
					 htmlspecialchars($emailaddress),
					 htmlspecialchars($telephone),
					 htmlspecialchars($name),
					 htmlspecialchars($donebydate));
			}

			if($formValidated) {
				//connect to MySQL database
				$db = mysqli_connect('localhost/cake+', 'root', 'root', 'php');
				$sql = sprintf("INSERT INTO users (name, telephone, emailaddress) VALUES ('%s', '%s', '%s')", 
								mysqli_real_escape_string($db, $name),
								mysqli_real_escape_string($db, $telephone),
								mysqli_real_escape_string($db, $emailaddress));
				mysqli_query($db, $sql);
				mysqli_close($db);
				echo '<h1>User Added</h1>';
			}
		}
	?>

	<div class="container-fluid landing">
		<div class="row begin-content">
			<div class="col-md-4 col-md-offset-4 col-xs-12">
				<div class="logo">
					<i class="inner-logo fa fa-birthday-cake"></i>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-4 brand">
				<span class="name">cake+</span> 
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-4 subhead">
				<p>Bespoke cakes, plus other treats.</p>
			</div>
		</div>
	</div>

	<!-- Product Gallery -->
	<div class="container-fluid gallery">
		<div class="row">
			<div class="col-md-4">
				<h2 class="section-header">Gallery</h2><br><hr class="section-underline">
			</div>
		</div>
		<div class="row gallery-main">
			<div class="col-md-1 col-md-offset-1 button-point" id="bp-1">
				<button class="gallery-button" id="gallery-backward"><i class="fa fa-arrow-left"></i></button>
			</div>
			<div class="col-md-4">
				<div class="gallery-frame">
					<img class="gallery-image" src="images/choc-strawberry-cake.jpg" />
				</div>
			</div>
			<div class="col-md-4">
				<div class="gallery-review-frame">
					<p class="gr">"<span class="gallery-review"></span>"</p>
				</div>
			</div>
			<div class="col-md-1 button-point" id="bp-2">
				<button class="gallery-button" id="gallery-forward"><i class="fa fa-arrow-right"></i></button>
			</div>
		</div>
	</div>

	<!-- What we sell -->
	<div class="container-fluid products">
		<div class="row">
			<div class="col-md-4">
				<h2 class="section-header">What We Sell</h2><br><hr class="section-underline">
			</div>
		</div>
		<div class="row">
			<p class="instructions">Click on the products to add to your order.</p>
		</div>
		<div class="row pl">
			<div class="col-md-8 col-md-offset-2 product-list">
				<button class="product-bar"><span class="which-product">Wedding Cake</span></button>
				<button class="product-bar"><span class="which-product">Birthday Cake</span></button>
				<button class="product-bar"><span class="which-product">Cupcakes</span></button>
				<button class="product-bar"><span class="which-product">Coconut Ice</span></button>
				<button class="product-bar"><span class="which-product">Fudge</span></button>
				<button class="product-bar"><span class="which-product">Pizza</span></button>
				<button class="product-bar"><span class="which-product">Truffles</span></button>
				<button class="product-bar"><span class="which-product">Macarons</span></button>
				<button class="product-bar"><span class="which-product">Bread</span></button>
				<button class="product-bar"><span class="which-product">Tarts</span></button>
				<button class="product-bar"><span class="which-product">Pies</span></button>
				<button class="product-bar"><span class="which-product">Other</span></button>
			</div>
		</div>
	</div>

	<div class="container-fluid order">
		<div class="row">
			<div class="col-md-4">
				<h2 class="section-header">Order</h2><hr class="section-underline">
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<form method="post" action="" class="order-form">
					<div class="row">
						<h3 class="form-header fh-1">What would you like?</h3>
						<textarea class="order-form-input" id="the-order" name="order">
							<?php echo htmlspecialchars($order); ?>
						</textarea>
					</div>
					<div class="row">
						<div class="col-md-5">
							<h3 class="form-header">Email</h3>
							<input class="order-form-input ofi-1" type="email" name="emailaddress" placeholder="So we can contact you" value="<?php echo htmlspecialchars($emailaddress)?>"/>
						</div>
						<div class="col-md-5 col-md-offset-2">
							<h3 class="form-header">Telephone</h3>
							<input class="order-form-input ofi-2" type="tel" name="telephone" placeholder="If you please" value="<?php echo htmlspecialchars($telephone); ?>"/>
						</div>
					</div>
					<div class="row">
						<div class="col-md-5">
							<h3 class="form-header">What's your name?</h3>
							<input class="order-form-input ofi-1" name="name" placeholder="What do we call you" value="<?php echo htmlspecialchars($name); ?>"/>
						</div>
						<div class="col-md-5 col-md-offset-2">
							<h3 class="form-header">When do you need it by?</h3>
							<input class="order-form-input ofi-2" type="date" name="donebydate" value="<?php echo htmlspecialchars($donebydate); ?>"/>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<input type="submit" name="submitorder" class="send-order" value="Send"/>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Connect to MySQL -->


	<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="main.js"></script>
</body>
</html>