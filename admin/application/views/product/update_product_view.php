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
                <?php //debug($product);?>
                <div class="col-lg-12 m-t-10">
                    <span class="page_title">
						<i class="fa fa-pencil"></i> Ürün Güncelle
					</span>
                </div>
				<div class="col-lg-12 m-t-20">
					<div class="card p-15">
						<div class="form_div">
							
							<div class="">
								<div class="input_title">
									Ürün Bilgileri
								</div>
								<div>
									Güncellemek istediğiniz Ürünün tüm detay 
									bilgilerini bu alandan girebilirsiniz.
								</div>
							</div>
							<form action="<?php echo UPDATE_PRODUCT_POST;?>" method="post" enctype="multipart/form-data">
								<div class="m-b-20">
									<div class="m-b-20 grid-5">
										<div class="input_title">
											Ürün Kategorisi
										</div>
										<div class="m-t-10">
										    <select name='cat_id' required >
										        <option>Seçiniz</option>
    											<?php foreach($categories as $category){ ?>
    											    <option value='<?php echo $category['id'];?>' <?php echo ($product['cat_id'] == $category['id']) ? 'selected' : '';?> ><?php echo $category['category_name_tr'];?></option>
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
											<input class="input_style dropify" multiple type="file" name="product_image[]" data-default-file="<?php echo FATHER_BASE.'../files/product/img/400/'.explode(',',$product['product_image'])[0];?>"/>
										</div>
										<div style='display:flex; flex-wrap:wrap; gap:10px;'>
										    <?php foreach(explode(',',$product['product_image']) as $img){ ?>
										        <div class='immg' name='<?php echo $img;?>' style='width:120px;'>
										            <img src='<?php echo FATHER_BASE.'../files/product/img/100/'.$img;?>' width='100%'/>
										            <a href='javascript:;' class='delx' 
										            style='display: inline-block;text-align: center;color: red;font-size:16px;'
										            ><i class='fa fa-trash'></i></a>
										            <a href='#' class='updx' img='<?php echo $img;?>'
										            style='display: inline-block;text-align: center;color: blue;font-size:16px;'
										            data-toggle="modal" data-target="#variantModal"><i class='fa fa-cog'></i></a>
										        </div>
										    <?php } ?>
										    <input type='hidden' value='<?php echo $product['product_image'];?>' name='pro_imgs' class='pro_imgs'/>
										</div>
										<div id="variantModal" class="modal fade" role="dialog">
                                          <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"></h4>
                                              </div>
                                              <div class="modal-body">
                                                <div class="m-t-10">
    											<?php foreach($govde as $key => $variant){ ?>
    											            <?php $checked[$key] = '';?>
            											    <?php $price[$key] = 0;?>
            											    <?php $govde_image[$key] = '';?>
        											<?php if(!empty(json_decode($product['govde_rengi'], true))){ ?>
        											        
            											<?php foreach(json_decode($product['govde_rengi'], true) as $k => $g){ 
            											    
            											     if($variant['id'] == $g['id']){ 
            											        $checked[$key] = 'checked';
            											        $price[$key] = $g['variant_price'];
            											        $govde_image[$key] = $g['govde_image']??'';
                											 } ?>
            											<?php } ?>
        											
        											<?php } ?>
        											<?php if($checked[$key] == 'checked'){ ?>
            											<div style='display:grid; grid-template-columns:25px auto 100px;'>
            											    <span>
            											        <img src="<?php echo FATHER_BASE.'../files/variant/img/100/'.$variant['variant_image'];?>" 	width="20"/>
            											    </span>
            											    <label for='govde_<?php echo $variant['id'];?>'>
            											        <input type='radio' id='govde_<?php echo $variant['id'];?>' 
            											        name='govde_image'
            											        value='<?php echo $variant['id'];?>' 
            											        /> <?php echo $variant['variant_name_tr'];?>
            											    </label>
            											    
            											</div>
        											<?php } ?>
    											<?php } ?>
    											<input type='hidden' name='image_url' value='' class='image_url'/>
    											<input type='hidden' name='pro_id' class='pro_id' value='<?php echo $product['id'];?>'/>
    											<br>
    											<a href='javascript:;' class='save_img'>Kaydet</a>
    										</div>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                                              </div>
                                            </div>
                                        
                                          </div>
                                        </div>
										<div class="clearfix"></div>
									</div>
									<?php foreach($_SESSION['lang_array'] as $lang){ ?>
    									<div class="m-b-20">
    										<div class="input_title">
    											Ürün Adı ( <?php echo strtoupper($lang);?> )
    										</div>
    										<div class="m-t-10">
    											<input type="hidden" name="id" value="<?php echo $product['id'];?>"/>
    											<input class="input_style" type="text" name="product_name_<?php echo $lang;?>" placeholder="Ürün Adı" required
    											value="<?php echo $product['product_name_'.$lang];?>" />
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
											required ><?php echo $product['product_description_'.$lang];?></textarea>
										</div>
									</div>
									<?php } ?>
									
									<div class="m-b-20 grid-5">
										<div class='variantDiv'>
    										<div class="input_title">
    											Gövde Rengi
    										</div>
    										<div class="m-t-10">
    											<?php foreach($govde as $key => $variant){ ?>
    											            <?php $checked[$key] = '';?>
            											    <?php $price[$key] = 0;?>
        											<?php if(!empty(json_decode($product['govde_rengi'], true))){ ?>
        											        
            											<?php foreach(json_decode($product['govde_rengi'], true) as $k => $g){ 
            											    
            											     if($variant['id'] == $g['id']){ 
            											        $checked[$key] = 'checked';
            											        $price[$key] = $g['variant_price'];
                											 } ?>
            											<?php } ?>
        											
        											<?php } ?>
    											
        											<div style='display:grid; grid-template-columns:25px auto 100px;'>
        											    <span>
        											        <img src="<?php echo FATHER_BASE.'../files/variant/img/100/'.$variant['variant_image'];?>" 	width="20"/>
        											    </span>
        											    <label for='govde_<?php echo $variant['id'];?>'>
        											        <input type='checkbox' id='govde_<?php echo $variant['id'];?>' 
        											        name='govde_name_tr[<?php echo $variant['id'];?>]' 
        											        value='<?php echo $variant['variant_name_tr'];?>' 
        											        <?php echo $checked[$key]; ?>
        											        /> <?php echo $variant['variant_name_tr'];?>
        											    </label>
        											    <div>
        											        <input type='number' name='govde_price[<?php echo $variant['id'];?>]' value='<?php echo $price[$key];?>' placeholder='Fiyat farkı' style='width:100%;'/>
        											        <input type='hidden' name='govde_image[<?php echo $variant['id'];?>]' value='<?php echo $variant['variant_image'];?>' />
        											        <input type='hidden' name='variant_govde_image[<?php echo $variant['id'];?>]' value='<?php echo $govde_image[$key];?>' />
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
    											<?php foreach($cam as $key => $variant){ ?>
    											            <?php $checked[$key] = '';?>
            											    <?php $price[$key] = 0;?>
    											    <?php if(!empty(json_decode($product['cam_rengi'], true))){ ?>
        											        
            											<?php foreach(json_decode($product['cam_rengi'], true) as $k => $g){ 
            											    
            											     if($variant['id'] == $g['id']){ 
            											        $checked[$key] = 'checked';
            											        $price[$key] = $g['variant_price'];
                											 } ?>
            											<?php } ?>
        											
        											<?php } ?>
    											
        											<div style='display:grid; grid-template-columns:25px auto 100px;'>
        											    <span>
        											        <img src="<?php echo FATHER_BASE.'../files/variant/img/100/'.$variant['variant_image'];?>" 	width="20"/>
        											    </span>
        											    <label for='cam_rengi_<?php echo $variant['id'];?>'>
        											        <input type='checkbox' id='cam_rengi_<?php echo $variant['id'];?>' 
        											        name='cam_rengi_name_tr[<?php echo $variant['id'];?>]' 
        											        <?php echo $checked[$key]; ?>
        											        value='<?php echo $variant['variant_name_tr'];?>' /> <?php echo $variant['variant_name_tr'];?>
        											    </label>
        											    <div>
        											        <input type='number' name='cam_rengi_price[<?php echo $variant['id'];?>]' value='<?php echo $price[$key];?>' placeholder='Fiyat farkı' style='width:100%;'/>
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
    											            <?php $checked[$key] = '';?>
            											    <?php $price[$key] = 0;?>
    											    <?php if(!empty(json_decode($product['cam_deseni'], true))){ ?>
        											        
            											<?php foreach(json_decode($product['cam_deseni'], true) as $k => $g){ 
            											    
            											     if($variant['id'] == $g['id']){ 
            											        $checked[$key] = 'checked';
            											        $price[$key] = $g['variant_price'];
                											 } ?>
            											<?php } ?>
        											
        											<?php } ?>
        											<div style='display:grid; grid-template-columns:25px auto 100px;'>
        											    <span>
        											        <img src="<?php echo FATHER_BASE.'../files/variant/img/100/'.$variant['variant_image'];?>" 	width="20"/>
        											    </span>
        											    <label for='cam_deseni_<?php echo $variant['id'];?>'>
        											        <input type='checkbox' id='cam_deseni_<?php echo $variant['id'];?>' 
        											        <?php echo $checked[$key]; ?>
        											        name='cam_deseni_name_tr[<?php echo $variant['id'];?>]' 
        											        value='<?php echo $variant['variant_name_tr'];?>' /> <?php echo $variant['variant_name_tr'];?>
        											    </label>
        											    <div>
        											        <input type='number' name='cam_deseni_price[<?php echo $variant['id'];?>]' value='<?php echo $price[$key];?>'  placeholder='Fiyat farkı' style='width:100%;'/>
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
    											            <?php $checked[$key] = '';?>
            											    <?php $price[$key] = 0;?>
    											    <?php if(!empty(json_decode($product['sapka_rengi'], true))){ ?>
        											        
            											<?php foreach(json_decode($product['sapka_rengi'], true) as $k => $g){ 
            											    
            											     if($variant['id'] == $g['id']){ 
            											        $checked[$key] = 'checked';
            											        $price[$key] = $g['variant_price'];
                											 } ?>
            											<?php } ?>
        											
        											<?php } ?>
        											<div style='display:grid; grid-template-columns:25px auto 100px;'>
        											    <span>
        											        <img src="<?php echo FATHER_BASE.'../files/variant/img/100/'.$variant['variant_image'];?>" 	width="20"/>
        											    </span>
        											    <label for='sapka_rengi_<?php echo $variant['id'];?>'>
        											        <input type='checkbox' id='sapka_rengi_<?php echo $variant['id'];?>' 
        											        name='sapka_rengi_name_tr[<?php echo $variant['id'];?>]' 
        											        <?php echo $checked[$key]; ?>
        											        value='<?php echo $variant['variant_name_tr'];?>' /> <?php echo $variant['variant_name_tr'];?>
        											    </label>
        											    <div>
        											        <input type='number' name='sapka_rengi_price[<?php echo $variant['id'];?>]' value='<?php echo $price[$key];?>'  placeholder='Fiyat farkı' style='width:100%;'/>
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
    											            <?php $checked[$key] = '';?>
            											    <?php $price[$key] = 0;?>
    											    <?php if(!empty(json_decode($product['ic_renk'], true))){ ?>
        											        
            											<?php foreach(json_decode($product['ic_renk'], true) as $k => $g){ 
            											    
            											     if($variant['id'] == $g['id']){ 
            											        $checked[$key] = 'checked';
            											        $price[$key] = $g['variant_price'];
                											 } ?>
            											<?php } ?>
            										<?php } ?>
        											<div style='display:grid; grid-template-columns:25px auto 100px;'>
        											    <span>
        											        <img src="<?php echo FATHER_BASE.'../files/variant/img/100/'.$variant['variant_image'];?>" 	width="20"/>
        											    </span>
        											    <label for='ic_rengi_<?php echo $variant['id'];?>'>
        											        <input type='checkbox' id='ic_rengi_<?php echo $variant['id'];?>' 
        											        name='ic_rengi_name_tr[<?php echo $variant['id'];?>]' 
        											        <?php echo $checked[$key]; ?>
        											        value='<?php echo $variant['variant_name_tr'];?>' /> <?php echo $variant['variant_name_tr'];?>
        											    </label>
        											    <div>
        											        <input type='number' name='ic_rengi_price[<?php echo $variant['id'];?>]' value='<?php echo $price[$key];?>'  placeholder='Fiyat farkı' style='width:100%;'/>
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
    											            <?php $checked[$key] = '';?>
            											    <?php $price[$key] = 0;?>
    											    <?php if(!empty(json_decode($product['mermer_rengi'], true))){ ?>
        											        
            											<?php foreach(json_decode($product['mermer_rengi'], true) as $k => $g){ 
            											    
            											     if($variant['id'] == $g['id']){ 
            											        $checked[$key] = 'checked';
            											        $price[$key] = $g['variant_price'];
                											 } ?>
            											<?php } ?>
            										<?php } ?>
        											<div style='display:grid; grid-template-columns:25px auto 100px;'>
        											    <span>
        											        <img src="<?php echo FATHER_BASE.'../files/variant/img/100/'.$variant['variant_image'];?>" 	width="20"/>
        											    </span>
        											    <label for='variant_<?php echo $variant['id'];?>'>
        											        <input type='checkbox' id='mermer_rengi_<?php echo $variant['id'];?>' 
        											        name='mermer_rengi_name_tr[<?php echo $variant['id'];?>]'
        											        <?php echo $checked[$key]; ?>
        											        value='<?php echo $variant['variant_name_tr'];?>' /> <?php echo $variant['variant_name_tr'];?>
        											    </label>
        											    <div>
        											        <input type='number' name='mermer_rengi_price[<?php echo $variant['id'];?>]' value='<?php echo $price[$key];?>'  placeholder='Fiyat farkı' style='width:100%;'/>
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
    											            <?php $checked[$key] = '';?>
            											    <?php $price[$key] = 0;?>
    											    <?php if(!empty(json_decode($product['mermer_sekli'], true))){ ?>
        											        
            											<?php foreach(json_decode($product['mermer_sekli'], true) as $k => $g){ 
            											    
            											     if($variant['id'] == $g['id']){ 
            											        $checked[$key] = 'checked';
            											        $price[$key] = $g['variant_price'];
                											 } ?>
            											<?php } ?>
            										<?php } ?>
        											<div style='display:grid; grid-template-columns:25px auto 100px;'>
        											    <span>
        											        <img src="<?php echo FATHER_BASE.'../files/variant/img/100/'.$variant['variant_image'];?>" 	width="20"/>
        											    </span>
        											    <label for='variant_<?php echo $variant['id'];?>'>
        											        <input type='checkbox' id='mermer_sekli_<?php echo $variant['id'];?>' 
        											        name='mermer_sekli_name_tr[<?php echo $variant['id'];?>]'
        											        <?php echo $checked[$key]; ?>
        											        value='<?php echo $variant['variant_name_tr'];?>' /> <?php echo $variant['variant_name_tr'];?>
        											    </label>
        											    <div>
        											        <input type='number' name='mermer_sekli_price[<?php echo $variant['id'];?>]' value='<?php echo $price[$key];?>'  placeholder='Fiyat farkı' style='width:100%;'/>
        											        <input type='hidden' name='mermer_sekli_image[<?php echo $variant['id'];?>]' value='<?php echo $variant['variant_image'];?>' />
        											        <input type='hidden' name='mermer_sekli_name_en[<?php echo $variant['id'];?>]' value='<?php echo $variant['variant_name_en'];?>' />
        											    </div>
        											</div>
    											<?php } ?>
    										</div>
										</div>
    								</div>
									<div class="m-b-20">
										<div class="input_title">
											Ürün Fiyatı
										</div>
										<div class="m-t-10">
											<input class="input_style" type="number" 
											name="product_price" placeholder="Ürün Fiyatı" required="true" 
											step=".01"
											value="<?php echo $product['product_price'];?>"/>
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
    										        <input value='<?php echo $product['variant_name_'.$lang];?>' type='text' name='variant_group_name_<?php echo $lang;?>' placeholder='Varyant Grubu Adı (<?php echo strtoupper($lang);?>)' />
    										    </div>
        									<?php } ?>
										    <?php if(!empty($product['variants'])){ ?>
    										    <?php foreach(json_decode($product['variants'], true) as $v){ ?>
        										    <div class='vGrid m-t-10'>
        											    <div>
        											        <input type='text' name='variant_name[]' placeholder='Varyant Adı' value='<?php echo $v['name'];?>'/>
        											    </div>
        											    <div>
        											        <input type='number' name='variant_price[]'  placeholder='Varyant Fiyatı' value='<?php echo $v['price'];?>'/>
        											    </div>
        											</div>
    										    <?php } ?>
										    <?php }else{ ?>
											<div class='vGrid'>
											    <div>
											        <input type='text' name='variant_name[]' placeholder='Varyant Adı'/>
											    </div>
											    <div>
											        <input type='number' name='variant_price[]'  placeholder='Varyant Fiyatı'/>
											    </div>
											</div>
											<?php } ?>
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
	
	$(".updx").click(function(){
	
	    var img = $(this).attr('img');
	    $('.image_url').val(img);
	    
	})
	
	$(".save_img").click(function(){
	$(this).hide();
	    var img = $('.image_url').val();
	    var variant = $('input[name=govde_image]:checked').val();
	    var pro_id = $('.pro_id').val();
	    
	    $.ajax({
	        type : 'post',
	        url : '<?php echo UPDATE_GOVDE_IMAGE_POST;?>',
	        data : {'pro_id':pro_id, 'variant':variant, 'img':img},
	        success : function(response){
	            if(response == 'ok'){
	                alert('İşlem başarılı!')
	                location.reload();
	            }else{
	                alert('Güncelleme sırasında hata oluştu...');
	                $(this).hide();
	            }
	        }
	    }).done(function(){
	        $('#variantModal').modal('hide');
	        $(this).show();
	    })
	    
	})
	
	
	$(".addVariant").click(function(){
        $(".vGrid").first().clone().appendTo(".variants");
      });
      $('.delx').click(function(){
        
        img_array = [];
        
        $(this).parent().remove();
        
        $('.immg').each(function(){
            var name = $(this).attr('name');
            
            img_array.push(name);
            
        })
        
        img_array.join(',');
        
        $('.pro_imgs').val(img_array);
        
        
    })
</script>