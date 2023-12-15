<?php $lang = $_SESSION['lang'];?>
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
<?php }else{ ?>


<?php } ?>