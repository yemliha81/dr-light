<?php include(APPPATH.'views/includes/header.php');?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12 m-t-10">
                    <span class="page_title">
						<i class="fa fa-list"></i> Renk Seçeneği Listesi
					</span>
                </div>
				<div class="col-lg-12 m-t-20">
					<div class="card p-15">
						<table class="table">
							<thead>
								<tr>
									<td><b>Renk Seçeneği Görseli</b></td>
									<td><b>Renk Seçeneği Adı</b></td>
									<td class='text-right'><b>İşlem</b></td>
								</tr>
							</thead>
							<tbody>
								<?php foreach($variants as $variant){ ?>
									<tr>
										<td>
											<img src="<?php echo FATHER_BASE.'../files/variant/img/100/'.$variant['variant_image'];?>" 
											width="35"/>
										</td>
										<td>
											<?php echo $variant['variant_name_tr'];?>
										</td>
										<td class="text-right">
											<a href="<?php echo UPDATE_VARIANT.$variant['id'];?>" class="btn btn-xs btn-info">
												<i class='fa fa-pencil' ></i>
											</a>
											<a href="<?php echo DELETE_VARIANT.$variant['id'];?>" class="btn btn-xs btn-danger">
												<i class='fa fa-trash' ></i>
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