<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login_view');
	}
	
	public function login_post(){
	    $post = $this->input->post();
	    
	    
	    $check = $this->db->select('*')
	        ->where('username', $post['username'])
	        ->where('pppass', md5($post['password']))
	        ->get('admin_table')->row_array();
	        
	        
	        
	   if(!empty($check)){
	       $_SESSION['admin_logged_in'] = 1;
	        $_SESSION['username'] = $post['username'];
	        redirect(FATHER_BASE);
	   }else{
	       die('Hatalı Giriş!!!');
	   }
	    
	    
	}
	
	public function logout(){
	    unset($_SESSION['admin_logged_in']);
	     unset($_SESSION['username']);
	     redirect(LOGIN);
	}
	
}
