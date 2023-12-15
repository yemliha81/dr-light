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
    								<a data-toggle="collapse" href="#step1" class="" aria-expanded="true">01. <?php echo $this->mdl_common->get_lang()['shipping_address'];?></a>
    								<span class="toggle-arrow"><span></span><span></span></span>
    							</h4>
    						</div>
    						<div id="step1" data-parent="#checkoutAccordion" class="panel-collapse collapse show" style="">
    							<div class="panel-body">
    								<div class="panel-body-inside">
    									<div class="row mt-2">
    										<div class="col-sm-9">
    											<label><?php echo $this->mdl_common->get_lang()['first_name'];?>:</label>
    											<div class="form-group">
    												<input type="text" name='first_name' class="form-control form-control--sm step_1_req" required>
    											</div>
    										</div>
    										<div class="col-sm-9">
    											<label><?php echo $this->mdl_common->get_lang()['last_name'];?>:</label>
    											<div class="form-group">
    												<input type="text" name='last_name' class="form-control form-control--sm step_1_req" required>
    											</div>
    										</div>
    									</div>
    									<div class="mt-2"></div>
    									<div class="row mt-2">
    									
    									<div class="col-sm-18">
    											<label><?php echo $this->mdl_common->get_lang()['gsm'];?>:</label>
    											<div class="form-group">
    												<input type="number" name='phone' class="form-control form-control--sm step_1_req" required >
    											</div>
    										</div>
    									</div>
    									<div class="row mt-2">
    										<div class="col-sm-9">
    											<label><?php echo $this->mdl_common->get_lang()['city'];?>:</label>
            									<div class="form-group">
            										<input type="text" name='city' class="form-control form-control--sm step_1_req" required>
            									</div>
    										</div>
    										<div class="col-sm-9">
    											<label><?php echo $this->mdl_common->get_lang()['town'];?>:</label>
    											<div class="form-group">
    												<input type="text" name='town' class="form-control form-control--sm step_1_req" required>
    											</div>
    										</div>
    									</div>
    									<div class="mt-2"></div>
    									<label><?php echo $this->mdl_common->get_lang()['address'];?>:</label>
    									<div class="form-group">
    										<input type="text" name='address' class="form-control form-control--sm step_1_req" required>
    									</div>
    									<div class="clearfix" style='display:none;'>
    										<input id="formcheckoutCheckbox1" name="save_address" type="checkbox">
    										<label for="formcheckoutCheckbox1"><?php echo $this->mdl_common->get_lang()['save_address'];?></label>
    									</div>
    								</div>
    							</div>
    						</div>
    					</div>
    					<div class="panel">
    						<div class="panel-heading">
    							<h4 class="panel-title">
    								<a data-toggle="collapse" href="#step2" aria-expanded="false" class="collapsed step_2">02. <?php echo $this->mdl_common->get_lang()['billing_address'];?></a>
    								<span class="toggle-arrow"><span></span><span></span></span>
    							</h4>
    						</div>
    						<div id="step2" data-parent="#checkoutAccordion" class="panel-collapse collapse" style="">
    							<div class="panel-body">
    								<div class="panel-body-inside">
    								    <div class="clearfix">
    										<input id="formcheckoutCheckbox2" name="same_address" type="checkbox" class='sameAddr'>
    										<label for="formcheckoutCheckbox2"><?php echo $this->mdl_common->get_lang()['same_address'];?></label>
    										
    										<input id="bill1" name="bill_type" type="radio" class='bill_type' value='person' checked>
    										<label for="bill1"><?php echo $this->mdl_common->get_lang()['bill_person'];?></label>
    										
    										<input id="bill2" name="bill_type" type="radio" class='bill_type' value='company'>
    										<label for="bill2"><?php echo $this->mdl_common->get_lang()['bill_company'];?></label>
    									</div>
    									
    									<div class="form-group mt-2 show_company" style='display:none'>
											<label><?php echo $this->mdl_common->get_lang()['unvan'];?>:</label>
											<input type="text" name='unvan' class="form-control form-control--sm" >
    									</div>
    									
    									<div class="row mt-2">
    										<div class="col-sm-9 show_person">
    											<label><?php echo $this->mdl_common->get_lang()['first_name'];?>:</label>
    											<div class="form-group">
    												<input type="text" name='bill_first_name' class="form-control form-control--sm step_2_req" required >
    											</div>
    										</div>
    										<div class="col-sm-9 show_person">
    											<label><?php echo $this->mdl_common->get_lang()['last_name'];?>:</label>
    											<div class="form-group">
    												<input type="text" name='bill_last_name' class="form-control form-control--sm step_2_req"  required >
    											</div>
    										</div>
    									</div>
    									<div class="mt-2"></div>
    									
    									<div class="row">
    										<div class="col-sm-9">
    											<label><?php echo $this->mdl_common->get_lang()['city'];?>:</label>
            									<div class="form-group">
            										<input type="text" name='bill_city' class="form-control form-control--sm step_2_req" required >
            									</div>
    										</div>
    										<div class="col-sm-9">
    											<label><?php echo $this->mdl_common->get_lang()['town'];?>:</label>
    											<div class="form-group">
    												<input type="text" name='bill_town' class="form-control form-control--sm step_2_req" required >
    											</div>
    										</div>
    									</div>
    									
    									<div class="mt-2"></div>
    									
    									<div class="row">
    										<div class="col-sm-9 show_person">
    											<label><?php echo $this->mdl_common->get_lang()['tc_no'];?>:</label>
            									<div class="form-group">
            										<input type="text" name='tc_no' class="form-control form-control--sm step_2_req" required >
            									</div>
    										</div>
    										<div class="col-sm-9 show_company" style='display:none'>
    											<label><?php echo $this->mdl_common->get_lang()['tax_town'];?>:</label>
    											<div class="form-group">
    												<input type="text" name='tax_town' class="form-control form-control--sm" >
    											</div>
    										</div>
    										<div class="col-sm-9 show_company" style='display:none'>
    											<label><?php echo $this->mdl_common->get_lang()['tax_no'];?>:</label>
    											<div class="form-group">
    												<input type="text" name='tax_no' class="form-control form-control--sm" >
    											</div>
    										</div>
    									</div>
    									<div class="mt-2"></div>
    									<label><?php echo $this->mdl_common->get_lang()['address'];?>:</label>
    									<div class="form-group">
    										<input type="text" name='bill_address' class="form-control form-control--sm step_2_req"  required >
    									</div>
    									
    								</div>
    							</div>
    						</div>
    					</div>
    					<div class="panel">
    						<div class="panel-heading">
    							<h4 class="panel-title">
    								<a data-toggle="collapse" href="#step4" class='step_3'>03. <?php echo $this->mdl_common->get_lang()['payment_method'];?></a>
    								<span class="toggle-arrow"><span></span><span></span></span>
    							</h4>
    						</div>
    						<div id="step4" data-parent="#checkoutAccordion" class="panel-collapse collapse">
    							<div class="panel-body">
    							    
    								<div class="panel-body-inside">
    									<div class="clearfix">
    										<input id="formcheckoutRadio4" value="cc" name="payment_method" type="radio" class="radio" checked="checked">
    										<label for="formcheckoutRadio4"><?php echo $this->mdl_common->get_lang()['credit_card'];?></label>
    									</div>
    									<!--<div class="clearfix">
    										<input id="formcheckoutRadio5" value="bank" name="payment_method" type="radio" class="radio">
    										<label for="formcheckoutRadio5"><?php echo $this->mdl_common->get_lang()['bank_wire'];?></label>
    									</div>-->
    									<div class='cc_form'>
    									    <!--<div id="iyzipay-checkout-form" class="responsive"></div>-->
        									<!--<div class="mt-2"></div>
        									<label><?php echo $this->mdl_common->get_lang()['card_number'];?></label>
        									<div class="form-group">
        										<input type="number" maxlength='16' class="form-control form-control--sm" name='card_number'>
        									</div>
        									<div class="row">
        										<div class="col-sm-9">
        											<label><?php echo $this->mdl_common->get_lang()['expiry_month'];?>:</label>
        											<div class="form-group select-wrapper">
        												<select class="form-control form-control--sm" name='expiry_month'>
        													<option selected="" value="1">01</option>
        													<option value="2">02</option>
        													<option value="3">03</option>
        													<option value="4">04</option>
        													<option value="5">05</option>
        													<option value="6">06</option>
        													<option value="7">07</option>
        													<option value="8">08</option>
        													<option value="9">09</option>
        													<option value="10">10</option>
        													<option value="11">11</option>
        													<option value="12">12</option>
        												</select>
        											</div>
        										</div>
        										<div class="col-sm-9">
        											<label><?php echo $this->mdl_common->get_lang()['expiry_year'];?>:</label>
        											<div class="form-group select-wrapper">
        												<select class="form-control form-control--sm" name='expiry_year'>
        													<option value="2021">2021</option>
        													<option value="2022">2022</option>
        													<option value="2023">2023</option>
        													<option value="2024">2024</option>
        													<option value="2025">2025</option>
        													<option value="2026">2026</option>
        													<option value="2027">2027</option>
        													<option value="2028">2028</option>
        													<option value="2029">2029</option>
        													<option value="2030">2030</option>
        													<option value="2031">2031</option>
        												</select>
        											</div>
        										</div>
        									</div>
        									<div class="mt-2">
        										<label><?php echo $this->mdl_common->get_lang()['cvc'];?></label>
        										<div class="form-group">
        											<input type="password" class="form-control form-control--sm"  name='cvc'>
        										</div>
        									</div>-->
    									</div>
    									<div class="clearfix mt-2">
    										<input type="submit" class="btn btn--lg w-100 sbm_form" value='<?php echo $this->mdl_common->get_lang()['confirm_order'];?>' />
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
					<span class="card-total-price"><?php echo ($total); ?> ₺</span>
				</div>
				<div class="mt-2"></div>
				
			</div>
		</div>
	</div>
