<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
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
    
	public function product_list()
	{
	    
	    $data['page'] = $_GET['page'] ?? 1;
	    
		$count = $this->db->count_all_results('products_table');
		
		$data['total']= round(($count/20), 0) + 1;
		
		//debug($data);
	    
		$data['products'] = $this->db->select('id,product_name_tr, product_price, product_image')
		    ->limit(20, (($data['page']-1)*20))
			->get('products_table')->result_array();
			
		
			
		$this->load->view('product/product_list_view', $data);
	}
	
	public function add_product()
	{
		$data['categories'] = $this->db->select('*')
		    ->get('category_table')->result_array();
		$data['govde'] = $this->db->select('*')
		    ->get('govde_rengi')->result_array();
		$data['cam'] = $this->db->select('*')
		    ->get('cam_rengi')->result_array();
		$data['cam_deseni'] = $this->db->select('*')
		    ->get('cam_deseni')->result_array();
		$data['sapka_rengi'] = $this->db->select('*')
		    ->get('sapka_rengi')->result_array();
		$data['mermer_rengi'] = $this->db->select('*')
		    ->get('mermer_rengi')->result_array();
		$data['ic_rengi'] = $this->db->select('*')
		    ->get('ic_renk')->result_array();
		$data['mermer_sekli'] = $this->db->select('*')
		    ->get('mermer_sekli')->result_array();
		$this->load->view('product/add_product_view', $data);
	}
	
	public function add_product_post()
	{
		require DOC_ROOT . 'simpleImage/SimpleImage.php';
		$post = $this->input->post();
		//debug($post);
		
		if(!empty($post['variant_name'][0])){
		    foreach($post['variant_name'] as $k => $v){
		        $new[$k]['name'] = $v;
		        $new[$k]['price'] = $post['variant_price'][$k];
		    }
		    $ins['variants'] = json_encode($new);
		}
		
		if(!empty($post['govde_name_tr'])){
		    foreach($post['govde_name_tr'] as $key => $val){
		        $govde[] = array('id' => $key, 
		        'variant_name_tr' => $post['govde_name_tr'][$key], 
		        'variant_name_en' => $post['govde_name_en'][$key], 
		        'variant_price' => $post['govde_price'][$key],
		        'variant_image' => $post['govde_image'][$key]);
		    }
		    
		    $govde = json_encode($govde);
		    $ins['govde_rengi'] = $govde;
		}
		
		if(!empty($post['cam_rengi_name_tr'])){
		    foreach($post['cam_rengi_name_tr'] as $key => $val){
		        $cam_rengi[] = array('id' => $key, 
		        'variant_name_tr' => $post['cam_rengi_name_tr'][$key], 
		        'variant_name_en' => $post['cam_rengi_name_en'][$key], 
		        'variant_price' => $post['cam_rengi_price'][$key],
		        'variant_image' => $post['cam_rengi_image'][$key]);
		    }
		    
		    $cam_rengi = json_encode($cam_rengi);
		    $ins['cam_rengi'] = $cam_rengi;
		}
		
		if(!empty($post['cam_deseni_name_tr'])){
		    foreach($post['cam_deseni_name_tr'] as $key => $val){
		        $cam_deseni[] = array('id' => $key, 
		        'variant_name_tr' => $post['cam_deseni_name_tr'][$key], 
		        'variant_name_en' => $post['cam_deseni_name_en'][$key], 
		        'variant_price' => $post['cam_deseni_price'][$key],
		        'variant_image' => $post['cam_deseni_image'][$key]);
		    }
		    
		    $cam_deseni = json_encode($cam_deseni);
		    $ins['cam_deseni'] = $cam_deseni;
		}
		
		if(!empty($post['sapka_rengi_name_tr'])){
		    foreach($post['sapka_rengi_name_tr'] as $key => $val){
		        $sapka_rengi[] = array('id' => $key, 
		        'variant_name_tr' => $post['sapka_rengi_name_tr'][$key], 
		        'variant_name_en' => $post['sapka_rengi_name_en'][$key], 
		        'variant_price' => $post['sapka_rengi_price'][$key],
		        'variant_image' => $post['sapka_rengi_image'][$key]);
		    }
		    
		    $sapka_rengi = json_encode($sapka_rengi);
		    $ins['sapka_rengi'] = $sapka_rengi;
		}
		
		if(!empty($post['mermer_rengi_name_tr'])){
		    foreach($post['mermer_rengi_name_tr'] as $key => $val){
		        $mermer_rengi[] = array('id' => $key, 
		        'variant_name_tr' => $post['mermer_rengi_name_tr'][$key], 
		        'variant_name_en' => $post['mermer_rengi_name_en'][$key], 
		        'variant_price' => $post['mermer_rengi_price'][$key],
		        'variant_image' => $post['mermer_rengi_image'][$key]);
		    }
		    
		    $mermer_rengi = json_encode($mermer_rengi);
		    $ins['mermer_rengi'] = $mermer_rengi;
		}
		
		if(!empty($post['mermer_sekli_name_tr'])){
		    foreach($post['mermer_sekli_name_tr'] as $key => $val){
		        $mermer_sekli[] = array('id' => $key, 
		        'variant_name_tr' => $post['mermer_sekli_name_tr'][$key], 
		        'variant_name_en' => $post['mermer_sekli_name_en'][$key], 
		        'variant_price' => $post['mermer_sekli_price'][$key],
		        'variant_image' => $post['mermer_sekli_image'][$key]);
		    }
		    
		    $mermer_sekli = json_encode($mermer_sekli);
		    $ins['mermer_sekli'] = $mermer_sekli;
		}
		
		if(!empty($post['ic_rengi_name_tr'])){
		    foreach($post['ic_rengi_name_tr'] as $key => $val){
		        $ic_rengi[] = array('id' => $key, 
		        'variant_name_tr' => $post['ic_rengi_name_tr'][$key], 
		        'variant_name_en' => $post['ic_rengi_name_en'][$key], 
		        'variant_price' => $post['ic_rengi_price'][$key],
		        'variant_image' => $post['ic_rengi_image'][$key]);
		    }
		    
		    $ic_rengi = json_encode($ic_rengi);
		    $ins['ic_renk'] = $ic_rengi;
		}
		
		
		if(!empty($_FILES['product_image']['name'][0])){
		    
		    foreach($_FILES['product_image']['name'] as $key => $val){
		    
			
    			$img_name = img_seo_name(time().$key.'-'.$post['product_name_tr']).'.jpg';
    			if( ( $_FILES['product_image']['type'][$key] == 'image/jpeg' ) OR ( $_FILES['product_image']['type'][$key] == 'image/png' ) ){
    				
    				if( ( $_FILES['product_image']['size'][$key] > 0 ) AND ( $_FILES['product_image']['size'][$key] < 3000000 ) ){
    					
    				//File Upload
    					$from_file = $_FILES['product_image']['tmp_name'][$key];
    					$to_file = DOC_ROOT . '../files/product/img/100/' .$img_name;
    					$to_file2 = DOC_ROOT . '../files/product/img/400/' .$img_name;
    					$to_file3 = DOC_ROOT . '../files/product/img/1000/' .$img_name;
    					$save_image = $this->save_image($from_file,$to_file, 100, 100);
    					$save_image = $this->save_image($from_file,$to_file2, 400, 400);
    					$save_image = $this->save_image($from_file,$to_file3, 1000, 1000);
    					
    					if($save_image == true){
    						$img[] = $img_name;
    					}
    					
    				}
    			}
			
		    }
			
		}
		
		if(!empty($img)){
		    $ins['product_image'] = implode(',', $img);
		}
		
		//debug($_FILES);
		
		foreach($_SESSION['lang_array'] as $lang){
		    $ins['product_name_'.$lang] = $post['product_name_'.$lang];
		    $ins['product_description_'.$lang] = $post['product_description_'.$lang];
		    $ins['variant_name_'.$lang] = $post['variant_group_name_'.$lang];
		}
		
		
		$ins['product_price'] = $post['product_price'];
		$ins['cat_id'] = $post['cat_id'];
		
		if(!empty($post['variants'])){
		    $ins['variants'] = implode(',',$post['variants']);
		}
		
		$this->db->insert('products_table', $ins);
		
		
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('process', 'success');
		}else{
			$this->session->set_flashdata('process', 'fail');
		}
		
		redirect(PRODUCT_LIST);
		
	}
	
	public function update_product($id)
	{
		$data['product'] = $this->db->select('*')
			->where('id', $id)
			->get('products_table')->row_array();
	    $data['govde'] = $this->db->select('*')
		    ->get('govde_rengi')->result_array();
		$data['cam'] = $this->db->select('*')
		    ->get('cam_rengi')->result_array();
		$data['cam_deseni'] = $this->db->select('*')
		    ->get('cam_deseni')->result_array();
		$data['sapka_rengi'] = $this->db->select('*')
		    ->get('sapka_rengi')->result_array();
		$data['mermer_rengi'] = $this->db->select('*')
		    ->get('mermer_rengi')->result_array();
		$data['ic_rengi'] = $this->db->select('*')
		    ->get('ic_renk')->result_array();
		$data['mermer_sekli'] = $this->db->select('*')
		    ->get('mermer_sekli')->result_array();
		    
		$data['categories'] = $this->db->select('*')
		    ->get('category_table')->result_array();
		
		$this->load->view('product/update_product_view', $data);
		
	}
	
	public function update_product_post()
	{
	    require DOC_ROOT . 'simpleImage/SimpleImage.php';
		$post = $this->input->post();
		//debug($post);
		
		if(!empty($post['variant_name'][0])){
		    foreach($post['variant_name'] as $k => $v){
		        $new[$k]['name'] = $v;
		        $new[$k]['price'] = $post['variant_price'][$k];
		    }
		    $upd['variants'] = json_encode($new);
		}
		
		
		if(!empty($_FILES['product_image']['name'][0])){
		    
		    foreach($_FILES['product_image']['name'] as $key => $val){
		    
			
    			$img_name = img_seo_name(time().$key.'-'.$post['product_name_tr']).'.jpg';
    			if( ( $_FILES['product_image']['type'][$key] == 'image/jpeg' ) OR ( $_FILES['product_image']['type'][$key] == 'image/png' ) ){
    				
    				if( ( $_FILES['product_image']['size'][$key] > 0 ) AND ( $_FILES['product_image']['size'][$key] < 3000000 ) ){
    					
    				//File Upload
    					$from_file = $_FILES['product_image']['tmp_name'][$key];
    					$to_file = DOC_ROOT . '../files/product/img/100/' .$img_name;
    					$to_file2 = DOC_ROOT . '../files/product/img/400/' .$img_name;
    					$to_file3 = DOC_ROOT . '../files/product/img/1000/' .$img_name;
    					$save_image = $this->save_image($from_file,$to_file, 100, 100);
    					$save_image = $this->save_image($from_file,$to_file2, 400, 400);
    					$save_image = $this->save_image($from_file,$to_file3, 1000, 1000);
    					
    					if($save_image == true){
    						$img[] = $img_name;
    					}
    					
    				}
    			}
			
		    }
			
		}
		
		
		if(!empty($img)){
		    $upd['product_image'] = $post['pro_imgs'].','.implode(',', $img);
		}else{
		    $upd['product_image'] = $post['pro_imgs'];
		}
		
		if(!empty($post['govde_name_tr'])){
		    foreach($post['govde_name_tr'] as $key => $val){
		        $govde[] = array('id' => $key, 
		        'variant_name_tr' => $post['govde_name_tr'][$key], 
		        'variant_name_en' => $post['govde_name_en'][$key], 
		        'variant_price' => $post['govde_price'][$key],
		        'variant_image' => $post['govde_image'][$key],
		        'govde_image' => $post['variant_govde_image'][$key]??''
		        );
		    }
		    
		    $govde = json_encode($govde);
		    $upd['govde_rengi'] = $govde;
		}else{
		    $upd['govde_rengi'] = NULL;
		}
		
		if(!empty($post['cam_rengi_name_tr'])){
		    foreach($post['cam_rengi_name_tr'] as $key => $val){
		        $cam_rengi[] = array('id' => $key, 
		        'variant_name_tr' => $post['cam_rengi_name_tr'][$key], 
		        'variant_name_en' => $post['cam_rengi_name_en'][$key], 
		        'variant_price' => $post['cam_rengi_price'][$key],
		        'variant_image' => $post['cam_rengi_image'][$key]);
		    }
		    
		    $cam_rengi = json_encode($cam_rengi);
		    $upd['cam_rengi'] = $cam_rengi;
		}else{
		    $upd['cam_rengi'] = NULL;
		}
		
		if(!empty($post['cam_deseni_name_tr'])){
		    foreach($post['cam_deseni_name_tr'] as $key => $val){
		        $cam_deseni[] = array('id' => $key, 
		        'variant_name_tr' => $post['cam_deseni_name_tr'][$key], 
		        'variant_name_en' => $post['cam_deseni_name_en'][$key], 
		        'variant_price' => $post['cam_deseni_price'][$key],
		        'variant_image' => $post['cam_deseni_image'][$key]);
		    }
		    
		    $cam_deseni = json_encode($cam_deseni);
		    $upd['cam_deseni'] = $cam_deseni;
		}else{
		    $upd['cam_deseni'] = NULL;
		}
		
		if(!empty($post['sapka_rengi_name_tr'])){
		    foreach($post['sapka_rengi_name_tr'] as $key => $val){
		        $sapka_rengi[] = array('id' => $key, 
		        'variant_name_tr' => $post['sapka_rengi_name_tr'][$key], 
		        'variant_name_en' => $post['sapka_rengi_name_en'][$key], 
		        'variant_price' => $post['sapka_rengi_price'][$key],
		        'variant_image' => $post['sapka_rengi_image'][$key]);
		    }
		    
		    $sapka_rengi = json_encode($sapka_rengi);
		    $upd['sapka_rengi'] = $sapka_rengi;
		}else{
		    $upd['sapka_rengi'] = NULL;
		}
		
		if(!empty($post['mermer_rengi_name_tr'])){
		    foreach($post['mermer_rengi_name_tr'] as $key => $val){
		        $mermer_rengi[] = array('id' => $key, 
		        'variant_name_tr' => $post['mermer_rengi_name_tr'][$key], 
		        'variant_name_en' => $post['mermer_rengi_name_en'][$key], 
		        'variant_price' => $post['mermer_rengi_price'][$key],
		        'variant_image' => $post['mermer_rengi_image'][$key]);
		    }
		    
		    $mermer_rengi = json_encode($mermer_rengi);
		    $upd['mermer_rengi'] = $mermer_rengi;
		}else{
		    $upd['mermer_rengi'] = NULL;
		}
		
		if(!empty($post['mermer_sekli_name_tr'])){
		    foreach($post['mermer_sekli_name_tr'] as $key => $val){
		        $mermer_sekli[] = array('id' => $key, 
		        'variant_name_tr' => $post['mermer_sekli_name_tr'][$key], 
		        'variant_name_en' => $post['mermer_sekli_name_en'][$key], 
		        'variant_price' => $post['mermer_sekli_price'][$key],
		        'variant_image' => $post['mermer_sekli_image'][$key]);
		    }
		    
		    $mermer_sekli = json_encode($mermer_sekli);
		    $upd['mermer_sekli'] = $mermer_sekli;
		}else{
		    $upd['mermer_sekli'] = NULL;
		}
		
		if(!empty($post['ic_rengi_name_tr'])){
		    foreach($post['ic_rengi_name_tr'] as $key => $val){
		        $ic_rengi[] = array('id' => $key, 
		        'variant_name_tr' => $post['ic_rengi_name_tr'][$key], 
		        'variant_name_en' => $post['ic_rengi_name_en'][$key], 
		        'variant_price' => $post['ic_rengi_price'][$key],
		        'variant_image' => $post['ic_rengi_image'][$key]);
		    }
		    
		    $ic_rengi = json_encode($ic_rengi);
		    $upd['ic_renk'] = $ic_rengi;
		}else{
		    $upd['ic_renk'] = NULL;
		}
		
		foreach($_SESSION['lang_array'] as $lang){
		    $upd['product_name_'.$lang] = $post['product_name_'.$lang];
		    $upd['product_description_'.$lang] = $post['product_description_'.$lang];
		    $upd['variant_name_'.$lang] = $post['variant_group_name_'.$lang];
		}
		
		$upd['product_price'] = $post['product_price'];
		$upd['cat_id'] = $post['cat_id'];
		
		
		
		$this->db->update('products_table', $upd, array('id' => $post['id']));
		
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('process', 'success');
		}else{
			$this->session->set_flashdata('process', 'fail');
		}
		
		redirect(PRODUCT_LIST);
		
	}
	
	public function update_govde_image_post(){
	    $post = $this->input->post();
	    //debug($post);
	    if(!empty($post['variant'])){
	        
	        $pro = $this->db->select('govde_rengi')
	            ->where('id', $post['pro_id'])
	            ->get('products_table')->row_array();
	            
	       if(!empty($pro['govde_rengi'])){
	           
	           $variants = json_decode($pro['govde_rengi'],1);
	           
	           foreach($variants as $key => $variant){
	               if($variant['id'] == $post['variant']){
	                   $variants[$key]['govde_image'] = $post['img'];
	               }
	           }
	           
	           $variants_updated = json_encode($variants);
	           
	           //debug($variants_updated);
	           
	           $this->db->update('products_table', array('govde_rengi' =>$variants_updated), array('id' => $post['pro_id']));
	           
	           if($this->db->affected_rows() > 0){
	               echo 'ok';
	           }else{
	               echo 'error';
	           }
	           
	       }else{
	        echo 'error';
	    }
	        
	    }else{
	        echo 'error';
	    }
	}
	
	public function delete_product($id)
	{
		//todo delete script
		if($id >0){
		    $this->db->delete('products_table', array('id' => $id));
		}
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('process', 'success');
		}else{
			$this->session->set_flashdata('process', 'fail');
		}
		
		redirect($_SERVER['HTTP_REFERER']);
		
	}
	
	public function search(){
	    $post = $this->input->post();
	    
	    $text = $post['txt'];
	    
	    if(strlen($text) > 2){
	        $data['results'] = $this->db->select('*')
	        ->like('product_name_'.$_SESSION['lang'], $text, 'both')
	        ->get('products_table')->result_array();
	        $this->load->view('search_view', $data);
	    }
	    
	}
	
	
	private function save_image($from_file, $to_file, $width, $height){
		try {
		  // Create a new SimpleImage object
		  $image = new \claviska\SimpleImage();

		  // Magic! ✨
		  $image
			->fromFile($from_file)                     // load image.jpg
			->autoOrient()                              // adjust orientation based on exif data
			->resize($width)                          // resize to 320x200 pixels
			//->thumbnail($width, $height, 'center')        // resize to 320x200 pixels
			//->flip('x')                                 // flip horizontally
			//->colorize('DarkBlue')                      // tint dark blue
			//->border('black', 10)                       // add a 10 pixel black border
			//->overlay('watermark.png', 'bottom right')  // add a watermark image
			->toFile($to_file, 'image/jpeg') ;     // convert to PNG and save a copy to new-image.png
			//->toScreen();                               // output to the screen
			return true;
		  // And much more! 💪
		} catch(Exception $err) {
		  // Handle errors
		  echo $err->getMessage();
		  return false;
		  die();
		}
	}
	
}
