<?php include(APPPATH.'views/includes/header.php');?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12 m-t-10">
                    <span class="page_title">
						<i class="fa fa-list"></i> Sayfa Listesi
					</span>
                </div>
				<div class="col-lg-12 m-t-20">
					<div class="card p-15">
						<table class="table">
							<thead>
								<tr>
									<td><b>Sayfa Adı</b></td>
									<td class='text-right'><b>İşlem</b></td>
								</tr>
							</thead>
							<tbody>
								<?php foreach($pages as $page){ ?>
									<tr>
										<td>
											<?php echo $page['page_name_tr'];?>
										</td>
										<td class="text-right">
											<a href="<?php echo UPDATE_PAGE.$page['id'];?>" class="btn btn-xs btn-info">
												<i class='fa fa-pencil' ></i>
											</a>
											<a href="<?php echo DELETE_PAGE.$page['id'];?>" class="btn btn-xs btn-danger">
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