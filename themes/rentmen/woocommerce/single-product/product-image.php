<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;


$attachment_ids = $product->get_gallery_image_ids();

if ( $attachment_ids && $product->get_image_id() ) {
	foreach ( $attachment_ids as $attachment_id ) {
		
	}
}
$attachId = get_post_thumbnail_id(get_the_ID());
?>
<div class="single-pro-lft-con clearfix">
<div class="product-slider-wrp clearfix">
  <div class="bigViewSlider-wrp">
    <div class="bigViewSlider">
    	<?php if( !empty($attachId) ): ?>
    		<div class="bigViewSlider-item">
	        	<?php echo cbv_get_image_tag($attachId, 'full'); ?>
	      	</div>
    	<?php endif; ?>
      	<?php 
		if ( $attachment_ids && $product->get_image_id() ) {
			foreach ( $attachment_ids as $attachment_id ) {
			?>
			<div class="bigViewSlider-item">
	        	<?php echo cbv_get_image_tag($attachment_id, 'full'); ?>
	      	</div>
			<?php
			}
		}
      	?>
    </div>
  </div>
  <?php if ( $attachment_ids && $product->get_image_id() ) { ?>
  <div class="thumbSlider-wrp">
    <div class="thumbSlider-wrp-innr-con">
      <div class="thumbSlider-arrows">
        <span class="leftArrow">
          <i class="fas fa-angle-up"></i>
        </span>
        <span class="rightArrow">
          <i class="fas fa-angle-down"></i>
        </span>
      </div>
      <div class="thumbSlider">
      	<?php if( !empty($attachId) ): ?>
    	<div class="thumbSlider-item">
          	<div class="thumbSlider-item-img">
	        	<?php echo cbv_get_image_tag($attachId, 'thumbnail'); ?>
	      	</div>
        </div>
    	<?php endif; ?>
      	<?php 
		foreach ( $attachment_ids as $attachment_id ) {

		?>
        <div class="thumbSlider-item">
          <div class="thumbSlider-item-img">
            <i><?php echo cbv_get_image_tag($attachment_id, 'thumbnail'); ?></i>
          </div>
        </div>
        <?php
		}
      	?>
      </div>
    </div>  
  </div>
  <?php } ?>
</div>            
</div>