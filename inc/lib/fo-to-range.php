<?php
/**
 * Build Fonts List, Toggle, Range Slide
 * Note: Types select for fonts, toggle, range-input
 * @package dblogger
 */
 
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
if ( ! class_exists( 'Customizer_Library' ) ) :
	// Helper functions for fonts.
	require plugin_dir_path( __FILE__ ) . 'fonts.php';
	class Customizer_Library {
		private static $instance;
		public $options = array();
		public static function instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}
		public function add_options( $options = array() ) {
			$this->options = array_merge( $options, $this->options );
		}
		public function get_options() {
			return $this->options;
		}
	}
endif;
 
class Customizer_Toggle_Control extends WP_Customize_Control {
	public $type = 'toggle';
	public function enqueue() {
		wp_enqueue_script( 'customizer-toggle-control', get_stylesheet_directory_uri() . '/inc/assets/customizer-toggle-control.js', array( 'jquery' ), rand(), true );
		wp_enqueue_style( 'pure-css-toggle-buttons', get_stylesheet_directory_uri() . '/inc/assets/pure-css-togle-buttons.css', array(), rand() );			
		$css = '.disabled-control-title {color: #a0a5aa;}
				input[type=checkbox].tgl-light:checked + .tgl-btn {background: #0085ba;}
				input[type=checkbox].tgl-light + .tgl-btn {background: #a0a5aa;}
				input[type=checkbox].tgl-light + .tgl-btn:after {background: #f7f7f7;}
				input[type=checkbox].tgl-ios:checked + .tgl-btn {background: #0085ba;}
				input[type=checkbox].tgl-flat:checked + .tgl-btn {border: 4px solid #0085ba;}
				input[type=checkbox].tgl-flat:checked + .tgl-btn:after {background: #0085ba;}
		';
		wp_add_inline_style( 'pure-css-toggle-buttons' , $css );
	}

	public function render_content() {
		?>
		<label>
			<div style="display:flex;flex-direction: row;justify-content: flex-start;">
				<span class="customize-control-title" style="flex: 2 0 0; vertical-align: middle;"><?php echo esc_html( $this->label ); ?></span>
				<input id="cb<?php echo esc_attr( $this->instance_number ) ?>" type="checkbox" class="tgl tgl-<?php echo esc_attr( $this->type )?>" value="<?php echo esc_attr( $this->value() ); ?>" <?php esc_attr( $this->link() ); esc_attr( checked( $this->value() ) ); ?> />
				<label for="cb<?php echo esc_attr( $this->instance_number ) ?>" class="tgl-btn"></label>
			</div>
			<?php if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php endif; ?>
		</label>
		<?php
	}
}

    class Customizer_Range_Value_Control extends WP_Customize_Control {
		public $type = 'range-input';
		public function enqueue() {
			wp_enqueue_script( 'customizer-range-value-control', get_stylesheet_directory_uri() . '/inc/assets/customizer-range-value-control.js', array( 'jquery' ), rand(), true );
			wp_enqueue_style( 'customizer-range-value-control', get_stylesheet_directory_uri() . '/inc/assets/customizer-range-value-control.css', array(), rand() );
		}

		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<div class="range-slider"  style="width:100%; display:flex;flex-direction: row;justify-content: flex-start;">
					<span  style="width:100%; flex: 1 0 0; vertical-align: middle;"><input class="range-slider__range" type="range" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->input_attrs(); $this->link(); ?>>
					<span class="range-slider__value">0</span></span>
				</div>
				<?php if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php endif; ?>
			</label>
			<?php
		}
	}