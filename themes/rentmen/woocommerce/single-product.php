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
global $product;
get_header( 'shop' ); 

$terms = get_the_terms( get_the_ID(), 'product_cat' );
$termid = $termname = '';
if( !empty($terms) && !is_wp_error($terms) ){
	foreach( $terms  as $term ){
		$termid = $term->term_id;
		$termname = $term->name;
	}
}
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
          <?php if( !empty($termname) ): ?>
          <div class="breadcrumbs-lft-text">
            <h1 class="page-title"><?php echo $termname; ?></h1>
          </div>   
          <?php endif; ?>        
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
<?php if( !empty($termname) ): ?>
<section class="pro-cat-single-top-title-xs show-sm">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="pro-cat-single-top-title-xs">
            <strong><?php echo $termname; ?></strong>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>      
<section class="single-pro-details-sec">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="single-pro-details-innr clearfix">
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
        </div>
      </div>
    </div>
  </div>    
</section>
<?php $sh_desc = $product->get_description(); ?>
<section class="pro-description-sec">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="pro-description-innr clearfix">
          <?php if(!empty($sh_desc)){ ?>
          <div class="pro-description-lft">
            <?php echo $sh_desc; ?>
          </div>
      	  <?php } ?>
          <div class="pro-description-rgt">
            <div class="pro-description-bq text-white">
              <i>
                <svg class="pro-des-bq-svg" width="58" height="58" viewBox="0 0 58 58">
                  <use xlink:href="#pro-des-bq-svg"></use>
                </svg> 
              </i>
              <p>Libero ipsum commodo senectus purus, nibh vitae. Pharetra, lobortis volutpat lectus lacus massa commodo cursus aliquam ut. Sem scelerisque nullam ac nisl sit in eu, a, pretium.</p>
              <strong>- Steven Rym, Client</strong>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>    
</section>
<section class="organize-party-sec">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="organize-party-innr text-center">
          <div class="organize-party-head m-auto">
            <h2>Organiseer uw feest in een paar snelle stappen</h2>
            <p>Morbi euismod blandit massa id congue. Mauris dignissim, augue ac maximus dapibus, enim ante facilisis odio, vel blandit tortor quam sit amet ante. Suspendisse a volutpat nulla.</p>
          </div>
          <div class="organize-party-step-slider-wrp">
            <div class="organizePartySlider organizePartySlider-2 clearfix dft-slider-pagi dft-slider-pagi-2">
              <div class="organizePartySlider-item">
                <div class="organizePartySlider-img mHc">
                  <i><img src="<?php echo THEME_URI; ?>/assets/images/organize-party-step1.svg" alt=""></i>
                </div>
                <h5 class="order-process-title">Lobortis et odio</h5>
                <p>Lorem ipsum dolor sit amet, consectetur elit.</p>
              </div>
              <div class="organizePartySlider-item">
                <div class="organizePartySlider-img mHc">
                  <i><img src="<?php echo THEME_URI; ?>/assets/images/organize-party-step2.svg" alt=""></i>
                </div>                
                <h5 class="order-process-title">Maecenas congue</h5>
                <p>Lorem ipsum dolor sit amet, consectetur elit.</p>
              </div>
              <div class="organizePartySlider-item">
                <div class="organizePartySlider-img mHc">
                  <i><img src="<?php echo THEME_URI; ?>/assets/images/organize-party-step3.svg" alt=""></i>
                </div>
                <h5 class="order-process-title">dapibus enim</h5>
                <p>Lorem ipsum dolor sit amet, consectetur elit.</p>
              </div>
              <div class="organizePartySlider-item">
                <div class="organizePartySlider-img mHc">
                  <i><img src="<?php echo THEME_URI; ?>/assets/images/organize-party-step4.svg" alt=""></i>
                </div>
                <h6>ante tortor</h6>
                <p>Lorem ipsum dolor sit amet, consectetur elit.</p>
              </div>
              <div class="organizePartySlider-item">
                <div class="organizePartySlider-img mHc">
                  <i><img src="<?php echo THEME_URI; ?>/assets/images/organize-party-step5.svg" alt=""></i>
                </div>
                <h5 class="order-process-title">suspendisse nulla</h5>
                <p>Lorem ipsum dolor sit amet, consectetur elit.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="organize-party-bg-wrp clearfix">

