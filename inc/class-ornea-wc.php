<?php

if ( ! class_exists( 'Ornea_WC' ) ) :
class Ornea_WC {

	public function __construct() {
		add_action( 'woocommerce_archive_description', array( $this, 'get_featured_product' ) );
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
		add_action( 'ornea_breadcrumbs', 'woocommerce_breadcrumb' );
	}

	public function get_featured_product() {

		// Do not proceed if is_shop() function from WooCommerce core is not found.
		if ( ! function_exists( 'is_shop' ) ) {
			return;
		}

		global $wp_query, $woocommerce_loop;

		if ( ! is_tax( 'product_cat' ) ) {
			return;
		}

		$queried_object = (array) $wp_query->queried_object;

		// setup query
		$args = array(
			'post_type'	          => 'product',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'posts_per_page'      => 1,
			'tax_query'           => array( array(
				'taxonomy'        => 'product_cat',
				'field'           => 'id',
				'terms'           => $queried_object['term_taxonomy_id'],
			) ),
			'meta_query'          => array(
				// Get visible products
				array(
					'key'         => '_visibility',
					'value'       => array( 'catalog', 'visible' ),
					'compare'     => 'IN'
				),
				// Only get featured products
				array(
					'key'         => '_featured',
					'value'       => 'yes'
				)
			)
		);

		$products = new WP_Query( $args );

		if ( $products->have_posts() ) :
			while ( $products->have_posts() ) :
				$products->the_post();
				$product = get_product( $products->post->ID );
				$product_id = get_the_ID();

				if ( isset( $archive_query ) ) {
					if ( in_array( $product_id, $query_products ) ) {
						$product = ( isset( $product ) ) ? $product : false;
					}
				} elseif ( is_shop() ) {
					$product = ( isset( $product ) ) ? $product : false;
				}

				if ( $product ) : ?>
					<div class="featured-product-wrapper product">
						<div class="row">
							<?php if ( has_post_thumbnail( $product->id ) ) : ?>
								<div class="col_4">
									<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $product->id, 'full' ); ?></a>
								</div>
								<div class="col_8">
									<a href="<?php the_permalink(); ?>"><h2><?php echo $product->post->post_title; ?></h2></a>
									<p><?php echo $product->post->post_excerpt; ?></p>
									<?php woocommerce_template_single_add_to_cart(); ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<div class="clear" style="padding-top: 1em;"></div>
				<?php endif;
			endwhile;
		endif;
		wp_reset_query();

	}

}
endif;
