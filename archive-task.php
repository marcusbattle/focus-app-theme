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
					<div class="task <?php echo get_post_meta( $task_id, 'status', true ); ?>" data-task-id="<?php echo get_the_ID(); ?>">
						<!-- <span class="task-status">
							<i class="fa fa-square-o"></i>
						</span> -->
						<span class="task-title"><?php the_title(); ?></span>
						<span class="task-due-date"><?php echo date('l', get_post_meta( get_the_ID(), 'due_date', true ) ); ?></span>
						<div class="actions">
							<a class="complete" href="#"><i class="fa fa-check"></i></a>
							<a class="delete" href="#"><i class="fa fa-trash"></i></a>
						</div>
						<div class="notes">
							<?php 

							$args = array(
								'post_id' => get_the_ID(),
								'order' => 'DESC'
							);

							$comments = get_comments( $args ); 

							foreach( $comments as $comment ):
							?>
								<div class="note">
									<span class="note-content"><?php echo $comment->comment_content; ?></span>
									<span class="note-date"><?php echo human_time_diff( strtotime( $comment->comment_date ), current_time('timestamp') ); ?></span>
								</div>
							<?php endforeach; ?>
							<div class="note">
								<textarea class="new-note" rows="3"></textarea>
								<button class="add-note-button">Add Note</button>
							</div>
						</div>
					</div>
				<?php endwhile; else : ?>
					<p><?php _e( 'Click the green button below to add your first task' ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<?php wp_footer(); ?>
	</body>
</html>