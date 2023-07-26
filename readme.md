# WooCommerce Checkout Popup Plugin

This plugin generates a popup when the 'Proceed to Checkout' button is clicked in WooCommerce. The size, content, and button text of the popup can be easily configured via the WordPress admin interface.

## Table of Contents

1. [Prerequisites](#prerequisites)
2. [Installation](#installation)
3. [Usage](#usage)
4. [Custom Styling](#custom-styling)
5. [Troubleshooting](#troubleshooting)

## Prerequisites

Before installing the WooCommerce Checkout Popup Plugin, please ensure that you have the WooCommerce plugin installed and activated on your WordPress site. This is a required dependency.

## Installation

1. Download the WooCommerce Checkout Popup Plugin.
2. Unzip the plugin files into your WordPress `wp-content/plugins/` directory, or install the plugin through the WordPress plugins screen directly.
3. Activate the WooCommerce Checkout Popup Plugin through the 'Plugins' menu in WordPress.

## Usage

Once the plugin is activated, navigate to the 'WC Checkout Popup' option in your WordPress admin panel.

Here, you can configure the following settings:

- **Popup Content:** Specify the content that you would like to display in the popup.
- **Popup Width & Height:** Define the dimensions of the popup in pixels.
- **Button Text:** Set the text for the button that users will click to close the popup and proceed to the checkout.

Once these settings are configured and saved, the popup will automatically display when a customer clicks the 'Proceed to Checkout' button in their cart.

## Custom Styling

The appearance of the popup can be further customized with CSS. To do this, navigate to the `wp-content/plugins/woocommerce-checkout-popup/css/styles.css` file.

Please note, any changes you make in this file will apply directly to the popup, allowing you to seamlessly integrate it with your site's existing design.

## Troubleshooting

In case of issues, check the following:

- Make sure that WooCommerce is installed and activated, as it is a necessary prerequisite for this plugin.
- Check for any JavaScript errors in your browser's console that may indicate a conflict with other plugins or scripts.
- Ensure your theme is correctly implementing the `wp_footer` action hook, as it is required for the operation of this plugin.

In case of persistent issues, please refer to the WordPress Codex or seek help from the WordPress community.
