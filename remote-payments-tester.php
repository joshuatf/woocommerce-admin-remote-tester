<?php
/**
 * Plugin Name: Remote Payments Tester
 */

use Automattic\WooCommerce\Admin\Features\RemotePaymentMethods\Init as RemotePaymentMethods;

/**
 * RemotePaymentsTester plugin class.
 */
class RemotePaymentsTester {
    /**
     * Constructor
     */
    public function __construct() {
        add_action( 'plugins_loaded', array( __CLASS__, 'init' ) );
    }

    /**
     * Initialize plugin.
     */
    public static function init() {
        if ( ! class_exists( 'Automattic\WooCommerce\Admin\Features\RemotePaymentMethods\Init' ) ) {
            return;
        }

        add_filter( 'woocommerce_admin_remote_payment_methods_data_sources', array( __CLASS__, 'filter_data_sources' ) );
        // Force the JSON data to be refetched every time.
        add_filter( 'transient_' . RemotePaymentMethods::SPECS_TRANSIENT_NAME, '__return_false' );
    }

    /**
     * Filter the payment methods data sources to use this plugin's version.
     *
     * @return array
     */
    public static function filter_data_sources() {
        return array(
            plugin_dir_url( __FILE__ ) . 'data-source.json',
        );
    }
}

new RemotePaymentsTester();
