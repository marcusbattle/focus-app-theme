<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<?php wp_head(); ?>
	</head>
	<body>
		<p>Be sure to focus</p>
		<?php if ( is_user_logged_in() ): ?>
			<a href="<?php echo home_url('tasks'); ?>">Your Tasks</a>
		<?php endif; ?>
		<?php wp_footer(); ?>
	</body>
</html>