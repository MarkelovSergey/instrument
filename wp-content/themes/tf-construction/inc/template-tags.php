<?php
if ( ! function_exists( 'tf_construction_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function tf_construction_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf('<li><i class="fa fa-calendar"></i></li> <li><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a></li></ul>');
	

	if (! post_password_required() && comments_open()) {
		echo '<ul class="blog_post_comment"><li><i class="fa fa-comment"></i></li><li>';
		comments_popup_link( esc_html__( '0 comment', 'tf-construction' ), esc_html__( '1 Comment', 'tf-construction' ), esc_html__( '% Comments', 'tf-construction' ) );
		echo '</li></ul>';
	}

	$byline = sprintf('<li>'.__('by', 'tf-construction').'<i class="fa fa-user icon"></i></li> <li><span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a> </span></li>');

	echo '<ul class="blog_post_date posted-on">' . $posted_on . '</ul> <ul class="blog_post_author byline"> ' . $byline . '</ul>'; // WPCS: XSS OK.
	
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'tf-construction' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<ul class="blog_post_edit edit-link"><li><i class="fa fa-pencil icon"></i>',
		'</li></ul>'
	);
	
}
endif;

if ( ! function_exists( 'tf_construction_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function tf_construction_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( ' <li>', '</li> &nbsp; <li>', '<li> ');
		if ( $tags_list ) {
			printf( '<ul class="blog_post_category tags-links"> <li> <i class="fa fa-tags"></i> </li> ' . esc_html('%1$s') . ' </ul>', $tags_list ); // WPCS: XSS OK.
		}
		
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( ' </li> &nbsp; <li> ' );
		if ( $categories_list && tf_construction_categorized_blog() ) {
			printf( '<ul class="blog_post_tags cat-links"> <li><i class="fa fa-thumb-tack"></i></li><li> ' . esc_html('%1$s') . ' </li></ul><div class="clearfix"></div>', $categories_list ); // WPCS: XSS OK.
		}

	}
	
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function tf_construction_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'tf_construction_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'tf_construction_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so tf_construction_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so tf_construction_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in tf_construction_categorized_blog.
 */
function tf_construction_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'tf_construction_categories' );
}
add_action( 'edit_category', 'tf_construction_category_transient_flusher' );
add_action( 'save_post',     'tf_construction_category_transient_flusher' );
