<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tech Blogging
 */
$grid_column = get_theme_mod( 'grid_column', 'col-sm-4' );
if ( $grid_column === 'col-sm-6' ) {
	$grid_column = 'col-lg-6 col-md-12';
} elseif ( $grid_column === 'col-sm-4' ) {
	$grid_column = 'col-sm-12 col-md-6 col-lg-4';
} elseif ( $grid_column === 'col-sm-3' ) {
	$grid_column = 'col-sm-12 col-md-6 col-lg-3';
}
$post_classes = 'tech-blogging-standard-post';
if ( ! has_post_thumbnail() ) {
	$post_classes = 'tech-blogging-standard-post no-post-thumbnail ';
}
?>
<div class="<?php echo esc_attr( $grid_column ); ?> blog-grid-layout">
	<article id="post-<?php the_ID(); ?>" <?php post_class( $post_classes ); ?>>
		<div class="tech-blogging-standard-post__entry-content text-left">
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="tech-blogging-standard-post__thumbnail post-header">
					<?php tech_blogging_post_thumbnail(); ?>
				</div>
			<?php endif; ?>
			<div class="tech-blogging-standard-post__content-wrapper">
				<div class="tech-blogging-standard-post__blog-meta mt-0">
					<?php tech_blogging_categories(); ?>
				</div>
				<div class="tech-blogging-standard-post__post-title">
					<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
				<?php the_excerpt(); ?>
				</div>
				<div class="tech-blogging-standard-post__blog-meta">
					<?php
					tech_blogging_posted_by( true );
					tech_blogging_posted_on();
					?>
				</div>
			</div>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
</div>
