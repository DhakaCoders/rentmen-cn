<?php 
$thisID = get_the_ID();
$pageTitle = get_the_title($thisID);
?>
<section class="breadcrumbs-sec">
  <div class="container-lg">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumbs-innr hide-xs clearfix">
          <div class="breadcrumbs-lft-text">
            <?php if( is_single() || is_blog() ): ?>
              <h1 class="page-title">Nieuws</h1>
            <?php elseif( is_page('faq') ): ?>
              <h1 class="page-title">FAQ</h1>
            <?php else: ?>
              <h1 class="page-title"><?php echo $pageTitle; ?></h1>
            <?php endif; ?>
          </div>          
          <div class="breadcrumbs-main">
            <?php cbv_custom_both_breadcrump(); ?>
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