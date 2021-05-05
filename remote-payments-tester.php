<?php
/**
 * Plugin Name: Remote Payments Tester
 */

use Automattic\WooCommerce\Admin\Features\RemotePaymentMethods\Init as RemotePaymentMethods;
use Automattic\WooCommerce\Admin\Features\RemoteFreeExtensions\Init as RemoteFreeExtensions;

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
        self::initPaymentMethods();
        self::initFreeExtensions();
    }

    /**
     * Initialize free extensions.
     */
    public static function initFreeExtensions() {
        if ( ! class_exists( 'Automattic\WooCommerce\Admin\Features\RemoteFreeExtensions\Init' ) ) {
            return;
        }

        add_filter( 'woocommerce_admin_remote_free_extensions_data_sources', array( __CLASS__, 'filter_free_extentions_sources' ) );
        // Force the JSON data to be refetched every time.
        add_filter( 'transient_' . RemoteFreeExtensions::SPECS_TRANSIENT_NAME, '__return_false' );
    }

    /**
     * Filter the free extensions data sources to use this plugin's version.
     *
     * @return array
     */
    public static function filter_free_extentions_sources() {
        return array(
            plugin_dir_url( __FILE__ ) . 'free-extensions.json',
        );
    }
    
    /**
     * Initialize payment methods.
     */
    public static function initPaymentMethods() {
        if ( ! class_exists( 'Automattic\WooCommerce\Admin\Features\RemotePaymentMethods\Init' ) ) {
            return;
        }

        add_filter( 'woocommerce_admin_remote_payment_methods_data_sources', array( __CLASS__, 'filter_payment_methods_sources' ) );
        // Force the JSON data to be refetched every time.
        add_filter( 'transient_' . RemotePaymentMethods::SPECS_TRANSIENT_NAME, '__return_false' );
    }

    /**
     * Filter the payment methods data sources to use this plugin's version.
     *
     * @return array
     */
    public static function filter_payment_methods_sources() {
        return array(
            plugin_dir_url( __FILE__ ) . 'payment-methods.json',
        );
    }
}

new RemotePaymentsTester();
