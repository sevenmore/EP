<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>EasyDo My profile</title>
		<link href="/css/style.css" rel="stylesheet" type="text/css" />
		<link href="/photos/favicon2.ico" rel="icon" type="image/x-icon" />
		<meta name="description" content="" />
		<meta name="author" content="Boco" />
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"/>
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<script type="text/javascript" src="/js/search.js"></script>
	</head>

	<body>		
		<nav>
			<?php if($role == 2){ ?>
			<ul id="menu">
				<li><?php echo anchor('adm', 'Home'); ?></li>
				<li><?php echo anchor('adduser', 'Add user'); ?></li>
				<li><?php echo anchor('editusers', 'Edit users'); ?></li>
			</ul>
			<?php }elseif($role == 1){ ?>
			<ul id="menu">
				<li><?php echo anchor('prodaja', 'Home'); ?></li>
				<li><?php echo anchor('orders', 'Orders'); ?></li>
				<li><?php echo anchor('editshop', 'Edit shop'); ?></li>
				<li><?php echo anchor('addseller', 'Add seller'); ?></li>
				<li><?php echo anchor('editsellers', 'Edit sellers'); ?></li>
			</ul>
			<?php }else{ ?>
			<ul id="menu">
				<li><?php echo anchor('main', 'Home'); ?></li>
				<li><?php echo anchor('shop', 'Shop'); ?></li>
				<li><?php echo anchor('cart', "Cart (".$cart.")"); ?></li>
				<li><?php echo anchor('aboutus', 'About us'); ?></li>
				<li><?php echo anchor('contact', 'Contact'); ?></li>
			</ul>
			<?php }?>
			
			<?php if($role <= 1){ ?>
			<div id="search-bar">					
				<img class="ikona" id="search" src="/photos/search.png" alt="search" width="24" height="24">
				<input id="searchbar" class="oblika-search" name="searchbar" type="search" placeholder="Search">
				<input id="hiddenurl" type="hidden" value="<?php echo base_url(); ?>">
			</div>
			<div id="results" class="halfscreen">Write something...</div>
			<?php }?>
			
			<div class="welcome">
				Welcome, <?php echo anchor('myprofile', $name);?>
				<?php echo anchor('main/logout', 'Logout', 'class="login"'); ?>
			</div>
		</nav>
		
		<section id="myprofile">
			<h2>My profile</h2>
			<img src="/photos/profile.png" alt="profile" width="64" height="64">
			<div class="profile">
				<p><strong>Name:</strong> <?php echo $name." ".$surname; ?></p>
				<p><strong>Address:</strong> <?php echo $address; ?></p>
				<p><strong>Post number:</strong> <?php echo $post.", ".$city; ?></p>
				<p><strong>E-mail:</strong> <?php echo $email; ?></p>
				<p><strong>Phone:</strong> <?php echo $phone; ?></p>
			</div>
			<?php echo anchor('editprofile', 'Edit','class="edit-profile"'); ?>
			<?php echo anchor('changepassword', 'Change password','class="edit-password"'); ?>					
		</section>
	</body>
</html>