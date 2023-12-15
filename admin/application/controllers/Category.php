<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
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
    
	public function category_list()
	{
		$data['categories'] = $this->db->select('*')
			->get('category_table')->result_array();
			
		$this->load->view('category/category_list_view', $data);
	}
	
	public function add_category()
	{
		$this->load->view('category/add_category_view');
	}
	
	public function add_category_post()
	{
		require DOC_ROOT . 'simpleImage/SimpleImage.php';
		$post = $this->input->post();
		//debug($_FILES);
		if(!empty($_FILES['category_image'])){
			$file = $_FILES['category_image'];
			$img_name = img_seo_name(time().'-'.$post['category_name_tr']).'.jpg';
			if( ( $file['type'] == 'image/jpeg' ) OR ( $file['type'] == 'image/png' ) ){
				
				if( ( $file['size'] > 0 ) AND ( $file['size'] < 3000000 ) ){
					
				//File Upload
					$from_file = $file['tmp_name'];
					$to_file = DOC_ROOT . '../files/category/img/100/' .$img_name;
					$to_file2 = DOC_ROOT . '../files/category/img/400/' .$img_name;
					$to_file3 = DOC_ROOT . '../files/category/img/1000/' .$img_name;
					$save_image = $this->save_image($from_file,$to_file, 100);
					$save_image = $this->save_image($from_file,$to_file2, 500);
					$save_image = $this->save_image($from_file,$to_file3, 1000);
					
					if($save_image == true){
						$ins['category_image'] = $img_name;
					}
					
				}
			}
			
		}
		
		if(!empty($_FILES['category_banner'])){
			$file = $_FILES['category_banner'];
			$img_name = img_seo_name(time().'-'.$post['category_name_tr']).'-banner.jpg';
			if( ( $file['type'] == 'image/jpeg' ) OR ( $file['type'] == 'image/png' ) ){
				
				if( ( $file['size'] > 0 ) AND ( $file['size'] < 3000000 ) ){
					
				//File Upload
					$from_file = $file['tmp_name'];
					$to_file = DOC_ROOT . '../files/category/img/100/' .$img_name;
					$to_file2 = DOC_ROOT . '../files/category/img/400/' .$img_name;
					$to_file3 = DOC_ROOT . '../files/category/img/1000/' .$img_name;
					$save_image = $this->save_image($from_file,$to_file, 100);
					$save_image = $this->save_image($from_file,$to_file2, 500);
					$save_image = $this->save_image($from_file,$to_file3, 1000);
					
					if($save_image == true){
						$ins['category_banner_image'] = $img_name;
					}
					
				}
			}
			
		}
		
		//debug($_FILES);
		
		foreach($_SESSION['lang_array'] as $lang){
		    $ins['category_name_'.$lang] = $post['category_name_'.$lang];
		    $ins['category_description_'.$lang] = $post['category_description_'.$lang];
		}
		
		$ins['category_seo_name'] = img_seo_name($post['category_name_tr']);
		
		$this->db->insert('category_table', $ins);
		
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('process', 'success');
		}else{
			$this->session->set_flashdata('process', 'fail');
		}
		
		redirect(CATEGORY_LIST);
		
	}
	
	public function update_category($id)
	{
		$data['category'] = $this->db->select('*')
			->where('id', $id)
			->get('category_table')->row_array();
		
		$this->load->view('category/update_category_view', $data);
		
	}
	
	public function update_category_post()
	{
	    require DOC_ROOT . 'simpleImage/SimpleImage.php';
		$post = $this->input->post();
		
		if(!empty($_FILES['category_image'])){
			$file = $_FILES['category_image'];
			$img_name = img_seo_name(time().'-'.$post['category_name_tr']).'.jpg';
			if( ( $file['type'] == 'image/jpeg' ) OR ( $file['type'] == 'image/png' ) ){
				
				if( ( $file['size'] > 0 ) AND ( $file['size'] < 3000000 ) ){
					
				//File Upload
					$from_file = $file['tmp_name'];
					$to_file = DOC_ROOT . '../files/category/img/100/' .$img_name;
					$to_file2 = DOC_ROOT . '../files/category/img/400/' .$img_name;
					$to_file3 = DOC_ROOT . '../files/category/img/1000/' .$img_name;
					$save_image = $this->save_image($from_file,$to_file, 100);
					$save_image = $this->save_image($from_file,$to_file2, 500);
					$save_image = $this->save_image($from_file,$to_file3, 1000);
					
					if($save_image == true){
						$upd['category_image'] = $img_name;
					}
					
				}
			}
			
		}
		
		if(!empty($_FILES['category_banner'])){
			$file = $_FILES['category_banner'];
			$img_name = img_seo_name(time().'-'.$post['category_name_tr']).'-banner.jpg';
			if( ( $file['type'] == 'image/jpeg' ) OR ( $file['type'] == 'image/png' ) ){
				
				if( ( $file['size'] > 0 ) AND ( $file['size'] < 3000000 ) ){
					
				//File Upload
					$from_file = $file['tmp_name'];
					$to_file = DOC_ROOT . '../files/category/img/100/' .$img_name;
					$to_file2 = DOC_ROOT . '../files/category/img/400/' .$img_name;
					$to_file3 = DOC_ROOT . '../files/category/img/1000/' .$img_name;
					$save_image = $this->save_image($from_file,$to_file, 100);
					$save_image = $this->save_image($from_file,$to_file2, 500);
					$save_image = $this->save_image($from_file,$to_file3, 1000);
					
					if($save_image == true){
						$upd['category_banner_image'] = $img_name;
					}
					
				}
			}
			
		}
		
		foreach($_SESSION['lang_array'] as $lang){
		    $upd['category_name_'.$lang] = $post['category_name_'.$lang];
		    $upd['category_description_'.$lang] = $post['category_description_'.$lang];
		}
		
		
		$this->db->update('category_table', $upd, array('id' => $post['id']));
		
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('process', 'success');
		}else{
			$this->session->set_flashdata('process', 'fail');
		}
		
		redirect(CATEGORY_LIST);
		
	}
	
	public function delete_category($id)
	{
		//todo delete script
		if($id >0){
		    $this->db->delete('category_table', array('id' => $id));
		}
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('process', 'success');
		}else{
			$this->session->set_flashdata('process', 'fail');
		}
		
		redirect(CATEGORY_LIST);
		
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
