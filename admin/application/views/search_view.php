<?php if(!empty($results)){ ?>
    <?php foreach($results as $product){ ?>
        <div>
            <a href='<?php echo UPDATE_PRODUCT.$product['id'];?>' style='display:block; margin-top:10px;'>
                <img src='https://dr-light.com.tr/files/product/img/100/<?php echo explode(',', $product['product_image'])[0];?>' width='40'>
                <span>
                    <?php echo $product['product_name_tr'];?>
                </span>
            </a>
        </div>
    <?php } ?>
<?php }else{ ?>
<div>Sonuç bulunamadı</div>
<?php } ?>