</div>
</div>
<?php include('includes/footer.php');?>
<?php echo $payment_form;?>
<script>

    $('.step_2').click(function(){
        $('.step_1_req').removeClass('redb1');
        $('.step_1_req').each(function(){
            var val = $(this).val();
            if( val.trim() == '' ){
                $(this).addClass('redb1')
                
            }else{
                 $(this).removeClass('redb1')
            }
        })
        
        if($('.redb1').length > 0){
            return false
        }
        
    })
    
     $('.step_3').click(function(){
        $('.step_2_req').removeClass('redb2');
        $('.step_2_req').each(function(){
            var val = $(this).val();
            if( val.trim() == '' ){
                
                $(this).addClass('redb2')
                
            }else{
                 $(this).removeClass('redb2')
            }
        })
        
        if($('.redb2').length > 0){
            return false
        }
        
    })
    
    $(document).on('change','.sameAddr', function(){
        if($(this).prop('checked') == true){
            $('input[name=bill_first_name]').val($('input[name=first_name]').val())
            $('input[name=bill_last_name]').val($('input[name=last_name]').val())
            $('input[name=bill_city]').val($('input[name=city]').val())
            $('input[name=bill_town]').val($('input[name=town]').val())
            $('input[name=bill_address]').val($('input[name=address]').val())
        }else{
            $('.inpp').val('')
        }
    })
    
    $('input[name=payment_method]').change(function(){
        if($(this).val() == 'bank'){
            $('.cc_form').hide()
        }else{
            $('.cc_form').show()
        }
    })
    
    $('.bill_type').change(function(){
        var val = $(this).val()
        
        if(val == 'person'){
            $('.show_person').show()
            $('.show_company').hide()
            $('.show_company input').removeClass('step_2_req')
            $('.show_person input').addClass('step_2_req')
            $('.show_company input').removeClass('redb2')
        }
        
        if(val == 'company'){
            $('.show_company').show()
            $('.show_person').hide()
            $('.show_person input').removeClass('step_2_req')
            $('.show_company input').addClass('step_2_req')
            $('.show_person input').removeClass('redb2')
        }
        

    })
    
    
    
    $('.sbm_form').click(function(){
        //alert($('input[name=payment_method]:checked').val());
        /*if($('input[name=payment_method]:checked').val() == 'cc'){
            $('input[name=card_number]').removeClass('redb3')
            $('input[name=cvc]').removeClass('redb3')
            if( $('input[name=card_number]').val().length != 16 ){
                $('input[name=card_number]').addClass('redb3')
                
            }
            
            if( ($('input[name=cvc]').val().length < 3) || ($('input[name=cvc]').val().length > 4) ){
                $('input[name=cvc]').addClass('redb3')
               
            }
            
            if($('.redb3').length == 0){
                $('form').removeAttr('onsubmit')
            }else{
                return false
            }
            
        }else{
            $('form').removeAttr('onsubmit')
        }*/
        $('form').removeAttr('onsubmit');
    })
    
</script>