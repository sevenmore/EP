<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>SuperShop About us</title>
		<link href="../css/style.css" rel="stylesheet" type="text/css" />
		<meta name="description" content="" />
		<meta name="author" content="Boco" />
		<link rel="stylesheet" href="../css/jquery-ui.css"/>
		<script src="../js/jquery-1.9.1.js"></script>
    	<script src="../js/jquery-ui.js"></script>
	</head>

	<body>		
		<nav>
			<ul id="menu">
				<li><?php echo anchor('index', 'Home'); ?></li>
				<li><?php echo anchor('shop_offline', 'Shop'); ?></li>
				<li><?php echo anchor('aboutus_offline', 'About us'); ?></li>
				<li><?php echo anchor('contact_offline', 'Contact'); ?></li>
			</ul>
			<?php echo anchor('login', 'Login','class=login-offline'); ?>
		</nav>
		
		<section id="aboutus-offline">
			<h2>About us</h2>
			<p>We are two students from the Faculty of Computer and Information Science, Ljubljana and this is a project for one of our courses. </p><br/>
			<p>Feel free to contact us, click <?php echo anchor('contact_offline', 'here'); ?>.</p>
		</section>
	</body>
</html>
