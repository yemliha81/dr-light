<div>
    
    <div class="holder">
	    <div class="container">
		
		<div class="row">
			<div class="col-lg-18">
			    <?php if(!empty(json_decode($order['order_data'],1))){ ?>
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
                    <?php foreach(json_decode($order['order_data'],1) as $val){ ?>
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
                				    <div class="price-new"><s><?php echo ($val['price']);?> ₺</s></div>
                					<div class="price-new"><?php echo discount_20($val['price']);?> ₺</div>
                				</div>
                				
                			</div>
                			<div class="cart-table-prd-qty">
                				<div class="qty qty-changer">
                					<input type="text" class="qty-input" value="<?php echo $val['qty'];?>" data-min="0" data-max="1000">
                				</div>
                			</div>
                			<div class="cart-table-prd-price-total">
                				<?php echo discount_20($val['price']*$val['qty']);?> ₺
                			</div>
                		</div>
                		<div class="cart-table-prd-action">
                			
                		</div>
                	</div>
                	<?php } ?>
            	<?php } ?>
            </div>
        
        
	</div>
</div>