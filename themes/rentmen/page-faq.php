<?php 
/*
  Template Name: FAQ
*/
get_header(); 
while( have_posts() ): the_post();
$thisID = get_the_ID();
?>
<section class="breadcrumbs-sec">
  <div class="container-lg">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumbs-innr hide-xs clearfix">
          <div class="breadcrumbs-lft-text">
            <h1><?php the_title(); ?></h1>
          </div>          
          <div class="breadcrumbs-main">
            <ul>           
              <li><a href="#">Home</a></li>
              <li><a href="#">Binnenpagina</a></li>
              <li><a href="#">Binnenpagina</a></li>
            </ul>
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



<section class="faq-content">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="faq-cnt-inner">
          <div>
            <strong class="faw-page-entry-title"><?php the_title(); ?></strong>
          </div>
          <?php the_content(); ?>
          <div class="rm-search-form">
            <form>
              <input type="search" name="" placeholder="Typ je vraag hier">
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
<?php endwhile; 

$terms = get_terms( array(
  'taxonomy' => 'faq',
  'orderby' => 'name',
  'order' => 'ASC',
  'hide_empty' => false,
) );
?>
<section class="faq-grd-sec">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="faq-grd-sec-inner">
          <?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){ ?>
          <div class="faq-tabs">
            <ul class="reset-list">
              <li class="active"><a href="<?php echo esc_url(home_url('faq') );?>">ALLE</a></li>
              <?php foreach ( $terms as $term ) { ?>
              <li><a href="<?php echo esc_url( get_term_link($term) );?>"><?php echo $term->name; ?></a></li>
              <?php } ?>
            </ul>
          </div>
          <?php } ?>
          <?php 
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $query = new WP_Query(array( 
                'post_type'=> 'faqs',
                'post_status' => 'publish',
                'posts_per_page' => 1,
                'orderby' => 'date',
                'order'=> 'desc',
                'paged' => $paged
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
        <?php endif; wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="faq-pagination">
          <?php 
            if( $query->max_num_pages > 1 ):
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
            else:
              echo '<div class="hasgap"></div>';
            endif; 
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>