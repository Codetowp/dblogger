<?php
/**
 * Class to display upsells.
 *
 * @package dblogger
 */
if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}

/**
 * Class dblogger_info
 */
class dblogger_info extends WP_Customize_Control {

	/**
	 * The type of customize section being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'info';

	/**
	 * Control label
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $label = '';


	/**
	 * The render function for the controler
	 */
	public function render_content() {
		$links = array(
			array(
				'name' => __( 'Documentation','dblogger' ),
				'link' => esc_url( 'https://dcrazed.com/docs/dblogger/' ),
			),
			array(
				'name' => __( 'Live Demo','dblogger' ),
				'link' => esc_url( 'http://dblogger.dcrazed.com/' ),
			),
			array(
				'name' => __( 'Go to Themepage','dblogger' ),
				'link' => esc_url( 'https://dcrazed.com/themes/dblogger/' ),
			),
		); ?>


		<div class="dblogger-theme-info">
			<?php
			foreach ( $links as $item ) {  ?>
				<a href="<?php echo esc_url( $item['link'] ); ?>" target="_blank"><?php echo esc_html( $item['name'] ); ?></a>
				<?php
			} ?>
		</div>
		<?php
	}
}
