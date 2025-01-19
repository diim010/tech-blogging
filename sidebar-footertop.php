<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tech Blogging
 */
if ( ! is_active_sidebar( 'footer-top' ) ) {
	return;
}
?>
<aside id="footertop" class="footertop-area-widget-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php dynamic_sidebar( 'footer-top' ); ?>
			</div>
		</div>
	</div>
</aside><!-- #secondary -->