<!--     <div class="thumbSlider-arrows">
      <span class="leftArrow">
        <i class="fas fa-angle-up"></i>
      </span>
      <span class="rightArrow">
        <i class="fas fa-angle-down"></i>
      </span>
    </div> -->

    <div class="organizeSlider-arrows">
      <span class="leftArrow">
        <i class="fas fa-angle-left"></i>
      </span>
      <span class="rightArrow">
        <i class="fas fa-angle-right"></i>
      </span>
    </div>
    <div class="organize-party-bg-slider">
      <div class="organize-party-bg-slider-item">
        <div class="organize-party-bg-innr">
          <div class="organize-party-bg-main" style="background: url('<?php echo THEME_URI; ?>/assets/images/organize-party-bg-1.jpg')"></div>
          <a href="#" class="overlay-link"></a>                
        </div>
      </div>
      <div class="organize-party-bg-slider-item">
        <div class="organize-party-bg-innr">
          <div class="organize-party-bg-main" style="background: url('<?php echo THEME_URI; ?>/assets/images/organize-party-bg-2.jpg')"></div>
          <a href="#" class="overlay-link"></a>                
        </div>
      </div>
      <div class="organize-party-bg-slider-item">
        <div class="organize-party-bg-innr">
          <div class="organize-party-bg-main" style="background: url('<?php echo THEME_URI; ?>/assets/images/organize-party-bg-3.jpg')"></div>
          <a href="#" class="overlay-link"></a>
        </div>
      </div>
    </div>
  </div>  
</section>
<?php 
if( !empty($termid) ): 
$query = new WP_Query(array( 
	'post_type'=> 'product',
	'posts_per_page' => 3,
	'order'=> 'DESC',
	'tax_query' => array(
		array(
			'taxonomy' => 'product_cat',
			'field' => 'term_id',
			'terms' => $termid
			)
		)
	) 
);
if($query->have_posts()):
?>
<section class="interested-pro-item-sec">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="interested-pro-item-innr">
          <h2>U bent misschien ook geïnteresseerd in</h2>          
          <div class="interested-pro-item-slider-wrp m-auto">
            <div class="interestedItemSlider clearfix dft-slider-pagi dft-slider-pagi-2">
			<?php 

			while($query->have_posts()): $query->the_post(); 
				global $product;
				$product_thumb = '';
				$thumb_id = get_post_thumbnail_id(get_the_ID());
			?>
              <div class="interestedItemSlider-item">
                <div class="interestedItemSlider-item-innr">
                  <div class="interestedItemSlider-img mHc">
                    <a href="<?php the_permalink();?>">
                    <?php if (!empty($thumb_id)){ ?>
                      <?php echo cbv_get_image_tag($thumb_id, 'prodgrid'); ?>
                    <?php } else {?>
                      <img src="<?php echo THEME_URI; ?>/assets/images/interestedItemSlider-img-1.png" alt="">
                    <?php } ?>
                    </a>                    
                  </div>
                  <div class="interestedItemSlider-des">
                    <h4 class="pro-overview-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
                    <span>Lorem ipsum dolor sit amet</span>
                    <strong class="price"><?php echo $product->get_price_html(); ?> / stel</strong>
                    <div class="interestedItemSlider-btm-lnc clearfix">
                      <a href="<?php the_permalink();?>">Meer Info</a>
                      <a href="?add-to-cart=<?php echo get_the_ID(); ?>" data-quantity="1" class="button rentbtn product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo get_the_ID(); ?>" data-product_sku="" aria-label="Add “Producten Titel” to your cart" rel="nofollow">
                        <svg class="overview-single-des-cart-svg" width="30" height="28" viewBox="0 0 30 28" fill="#ACABAB">
                          <use xlink:href="#overview-single-des-cart-svg"></use>
                        </svg>
                      </a>
                    </div>
                  </div>                
                </div>  
              </div>
          	  <?php endwhile; ?>
            </div>            
          </div>
        </div>
      </div>
    </div>
  </div>    
</section>
<?php endif; wp_reset_postdata(); ?>
<?php endif; ?>
<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
