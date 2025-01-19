<?php
/**
 * tech-blogging Theme Customizer
 *
 * @package Tech Blogging
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tech_blogging_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'tech_blogging_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'tech_blogging_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'tech_blogging_customize_register' );
/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function tech_blogging_customize_partial_blogname() {
	 bloginfo( 'name' );
}
/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function tech_blogging_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function tech_blogging_customize_preview_js() {
	wp_enqueue_script( 'tech-blogging-customizer', esc_url( get_template_directory_uri() ) . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'tech_blogging_customize_preview_js' );
// Customize function.
if ( ! function_exists( 'tech_blogging_customize_name_panel_section' ) ) {
	add_action( 'customize_register', 'tech_blogging_customize_name_panel_section' );
	/**
	 *
	 * tech-blogging customize name panel section
	 */
	function tech_blogging_customize_name_panel_section( $wp_customize ) {
		/**
		 * Multiple select customize control class.
		 */
		class tech_blogging_Customize_Control_Multiple_Select extends WP_Customize_Control {
				/**
				 * The type of customize control being rendered.
				 */
				public $type = 'tech-blogging-multiple-select';
				/**
				 * Displays the multiple select on the customize screen.
				 */
			public function render_content() {
				if ( empty( $this->choices ) ) {
					return;
				}
				?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<select <?php $this->link(); ?> multiple="multiple" style="height: 100%;">
				<?php
				$i = 0;
				foreach ( $this->choices as $value => $label ) {
					$i++;
					$selected = ( in_array( $value, $this->value() ) ) ? selected( 1, 1, false ) : selected( 0, 0, true );
					echo '<option value="' . esc_attr( $value ) . '"' . $selected . '>' . $label . '</option>';
				}
				?>
				</select>
			</label>
				<?php
			}
		}
	if( ! class_exists( 'Tech_Blogging_Note_Control' ) ){

		class Tech_Blogging_Note_Control extends WP_Customize_Control {

				public function render_content(){ ?>
		    	    <span class="customize-control-title">
		    			<?php echo wp_kses_post( $this->label ); ?>
		    		</span>

		    		<?php if( $this->description ){ ?>
		    			<span class="description customize-control-description">
		    			<?php echo wp_kses_post( $this->description ); ?>
		    			</span>
		    		<?php }
		        }
			}
		}
		$wp_customize->add_panel(
			'tech-blogging',
			array(
				'priority'   => 50,
				'title'      => __( 'Theme Options', 'tech-blogging' ),
				'capability' => 'edit_theme_options',
			)
		);
		require get_theme_file_path( 'inc/themeoptions/social-option.php' );
		require get_theme_file_path( 'inc/themeoptions/banner-section.php' );
		require get_theme_file_path( 'inc/themeoptions/blogpage-option.php' );
		require get_theme_file_path( 'inc/themeoptions/color-option.php' );
		require get_theme_file_path( 'inc/themeoptions/typography-option.php' );
		require get_theme_file_path( 'inc/themeoptions/single-page.php' );
	}
}
