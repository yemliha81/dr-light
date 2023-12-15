<?php include(APPPATH.'views/includes/header.php');?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12 m-t-10">
                    <span class="page_title">
						<i class="fa fa-plus"></i> Sayfa Ekle
					</span>
                </div>
				<div class="col-lg-12 m-t-20">
					<div class="card p-15">
						<div class="form_div">
							
							<div class="">
								<div class="input_title">
									Sayfa Bilgileri
								</div>
								<div>
									Eklemek istediğiniz Sayfa için tüm detay 
									bilgilerini bu alandan girebilirsiniz.
								</div>
							</div>
							<form action="<?php echo ADD_PAGE_POST;?>" method="post" enctype="multipart/form-data">
								<div class="m-b-20">
									<div class="m-b-20">
										<div class="input_title">
											Sayfa Görseli
										</div>
										<div class="m-t-10">
											<input class="input_style dropify" type="file" name="page_image"/>
										</div>
										<div class="clearfix"></div>
									</div>
									<?php foreach($_SESSION['lang_array'] as $lang){ ?>
    									<div class="m-b-20">
    										<div class="input_title">
    											Sayfa Başlık ( <?php echo strtoupper($lang);?> )
    										</div>
    										<div class="m-t-10">
    											<input class="input_style" type="text" name="page_name_<?php echo $lang;?>" placeholder="Sayfa Adı <?php echo strtoupper($lang);?>" required />
    										</div>
    										<div class="clearfix"></div>
    									</div>
									<?php } ?>
									<?php foreach($_SESSION['lang_array'] as $lang){ ?>
    									<div class="m-b-20">
										<div class="input_title">
											Sayfa Açıklaması ( <?php echo strtoupper($lang);?> )
										</div>
										<div class="m-t-10">
											<textarea class="input_style summernote" 
											name="page_description_<?php echo $lang;?>" 
											id="" cols="30" 
											rows="10" 
											required placeholder="Sayfa Açıklaması <?php echo strtoupper($lang);?>"></textarea>
										</div>
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