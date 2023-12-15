<?php include('includes/header.php');?>
<style>
    .redb1{
        border: 2px solid red;
    }
    .redb2{
        border: 2px solid red;
    }
    .redb3{
        border: 2px solid red;
    }
    .smm > small{
        font-size:11px !important;
        white-space:nowrap;
    }
</style>
<div class="page-content" style="min-height: 4px;">
	
<div class="holder">
	<div class="container">
		<h1 class="text-center"><?php echo $this->mdl_common->get_lang()['order_pay'];?></h1>
		<div class="row">
			<div class="col-md-8">
				<div class="panel-group panel-group--style1" id="checkoutAccordion">
					<form action='<?php echo ORDER_SAVE_POST;?>' method='post' onsubmit='return false'>
    					<div class="panel">
    						<div class="panel-heading active">
    							<h4 class="panel-title">
    								<a data-toggle="collapse" href="#step1" class="" aria-expanded="true"><?php echo $this->mdl_common->get_lang()['payment_form'];?></a>
    								<span class="toggle-arrow"><span></span><span></span></span>
    							</h4>
    						</div>
    						<div id="step1" data-parent="#checkoutAccordion" class="panel-collapse collapse show" style="">
    							<div class="panel-body">
    								<div class="panel-body-inside">
    									<div class='cc_form'>
    									    <div id="iyzipay-checkout-form" class="responsive"></div>
    									</div>
    								</div>
    							</div>
    						</div>
    					</div>
					</form>
				</div>
			</div>
			<div class="col-md-10 pl-lg-8 mt-2 mt-md-0">
				<h2 class="custom-color"><?php echo $this->mdl_common->get_lang()['order_summary'];?></h2>
				<?php if(!empty($_SESSION['cart'])){ ?>
            	<div class="cart-table">
            	
            	<table class='table'>
            	    <thead>
            	        <tr>
            	            <td><?php echo $this->mdl_common->get_lang()['img'];?></td>
            	            <td><?php echo $this->mdl_common->get_lang()['name'];?></td>
            	            <td><?php echo $this->mdl_common->get_lang()['qty'];?></td>
            	            <td><?php echo $this->mdl_common->get_lang()['price'];?></td>
            	        </tr>
            	    </thead>
            	    <tbody>
            	        <?php foreach($_SESSION['cart'] as $val){ ?>
            	        <tr>
            	            <td><img class="fade-up ls-is-cached lazyloaded" src="<?php echo $val['image'];?>" width="120"></td>
            	            <td><?php echo $val['pro_name'];?> <br> <?php echo $val['variant'];?></td>
            	            <td><?php echo $val['qty'];?></td>
            	            <td>
            	                <div><s><?php echo number_format(($val['price']*$val['qty']),2);?> ₺</s></div>
                				<?php echo number_format(($val['discounted_price']*$val['qty']),2);?> ₺
            	            </td>
            	        </tr>
            	        <?php $total += $val['discounted_price']*$val['qty']; ?>
                	    <?php } ?>
            	    </tbody>
            	</table>
            	
            	
                   
            	<?php } ?>
				<div class="mt-2"></div>
				
				<div class="cart-total-sm">
					<span><?php echo $this->mdl_common->get_lang()['sub_total'];?></span>
					<span class="card-total-price"><?php echo number_format($total,2); ?> ₺</span>
				</div>
				<div class="mt-2"></div>
				
			</div>
		</div>
	</div>
</div>
</div>
<?php include('includes/footer.php');?>
<?php echo $payment_form;?>