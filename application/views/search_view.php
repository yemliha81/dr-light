<?php if(!empty($results)){ ?>
    <?php foreach($results as $product){ ?>
        <div>
            <a href='<?php echo PRODUCT_DETAIL.$product['id'];?>' style='display:block; margin-top:10px;'>
                <img src='<?php echo PRODUCT_IMAGE_PATH;?>400/<?php echo explode(',', $product['product_image'])[0];?>' width='40'>
                <span>
                    <?php echo $product['product_name_'.$_SESSION['lang']];?>
                </span>
            </a>
        </div>
    <?php } ?>
<?php }else{ ?>
<div><?php echo $this->mdl_common->get_lang()['no_results'];?></div>
<?php } ?>