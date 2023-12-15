<div class="dropdn-content-block">
   <div class="dropdn-close"><span class="js-dropdn-close">x</span></div>
   <div class="minicart-drop-content js-dropdn-content-scroll">
      <?php if(!empty($_SESSION['cart'])){ ?>
        <?php foreach($_SESSION['cart'] as $val){ ?>
            <div class="minicart-prd row">
             <div class="minicart-prd-image image-hover-scale-circle col">
                <a href="javascript:;"><img class="lazyload fade-up" src="<?php echo $val['image'];?>"  alt=""></a>
             </div>
             <div class="minicart-prd-info col">
                <h2 class="minicart-prd-name"><a href="#"><?php echo $val['pro_name'];?></a></h2>
                <h4 class="minicart-prd-name" style='font-size:12px;'><?php echo $val['variant'];?></h4>
                <div class="minicart-prd-qty"><span class="minicart-prd-qty-label"><?php echo $this->mdl_common->get_lang()['qty'];?>:</span><span class="minicart-prd-qty-value"><?php echo $val['qty'];?></span></div>
                <div class="minicart-prd-price prd-price">
                   <div class="price-new"><s><?php echo $val['price'];?></s> <span><?php echo $val['discounted_price'];?></span> ₺</div>
                </div>
             </div>
             <div class="minicart-prd-action">
                <a href="#" class="js-product-remove remove-from-cart" row="<?php echo $val['row_id'];?>"><i class="icon-recycle"></i></a>
             </div>
          </div>
          <?php $total += ($val['discounted_price']*$val['qty']); ?>
        <?php } ?>
        
      <div class="minicart-drop-info d-none d-md-block">
         <div class="shop-feature-single row no-gutters align-items-center">
            <div class="shop-feature-icon col-auto"><i class="icon-truck"></i></div>
            <div class="shop-feature-text col"></div>
         </div>
      </div>
      
      
      </div>
   <div class="minicart-drop-fixed js-hide-empty">
      <div class="loader-horizontal-sm js-loader-horizontal-sm" data-loader-horizontal=""><span></span></div>
      <div class="minicart-drop-total js-minicart-drop-total row no-gutters align-items-center">
         <div class="minicart-drop-total-txt col-auto heading-font"><?php echo $this->mdl_common->get_lang()['sub_total'];?></div>
         <div class="minicart-drop-total-price col" data-header-cart-total=""><?php echo $total; ?> ₺</div>
      </div>
      <div class="minicart-drop-actions">
         <a href="<?php echo CART;?>" class="btn btn--md btn--grey"><i class="icon-basket"></i><span><?php echo $this->mdl_common->get_lang()['my_cart'];?></span></a>
         <a href="<?php echo CHECKOUT;?>" class="btn btn--md"><i class="icon-checkout"></i><span><?php echo $this->mdl_common->get_lang()['checkout'];?></span></a>
      </div>

   </div>
      
    <?php }else{ ?>
    <div class="minicart-empty js-minicart-empty">
     <div class="minicart-empty-text"><?php echo $this->mdl_common->get_lang()['empty_cart'];?></div>
     <div class="minicart-empty-icon">
        <i class="icon-shopping-bag"></i>
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 306 262" style="enable-background:new 0 0 306 262;" xml:space="preserve">
           <path class="st0" d="M78.1,59.5c0,0-37.3,22-26.7,85s59.7,237,142.7,283s193,56,313-84s21-206-69-240s-249.4-67-309-60C94.6,47.6,78.1,59.5,78.1,59.5z"/>
        </svg>
     </div>
    </div>
    
    <?php } ?>
   
</div>
<div class="drop-overlay js-dropdn-close"></div>
