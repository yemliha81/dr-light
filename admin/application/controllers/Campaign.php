<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campaign extends CI_Controller {
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
    
    public function new_campaign(){
	    
	    $this->load->view('campaign/new_campaign_view');
	}
    
	public function new_campaign_post(){
	    $post = $this->input->post();
	    debug($post);
	}
}
