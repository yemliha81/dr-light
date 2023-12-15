<?php include('includes/header.php');?>
<style>
    .grid-content{
        display: grid;
        grid-template-columns: 240px auto;
    }
    .left-side{
        display: flex;
        flex-direction: column;
    }
    .left-side a{
        display: block;
        font-size: 13px;
        background: #f3f3f3;
        padding: 5px;
        border-bottom: 1px solid #ddd;
    }
    .right-side{
        padding:0 15px;
    }
    .page_1{
        display:block;
    }
</style>
	<div class="holder">
	    <div class="container grid-content">
    		<div class="left-side">
    			<?php foreach($pages as $page){ ?>
    			<a href='javascript:;' class='page_button' rel='<?php echo $page['id'];?>'><?php echo  $page['page_name_'.$lang];?></a>
    			<?php } ?>
    		</div>
    		<div class='right-side'>
    		    <?php foreach($pages as $page){ ?>
    			    <div class='page_content page_<?php echo $page['id'];?>' <?php if($page['id'] > 2){ ?> style='display:none;' <?php } ?> >
        		        <h3><?php echo  $page['page_name_'.$lang];?></h3>
        		        <?php echo  $page['page_description_'.$lang];?>
        		    </div>
    			<?php } ?>
    		    
            </div>
        </div>
    </div>
<?php include('includes/footer.php');?>
<script>
    $('.page_button').click(function(){
        var rel = $(this).attr('rel');
        $('.page_content').hide()
        $('.page_'+rel).fadeIn();
    })
</script>