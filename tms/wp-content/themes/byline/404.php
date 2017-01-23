<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Byline
 * @since Byline 1.0
 */
get_header(); ?>

	<div id="primary">
		<article id="post-0" class="post error404 not-found big-header">
	    	<header style="background-image: url(<?php echo esc_url( get_header_image() ); ?>)">
				<div class="header-meta">
					<div class="container">
						<h1 class="entry-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'byline' ); ?></h1>
						<div class="archive-meta"><?php _e( 'It looks like nothing was found at this location. Perhaps try a search?', 'byline' ); ?></div>
					</div>
				</div>
	        </header>

	        <div class="entry-content">
				<i class="fa fa-frown-o"></i>
	        </div>
	    </article>
	</div>

<?php get_footer(); ?>