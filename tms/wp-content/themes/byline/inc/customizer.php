<?php
/**
 * The Customizer.
 *
 * @package Byline
 * @since Byline 1.0
 */
function byline_default_theme_options() {
	//delete_option( 'theme_mods_byline' );
	return array(
		'byline_text' => __( 'Written by', 'byline' ),
		'read_more_text' => __( 'Continue reading', 'byline' ),
		'display_author_id' => '',
	);
}

if ( class_exists( 'WP_Customize_Control' ) ) {
	class Byline_Reset_Control extends WP_Customize_Control {
		public function render_content() {
			echo '<p class="customizer-section-intro">' . $this->description . '</p>';

			echo '<button type="button" class="button" id="abc-reset-theme-options">' . __( 'Reset', 'byline' ) . '</button>';
		}
	}

	if ( ! function_exists( 'abc_premium_features' ) ) {
		class Byline_Customize_Section_Pro extends WP_Customize_Section {
			public $type = 'premium-upgrade';
			public $pro_url = '';

			public function json() {
				$json = parent::json();
				$json['pro_url']  = esc_url( $this->pro_url );
				return $json;
			}

			protected function render_template() { ?>

				<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand premium-upgrade">

					<h3 class="accordion-section-title">
						<a href="{{ data.pro_url }}" target="_blank">{{ data.title }}

						<span class="dashicons dashicons-arrow-right-alt"></span></a>
					</h3>
				</li>
			<?php }
		}
	}
}

class Byline_Customizer {
	public function __construct() {
		add_action( 'init', array( $this, 'init' ) );
		add_action( 'customize_register', array( $this, 'customize_register' ), 99 );
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'customize_controls_enqueue_scripts' ) );
		add_action( 'customize_preview_init', array( $this, 'customize_preview_init' ) );
	}

	static public function init() {
    	if ( current_user_can( 'edit_theme_options' ) ) {
	        if ( isset( $_REQUEST['abc-reset'] ) ) {
		    	if ( ! wp_verify_nonce( $_REQUEST['abc-reset'], 'abc-customizer' ) ) {
		        	return;
		        }

				remove_theme_mods();
				wp_redirect( esc_url( admin_url( 'customize.php' ) ) );
            }
    	}
    }

	public function customize_preview_init() {
	    wp_enqueue_script( 'byline-customize-preview', BYLINE_THEME_URL . '/js/admin/customize-preview.js', array( 'jquery', 'customize-preview' ), '', true );
	}

	public function customize_register( $wp_customize ) {
		$byline_default_theme_options = byline_default_theme_options();

		## Layout section
		$wp_customize->add_section( 'abc_layout', array(
			'title' => __( 'Layout', 'byline' ),
			'priority' => 22,
		) );
		// setting
		$wp_customize->add_setting( 'byline_text', array(
			'default' => $byline_default_theme_options['byline_text'],
			'transport' => 'postMessage',
			'sanitize_callback' => 'byline_sanitize_text',
		) );
		// control
		$wp_customize->add_control( 'byline_text', array(
			'label'    => __( 'Byline text', 'byline' ),
			'section'  => 'abc_layout',
			'priority' => 1,
			'type'     => 'text'
		) );
		// setting
		$wp_customize->add_setting( 'read_more_text', array(
			'default' => $byline_default_theme_options['read_more_text'],
			'transport' => 'postMessage',
			'sanitize_callback' => 'byline_sanitize_text',
		) );
		// control
		$wp_customize->add_control( 'read_more_text', array(
			'label'    => __( 'Read More text', 'byline' ),
			'section'  => 'abc_layout',
			'priority' => 2,
			'type'     => 'text'
		) );
		// setting
		$wp_customize->add_setting( 'display_author_id', array(
			'default' => $byline_default_theme_options['display_author_id'],
			'sanitize_callback' => 'absint',
		) );
		// control
		$wp_customize->add_control( 'display_author_id', array(
			'label' => __( 'Select Author', 'byline' ),
			'section' => 'abc_layout',
			'priority' => 3,
			'description' => __( 'Add an author ID to display their avatar and info in the sidebar.', 'byline' ),
			'type' => 'text',
		) );

		## Reset section
		$wp_customize->add_section( 'abc_reset', array(
			'title' => __( 'Reset', 'byline' ),
			'priority' => 999,
		) );
		// setting
		$wp_customize->add_setting( 'reset_theme_options', array(
			'sanitize_callback' => 'absint',
		) );
		// control
		$wp_customize->add_control( new Byline_Reset_Control(
			$wp_customize, 'reset_theme_options', array(
				'section' => 'abc_reset',
				'priority' => 1,
				'description' => __( 'Click on the button below to reset all theme options back to default.', 'byline' ),
			)
		) );

		// Don't display upgrade message if ABC Premium Features plugin is activated
		if ( ! function_exists( 'abc_premium_features' ) ) {
			$wp_customize->register_section_type( 'Byline_Customize_Section_Pro' );
			$wp_customize->add_section(
				new Byline_Customize_Section_Pro ( $wp_customize, 'premium_upgrade', array(
					'title'    => esc_html__( 'Unlock Premium Theme Options', 'byline' ),
					'pro_url'  => 'https://alphabetthemes.com/downloads/abc-premium-features/',
					'priority' => 999,
				) )
			);
		}
	}

	public function customize_controls_enqueue_scripts() {
		wp_enqueue_script( 'byline-customizer', BYLINE_THEME_URL . '/js/admin/customizer.js', array( 'jquery' ), '', true );
        wp_localize_script( 'byline-customizer', 'Byline_Customizer', array(
            'customizerURL' => admin_url( 'customize.php' ),
            'exportNonce' => wp_create_nonce( 'abc-customizer' ),
            'confirmText' => __( 'Are you sure?', 'byline' ),
        ));

		// Don't display upgrade message if ABC Premium Features plugin is activated
		if ( ! function_exists( 'abc_premium_features' ) ) {
	   		wp_enqueue_script( 'byline-upgrade', BYLINE_THEME_URL . '/js/admin/upgrade.js', array( 'jquery' ), '', true );
   		}

		wp_enqueue_style( 'byline-customizer-styles', BYLINE_THEME_URL . '/css/admin/customizer.css' );
	}
}
$byline_customizer = new Byline_Customizer;

function byline_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function byline_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}