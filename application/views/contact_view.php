<?php include('includes/header.php');?>
<div class="page-content" style="min-height: 4px;">
	
<div class="holder">
	<div class="container">
		<div class="title-wrap text-center">
			<h2 class="h1-style"><?php echo $this->mdl_common->get_lang()['contact'];?></h2>
		</div>
		<div class="text-icn-blocks-row">
			<div class="text-icn-block-hor">
				<div class="icn">
					<i class="icon-location"></i>
				</div>
				<div class="text">
					<h4><?php echo $this->mdl_common->get_lang()['address'];?>:</h4>
					<p>Halide Edip Adıvar Mah. Gül 2 Sok. <br> 
					No:12/B-C 34382 Şişli - İstanbul</p>
				</div>
			</div>
			
			<div class="text-icn-block-hor">
				<div class="icn">
					<img src='<?php echo ASSETS;?>icons/factory.png' width='100%'/>
				</div>
				<div class="text">
					<h4><?php echo $this->mdl_common->get_lang()['factory'];?>:</h4>
					<p>İkitelli OSB Mah. Hürriyet Blv. Deparko San. Sit.<br>
					No:1/8A Başakşehir - İstanbul</p>
				</div>
			</div>
			<div class="text-icn-block-hor">
				<div class="icn">
					<i class="icon-phone"></i>
				</div>
				<div class="text">
					<h4><?php echo $this->mdl_common->get_lang()['phone'];?>:</h4>
					<div style='display:flex;gap:20px;'>
					    <div>
					        <p><b><?php echo $this->mdl_common->get_lang()['store'];?></b></p>
        					<p>0212 222 88 48<br>
        					0212 222 85 44</p>
					    </div>
					    <div>
					        <p><b><?php echo $this->mdl_common->get_lang()['factory'];?></b></p>
        					<p>0212 222 88 48<br>
        					0212 222 85 44</p>
					    </div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

<div class="holder">
	<div class="container">
		<div class="row vert-margin">
			<div class="col-sm-9"><div class="title-wrap"><h2 class="h1-style"><?php echo $this->mdl_common->get_lang()['write_us'];?></h2>
	<div><?php echo $this->mdl_common->get_lang()['contact_text'];?></div>
</div>
<form data-toggle="validator" class="contact-form" id="contactForm" novalidate="novalidate">
	<div class="form-confirm">
		<div class="success-confirm">
			Thanks! Your message has been sent. We will get back to you soon!
		</div>
		<div class="error-confirm">
			Oops! There was an error submitting form. Refresh and send again.
		</div>
	</div>
	<div class="form-group">
		<div class="row vert-margin-middle">
			<div class="col-lg">
				<input type="text" name="name" class="form-control form-control--sm" placeholder="<?php echo $this->mdl_common->get_lang()['first_name'];?>" required="">
			</div>
			<div class="col-lg">
				<input type="text" name="lastName" class="form-control form-control--sm" placeholder="<?php echo $this->mdl_common->get_lang()['last_name'];?>" required="">
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row vert-margin-middle">
			<div class="col-lg">
				<input type="text" name="email" class="form-control form-control--sm" placeholder="<?php echo $this->mdl_common->get_lang()['email'];?>" required="">
			</div>
			<div class="col-lg">
				<input type="text" name="phone" class="form-control form-control--sm" placeholder="<?php echo $this->mdl_common->get_lang()['phone'];?>" required="">
			</div>
		</div>
	</div>
	<div class="form-group">
		<textarea class="form-control form-control--sm textarea--height-200" name="message" placeholder="<?php echo $this->mdl_common->get_lang()['message'];?>" required=""></textarea>
	</div>
	<button class="btn" type="submit"><?php echo $this->mdl_common->get_lang()['send_message'];?></button>
</form></div>
			<div class="col-sm-9"><div class="contact-map">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3008.4168711352413!2d28.971097915108732!3d41.059879524197164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cab9e62d048385%3A0xe8e2dacf27c6bb6d!2sDr%20Light!5e0!3m2!1sen!2str!4v1630580484284!5m2!1sen!2str" width="100&" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div></div>
		</div>
	</div>
</div>

<div class="holder">
            <div class="holder p-15">
            <div class="container" style="padding: 0;position:relative;">
               <div data-mc-src="e8a94ecc-57d0-442d-bbb3-b049e6663a21#instagram"></div>
        
                <script 
                  src="https://cdn2.woxo.tech/a.js#62cc66f126c702b242f442ca" 
                  async data-usrc>
                </script>
                <div style='height: 65px;
                            position: absolute;
                            left: 0;
                            right: 0;
                            background: #ffffff;
                            z-index: 999999;
                            bottom: 5px;'></div>
               
               <!--<div class="">
                  <script src="https://apps.elfsight.com/p/platform.js" defer></script>
                <div class="elfsight-app-35c2e249-c7c3-4f5b-9972-f6bc60171626"></div>

               </div>
               <div style='height: 50px;
                            position: absolute;
                            left: 0;
                            right: 0;
                            background: #ffffff;
                            z-index: 999999;
                            bottom: 5px;'></div>
                            
<div class="taggbox-container" style="width:100%;height:100%;overflow: auto;"><div class="taggbox-socialwall" data-wall-id="99152" view-url="https://widget.taggbox.com/99152"></div><script src="https://widget.taggbox.com/embed-lite.min.js" type="text/javascript"></script></div>            </div>
         -->
            </div>
         </div>
         </div>



<?php include('includes/footer.php');?>