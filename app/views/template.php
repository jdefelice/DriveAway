<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>DriveAway</title>
		<link rel="stylesheet" href="<?php echo WEB_ROOT ?>/app/public/css/style.css" type="text/css" media="screen" title="Default" charset="utf-8" />
		<meta name="viewport" content="width=device-width" />
    </head>


    <body id="<?php echo $route['controller'] ?>" class="<?php echo $route['action'] ?>">
        <div id="wrapper">
			
			<div id="header">
				<h1><a href="<?php echo site_url('index'); ?>">DriveAway</a></h1>
				<div id="user-menu">
					<?php if(isLoggedIn()): ?>
					<span>Hello, <?php echo user('forename'); ?></span>
					<a href="<?php echo site_url('user/searches'); ?>">Saves Searches</a>
					<a href="<?php echo site_url('user/details'); ?>">Profile</a>
					<a href="<?php echo site_url('login/logout'); ?>">Logout</a>
					<?php else: ?>
					<a href="<?php echo site_url('login'); ?>">Login</a>
					<?php endif; ?>
				</div>
			</div>
			
			<div id="flash">
				<?php if($flash['success']): ?>
					<span class="success"><?php echo $flash['success']; ?></span>
				<?php endif ?>
				<?php if($flash['error']): ?>
					<span class="error"><?php echo $flash['error']; ?></span>
				<?php endif ?>
			</div>

			<div id="content">
				<?php echo $view; ?>
				<br class="clear" />
			</div>		
        </div>
		<div id="footer">
				
		</div>
    </body>
</html>

