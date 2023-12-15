<?php include('includes/header.php');?>
<style>
    .sidebar-block_content{
        max-height:200px;
        overflow-y:auto;
    }
    .sidebar-block_content input{
        display:unset !important;
    }
    .sidebar-block_content label{
        display: flex;
        gap: 10px;
        align-items: center;
        justify-content: flex-start;
        cursor:pointer;
    }
</style>
<?php include('lang/category_'.$lang.'.php');?>
<div class="page-content" style="min-height: 232.844px;">
 <div class="holder mt-0" style="margin-bottom:50px;">
    <div class="container text-center" style="font-weight: bold; font-size: 30px;">
       <?php echo $cat['category_name_'.$lang];?>
    </div>
 </div>
 <div class="holder mt-0">
    <div class="container">
       <div class="filter-row">
          <div class="row">
             <div class="items-count"></div>
             <div class="select-wrap d-none d-md-flex">
                <div class="select-label"><?php echo $this->mdl_common->get_lang()['sort_by'];?>:</div>
                <div class="select-wrapper select-wrapper-xxs">
                   <select class="form-control input-sm sort_by">
                       <option></option>
                      <option value="price_desc" <?php echo ($_GET['sort'] == 'price_desc' ? 'selected' : '');?> ><?php echo $this->mdl_common->get_lang()['sort_by_price_desc'];?></option>
                      <option value="price_asc" <?php echo ($_GET['sort'] == 'price_asc' ? 'selected' : '');?>><?php echo $this->mdl_common->get_lang()['sort_by_price_asc'];?></option>
                   </select>
                </div>
             </div>
             <div class="select-wrap d-none d-md-flex">
                <div class="select-label"><?php echo $this->mdl_common->get_lang()['display'];?>:</div>
                <div class="select-wrapper select-wrapper-xxs">
                   <select class="form-control input-sm">
                      <option value="featured">12</option>
                      <option value="rating">36</option>
                      <option value="price">100</option>
                   </select>
                </div>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-lg-4 aside aside--left filter-col filter-mobile-col filter-col--sticky js-filter-col filter-col--opened-desktop filter-col--init" data-grid-tab-content="" style="left: 0px;">
             <div class="filter-col-content filter-mobile-content">
                <form id='filterForm'>
                    <div class="sidebar-block">
                       <div class="sidebar-block_title">
                          <span><?php echo $this->mdl_common->get_lang()['govde_rengi'];?></span>
                       </div>
                       <div class="sidebar-block_content">
                           <?php foreach($govde_rengi as $color){ ?>
                              <div>
                                 <label for='govde_rengi_<?php echo $color['id'];?>'>
                                     <input id='govde_rengi_<?php echo $color['id'];?>' type='checkbox' name='govde_rengi[]' value='<?php echo $color['id'];?>' />
                                     <img src="<?php echo VARIANT_IMG_PATH.$color['variant_image'];?>" width="20"> <?php echo $color['variant_name_'.$lang];?>
                                 </label>
                              </div>
                           <?php } ?>
                       </div>
                    </div>
                    <div class="sidebar-block">
                       <div class="sidebar-block_title">
                          <span><?php echo $this->mdl_common->get_lang()['cam_deseni'];?></span>
                       </div>
                       <div class="sidebar-block_content">
                           <?php foreach($cam_deseni as $color){ ?>
                              <div>
                                 <label for='cam_deseni_<?php echo $color['id'];?>'>
                                     <input id='cam_deseni_<?php echo $color['id'];?>' type='checkbox' name='cam_deseni[]' value='<?php echo $color['id'];?>' />
                                     <img src="<?php echo VARIANT_IMG_PATH.$color['variant_image'];?>" width="20"> <?php echo $color['variant_name_'.$lang];?>
                                 </label>
                              </div>
                           <?php } ?>
                       </div>
                    </div>
                    <div class="sidebar-block">
                       <div class="sidebar-block_title">
                          <span><?php echo $this->mdl_common->get_lang()['mermer_rengi'];?></span>
                       </div>
                       <div class="sidebar-block_content">
                           <?php foreach($mermer_rengi as $color){ ?>
                              <div>
                                 <label for='mermer_rengi_<?php echo $color['id'];?>'>
                                     <input id='mermer_rengi_<?php echo $color['id'];?>' type='checkbox' name='mermer_rengi[]' value='<?php echo $color['id'];?>' />
                                     <img src="<?php echo VARIANT_IMG_PATH.$color['variant_image'];?>" width="20"> <?php echo $color['variant_name_'.$lang];?>
                                 </label>
                              </div>
                           <?php } ?>
                       </div>
                    </div>
                    <div class="sidebar-block">
                       <div class="sidebar-block_title">
                          <span><?php echo $this->mdl_common->get_lang()['sapka_rengi'];?></span>
                       </div>
                       <div class="sidebar-block_content">
                           <?php foreach($sapka_rengi as $color){ ?>
                              <div>
                                 <label for='sapka_rengi_<?php echo $color['id'];?>'>
                                     <input id='sapka_rengi_<?php echo $color['id'];?>' type='checkbox' name='sapka_rengi[]' value='<?php echo $color['id'];?>' />
                                     <img src="<?php echo VARIANT_IMG_PATH.$color['variant_image'];?>" width="20"> <?php echo $color['variant_name_'.$lang];?>
                                 </label>
                              </div>
                           <?php } ?>
                       </div>
                    </div>
                    <div class="sidebar-block">
                       <div class="sidebar-block_title">
                          <span><?php echo $this->mdl_common->get_lang()['ic_renk'];?></span>
                       </div>
                       <div class="sidebar-block_content">
                           <?php foreach($ic_renk as $color){ ?>
                              <div>
                                 <label for='ic_renk_<?php echo $color['id'];?>'>
                                     <input id='ic_renk_<?php echo $color['id'];?>' type='checkbox' name='ic_renk[]' value='<?php echo $color['id'];?>' />
                                     <img src="<?php echo VARIANT_IMG_PATH.$color['variant_image'];?>" width="20"> <?php echo $color['variant_name_'.$lang];?>
                                 </label>
                              </div>
                           <?php } ?>
                       </div>
                    </div>
                    <input type='hidden' name='cat_id' value='<?echo $cat['id'];?>'/>
                </form>
                <div class="sidebar-block">
                   <div>
                       <img src='<?php echo ASSETS;?>images/cat_banner1.png' width='100%' />
                   </div>
                   <div>
                       <img style='max-width:unset; width:113% !important;' src='<?php echo ASSETS;?>images/cat_banner2.png'  />
                   </div>
                </div>
             </div>
          </div>
          <div class="filter-toggle js-filter-toggle" style="">
             <div class="loader-horizontal js-loader-horizontal">
                <div class="progress">
                   <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%"></div>
                </div>
             </div>
             <span class="filter-toggle-icons js-filter-btn"><i class="icon-filter"></i><i class="icon-filter-close"></i></span>
             <span class="filter-toggle-text"><a href="#" class="filter-btn-open js-filter-btn">FİLTRELE</a><a href="#" class="filter-btn-close js-filter-btn">SIFIRLA</a><a href="#" class="filter-btn-apply js-filter-btn">UYGULA &amp; KAPAT</a></span>
          </div>
          <div class="col-lg aside">
             <div class="prd-grid-wrap position-relative">
                <div class="prd-zone prd-grid data-to-show-3 data-to-show-lg-3 data-to-show-md-3 data-to-show-sm-2 data-to-show-xs-2 js-category-grid" data-grid-tab-content="">
                   <?php if(!empty($products)){ ?>
                       <?php foreach($products as $product){ ?>
                        <div class="prd prd--style2 prd-labels--max prd-labels-shadow prd-w-lg">
                          <div class="prd-inside">
                             <div class="prd-img-area">
                                <a href="<?php echo PRODUCT_DETAIL.$product['id'];?>" class="prd-img image-hover-scale image-container">
                                   <img src="<?php echo PRODUCT_IMAGE_PATH;?>400/<?php echo explode(',', $product['product_image'])[0];?>" alt="<?php echo $product['product_name_'.$lang];?>" class="js-prd-img fade-up ls-is-cached lazyloaded">
                                   <div class="foxic-loader"></div>
                                   <div class="prd-big-squared-labels">
                                      
                                   </div>
                                </a>
    
                             </div>
                             <div class="prd-info">
                                <div class="prd-info-wrap">
                                   <div class="prd-tag"><a href="#"><?php echo $cat['category_name_'.$lang];?></a></div>
                                   <h2 class="prd-title"><a href="<?php echo PRODUCT_DETAIL.$product['id'];?>"><?php echo $product['product_name_'.$lang];?></a></h2>
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
                   <?php } ?>
                </div>
                <div  class="align-items-center justify-content-center loader_icon" style="height: 120px;display:none;text-align:center; padding-top:30px;"><span class="foxic-loader"></span></div>
                <div style='text-align:center; margin-top:50px;'>
                    <a href='javascript:;' class='load_more'><?php echo $this->mdl_common->get_lang()['load_more'];?></a>
                </div>
                <div class='filtering' style='position:absolute; top:0; bottom:0; left:0; right:0; background:rgba(0,0,0,0.5);text-align:center; padding-top:30px; z-index:11; display:none;'><span class="foxic-loader"></span></div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <div class="holder">
    <div class="container">
       <div class="title-wrap text-center">
          <h2 class="h1-style"><?php echo $youMayLike;?></h2>
          <div class="carousel-arrows carousel-arrows--center"></div>
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
 <div class="holder">
    <div class="container">
         <?php $catlist = $this->mdl_common->get_categories(); ?>
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
</div>
<?php include('includes/footer.php');?>
<script>
let page = 1;
    $(document).on('change', '.sort_by', function(){
        var sort = $(this).val();
        window.location.href = '<?php $url;?>?sort='+sort;
    })
    $('.load_more').click(function(){
        $('.loader_icon').show();
        $.ajax({
           type : 'get',
           url : '<?echo FATHER_BASE;?>category/products_ajax/<?echo $cat['id'];?>?page='+(page+1),
           success : function(response){
               setTimeout(function(){
                   $('.prd-zone').append(response);
                   page++;
                   $('.loader_icon').hide();
               },1500)
               
           }
        });
    })
    $(document).on('change', '.sidebar-block input', function(){
        $('.filtering').show();
        var dataForm = $('#filterForm').serialize()
        
        $.ajax({
            type : 'post',
            data : dataForm,
            url : '<?echo FATHER_BASE;?>category/filter_products',
            success : function(response){
                setTimeout(function(){
                   $('.prd-zone').html(response);
                   page++;
                   $('.filtering').fadeOut();
                   
               },1500)
               
            }
        })
        
    })
    
</script>