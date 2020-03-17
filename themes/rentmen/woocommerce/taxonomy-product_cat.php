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
              <div class="pro-overview-sidebar-cat pro-filter-con">
                <div class="pro-overview-sidebar-head">
                  <h3 class="sidebar-widget-title">Categorieen</h3>
                </div>
                <ul class="ulc pro-filter-main"> 
                  <li class="active">
                    <a href="#">
                      <i>
                        <img src="<?php echo THEME_URI; ?>/assets/images/overview-sidebar-table.svg" alt="">
                        <img src="<?php echo THEME_URI; ?>/assets/images/overview-sidebar-table-w.svg" alt="">
                      </i>
                      <span>Meubilair</span>
                    </a>
                  </li> 
                  <li>
                    <a href="#">
                      <i>
                        <img src="<?php echo THEME_URI; ?>/assets/images/overview-sidebar-table.svg" alt="">
                        <img src="<?php echo THEME_URI; ?>/assets/images/overview-sidebar-table-w.svg" alt="">
                      </i>
                      <span>Gedekte Tafel</span>
                    </a>
                  </li> 
                  <li>
                    <a href="#">
                      <i>
                        <img src="<?php echo THEME_URI; ?>/assets/images/overview-sidebar-table.svg" alt="">
                        <img src="<?php echo THEME_URI; ?>/assets/images/overview-sidebar-table-w.svg" alt="">
                      </i>
                      <span>Keukenmateriaal</span>
                    </a>
                  </li> 
                  <li>
                    <a href="#">
                      <i>
                        <img src="<?php echo THEME_URI; ?>/assets/images/overview-sidebar-table.svg" alt="">
                        <img src="<?php echo THEME_URI; ?>/assets/images/overview-sidebar-table-w.svg" alt="">
                      </i>
                      <span>Partytenten</span>
                    </a>
                  </li> 
                  <li>
                    <a href="#">
                      <i>
                        <img src="<?php echo THEME_URI; ?>/assets/images/overview-sidebar-table.svg" alt="">
                        <img src="<?php echo THEME_URI; ?>/assets/images/overview-sidebar-table-w.svg" alt="">
                      </i>
                      <span>Categorie Titel</span>
                    </a>
                  </li> 
                  <li>
                    <a href="#">
                      <i>
                        <img src="<?php echo THEME_URI; ?>/assets/images/overview-sidebar-table.svg" alt="">
                        <img src="<?php echo THEME_URI; ?>/assets/images/overview-sidebar-table-w.svg" alt="">
                      </i>
                      <span>Categorie Titel</span>
                    </a>
                  </li>  
                  <li>
                    <a href="#">
                      <i>
                        <img src="<?php echo THEME_URI; ?>/assets/images/overview-sidebar-table.svg" alt="">
                        <img src="<?php echo THEME_URI; ?>/assets/images/overview-sidebar-table-w.svg" alt="">
                      </i>
                      <span>Categorie Titel</span>
                    </a>
                  </li>              
                </ul>
              </div>
              <div class="pro-overview-sidebar-select pro-filter-con">
                <div class="pro-overview-sidebar-head">
                  <h3 class="sidebar-widget-title">Periode</h3>
                </div>                
                <div class="pro-overview-select-filter pro-filter-main">
                  <form action="">
                    <h6>van</h6>
                    <div class="select-filter-frm-grup clearfix">
                      <div class="select-filter-left">
                        <input type="text" placeholder="01">
                      </div>
                      <div class="select-filter-right reset-list">
                        <select class="selectpicker">
                          <option selected="selected">Maart</option>
                           <option>Maart 1</option>
                           <option>Maart 2</option>
                           <option>Maart 3</option>
                           <option>Maart 4</option>
                        </select>    
                      </div>
                    </div>
                    <h6>Naar</h6>
                    <div class="select-filter-frm-grup clearfix">
                      <div class="select-filter-left">
                        <input type="text" placeholder="04">
                      </div>
                      <div class="select-filter-right reset-list">
                        <select class="selectpicker">
                          <option selected="selected">Maart</option>
                           <option>Maart 1</option>
                           <option>Maart 2</option>
                           <option>Maart 3</option>
                           <option>Maart 4</option>
                        </select>    
                      </div>
                    </div>
                  </form>
                </div>
              </div>
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
              <div class="pro-overview-sidebar-filter pro-filter-con">
                <div class="pro-overview-sidebar-head">
                  <h3 class="sidebar-widget-title">Filter</h3>
                </div> 
                <div class="pro-check-box-filter pro-filter-main"> 
                  <form>
                    <div class="form-group">
                      <input type="checkbox" name="percent" id="checkfilter1">
                      <label for="checkfilter1">Lorem ipsum dolor</label>
                    </div>
                    <div class="form-group">
                      <input type="checkbox" name="percent" id="checkfilter2">
                      <label for="checkfilter2">Maecenas convallis nisi </label>
                    </div>
                    <div class="form-group">
                      <input type="checkbox" name="percent" id="checkfilter3">
                      <label for="checkfilter3">Suspendisse dignissim vulputate</label>
                    </div>
                    <div class="form-group">
                      <input type="checkbox" name="percent" id="checkfilter4">
                      <label for="checkfilter4">Donec feugiat lobortis</label>
                    </div>
                  </form>
                </div>
              </div>
              <div class="pro-overview-sidebar-color pro-filter-con">
                <div class="pro-overview-sidebar-head">
                  <h3 class="sidebar-widget-title">KLEUR</h3>
                </div> 
                <div class="pro-color-filter pro-filter-main"> 
                  <img style="margin-top:20px" src="<?php echo THEME_URI; ?>/assets/images/pro-color-filter-img.png" alt="">
                </div>
              </div>
            </div>
          </div>
          <div class="pro-overview-grid-con">
            <div class="pro-overview-grid-head hide-sm">
              <h2 class="producten-sec-title">Producten</h2>
            </div>
            <div class="pro-overview-single-des-con clearfix">
              <div class="pro-overview-single-img mHc">
                <span><img src="<?php echo THEME_URI; ?>/assets/images/pro-overview-single-img.png" alt=""></span>
                <a href="#" class="overlay-link"></a>
              </div>
              <div class="pro-overview-single-des text-white mHc">
                <h4>In De Kijker</h4>
                <h3 class="pro-overview-title-fea"><a href="#">Producten Titel</a></h3>
                <strong class="price">€ 29.99 / stuk</strong>
                <p>Cras in ultrices diam. Aliquam pharetra porttitor elit eget congue. Duis a tellus porta, mattis velit sagittis, sodales tellus.</p>
                <div class="pro-overview-single-des-link clearfix">
                  <a href="#">Meer Info</a>
                  <a href="#">
                    <svg class="overview-single-des-cart-svg" width="30" height="28" viewBox="0 0 30 28" fill="white">
                      <use xlink:href="#overview-single-des-cart-svg"></use>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
            <div class="pro-overview-grid-filter clearfix">              
              <div class="rm-selctpicker-ctlr reset-list clearfix">
                <span>Sorteer op: </span>
                <select class="selectpicker">
                  <option selected="selected">Prijs laag naar hoog </option>
                 <option>Prijs laag naar hoog 1</option>
                 <option>Prijs laag naar hoog 2</option>
                 <option>Prijs laag naar hoog 3</option>
                 <option>Prijs laag naar hoog 4</option>
                </select>
              </div>
            </div>
            <div class="pro-overview-grid-innr-wrp clearfix">
              <div class="pro-overview-grid-item">
                <div class="pro-overview-grid-item-innr">
                  <div class="pro-overview-grid-img mHc">
                    <a href="#">
                      <img src="<?php echo THEME_URI; ?>/assets/images/interestedItemSlider-img-1.png" alt="">
                    </a>
                  </div>
                  <div class="pro-overview-grid-des">
                    <h4 class="pro-overview-title"><a href="#">Producten Titel</a></h4>
                    <span>Lorem ipsum dolor sit amet</span>
                    <strong class="price">€ 29.99 / stel</strong>
                    <div class="pro-overview-grid-btm-lnc clearfix">
                      <a href="#">Meer Info</a>
                      <a href="#">
                        <svg class="overview-single-des-cart-svg" width="30" height="28" viewBox="0 0 30 28" fill="#ACABAB">
                          <use xlink:href="#overview-single-des-cart-svg"></use>
                        </svg>
                      </a>
                    </div>
                  </div>
                  <span class="pro-new-tag">New</span>                
                </div>  
              </div>
              <div class="pro-overview-grid-item">
                <div class="pro-overview-grid-item-innr">
                  <div class="pro-overview-grid-img mHc">
                    <a href="#">
                      <img src="<?php echo THEME_URI; ?>/assets/images/interestedItemSlider-img-2.png" alt="">
                    </a>
                  </div>
                  <div class="pro-overview-grid-des">
                    <h4 class="pro-overview-title"><a href="#">Producten Titel</a></h4>
                    <span>Lorem ipsum dolor sit amet</span>
                    <strong class="price">€ 29.99 / stel</strong>
                    <div class="pro-overview-grid-btm-lnc clearfix">
                      <a href="#">Meer Info</a>
                      <a href="#">
                        <svg class="overview-single-des-cart-svg" width="30" height="28" viewBox="0 0 30 28" fill="#ACABAB">
                          <use xlink:href="#overview-single-des-cart-svg"></use>
                        </svg>
                      </a>
                    </div>
                  </div>
                  <span class="pro-new-tag">New</span>                  
                </div>  
              </div>
              <div class="pro-overview-grid-item">
                <div class="pro-overview-grid-item-innr">
                  <div class="pro-overview-grid-img mHc">
                    <a href="#">
                      <img src="<?php echo THEME_URI; ?>/assets/images/interestedItemSlider-img-3.png" alt="">
                    </a>
                  </div>
                  <div class="pro-overview-grid-des">
                    <h4 class="pro-overview-title"><a href="#">Producten Titel</a></h4>
                    <span>Lorem ipsum dolor sit amet</span>
                    <strong class="price">€ 29.99 / stel</strong>
                    <div class="pro-overview-grid-btm-lnc clearfix">
                      <a href="#">Meer Info</a>
                      <a href="#">
                        <svg class="overview-single-des-cart-svg" width="30" height="28" viewBox="0 0 30 28" fill="#ACABAB">
                          <use xlink:href="#overview-single-des-cart-svg"></use>
                        </svg>
                      </a>
                    </div>
                  </div>                
                </div>  
              </div>
              <div class="pro-overview-grid-item">
                <div class="pro-overview-grid-item-innr">
                  <div class="pro-overview-grid-img mHc">
                    <a href="#">
                      <img src="<?php echo THEME_URI; ?>/assets/images/interestedItemSlider-img-3.png" alt="">
                    </a>
                  </div>
                  <div class="pro-overview-grid-des">
                    <h4 class="pro-overview-title"><a href="#">Producten Titel</a></h4>
                    <span>Lorem ipsum dolor sit amet</span>
                    <strong class="price">€ 29.99 / stel</strong>
                    <div class="pro-overview-grid-btm-lnc clearfix">
                      <a href="#">Meer Info</a>
                      <a href="#">
                        <svg class="overview-single-des-cart-svg" width="30" height="28" viewBox="0 0 30 28" fill="#ACABAB">
                          <use xlink:href="#overview-single-des-cart-svg"></use>
                        </svg>
                      </a>
                    </div>
                  </div>                
                </div>  
              </div>
              <div class="pro-overview-grid-item">
                <div class="pro-overview-grid-item-innr">
                  <div class="pro-overview-grid-img mHc">
                    <a href="#">
                      <img src="<?php echo THEME_URI; ?>/assets/images/interestedItemSlider-img-2.png" alt="">
                    </a>
                  </div>
                  <div class="pro-overview-grid-des">
                    <h4 class="pro-overview-title"><a href="#">Producten Titel</a></h4>
                    <span>Lorem ipsum dolor sit amet</span>
                    <strong class="price">€ 29.99 / stel</strong>
                    <div class="pro-overview-grid-btm-lnc clearfix">
                      <a href="#">Meer Info</a>
                      <a href="#">
                        <svg class="overview-single-des-cart-svg" width="30" height="28" viewBox="0 0 30 28" fill="#ACABAB">
                          <use xlink:href="#overview-single-des-cart-svg"></use>
                        </svg>
                      </a>
                    </div>
                  </div>                
                </div>  
              </div>
              <div class="pro-overview-grid-item">
                <div class="pro-overview-grid-item-innr">
                  <div class="pro-overview-grid-img mHc">
                    <a href="#">
                      <img src="<?php echo THEME_URI; ?>/assets/images/interestedItemSlider-img-1.png" alt="">
                    </a>
                  </div>
                  <div class="pro-overview-grid-des">
                    <h4 class="pro-overview-title"><a href="#">Producten Titel</a></h4>
                    <span>Lorem ipsum dolor sit amet</span>
                    <strong class="price">€ 29.99 / stel</strong>
                    <div class="pro-overview-grid-btm-lnc clearfix">
                      <a href="#">Meer Info</a>
                      <a href="#">
                        <svg class="overview-single-des-cart-svg" width="30" height="28" viewBox="0 0 30 28" fill="#ACABAB">
                          <use xlink:href="#overview-single-des-cart-svg"></use>
                        </svg>
                      </a>
                    </div>
                  </div>
                  <span class="pro-new-tag">New</span>                  
                </div>  
              </div>
              <div class="pro-overview-grid-item">
                <div class="pro-overview-grid-item-innr">
                  <div class="pro-overview-grid-img mHc">
                    <a href="#">
                      <img src="<?php echo THEME_URI; ?>/assets/images/interestedItemSlider-img-1.png" alt="">
                    </a>
                  </div>
                  <div class="pro-overview-grid-des">
                    <h4 class="pro-overview-title"><a href="#">Producten Titel</a></h4>
                    <span>Lorem ipsum dolor sit amet</span>
                    <strong class="price">€ 29.99 / stel</strong>
                    <div class="pro-overview-grid-btm-lnc clearfix">
                      <a href="#">Meer Info</a>
                      <a href="#">
                        <svg class="overview-single-des-cart-svg" width="30" height="28" viewBox="0 0 30 28" fill="#ACABAB">
                          <use xlink:href="#overview-single-des-cart-svg"></use>
                        </svg>
                      </a>
                    </div>
                  </div>                
                </div>  
              </div>
              <div class="pro-overview-grid-item">
                <div class="pro-overview-grid-item-innr">
                  <div class="pro-overview-grid-img mHc">
                    <a href="#">
                      <img src="<?php echo THEME_URI; ?>/assets/images/interestedItemSlider-img-2.png" alt="">
                    </a>
                  </div>
                  <div class="pro-overview-grid-des">
                    <h4 class="pro-overview-title"><a href="#">Producten Titel</a></h4>
                    <span>Lorem ipsum dolor sit amet</span>
                    <strong class="price">€ 29.99 / stel</strong>
                    <div class="pro-overview-grid-btm-lnc clearfix">
                      <a href="#">Meer Info</a>
                      <a href="#">
                        <svg class="overview-single-des-cart-svg" width="30" height="28" viewBox="0 0 30 28" fill="#ACABAB">
                          <use xlink:href="#overview-single-des-cart-svg"></use>
                        </svg>
                      </a>
                    </div>
                  </div> 
                  <span class="pro-new-tag">New</span>                
                </div>  
              </div>
              <div class="pro-overview-grid-item">
                <div class="pro-overview-grid-item-innr">
                  <div class="pro-overview-grid-img mHc">
                    <a href="#">
                      <img src="<?php echo THEME_URI; ?>/assets/images/interestedItemSlider-img-3.png" alt="">
                    </a>
                  </div>
                  <div class="pro-overview-grid-des">
                    <h4 class="pro-overview-title"><a href="#">Producten Titel</a></h4>
                    <span>Lorem ipsum dolor sit amet</span>
                    <strong class="price">€ 29.99 / stel</strong>
                    <div class="pro-overview-grid-btm-lnc clearfix">
                      <a href="#">Meer Info</a>
                      <a href="#">
                        <svg class="overview-single-des-cart-svg" width="30" height="28" viewBox="0 0 30 28" fill="#ACABAB">
                          <use xlink:href="#overview-single-des-cart-svg"></use>
                        </svg>
                      </a>
                    </div>
                  </div>                 
                </div>  
              </div>
              <div class="pro-overview-grid-item">
                <div class="pro-overview-grid-item-innr">
                  <div class="pro-overview-grid-img mHc">
                    <a href="#">
                      <img src="<?php echo THEME_URI; ?>/assets/images/interestedItemSlider-img-3.png" alt="">
                    </a>
                  </div>
                  <div class="pro-overview-grid-des">
                    <h4 class="pro-overview-title"><a href="#">Producten Titel</a></h4>
                    <span>Lorem ipsum dolor sit amet</span>
                    <strong class="price">€ 29.99 / stel</strong>
                    <div class="pro-overview-grid-btm-lnc clearfix">
                      <a href="#">Meer Info</a>
                      <a href="#">
                        <svg class="overview-single-des-cart-svg" width="30" height="28" viewBox="0 0 30 28" fill="#ACABAB">
                          <use xlink:href="#overview-single-des-cart-svg"></use>
                        </svg>
                      </a>
                    </div>
                  </div>                
                </div>  
              </div>
              <div class="pro-overview-grid-item">
                <div class="pro-overview-grid-item-innr">
                  <div class="pro-overview-grid-img mHc">
                    <a href="#">
                      <img src="<?php echo THEME_URI; ?>/assets/images/interestedItemSlider-img-2.png" alt="">
                    </a>
                  </div>
                  <div class="pro-overview-grid-des">
                    <h4 class="pro-overview-title"><a href="#">Producten Titel</a></h4>
                    <span>Lorem ipsum dolor sit amet</span>
                    <strong class="price">€ 29.99 / stel</strong>
                    <div class="pro-overview-grid-btm-lnc clearfix">
                      <a href="#">Meer Info</a>
                      <a href="#">
                        <svg class="overview-single-des-cart-svg" width="30" height="28" viewBox="0 0 30 28" fill="#ACABAB">
                          <use xlink:href="#overview-single-des-cart-svg"></use>
                        </svg>
                      </a>
                    </div>
                  </div>                
                </div>  
              </div>
              <div class="pro-overview-grid-item">
                <div class="pro-overview-grid-item-innr">
                  <div class="pro-overview-grid-img mHc">
                    <a href="#">
                      <img src="<?php echo THEME_URI; ?>/assets/images/interestedItemSlider-img-1.png" alt="">
                    </a>
                  </div>
                  <div class="pro-overview-grid-des">
                    <h4 class="pro-overview-title"><a href="#">Producten Titel</a></h4>
                    <span>Lorem ipsum dolor sit amet</span>
                    <strong class="price">€ 29.99 / stel</strong>
                    <div class="pro-overview-grid-btm-lnc clearfix">
                      <a href="#">Meer Info</a>
                      <a href="#">
                        <svg class="overview-single-des-cart-svg" width="30" height="28" viewBox="0 0 30 28" fill="#ACABAB">
                          <use xlink:href="#overview-single-des-cart-svg"></use>
                        </svg>
                      </a>
                    </div>
                  </div>                
                </div>  
              </div>
            </div>
            <div class="pro-overview-pagination">
              <div class="faq-pagination">
                <ul>
                  <li><span class="page-numbers current">1</span></li>
                  <li><a class="page-numbers" href="#">2</a></li>
                  <li><a class="page-numbers" href="#">3</a></li>
                </ul>
              </div>  
            </div>  
          </div>
        </div>
      </div>
    </div>
  </div>    
</section>


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
<?php get_footer(); ?>