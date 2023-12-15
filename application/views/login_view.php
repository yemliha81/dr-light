<?php include('includes/header.php');?>
<?php include('lang/product_'.$lang.'.php');?>
<div class="page-content">
    <div class="holder">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-18 col-lg-12">
				<h2 class="text-center"><?php echo $this->mdl_common->get_lang()['login'];?></h2>
				<div class="form-wrapper">
					<form action="<?php echo LOGIN_POST;?>" method='post'>
						<div class="form-group">
							<input type="email" name='email' class="form-control" placeholder="<?php echo $this->mdl_common->get_lang()['email'];?>" required>
						</div>
						<div class="form-group">
							<input type="password" name='password' class="form-control" placeholder="<?php echo $this->mdl_common->get_lang()['password'];?>" required>
						</div>
						
						<div class="text-center">
						    <input type='submit' class='btn' value='<?php echo $this->mdl_common->get_lang()['login'];?>' />
						</div>
					</form>
				<div style='text-align:center;'><?php echo $this->mdl_common->get_lang()['dont_have_account'];?> 
				<a href='<?php echo SIGNUP;?>'><?php echo $this->mdl_common->get_lang()['create_account'];?></a> </div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php include('includes/footer.php');?>