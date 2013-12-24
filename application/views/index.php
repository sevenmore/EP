<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>SuperShop</title>
		<link href="/css/style.css" rel="stylesheet" type="text/css" />
		<meta name="description" content="" />
		<meta name="author" content="Boco" />
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"/>
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	</head>

	<body>
		<nav>
			<ul id="menu">
				<li><?php echo anchor('index', 'Home'); ?></li>
				<li><?php echo anchor('myprofile', 'My profile'); ?></li>
				<li><?php echo anchor('aboutus_offline', 'About us'); ?></li>
				<li><?php echo anchor('contact_offline', 'Contact'); ?></li>
			</ul>
			<?php echo anchor('login', 'Login', 'class="login-offline"'); ?>
		</nav>
				
		<footer class="space-index">
			<p>&copy; Copyright  by Boco</p>
		</footer>
	</body>
</html>