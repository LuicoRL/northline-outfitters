<?php
add_action( 'wp_enqueue_scripts', 'storefront_child_enqueue_styles' );

function storefront_child_enqueue_styles() {
	wp_enqueue_style(
		'storefront-parent-style',
		get_template_directory_uri() . '/style.css'
	);
}

add_action( 'wp_head', 'storefront_child_output_ga4_tag', 1 );

function storefront_child_output_ga4_tag() {
	if ( ! defined( 'NORTHLINE_GA4_MEASUREMENT_ID' ) || ! NORTHLINE_GA4_MEASUREMENT_ID ) {
		return;
	}

	$ga_id_raw = trim( (string) NORTHLINE_GA4_MEASUREMENT_ID );
	if ( strpos( $ga_id_raw, 'G-' ) !== 0 ) {
		return;
	}

	$ga_id  = esc_js( $ga_id_raw );
	$ga_url = rawurlencode( $ga_id_raw );
	?>
	<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $ga_url; ?>"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', '<?php echo $ga_id; ?>');
	</script>
	<?php
}