<?php include('includes/header.php');?>
<?php include('lang/product_'.$lang.'.php');?>

<div class="page-content">
    <div class="holder">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-18 col-lg-12">
				<h2 class="text-center"><?php echo $this->mdl_common->get_lang()['create_account'];?></h2>
				<div class="form-wrapper">
					
					<form action="<?php echo SIGNUP_POST;?>" method='post' id='signupForm'>
					    
						<div class="row">
							<div class="col-sm-9">
								<div class="form-group">
									<input type="text" name='first_name' class="form-control" placeholder="<?php echo $this->mdl_common->get_lang()['first_name'];?>" required>
								</div>
							</div>
							<div class="col-sm-9">
								<div class="form-group">
									<input type="text" name='last_name' class="form-control" placeholder="<?php echo $this->mdl_common->get_lang()['last_name'];?>" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<input type="email" name='email' class="form-control" placeholder="<?php echo $this->mdl_common->get_lang()['email'];?>" required>
						</div>
						<div class="form-group">
							<input type="password" name='password' class="form-control" placeholder="<?php echo $this->mdl_common->get_lang()['password'];?>" required>
						</div>
						<div class="form-group">
							<input type="password" name='password2' class="form-control" placeholder="<?php echo $this->mdl_common->get_lang()['confirm_password'];?>" required>
						</div>
						<div class="clearfix">
							<input id="checkbox1" name="checkbox1" type="checkbox" required style='display:unset;' >
							<a href='<?php echo FATHER_BASE;?>page/index/10'><?php echo $this->mdl_common->get_lang()['terms'];?></a>
							</div>
						<div class="text-center">
						    <!--<div id='html_element' data-callback="recaptcha_callback"></div>-->
						    <input  type='submit' class='btn sbmBtn' value='<?php echo $this->mdl_common->get_lang()['signup'];?>' />
						</div>
						
					</form>
					<div style='text-align:center;'> <?php echo $this->mdl_common->get_lang()['have_an_account'];?> <a href='<?php echo LOGIN;?>'><?php echo $this->mdl_common->get_lang()['login'];?></a> </div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php include('includes/footer.php');?>
<script type="text/javascript">
 /* var onloadCallback = function() {
    grecaptcha.render('html_element', {
      'sitekey' : '6LcjxakcAAAAAP8e_nYjcnk6Ym0HVhq5MX-0hqDa'
    });
  };
  
  function recaptcha_callback(){
      $('.sbmBtn').show();
  }*/
</script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
    </script>
</script>

 