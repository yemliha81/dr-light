<?php include('includes/header.php');?>
<?php include('lang/home_'.$lang.'.php');?>
<style>
    .categories_list .slick-list .slick-track{
        display: flex;
        gap: 20px;
    }
    .tb_sp_post_wrapper >a{
        display:none !important;
    }
</style>
    <div class="page-content">
         <div class="holder fullwidth full-nopad mt-0">
            <div class="container">
               <div class="bnslider-wrapper">
                  <div class="bnslider bnslider--lg keep-scale" id="bnslider-001" data-slick='{"arrows": true, "dots": false  }' data-autoplay="false" data-speed="12000" data-start-width="1917" data-start-height="764" data-start-mwidth="1550" data-start-mheight="1000">
                     <?php foreach($banners as $banner){ ?>
                         <div class="bnslider-slide">
                            <a href='<?php echo $banner['banner_url'];?>' target='_blank'>
                                <img src="<?php echo BANNER_PATH.'1000/'.$banner['banner_image'];?>" width="100%">
                            </a>
                         </div>
                     <?php } ?>
                  </div>
                  <div class="bnslider-arrows container-fluid">
                     <div></div>
                  </div>
                  <div class="bnslider-dots container-fluid"></div>
               </div>
            </div>
         </div>
         <div class=" m-0" style='display:none;'>
            <div class="container" style="">
               <div class="row" style="border: 1px solid #ddd;">
                  <div class="col-sm">
                     <div class="fl1">
                        <div style="">
                           <img src="<?php echo ASSETS;?>icons/icon1.png" alt="">
                        </div>
                        <div class="left p-15">
                           <h3 class="collection-grid-3-title"><?php echo $text1;?></h3>
                           <h4 class="collection-grid-3-subtitle"><?php echo $text1sub;?></h4>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm">
                     <div class="fl1">
                        <div style="">
                           <img src="<?php echo ASSETS;?>icons/icon2.png" alt="">
                        </div>
                        <div class="left p-15">
                           <h3 class="collection-grid-3-title"><?php echo $text2;?></h3>
                           <h4 class="collection-grid-3-subtitle"><?php echo $text2sub;?></h4>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm">
                     <div class="fl1">
                        <div style="">
                           <img src="<?php echo ASSETS;?>icons/icon3.png" alt="">
                        </div>
                        <div class="left p-15">
                           <h3 class="collection-grid-3-title"><?php echo $text3;?></h3>
                           <h4 class="collection-grid-3-subtitle"><?php echo $text3sub;?></h4>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm">
                     <div class="fl1">
                        <div style="">
                           <img src="<?php echo ASSETS;?>icons/icon4.png" alt="">
                        </div>
                        <div class="left p-15">
                           <h3 class="collection-grid-3-title"><?php echo $text4;?></h3>
                           <h4 class="collection-grid-3-subtitle"><?php echo $text4sub;?></h4>
                        </div>
                     </div>
                  </div>
                  <div style="clear: both"></div>
               </div>
            </div>
         </div>
         <div class="">
            <div class="ttl text-center">
               <?php echo $categoriesTxt;?>
            </div>
            <div class="container" style="padding: 0">
               <div class="grid-5 categories_list">
                  <?php foreach($this->mdl_common->get_categories() as $category){ ?>
                      <a href='<?php echo CATEGORY_DETAIL.$category['category_seo_name'];?>'>
                         <div class="">
                            <img src="<?php echo CATEGORY_IMAGE_PATH.'400/'.$category['category_image'];?>" width='100%' alt="">
                         </div>
                         <div class="catName">
                            <?php echo strtolower($category['category_name_'.$lang]);?>.
                         </div>
                         <div class="proCount"></div>
                         <div class="dtBtn"><?php echo $this->mdl_common->get_lang()['cat_details'];?> <i class="icon-info"></i></div>
                      </a>
                  <?php } ?>
               </div>
            </div>
         </div>
         <div class="holder">
            <div class="container" style="padding: 0">
               <img src="<?php echo ASSETS;?>images/dr-light-banner.jpg" width="100%">
            </div>
         </div>
         <div class="holder p-15">
            <div class="container" style="padding: 0">
               <div class="title-wrap text-center">
                  <h2 class="h1-style asdasd"><?php echo $this->mdl_common->get_lang()['new_products'];?>.</h2>
               </div>
               <div class="prd-grid-wrap position-relative">
                  <div class="prd-grid data-to-show-4 data-to-show-lg-4 data-to-show-md-3 data-to-show-sm-2 data-to-show-xs-2 js-category-grid" data-grid-tab-content>
                     <?php foreach($last_products as $product){ ?>
                     <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                        <div class="prd-inside">
                           <div class="prd-img-area">
                              <a href="<?php echo PRODUCT_DETAIL.$product['id'];?>" class="prd-img image-hover-scale image-container">
                                 <img data-src="<?php echo PRODUCT_IMAGE_PATH;?>400/<?php echo explode(',', $product['product_image'])[0];?>" alt="" class="js-prd-img lazyload fade-up">
                              </a>

                           </div>
                           <div class="prd-info">
                              <div class="prd-info-wrap">
                                 <div class="prd-info-top">
                                    <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                 </div>
                                 <div class="prd-tag"><a href="#"><?php echo $product['category_name_'.$lang];?></a></div>
                                 <h2 class="prd-title"><?php echo $product['product_name_'.$lang];?></h2>
                              </div>
                              <div class="prd-hovers">
                                 <div class="prd-price" style='display:block; text-align:center;'>
                                    <div class="price-new pr1"><?php echo $product['product_price'];?> TL</div> 
                                    <?php if(empty($product['discount_price'])){ ?>
                                        <div class="price-new pr2"><?php echo $this->mdl_common->get_lang()['sepet_indirim'];?> <br><?php echo discount_20($product['product_price']);?> TL</div>
                                 
                                    <?php }else{ ?>
                                        <div class="price-new pr2"><?php echo $this->mdl_common->get_lang()['sepet_ozel_indirim'];?> <br><?php echo $product['discount_price'];?> TL</div>
                                    <?php } ?>
                                 
                                 </div>
                                 <div class="prd-action">
                                    <div class="prd-action-left">
                                       
                                        <a href='<?php echo PRODUCT_DETAIL.$product['id'];?>' class="btn" ><?php echo $this->mdl_common->get_lang()['details_btn'];?></a>
                                       
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php } ?>
                  </div>
               </div>
            </div>
         </div>
         <div style='display:none;'>
             <?php $catlist = $this->mdl_common->get_categories(); ?>
                  <div class="">
                      <?php echo $category['category_name_tr'];?>
                    <img src="<?php echo CATEGORY_IMAGE_PATH.'400/'.$category['category_banner_image'];?>" width='100%' alt="">
                 </div>
         </div>
         <div class="holder">
            <div class="container">
               <div class="grid-1-2">
                  <div>
                      <a href='<?php echo CATEGORY_DETAIL;?>sarkit'>
                          <img src="<?php echo CATEGORY_IMAGE_PATH.'400/'.$catlist[0]['category_banner_image'];?>" width="100%">
                      </a>
                  </div>
                  <div class="grid-1-1">
                     <div style='overflow:hidden'>
                        <a href='<?php echo CATEGORY_DETAIL;?>lambader'>
                          <img src="<?php echo CATEGORY_IMAGE_PATH.'400/'.$catlist[3]['category_banner_image'];?>" width="103%" style='max-width:unset'>
                      </a>
                     </div>
                     <div style='overflow:hidden'>
                        <a href='<?php echo CATEGORY_DETAIL;?>masa-lambasi'>
                          <img src="<?php echo CATEGORY_IMAGE_PATH.'400/'.$catlist[2]['category_banner_image'];?>" width="103%" style='max-width:unset'>
                      </a>
                     </div>
                     <div style='overflow:hidden'>
                        <a href='<?php echo CATEGORY_DETAIL;?>aplik'>
                          <img src="<?php echo CATEGORY_IMAGE_PATH.'400/'.$catlist[1]['category_banner_image'];?>" width="103%" style='max-width:unset'>
                      </a>
                     </div>
                     <div style='overflow:hidden'>
                        <a href='<?php echo CATEGORY_DETAIL;?>aksesuar'>
                          <img src="<?php echo CATEGORY_IMAGE_PATH.'400/'.$catlist[4]['category_banner_image'];?>" width="103%" style='max-width:unset'>
                      </a>
                     </div>
                  </div>
                  <div>
                  </div>
               </div>
            </div>
         </div>
         <div class="holder p-15">
            <div class="container" style="padding: 0;position:relative;">
              <div data-mc-src="e8a94ecc-57d0-442d-bbb3-b049e6663a21#instagram"></div>
        
            <script 
              src="https://cdn2.woxo.tech/a.js#62cc66f126c702b242f442ca" 
              async data-usrc>
            </script>
                <div style='height: 65px;
                            position: absolute;
                            left: 0;
                            right: 0;
                            background: #ffffff;
                            z-index: 999999;
                            bottom: 5px;'></div>
                <!--<div class="">
                  <script src="https://apps.elfsight.com/p/platform.js" defer></script>
                <div class="elfsight-app-35c2e249-c7c3-4f5b-9972-f6bc60171626"></div>

               </div>
               
                            
               <div class="taggbox-container" style="width:100%;height:100%;overflow: auto;"><div class="taggbox-socialwall" data-wall-id="99152" view-url="https://widget.taggbox.com/99152"></div><script src="https://widget.taggbox.com/embed-lite.min.js" type="text/javascript"></script></div>            </div>
         -->
         </div>
      </div>
      
<?php include('includes/footer.php');?>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
    $(document).ready(function(){
        
        
        $('.categories_list').slick({
            infinite: true,
          slidesToShow: 5,
          slidesToScroll: 1,
          autoplay:true,
          responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1
              }
            }
          ]
        });
        
        
        
    })
</script>
