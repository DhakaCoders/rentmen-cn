<?php 
  get_header(); 
  $thisID = get_the_ID();
  $ccat = get_queried_object();
  if ( ! empty( $ccat ) && ! is_wp_error( $ccat ) ):
  $sorting = 'DESC';
  $keyword = $gtags = '';
  $termQuery = array();
  if( isset($_GET['p']) && !empty($_GET['p']) ){
    $keyword = $_GET['p'];
  }
  if ( isset($_GET['tags']) && !empty($_GET['tags']) ){
    $gtags = $_GET['tags'];
    $termQuery = array(
	'relation' => 'AND',
	array(
	'taxonomy' => 'product_cat',
	'field' => 'term_id',
	'terms' => $ccat->term_id
	),
	array(
	'taxonomy' => 'product_tag',
	'field' => 'slug',
	'terms' => $gtags
	)
    );
  } else {
  	$termQuery = array(
	array(
	'taxonomy' => 'product_cat',
	'field' => 'term_id',
	'terms' => $ccat->term_id
	)
	);
  }


  if(isset($_COOKIE['sorting']) && !empty($_COOKIE['sorting'])) {
    $sorting = $_COOKIE['sorting'];
  }
  $per_page = 1;

	$terms = get_terms( array(
	  'taxonomy' => 'product_cat',
	  'orderby' => 'name',
	  'order' => 'ASC',
	  'hide_empty' => false,
	) );

  $query = new WP_Query(array( 
    'post_type'=> 'product',
    'posts_per_page' => 1,
    'paged' => $paged,
    'order'=> $sorting,
    's' => $keyword,
    'tax_query' => $termQuery
  ) 
  );
?>
<section class="breadcrumbs-sec">
  <div class="container-lg">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumbs-innr hide-xs clearfix">
          <div class="breadcrumbs-lft-text">
            <?php if( isset($ccat->name) && !empty($ccat->name)) printf('<h1>%s</h1>', $ccat->name); ?>
          </div>          
          <div class="breadcrumbs-main">
            <?php //cbv_breadcrumbs(); ?>
          </div>
        </div>
        <div class="breadcrumbs-innr show-xs clearfix">
          <div class="breadcrumbs-left">
            <a href="<?php echo esc_url( home_url() );?>"></a>
          </div>
          <div class="breadcrumbs-right">
            <a href="javascript:history.go(-1)">Terug</a>
          </div>
        </div>
      </div>
    </div>
  </div>    
</section>
<section class="organize-party-sec" id="overview-organize-party-sec">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="organize-party-innr text-center">
          <div class="pro-cat-top-title-xs show-sm">
            <strong>Meubilair</strong>
          </div>
          <div class="organize-party-head m-auto">
            <h2>Organiseer uw feest in een paar snelle stappen</h2>
            <p>Morbi euismod blandit massa id congue. Mauris dignissim, augue ac maximus dapibus, enim ante facilisis odio, vel blandit tortor quam sit amet ante. Suspendisse a volutpat nulla.</p>
          </div>
          <div class="organize-party-step-slider-wrp">
            <div class="organizePartySlider organizePartySlider-1 clearfix dft-slider-pagi dft-slider-pagi-2">
              <div class="organizePartySlider-item">
                <div class="organizePartySlider-img mHc">
                  <i><img src="<?php echo THEME_URI; ?>/assets/images/organize-party-step1.svg" alt=""></i>
                </div>
                <h4 class="order-process-title">Lobortis et odio</h4>
                <p>Lorem ipsum dolor sit amet, consectetur elit.</p>
              </div>
              <div class="organizePartySlider-item">
                <div class="organizePartySlider-img mHc">
                  <i><img src="<?php echo THEME_URI; ?>/assets/images/organize-party-step2.svg" alt=""></i>
                </div>                
                <h4 class="order-process-title">Maecenas congue</h4>
                <p>Lorem ipsum dolor sit amet, consectetur elit.</p>
              </div>
              <div class="organizePartySlider-item">
                <div class="organizePartySlider-img mHc">
                  <i><img src="<?php echo THEME_URI; ?>/assets/images/organize-party-step3.svg" alt=""></i>
                </div>
                <h4 class="order-process-title">dapibus enim</h4>
                <p>Lorem ipsum dolor sit amet, consectetur elit.</p>
              </div>
              <div class="organizePartySlider-item">
                <div class="organizePartySlider-img mHc">
                  <i><img src="<?php echo THEME_URI; ?>/assets/images/organize-party-step4.svg" alt=""></i>
                </div>
                <h4 class="order-process-title">ante tortor</h4>
                <p>Lorem ipsum dolor sit amet, consectetur elit.</p>
              </div>
              <div class="organizePartySlider-item">
                <div class="organizePartySlider-img mHc">
                  <i><img src="<?php echo THEME_URI; ?>/assets/images/organize-party-step5.svg" alt=""></i>
                </div>
                <h4 class="order-process-title">suspendisse nulla</h4>
                <p>Lorem ipsum dolor sit amet, consectetur elit.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>    
</section>

