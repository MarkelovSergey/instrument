<?php if ( post_password_required() ) : ?>
	<p><?php _e( 'This post is password protected. Enter the password to view any comments.', 'tf-construction' ); ?></p>
<?php return;
endif; ?>
<?php if ( have_comments() ) : ?>
<div id="comments" class="row c_comment">	
	<h2><?php echo comments_number(__('No Comments','tf-construction'), __('1 Comment','tf-construction'), '% Comments'); ?></h2>
	<?php wp_list_comments( array( 'callback' => 'tf_construction_comment' ) ); ?>		
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-below" class="row pagination c_blog_pagination comment_pagination">
		<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'tf-construction' ); ?></h2>
		<ul class="pager">
			<li class="nav-previous previous"><?php previous_comments_link( __( 'Previous Comments', 'tf-construction' ) ); ?>
			</li>
			<li class="nav-next next"><?php next_comments_link( __( 'Next Comments', 'tf-construction' ) ); ?>
			</li>
		</ul>
	</nav>
<?php endif;  ?>
</div>		
<?php endif; ?>
<?php if ( comments_open() ) : ?>
	<div class="row c_comment_form">
		<?php  comment_form(); ?>		
	</div>
<?php endif; // If registration required and not logged in ?>