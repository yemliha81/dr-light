<?php include(APPPATH.'views/includes/header.php');?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12 m-t-10">
                    <span class="page_title">
						<i class="fa fa-plus"></i> Banner Ekle
					</span>
                </div>
				<div class="col-lg-12 m-t-20">
					<div class="card p-15">
						<div class="form_div">
							
							<div class="">
								<div class="input_title">
									Banner Bilgileri
								</div>
								<div>
									Eklemek istediğiniz Banner için tüm detay 
									bilgilerini bu alandan girebilirsiniz.
								</div>
							</div>
							<form action="<?php echo ADD_BANNER_POST;?>" method="post" enctype="multipart/form-data">
								<div class="m-b-20">
									<div class="m-b-20">
										<div class="input_title">
											Banner Görseli
										</div>
										<div class="m-t-10">
											<input class="input_style dropify" type="file" name="banner_image"/>
										</div>
										<div class="clearfix"></div>
									</div>
									<?php foreach($_SESSION['lang_array'] as $lang){ ?>
    									<div class="m-b-20">
    										<div class="input_title">
    											Banner Başlık ( <?php echo strtoupper($lang);?> )
    										</div>
    										<div class="m-t-10">
    											<input class="input_style" type="text" name="banner_name_<?php echo $lang;?>" placeholder="Banner Adı <?php echo strtoupper($lang);?>" required />
    										</div>
    										<div class="clearfix"></div>
    									</div>
									<?php } ?>
									<?php foreach($_SESSION['lang_array'] as $lang){ ?>
    									<div class="m-b-20">
										<div class="input_title">
											Banner Açıklaması ( <?php echo strtoupper($lang);?> )
										</div>
										<div class="m-t-10">
											<textarea class="input_style" 
											name="banner_description_<?php echo $lang;?>" 
											id="" cols="30" 
											rows="10" 
											required placeholder="Banner Açıklaması <?php echo strtoupper($lang);?>"></textarea>
										</div>
									</div>
									<?php } ?>
									<div class="m-b-20">
										<div class="input_title">
											Banner URL
										</div>
										<div class="m-t-10">
											<input class="input_style" type="url" name="banner_url"/>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="m-b-20">
										<input type="submit" class="btn_custom" value="KAYDET"/>
										<div class="clearfix"></div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
            </div>

            <!-- ... Your content goes here ... -->

        </div>
    </div>

</div>
<?php include(APPPATH.'views/includes/footer.php');?>
<script type="text/javascript">
	$(document).ready(function(){
		// Basic
		$('.dropify').dropify();	
	});
</script>