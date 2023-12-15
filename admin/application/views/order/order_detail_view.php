<?php include(APPPATH.'views/includes/header.php');?>
<?php 

function status($s){
    if($s == '0'){ $st = 'Beklemede'; }
    if($s == '1'){ $st = 'Hazırlanıyor'; }
    if($s == '2'){ $st = 'Kargoya verildi'; }
    if($s == '3'){ $st = 'Teslim Edildi'; }
    if($s == '4'){ $st = 'İptal edildi'; }
    
    return $st;
} 

function pm($s){
    if($s == 'cc'){ $st = 'Kredi Kartı'; }
    if($s == 'bank'){ $st = 'Havale & EFT'; }
    
    return $st;
} 

?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12 m-t-10">
                    <span class="page_title">
						<i class="fa fa-list"></i> Sipariş Detay Bilgileri
					</span>
                </div>
                <?php $userdata = json_decode($order['user_data'],1);?>
				<div class="col-lg-12 m-t-20">
				    <div class='row'>
				        <div class="col-lg-6 m-t-20">
				            <div class="card p-15">
        						<p><strong>Kullanıcı Bilgileri</strong></p>
        						<p>Ad - Soyad : <?php echo $userdata['first_name'].' '.$userdata['last_name'];?></p>
        						<p>Telefon : <?php echo $userdata['phone'];?></p>
        						<p>Email : <?php echo $order['email'];?></p>
        						<p>TC : <?php echo $userdata['tc_no'];?></p>
        						<p>Adres : <?php echo $userdata['address'];?></p>
        						<p>İl - İlçe : <?php echo $userdata['city'].' - '.$userdata['town'];?></p>
        						<p>Durum : <?php echo status($order['status']);?></p>
        						<p>Ödeme Yöntemi : <?php echo pm($userdata['payment_method']);?></p>
        						<?php if($order['status'] == '2'){ 
        						    $cargo = json_decode($order['cargo_data'],1);
        						?>
        						
        						    <p>
        						        Kargo Şirketi : <?php echo $cargo['cargo'];?>
        						    </p>
        						    <p>
        						        Takip No : <?php echo $cargo['cargo_number'];?>
        						    </p>
        						
        						<?php } ?>
        					</div>
				        </div>
				        <div class="col-lg-6 m-t-20">
				            <div class="card p-15">
        						<form action='<?php echo ORDER_UPDATE_POST;?>' method='post'>
            						<p><b>Sipariş Durumu</b></p>
            						<p>
            						    <select class='stt' name='status' required>
            						        <option value='0' <?php if($order['status'] == '0'){ echo 'selected'; } ?> >Beklemede</option>
            						        <option value='1' <?php if($order['status'] == '1'){ echo 'selected'; } ?> >Hazırlanıyor</option>
            						        <option value='2' <?php if($order['status'] == '2'){ echo 'selected'; } ?> >Kargoya verildi</option>
            						        <option value='3' <?php if($order['status'] == '3'){ echo 'selected'; } ?> >Teslim edildi</option>
            						        <option value='4' <?php if($order['status'] == '4'){ echo 'selected'; } ?> >İptal edildi</option>
            						    </select>
            						</p>
            						<p class='hd hidden'>
            						    <select class='crg' name='cargo' >
            						        <option value=''>Kargo Firması seçiniz</option>
            						        <option value='Yurtiçi Kargo'>Yurtiçi Kargo</option>
            						        <option value='Aras Kargo'>Aras Kargo</option>
            						        <option value='Sürat Kargo'>Sürat Kargo</option>
            						        <option value='PTT Kargo'>PTT Kargo</option>
            						    </select>
            						</p>
            						<p class='hd hidden'>
            						    <input class='crg' type='text' name='cargo_number' placeholder='Kargo Takip No'>
            						</p>
            						<p>
            						    <input type='submit' class='btn btn-sm btn-info' value='Güncelle' />
            						</p>
            						<input type='hidden' name='order_id' value="<?php echo $order['order_id'];?>" />
        						</form>
        					</div>
				        </div>
				    </div>
				    <?php $user = json_decode($order['user_data'],1);?>
					
				</div>
				<div class="col-lg-12 m-t-20">
					<div class="card p-15">
					    <?php $order = json_decode($order['order_data'],1);?>
						<p><strong>Sipariş Bilgileri</strong></p>
						
						   <table class='table'>
						       <tr>
						           <td>Ürün</td>
						           <td>Varyant</td>
						           <td>Adet</td>
						           <td>Fiyat</td>
						       </tr>
						   
						<?php $total = 0;?>
						<?php foreach($order as $row){ ?>
						    <tr>
					           <td>
					           <?php echo $row['pro_name'];?><br>
					           <img src='<?php echo $row['image'];?>' width='100' />
					           </td>
					           <td><?php echo $row['variant'] ?? '';?></td>
					           <td><?php echo $row['qty'];?></td>
					           <td><?php echo $row['price'];?></td>
					       </tr>
					       <?php $total += ($row['price'] * $row['qty']); ?>
						<?php } ?>
						<tr>
				           <td></td>
				           <td></td>
				           <td><b>Toplam</b></td>
				           <td><b><?php echo number_format($total,2);?> TL</b></td>
				       </tr>
						</table>
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
	$('.stt').change(function(){
	    var x = $(this).val();
	    
	    if(x == '2'){
	        $('.hd').removeClass('hidden');
	        $('.crg').attr('required','required')
	    }else{
	        $('.hd').addClass('hidden');
	        $('.crg').removeAttr('required')
	    }
	    
	    
	})
</script>