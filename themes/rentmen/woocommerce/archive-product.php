<?php 
  get_header(); 
  $thisID = get_the_ID();
  $ccat = get_queried_object();
  $sorting = 'DESC';
  $gtags = array();
  $price = array();
  $keyword = '';
  $termQuery = $metaQuery = array();

  if( isset($_GET['p']) && !empty($_GET['p']) ){
    $keyword = $_GET['p'];
  }
  if( isset($_GET['price']) && !empty($_GET['price']) ){
    $price = explode(",",$_GET['price']);
    //printr($price);
    $metaQuery = array(
        array(
            'key' => '_price',
            'value' => array($price[0], $price[1]),
            'compare' => 'BETWEEN',
            'type' => 'NUMERIC'
        )
      );

  }
  if( isset($_GET['tags']) && !empty($_GET['tags']) ){
    $gtags = explode(",",$_GET['tags']);
    $termQuery = array(
      array(
        'taxonomy' => 'product_tag',
        'field' => 'slug',
        'terms' => $gtags
      )
    );
  }
  if( 
    isset($_GET['price']) && !empty($_GET['price']) && 
    isset($_GET['tags']) && !empty($_GET['tags'])
  ){
    $price = explode(",",$_GET['price']);
    $gtags = explode(",",$_GET['tags']);
    $metaQuery = array(
        array(
            'key' => '_price',
            'value' => array($price[0], $price[1]),
            'compare' => 'BETWEEN',
            'type' => 'NUMERIC'
        )
      );
    $termQuery = array(
      array(
        'taxonomy' => 'product_tag',
        'field' => 'slug',
        'terms' => $gtags
      )
    );

  }

  if(isset($_COOKIE['sorting']) && !empty($_COOKIE['sorting'])) {
    $sorting = $_COOKIE['sorting'];
  }
  $per_page = 12;

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
    'tax_query' => $termQuery,
    'meta_query' => $metaQuery
  ) 
  );
?>
<div id="thisURL" data-url="<?php echo home_url( $wp->request ); ?>/"></div>
<section class="breadcrumbs-sec">
  <div class="container-lg">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumbs-innr hide-xs clearfix">
          <div class="breadcrumbs-lft-text">
            <h1 class="page-title">Producten</h1>
          </div>          
          <div class="breadcrumbs-main">
            <?php cbv_breadcrumbs(); ?>
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

          <?php  
            $showhide_delivery = get_field('showhide_delivery', 'option');
            $dproceses = get_field('dfleveringsproces', 'option');
            if($showhide_delivery):
              if($dproceses):
          ?>
          <div class="organize-party-step-slider-wrp">
            <div class="organizePartySlider organizePartySlider-2 clearfix dft-slider-pagi dft-slider-pagi-2">
              <?php foreach( $dproceses as $dproces ): ?>
              <div class="organizePartySlider-item">
                <div class="organizePartySlider-img mHc">
                   <?php if( !empty($dproces['icon']) ): ?>
                  <i><?php echo cbv_get_image_tag( $dproces['icon'] ); ?></i>
                  <?php endif; ?>
                </div>
                <?php 
                if( !empty($dproces['title']) ) printf('<h4 class="order-process-title">%s</h4>', $dproces['title']); 
                if( !empty($dproces['beschrijving']) ) echo wpautop( $dproces['beschrijving'], true );
                ?>
              </div>
               <?php endforeach; ?>
            </div>
          </div>
          <?php endif; endif; ?>
        </div>
      </div>
    </div>
  </div>    
