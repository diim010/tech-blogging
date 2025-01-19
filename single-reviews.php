<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Tech Blogging
 */
get_header();
/**
 * Blog Page Sidebar Control
 */
$getblogsidebar = get_theme_mod( 'single_page_sidebar', 'right' );
$blogsidebar = 'col-md-5 col-lg-4 order-1';
$blogcontent = 'col-md-7 col-lg-8 order-0';
$sidebarshow = true;
if ( $getblogsidebar === 'right' ) {
	$blogsidebar = 'col-md-5 col-lg-4 order-1';
	$blogcontent = 'col-md-7 col-lg-8 order-0';
	$sidebarshow = true;
} elseif ( $getblogsidebar === 'left' ) {
	$blogsidebar = 'col-md-5 col-lg-4 order-0';
	$blogcontent = 'col-md-7 col-lg-8 order-1';
	$sidebarshow = true;
} elseif ( $getblogsidebar === 'no' ) {
	$blogsidebar = 'sidebar-hide';
	$blogcontent = 'col-md-12';
	$sidebarshow = false;
} else {
	$blogsidebar = 'col-md-5 col-lg-4 order-1';
	$blogcontent = 'col-md-7 col-lg-8 order-0';
}
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<div class="row">
						<div class="col-md-6">
							<?php $logo = get_field( 'logo' ); ?>
							<?php if ( $logo ) : ?>
								<img src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>" />
							<?php endif; ?>
						</div>
						<div class="col-md-6">
							<h2><?php the_field( 'name' ); ?></h2>
							<h2><?php the_field( 'bonus' ); ?></h2>
							<h2><?php the_field( 'rating' ); ?>/5</h2>
							<?php $features = get_field( 'features' ); ?>
							
							<?php if ($features): ?>
							<div class="features">
								<h2><?php _e('Features', 'tech-blogging'); ?></h2>
								<ul>
									<?php
									$features_array = array_map('trim', explode(',', $features));
									foreach ($features_array as $feature) {
										echo '<li>' . esc_html($feature) . '</li>';
									}
									?>
								</ul>
							</div>
							<?php endif; ?>
						</div>
					
					<?php if ( $sidebarshow === true ) : ?>
						<div class="<?php echo esc_attr( $blogsidebar ); ?>">
							<?php get_sidebar(); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
