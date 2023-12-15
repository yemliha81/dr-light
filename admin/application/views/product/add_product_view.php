<?php include(APPPATH.'views/includes/header.php');?>
<style>
    .vGrid{
        display:grid;
        grid-template-columns:1fr 1fr;
        gap:20px;
        width:400px;
        margin-bottom:20px;
    }
    .vGrid input{
        width:100%;
    }
</style>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12 m-t-10">
                    <span class="page_title">
						<i class="fa fa-plus"></i> Ürün Ekle
					</span>
                </div>
				<div class="col-lg-12 m-t-20">
					<div class="card p-15">
						<div class="">
							
							
							<form action="<?php echo ADD_PRODUCT_POST;?>" method="post" enctype="multipart/form-data">
								<div class="m-b-20">
									<div class="m-b-20">
										<div class="input_title">
											Ürün Kategorisi
										</div>
										<div class="m-t-10">
										    <select name='cat_id' required >
										        <option>Seçiniz</option>
    											<?php foreach($categories as $category){ ?>
    											    <option value='<?php echo $category['id'];?>'><?php echo $category['category_name_tr'];?></option>
    											<?php } ?>
											</select>
										</div>
										<div class="clearfix"></div>
    								</div>
									<div class="m-b-20">
										<div class="input_title">
											Ürün Görseli
										</div>
										<div class="m-t-10">
											<input class="input_style dropify" type="file" name="product_image[]" multiple/>
										</div>
										<div class="clearfix"></div>
									</div>
									<?php foreach($_SESSION['lang_array'] as $lang){ ?>
    									<div class="m-b-20">
    										<div class="input_title">
    											Ürün Adı ( <?php echo strtoupper($lang);?> )
    										</div>
    										<div class="m-t-10">
    											<input class="input_style" type="text" name="product_name_<?php echo $lang;?>" placeholder="Ürün Adı <?php echo strtoupper($lang);?>" required />
    										</div>
    										<div class="clearfix"></div>
    									</div>
									<?php } ?>
									
									<?php foreach($_SESSION['lang_array'] as $lang){ ?>
    									<div class="m-b-20">
										<div class="input_title">
											Ürün Açıklaması ( <?php echo strtoupper($lang);?> )
										</div>
										<div class="m-t-10">
											<textarea class="input_style" 
											name="product_description_<?php echo $lang;?>" 
											id="" cols="30" 
											rows="10" 
											required placeholder="Ürün Açıklaması <?php echo strtoupper($lang);?>"></textarea>
										</div>
									</div>
									<?php } ?>
									
									<div class="m-b-20">
										<div class="input_title">
											Ürün Fiyatı
										</div>
										<div class="m-t-10">
											<input class="input_style" type="number" 
											name="product_price" placeholder="Ürün Fiyatı" required="true" 
											step=".01"/>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="m-b-20">
										<div class="input_title">
											Ürün Varyantları   <a href='javascript:;' class='btn addVariant'>+ Yeni Ekle</a>
										</div>
										<div class="variants">
										    <?php foreach($_SESSION['lang_array'] as $lang){ ?>
            									<div class='m-t-10 '>
    										        <input type='text' name='variant_group_name_<?php echo $lang;?>' placeholder='Varyant Grubu Adı (<?php echo strtoupper($lang);?>)' />
    										    </div>
        									<?php } ?>
											<div class='vGrid m-t-10'>
											    <div>
											        <input type='text' name='variant_name[]' placeholder='Varyant Adı'/>
											    </div>
											    <div>
											        <input type='number' name='variant_price[]'  placeholder='Varyant Fiyatı'/>
											    </div>
											</div>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="m-b-20 grid-5">
										<div class='variantDiv'>
    										<div class="input_title">
    											Gövde Rengi
    										</div>
    										<div class="m-t-10">
    											<?php foreach($govde as $variant){ ?>
        											<div style='display:grid; grid-template-columns:25px auto 100px;'>
        											    <span>
        											        <img src="<?php echo FATHER_BASE.'../files/variant/img/100/'.$variant['variant_image'];?>" 	width="20"/>
        											    </span>
        											    <label for='govde_<?php echo $variant['id'];?>'>
        											        <input type='checkbox' id='govde_<?php echo $variant['id'];?>' name='govde_name_tr[<?php echo $variant['id'];?>]' value='<?php echo $variant['variant_name_tr'];?>' /> <?php echo $variant['variant_name_tr'];?>
        											    </label>
        											    <div>
        											        <input type='number' name='govde_price[<?php echo $variant['id'];?>]' placeholder='Fiyat farkı' style='width:100%;'/>
        											        <input type='hidden' name='govde_image[<?php echo $variant['id'];?>]' value='<?php echo $variant['variant_image'];?>' />
        											        <input type='hidden' name='govde_name_en[<?php echo $variant['id'];?>]' value='<?php echo $variant['variant_name_en'];?>' />
        											    </div>
        											</div>
    											<?php } ?>
    										</div>
										</div>
										<div class='variantDiv'>
    										<div class="input_title">
    											Cam Rengi
    										</div>
    										<div class="m-t-10">
    											<?php foreach($cam as $variant){ ?>
        											<div style='display:grid; grid-template-columns:25px auto 100px;'>
        											    <span>
        											        <img src="<?php echo FATHER_BASE.'../files/variant/img/100/'.$variant['variant_image'];?>" 	width="20"/>
        											    </span>
        											    <label for='cam_rengi_<?php echo $variant['id'];?>'>
        											        <input type='checkbox' id='cam_rengi_<?php echo $variant['id'];?>' name='cam_rengi_name_tr[<?php echo $variant['id'];?>]' value='<?php echo $variant['variant_name_tr'];?>' /> <?php echo $variant['variant_name_tr'];?>
        											    </label>
        											    <div>
        											        <input type='number' name='cam_rengi_price[<?php echo $variant['id'];?>]' placeholder='Fiyat farkı' style='width:100%;'/>
        											        <input type='hidden' name='cam_rengi_image[<?php echo $variant['id'];?>]' value='<?php echo $variant['variant_image'];?>' />
        											        <input type='hidden' name='cam_rengi_name_en[<?php echo $variant['id'];?>]' value='<?php echo $variant['variant_name_en'];?>' />
        											    </div>
        											</div>
    											<?php } ?>
    										</div>
										</div>
										<div class='variantDiv'>
    										<div class="input_title">
    											Cam Deseni
    										</div>
    										<div class="m-t-10">
    											<?php foreach($cam_deseni as $variant){ ?>
        											<div style='display:grid; grid-template-columns:25px auto 100px;'>
        											    <span>
        											        <img src="<?php echo FATHER_BASE.'../files/variant/img/100/'.$variant['variant_image'];?>" 	width="20"/>
        											    </span>
        											    <label for='cam_deseni_<?php echo $variant['id'];?>'>
        											        <input type='checkbox' id='cam_deseni_<?php echo $variant['id'];?>' name='cam_deseni_name_tr[<?php echo $variant['id'];?>]' value='<?php echo $variant['variant_name_tr'];?>' /> <?php echo $variant['variant_name_tr'];?>
        											    </label>
        											    <div>
        											        <input type='number' name='cam_deseni_price[<?php echo $variant['id'];?>]' placeholder='Fiyat farkı' style='width:100%;'/>
        											        <input type='hidden' name='cam_deseni_image[<?php echo $variant['id'];?>]' value='<?php echo $variant['variant_image'];?>' />
        											        <input type='hidden' name='cam_deseni_name_en[<?php echo $variant['id'];?>]' value='<?php echo $variant['variant_name_en'];?>' />
        											    </div>
        											</div>
    											<?php } ?>
    										</div>
										</div>
										<div class='variantDiv'>
    										<div class="input_title">
    											Şapka Rengi
    										</div>
    										<div class="m-t-10">
    											<?php foreach($sapka_rengi as $variant){ ?>
        											<div style='display:grid; grid-template-columns:25px auto 100px;'>
        											    <span>
        											        <img src="<?php echo FATHER_BASE.'../files/variant/img/100/'.$variant['variant_image'];?>" 	width="20"/>
        											    </span>
        											    <label for='sapka_rengi_<?php echo $variant['id'];?>'>
        											        <input type='checkbox' id='sapka_rengi_<?php echo $variant['id'];?>' name='sapka_rengi_name_tr[<?php echo $variant['id'];?>]' value='<?php echo $variant['variant_name_tr'];?>' /> <?php echo $variant['variant_name_tr'];?>
        											    </label>
        											    <div>
        											        <input type='number' name='sapka_rengi_price[<?php echo $variant['id'];?>]' placeholder='Fiyat farkı' style='width:100%;'/>
        											        <input type='hidden' name='sapka_rengi_image[<?php echo $variant['id'];?>]' value='<?php echo $variant['variant_image'];?>' />
        											        <input type='hidden' name='sapka_rengi_name_en[<?php echo $variant['id'];?>]' value='<?php echo $variant['variant_name_en'];?>' />
        											    </div>
        											</div>
    											<?php } ?>
    										</div>
										</div>
										<div class='variantDiv'>
    										<div class="input_title">
    											İç Renk
    										</div>
    										<div class="m-t-10">
    											<?php foreach($ic_rengi as $variant){ ?>
        											<div style='display:grid; grid-template-columns:25px auto 100px;'>
        											    <span>
        											        <img src="<?php echo FATHER_BASE.'../files/variant/img/100/'.$variant['variant_image'];?>" 	width="20"/>
        											    </span>
        											    <label for='ic_rengi_<?php echo $variant['id'];?>'>
        											        <input type='checkbox' id='ic_rengi_<?php echo $variant['id'];?>' name='ic_rengi_name_tr[<?php echo $variant['id'];?>]' value='<?php echo $variant['variant_name_tr'];?>' /> <?php echo $variant['variant_name_tr'];?>
        											    </label>
        											    <div>
        											        <input type='number' name='ic_rengi_price[<?php echo $variant['id'];?>]' placeholder='Fiyat farkı' style='width:100%;'/>
        											        <input type='hidden' name='ic_rengi_image[<?php echo $variant['id'];?>]' value='<?php echo $variant['variant_image'];?>' />
        											        <input type='hidden' name='ic_rengi_name_en[<?php echo $variant['id'];?>]' value='<?php echo $variant['variant_name_en'];?>' />
        											    </div>
        											</div>
    											<?php } ?>
    										</div>
										</div>
										<div class='variantDiv'>
    										<div class="input_title">
    											Mermer Rengi
    										</div>
    										<div class="m-t-10">
    											<?php foreach($mermer_rengi as $variant){ ?>
        											<div style='display:grid; grid-template-columns:25px auto 100px;'>
        											    <span>
        											        <img src="<?php echo FATHER_BASE.'../files/variant/img/100/'.$variant['variant_image'];?>" 	width="20"/>
        											    </span>
        											    <label for='variant_<?php echo $variant['id'];?>'>
        											        <input type='checkbox' id='mermer_rengi_<?php echo $variant['id'];?>' name='mermer_rengi_name_tr[<?php echo $variant['id'];?>]' value='<?php echo $variant['variant_name_tr'];?>' /> <?php echo $variant['variant_name_tr'];?>
        											    </label>
        											    <div>
        											        <input type='number' name='mermer_rengi_price[<?php echo $variant['id'];?>]' placeholder='Fiyat farkı' style='width:100%;'/>
        											        <input type='hidden' name='mermer_rengi_image[<?php echo $variant['id'];?>]' value='<?php echo $variant['variant_image'];?>' />
        											        <input type='hidden' name='mermer_rengi_name_en[<?php echo $variant['id'];?>]' value='<?php echo $variant['variant_name_en'];?>' />
        											    </div>
        											</div>
    											<?php } ?>
    										</div>
										</div>
										<div class='variantDiv'>
    										<div class="input_title">
    											Mermer Şekli
    										</div>
    										<div class="m-t-10">
    											<?php foreach($mermer_sekli as $variant){ ?>
        											<div style='display:grid; grid-template-columns:25px auto 100px;'>
        											    <span>
        											        
        											    </span>
        											    <label for='variant_<?php echo $variant['id'];?>'>
        											        <input type='checkbox' id='mermer_sekli_<?php echo $variant['id'];?>' name='mermer_sekli_name_tr[<?php echo $variant['id'];?>]' value='<?php echo $variant['variant_name_tr'];?>' /> <?php echo $variant['variant_name_tr'];?>
        											    </label>
        											    <div>
        											        <input type='number' name='mermer_sekli_price[<?php echo $variant['id'];?>]' placeholder='Fiyat farkı' style='width:100%;'/>
        											        <input type='hidden' name='mermer_sekli_image[<?php echo $variant['id'];?>]' value='<?php echo $variant['variant_image'];?>' />
        											        <input type='hidden' name='mermer_sekli_name_en[<?php echo $variant['id'];?>]' value='<?php echo $variant['variant_name_en'];?>' />
        											    </div>
        											</div>
    											<?php } ?>
    										</div>
										</div>
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
	$(".addVariant").click(function(){
        $(".vGrid").first().clone().appendTo(".variants");
      });
</script>