# Remote Payments Tester

This is a plugin used to test and help develop the features of the new remote payment configurations being built in WooCommerce Admin.

## Prerequisites

[WooCommerce Admin](https://github.com/woocommerce/woocommerce-admin) and [WooCommerce 4.8.0 or greater](https://wordpress.org/plugins/woocommerce/) should be installed prior to activating the WooCommerce Admin feature plugin.

Note that the dev version of WooCommerce Admin is required since `remote-payment-methods` is behind a feature flag.

## Using this plugin

Activating this plugin will use the included `data-source.json` file instead of the default remote source.  It also forces this file to be fetched every time so that changes to this file show immediately.

Feel free to open PRs to add test cases to the `data-source.json` file to help test more payment methods.