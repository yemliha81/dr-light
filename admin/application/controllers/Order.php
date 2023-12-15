<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if(empty($_SESSION['admin_logged_in'])){
            redirect(LOGIN);
        }
        // Your own constructor code
        if(empty($_SESSION['lang'])){
            $_SESSION['lang'] = 'tr';
        }
        if(empty($_SESSION['lang_array'])){
            $_SESSION['lang_array'] = array('tr', 'en');
        }
    }
    
	public function order_list()
	{
		$data['orders'] = $this->db->select('*, user_table.id as userID, order_table.id as order_id,order_table.insert_time as order_insert_time')
		    ->join('user_table', 'order_table.user_id = user_table.id')
		    ->order_by('order_table.id', 'DESC')
		    ->where('is_paid', 1)
			->get('order_table')->result_array();
			
		$data['today_orders'] = $this->db->select('SUM(total_price) as total')
		    ->where('insert_time >=', date('Y-m-d', time()))
		    ->where('insert_time <=', date('Y-m-d', time()+86400))
		    ->where('is_paid', 1)
		    ->get('order_table')->row_array();
		    
			
		$this->load->view('order/order_list_view', $data);
	}
	
	public function order_detail($id)
	{
	    $data['order'] = $this->db->select('*, user_table.id as userid, order_table.id as order_id')
		    ->where('order_table.id', $id)
		    ->join('user_table', 'order_table.user_id = user_table.id')
			->get('order_table')->row_array();
		
		$this->load->view('order/order_detail_view', $data);
	}
	
	public function order_update_post()
	{
	    $post = $this->input->post();
	    //debug($post);
	    $where['id'] = $post['order_id'];
	    $upd['status'] = $post['status'];
	    $upd['cargo_data'] = json_encode($post);
	    
	    $this->db->update('order_table', $upd, $where);
	    
	    if($this->db->affected_rows() > 0){
	        
	        $order = $this->db->select('order_id, user_data, order_data, cargo_data, email')
	            ->join('user_table', 'order_table.user_id = user_table.id', 'left')
	            ->where('order_table.id', $post['order_id'])
	            ->get('order_table')->row_array();
	            
	        
	        $this->info_mail($order,$post['status']);
	        redirect(ORDER_LIST);
	    }
	    
	    
	}
	
	private function status($s){
        if($s == '0'){ $st = 'beklemede'; }
        if($s == '1'){ $st = 'hazırlanıyor'; }
        if($s == '2'){ $st = 'kargoya verildi'; }
        if($s == '3'){ $st = 'teslim edildi'; }
        if($s == '4'){ $st = 'iptal edildi'; }
        
        return $st;
    } 
	
	private function info_mail($order, $status){
	    
	        $user = json_decode($order['user_data'],1);
	        $cargo = json_decode($order['cargo_data'],1);
	    
	    
	        $to = $order['email'];
			$subject = 'Siparişiniz '.$this->status($status);
			
			$body .= '<div style="text-align: center;">';
			$body .= '	<img src="https://dr-light.com.tr/assets/images/drlight_logo.png" width="220px">';
			$body .= '</div>';
			$body .= '<hr>';
			$body .= '<div style="font-family: Arial;font-size: 14px;">';
		
		    $body .= '<div style="padding: 15px; background: #f1f1f1;">';
			$body .= 'Sayın '.$user['first_name'].' '.$user['last_name'].', <br><br> 
			vermiş olduğunuz '.$order['order_id'].' referans nolu siparişinizin durumu '.$this->status($status).' olarak güncellenmiştir.<br><br>';
			
			if($status == '2'){
			    $body .= 'Kargo firması : '.$cargo['cargo'].'<br>';
			    $body .= 'Takip numarası : '. $cargo['cargo_number'].'<br>';
			    
			}
			
			
			$body .= '<hr/>';

            $body .= 'Saygılarımızla';

			$body .= '<br><br>';

			$body .= '<div style="text-align: center;">';
			$body .= '	<img src="https://dr-light.com.tr/assets/images/drlight_logo.png" width="220px">';
			$body .= '</div>';
		
		    $body .= '</div>';
				
				
			send_email('https://dr-light.com.tr/', $to, $subject, $body);
	}
	
	
	
}
