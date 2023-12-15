<?php include(APPPATH.'views/includes/header.php');?>
<style>
    .page{
        display:inline-block;
        margin-right:5px;
        width:24px;
        height:24px;
        border-radius:3px;
        border:1px solid #ddd;
        background:#fff;
        text-align:center;
    }
    .act{
        background:#f3f3f3;
        font-weight:bold;
    }
</style>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12 m-t-10">
                    <span class="page_title">
						<i class="fa fa-list"></i> Ürün Listesi
					</span>
                </div>
				<div class="col-lg-12 m-t-20">
				    <div style='padding:15px 0;'>
				        <input name="search" type="text" class="search-input input-empty src" placeholder="Ürün adına göre arama"
				        style='width: 100%;
                                padding: 10px;
                                border: 1px solid #ddd;'>
				        <div class='srcResult'></div>
				    </div>
					<div class="card p-15">
						<table class="table">
							<thead>
								<tr>
									<td><b>Ürün Görseli</b></td>
									<td><b>Ürün Adı</b></td>
									<td><b>Ürün Fiyatı</b></td>
									<td class='text-right'><b>İşlem</b></td>
								</tr>
							</thead>
							<tbody>
								<?php foreach($products as $product){ ?>
									<tr>
										<td>
											<img src="<?php echo FATHER_BASE.'../files/product/img/100/'.explode(',',$product['product_image'])[0];?>" 
											width="35"/>
										</td>
										<td>
											<?php echo $product['product_name_tr'];?>
										</td>
										<td><?php echo $product['product_price'];?></td>
										<td class="text-right">
											<a href="<?php echo UPDATE_PRODUCT.$product['id'];?>" class="btn btn-xs btn-info">
												<i class='fa fa-pencil' ></i>
											</a>
											<a href="javascript:;" link='<?php echo DELETE_PRODUCT.$product['id'];?>' class="btn btn-xs btn-danger del_x">
												<i class='fa fa-trash' ></i>
											</a>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<div style='padding:20px;text-align:center;'>
					    <?php for($i=1; $i<=$total; $i++){ ?>
					    
					        <a class='page <?php if($page == $i){ echo 'act'; }?>' href='<?php echo FATHER_BASE;?>product/product_list?page=<?php echo $i;?>'><?php echo $i;?></a>
					    
					    <?php } ?>
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
	$('.del_x').click(function(){
	    var link = $(this).attr('link')
	    if( confirm('Silmek istediğinizden emin misiniz?') == true   ){
	        window.location.href = link;
	    }
	})
	$(document).on('keyup', '.src', function(){
      const txt = $('.src').val().trim();
      
      if(txt != ''){
          $.ajax({
            type : 'post',
            data: {'txt' : txt},
            url : '<?php echo SEARCH_PRODUCT;?>',
            success : function(response){
                $('.srcResult').html(response);
            }
        })
      }
  
  })
</script>