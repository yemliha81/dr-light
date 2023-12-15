<?php include('includes/header.php');?>
<div class="page-content" style="min-height: 4px;">

	<div class="holder">
	    <div class="container">
		<div class="page-title text-center">
			<h1><?php echo $this->mdl_common->get_lang()['shopping_cart'];?></h1>
		</div>
		<div class="row">
			<div class="col-lg-18">
			    <?php if(!empty($_SESSION['cart'])){ ?>
            	<div class="cart-table">
            	<div class="cart-table-prd cart-table-prd--head py-1 d-none d-md-flex">
            		<div class="cart-table-prd-image text-center">
            			<?php echo $this->mdl_common->get_lang()['img'];?>
            		</div>
            		<div class="cart-table-prd-content-wrap">
            			<div class="cart-table-prd-info"><?php echo $this->mdl_common->get_lang()['name'];?></div>
            			<div class="cart-table-prd-qty"><?php echo $this->mdl_common->get_lang()['qty'];?></div>
            			<div class="cart-table-prd-price"><?php echo $this->mdl_common->get_lang()['price'];?></div>
            			<div class="cart-table-prd-action">&nbsp;</div>
            		</div>
            	</div>
                    <?php foreach($_SESSION['cart'] as $val){ ?>
                	<div class="cart-table-prd row_<?php echo $val['row_id'];?>">
                		<div class="cart-table-prd-image">
                			<a href="#" class="prd-img">
                			    <img class="fade-up ls-is-cached lazyloaded" src="<?php echo $val['image'];?>" alt=""></a>
                		</div>
                		<div class="cart-table-prd-content-wrap">
                			<div class="cart-table-prd-info">
                				<h2 class="cart-table-prd-name">
                				    <a href="javascript:;"><?php echo $val['pro_name'];?></a>
                				</h2>
                				    <div><?php echo $val['variant'];?></div>
                				<div class="">
                				    <div class="price-new"><s><?php echo $val['price'];?> ₺</s></div>
                					<div class="price-new"><?php echo $val['discounted_price'] ?? discount_20($val['price']);?> ₺</div>
                				</div>
                				
                			</div>
                			<div class="cart-table-prd-qty">
                				<div class="qty qty-changer">
                					<input type="text" class="qty-input" value="<?php echo $val['qty'];?>" data-min="0" data-max="1000">
                				</div>
                			</div>
                			<div class="cart-table-prd-price-total">
                				<?php echo $val['discounted_price']*$val['qty'];?> ₺
                			</div>
                		</div>
                		<div class="cart-table-prd-action">
                			<a href="javascript:;" class="cart-table-prd-remove remove-from-cart" row="<?php echo $val['row_id'];?>"><i class="icon-recycle"></i></a>
                		</div>
                	</div>
                	<?php } ?>
            	<?php } ?>
            </div>
        <div class='minicart-drop-actions'>
            <a class='btn btn--md btn--grey' href='<?php echo FATHER_BASE;?>'><?php echo $this->mdl_common->get_lang()['continue_shopping'];?></a> 
            <a class='btn btn--md' href='<?php echo CHECKOUT;?>'><?php echo $this->mdl_common->get_lang()['go_to_checkout'];?></a>
        </div>
        
	</div>
    </div>
</div>
<?php include('includes/footer.php');?>