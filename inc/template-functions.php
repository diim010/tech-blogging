<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Tech Blogging
 */
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function tech_blogging_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	$classes[]             = 'preloader-wrapper';
	$get_border_box_shadow = get_theme_mod( 'border_box_shadow_show_hide', true );
	if ( false == $get_border_box_shadow ) {
		$classes[] = 'border_and_box_shadow_hide';
	}
	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}
	return $classes;
}
add_filter( 'body_class', 'tech_blogging_body_classes' );
/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function tech_blogging_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'tech_blogging_pingback_header' );
if ( ! function_exists( 'tech_blogging_comment_list' ) ) :
	/**
	 * Template for comments and pingbacks.
	 *
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 *
	 * @since Shape 1.0
	 */
	function tech_blogging_comment_list( $comment, $args, $depth ) {
		extract( $args, EXTR_SKIP );
		if ( 'div' == $args['style'] ) {
			$tag       = 'div';
			$add_below = 'comment';
		} else {
			$tag       = 'li';
			$add_below = 'div-comment';
		}
		?>
  <<?php echo esc_attr( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID(); ?>">
		<?php if ( 'div' == $args['style'] ) : ?>
  <div id="div-comment-<?php comment_ID(); ?>" class="comment-body review-list">
	<?php endif; ?>
	<div class="single-comment">
		<div class="commenter-image">
			<?php
			if ( 0 != $args['avatar_size'] ) {
				echo get_avatar( $comment, $args['avatar_size'] );}
			?>
		</div>
		<div class="commnenter-details">
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php esc_html_e( 'Your comment is awaiting moderation.', 'tech-blogging' ); ?></em>
			<br />
		<?php endif; ?>
			<div class="comment-meta">
				<h4><?php printf( wp_kses_post( '%s', 'tech-blogging' ), sprintf( '%s', get_comment_author_link() ) ); ?></h4>
				<div class="comment-time">
					<p>
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php
								echo esc_html( get_comment_date() . ' ' );
								echo esc_html( get_comment_time() );
							?>
						</time>
					</p>
				</div>
			</div>
				<?php comment_text(); ?>
				<?php
				comment_reply_link(
					array_merge(
						$args,
						array(
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'before'    => '<div class="reply">',
							'after'     => '</div>',
						)
					)
				);
				?>
		</div>
	</div>
		<?php if ( 'div' == $args['style'] ) : ?>
  </div>
			<?php
  endif;
	}
endif; // ends check for tech_blogging_comment_list();
/**
 * tech_blogging Breadcrumbs
 */
if ( ! function_exists( 'tech_blogging_bredcrumbs' ) ) {
	function tech_blogging_bredcrumbs() {
		?>
		<nav>
			<div class="breadcrumb">
				<?php
				if ( function_exists( 'yoast_breadcrumb' ) ) {
					yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
				}
				?>
			</div>
		</nav>
		<?php
	}
}
/**
 * Author VCard
 */
function tech_blogging_author_vcard() {
	?>
	<div class="author-vcard">
		<div class="author-vcard__image">
			<?php
			echo get_avatar( get_the_author_meta( 'ID' ), 100, '', '', null );
			?>
		</div>
		<div class="author-vcard__about">
			<h4><?php echo esc_html( get_the_author_meta( 'nickname' ) ); ?></h4>
			<p><?php echo wp_kses_post( get_the_author_meta( 'description' ) ); ?></p>
			<p>
			<?php
			$userpost_count = count_user_posts( get_the_author_meta( 'ID' ), 'post', false );
			if ( $userpost_count > 1 ) {
				$numberingtext = 'posts';
			} else {
				$numberingtext = 'post';
			}
			$userposts = esc_html__( 'the user has only %1$s %2$s', 'tech-blogging' );
			printf( $userposts, $userpost_count, $numberingtext );
			?>
			 </p>
		</div>
	</div>
	<?php
	return;
}


function tech_blogging_before_default_page_markup() {
	$getblogsidebar = get_theme_mod( 'blog_page_sidebar', 'no' );
	$blogcontent    = 'col-md-12';
	if ( $getblogsidebar === 'right' ) {
		$blogcontent = 'col-md-7 col-lg-8 order-0';
	} elseif ( $getblogsidebar === 'left' ) {
		$blogcontent = 'col-md-7 col-lg-8 order-1';
	} elseif ( $getblogsidebar === 'no' ) {
		$blogcontent = 'col-md-12';
	} else {
		$blogcontent = 'col-md-12';
	}
	?>
		<div class="blog-post-section">
			<div class="container">
				<div class="row">
					<div class="<?php echo esc_attr( $blogcontent ); ?>">
	<?php
}
add_action( 'tech_blogging_before_default_page', 'tech_blogging_before_default_page_markup' );
function tech_blogging_after_default_page_markup() {
	$getblogsidebar = get_theme_mod( 'blog_page_sidebar', 'no' );
	$blogsidebar    = 'col-md-5 col-lg-4 order-1 pl-xl-5';
	$sidebarshow    = true;
	if ( $getblogsidebar === 'right' ) {
		$blogsidebar = 'col-md-5 col-lg-4 order-1 pl-xl-5';
		$sidebarshow = true;
	} elseif ( $getblogsidebar === 'left' ) {
		$blogsidebar = 'col-md-5 col-lg-4 order-0 pl-xl-5';
		$sidebarshow = true;
	} elseif ( $getblogsidebar === 'no' ) {
		$blogsidebar = 'sidebar-hide';
		$sidebarshow = false;
	} else {
		$blogsidebar = 'col-md-5 col-lg-4 order-1 pl-xl-5';
	}
	?>
					 </div>
					<?php if ( $sidebarshow === true ) : ?>
						<div class="<?php echo esc_attr( $blogsidebar ); ?>">
							<?php get_sidebar(); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php
}
add_action( 'tech_blogging_after_default_page', 'tech_blogging_after_default_page_markup' );

function tech_blogging_author(){
	$themeData = wp_get_theme();
	return $authorURI = $themeData->get( 'Author' );
}

function tech_blogging_author_uri(){
	$themeData = wp_get_theme();
	return $authorURI = $themeData->get( 'AuthorURI' );
}


function tech_blogging_utm_url($medium){
    $rawUrl = sprintf(
        'https://rswpthemes.com/shofy-premium-multipurpose-woocommerce-theme//?utm_source=free_theme&utm_medium=%s&utm_campaign=tech_blogging',
        rawurlencode($medium)
    );
    return $rawUrl;
}
