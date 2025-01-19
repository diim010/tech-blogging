<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tech Blogging
 */
?>
</div><!-- #content -->
<footer id="colophon" class="site-footer">
	<div class="container">
		<div class="row">
			<div class="col-md-12 align-self-center">
				<div class="site-info text-center">
					<div class="site-copyright-text d-inline-block">
					<?php
					echo wp_kses_post( get_theme_mod('copyright_text', __( 'Copyright <i class="fa fa-copyright" aria-hidden="true"></i> 2023. All rights reserved.', 'tech-blogging' )));
					?>
					</div>
				</div><!-- .site-info -->
				<div class="theme-credit-link-wrapper text-center">
					<span class="themeby"><?php esc_html_e('Theme By: ', 'tech-blogging');?><a href="<?php echo esc_url(tech_blogging_author_uri());?>"><?php echo esc_html(tech_blogging_author());?></a></span>
				</div>
			</div>
		</div>
	</div>
</footer><!-- #colophon -->
<div class="scrooltotop">
	<a href="#" class="fa fa-angle-up"></a>
</div>
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
