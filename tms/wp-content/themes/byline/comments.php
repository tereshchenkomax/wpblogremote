<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Byline
 * @since Byline 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<?php if ( comments_open() || have_comments() ) { ?>
	<div id="comments" class="comments-area container">
		<div class="centered centered-top">
			<?php if ( have_comments() ) : ?>
				<h2 class="comments-title">
					<?php
					printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'byline' ),
						number_format_i18n( get_comments_number() ), get_the_title() );
					?>
				</h2>

				<ol class="comment-list">
					<?php
						wp_list_comments( array(
							'style'       => 'ol',
							'short_ping'  => true,
							'avatar_size' => 56,
						) );
					?>
				</ol><!-- .comment-list -->

				<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
				<div id="comment-nav-below" role="navigation">
					<h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'byline' ); ?></h1>
					<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'byline' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'byline' ) ); ?></div>
				</div>
				<?php endif; // check for comment navigation ?>

			<?php endif; // have_comments() ?>

			<?php
				// If comments are closed and there are comments, let's leave a little note, shall we?
				if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
			?>
				<p class="no-comments"><?php _e( 'Comments are closed.', 'byline' ); ?></p>
			<?php endif; ?>

			<?php comment_form(); ?>
		</div>
	</div><!-- #comments .comments-area -->
<?php } ?>