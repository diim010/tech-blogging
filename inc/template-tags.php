<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Tech Blogging
 */
if ( ! function_exists( 'tech_blogging_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function tech_blogging_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}
		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);
		$timeIcon = '%1$s';
		$posted_on = sprintf(
			$timeIcon,
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);
		echo '<span class="posted-on"><i class="fa fa-clock-o"></i>&nbsp;' . $posted_on . '</span>'; // WPCS: XSS OK.
	}
endif;
if ( ! function_exists( 'tech_blogging_time' ) ) {
	function tech_blogging_time() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}
		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);
		echo '<i class="blog-time">' . wp_kses_post( $time_string ) . '</i>';
	}
}
if ( ! function_exists( 'tech_blogging_posted_by' ) ) :
	function tech_blogging_posted_by( $author_image = true ) {
		$posted_by_format = '<a href="%1$s">%2$s %3$s</a>';
		$post_author_id   = get_post_field( 'post_author', get_queried_object_id() );
		$get_author_image = '<span class="post-author-image"> ' . get_avatar( get_the_author_meta( 'ID' ), 30 ) . '</span> ';
		if ( false === $author_image ) {
			$get_author_image = __( 'Posted by', 'tech-blogging' );
		}
		$postedBy = sprintf(
			$posted_by_format,
			esc_url( get_author_posts_url( get_the_author_meta( $post_author_id ), get_the_author_meta( 'user_nicename' ) ) ),
			$get_author_image,
			'<i>' . esc_html( get_the_author_meta( 'display_name', $post_author_id ) ) . '</i>'
		);
		echo '<span class="posted_by">' . wp_kses_post( $postedBy ) . '</span>';
	}
