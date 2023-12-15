<?php include('includes/header.php');?>
<?php include('lang/product_'.$lang.'.php');?>
<style>
    select {
    -moz-appearance: auto !important;
    -webkit-appearance: auto !important;
}
.option-label{
    width:135px;
}
.pro-name{
    font-size:22px;
    font-weight:bold;
}
.pro_xcv{
    display: flex;align-items: center;justify-content: space-between;
}

@media only screen and (max-width: 600px) {
  .pro_xcv{
        display: flex;
        align-items: center;
        justify-content: space-around;
        flex-wrap: wrap;
    }
}


</style>
<div class="page-content">
         <div class="holder mt-0">
            <div class="container text-center" style='display:none'>
               <span><?php echo $home;?> </span> > <span><?php echo $product['category_name_'.$lang];?></span> > <?php echo $product['product_name_'.$lang];?>
            </div>
         </div>
         <div class="holder">
            <div class="container js-prd-gallery" id="prdGallery">
               <div class="row prd-block prd-block--prv-bottom">
                  <div class="col-md-8 col-lg-8 col-xl-8 aside--sticky js-sticky-collision">
                     <div class="aside-content">
                        <div class="mb-2 js-prd-m-holder"></div>
                        <div class="prd-block_main-image">
                           <div class="prd-block_main-image-holder" id="prdMainImage">
                              <div class="product-main-carousel js-product-main-carousel" data-zoom-position="inner">
                                 <div data-value="">
                                    <span class="prd-img">
                                        <img src="<?php echo PRODUCT_IMAGE_PATH;?>400/<?php echo explode(',', $product['product_image'])[0];?>"  class="big-img" alt="" />
                                    </span>
                                 </div>
                                 </div>
                            </div>
                           
                        </div>
                        <div class="product-previews-wrapper">
                           <div class="product-previews-carousel js-product-previews-carousel">
                              <?php foreach (explode(',', $product['product_image']) as $image ){ ?>
                              <a href="#" data-value="">
                                  <span class="prd-img">
                                      
                                          <img src="<?php echo PRODUCT_IMAGE_PATH;?>400/<?php echo $image;?>"  
                                            data-src='<?php echo PRODUCT_IMAGE_PATH;?>400/<?php echo $image;?>'
                                          class="sm-img" alt="" />
                                      
                                  </span>
                              </a>
                              <?php } ?>
                              <a href="#" data-value="">
                                  <span class="prd-img">
                                      <img src="<?php echo PRODUCT_IMAGE_PATH.'technical/'.$product['tech_img'];?>.jpg"
                                        data-src="<?php echo PRODUCT_IMAGE_PATH.'technical/'.$product['tech_img'];?>.jpg" width='90%'
                                      class="sm-img" alt="" />
                                  </span>
                              </a>
                              </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-10 col-lg-10 col-xl-10 mt-1 mt-md-0">
                      <div class="pro-name">
                          <?php echo $product['product_name_'.$lang];?>
                        
                    </div>
                     <div class="prd-block_info prd-block_info--style1" >
                        <div class="prd-block_info-top prd-block_info_item order-0 order-md-2"
                        style="display: grid; grid-template-columns: 1fr 1fr;">
                           <div class="">
                              <div class="prd-block_price--actual prpr" style='font-weight:bold;'><?php echo $product['product_price'];?> ₺</div>
                           </div>
                           <div class="prd-block_viewed-wrap d-none d-md-flex" >
                              <div class="prd-block_viewed" style='display:none'>
                                 <i class="icon-time"></i>
                                 <span style='display:none'><?php echo $this->mdl_common->get_lang()['product_viewed'] ?? 'Bu ürün son 1 saatte 13 kez görüntülendi';?></span>
                              </div>
                           </div>
                        </div>
                        <div class="prd-block_description prd-block_info_item ">
                           <h3><?php echo $pro_desc;?></h3>
                           <p><?php echo $product['product_description_'.$lang];?></p>
                           
                           <div class="mt-1"></div>
                           <div style='display:grid; grid-template-columns:1fr 1fr; grid-gap:15px; margin-top:20px;'>
                               <!--<div>
                                   <span>
                                       <img src='<?php echo ASSETS;?>icons/ic1.png' height='35' />
                                   </span> 
                                   <span><?php echo $this->mdl_common->get_lang()['garanti_suresi'];?></span>
                               </div>-->
                               <div style='white-space:nowrap;'>
                                   <span>
                                       <img src='<?php echo ASSETS;?>icons/ic3.png' height='35' />
                                   </span> 
                                   <span><?php echo $this->mdl_common->get_lang()['guvenli_ambalaj'];?></span>
                               </div>
                               <div style='white-space:nowrap;'>
                                   <span>
                                       <img src='<?php echo ASSETS;?>icons/ic5.png' height='35' />
                                   </span> 
                                   <span><?php echo $this->mdl_common->get_lang()['teslim_suresi'];?></span>
                               </div>
                               <div style='white-space:nowrap;'>
                                   <span>
                                       <img src='<?php echo ASSETS;?>icons/ic2.png' height='35' />
                                   </span> 
                                   <span><?php echo $this->mdl_common->get_lang()['el_yapimi'];?></span>
                               </div>
                               <div style='white-space:nowrap;'>
                                   <span>
                                       <img src='<?php echo ASSETS;?>icons/ic4.png' height='35' />
                                   </span> 
                                   <span><?php echo $this->mdl_common->get_lang()['kirilabilir_urun'];?></span>
                               </div>
                               <div>
                                   
                               </div>
                           </div>
                           
                        </div>

                        </div>
                        
                        
                        <div class="prd-block_info-box prd-block_info_item" style='display:block;'>
                           <div class='pro_xcv'>
                              <div>
                                  <p class="prd-taxes"><?php echo $tax;?>:
                                     <span><?php echo $this->mdl_common->get_lang()['included'];?></span>
                                  </p>
                                  <p><?php echo $category;?>: <span><?php echo $product['category_name_'.$lang];?></span></p>
                              </div>
                              <div>
                                  <p><?php echo $pro_code;?>: <span data-sku="">#00<?php echo $product['id'];?></span></p>
                                    <p><?php echo $brand;?>: <span>Dr. Light</span></p>
                              </div>
                              <div style='text-align:right'>
                                  <img src='<?php echo ASSETS;?>icons/ic7.png' height='100' />
                              </div>
                              
                              
                           </div>
                        </div>
                        <div class="order-0 order-md-100">
                            <?php if(!empty($product['variants'])){ ?>
                                <div class="prd-block_options">
                                    <div class="prd-color swatches">
                                        <div class="option-label">
                                            <?php if(!empty($product['variant_name_'.$lang])){
                                                echo $product['variant_name_'.$lang];
                                            }else{
                                                echo $this->mdl_common->get_lang()['urun_olcusu'];
                                            } ?>:
                                            </div>
                                        <div>
                                            <select name='' onchange='variantsSelect()' class='variantsSelect' style='width:200px'>
                                                <?php foreach(json_decode($product['variants'], true) as $v){ ?>
                                                    <option value='<?php echo $v['name'];?>' 
                                                    price='<?php echo (!empty($v['price']) ? $v['price'] : $product['product_price']);?>'
                                                    cam_rengi_price_1='<?php echo $v['cam_rengi_price_1']??0;?>'
                                                    cam_rengi_price_2='<?php echo $v['cam_rengi_price_2']??0;?>'
                                                    cam_rengi_price_3='<?php echo $v['cam_rengi_price_3']??0;?>'
                                                    platin_price='<?php echo $v['platin_price']??0;?>'
                                                    ><?php echo $v['name'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if(!empty($product['mermer_sekli'])){ ?>
                                <div class="prd-block_options">
                                    <div class="prd-color swatches">
                                        <div class="option-label"><?php echo $this->mdl_common->get_lang()['urun_olcusu'];?>:</div>
                                        <div>
                                            <select onchange='variantsSelect()' class='variantsSelect' style='width:200px'>
                                                <?php foreach(json_decode($product['mermer_sekli'], true) as $v){ ?>
                                                    <option value='<?php echo $v['variant_name_'.$lang];?>' 
                                                    price='<?php echo $v['variant_price'];?>'
                                                    ><?php echo $v['variant_name_'.$lang];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                           <form method="post" action="#">
                              <?php if(!empty($product['govde_rengi'])){ ?>
                                  <div class="prd-block_options">
                                     <div class="prd-color swatches">
                                        <div class="option-label"><?php echo $this->mdl_common->get_lang()['govde_rengi'];?>:</div>
                                        <ul class="images-list js-size-list govde_list" data-select-id="SingleOptionSelector-0">
                                           <?php foreach(json_decode($product['govde_rengi'], true) as $variant){ ?>
                                               <li  id='<?php echo $variant['id'];?>' 
                                                    v_group='<?php echo $this->mdl_common->get_lang()['govde_rengi'];?>' 
                                                    v_name='<?php echo $variant['variant_name_'.$lang];?>'
                                                    v_price='<?php echo $variant['variant_price'];?>'
                                                    product_image='<?php echo $variant['product_image'] ?? "";?>'
                                                    govde_image='<?php echo $variant['govde_image'] ?? "";?>'
                                                >
                                                  <a onclick='variantsSelect()' govde_image='<?php echo $variant['govde_image'] ?? "";?>' product_image='<?php echo $variant['product_image'] ?? "";?>' class='variant' href="#" data-value="<?php echo $variant['variant_name_'.$lang];?>" 
                                                  data-toggle="tooltip" data-placement="top" data-original-title="<?php echo $variant['variant_name_'.$lang];?>">
                                                      <span class="image-container image-container--product">
                                                          <img src="<?php echo VARIANT_IMG_PATH.$variant['variant_image'];?>" alt="">
                                                          </span>
                                                   </a>
                                               <li>
                                           <?php } ?>
                                        </ul>
                                     </div>
                                  </div>
                              <?php } ?>
                              <?php if(!empty($product['ic_renk'])){ ?>
                                  <div class="prd-block_options">
                                     <div class="prd-color swatches">
                                        <div class="option-label"><?php echo $this->mdl_common->get_lang()['ic_renk'];?>:</div>
                                        <ul class="images-list js-size-list" data-select-id="SingleOptionSelector-0">
                                           <?php foreach(json_decode($product['ic_renk'], true) as $variant){ ?>
                                               <li  id='<?php echo $variant['id'];?>' 
                                                    v_group='<?php echo $this->mdl_common->get_lang()['ic_renk'];?>' 
                                                    v_name='<?php echo $variant['variant_name_'.$lang];?>'
                                                >
                                                  <a class='variant' href="#" data-value="<?php echo $variant['variant_name_'.$lang];?>" 
                                                  data-toggle="tooltip" data-placement="top" data-original-title="<?php echo $variant['variant_name_'.$lang];?>">
                                                      <span class="image-container image-container--product">
                                                          <img src="<?php echo VARIANT_IMG_PATH.$variant['variant_image'];?>" alt="">
                                                          </span>
                                                   </a>
                                               <li>
                                           <?php } ?>
                                        </ul>
                                     </div>
                                  </div>
                              <?php } ?>
                              <?php if(!empty($product['cam_rengi'])){ ?>
                             
                                <div class="prd-block_options">
                                    <div class="prd-color swatches">
                                        <div class="option-label"><?php echo $this->mdl_common->get_lang()['cam_rengi'];?>:</div>
                                        <div>
                                            <select class='camRengiSelect' onchange='variantsSelect()' style='width:200px'>
                                                <?php foreach(json_decode($product['cam_rengi'], true) as $variant){ ?>
                                                    <option 
                                                    v_group='<?php echo $this->mdl_common->get_lang()['cam_rengi'];?>'
                                                    v_name='<?php echo $variant['variant_name_'.$lang];?>'
                                                    value='<?php echo $variant['variant_name_'.$lang];?>'
                                                    v_id='<?php echo $variant['id'];?>'
                                                    v_price='<?php echo $variant['variant_price'];?>'
                                                    ><?php echo $variant['variant_name_'.$lang];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                              <?php } ?>
                              <?php if(!empty($product['cam_deseni'])){ ?>
                                  <div class="prd-block_options">
                                     <div class="prd-color swatches">
                                        <div class="option-label"><?php echo $this->mdl_common->get_lang()['cam_deseni'];?>:</div>
                                        <ul class="images-list js-size-list" data-select-id="SingleOptionSelector-0">
                                           <?php foreach(json_decode($product['cam_deseni'], true) as $variant){ ?>
                                               <li  id='<?php echo $variant['id'];?>' 
                                                    v_group='<?php echo $this->mdl_common->get_lang()['cam_deseni'];?>' 
                                                    v_name='<?php echo $variant['variant_name_'.$lang];?>'
                                                >
                                                  <a class='variant' href="#" data-value="<?php echo $variant['variant_name_'.$lang];?>" 
                                                  data-toggle="tooltip" data-placement="top" data-original-title="<?php echo $variant['variant_name_'.$lang];?>">
                                                      <span class="image-container image-container--product">
                                                          <img src="<?php echo VARIANT_IMG_PATH.$variant['variant_image'];?>" alt="">
                                                          </span>
                                                   </a>
                                               <li>
                                           <?php } ?>
                                        </ul>
                                     </div>
                                  </div>
                              <?php } ?>
                              <?php if(!empty($product['mermer_rengi'])){ ?>
                                  <div class="prd-block_options">
                                     <div class="prd-color swatches">
                                        <div class="option-label"><?php echo $this->mdl_common->get_lang()['mermer_rengi'];?>:</div>
                                        <ul class="images-list js-size-list" data-select-id="SingleOptionSelector-0">
                                           <?php foreach(json_decode($product['mermer_rengi'], true) as $variant){ ?>
                                               <li  id='<?php echo $variant['id'];?>' 
                                                    v_group='<?php echo $this->mdl_common->get_lang()['mermer_rengi'];?>' 
                                                    v_name='<?php echo $variant['variant_name_'.$lang];?>'
                                                >
                                                  <a class='variant' href="#" data-value="<?php echo $variant['variant_name_'.$lang];?>" 
                                                  data-toggle="tooltip" data-placement="top" data-original-title="<?php echo $variant['variant_name_'.$lang];?>">
                                                      <span class="image-container image-container--product">
                                                          <img src="<?php echo VARIANT_IMG_PATH.$variant['variant_image'];?>" alt="">
                                                          </span>
                                                   </a>
                                               <li>
                                           <?php } ?>
                                        </ul>
                                     </div>
                                  </div>
                              <?php } ?>
                              <?php if(!empty($product['sapka_rengi'])){ ?>
                                  <div class="prd-block_options">
                                     <div class="prd-color swatches">
                                        <div class="option-label"><?php echo $this->mdl_common->get_lang()['sapka_rengi'];?>:</div>
                                        <ul class="images-list js-size-list" data-select-id="SingleOptionSelector-0">
                                           <?php foreach(json_decode($product['sapka_rengi'], true) as $variant){ ?>
                                               <li  id='<?php echo $variant['id'];?>' 
                                                    v_group='<?php echo  $this->mdl_common->get_lang()['sapka_rengi'];?>' 
                                                    v_name='<?php echo $variant['variant_name_'.$lang];?>'
                                                >
                                                  <a class='variant' href="#" data-value="<?php echo $variant['variant_name_'.$lang];?>" 
                                                  data-toggle="tooltip" data-placement="top" data-original-title="<?php echo $variant['variant_name_'.$lang];?>">
                                                      <span class="image-container image-container--product">
                                                          <img src="<?php echo VARIANT_IMG_PATH.$variant['variant_image'];?>" alt="">
                                                          </span>
                                                   </a>
                                               <li>
                                           <?php } ?>
                                        </ul>
                                     </div>
                                  </div>
                              <?php } ?>
                              
                              
                              <div class="prd-block_actions prd-block_actions--wishlist">
                                 <div class="prd-block_qty">
                                    <div class="qty qty-changer">
                                       <button class="decrease js-qty-button"></button>
                                       <input type="number" class="qty-input" name="quantity" value="1" data-min="1" data-max="99">
                                       <button class="increase js-qty-button"></button>
                                    </div>
                                 </div>
                                 <div class="btn-wrap">
                                    <a href='javascript:;' class="btn btn--add-to-cart addToCart" 
                                    price='<?php echo $product['product_price'];?>'
                                    pro_name='<?php echo $product['product_name_'.$lang];?>'
                                    variant_name=''
                                    discounted_price='<?php echo $product['discount_price'] ?? discount_20($product['product_price'], ($product['extra_discount_percent']/100));?>'
                                    image='<?php echo PRODUCT_IMAGE_PATH;?>400/<?php echo $product['product_image'];?>'
                                    pro_id='<?php echo $product['id'];?>'><?php echo $this->mdl_common->get_lang()['add_to_cart'];?></a>
                                 </div>
                                 
                              </div>
                           </form>

                        </div>

                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="holder holder-mt-small">
		<div class="footer-shop-info">
			<div class="container">
				<div class="text-icn-blocks-bg-row">
					<div class="text-icn-block-footer">
						<div class="icn">
							<i class="icon-trolley"></i>
						</div>
						<div class="text">
							<h4><?php echo $this->mdl_common->get_lang()['ucretsiz_teslimat'];?></h4>
							<p><?php echo $this->mdl_common->get_lang()['ucretsiz_teslimat_text'];?></p>
						</div>
					</div>
					<div class="text-icn-block-footer">
						<div class="icn">
							<i class="icon-currency"></i>
						</div>
						<div class="text">
							<h4><?php echo $this->mdl_common->get_lang()['yuksek_kalite'];?></h4>
							<p><?php echo $this->mdl_common->get_lang()['yuksek_kalite_text'];?></p>
							
						</div>
					</div>
					<div class="text-icn-block-footer">
						<div class="icn">
							<i class="icon-diplom"></i>
						</div>
						<div class="text">
							<h4><?php echo $this->mdl_common->get_lang()['garantili_urun'];?></h4>
							<p><?php echo $this->mdl_common->get_lang()['garantili_urun_text'];?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
         <div class="holder mt-3 mt-md-5">
            <div class="container">
               <ul class="nav nav-tabs product-tab">
                  <li class="nav-item"><a href="#Tab1" class="nav-link" data-toggle="tab"><?php echo $pro_desc;?>
                     <span class="toggle-arrow"><span></span><span></span></span>
                     </a>
                  </li>
                  <li class="nav-item"><a href="#Tab2" class="nav-link" data-toggle="tab"><?php echo $this->mdl_common->get_lang()['tech_img'];?>
                     <span class="toggle-arrow"><span></span><span></span></span>
                     </a>
                  </li>
                  <!--<li class="nav-item"><a href="#Tab3" class="nav-link" data-toggle="tab">Kullanıcı Yorumları
                     <span class="toggle-arrow"><span></span><span></span></span>
                     </a>
                  </li>-->
               </ul>
               <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade" id="Tab1">
                     <div class="">
                        <?php echo $product['product_description_'.$lang];?>
                        <br><br>
                        <?php if($lang == 'en'){ ?>
                            <p>
                                Installation and electrical connections of the product should only be made by qualified personnel. <br>
                                During assembly, the directions in the 'Installation manual' that comes out of the product packaging should be followed.
                                Clean the product regularly with a damp cloth.
                            </p>
                        <?php } ?>
                        <?php if($lang == 'tr'){ ?>
                            <p>

                                Ürünün montajı ve elektrik bağlantıları sadece uzman personel tarafından yapılmalıdır.<br>
                                
                                Montaj esnasında, ürün ambalajından çıkan ‘Montaj kılavuzu’ndaki yönlendirmelere uyulmalıdır.<br>
                                
                                Ürünü düzenli aralıklarla nemli bir bezle temizleyiniz.
                           </p>
                        <?php } ?>
                        
                     </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="Tab2">
                     <div class="text-center">
                        <img src='<?php echo PRODUCT_IMAGE_PATH.'technical/'.$product['tech_img'];?>.jpg' width='90%'/>
                     </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="Tab3">
                     <div class="">
                        At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="holder">
            <div class="container" style="padding: 0">
               <div class="title-wrap text-center">
                  <h2 class="h1-style"><?php echo $this->mdl_common->get_lang()['begen'];?></h2>
               </div>
               <div class="prd-grid-wrap position-relative">
                  <div class="prd-grid data-to-show-4 data-to-show-lg-4 data-to-show-md-3 data-to-show-sm-2 data-to-show-xs-2 js-category-grid" data-grid-tab-content>
                     <?php foreach($last_products as $pr){ ?>
                     <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                        <div class="prd-inside">
                           <div class="prd-img-area">
                              <a href="<?php echo PRODUCT_DETAIL.$pr['id'];?>" class="prd-img image-hover-scale image-container">
                                 <img data-src="<?php echo PRODUCT_IMAGE_PATH;?>400/<?php echo explode(',', $pr['product_image'])[0];?>" alt="" class="js-prd-img lazyload fade-up">
                              </a>

                           </div>
                           <div class="prd-info">
                              <div class="prd-info-wrap">
                                 <div class="prd-tag"><a href="#"><?php echo $pr['category_name_'.$lang];?></a></div>
                                 <h2 class="prd-title"><?php echo $pr['product_name_'.$lang];?></h2>
                              </div>
                              <div class="prd-hovers">
                                 <div class="prd-price" style='display:block; text-align:center;'>
                                    <div class="price-new pr1"><?php echo $pr['product_price'];?> TL</div> 
                                    <?php if(empty($pr['discount_price'])){ ?>
                                        <div class="price-new pr2"><?php echo $this->mdl_common->get_lang()['sepet_indirim'];?> <br><?php echo discount_20($pr['product_price']);?> TL</div>
                                 
                                    <?php }else{ ?>
                                        <div class="price-new pr2"><?php echo $this->mdl_common->get_lang()['sepet_ozel_indirim'];?> <br><?php echo $pr['discount_price'];?> TL</div>
                                    <?php } ?>
                                 </div>
                                 <div class="prd-action">
                                    <div class="prd-action-left">
                                       
                                        <a href='<?php echo PRODUCT_DETAIL.$pr['id'];?>' class="btn" >İNCELE</a>
                                       
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php } ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
<?php include('includes/footer.php');?>
<script>

    var dp = '<?php echo $product['discount_price'] ?? 0;?>'
    
    $(document).ready(function(){
        $('.images-list li:first-child').each(function(){
            $(this).addClass('active');
            $(document).trigger('function_complete');
        })
        
    })
    
    
    $('.govde_list li a').on('click touchend', function(){
        
        if($(this).attr('product_image') != ''){
            
            var src = '<?php echo PRODUCT_IMAGE_PATH;?>400/'+$(this).attr('product_image');
            $('.big-img').attr('src', src);
       
        }
        if($(this).attr('govde_image') != ''){
            
            var src = '<?php echo PRODUCT_IMAGE_PATH;?>400/'+$(this).attr('govde_image');
            $('.big-img').attr('src', src);
       
        }
        $(document).trigger('click_complete');
    })
    
    $(document).bind('function_complete', variantsSelect);
    $(document).bind('click_complete', variantsSelect);
    
    
    function variantsSelect(){
       
        var name = $('option:selected', '.variantsSelect').text();
        
        var v_price = 0;
        var platin_price = 0;
        
        if($('.camRengiSelect').length > 0){
            var cam_rengi_id = $('option:selected', '.camRengiSelect').attr('v_id');
            var v_price = parseInt($('option:selected', '.camRengiSelect').attr('v_price'));
            
        }
        
        if(isNaN(v_price)){
            v_price = 0;
        }
        
        if($('.variantsSelect').length > 0){
            var pr = parseInt($('option:selected', '.variantsSelect').attr('price'));
            var v_price = parseInt($('option:selected', '.variantsSelect').attr('cam_rengi_price_'+cam_rengi_id));
            var platin_price = parseInt($('option:selected', '.variantsSelect').attr('platin_price'));
            
            
            if(v_price > 0){
                console.log('test')
            }else{
                v_price = 0;
            }
        }else{
            var pr = parseInt(<?php echo $product['product_price'];?>);
            
        }
        
        
        var govde_v_price = parseInt($('.govde_list li.active').attr('v_price'));
        var extra_d_p = parseFloat(<?php echo $product['extra_discount_percent']/100;?>);
        
        if(isNaN(govde_v_price)){
            govde_v_price = 0;
        }
        
        if((govde_v_price > 0) && (platin_price > 0)){
            govde_v_price = platin_price;
        }
        
        var price = parseFloat(parseInt(pr + v_price + govde_v_price)).toFixed(2);
        
        if(parseInt(dp) > 0){
            discounted_price = discounted_price;
        }else{
            discounted_price = parseFloat(price*(0.8 - extra_d_p)).toFixed(2);
        }
        
        $('.prpr').text(price+' ₺')
        $('.addToCart').attr('price', price);
        $('.addToCart').attr('discounted_price', discounted_price);
        $('.addToCart').attr('variant_name', name);
    }
    
    $('.sm-img').click(function(){
        var src = $(this).attr('src');
        $('.big-img').attr('src', src);
    })
    
    
    $('.addToCart').click(function(){
        const id = $(this).attr('pro_id');
        const image = $(this).attr('image');
        const pro_name = $(this).attr('pro_name')+' '+$(this).attr('variant_name');
        const price = $(this).attr('price');
        const discounted_price = $(this).attr('discounted_price');
        let variant = [];
        let v_name = '';
        if($('.images-list').length > 0){
            if($('.images-list .active').length > 0){
                $('.images-list .active').each(function(){
                  variant.push( $(this).attr('v_group')+' : '+$(this).attr('v_name') ); 
                })
                console.log(variant.join())
            }else{
                alert('Lütfen ürün seçeneklerini seçiniz.')
                return false
            }
        }
        
        if($('.camRengiSelect').length > 0){
            
            variant.push( $('.camRengiSelect').find(":selected").attr('v_group')+' : '+$('.camRengiSelect').find(":selected").attr('v_name') ); 
            
        }
        
        const qty = $('.qty-input').val();
        $.ajax({
            type : 'post',
            data : {'id' : id, 'qty' : qty, 'image':image,'pro_name':pro_name, 'price' : price, 'discounted_price' : discounted_price, 'variant' : variant.join('<br>') },
            url : '<?php echo ADD_TO_CART;?>',
            success : function(response){
                if(response == 'success'){
                    $('#dropdnMinicart').addClass('is-opened');
                }
            }
        }).done(function(){
            $.ajax({
            type : 'get',
            url : '<?php echo SHOW_CART;?>',
            success : function(response){
                $('.minicart-drop-content').html(response)
            }
            
        })
        
        $.ajax({
                type : 'get',
                url : '<?php echo FATHER_BASE;?>cart/count_cart',
                success : function(response){
                    if(parseInt(response) > 0){
                        $('.minicart-qty').show()
                        $('.minicart-qty').html(response)
                    }else{
                        $('.minicart-qty').hide()
                    }
                }
        })
        })
    })
</script>