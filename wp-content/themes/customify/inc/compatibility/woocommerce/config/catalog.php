<?php

class Customify_WC_Products {
	function __construct() {
		add_filter( 'customify/customizer/config', array( $this, 'config' ), 100 );
	}

	function config( $configs ) {
		$section = 'woocommerce_product_catalog';
		
		$configs[] = array(
			'name'            => '_customify_wc_show_page_title',
			'type'            => 'checkbox',
			'section'         => $section,
			'default'         => 1,
			'priority'        => 1,
			'label'           => __( 'Show Woocommerce Page title and description', 'customify' ),
		);

		$configs[] = array(
			'name'    => 'woocommerce_catalog_tablet_columns',
			'type'    => 'text',
			'section' => $section,
			'label'   => __( 'Products per row on tablet', 'customify' ),
		);
		$configs[] = array(
			'name'    => 'woocommerce_catalog_mobile_columns',
			'type'    => 'text',
			'section' => $section,
			'default' => 1,
			'label'   => __( 'Products per row on mobile', 'customify' ),
		);

		return $configs;
	}
}

new Customify_WC_Products();
