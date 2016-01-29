<?php
class Lkwd10s_Settings_Page
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct() {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
        add_action('admin_enqueue_scripts', array( $this, 'lkwd10s_options_enqueue_scripts' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page() {
        // This page will be under "Settings"
        add_options_page(
            'Lakewood Tennis Center', 
            'Lakewood Tennis Center', 
            'manage_options', 
            'lkwd10s-settings', 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page() {
        // Set class property
        $this->options = get_option( 'lkwd10s_options' );
        ?>
        <div class="wrap">
            <h2>Lakewood Tennis Center</h2>           
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'lkwd10s_options' );   
                do_settings_sections( 'lkwd10s-settings' );
                submit_button(); 
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init() {        
        register_setting(
            'lkwd10s_options', // Option group
            'client_secret', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'lkwd10s_settings_google', // ID
            'Google API Access', // Title
            array( $this, 'print_section_info' ), // Callback
            'lkwd10s-settings' // Page
        );

        add_settings_field(
            'google_client_id', // ID
            'Client ID', // Title 
            array( $this, 'client_id_callback' ), // Callback
            'lkwd10s-settings', // Page
            'lkwd10s_settings_google' // Section           
        );

        add_settings_field(
            'google_client_secret', // ID
            'Client Secret', // Title 
            array( $this, 'client_secret_callback' ), // Callback
            'lkwd10s-settings', // Page
            'lkwd10s_settings_google' // Section           
        );    
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input ) {
        $valid_input = $this->options;

        $submit = ! empty($input['submit']) ? true : false;
        $reset = ! empty($input['reset']) ? true : false;

        if ( $submit ) {
            $valid_input['client_secret'] = $input['client_secret'];
        }

        return $valid_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info() {
        print 'Configure your Google API access: ';
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function client_id_callback() {
        ?>
        <input id="client_id_text" type="text" />
        <?php
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function client_secret_callback() {
        ?>
        <input id="client_secret_text" type="text" />
        <?php
    }

    public function lkwd10s_options_enqueue_scripts() {
        wp_register_script( 'lkwd10s-options', LKWD10SP_DIR . '/admin/lkwd10s-options.js', array('jquery','media-upload','thickbox') );
     
        if ( 'settings_page_lkwd10s-settings' == get_current_screen() -> id ) {
            wp_enqueue_script('jquery');
     
            wp_enqueue_script('thickbox');
            wp_enqueue_style('thickbox');
     
            wp_enqueue_script('media-upload');
            wp_enqueue_script('wptuts-upload');     
        }
    }
}

if( is_admin() )
    $lkwd10s_settings_page = new Lkwd10s_Settings_Page();
