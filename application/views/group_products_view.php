<?php include('includes/header.php');?>
<?php include('lang/product_'.$lang.'.php');?>
<style>
    select {
    -moz-appearance: auto !important;
    -webkit-appearance: auto !important;
}
.option-label{
    width:135px;
}
.pro-name{
    font-size:22px;
    font-weight:bold;
}

</style>
<div class="page-content">
         <div class="holder">
            <div class="container" style="padding: 0">
               <div class="title-wrap text-center">
                  <h2 class="h1-style">Ürün varyantları.</h2>
               </div>
               <div class="prd-grid-wrap position-relative">
                  <div class="prd-grid data-to-show-4 data-to-show-lg-4 data-to-show-md-3 data-to-show-sm-2 data-to-show-xs-2 js-category-grid" data-grid-tab-content>
                     <?php foreach($group_products as $pr){ ?>
                     <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                        <div class="prd-inside">
                           <div class="prd-img-area">
                              <a href="<?php echo PRODUCT_DETAIL.$pr['id'];?>" class="prd-img image-hover-scale image-container">
                                 <img data-src="<?php echo PRODUCT_IMAGE_PATH;?>400/<?php echo $pr['product_image'];?>" alt="" class="js-prd-img lazyload fade-up">
                              </a>

                           </div>
                           <div class="prd-info">
                              <div class="prd-info-wrap">
                                 <div class="prd-tag"><a href="#"><?php echo $pr['category_name_'.$lang];?></a></div>
                                 <h2 class="prd-title"><?php echo $pr['product_name_'.$lang];?></h2>
                              </div>
                              <div class="prd-hovers">
                                 <div class="prd-price" style='display:block; text-align:center;'>
                                    <div class="price-new pr1"><?php echo $pr['product_price'];?> TL</div> 
                                    <div class="price-new pr2"><?php echo $this->mdl_common->get_lang()['sepet_indirim'];?> <br> <?php echo discount_20($pr['product_price']);?> TL</div>
                                 </div>
                                 <div class="prd-action">
                                    <div class="prd-action-left">
                                       
                                        <a href='<?php echo PRODUCT_DETAIL.$pr['id'];?>' class="btn" >İNCELE</a>
                                       
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
      </div>
<?php include('includes/footer.php');?>