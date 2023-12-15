<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
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
    
	public function index($id){
	    
	    $data['page'] = $this->db->select('*')->where('id', $id)->get('page_table')->row_array();
	    
	    $this->load->view('page_view', $data);
	}
	
	public function contact(){
	    $this->load->view('contact_view');
	}
	
	public function support(){
	    $data['pages'] = $this->db->select('*')->where('type', '2')->get('page_table')->result_array();
	    $this->load->view('support_view', $data);
	}
	
	public function not_found(){
	    $this->load->view('404_view');
	}
	
	
}
