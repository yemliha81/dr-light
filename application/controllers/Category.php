<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
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
    
    public function products_ajax($id){
        
        $page = $_GET['page'] - 1;
        
        if(empty($_GET['sort'])){
	        $order_by = 'id';
	        $sort = 'asc';
	    }
	    
	    if($_GET['sort'] == 'price_asc'){
	        $order_by = 'product_price';
	        $sort = 'asc';
	    }
	    
	    if($_GET['sort'] == 'price_desc'){
	        $order_by = 'product_price';
	        $sort = 'desc';
	    }
        $data['cat'] = $this->db->select('*')->where('id', $id)->get('category_table')->row_array();
        $data['products'] = $this->db->select('*')
    		->where('cat_id', $id)
    		->where('is_sub', 0)
    		->order_by($order_by,$sort)
    		->limit(18,(18*$page))
    		->get('products_table')->result_array();
    	$this->load->view('ajax_products_view', $data);
    	
    }
    
    public function filter_products(){
        
        $post = $this->input->post();
        
        $cat_id = $post['cat_id'];
        $data['cat'] = $this->db->select('*')->where('id', $cat_id)->get('category_table')->row_array();
        $filter = 0;
        
        if(!empty($post['govde_rengi'])){
            $data['govde_rengi'] = $this->db->select('product_id')
                ->join('products_table', 'filter_table.product_id = products_table.id', 'left')
        		->where('filter_table.cat_id', $cat_id)
        		->where('products_table.is_sub', 0)
        		->where_in('filter_table.govde_rengi', $post['govde_rengi'])
        		->get('filter_table')->result_array();
        	
        	if(!empty($data['govde_rengi'])){
        	    foreach($data['govde_rengi'] as $v){
        	        $pro_array[] = $v['product_id'];
        	    }
        	}
        	
        	$filter = 1;
        	
        }
        
        if(!empty($post['cam_deseni'])){
            $data['cam_deseni'] = $this->db->select('product_id')
                //->join('products_table', 'filter_table.product_id = products_table.id', 'left')
        		->where('filter_table.cat_id', $cat_id)
        		->where_in('filter_table.cam_deseni', $post['cam_deseni'])
        		->get('filter_table')->result_array();
        	
        	if(!empty($data['cam_deseni'])){
        	    foreach($data['cam_deseni'] as $v){
        	        $pro_array[] = $v['product_id'];
        	    }
        	}
        	
        	$filter = 1;
        	
        }
        
        if(!empty($post['mermer_rengi'])){
            $data['mermer_rengi'] = $this->db->select('product_id')
                //->join('products_table', 'filter_table.product_id = products_table.id', 'left')
        		->where('filter_table.cat_id', $cat_id)
        		->where_in('filter_table.mermer_rengi', $post['mermer_rengi'])
        		->get('filter_table')->result_array();
        	
        	if(!empty($data['mermer_rengi'])){
        	    foreach($data['mermer_rengi'] as $v){
        	        $pro_array[] = $v['product_id'];
        	    }
        	}
        	
        	$filter = 1;
        	
        }
        
        if(!empty($post['cam_rengi'])){
            $data['cam_rengi'] = $this->db->select('product_id')
                //->join('products_table', 'filter_table.product_id = products_table.id', 'left')
        		->where('filter_table.cat_id', $cat_id)
        		->where_in('filter_table.cam_rengi', $post['cam_rengi'])
        		->get('filter_table')->result_array();
        	
        	if(!empty($data['cam_rengi'])){
        	    foreach($data['cam_rengi'] as $v){
        	        $pro_array[] = $v['product_id'];
        	    }
        	}
        	
        	$filter = 1;
        	
        }
        
        if(!empty($post['sapka_rengi'])){
            $data['sapka_rengi'] = $this->db->select('product_id')
                //->join('products_table', 'filter_table.product_id = products_table.id', 'left')
        		->where('filter_table.cat_id', $cat_id)
        		->where_in('filter_table.sapka_rengi', $post['sapka_rengi'])
        		->get('filter_table')->result_array();
        	
        	if(!empty($data['sapka_rengi'])){
        	    foreach($data['sapka_rengi'] as $v){
        	        $pro_array[] = $v['product_id'];
        	    }
        	}
        	
        	$filter = 1;
        	
        }
        
        if(!empty($post['ic_renk'])){
            $data['ic_renk'] = $this->db->select('product_id')
                //->join('products_table', 'filter_table.product_id = products_table.id', 'left')
        		->where('filter_table.cat_id', $cat_id)
        		->where_in('filter_table.ic_renk', $post['ic_renk'])
        		->get('filter_table')->result_array();
        	
        	if(!empty($data['ic_renk'])){
        	    foreach($data['ic_renk'] as $v){
        	        $pro_array[] = $v['product_id'];
        	    }
        	}
        	
        	$filter = 1;
        	
        }
        
        
        
        $pro_array = array_unique($pro_array);
        
        
        if(!empty($pro_array)){
            $data['products'] = $this->db->select('id, product_name_tr, product_name_en, product_price, product_image')
        		->where_in('id', $pro_array)
        		->where('is_sub', 0)
        		->get('products_table')->result_array();
        }else{
            $data['products'] = [];
        }
        
        
        //filter_table.product_id as id, product_name_tr, product_name_en, product_price, product_image
        if($filter == 0){
            $data['products'] = $this->db->select('*')
    		->where('cat_id', $cat_id)
    		->where('is_sub', 0)
    		->limit(18)
    		->get('products_table')->result_array();
        }
        
    	$this->load->view('ajax_products_view', $data);
        
    }
    
	public function products($seo_name)
	{
	    if(empty($_GET['sort'])){
	        $order_by = 'id';
	        $sort = 'asc';
	    }
	    
	    if($_GET['sort'] == 'price_asc'){
	        $order_by = 'product_price';
	        $sort = 'asc';
	    }
	    
	    if($_GET['sort'] == 'price_desc'){
	        $order_by = 'product_price';
	        $sort = 'desc';
	    }
		
		$data['cat'] = $this->db->select('*')->where('category_seo_name', $seo_name)->get('category_table')->row_array();
		//debug($data);
		$data['products'] = $this->db->select('*')
    		->where('cat_id', $data['cat']['id'])
    		->where('is_sub', 0)
    		->order_by($order_by,$sort)
    		->limit(18)
    		->get('products_table')->result_array();
    	$data['govde_rengi'] = $this->db->select('*')
    		->get('govde_rengi')->result_array();
    	$data['cam_rengi'] = $this->db->select('*')
    		->get('cam_rengi')->result_array();
    	$data['cam_deseni'] = $this->db->select('*')
    		->get('cam_deseni')->result_array();
    	$data['sapka_rengi'] = $this->db->select('*')
    		->get('sapka_rengi')->result_array();
    	$data['ic_renk'] = $this->db->select('*')
    		->get('ic_renk')->result_array();
    	$data['mermer_rengi'] = $this->db->select('*')
    		->get('mermer_rengi')->result_array();
    	$data['last_products'] = $this->db->select('*, category_table.id as cat_id, products_table.id as id')
    		->join('category_table', 'products_table.cat_id = category_table.id', 'left')
    		->limit('8')
    		->where('products_table.is_sub', 0)
    		->order_by('products_table.id', 'desc')
    		->get('products_table')->result_array();
    	//debug($data);
    	
    	$data['url'] = FATHER_BASE.'category/products/'.$id;
		
		$this->load->view('category_view', $data);
	}
}