endif;
if ( ! function_exists( 'tech_blogging_comment_popuplink' ) ) {
	function tech_blogging_comment_popuplink() {
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			// $commentIcon = ;
			echo '<span class="comments-link"><i class="fa fa-comments-o" aria-hidden="true"></i>';
			$css_class = 'zero-comments';
			$number    = (int) get_comments_number( get_the_ID() );
			if ( 1 === $number ) {
				$css_class = 'one-comment';
			} elseif ( 1 < $number ) {
				$css_class = 'multiple-comments';
			}
			comments_popup_link(
				__( 'Post a Comment', 'tech-blogging' ),
				__( '1 Comment', 'tech-blogging' ),
				__( '% Comments', 'tech-blogging' ),
				$css_class,
				__( 'Comments are Closed', 'tech-blogging' )
			);
			echo '</span>';
		}
	}
}
function tech_blogging_categories() {
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( ' ' );
		if ( $categories_list ) {
			printf( '<span class="cat-links">' . '%1$s' . '</span>', $categories_list ); // WPCS: XSS OK.
		}
	}
	return;
}
if ( ! function_exists( 'tech_blogging_post_tag' ) ) {
	function tech_blogging_post_tag() {
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'tech-blogging' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'tech-blogging' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}
		return;
	}
}
if ( ! function_exists( 'tech_blogging_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function tech_blogging_post_thumbnail() {
		$get_blog_layout = get_theme_mod( 'blog_layout', 'grid' );
		$thumbnail_size  = 'tech-blogging-grid-thumbnail';
		if ( is_single() || is_page() ) {
			$thumbnail_size = 'tech-blogging-thumbnail-large';
		} else {
			if ( 'list' === $get_blog_layout ) {
				$thumbnail_size = 'tech-blogging-thumbnail-large';
			} elseif ( 'grid' === $get_blog_layout ) {
				$thumbnail_size = 'tech-blogging-grid-thumbnail';
			}
		}
		$post_thumnail = wp_get_attachment_image_url( get_post_thumbnail_id( get_the_ID() ), $thumbnail_size );
		if ( is_single() || is_page() ) {
			 the_post_thumbnail( $thumbnail_size );
		} else {
			if ( has_post_thumbnail() ) :
				?>
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( $thumbnail_size ); ?>
				</a>
				<?php
			elseif ( $post_thumnail ) :
				echo '<a href="' . esc_url( get_the_permalink() ) . '"><img src="' . esc_url( $post_thumnail ) . '" alt=""></a>';
			endif;
		}
	}
endif;
function tech_blogging_social_activity() {
	$facebook    = get_theme_mod( 'facebook' );
	$twitter     = get_theme_mod( 'twitter' );
	$amazon      = get_theme_mod( 'amazon' );
	$pinterest   = get_theme_mod( 'pinterest' );
	$youtube     = get_theme_mod( 'youtube' );
	$instagram   = get_theme_mod( 'instagram' );
	$github      = get_theme_mod( 'github' );
	$stumbleupon = get_theme_mod( 'stumbleupon' );
	$tumblr      = get_theme_mod( 'tumblr' );
	$whatsapp    = get_theme_mod( 'whatsapp' );
	$weixin      = get_theme_mod( 'weixin' );
	$snapchat    = get_theme_mod( 'snapchat' );
	$qq          = get_theme_mod( 'qq' );
	$reddit      = get_theme_mod( 'reddit' );
	$linkedin    = get_theme_mod( 'linkedin' );
	if ( ! empty( $facebook ) ) :
		?>
		<div class="social__wrap">
			<a href="<?php echo esc_url( $facebook ); ?>" class="fa fa-facebook"></a>
			<?php endif; if ( ! empty( $twitter ) ) : ?>
			<a href="<?php echo esc_url( $twitter ); ?>" class="fa fa-twitter"></a>
			<?php endif; if ( ! empty( $amazon ) ) : ?>
			<a href="<?php echo esc_url( $amazon ); ?>" class="fa fa-amazon"></a>
			<?php endif; if ( ! empty( $pinterest ) ) : ?>
			<a href="<?php echo esc_url( $pinterest ); ?>" class="fa fa-pinterest"></a>
			<?php endif; if ( ! empty( $youtube ) ) : ?>
			<a href="<?php echo esc_url( $youtube ); ?>" class="fa fa-youtube"></a>
			<?php endif; if ( ! empty( $linkedin ) ) : ?>
			<a href="<?php echo esc_url( $linkedin ); ?>" class="fa fa-linkedin"></a>
			<?php endif; if ( ! empty( $instagram ) ) : ?>
			<a href="<?php echo esc_url( $instagram ); ?>" class="fa fa-instagram"></a>
			<?php endif; if ( ! empty( $github ) ) : ?>
			<a href="<?php echo esc_url( $github ); ?>" class="fa fa-github"></a>
			<?php endif; if ( ! empty( $stumbleupon ) ) : ?>
			<a href="<?php echo esc_url( $stumbleupon ); ?>" class="fa fa-stumbleupon"></a>
			<?php endif; if ( ! empty( $tumblr ) ) : ?>
			<a href="<?php echo esc_url( $tumblr ); ?>" class="fa fa-tumblr"></a>
			<?php endif; if ( ! empty( $whatsapp ) ) : ?>
			<a href="<?php echo esc_url( $whatsapp ); ?>" class="fa fa-whatsapp"></a>
			<?php endif; if ( ! empty( $weixin ) ) : ?>
			<a href="<?php echo esc_url( $weixin ); ?>" class="fa fa-weixin"></a>
			<?php endif; if ( ! empty( $snapchat ) ) : ?>
			<a href="<?php echo esc_url( $snapchat ); ?>" class="fa fa-snapchat"></a>
			<?php endif; if ( ! empty( $qq ) ) : ?>
			<a href="<?php echo esc_url( $qq ); ?>" class="fa fa-qq"></a>
			<?php endif; if ( ! empty( $reddit ) ) : ?>
			<a href="<?php echo esc_url( $reddit ); ?>" class="fa fa-reddit"></a>
		</div>
			<?php
		endif;
}
function tech_blogging_navigation() {
	$next_icon            = '<i class="fa fa-angle-right" aria-hidden="true"></i>';
	$prev_icon            = '<i class="fa fa-angle-left" aria-hidden="true"></i>';
	$pagination_alignment = get_theme_mod( 'blog_page_pagination', 'center' );
	echo '<div class="pagination-' . esc_attr( $pagination_alignment ) . '">';
		the_posts_pagination(
			array(
				'mid_size'  => 2,
				'prev_text' => $prev_icon,
				'next_text' => $next_icon,
			)
		);
	echo '</div>';
}
