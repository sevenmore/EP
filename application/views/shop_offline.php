<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>SuperShop Shop</title>
		<link href="../css/style.css" rel="stylesheet" type="text/css" />
		<meta name="description" content="" />
		<meta name="author" content="Boco" />
		<link rel="stylesheet" href="../css/jquery-ui.css"/>
		<script src="../js/jquery-1.9.1.js"></script>
    	<script src="../js/jquery-ui.js"></script>
		<script type="text/javascript" src="../js/search.js"></script>	
	</head>

	<body>
		<nav>
			<ul id="menu">
				<li><?php echo anchor('index', 'Home'); ?></li>
				<li><?php echo anchor('shop_offline', 'Shop'); ?></li>
				<li><?php echo anchor('aboutus_offline', 'About us'); ?></li>
				<li><?php echo anchor('contact_offline', 'Contact'); ?></li>
			</ul>
			<?php echo anchor('login', 'Login', 'class="login-offline"'); ?>
		</nav>
		
		<section id="shop">
			<h2>Shop</h2>
			<?php
				if($items){
					foreach($items as $row){
						if($row->active == 1){
							echo '<div class="items">';
							echo '<img src='.$row->photo.' alt='.$row->name.' width="150" height="150">';
							echo '<h4>'.$row->name.'</h4>';
							echo '<p>Category: '.$row->category.'</p>';
							echo '<p>Price: '.$row->price.' &euro;</p>';	
							echo '</div>';
						}
					}
				}
			?>
		</section>		
	</body>
</html>
