<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
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
    
	public function account(){
	    if(!isset($_SESSION['logged_in'])){
	        redirect(LOGIN);
	    }
	    
	    
	    $data['orders'] = $this->db->select('*')
	        ->where('user_id', $_SESSION['user_id'])
	        ->where('is_paid', 1)
	        ->order_by('id', 'desc')
	        ->get('order_table')->result_array();
	    $data['user'] = $this->db->select('*')
	        ->where('id', $_SESSION['user_id'])
	        ->get('user_table')->row_array();
	        
	    $this->load->view('account_view', $data);
	}
	
	public function order_details(){
	    $post = $this->input->post();
	    
	    $data['order'] = $this->db->select('*')
	        ->where('id', $post['ord'])
	        ->get('order_table')->row_array();
	   
	   
	   $this->load->view('order_view', $data); 
	    
	    
	}
	
	public function signup(){
	    
	    $this->load->view('signup_view');
	}
	
	public function signup_post(){
	    
	    $post = $this->input->post();
	    
	    if((!empty($post['email'])) && (!empty($post['first_name'])) 
	    && (!empty($post['last_name'])) && (!empty($post['password'])) 
	    && (!empty($post['password2'])) && (!empty($post['checkbox1'])) ){
	        
	        if($post['password'] != $post['password2']){
	            $_SESSION['error'] = 'passwords_do_not_match_error';
	            redirect(SIGNUP);
	        }else{
	            $check = $this->db->select('*')
    	            ->where('email', $post['email'])
    	            ->get('user_table')->row_array();
    	            
    	            
	            if(empty($check)){
	                
	                $ins['first_name'] = $post['first_name'];
	                $ins['last_name'] = $post['last_name'];
	                $ins['email'] = $post['email'];
	                $ins['password'] = md5($post['password']);
	                
	                $this->db->insert('user_table', $ins);
	                
	                if($this->db->affected_rows() > 0){
	                    $_SESSION['full_name'] = $check['first_name'].' '.$check['last_name'];
    	                $_SESSION['email'] = $post['email'];
    	                $_SESSION['logged_in'] = 1;
    	                $_SESSION['user_id'] = $this->db->insert_id();
    	                $_SESSION['success'] = 'user_created_successfully';
    	                
    	                if(!empty($_SESSION['cart'])){
    	                    redirect(CART);
    	                }else{
    	                    redirect(USER_ACCOUNT);
    	                }
    	                
    	                
	                }
           
    	           
    	           
    	       }else{
    	           $_SESSION['error'] = 'user_already_exists_error';
    	           redirect(SIGNUP);
    	       }
	        }
	        
	    }else{
	        $_SESSION['error'] = 'required_fields_error';
	        redirect(LOGIN);
	    }
	    
	}
	
	public function login(){
	    
	    $this->load->view('login_view');
	}
	
	public function login_post(){
	    $post = $this->input->post();
	    
	    if((!empty($post['email'])) && (!empty($post['password'])) ){
	        
	        $check = $this->db->select('*')
	            ->where('email', $post['email'])
	            ->where('password', md5($post['password']))
	            ->get('user_table')->row_array();
	       
	       if(!empty($check)){
	           
	           $_SESSION['full_name'] = $check['first_name'].' '.$check['last_name'];
	           $_SESSION['email'] = $check['email'];
	           $_SESSION['logged_in'] = 1;
	           $_SESSION['user_id'] = $check['id'];
	           if(!empty($_SESSION['cart'])){
                    redirect(CART);
                }else{
                    redirect(USER_ACCOUNT);
                }
	           
	       }else{
	           $_SESSION['error'] = 'user_not_found_error';
	           redirect(LOGIN);
	       }
	       
	        
	        
	    }else{
	        $_SESSION['error'] = 'required_fields_error';
	        redirect(LOGIN);
	    }
	    
	    
	    
	}
	
	public function update_account_post(){
	    
	    if(!isset($_SESSION['logged_in'])){
	        redirect(LOGIN);
	    }
	    
	    $post = $this->input->post();
	    
	    $upd['first_name'] = $post['first_name'];
	    $upd['last_name'] = $post['last_name'];
	    $upd['email'] = $post['email'];
	    $upd['phone'] = $post['phone'];
	    
	    if(!empty($post['password'])){
	        $upd['password'] = md5($post['password']);
	    }
	    
	    $this->db->update('user_table', $upd, array('id' => $_SESSION['user_id']));
	    
	    if($this->db->affected_rows() > 0){
	        $_SESSION['success'] = 'user_update_successful';
	        redirect(USER_ACCOUNT);
	    }
	    
	    
	}
	
	public function logout(){
	    unset($_SESSION['user_id']);
	    unset($_SESSION['full_name']);
	    unset($_SESSION['email']);
	    unset($_SESSION['logged_in']);
	    
	    redirect(FATHER_BASE);
	}
	
}
