<?php 
get_header(); 
$thisID = get_the_ID();
  $ccat = get_queried_object();
  if( isset($_GET['q']) && !empty($_GET['q']) )
    $keyword = $_GET['q'];
  else
    $keyword = '';
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
<?php 
$terms = get_terms( array(
  'taxonomy' => 'faq',
  'orderby' => 'name',
  'order' => 'ASC',
  'hide_empty' => false,
) );
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
?>
<section class="faq-content">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="faq-cnt-inner">
          <?php 
            if( isset($ccat->name) && !empty($ccat->name)) printf('<div><strong class="faw-page-entry-title">%s</strong></div>', $ccat->name);
            if( isset($ccat->description) && !empty($ccat->description))
              echo wpautop( $ccat->description, true );
          ?>
          <div class="rm-search-form">
            <form action="" method="get">
              <input type="search" name="q" value="<?php echo $keyword; ?>" placeholder="Typ je vraag hier">
              <div class="rm-search-submit-btn">
                <button>
                  <i>
                    <svg class="search-icon-svg" width="18" height="18" viewBox="0 0 18 18" fill="#1E1E1E;">
                      <use xlink:href="#search-icon-svg"></use>
                    </svg> 
                  </i>
                  Zoeken
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="faq-grd-sec">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="faq-grd-sec-inner">
          <div class="faq-tabs">
            <ul class="reset-list">
              <li><a href="<?php echo esc_url(home_url('faq') );?>">ALLE</a></li>
              <?php foreach ( $terms as $term ) { ?>
              <li <?php echo ($term->slug == $ccat->slug)? 'class="active"': ''; ?>><a href="<?php echo esc_url( get_term_link($term) );?>"><?php echo $term->name; ?></a></li>
              <?php } ?>
            </ul>
          </div>
          <?php 
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $query = new WP_Query(array( 
                'post_type'=> 'faqs',
                'post_status' => 'publish',
                'posts_per_page' => 1,
                'orderby' => 'date',
                'order'=> 'desc',
                's' => $keyword,
                'paged' => $paged,
                'tax_query' => array(
                  array(
                    'taxonomy' => 'faq',
                    'field' => 'term_id',
                    'terms' => $ccat->term_id
                  )
                )
              ) 
            );
            if($query->have_posts()):
          ?>  
          <div class="faq-grd-wrap">
            <ul class="reset-list clearfix">
              <?php while($query->have_posts()): $query->the_post(); ?>
              <li>
                <div class="faq-grd-item mHc">
                  <div class="faq-grd-item-inner">
                    <div class="faq-grd-item-des">
                      <h3 class="faq-grd-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                      <?php the_excerpt(); ?>
                      <a href="<?php the_permalink(); ?>">Lees Meer</a>
                    </div>
                  </div>
                  <div class="faq-grd-icon">
                    <img src="<?php echo THEME_URI; ?>/assets/images/faq-grd-icon.png">
                  </div>
                </div>
              </li>
              <?php endwhile; ?>
            </ul>
          </div>
        <?php else: ?>
            <div class="notfound">Geen resultaat!</div>
        <?php endif; wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
    <?php if( $query->max_num_pages > 1 ): ?>
    <div class="row">
      <div class="col-sm-12">
        <div class="faq-pagination">
          <?php 
            $big = 999999999; // need an unlikely integer
            echo paginate_links( array(
              'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
              'format' => '?paged=%#%',
              'current' => max( 1, get_query_var('paged') ),
              'total' => $query->max_num_pages,
              'type'  => 'list',
              'show_all' => true,
              'prev_next' => false
            ) );
          ?>
        </div>
      </div>
    </div>
  <?php endif;  ?>
  </div>
</section>
<?php } ?>
<?php get_footer(); ?>