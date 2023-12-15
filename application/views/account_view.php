<?php include('includes/header.php');?>
<style>
    .modal-bg{
        position: fixed;
        top: 0;
        bottom:0;
        left:0;
        right:0;
        background:rgba(0,0,0,0.5);
        z-index: 1111;
        padding:20px;
        display:none;
        padding:25px;
    }
    .modal{
        border: 1px solid rgb(221, 221, 221);
        background: rgb(255, 255, 255);
        border-radius: 15px;
        padding: 20px;
        margin: 0px auto;
        max-height: 60%;
        float: none;
        display: inline-block;
        overflow-y: auto;
        padding-right: 0px;
        left: 10%;
    }
</style>
<?php include('lang/product_'.$lang.'.php');?>
<div class="page-content">
    
    <div class="holder">
	<div class="container">
		<div class="row">
			<div class="col-md-4 aside aside--left">
				<div class="list-group">
				    <a href="javascript:;" tab='t2' class="list-group-item active"><?php echo $this->mdl_common->get_lang()['order_history'];?></a>
					<a href="javascript:;" tab='t1' class="list-group-item"><?php echo $this->mdl_common->get_lang()['account_details'];?></a>
					<!--<a href="javascript:;" tab='t3' class="list-group-item"><?php echo $this->mdl_common->get_lang()['my_addresses'];?></a>-->
					<a href="<?php echo LOGOUT;?>" class="list-group-item"><?php echo $this->mdl_common->get_lang()['logout'];?></a>
				</div>
			</div>
			<div class="col-md-14 aside">
			    <div class='tab tab_t1'  style='display:none'>
    				<h1 class="mb-3"><?php echo $this->mdl_common->get_lang()['account_details'];?></h1>
    				<div class="row vert-margin">
    					<div class="col-sm-9">
    						<div class="card">
    							<div class="card-body">
    								<h3><?php echo $this->mdl_common->get_lang()['personal_info'];?></h3>
    								<p><b><?php echo $this->mdl_common->get_lang()['first_name'];?>:</b> <?php echo $user['first_name'];?><br>
    									<b><?php echo $this->mdl_common->get_lang()['last_name'];?>:</b> <?php echo $user['last_name'];?><br>
    									<b><?php echo $this->mdl_common->get_lang()['email'];?>:</b> <?php echo $user['email'];?><br>
    									<b><?php echo $this->mdl_common->get_lang()['phone'];?>:</b> <?php echo $user['phone'];?></p>
    								<div class="mt-2 clearfix">
    									<a href="#" class="link-icn js-show-form" data-form="#updateDetails"><i class="icon-pencil"></i><?php echo $this->mdl_common->get_lang()['edit'];?></a>
    								</div>
    							</div>
    						</div>
    					</div>
    				</div>
    				<div class="card mt-3 d-none" id="updateDetails">
    					<div class="card-body">
    						<h3><?php echo $this->mdl_common->get_lang()['update_account_details'];?></h3>
    						<form action='<?php echo UPDATE_ACCOUNT_POST;?>' method='post'>
    						<div class="row mt-2">
    							<div class="col-sm-9">
    								<label class="text-uppercase"><?php echo $this->mdl_common->get_lang()['first_name'];?>:</label>
    								<div class="form-group">
    									<input type="text" class="form-control form-control--sm" name='first_name' value="<?php echo $user['first_name'];?>" required >
    								</div>
    							</div>
    							<div class="col-sm-9">
    								<label class="text-uppercase"><?php echo $this->mdl_common->get_lang()['last_name'];?>:</label>
    								<div class="form-group">
    									<input type="text" class="form-control form-control--sm" name='last_name' value="<?php echo $user['last_name'];?>" required>
    								</div>
    							</div>
    						</div>
    						<div class="row mt-2">
    							<div class="col-sm-9">
    								<label class="text-uppercase"><?php echo $this->mdl_common->get_lang()['email'];?>:</label>
    								<div class="form-group">
    									<input type="email" class="form-control form-control--sm" name='email' value="<?php echo $user['email'];?>" required>
    								</div>
    							</div>
    							<div class="col-sm-9">
    								<label class="text-uppercase"><?php echo $this->mdl_common->get_lang()['password'];?>:</label>
    								<div class="form-group">
    									<input type="password" class="form-control form-control--sm" name='password'>
    								</div>
    							</div>
    						</div>
    						<div class="row mt-2">
    							<div class="col-sm-18">
    								<label class="text-uppercase"><?php echo $this->mdl_common->get_lang()['phone'];?>:</label>
    								<div class="form-group">
    									<input type="number" class="form-control form-control--sm" name='phone' value="<?php echo $user['phone'];?>" required>
    								</div>
    							</div>
    						</div>
    						<div class="mt-2">
    							<button type="reset" class="btn btn--alt js-close-form" data-form="#updateDetails"><?php echo $this->mdl_common->get_lang()['cancel'];?></button>
    							<button type="submit" class="btn ml-1"><?php echo $this->mdl_common->get_lang()['update'];?></button>
    						</div>
    						</form>
    					</div>
    				</div>
				</div>
				<div class='tab tab_t2' >
    				<div class="row">
            			<div class="col-md-18 aside">
            			<h1 class="mb-3"><?php echo $this->mdl_common->get_lang()['order_history'];?></h1>
            				<div class="table-responsive">
            					<table class="table table-bordered table-striped table-order-history">
            						<thead>
            						<tr>
            							<th scope="col"># </th>
            							<th scope="col"><?php echo $this->mdl_common->get_lang()['order_date'];?> </th>
            							<th scope="col"><?php echo $this->mdl_common->get_lang()['status'];?></th>
            							<th scope="col"><?php echo $this->mdl_common->get_lang()['total_price'];?></th>
            						</tr>
            						</thead>
            						<tbody>
            						    <?php foreach($orders as $order){ ?>
                    						<tr>
                    							<td><?php echo $order['id'];?> <a href="javascript:;" data-toggle="modal" data-target="#myModal" class="ml-1 order_detail" ord='<?php echo $order['id'];?>'><?php echo $this->mdl_common->get_lang()['view_details'];?></a></td>
                    							<td><?php echo $order['insert_time'];?></td>
                    							<td><?php echo $order['status'] == '0' ? $this->mdl_common->get_lang()['awaiting'] : ( $order['status'] == '1' ?  $this->mdl_common->get_lang()['approved'] : '' );?></td>
                    							<td><span class="color"><?php echo $order['total_price'];?> ₺</span></td>
                    						</tr>
            						    <?php } ?>
            						</tbody>
            					</table>
            				</div>
            			</div>
            		</div>
    				
				</div>
				<div class='tab tab_t3' style='display:none'>
    				<h1 class="mb-3"><?php echo $this->mdl_common->get_lang()['my_addresses'];?></h1>
    				<div class="row">
					<div class="col-sm-9">
						<div class="card">
							<div class="card-body">
								<h3>Address 1 (Default)</h3>
								<p>Thomas Nolan Kaszas
									<br> 5322 Otter Ln Middleberge
									<br> FL 32068 Palm Bay FL 32907</p>
								<div class="mt-2 clearfix">
									<a href="#" class="link-icn js-show-form" data-form="#updateAddress"><i class="icon-pencil"></i><?php echo $this->mdl_common->get_lang()['edit'];?></a>
									<a href="#" class="link-icn ml-1 float-right"><i class="icon-cross"></i><?php echo $this->mdl_common->get_lang()['delete'];?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card mt-3" id="updateAddress">
					<div class="card-body">
						<h3>Edit Address</h3>
						<label class="text-uppercase">Country:</label>
						<div class="form-group select-wrapper">
							<select class="form-control">
								<option value="United States">United States</option>
								<option value="Canada">Canada</option>
								<option value="China">China</option>
								<option value="India">India</option>
								<option value="Italy">Italy</option>
								<option value="Mexico">Mexico</option>
							</select>
						</div>
						<label class="text-uppercase">State:</label>
						<div class="form-group select-wrapper">
							<select class="form-control">
								<option value="AL">Alabama</option>
								<option value="AK">Alaska</option>
								<option value="AZ">Arizona</option>
								<option value="AR">Arkansas</option>
								<option value="CA">California</option>
								<option value="CO">Colorado</option>
								<option value="CT">Connecticut</option>
								<option value="DE">Delaware</option>
								<option value="DC">District Of Columbia</option>
								<option value="FL">Florida</option>
								<option value="GA">Georgia</option>
								<option value="HI">Hawaii</option>
								<option value="ID">Idaho</option>
								<option value="IL">Illinois</option>
								<option value="IN">Indiana</option>
								<option value="IA">Iowa</option>
								<option value="KS">Kansas</option>
								<option value="KY">Kentucky</option>
								<option value="LA">Louisiana</option>
							</select>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<label class="text-uppercase">City:</label>
								<div class="form-group">
									<input type="text" class="form-control">
								</div>
							</div>
							<div class="col-sm-6">
								<label class="text-uppercase">zip/postal code:</label>
								<div class="form-group">
									<input type="text" class="form-control">
								</div>
							</div>
						</div>
						<div class="clearfix">
							<input id="formCheckbox1" name="checkbox1" type="checkbox">
							<label for="formCheckbox1">Set address as default</label>
						</div>
						<div class="mt-2">
							<button type="reset" class="btn btn--alt js-close-form" data-form="#updateAddress">Cancel</button>
							<button type="submit" class="btn ml-1">Add Address</button>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
<div class='modal-bg'>	
	<!-- The Modal -->
    <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">
    
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title"><?php echo $this->mdl_common->get_lang()['order_details'];?></h4>
          </div>
    
          <!-- Modal body -->
          <div class="modal-body">
            
          </div>
    
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger close_modal" data-dismiss="modal"><?php echo $this->mdl_common->get_lang()['close'];?></button>
          </div>
    
        </div>
      </div>
    </div>
</div>
	
</div>
</div>



<?php include('includes/footer.php');?>
<script>
    $('.list-group-item').click(function(){
        var tab = $(this).attr('tab');
        $('.list-group-item').removeClass('active');
        $(this).addClass('active');
        
        $('.tab').hide()
        $('.tab_'+tab).fadeIn();
        
        
    })
    $('.order_detail').click(function(){
        var ord = $(this).attr('ord');
        $('.modal-bg').fadeIn();
        $.ajax({
            
            type : 'post',
            data : { 'ord' : ord },
            url : '<?php echo ORDER_DETAILS;?>',
            success : function(response){
                $('.modal-body').html(response);
            }
            
        })
        
        
    })
    $('.close_modal').click(function(){
       
        $('.modal-bg').fadeOut();
        
    })
    
    
    
</script>