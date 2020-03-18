<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
?>
<section class="breadcrumbs-sec ">
  <div class="container-lg">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumbs-innr hide-xs clearfix">         
          <div class="breadcrumbs-main">
            <ul>           
              <li><a href="#">Home</a></li>
              <li><a href="#">Binnenpagina</a></li>
              <li><a href="#">Binnenpagina</a></li>
            </ul>
          </div>
          <div class="breadcrumbs-lft-text">
            <h1 class="page-title">Meubilair</h1>
          </div>           
        </div>
        <div class="breadcrumbs-innr show-xs clearfix">
          <div class="breadcrumbs-left">
            <a href="#">Home</a>
          </div>
          <div class="breadcrumbs-right">
            <a href="javascript:history.go(-1)">Terug</a>
          </div>
        </div>
      </div>
    </div>
  </div>    
</section>
<section class="rm-faq-backlink-sec ">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="rm-faq-backlink-sec-inr">
          <a href="javascript:history.go(-1)">
            <i>
              <svg class="faq-left-arrow-svg" width="18" height="8" viewBox="0 0 18 8" fill="#1E1E1E;">
                <use xlink:href="#faq-left-arrow-svg"></use>
              </svg> 
            </i>
          Terug
        </a>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="pro-cat-single-top-title-xs show-sm">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="pro-cat-single-top-title-xs">
            <strong>Meubilair</strong>
        </div>
      </div>
    </div>
  </div>
</section>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>

<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