</section>

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
                  <li>
                    <a href="<?php echo esc_url( get_term_link( $term ) ); ?>">
                      <?php if( !empty($thumbnail_id) ): ?>
                      <i>
                        <?php echo cbv_get_image_tag($thumbnail_id); ?>
                        <?php echo cbv_get_image_tag($hoverid); ?>
                      </i>
                      <?php else: ?>
                        <i><svg class="post-cty-table-icon-svg" width="26" height="26" viewBox="0 0 26 26" fill="#1E1E1E;"><use xlink:href="#post-cty-table-icon-svg"></use></svg></i>
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
                    <?php 
                    $min = isset( $price[0] ) ? $price[0] : 0;
                    $max = isset( $price[1] ) ? $price[1] : 500;
                    ?>
                    <input type="hidden" name="minAmount" id="minAmount" value="<?php echo $min; ?>">
                    <input type="hidden" name="maxAmount" id="maxAmount" value="<?php echo $max; ?>">
                    <div id="slider"></div>
                    <i id="min"></i>
                    <i id="max"></i>
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
                <div class="pro-check-box-filter pro-filter-main filterCheckboxs"> 
                  <div class="filterData" data-key="tags" data-delim=","></div>
                  <form id="formName" action="" method="get">
                    <?php $i = 1; foreach( $tags as $tag ): ?>
                    <div class="form-group">
                      <input type="checkbox" name="tag" value="<?php echo $tag->slug; ?>" id="checkfilter<?php echo $i; ?>" <?php echo ( in_array($tag->slug, $gtags) )? 'checked': ''; ?>>
                      <label for="checkfilter<?php echo $i; ?>"><?php echo $tag->name; ?></label>
                    </div>
                    <?php $i++; endforeach; ?>
                  </form>

                </div>
              </div>
              <?php endif; ?>
              <div class="pro-overview-sidebar-color pro-filter-con">
                <div class="pro-overview-sidebar-head">
                  <h3 class="sidebar-widget-title">KLEUR</h3>
                </div> 
                <div class="pro-color-filter pro-filter-main"> 
                  <?php product_attribute_filter(); ?>
                </div>
              </div>
            </div>
          </div>
          <div class="pro-overview-grid-con">
            <div class="pro-overview-grid-head hide-sm">
              <h2 class="producten-sec-title">Producten</h2>
            </div>
            <?php $excludeID = ''; if($query->have_posts()): ?>
            <div class="pro-overview-single-des-con clearfix">
              <?php 
              while($query->have_posts()): $query->the_post(); 
                global $product;
                $excludeID = get_the_ID();
                $thumb_id = get_post_thumbnail_id(get_the_ID());
                $sterms = get_the_terms( get_the_ID(), 'product_cat' );
                $stermname = '';
                if( !empty($sterms) && !is_wp_error($sterms) ){
                  foreach( $sterms  as $sterm ){
                    $stermname = $sterm->name;
                  }
                }
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
                <?php if( !empty($stermname) ) printf('<h4>%s</h4>', $stermname); ?>
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
            <?php 
              $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
              $equery = new WP_Query(array( 
                'post_type'=> 'product',
                'posts_per_page' => $per_page,
                'post__not_in' => array($excludeID),
                'paged' => $paged,
                'order'=> $sorting,
                's' => $keyword,
                'tax_query' => $termQuery,
                'meta_query' => $metaQuery
              ) 
              );
              if( $equery->have_posts() || $query->have_posts() ):

                if($equery->have_posts()):
            ?>
            <div class="pro-overview-grid-filter clearfix">              
              <div class="rm-selctpicker-ctlr reset-list clearfix">
                <span>Sorteer op: </span>
                <select class="selectpicker" id="sortproduct" data-url="<?php echo home_url('shop'); ?>">
                  <option value="desc" <?php echo ($sorting == 'desc')? 'selected="selected"': '';?>>DESC</option>
                 <option value="asc" <?php echo ($sorting == 'asc')? 'selected="selected"': '';?>>ASC</option>
                </select>
              </div>
            </div>
            <?php endif; ?>
            <div class="pro-overview-grid-innr-wrp clearfix">
              <?php 
              while($equery->have_posts()): $equery->the_post(); 
                global $product;
                $product_thumb = '';
                $thumb_id = get_post_thumbnail_id(get_the_ID());
                $status = get_field('status', get_the_ID());
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
                    <h4 class="pro-overview-title equalheight"><a href="#"><?php the_title(); ?></a></h4>
                    <span><?php echo cbv_get_excerpt(); ?></span>
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
                  <?php if( !empty($status) ) printf( '<span class="pro-new-tag">%s</span>', $status); ?>            
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
              <?php else: ?>
                <div class="notfound">Geen resultaat!</div>
              <?php endif; wp_reset_postdata(); ?>
            </div>  
          </div>
        </div>
      </div>
    </div>
  </div>    
</section>

<?php
  $showhide_usp = get_field('showhide_usp', 'option');
  if( $showhide_usp ):
    $uspssec = get_field('uspssec', 'option');
    $husps = $uspssec['alle_usps'];
?>
<?php if( $husps ): ?>
<section class="pro-overview-feature-sec">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="pro-overview-feature-innr">
          <div class="overview-feature-slider clearfix dft-slider-pagi dft-slider-pagi-2">
            <?php foreach( $husps as $husp ): ?>
            <div class="overview-feature-slider-item mHc">
              <div class="overview-feature-slider-item-innr">
                <?php if( !empty($husp['icon']) ): ?>
                <i>
                  <img src="<?php echo $husp['icon']; ?>" alt="<?php echo cbv_get_image_alt( $husp['icon'] ); ?>">
                </i>  
                <?php endif; ?>              
                <?php
                  if( !empty($husp['titel']) ) printf('<h3 class="overview-feature-box-title">%s</h3>', $husp['titel']);
                  if( !empty($husp['beschrijving']) ) echo wpautop( $husp['beschrijving'] );
                ?>
              </div>
            </div>
      <?php endforeach; ?>           
          </div>
        </div>
      </div>
    </div>
  </div>    
</section>
<?php endif; ?>
<?php endif; ?>
<?php get_footer(); ?>