<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<?php wp_head(); ?>
	</head>
	<body>
		<?php if ( is_user_logged_in() ): ?>
			<div id="task-list">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
					<div class="task">
						<span class="task-status">
							<i class="fa fa-square-o"></i>
						</span>
						<span class="task-title">
							<?php the_title(); ?>
						</span>
					</div>
				<?php endwhile; else : ?>
					<p><?php _e( 'Click the green button below to add your first task' ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<?php wp_footer(); ?>
	</body>
</html>