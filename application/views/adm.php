<!DOCTYPE html> 
<html lang="en">
	<head>
	<meta charset="utf-8" />
	<title>SuperShop Admin</title>
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<meta name="description" content="" />
	<meta name="author" content="Boco" />
	<link rel="stylesheet" href="../css/jquery-ui.css"/>
	<script src="../js/jquery-1.9.1.js"></script>
    	<script src="../js/jquery-ui.js"></script>
    	<script type="text/javascript" src="../js/jquery.jcarousel.min.js"></script>
        <script type="text/javascript" src="../js/jcarousel.basic.js"></script>
	<script type="text/javascript" src="../js/search.js"></script>		
	</head>
	<body>
		<nav>
			<ul id="menu">
				<li><?php echo anchor('adm', 'Home'); ?></li>
				<li><?php echo anchor('editusers', 'Edit users'); ?></li>
			</ul>
			
			<div class="welcome">
				Welcome, <?php echo anchor('myprofile', $name);?>
				<?php echo anchor('adm/logout', 'Logout', 'class="login"'); ?>
			</div>	
		</nav>
	</body>
</html>