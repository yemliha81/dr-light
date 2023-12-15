<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        if(empty($_SESSION['lang'])){
            $_SESSION['lang'] = 'tr';
        }
        if(empty($_SESSION['lang_array'])){
            $_SESSION['lang_array'] = array('tr', 'en');
        }
    }
    
	public function index(){
	    
	    $this->load->view('cart_view', $data);
	}
	
	public function add(){
	    //unset($_SESSION['cart']);
	    $post = $this->input->post();
	    $x = 0;
	    
	    if(empty($post['variant'])){
	        $v = '';
	    }else{
	        $v = $post['variant'];
	    }
	    
	    $row = uniqid();
	    
	    if(empty($_SESSION['cart'][$row])){
	        $_SESSION['cart'][$row] = array( 
	            'row_id' => $row, 
	            'id' => $post['id'],
	            'pro_name' => $post['pro_name'],
	            'qty' => $post['qty'],
	            'image' => explode(',',$post['image'])[0], 
	            'price' => $post['price'],
	            'discounted_price' => $post['discounted_price'],
	            'variant' => $v, );
	        $x = 1;  
	    }
	    else
	    {
	        
	       $_SESSION['cart'][$row]['qty'] = $_SESSION['cart'][$row]['qty'] + $post['qty'];
	       $x = 1;
	    }
	    
	    if($x == 1){
	        $_SESSION['cart_qty'] = count($_SESSION['cart']);
	        echo 'success';
	    }else{
	        echo 'error';
	    }
	    
	    
	}
	
	public function show(){
	    //debug($_SESSION['cart']);
        $this->load->view('left_cart_view');
	    
	}
	
	public function remove(){
	    $post = $this->input->post();
	    $row = $post['row'];
	    unset($_SESSION['cart'][$row]);
	    $_SESSION['cart_qty'] = count($_SESSION['cart']);
	    echo 'ok';
	}
	
	public function checkout(){
	    //die('Bakım çalışması yapılmaktadır. Lütfen birkaç dakika sonra tekrar deneyiniz.');
	    if(!isset($_SESSION['logged_in'])){
	        redirect(LOGIN);
	    }
	    
	    //$data['payment_form'] = $this->payment_form();
	    
	    $this->load->view('checkout_view');
	}
	
	public function payment(){
	    
	    if(!isset($_SESSION['logged_in'])){
	        redirect(LOGIN);
	    }
	    
	    $data['payment_form'] = $this->payment_form();
	    
	    $this->load->view('payment_view', $data);
	}
	
	public function payment_callback(){
	    
	    require_once(DOC_ROOT.'iyzipay/samples/config.php');

        # create request class
        $request = new \Iyzipay\Request\RetrieveCheckoutFormRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        //$request->setConversationId(uniqid());
        $request->setToken($_POST['token']);
        
        # make request
        $checkoutForm = \Iyzipay\Model\CheckoutForm::retrieve($request, Config::options());
        
        # print result
        
        $result = json_decode($checkoutForm->getRawResult(),1);
        
        $data['result'] = $result;
        
        if(($result['status'] == 'success') && ($result['paymentStatus'] == 'SUCCESS')){
            
            $update = $this->db->update('order_table', array('is_paid' => 1), array('order_id' => $_SESSION['order_id']));
            
            $this->send_order_mail();
            $this->info_mail();
				
			if($update != false ){
			    $_SESSION['success'] = 'order_successful';
                unset($_SESSION['cart']);
                unset($_SESSION['order_id']);
                unset($_SESSION['cart_qty']);
                redirect(USER_ACCOUNT);
            }	
			
            
            //$this->load->view('payment_success_view', $data);
        }else{
            die('payment error...');
            debug($result);
        }
	}
	
	private function send_order_mail(){
	    $to = $_SESSION['email'];
			$subject = 'Siparişiniz bize ulaşmıştır';
			
			$body .= '<div style="text-align: center;">';
			$body .= '	<img src="https://dr-light.com.tr/assets/images/drlight_logo.png" width="220px">';
			$body .= '</div>';
			$body .= '<hr>';
			$body .= '<div style="font-family: Arial;font-size: 14px;">';
		
		    $body .= '<div style="padding: 15px; background: #f1f1f1;">';
		
			$body .= 'Merhaba Sayın '.$_SESSION['full_name'].', siparişiniz tarafımıza ulaşmıştır.';
			$body .= '<br><br>';
			$body .= 'Sipariş bilgileriniz aşağıdaki gibidir. Bu bilgilerde bir hata 
			    veya eksiklik olduğunu düşünüyorsanız veya bu siparişi siz vermediyseniz lütfen 
			    bizimle siparis@dr-light.com.tr adresinden iletişime geçiniz. Her türlü soru 
			    veya görüşleriniz için bize ulaşabilirsiniz.';
			$body .= '<br><br>';

			$body .= 'Sipariş bilgileriniz;';
			$body .= '<hr>';

			$body .= '<table style="width: 100%;">';
			$body .= '	<tr>';
			$body .= '		<td><b>Ürün</b></td><td><b>Adet</b></td><td><b>Birim Fiyat</b></td>';
			$body .= '	</tr>';
			$total = 0;
			foreach($_SESSION['cart'] as $pro){ 
			    $total += ($pro['discounted_price']*$pro['qty']);
			    $body .= '<tr>';
    			$body .= '<td>'.$pro['pro_name'].'<br>'.$pro['variant'].'</td><td>'.$pro['qty'].'</td><td>'.$pro['discounted_price'].'</td>';
    			$body .= '</tr>';
			    
			}
			$body .= '	<tr>';
			$body .= '		<td><b></b></td><td><b>Toplam</b></td><td><b>'.number_format($total,2).' TL</b></td>';
			$body .= '	</tr>';
			$body .= '</table>';

			$body .= '<hr>';

			$body .= '<br><br>';

			$body .= '<div style="text-align: center;">';
			$body .= '	<img src="https://dr-light.com.tr/assets/images/drlight_logo.png" width="220px">';
			$body .= '</div>';
		
		    $body .= '</div>';
			
			
			
			
			
			$body .= '	<br><br>
				Saygılarımızla
				<br><br>
				https://www.dr-light.com.tr'
				;
				
				
			send_email(FATHER_BASE, $to, $subject, $body);
	}
	
	private function info_mail(){
	    
	    $order = $this->db->select('*')
	        ->where('order_id', $_SESSION['order_id'])
	        ->get('order_table')->row_array();
	        
	        
	        $user = json_decode($order['user_data'],1);
	    
	    
	    $to = 'siparis@dr-light.com.tr';
			$subject = 'Yeni Sipariş Alındı';
			
			$body .= '<div style="text-align: center;">';
			$body .= '	<img src="https://dr-light.com.tr/assets/images/drlight_logo.png" width="220px">';
			$body .= '</div>';
			$body .= '<hr>';
			$body .= '<div style="font-family: Arial;font-size: 14px;">';
		
		    $body .= '<div style="padding: 15px; background: #f1f1f1;">';
			$body .= 'Sayın Yönetici, www.dr-light.com.tr üzerinden yeni bir sipariş alınmıştır.<br><br>';
			$body .= 'Sipariş bilgileri aşağıdaki gibidir.';
			$body .= '<br><br>';
			$body .= '<hr>';
			
			$body .= '<div style="padding:15px;">
			    Müşteri Bilgileri: <hr/>
			    <b>Ad - Soyad</b> : '.$user['first_name'].' '.$user['last_name'].'<br>
			    <b>Telefon</b> : '.$user['phone'].'<br>
			    <b>Adres</b> : '.$user['address'].', '.$user['town'].', '.$user['city'].'<br>
			    <b>E-posta</b> : '.$_SESSION['email'].'<br>
			    <b>Sipariş Tarihi</b> : '.date('d-m-Y H:i').'<br>
			</div>
			<hr/>';

			$body .= '<table style="width: 100%;">';
			$body .= '	<tr>';
			$body .= '		<td><b>Ürün</b></td><td><b>Adet</b></td><td><b>Birim Fiyat</b></td>';
			$body .= '	</tr>';
			$total = 0;
			foreach($_SESSION['cart'] as $pro){ 
			    $total += ($pro['discounted_price']*$pro['qty']);
			    $body .= '<tr>';
    			$body .= '<td>'.$pro['pro_name'].'<br>'.$pro['variant'].'</td><td>'.$pro['qty'].'</td><td>'.$pro['discounted_price'].'</td>';
    			$body .= '</tr>';
			    
			}
			$body .= '	<tr>';
			$body .= '		<td><b></b></td><td><b>Toplam</b></td><td><b>'.number_format($total,2).' TL</b></td>';
			$body .= '	</tr>';
			$body .= '</table>';

			$body .= '<hr>';

			$body .= '<br><br>';

			$body .= '<div style="text-align: center;">';
			$body .= '	<img src="https://dr-light.com.tr/assets/images/drlight_logo.png" width="220px">';
			$body .= '</div>';
		
		    $body .= '</div>';
				
				
			send_email(FATHER_BASE, $to, $subject, $body);
	}
	
	public function count_cart(){
	    
	    //$_SESSION['cart_qty'] = count($_SESSION['cart']);
	    echo count($_SESSION['cart']) ?? 0;
	}
	
	public function order_save_post(){
	    
	    if(!isset($_SESSION['logged_in'])){
	        redirect(LOGIN);
	    }
	    
	    $post = $this->input->post();
	    
	    $ins['user_id'] = $_SESSION['user_id'];
	    $ins['user_data'] = json_encode($post);
	    $ins['order_data'] = json_encode($_SESSION['cart']);
	    $ins['status'] = 0;
	    
	    foreach($_SESSION['cart'] as $val){
	        $total += $val['discounted_price']*$val['qty'];
	    }
	    
	    $ins['total_price'] = $total;
	    
	    
	    
	    
	    if($post['payment_method'] == 'cc'){
	        $ins['order_id'] = uniqid();
	        $ins['is_paid'] = 0;
	        $_SESSION['order_id'] = $ins['order_id'];
	        
	        $this->db->insert('order_table', $ins);
	        
	        if($this->db->affected_rows() > 0){
                redirect(PAYMENT_PAGE);
            }else{
                $_SESSION['error'] = 'order_save_error';
                redirect(USER_ACCOUNT);
            }
	    }
	    
	    $this->db->insert('order_table', $ins);
	    
	    if($this->db->affected_rows() > 0){
	        
	        $_SESSION['last_order_id'] = $this->db->insert_id();
	        
	        $this->send_order_mail();
			
            unset($_SESSION['order_id']);
            unset($_SESSION['cart']);
            $_SESSION['success'] = 'order_successful';
            unset($_SESSION['cart_qty']);
            redirect(USER_ACCOUNT);
        }else{
            $_SESSION['error'] = 'order_save_error';
            redirect(USER_ACCOUNT);
        }
	    
	    
	}
	
	private function payment_form(){

    require_once(DOC_ROOT.'iyzipay/samples/config.php');
    
    $order = $this->db->select('*')
        ->where('order_id', $_SESSION['order_id'])
        ->get('order_table')->row_array();
        
    if(empty($order)){
        die('Sipariş oluşturulurken hata meydana geldi...');
    }
    
    $user = json_decode($order['user_data'],1);
    $order_data = json_decode($order['order_data'],1);
    
    
    $total = discount_20($total);
        
        # create request class
        $request = new \Iyzipay\Request\CreateCheckoutFormInitializeRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId(uniqid());
        $request->setPrice($order['total_price']);
        $request->setPaidPrice($order['total_price']);
        $request->setCurrency(\Iyzipay\Model\Currency::TL);
        $request->setBasketId(uniqid());
        $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
        $request->setCallbackUrl(PAYMENT_CALLBACK);
        $request->setEnabledInstallments(array(2, 3, 6, 9));
        
        $buyer = new \Iyzipay\Model\Buyer();
        $buyer->setId(uniqid());
        $buyer->setName($user['first_name']);
        $buyer->setSurname($user['last_name']);
        $buyer->setGsmNumber($user['phone']);
        $buyer->setEmail($_SESSION['email']);
        $buyer->setIdentityNumber($user['tc_no']);
        $buyer->setLastLoginDate("2015-10-05 12:43:35");
        $buyer->setRegistrationDate("2013-04-21 15:12:09");
        $buyer->setRegistrationAddress($user['address']);
        $buyer->setIp($_SERVER['REMOTE_ADDR']);
        $buyer->setCity($user['city']);
        $buyer->setCountry('Türkiye');
        //$buyer->setZipCode($user['']);
        $request->setBuyer($buyer);
        
        $shippingAddress = new \Iyzipay\Model\Address();
        $shippingAddress->setContactName($user['first_name'].' '.$user['last_name']);
        $shippingAddress->setCity($user['city']);
        $shippingAddress->setCountry("Turkiye");
        $shippingAddress->setAddress($user['address']);
        //$shippingAddress->setZipCode("34742");
        $request->setShippingAddress($shippingAddress);
        
        $billingAddress = new \Iyzipay\Model\Address();
        $billingAddress->setContactName($user['bill_first_name'].' '.$user['bill_last_name']);
        $billingAddress->setCity($user['bill_city']);
        $billingAddress->setCountry("Turkiye");
        $billingAddress->setAddress($user['bill_address']);
        //$billingAddress->setZipCode("34742");
        $request->setBillingAddress($billingAddress);
        
        $basketItems = array();
        
        foreach($_SESSION['cart'] as $key => $val){ 
            	        
            $basketItem[$key] = new \Iyzipay\Model\BasketItem();
            $basketItem[$key]->setId($val['row_id']);
            $basketItem[$key]->setName($val['pro_name']);
            $basketItem[$key]->setCategory1("Accesories");
            $basketItem[$key]->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
            $basketItem[$key]->setPrice(($val['discounted_price']*$val['qty']),2);
            $basketItems[] = $basketItem[$key];
        }
        
        $request->setBasketItems($basketItems);
        
        //debug($request);
        
        # make request
        $checkoutFormInitialize = \Iyzipay\Model\CheckoutFormInitialize::create($request, Config::options());
        
        # print result
        
        //print_r($checkoutFormInitialize);
        
        $result = json_decode($checkoutFormInitialize->getRawResult(),1);
        
        
        if($checkoutFormInitialize->getStatus() == 'success'){
            return $checkoutFormInitialize->getCheckoutFormContent();
        }else{
            $_SESSION['error_text'] = $result['errorMessage'];
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        
	}
	
}
