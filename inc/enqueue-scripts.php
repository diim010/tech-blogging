<?php
/**
 * Enqueue scripts and styles.
 */
function tech_blogging_scripts() {
	wp_enqueue_style( 'tech-blogging-style', get_stylesheet_uri() );
	// Fonts
	$default_fonts = array(
		'body_font'   => 'Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900',
		'header_font' => 'system-ui:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
	);
	$tech_blogging_body_font = esc_html( get_theme_mod( 'tech_blogging_body_fonts', $default_fonts['body_font'] ) );
	$tech_blogging_heading_fonts = esc_html( get_theme_mod( 'tech_blogging_heading_fonts', $default_fonts['header_font'] ) );
	$body_font_size = esc_html( get_theme_mod( 'tech_blogging_body_fonts_size', 16 ) );
	$body_font_weight = esc_html( get_theme_mod( 'tech_blogging_body_fonts_weight', 400 ) );
	$body_font_line_height = esc_html( get_theme_mod( 'tech_blogging_body_fonts_line_height', 28 ) );
	$get_fonts_families = array();
	if ( $tech_blogging_body_font ) {
		$get_fonts_families[] = $tech_blogging_body_font;
	}
	if ( $tech_blogging_heading_fonts ) {
		$get_fonts_families[] = $tech_blogging_heading_fonts;
	}
	$font_families = implode( '|', $get_fonts_families );
	if ( $font_families ) {
		wp_enqueue_style( 'tech-blogging-body-fonts', '//fonts.googleapis.com/css?family=' . $font_families );
	} else {
		wp_enqueue_style( 'tech-blogging-source-body', '//fonts.googleapis.com/css?family=' . $font_families );
	}
	$body_font_pieces = $default_fonts['body_font'];
	if ( $tech_blogging_body_font ) {
		$body_font_pieces = explode( ':', $tech_blogging_body_font );
		$body_font_pieces = str_replace( '+', ' ', $body_font_pieces );
	}
	$heading_font_pieces = $default_fonts['header_font'];
	if ( $tech_blogging_heading_fonts ) {
		$heading_font_pieces = explode( ':', $tech_blogging_heading_fonts );
		$heading_font_pieces = str_replace( '+', ' ', $heading_font_pieces );
	}
	// Output all the style
	$primarycolor = sanitize_hex_color( get_theme_mod( 'primary_color', 'linear-gradient(45deg,#5cc3ee 0,#5d91ef 29%,#5e5ef0 50%,#947be1 73%,#ca97d2 100%)' ) );
	$tech_blogging_colors = array(
		'primary_color'              => get_theme_mod( 'primary_color', 'linear-gradient(45deg,#5cc3ee 0,#5d91ef 29%,#5e5ef0 50%,#947be1 73%,#ca97d2 100%)' ),
		'footer_bg_color'            => get_theme_mod( 'footer_background_color', '#1a1a1a' ),
		'header_bg_color'            => get_theme_mod( 'header_bg_color', '#ffffff' ),
		'title_color'                => get_theme_mod( 'tech_blogging_title_color', '#000000' ),
		'desc_color'                 => get_theme_mod( 'tech_blogging_paragraph_color', '#979797' ),
		'button_bg_color'            => get_theme_mod( 'button_bg_color', 'linear-gradient(45deg,#5cc3ee 0,#5d91ef 29%,#5e5ef0 50%,#947be1 73%,#ca97d2 100%)' ),
		'button_text_color'          => get_theme_mod( 'button_text_color', '#ffffff' ),
		'copyright_top_br_color'     => get_theme_mod( 'copyright_top_br_color', '#262626' ),
		'copyright_text_color'       => get_theme_mod( 'copyright_text_color', '#ffffff' ),
		'copyright_link_color'       => get_theme_mod( 'copyright_link_color', '#ab9595' ),
		'copyright_link_hover_color' => get_theme_mod( 'copyright_link_hover_color', 'linear-gradient(45deg,#5cc3ee 0,#5d91ef 29%,#5e5ef0 50%,#947be1 73%,#ca97d2 100%)' ),
	);
	$data = '
	footer#colophon{
		background: ' . sanitize_hex_color( $tech_blogging_colors['footer_bg_color'] ) . ';
	}

	.book-text h2{
		color: ' . sanitize_hex_color( $tech_blogging_colors['title_color'] ) . ';
	}
	
	#masthead{
		background: ' . sanitize_hex_color( $tech_blogging_colors['header_bg_color'] ) . ';
	}
	
	.book-btn {
		background: ' . sanitize_hex_color( $tech_blogging_colors['button_bg_color'] ) . '!important;
		color: ' . sanitize_hex_color( $tech_blogging_colors['button_text_color'] ) . '!important;
		}
	.book-text p{
		color: ' . sanitize_hex_color( $tech_blogging_colors['desc_color'] ) . ';
	}
	a.btn.default-btn-style{
		background: ' . sanitize_hex_color( $tech_blogging_colors['button_bg_color'] ) . ';
	}
	a.btn.default-btn-style{
		color: ' . sanitize_hex_color( $tech_blogging_colors['button_text_color'] ) . ';
	}
	footer#colophon{
		border-top-color: ' . sanitize_hex_color( $tech_blogging_colors['copyright_top_br_color'] ) . ';
	}
	.site-info{
		color: ' . sanitize_hex_color( $tech_blogging_colors['copyright_text_color'] ) . ';
	}
	.copyright-menu ul li a, .site-info a, .social-link-bottom a{
		color: ' . sanitize_hex_color( $tech_blogging_colors['copyright_link_color'] ) . ';
	}
	.copyright-menu ul li a:hover, .site-info a:hover, .social-link-bottom a:hover{
		color: ' . sanitize_hex_color( $tech_blogging_colors['copyright_link_hover_color'] ) . ';
	}
	@media only screen and (min-width: 768px) {
		#cssmenu>ul>li>a:hover,#cssmenu>ul>li.current_page_item>a, #cssmenu>ul>li>a:hover:after, #cssmenu>ul>li.current-menu-item>a:hover:after, #cssmenu>ul>li.current_page_item>a:hover:after, #cssmenu ul ul li a:hover{
	    	color: ' . sanitize_hex_color( $tech_blogging_colors['primary_color'] ) . ' !important;
		}
		.menu-area.yellowbg #cssmenu>ul>li>a:hover,.menu-area.yellowbg #cssmenu>ul>li.current_page_item>a, .menu-area.yellowbg #cssmenu>ul>li>a:hover:after, .menu-area.yellowbg #cssmenu>ul>li.current-menu-item>a:hover:after,.menu-area.yellowbg #cssmenu>ul>li.current_page_item>a:hover:after{
	    	color: #242323 !important;
		}
	}
       a.btn.default-btn-style,.readmore a,.btn.btn-warning, input[type="submit"], button[type="submit"], span.edit-link a, .comment-form button.btn.btn-primary, .banner-button a, table#wp-calendar #today, ul.pagination li .page-numbers, .woocommerce ul.products li.product .button:hover, .woocommerce div.product .woocommerce-tabs ul.tabs li.active, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span, .woocommerce span.onsale, .header-three-search .search-popup>div, .mini-shopping-cart-inner #minicarcount, .active-subfeatured-slider .owl-nav button.owl-next,.active-subfeatured-slider .owl-nav button.owl-prev, .featured-main-slider .owl-nav button.owl-prev, .featured-main-slider .owl-nav button.owl-next, .related-post-sldider .owl-nav button.owl-next, .related-post-sldider .owl-nav button.owl-prev, .sticky:before, .post-gallery .owl-nav button.owl-next, .post-gallery .owl-nav button.owl-prev, .scrooltotop a:hover, .tech-blogging-standard-post__posted-date .posted-on a, .page-numbers li a, .page-numbers li span, .tech-blogging-single-page .entry-footer a, .tech-blogging-standard-post__readmore a, .single-post-navigation .postarrow, .widget .tagcloud a, ul.recent-post-widget li .recent-widget-content .cat-links a, .featured-slider-area .featured-slider__category a, .header-three .menu-area.yellowbg, .social-link-top a:hover, .tech-blogging-standard-post__blog-meta .cat-links a, .post_categories_on_thumbnail .cat-links a, .tech-blogging-standard-post__tags span.tags-links a, .header-three .social-link-top a.searchicon, .header-three .social-link-top a:hover{
		background: ' . sanitize_hex_color( $tech_blogging_colors['primary_color'] ) . ';
	}
		a,.required,.blog-meta ul li span.fa, .static_icon a, #cssmenu.light ul li a:hover, .footer-menu ul li a:hover, #cssmenu.light ul li a:hover:after, a:hover, a:focus, a:active, .post-title a:hover h2, .post-title a:hover h4, #cssmenu.light li.current_page_item a, li.current_page_item a, .author-social-link a, .post-title a:hover h3, .woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price, .tech-blogging-standard-post__categories > span.cat-links a, .page-banner-area .breadcrumb a, .tech-blogging-standard-post.sticky:before, .tech-blogging-standard-post__blog-meta .fa, .featured-area .tech-blogging-featured-slider__post-title a:hover h2, .featured-area .tech-blogging-featured-slider__categories > span.cat-links a, .comments-area ol.comment-list .single-comment .reply a:hover, .tech-blogging-standard-post__blog-meta>span .fa, .widget ul li a:hover, .widget ul li a:visited, .widget ul li a:focus, .widget ul li a:active, .widget ol li a:hover, .widget ol li a:visited, .widget ol li a:focus, .widget ol li a:active, ul.recent-post-widget li .recent-widget-content .posted_by a, .featured-slider-area .featured-slider__post-meta .posted_by a span, .featured-slider-area .featured-slider__post-meta span.posted-on i.fa, header.archive-page-header span{
		color: ' . sanitize_hex_color( $tech_blogging_colors['primary_color'] ) . ';
	}
	.tech-blogging-standard-post__post-title a h2, .tech-blogging-standard-post__post-title a h3, li.tech-blogging-recent-post.no-post-thumbnail .recent-widget-content a h5.rct-news-title{
		background: linear-gradient(to right, ' . sanitize_hex_color( $tech_blogging_colors['primary_color'] ) . ' 0%, ' . sanitize_hex_color( $tech_blogging_colors['primary_color'] ) . ' 100%);
    	background-size: 0px 3px;
    	background-repeat: no-repeat;
	    background-position: left 87%;
	    display: inline;
	}
	input[type="submit"], button[type="submit"], .title-parent, .wp-block-quote, .widget_search input:focus{
		border-color: ' . sanitize_hex_color( $tech_blogging_colors['primary_color'] ) . ';
	}
	#cssmenu ul ul{
		border-top-color: ' . sanitize_hex_color( $tech_blogging_colors['primary_color'] ) . ';
	}
	body, button, input, select, textarea {
		font-family: ' . $body_font_pieces[0] . ';
		font-size: ' . $body_font_size . 'px;
		font-weight: ' . $body_font_weight . ';
		line-height: ' . $body_font_line_height . 'px;
	}
	h1, h2, h3, h4, h5, h6{
		font-family: ' . $heading_font_pieces['0'] . ', sans-serif;
	}
	';
	$stickyheader = get_theme_mod( 'sticky_header', false );
	if ( true == $stickyheader ) {
		$data .= '
			.menu-area.sticky-menu {
			    background: #fff;
			    position: fixed;
			    width: 100%;
			    left: 0;
			    top: 0;
			    z-index: 55;
			    transition: .6s;
			    margin: 0;
			}
			.site.boxlayout .menu-area.sticky-menu {
			    width: calc(100% - 200px);
			    left: 100px;
			}
		';
	}
	wp_add_inline_style( 'tech-blogging-style', $data );
	wp_enqueue_script( 'masonry' );
	wp_enqueue_script( 'imagesloaded.pkgd', esc_url( get_template_directory_uri() ) . '/assets/js/imagesloaded.pkgd.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'tech-blogging-menu', esc_url( get_template_directory_uri() ) . '/assets/js/menu.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'owl-carousel', esc_url( get_template_directory_uri() ) . '/assets/js/owl.carousel.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'tech-blogging-active', esc_url( get_template_directory_uri() ) . '/assets/js/active.js', array( 'jquery' ), '1.0', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tech_blogging_scripts' );
