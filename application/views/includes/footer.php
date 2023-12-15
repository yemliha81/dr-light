<footer class="page-footer footer-style-6 ">
         <!--<div class="left_footer d-none d-sm-block">
            <img src="<?php echo ASSETS;?>images/footerimg1.png" alt="">
         </div>
         <div class="right_footer d-none d-sm-block">
            <img src="<?php echo ASSETS;?>images/footerimg2.png" alt="">
         </div>-->
         <div style="background: #ededed; padding: 30px 0;">
            <div class="container">
               <div class="text-center">
                  <img src="<?php echo ASSETS;?>images/dr-light-logo-01.svg" width="200">
               </div>
               <div class="bottomSocial text-center" style="font-size: 20px; padding: 15px;">
                  <ul>
                      
                      <li>
                         <a href="https://www.facebook.com/drlightt" target='_blank'>
                             <img src='<?php echo ASSETS;?>images/facebook-black.svg' height='20' />
                         </a>
                      </li>
                      <li>
                         <a href="https://www.instagram.com/drlightt/" target='_blank'>
                             <img src='<?php echo ASSETS;?>images/instagram-black.svg' height='20' />
                         </a>
                      </li>
                      <li>
                         <a href="https://www.youtube.com/channel/UC5_u3f3Ck2eUf_CuyFKwNTw" target='_blank'>
                             <img src='<?php echo ASSETS;?>images/youtube-black.svg' height='20' />
                         </a>
                      </li>
                      <li>
                         <a href="https://tr.pinterest.com/drlightt/" target='_blank'>
                             <img src='<?php echo ASSETS;?>images/pinterest-black.svg' height='20' />
                         </a>
                      </li>
                      <li>
                         <a href="https://tr.linkedin.com/company/dr-light" target='_blank'>
                             <img src='<?php echo ASSETS;?>images/linkedin-black.svg' height='20' />
                         </a>
                      </li>
                  </ul>
               </div>
               <div class="bottomUrls text-center">
                  <?php foreach($this->mdl_common->get_pages() as $page){ ?>
                    <a href='<?php echo PAGE_DETAIL.$page['id'];?>'><span class="uurl"><?php echo $page['page_name_'.$lang];?></span></a>
                  <?php } ?>   
                  <a href='<?php echo SUPPORT_PAGE;?>'><span class="uurl"><?php echo $this->mdl_common->get_lang()['help'];?></span></a>
                  <a href='<?php echo CONTACT_PAGE;?>'><span class="uurl"><?php echo $this->mdl_common->get_lang()['contact'];?></span></a>
               </div>
               <div class='payment_logos' style='text-align:center;'>
                   <img src='<?php echo ASSETS;?>images/mastercard.png' width='100px' />
                   <img src='<?php echo ASSETS;?>images/visa.png' width='100px' />
                   <img src='<?php echo ASSETS;?>images/iyzico.png' width='100px' />
               </div>
            </div>
         </div>
         <div class='sign' style='position:absolute; right: 50px; bottom: 8px;'>
             <img src='<?php echo ASSETS;?>images/anilgumus-logo-renksiz.svg' 
             default-src='<?php echo ASSETS;?>images/anilgumus-logo-renksiz.svg'
             hover-src='<?php echo ASSETS;?>images/anilgumus-logo-renkli.svg'  width='120'/>
         </div>
      </footer>
      
      <script src="<?php echo ASSETS;?>js/vendor-special/lazysizes.min.js"></script>
      <script src="<?php echo ASSETS;?>js/vendor-special/ls.bgset.min.js"></script>
      <script src="<?php echo ASSETS;?>js/vendor-special/ls.aspectratio.min.js"></script>
      <script src="<?php echo ASSETS;?>js/vendor-special/jquery.min.js"></script>
      <script src="<?php echo ASSETS;?>js/vendor/vendor.min.js"></script>
      <script src="<?php echo ASSETS;?>js/app-html.js"></script>
      <script>
          var hoverimg = $('.sign > img').attr('hover-src');
          var img = $('.sign > img').attr('default-src');
          $('.sign').mouseenter(function(){
              $('.sign > img').attr('src', hoverimg);
          })
          
          $('.sign').mouseleave(function(){
              $('.sign > img').attr('src', img);
          })
          
          var hoverimg1 = $('.mainlogo').attr('hoverimg');
          var img1 = $('.mainlogo').attr('src');
          $('.mainlogo').mouseenter(function(){
              $('.mainlogo').attr('src', hoverimg1);
          })
          
          $('.mainlogo').mouseleave(function(){
              $('.mainlogo').attr('src', img1);
          })
          
          $('.change_lang').click(function(){
              const lang = $(this).attr('lang');
              $.ajax({
                  type : 'post',
                  url: '<?php echo CHANGE_LANG;?>',
                  data : {'lang':lang},
                  success : function(response){
                      if(response == 'ok'){
                          location.reload()
                      }
                  }
              })
          })
          $('.minicart-link').click(function(){
              $.ajax({
                type : 'get',
                url : '<?php echo SHOW_CART;?>',
                success : function(response){
                    $('#dropdnMinicart').html(response)
                }
            })
          })
          
          $(document).on('click','.js-dropdn-close',function(){
              $('#dropdnMinicart').removeClass('is-opened')
          })
          
          $(document).on('click', '.remove-from-cart', function(){
              const row = $(this).attr('row');
              $.ajax({
                type : 'post',
                data: {'row' : row},
                url : '<?php echo REMOVE_FROM_CART;?>',
                success : function(response){
                    if(response=='ok'){
                        $('.row_'+row).fadeOut(1000).remove()
                    }
                }
            }).done(function(){
                $.ajax({
                type : 'get',
                url : '<?php echo SHOW_CART;?>',
                success : function(response){
                    $('#dropdnMinicart').html(response)
                }
                
            })
            
            $.ajax({
                type : 'get',
                url : '<?php echo FATHER_BASE;?>cart/count_cart',
                success : function(response){
                    if(parseInt(response) > 0){
                        $('.minicart-qty').show()
                        $('.minicart-qty').html(response)
                    }else{
                        $('.minicart-qty').hide()
                    }
                }
            })
            
            })
          
          })
          
          
          $(document).on('keyup', '.src', function(){
              
              const txt = $('.src').val().trim();
              
              if(txt.length > 2){
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
   </body>
</html>