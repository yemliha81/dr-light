<?php include(APPPATH.'views/includes/header.php');?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12 m-t-10">
                    <span class="page_title">
						<i class="fa fa-plus"></i> Cam Rengi Güncelle
					</span>
                </div>
				<div class="col-lg-12 m-t-20">
					<div class="card p-15">
						<div class="form_div">
							
							<div class="">
								<div class="input_title">
									Renk Seçeneği Bilgileri
								</div>
								<div>
									Eklemek istediğiniz renk seçeneğinin tüm detay 
									bilgilerini bu alandan girebilirsiniz.
								</div>
							</div>
							<form action="<?php echo UPDATE_CAM_RENGI_POST;?>" method="post" enctype="multipart/form-data">
								<input type='hidden' name='id' value='<?php echo $variant['id'];?>' />
								<div class="m-b-20">
									<div class="m-b-20">
										<div class="input_title">
											Renk Seçeneği Görseli
										</div>
										<div class="m-t-10">
											<input class="input_style dropify" type="file" name="variant_image" data-default-file="<?php echo FATHER_BASE.'../files/variant/img/100/'.$variant['variant_image'];?>"/>
										</div>
										<div class="clearfix"></div>
									</div>
									<?php foreach($_SESSION['lang_array'] as $lang){ ?>
    									<div class="m-b-20">
    										<div class="input_title">
    											Renk Seçeneği Adı ( <?php echo strtoupper($lang);?> )
    										</div>
    										<div class="m-t-10">
    											<input class="input_style" type="text" 
    											name="variant_name_<?php echo $lang;?>" 
    											placeholder="Renk seçeneği Adı <?php echo strtoupper($lang);?>" 
    											value='<?php echo $variant['variant_name_'.$lang];?>'
    											required />
    										</div>
    										<div class="clearfix"></div>
    									</div>
									<?php } ?>
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