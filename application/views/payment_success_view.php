<?php include('includes/header.php');?>
<style>
    .flex-center{
        display:flex;
        flex-direction:column;
        align-items:center;
        justify-content:center;
        gap:30px;
        font-size:22px;
        width:100%;
    }
    .suc{
        color:#459b50;
        font-size: 62px;
    }
</style>
<div class="page-content" style="min-height: 4px;">
	
<div class="holder">
	<div class="container">
		<h1 class="text-center"><?php echo $this->mdl_common->get_lang()['order_pay'];?></h1>
		<div class="row">
		    <div class='flex-center'>
		        <div class='suc'>
		            <i class='icon-check'></i>
		        </div>
		        <div>Siparişiniz alınmıştır!</div>
		        <div>Sipariş detaylarınıza hesabım sayfasından ulaşabilirsiniz.</div>
		    </div>    
	    </div>
</div>
</div>
<?php include('includes/footer.php');?>