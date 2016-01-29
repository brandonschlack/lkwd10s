<?php
/**
 * @package GoogleAnalytics\Includes
 */

/**
 * Options class.
 */
class Lkwd10s_Google_Options {

	/** @var array  */
	public $options;

	/**
	 * Holds the settings for the GA plugin and possible subplugins
	 *
	 * @var string
	 */
	public $option_name = 'lkwd10s_ga';

	/**
	 * Holds the prefix we use within the option to save settings
	 *
	 * @var string
	 */
	public $option_prefix = 'lkwd10s_general';

	/**
	 * Holds the path to the main plugin file
	 *
	 * @var string
	 */
	public $plugin_path;

	/**
	 * Holds the URL to the main plugin directory
	 *
	 * @var string
	 */
	public $plugin_url;

	/**
	 * Saving instance of it's own in this static var
	 *
	 * @var object
	 */
	private static $instance;

	/**
	 * Getting instance of this object. If instance doesn't exists it will be created.
	 *
	 * @return object|Lkwd10s_Google_Options
	 */
	public static function instance() {

		if ( is_null( self::$instance ) ) {
			self::$instance = new Lkwd10s_Google_Options();
		}

		return self::$instance;

	}

	/**
	 * Constructor for the options
	 */
	public function __construct() {
		$this->options = $this->get_options();
		$this->options = $this->check_options( $this->options );

		$this->plugin_path = plugin_dir_path( GAWP_FILE );
		$this->plugin_url  = trailingslashit( plugin_dir_url( GAWP_FILE ) );

		if ( false == $this->options ) {
			add_option( $this->option_name, $this->default_ga_values() );
			$this->options = $this->get_options();
		}

		if ( ! isset( $this->options['version'] ) || $this->options['version'] < GAWP_VERSION ) {
			$this->upgrade();
		}

		// If instance is null, create it. Prevent creating multiple instances of this class
		if ( is_null( self::$instance ) ) {
			self::$instance = $this;
		}

		add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );
	}

	/**
	 * Updates the GA option within the current option_prefix
	 *
	 * @param array $val
	 *
	 * @return bool
	 */
	public function update_option( $val ) {
		$options                         = get_option( $this->option_name );
		$options[ $this->option_prefix ] = $val;

		return update_option( $this->option_name, $options );
	}

	/**
	 * Return the Google Analytics options
	 *
	 * @return mixed|void
	 */
	public function get_options() {
		$options = get_option( $this->option_name );

		return $options[ $this->option_prefix ];
	}

	/**
	 * Check if all the options are set, to prevent a notice if debugging is enabled
	 * When we have new changes, the settings are saved to the options class
	 *
	 * @param array $options
	 *
	 * @return mixed
	 */
	public function check_options( $options ) {

		$changes = 0;
		foreach ( $this->default_ga_values() as $key => $value ) {
			if ( ! isset( $options[ $key ] ) ) {
				$options[ $key ] = $value;
				$changes ++;
			}
		}

		if ( $changes >= 1 ) {
			$this->update_option( $options );
		}

		return $options;
	}

	/**
	 * Convert a option value to a bool
	 *
	 * @param string $option_name
	 *
	 * @return bool
	 */
	public function option_value_to_bool( $option_name ) {
		$this->options = $this->get_options();

		if ( isset( $this->options[ $option_name ] ) && $this->options[ $option_name ] == 1 ) {
			return true;
		}

		return false;
	}

	/**
	 * Set the default GA settings here
	 * @return array
	 */
	public function default_ga_values() {
		$options = array(
			$this->option_prefix => array(

			)
		);
		$options = apply_filters( 'yst_ga_default-ga-values', $options, $this->option_prefix );

		return $options;
	}

	/**
	 * Load plugin textdomain
	 */
	public static function load_textdomain() {
		load_plugin_textdomain( 'google-analytics-for-wordpress', false, dirname( plugin_basename( GAWP_FILE ) ) . '/languages/' );
	}

}