<?php if($query->have_posts()): ?>
<section class="pro-overview-main-sec">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="pro-overview-main-innr clearfix">
          <div class="pro-overview-sidebar-con">
            <div class="pro-overview-sidebar-sm-con show-sm">
              <span>Filter Producten</span>
              <i><img src="<?php echo THEME_URI; ?>/assets/images/pro-sidebar-sm-filter-icon.svg" alt=""></i>
            </div>

            <div class="pro-overview-sidebar-con-innr">
              <?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){ ?>
              <div class="pro-overview-sidebar-cat pro-filter-con">
                <div class="pro-overview-sidebar-head">
                  <h3 class="sidebar-widget-title">Categorieen</h3>
                </div>
                <ul class="ulc pro-filter-main"> 
                  <?php 
                    foreach ( $terms as $term ) {
                    $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
                    $hoverid = get_field( 'hover_thumbnail', $term );
                  ?>
                  <li <?php echo ($ccat->term_id == $term->term_id)? 'class="active"': ''; ?>>
                    <a href="<?php echo esc_url( get_term_link( $term ) ); ?>">
                      <?php if( !empty($thumbnail_id) ): ?>
                      <i>
                        <?php echo cbv_get_image_tag($thumbnail_id); ?>
                        <?php echo cbv_get_image_tag($hoverid); ?>
                      </i>
                      <?php endif; ?>
                      <span><?php echo $term->name; ?></span>
                    </a>
                  </li> 
                  <?php } ?>             
                </ul>
              </div>
            <?php } ?>
              <div class="pro-overview-sidebar-price pro-filter-con">
                <div class="pro-overview-sidebar-head">
                  <h3 class="sidebar-widget-title">Prijs</h3>
                </div>                
                <div class="price-slider pro-filter-main">
                  <form action="">
                    <div class="amount-show clearfix">
                      <div class="min-amount">
                        <label for="minAmount">€ </label>
                        <input type="text" id="minAmount" />
                      </div>
                      <div class="max-amount">
                        <label for="maxAmount">€ </label>
                        <input type="text" id="maxAmount" />
                      </div>
                    </div>
                    <div id="slider"></div>
                  </form>
                </div>
              </div>
              <?php 
                $tags = get_terms( array(
                    'orderby'    => 'name',
                    'show_count' => true,
                    'hide_empty' => false,
                    'number' => 10,
                    'taxonomy'   => 'product_tag' //i guess campaign_action  is your  taxonomy 
                ) );
              ?>
              <?php if ( ! empty( $tags ) && ! is_wp_error( $tags ) ): ?>
              <div class="pro-overview-sidebar-filter pro-filter-con">
                <div class="pro-overview-sidebar-head">
                  <h3 class="sidebar-widget-title">Filter</h3>
                </div> 
                <div class="pro-check-box-filter pro-filter-main"> 
                  
                  <form id="formName" action="" method="get">
                    <?php $i = 1; foreach( $tags as $tag ): ?>
                    <div class="form-group">
                      <input type="checkbox" name="tags[]" value="<?php echo $tag->slug; ?>" id="checkfilter<?php echo $i; ?>" <?php echo ($gtags == $tag->slug)? 'checked': ''; ?> onchange="document.getElementById('formName').submit()">
                      <label for="checkfilter<?php echo $i; ?>"><?php echo $tag->name; ?></label>

                    </div>
                    <?php $i++; endforeach; ?>
                  </form>
                </div>
              </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="pro-overview-grid-con">
            <div class="pro-overview-grid-head hide-sm">
              <h2 class="producten-sec-title">Producten</h2>
            </div>
            <?php if($query->have_posts()): ?>
            <div class="pro-overview-single-des-con clearfix">
              <?php 
              while($query->have_posts()): $query->the_post(); 
                global $product;
                $excludeID = get_the_ID();
                $thumb_id = get_post_thumbnail_id(get_the_ID());
              ?>
              <div class="pro-overview-single-img mHc">
                <?php if (!empty($thumb_id)){ ?>
                  <?php echo cbv_get_image_tag($thumb_id, 'prodgrid'); ?>
                <?php } else {?>
                <span><img src="<?php echo THEME_URI; ?>/assets/images/pro-overview-single-img.png" alt=""></span>
                <?php } ?>
                <a href="<?php the_permalink();?>" class="overlay-link"></a>
              </div>
              <div class="pro-overview-single-des text-white mHc">
                <h4>In De Kijker</h4>
                <h3 class="pro-overview-title-fea"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                <strong class="price"><?php echo $product->get_price_html(); ?> / stuk</strong>
                <?php the_excerpt();?>
                <div class="pro-overview-single-des-link clearfix">
                  <a href="<?php the_permalink();?>">Meer Info</a>
                  <a href="?add-to-cart=<?php echo get_the_ID(); ?>" data-quantity="1" class="button rentbtn product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo get_the_ID(); ?>" data-product_sku="" aria-label="Add “Producten Titel” to your cart" rel="nofollow">
                    <svg class="overview-single-des-cart-svg" width="30" height="28" viewBox="0 0 30 28" fill="white">
                      <use xlink:href="#overview-single-des-cart-svg"></use>
                    </svg>
                  </a>
                </div>
              </div>
              <?php endwhile; ?>
            </div>
            <?php endif; wp_reset_postdata(); ?>
            <div class="pro-overview-grid-filter clearfix">              
              <div class="rm-selctpicker-ctlr reset-list clearfix">
                <span>Sorteer op: </span>
                <select class="selectpicker" id="sortproduct" data-url="<?php echo home_url('shop'); ?>">
                  <option value="desc" <?php echo ($sorting == 'desc')? 'selected="selected"': '';?>>DESC</option>
                 <option value="asc" <?php echo ($sorting == 'asc')? 'selected="selected"': '';?>>ASC</option>
                </select>
              </div>
            </div>
            <div class="pro-overview-grid-innr-wrp clearfix">
              <?php 
              $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
              $equery = new WP_Query(array( 
                'post_type'=> 'product',
                'posts_per_page' => $per_page,
                'post__not_in' => array($excludeID),
                'paged' => $paged,
                'order'=> $sorting,
                's' => $keyword,
                'tax_query' => $termQuery
              ) 
              );
              while($equery->have_posts()): $equery->the_post(); 
                global $product;
                $product_thumb = '';
                $thumb_id = get_post_thumbnail_id(get_the_ID());
              ?>
              <div class="pro-overview-grid-item">
                <div class="pro-overview-grid-item-innr">
                  <div class="pro-overview-grid-img mHc">
                    <a href="<?php the_permalink();?>">
                    <?php if (!empty($thumb_id)){ ?>
                      <?php echo cbv_get_image_tag($thumb_id, 'prodgrid'); ?>
                    <?php } else {?>
                      <img src="<?php echo THEME_URI; ?>/assets/images/interestedItemSlider-img-1.png" alt="">
                    <?php } ?>
                    </a>
                  </div>
                  <div class="pro-overview-grid-des">
                    <h4 class="pro-overview-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
                    <span>Lorem ipsum dolor sit amet</span>
                    <strong class="price"><?php echo $product->get_price_html(); ?> / stel</strong>
                    <div class="pro-overview-grid-btm-lnc clearfix">
                      <a href="<?php the_permalink();?>">Meer Info</a>
                      <a href="?add-to-cart=<?php echo get_the_ID(); ?>" data-quantity="1" class="button rentbtn product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo get_the_ID(); ?>" data-product_sku="" aria-label="Add “Producten Titel” to your cart" rel="nofollow">
                        <svg class="overview-single-des-cart-svg" width="30" height="28" viewBox="0 0 30 28" fill="#ACABAB">
                          <use xlink:href="#overview-single-des-cart-svg"></use>
                        </svg>
                      </a>
                    </div>
                  </div>
                  <span class="pro-new-tag">New</span>                
                </div>  
              </div>
              <?php endwhile; ?>
            </div>
            <div class="pro-overview-pagination">
              <div class="faq-pagination">
              <?php 
                if( $equery->max_num_pages > 1 ):
                $big = 999999999; // need an unlikely integer
                echo paginate_links( array(
                  'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                  'format' => '?paged=%#%',
                  'current' => max( 1, get_query_var('paged') ),
                  'total' => $equery->max_num_pages,
                  'type'  => 'list',
                  'show_all' => true,
                  'prev_next' => false
                ) );
                else:
                  echo '<div class="hasgap"></div>';
                endif; 
              ?>
              </div>  
            </div>  
          </div>
        </div>
      </div>
    </div>
  </div>    
