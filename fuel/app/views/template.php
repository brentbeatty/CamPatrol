<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<?php echo Asset::css('main.css'); ?>
	<?php //echo Asset::css('demo_page.css'); ?>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	<?php echo Asset::js('jquery.pajinate.js'); ?>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#paging_container11').pajinate();
		});   
	</script>
	<style>
	body { margin: 40px; }
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<ul style="display:block;margin:20px;">
				<li><a href='/public/'>Index</a></li>
				<li><a href='/public/partner'>Partners</a></li>
				<li><a href='/public/search'>Search</a></li>
				<?php  if (Auth::check()) {
					// Assign a variable to the instanced auth get_user_id (which returns an array). The user is the index 1.
					$auth = \Auth::instance()->get_user_id();
					echo "<li><a href='/public/user/userpage/".$auth[1]."'>User Page</a></li>";
					echo "<li><a href='/public/login/logout'>Logout ".Auth::get_screen_name()."</a></li>";
				} else {
					echo "<li><a href='/public/login'>Login</a></li>";
				}   ?>
			</ul>
			<div class="span16">
				<h1><?php echo $title; ?></h1>
				<hr>
				<?php if (Session::get_flash('success')): ?>
				<div class="alert-message success">
					<p>
						<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
					</p>
				</div>
			<?php endif; ?>
			<?php if (Session::get_flash('error')): ?>
			<div class="alert-message error">
				<p>
					<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
				</p>
			</div>
		<?php endif; ?>
	</div>
	<div class="span16">
		<?php echo $content; ?>
	</div>
</div>
<hr>

<footer>
	<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
	<p>
	</p>
</footer>
</div>
</body>
</html>
