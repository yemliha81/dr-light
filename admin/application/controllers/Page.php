<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
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
    
	public function page_list()
	{
		$data['pages'] = $this->db->select('*')
			->get('page_table')->result_array();
			
		$this->load->view('page/page_list_view', $data);
	}
	
	public function add_page()
	{
		$this->load->view('page/add_page_view');
	}
	
	public function add_page_post()
	{
		require DOC_ROOT . 'simpleImage/SimpleImage.php';
		$post = $this->input->post();
		//debug($_FILES);
		if(!empty($_FILES['page_image'])){
			$file = $_FILES['page_image'];
			$img_name = img_seo_name(time().'-'.$post['page_name_tr']).'.jpg';
			if( ( $file['type'] == 'image/jpeg' ) OR ( $file['type'] == 'image/png' ) ){
				
				if( ( $file['size'] > 0 ) AND ( $file['size'] < 3000000 ) ){
					
				//File Upload
					$from_file = $file['tmp_name'];
					$to_file3 = DOC_ROOT . '../files/page/img/1000/' .$img_name;
					$save_image = $this->save_image($from_file,$to_file3, 1920);
					
					if($save_image == true){
						$ins['page_image'] = $img_name;
					}
					
				}
			}
			
		}
		
		//debug($_FILES);
		foreach($_SESSION['lang_array'] as $lang){
		    $ins['page_name_'.$lang] = $post['page_name_'.$lang];
		    $ins['page_description_'.$lang] = $post['page_description_'.$lang];
		}
		
		
		
		$this->db->insert('page_table', $ins);
		
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('process', 'success');
		}else{
			$this->session->set_flashdata('process', 'fail');
		}
		
		redirect(PAGE_LIST);
		
	}
	
	public function update_page($id)
	{
		$data['page'] = $this->db->select('*')
			->where('id', $id)
			->get('page_table')->row_array();
		
		$this->load->view('page/update_page_view', $data);
		
	}
	
	public function update_page_post()
	{
	    require DOC_ROOT . 'simpleImage/SimpleImage.php';
		$post = $this->input->post();
		
		if(!empty($_FILES['page_image'])){
			$file = $_FILES['page_image'];
			$img_name = img_seo_name(time().'-'.$post['page_name_tr']).'.jpg';
			if( ( $file['type'] == 'image/jpeg' ) OR ( $file['type'] == 'image/png' ) ){
				
				if( ( $file['size'] > 0 ) AND ( $file['size'] < 3000000 ) ){
					
				//File Upload
					$from_file = $file['tmp_name'];
					$to_file3 = DOC_ROOT . '../files/page/img/1000/' .$img_name;
					$save_image = $this->save_image($from_file,$to_file3, 1920);
					
					if($save_image == true){
						$upd['page_image'] = $img_name;
					}
					
				}
			}
			
		}
		foreach($_SESSION['lang_array'] as $lang){
		    $upd['page_name_'.$lang] = $post['page_name_'.$lang];
		    $upd['page_description_'.$lang] = $post['page_description_'.$lang];
		}
		
		
		$this->db->update('page_table', $upd, array('id' => $post['id']));
		
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('process', 'success');
		}else{
			$this->session->set_flashdata('process', 'fail');
		}
		
		redirect(PAGE_LIST);
		
	}
	
	public function delete_page($id)
	{
		//todo delete script
		if($id >0){
		    $this->db->delete('page_table', array('id' => $id));
		}
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('process', 'success');
		}else{
			$this->session->set_flashdata('process', 'fail');
		}
		
		redirect(PAGE_LIST);
		
	}
	
	
	private function save_image($from_file, $to_file, $width, $height=null){
		try {
		  // Create a new SimpleImage object
		  $image = new \claviska\SimpleImage();

		  // Magic! âœ¨
		  $image
			->fromFile($from_file)                     // load image.jpg
			->autoOrient()                              // adjust orientation based on exif data
			->resize($width, $height)                          // resize to 320x200 pixels
			//->thumbnail($width, $height, 'center')        // resize to 320x200 pixels
			//->flip('x')                                 // flip horizontally
			//->colorize('DarkBlue')                      // tint dark blue
			//->border('black', 10)                       // add a 10 pixel black border
			//->overlay('watermark.png', 'bottom right')  // add a watermark image
			->toFile($to_file, 'image/jpeg') ;     // convert to PNG and save a copy to new-image.png
			//->toScreen();                               // output to the screen
			return true;
		  // And much more! ðŸ’ª
		} catch(Exception $err) {
		  // Handle errors
		  echo $err->getMessage();
		  return false;
		  die();
		}
	}
	
}