</section>
<?php endif; wp_reset_postdata(); ?>

<section class="pro-overview-feature-sec">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="pro-overview-feature-innr">
          <div class="overview-feature-slider clearfix dft-slider-pagi dft-slider-pagi-2">
            <div class="overview-feature-slider-item mHc">
              <div class="overview-feature-slider-item-innr">
                <i>
                  <img src="<?php echo THEME_URI; ?>/assets/images/pro-overview-feature-img1.svg" alt="">
                </i>                
                <h3 class="overview-feature-box-title">Auctor eu ante ac</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut mi augue, auctor eu ante ac.</p>
              </div>
            </div>
            <div class="overview-feature-slider-item mHc">
              <div class="overview-feature-slider-item-innr">
                <i>
                  <img src="<?php echo THEME_URI; ?>/assets/images/pro-overview-feature-img1.svg" alt="">
                </i>                
                <h3 class="overview-feature-box-title">Auctor eu ante ac</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut mi augue, auctor eu ante ac.</p>
              </div>
            </div>  
            <div class="overview-feature-slider-item mHc">
              <div class="overview-feature-slider-item-innr">
                <i>
                  <img src="<?php echo THEME_URI; ?>/assets/images/pro-overview-feature-img2.svg" alt="">
                </i>                
                <h3 class="overview-feature-box-title">Auctor eu ante ac</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut mi augue, auctor eu ante ac.</p>
              </div>
            </div>            
          </div>
        </div>
      </div>
    </div>
  </div>    
</section>
<?php endif; ?>
<?php get_footer(); ?>