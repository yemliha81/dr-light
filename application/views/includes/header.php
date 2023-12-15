<?php
if(empty($_SESSION['lang'])){
    $_SESSION['lang'] = 'tr';
}
if(empty($_SESSION['lang_array'])){
    $_SESSION['lang_array'] = array('tr', 'en');
}
$lang = $_SESSION['lang'];
?>
<?php $this->load->view('lang/common_'.$lang);?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>DR.Light Aydınlatma</title>
      <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
      <link href="<?php echo ASSETS;?>css/vendor/bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo ASSETS;?>css/vendor/vendor.min.css" rel="stylesheet">
      <link href="<?php echo ASSETS;?>css/style.css?v=112134" rel="stylesheet">
      <link href="<?php echo ASSETS;?>fonts/icomoon/icons.css" rel="stylesheet">
      <!--
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Open%20Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
      -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
      <style>
         .pr1{
             font-size: 15px;
            font-weight: bold !important;
            color: #999 !important;
         }
         .page-footer .text-center > a {
            display: inline-block;
            font-size: 13px;
        }
         .pr2{
             font-size: 14px;
            color: #459437 !important;
         }
         .bottomSocial ul{
             display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
         }
         .bottomSocial ul li a{
             color:#000000;
         }
         .fl1{
            display: grid;
            grid-template-columns: 50px auto;
            padding:15px;
            align-items: center;
         }
         .ttl{
            padding: 25px;
            font-size: 30px;
            font-weight: 600;
         }
         .collection-grid-3-title {
            font-size: 14px;
         }
         .grid-1-1{
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
         }
         .grid-1-2{
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 30px;
         }
         .grid-3-3{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 25px;
         }
         .grid-5{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
            gap: 15px;
         }
         .catName{
            font-weight: 800;
            font-size: 22px;
            margin-top: 15px;
         }
         .proCount{
            font-size: 13px;
         }
         .dtBtn{
            font-size: 12px;
            color: #666;
         }
         .instaTop{
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
         }
         .uurl{
            display: inline-block;
            padding: 10px ;
            border-right: 1px solid #bbb;
         }
         .bottomSocial span{
            display: inline-block;
            padding: 10px;
         }
         .page-footer{
            position: relative;}
         .left_footer{
            position: absolute;
            left: 30px;
            top: -50px;
         }
         .left_footer img{
            width: 200px;
         }
         .right_footer{
            position: absolute;
            right: 30px;
            top: -50px;
         }
         .right_footer img{
            width: 200px;
         }
         a.slick-slide:hover{
             text-decoration:none;
         }
         .menu a.active{
             color: #17c6aa !important;
         }
         @media only screen and (max-width: 600px) {
          .grid-1-2{
              gap:15px;
          }
          .grid-1-1{
              gap:15px;
          }
          .bnslider-wrapper{
              aspect-ratio: 2 / 0.7;
                overflow: hidden;
          }
          .hdr-topline{
              display:none;
          }
        }
      </style>
      
      <!-- Meta Pixel Code -->
        <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '736705434827968');
        fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=736705434827968&ev=PageView&noscript=1"
        /></noscript>
        <!-- End Meta Pixel Code -->
        
        <meta name="facebook-domain-verification" content="psi2ck8ojpd2c66f399nq9gxsb450z" />
      
   </head>
   <body class="has-smround-btns has-loader-bg equal-height">
       <?php if(!empty($_SESSION['error'])){ ?>
       <div class='alert alert-danger'>
           <?php echo $this->mdl_common->get_lang()[$_SESSION['error']];?>
       </div>
       <?php unset($_SESSION['error']); } ?>
       <?php if(!empty($_SESSION['error_text'])){ ?>
       <div class='alert alert-danger'>
           <?php echo $_SESSION['error_text'];?>
       </div>
       <?php unset($_SESSION['error_text']); } ?>
       <?php if(!empty($_SESSION['success'])){ ?>
       <div class='alert alert-success'>
           <?php echo $this->mdl_common->get_lang()[$_SESSION['success']];?>
       </div>
       <?php unset($_SESSION['success']); } ?>
      <header class="hdr-wrap">
         <div class="hdr-content hdr-content-sticky">
            <div class="container">
               <div class="row">
                  <div class="col-auto show-mobile">
                     <div class="menu-toggle"> <a href="#" class="mobilemenu-toggle"><i class="icon-menu"></i></a> </div>
                  </div>
                  <div class="col-auto hdr-logo">
                     <a href="<?php echo FATHER_BASE;?>" class="logo"><img src="<?php echo ASSETS;?>images/dr_light_logo_gif.gif" alt="Logo" width="200"></a>
                  </div>
                  <div class="hdr-nav hide-mobile nav-holder-s">
                  </div>
                  <div class="hdr-links-wrap col-auto ml-auto">
                     <div class="hdr-inline-link">
                        <div class="search_container_desktop">
                           <div class="dropdn dropdn_search dropdn_fullwidth">
                              <a href="#" class="dropdn-link  js-dropdn-link only-icon"><i class="icon-search"></i><span class="dropdn-link-txt">Search</span></a>
                              <div class="dropdn-content">
                                 <div class="container">
                                    <form class="search search-off-popular">
                                       <input name="search" type="text" enterkeyhint="search" class="search-input input-empty" placeholder="What are you looking for?">
                                       <button type="submit" class="search-button"><i class="icon-search"></i></button>
                                       <a href="#" class="search-close js-dropdn-close"><i class="icon-close-thin"></i></a>
                                    </form>
                                    
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!--<div class="dropdn dropdn_wishlist">
                           <a href="account-wishlist.html" class="dropdn-link only-icon wishlist-link ">
                           <i class="icon-heart"></i><span class="dropdn-link-txt">Wishlist</span><span class="wishlist-qty">3</span>
                           </a>
                        </div>-->
                        <div class="dropdn dropdn_account dropdn_fullheight">
                            <?php if(isset($_SESSION['logged_in'])){ ?>
                                <a href="<?php echo USER_ACCOUNT;?>" class="dropdn-link only-icon">
                                   <i class="icon-user"></i>
                                   <span class="dropdn-link-txt"><?php echo $this->mdl_common->get_lang()['hesabim'];?></span>
                                </a>
                            <?php }else{ ?>
                                <a href="<?php echo LOGIN;?>" class="dropdn-link only-icon">
                                   <i class="icon-user"></i>
                                   <span class="dropdn-link-txt"><?php echo $this->mdl_common->get_lang()['uye_girisi'];?></span>
                                </a>
                            <?php } ?>
                        </div>
                        <div class="dropdn dropdn_fullheight minicart">
                           <a href="#" class="dropdn-link js-dropdn-link minicart-link only-icon" data-panel="#dropdnMinicart">
                           <i class="icon-basket"></i>
                           <span class="minicart-qty"
                              <?php if(empty($_SESSION['cart_qty'])){ ?>
                              style='display:none;'
                              <?php } ?>
                              >
                                  <?php if(!empty($_SESSION['cart_qty'])){ ?>
                                       <?php echo ($_SESSION['cart_qty']);?>
                                   <?php } ?>
                              </span>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="hdr">
            <div class="hdr-topline hdr-topline--dark js-hdr-top">
               <div class="container">
                  <div class="row flex-nowrap">
                     <div class="col hdr-topline-left hide-mobile">
                        <div class="hdr-line-separate">
                           <ul class="social-list list-unstyled">
                              <li>
                                 <a href="https://www.facebook.com/drlightt" target='_blank'>
                                     <img src='<?php echo ASSETS;?>images/facebook.svg' height='15' />
                                 </a>
                              </li>
                              <li>
                                 <a href="https://www.instagram.com/drlightt/" target='_blank'>
                                     <img src='<?php echo ASSETS;?>images/instagram.svg' height='15' />
                                 </a>
                              </li>
                              <li>
                                 <a href="https://www.youtube.com/channel/UC5_u3f3Ck2eUf_CuyFKwNTw">
                                     <img src='<?php echo ASSETS;?>images/youtube.svg' height='15' />
                                 </a>
                              </li>
                              <li>
                                 <a href="https://tr.pinterest.com/drlightt/" target='_blank'>
                                     <img src='<?php echo ASSETS;?>images/pinterest.svg' height='15' />
                                 </a>
                              </li>
                              <li>
                                 <a href="https://tr.linkedin.com/company/dr-light" target='_blank'>
                                     <img src='<?php echo ASSETS;?>images/in.svg' height='15' />
                                 </a>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="col hdr-topline-center">
                        <?php echo $this->mdl_common->get_lang()['welcome'];?>
                     </div>
                     <div class="col hdr-topline-right hide-mobile">
                        <div class="hdr-inline-link">
                           <div class="dropdn_language">
                              <div class="dropdn dropdn_language dropdn_language--noimg dropdn_caret">
                                 <a href="#" class="dropdn-link js-dropdn-link"><span class="js-dropdn-select-current"><?php echo strtoupper($lang);?></span><i class="icon-angle-down"></i></a>
                                 <div class="dropdn-content">
                                    <ul>
                                       <li><a href="javascript:;" class='change_lang' lang='tr'>TR</a></li>
                                       <li><a href="javascript:;" class='change_lang' lang='en'>EN</a></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div class="hdr_container_desktop">
                              <?php if(isset($_SESSION['logged_in'])){ ?>
                                <a href="<?php echo USER_ACCOUNT;?>" class="dropdn-link" data-panel="#dropdnAccount">
                                   <i class="icon-user"></i>
                                   <span class="dropdn-link-txt"><?php echo $this->mdl_common->get_lang()['hesabim'];?></span>
                                </a>
                            <?php }else{ ?>
                                <a href="<?php echo LOGIN;?>" class="dropdn-link" data-panel="#dropdnAccount">
                                   <i class="icon-user"></i>
                                   <span class="dropdn-link-txt"><?php echo $this->mdl_common->get_lang()['uye_girisi'];?></span>
                                </a>
                            <?php } ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="hdr-content">
               <div style='margin-top:20px;'></div>
               <div class="container">
                  <div class="row">
                     <div class="col-auto show-mobile">
                        <div class="menu-toggle"> <a href="#" class="mobilemenu-toggle"><i class="icon-menu"></i></a> </div>
                     </div>
                     <div class="col-auto hdr-logo show-mobile">
                        <a href="<?php echo FATHER_BASE;?>" class="logo"><img src="<?php echo ASSETS;?>images/dr_light_logo_gif.gif" alt="Logo" width="200"></a>
                     </div>
                     <div class="col-auto hdr-logo hide-mobile">
                        <a href="<?php echo FATHER_BASE;?>" class="logo"><img src="<?php echo ASSETS;?>images/call_us_<?php echo $_SESSION['lang'];?>.png" alt="Logo" width="200"></a>
                     </div>
                     <div class="hdr-nav hide-mobile nav-holder justify-content-center px-4">
                        <a href='<?php echo FATHER_BASE;?>'>
                            <img class='mainlogo' src="<?php echo ASSETS;?>images/dr-light-logo-01.svg" width="200px" hoverimg='<?php echo ASSETS;?>images/dr_light_logo_gif.gif'>
                        </a>
                     </div>
                     <div class="hdr-links-wrap col-auto ml-auto">
                        <div class="hdr-inline-link">
                           <div class="search_container_desktop">
                              <div class="dropdn dropdn_search dropdn_fullwidth">
                                 <a href="#" class="dropdn-link  js-dropdn-link only-icon"><i class="icon-search"></i><span class="dropdn-link-txt">Search</span></a>
                                 <div class="dropdn-content" style='background:#fff; z-index:11;'>
                                    <div class="container">
                                       <form class="search search-off-popular aaa1" onsubmit='return false'>
                                          <input name="search" type="text" enterkeyhint="search"  class="search-input input-empty src" placeholder="<?php echo $this->mdl_common->get_lang()['search_text'];?>">
                                          <button class="search-button srcBtn"><i class="icon-search"></i></button>
                                          <a href="#" class="search-close js-dropdn-close"><i class="icon-close-thin"></i></a>
                                       <div class='srcResult' ></div>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!--<div class="dropdn dropdn_wishlist">
                              <a href="account-wishlist.html" class="dropdn-link only-icon wishlist-link ">
                              <i class="icon-heart"></i><span class="dropdn-link-txt">Wishlist</span><span class="wishlist-qty">3</span>
                              </a>
                           </div>-->
                           <div class="dropdn dropdn_account dropdn_fullheight">
                                <?php if(isset($_SESSION['logged_in'])){ ?>
                                    <a href="<?php echo USER_ACCOUNT;?>" class="dropdn-link only-icon">
                                       <i class="icon-user"></i>
                                       <span class="dropdn-link-txt"><?php echo $this->mdl_common->get_lang()['hesabim'];?></span>
                                    </a>
                                <?php }else{ ?>
                                    <a href="<?php echo LOGIN;?>" class="dropdn-link only-icon">
                                       <i class="icon-user"></i>
                                       <span class="dropdn-link-txt"><?php echo $this->mdl_common->get_lang()['uye_girisi'];?></span>
                                    </a>
                                <?php } ?>
                            </div>
                           <div class="dropdn dropdn_fullheight minicart">
                              <a href="#" class="dropdn-link js-dropdn-link minicart-link" data-panel="#dropdnMinicart">
                              <i class="icon-basket"></i>
                              <span class="minicart-qty"
                              <?php if(empty($_SESSION['cart_qty'])){ ?>
                              style='display:none;'
                              <?php } ?>
                              >
                                  <?php if(!empty($_SESSION['cart_qty'])){ ?>
                                       <?php echo ($_SESSION['cart_qty']);?>
                                   <?php } ?>
                              </span>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div style='border-bottom:1px solid #ddd;margin-top: 20px; margin-bottom: 10px;'></div>
               <div class="container" style='margin-bottom:30px;'>
                  <div class="row" style="justify-content: center;">
                     <div class="menubar">
                        <ul class="mmenu mmenu-js">
                           <?php foreach($this->mdl_common->get_categories() as $category){ ?>
                               <li class="mmenu-item--simple">
                                  <a 
                                  class='<?php echo $category['id'] == ($cat['id'] ?? 0) ? 'active' : '';?>'
                                  href="<?php echo CATEGORY_DETAIL.$category['category_seo_name'];?>"><?php echo strtolower($category['category_name_'.$lang]);?>.</a>
                               </li>
                           <?php } ?>
                        </ul>
                     </div>
                  </div>
               </div>
               
            </div>
         </div>
      </header>
      <div class="header-side-panel">
         <div class="mobilemenu js-push-mbmenu">
            <div class="mobilemenu-content">
               <div class="mobilemenu-close mobilemenu-toggle">Kapat</div>
               <div class="mobilemenu-scroll">
                  <div class="mobilemenu-search"></div>
                  <div class="nav-wrapper show-menu">
                     <div class="nav-toggle">
                        <span class="nav-back"><i class="icon-angle-left"></i></span>
                        <span class="nav-title"></span>
                        <a href="#" class="nav-viewall">view all</a>
                     </div>
                     <ul class="nav nav-level-1">
                           <?php foreach($this->mdl_common->get_categories() as $category){ ?>
                               <li class="mmenu-item--simple">
                                  <a href="<?php echo CATEGORY_DETAIL.$category['category_seo_name'];?>"><?php echo strtolower($category['category_name_'.$lang]);?>.</a>
                               </li>
                           <?php } ?>
                        </ul>
                  </div>
                  <div class="mobilemenu-bottom">
                     
                     <div class="mobilemenu-language">
                        <div class="dropdn_language">
                           <div class="dropdn dropdn_language dropdn_language--noimg dropdn_caret">
                              <a href="#" class="dropdn-link js-dropdn-link"><span class="js-dropdn-select-current"><?php echo strtoupper($lang);?></span><i class="icon-angle-down"></i></a>
                              <div class="dropdn-content">
                                 <ul>
                                    <li><a href="javascript:;" class='change_lang' lang='tr'>TR</a></li>
                                       <li><a href="javascript:;" class='change_lang' lang='en'>EN</a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="dropdn-content account-drop" id="dropdnAccount">
            <div class="dropdn-content-block">
               <div class="dropdn-close"><span class="js-dropdn-close">Kapat</span></div>
               <ul>
                  <li><a href="account-create.html"><span>Log In</span><i class="icon-login"></i></a></li>
                  <li><a href="account-create.html"><span>Register</span><i class="icon-user2"></i></a></li>
                  <li><a href="checkout.html"><span>Checkout</span><i class="icon-card"></i></a></li>
               </ul>
               <div class="dropdn-form-wrapper">
                  <h5>Quick Login</h5>
                  <form action="#">
                     <div class="form-group">
                        <input type="text" class="form-control form-control--sm is-invalid" placeholder="Enter your e-mail">
                        <div class="invalid-feedback">Can't be blank</div>
                     </div>
                     <div class="form-group">
                        <input type="password" class="form-control form-control--sm" placeholder="Enter your password">
                     </div>
                     <button type="submit" class="btn">Enter</button>
                  </form>
               </div>
            </div>
            <div class="drop-overlay js-dropdn-close"></div>
         </div>
         <div class="dropdn-content minicart-drop" id="dropdnMinicart">
            <div class="dropdn-content-block">
               <div class="dropdn-close"><span class="js-dropdn-close">Kapat</span></div>
               <div class="minicart-drop-content js-dropdn-content-scroll">
                  
               </div>
               <div class="minicart-drop-fixed js-hide-empty">
                  <div class="loader-horizontal-sm js-loader-horizontal-sm" data-loader-horizontal=""><span></span></div>
                  <div class="minicart-drop-total js-minicart-drop-total row no-gutters align-items-center">
                     <div class="minicart-drop-total-txt col-auto heading-font">Alt Toplam</div>
                     <div class="minicart-drop-total-price col" data-header-cart-total="">0.00 ₺</div>
                  </div>
                  <div class="minicart-drop-actions">
                     <a href="cart.html" class="btn btn--md btn--grey"><i class="icon-basket"></i><span>SEPETİM</span></a>
                     <a href="checkout.html" class="btn btn--md"><i class="icon-checkout"></i><span>Sipariş</span></a>
                  </div>

               </div>
            </div>
            <div class="drop-overlay js-dropdn-close"></div>
         </div>
      </div>