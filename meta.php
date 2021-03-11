<?php
/**
 * Single Product Meta
 *
 * @version     3.0.0
 */
/***********************
 * EXISTENCIAS DE LA SUCURSAL ELE-GATE DE LA LINEA 20 A LA 24
 * *************************** */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product, $porto_settings;
?>
<div class="product_meta">

	<?php 	//do_action( 'woocommerce_product_meta_start' ); ?>	
	<?php $sucursal_corona = get_post_meta( get_the_ID(), 'MBPOS_STOCK_CORONA', true ); ?>
	<?php 
	if($sucursal_corona >= 0){ ?>
	<span class="product-stock-sucursal in-stock-sucursal">
		Matriz: 
		<span class="stock-sucursal"><?php if($sucursal_corona == 0){ echo ' AGOTADO'; }elseif( $sucursal_corona == 1 ){ echo ' DISPONIBLE';  }else{ echo ' DISPONIBLE'; }  ?></span>
	</span>
	<?php } ?>
	
	<br>
	<?php 	
	$sucursal_colon = $product->stock;
	if($sucursal_colon >= 0){ ?>
	<span class="product-stock-sucursal in-stock-sucursal">
		Sucursal 1: 
		<span class="stock-sucursal"><?php if($sucursal_colon == 0){ echo ' AGOTADO'; }elseif( $sucursal_colon == 1 ){ echo ' DISPONIBLE';  }else{ echo ' DISPONIBLE'; }  ?></span>
	</span>
	<?php } ?>

	<?php $sucursal_cotilla = get_post_meta( get_the_ID(), 'MBPOS_STOCK_COTILLA', true ); ?>
	<br>
	<?php if($sucursal_cotilla >= 0){ ?>
	<span class="product-stock-sucursal in-stock-sucursal">
		Sucursal 2	: 
		<span class="stock-sucursal"><?php if($sucursal_cotilla == 0){ echo ' AGOTADO'; }elseif( $sucursal_cotilla == 1 ){ echo ' DISPONIBLE';  }else{ echo ' DISPONIBLE'; }  ?></span>
	</span>
	<?php } ?>
	<?php if ( in_array( 'sku', $porto_settings['product-metas'] ) && wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<span class="sku_wrapper"><?php esc_html_e( 'SKU:', 'woocommerce' ); ?> <span class="sku"><?php echo ! empty( $sku = $product->get_sku() ) ? esc_html( $sku ) : esc_html__( 'N/A', 'woocommerce' ); ?></span></span>

	<?php endif; ?>
		
	<?php
	if ( in_array( 'cats', $porto_settings['product-metas'] ) ) :
		echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</span>' );
	endif;
	?>

	<?php
	if ( in_array( 'tags', $porto_settings['product-metas'] ) ) :
		echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'woocommerce' ) . ' ', '</span>' );
	endif;
	?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>
