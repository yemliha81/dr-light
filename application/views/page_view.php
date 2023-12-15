<?php include('includes/header.php');?>

	<div class="holder">
	    <div class="container">
		<div class="page-title text-center">
			<b><?php echo  $page['page_name_'.$lang];?></b>
		</div>
		<?php if($page['type'] == '0'){ ?>
		<div>
		    <img src='<?php echo PAGE_PATH.'1000/'.$page['page_image'];?>' width='100%' />
		</div>
		<?php } ?>
		<div style="margin-top:20px;">
			<?php echo  $page['page_description_'.$lang];?>
        </div>
</div>
<?php include('includes/footer.php');?>