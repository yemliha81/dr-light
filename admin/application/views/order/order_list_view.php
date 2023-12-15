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

?>
<style>
    .today_order{
        display:inline-block;
        padding:5px;
        background:green;
        color:#fff;
        font-size: 18px;
    }
</style>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12 m-t-10" 
                style='display: flex;
                align-items: center;
                justify-content: space-between;'>
                    <span class="page_title">
						<i class="fa fa-list"></i> Sipariş Listesi
					</span>
					<span class='today_order'>
					    Bugünkü Satış Tutarı : <?php echo $today_orders['total'];?>
					</span>
                </div>
				<div class="col-lg-12 m-t-20">
					<div class="card p-15">
						<table class="table">
							<thead>
								<tr>
									<td><b># Sipariş No</b></td>
									<td><b>Tarih</b></td>
									<td><b>Kullanıcı Adı</b></td>
									<td><b>Tutar</b></td>
									<td><b>Sipariş Durumu</b></td>
									<td class='text-right'><b>İşlem</b></td>
								</tr>
							</thead>
							<tbody>
								<?php foreach($orders as $order){ ?>
									<tr>
										<td>
											#0000<?php echo $order['order_id'];?>
										</td>
										<td>
											<?php echo $order['order_insert_time'];?>
										</td>
										<td>
											<?php echo $order['first_name'].' '.$order['last_name'];?>
										</td>
										<td>
											<?php echo $order['total_price'];?>
										</td>
										<td>
											<?php echo status($order['status']);?>
										</td>
										<td class="text-right">
											<a href="<?php echo ORDER_DETAIL.$order['order_id'];?>" class="btn btn-xs btn-info">
												DETAYLAR
											</a>
										</td>
									</tr>
								<?php } ?>
							</tbody>
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
</script>