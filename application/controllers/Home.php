<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	/* CONSTRUCTOR */
	function __construct() {
		parent::__construct();
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET, POST ,OPTIONS, PUT');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		setlocale(LC_TIME, array('da_DA.UTF-8','da_DA@euro','da_DA','danish'));
	}
	/* CONSTRUCTOR */
	/***** Home INDEX *********/
	public function index($param=""){
		// if($this->session->userdata('login') == 1){
			// redirect(base_url().strtolower($this->session->userdata('directory')) . '/dashboard', 'refresh');
		// }

		if(isset($_GET['unsub'])){
		 $data['unsub'] = $_GET['unsub'];
		}
		if(isset($_GET['unsub_alert'])){
			$data['unsub_alert'] = $_GET['unsub_alert'];
			$data['brands_id'] = $_GET['brands_id'];
		}
		$data['users'] 			= '';
		$data['page_title'] 	= 'Home'; 
		$data['page_sub_title'] = '';
		$data['page_name'] 		= 'home';
		$this->load->view('home/index', $data);
		// $this->load->view('home/home');
	}
	/***** Home INDEX *********/
	
	/***** Home *********/
	public function home(){
		// if($this->session->userdata('login') != 1){
			 // redirect(base_url(), 'refresh');
		// }
		
		$get_page_id = $this->db->get_where('page_types', array('page_name'=>'Home'))->row()->page_types_id;
		
		$data['page_type_id'] 	= $get_page_id;
		$data['users'] 			= '';
		$data['page_title'] 	= 'Home';
		$data['page_sub_title'] = '';
		$data['page_name'] 		= 'home';
		$this->load->view('home/index', $data);
	}
	/***** Home *********/
	/***** Special brands *********/
	public function special_brands($page_name){
		$main_page = $page_name;
        if($page_name=='marken'){
           $this->brands();
		}
		// else if($page_name=='gutscheinfuralleadmin'){
		// 	redirect(base_url().'admin', 'refresh');
		// }
		
		else{
		$page_name_array = explode("-",$page_name);
		if(count($page_name_array) > 1){
		   $page_name = str_replace('-', ' ', $page_name);
		}
		$check_page = $this->db->get_where('brands_pages',array("name"=>$page_name,"status"=>"active"))->row();
		if(empty($check_page)){
			redirect(base_url(), 'refresh');
		}
		
		$get_page_id = $this->db->get_where('page_types', array('page_name'=>'Home'))->row()->page_types_id;
		$get_all_brands = $this->db->get_where('brands_pages_brands',array("brands_pages_id	"=>$check_page->brands_pages_id))->result_array();
		// echo json_encode($get_all_brands); exit;
		$data['get_all_brands'] 	= $get_all_brands;
		$data['brands_pages'] 	= $check_page;
		$data['main_page'] 	= $main_page;
		$data['users'] 			= '';
		$data['page_title'] 	= 'special_brands';
		$data['page_sub_title'] = '';
		$data['page_name'] 		= 'special_brands';
		$this->load->view('home/index', $data);
	 }
	}
	/***** Special brands *********/
	
	/***** Categories *********/
	public function categories($param1 = '', $param2 = '', $param3 = ''){
		if($param2=="go_to" || $param2=="Offer" || $param2=="Coupon" || $param2=="Deals" || $param2=="Free%20Shipping" || $param2=="Free%20Items"  ){
			redirect(base_url(), 'refresh');
		}
		$date= date("Y-m-d");
		$data['cates_query'] = "empty";
		$data['cates_query_limit'] = "empty";
		if(!empty($param1)){
			if(isset($_GET['name'])){
				$param3 = $_GET['name'];
			}
			
			if(isset($_GET['type'])){
				$param2 = $_GET['type'];
			}
			
			$this->db->where('categories_id', $param1);
			$cate_data = $this->db->get_where('categories', array('status'=>'Active'))->row();
			$data['category_name']     = $cate_data->name;
			$data['long_description']  = $cate_data->long_description;
			$data['param']             =  $param1;

			$this->db->where('categories_id', $param1);
			/* for redirecting pages on clicking copens*/
			$req_url = $_SERVER['REQUEST_URI'];
			$open_coupon = '';
			if (strpos($req_url,'coupon_id') !== false ) {
				$open_coupon = $_GET['coupon_id']; 
				$data['remove_phill']      =  'Yes'; 
				$data['open_coupon_id']    =  $open_coupon; 
			}
            else{
				$data['remove_phill']      = ""; 
				$data['open_coupon_id']    = ""; 
			}			
			
			/* for redirecting pages on clicking copens*/
			
			/* Pagination Start Here */
			$req_url = $_SERVER['REQUEST_URI'];
			$page_num = '';
			if (strpos($req_url,'page') !== false || strpos($req_url,'view_all') !== false) {
				$page_num = $_GET['page']; 
			}
			/* for multi tabs pagination */
				$coupons_type = '';
				$coupons_type_cond = '';
				if(strpos($req_url,'coupon_type') !== false){
					$coupons_type = $_GET['page'];
					if($coupons_type == 'offer'){
						$coupons_type_cond = " AND cpn.coupon_type = 'Offer' ";
					} else if($coupons_type == 'coupon'){
						$coupons_type_cond = " AND cpn.coupon_type = 'Coupon' ";
					}
				}
			/* for multi tabs pagination */
			// $page_num = $param2;
		    $page_limit_initial				=	$this->db->query("SELECT description FROM system_settings WHERE type='page_limit_initial'")->row()->description; 
			$total_page_limit_initial		=	$this->db->query("SELECT description FROM system_settings WHERE type='total_page_limit_initial'")->row()->description;	


			if(!empty($page_num) && $page_num != 'view_all'){
				if($page_num == 1){
					$limit = '0,'.$page_limit_initial;
				} else {
					$end_limit = $page_limit_initial;
					$start_limit = $page_num * $end_limit - $end_limit;
					$limit = $start_limit.','.$end_limit;
				}
			} else {
				$limit ='0,'.$page_limit_initial;
				$page_num=1;
				$limit = '0,'.$page_limit_initial;
			}
			  
							
			 if($param2=='Coupon' && $param3 == 'page'){
                 
        
				$data['just_coupons']			=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active'  AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.categories_id = '".$param1."' ".$coupons_type_cond."  ORDER BY cpn.coupon_type ASC  LIMIT $limit")->result_array();	

                $data['cates_query_limit'] = $this->db->last_query();

				$limit ='0,'.$page_limit_initial;
				$page_num=1;
				$limit = '0,'.$page_limit_initial;
				
				$data['all_offers']				=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Offer' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.cate_page_order ASC  LIMIT $limit")->result_array();
						
				$data['just_deals']			=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Deals' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.cate_page_order ASC  LIMIT $limit")->result_array();
				
				$data['just_shipping']	  	=  $this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Free Shipping' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.cate_page_order ASC LIMIT $limit")->result_array();
					
				$data['just_items']	  	=  $this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Free Items' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.cate_page_order ASC LIMIT $limit")->result_array();


			
				
				$page_num = $_GET['page'];

				$data['typo'] = "Coupon";

			}
			else if($param2=='Offer' && $param3 == 'page'){

                $data['all_offers']				=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Offer' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00')  AND cpn.categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.cate_page_order ASC  LIMIT $limit")->result_array();			

                $data['cates_query_limit'] = $this->db->last_query();

				$limit ='0,'.$page_limit_initial;
				$page_num=1;
				$limit = '0,'.$page_limit_initial;
				
				$data['just_coupons']			=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00')  AND cpn.categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.coupon_type ASC  LIMIT $limit")->result_array();
						
				$data['just_deals']			=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Deals' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00')  AND cpn.categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.cate_page_order ASC  LIMIT $limit")->result_array();
				
				$data['just_shipping']	  	=  $this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Free Shipping' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.cate_page_order ASC LIMIT $limit")->result_array();
					
				$data['just_items']	  	=  $this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Free Items' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.cate_page_order ASC LIMIT $limit")->result_array();
				
				$page_num = $_GET['page'];
 
				$data['typo'] = "Offer";

			}
			else if($param2=='Deals' && $param3 == 'page'){
                 
				$data['just_deals']			=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Deals' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.cate_page_order ASC  LIMIT $limit")->result_array();
						

                $data['cates_query_limit'] = $this->db->last_query();

				$limit ='0,'.$page_limit_initial;
				$page_num=1;
				$limit = '0,'.$page_limit_initial;
				
				$data['just_coupons']			=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active'  AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.coupon_type ASC LIMIT $limit")->result_array();
						
				$data['all_offers']				=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Offer' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.cate_page_order ASC  LIMIT $limit")->result_array();	
				
				$data['just_shipping']	  	=  $this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Free Shipping' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.cate_page_order ASC LIMIT $limit")->result_array();
					
				$data['just_items']	  	=  $this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Free Items'  AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.cate_page_order ASC LIMIT $limit")->result_array();

				$page_num = $_GET['page'];
                $data['typo'] = "Deals";
				

			}
			else if($param2=='Free%20Shipping' && $param3 == 'page'){
                 
				$data['just_shipping']	  	=  $this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Free Shipping' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.cate_page_order ASC LIMIT $limit")->result_array();
						

                $data['cates_query_limit'] = $this->db->last_query();

				$limit ='0,'.$page_limit_initial;
				$page_num=1;
				$limit = '0,'.$page_limit_initial;
				
				$data['just_coupons']			=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00')  AND cpn.categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.coupon_type ASC  LIMIT $limit")->result_array();
						
				$data['all_offers']				=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Offer' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.cate_page_order ASC  LIMIT $limit")->result_array();	
				
				$data['just_deals']			=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Deals' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.cate_page_order ASC  LIMIT $limit")->result_array();
					
				$data['just_items']	  	=  $this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Free Items'AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00')  AND cpn.categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.cate_page_order ASC LIMIT $limit")->result_array();

				$page_num = $_GET['page'];
                $data['typo'] = "Shipping";
				

			}
			else if($param2=='Free%20Items' && $param3 == 'page'){
                 
					
				$data['just_items']	  	=  $this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Free Items' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.cate_page_order ASC LIMIT $limit")->result_array();

                $data['cates_query_limit'] = $this->db->last_query();

				$limit ='0,'.$page_limit_initial;
				$page_num=1;
				$limit = '0,'.$page_limit_initial;
				
				$data['just_coupons']			=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active'  AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.coupon_type ASC  LIMIT $limit")->result_array();
						
				$data['all_offers']				=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Offer' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.cate_page_order ASC  LIMIT $limit")->result_array();	
				
				$data['just_deals']			=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Deals' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00')  AND cpn.categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.cate_page_order ASC  LIMIT $limit")->result_array();
					
				$data['just_shipping']	  	=  $this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Free Shipping' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.cate_page_order ASC LIMIT $limit")->result_array();

				$page_num = $_GET['page'];
                $data['typo'] = "Items";
				

			}
			else{
				$data['just_coupons']			=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.coupon_type ASC , brands_page_order ASC  LIMIT $limit")->result_array();	
             
                $data['cates_query_limit'] = $this->db->last_query();

				$data['all_offers']				=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Offer' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.cate_page_order ASC  LIMIT $limit")->result_array();
						
				$data['just_deals']			=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Deals' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00')  AND cpn.categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.cate_page_order ASC  LIMIT $limit")->result_array();
				
				$data['just_shipping']	  	=  $this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Free Shipping' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.cate_page_order ASC LIMIT $limit")->result_array();
					
				$data['just_items']	  	=  $this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Free Items' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.cate_page_order ASC LIMIT $limit")->result_array();

				$data['typo'] = "";
			}
			
			$data['page']	  	  			   	=  $page_num;
			$data['page_num']	  	  		   	=  $page_num;

			$data['total_coupons']	  	   		=  $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.categories_id = ".$param1." ".$coupons_type_cond." ")->num_rows();

			$data['count_coupons']	  	   		=  $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00')  AND cpn.categories_id = '".$param1."' ".$coupons_type_cond." ")->num_rows();	
			$data['total_offers']	  	   		= $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.coupon_type= 'Offer' AND cpn.categories_id = '".$param1."' ".$coupons_type_cond." ")->num_rows();
			$data['total_deals']	  	   	    = $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND coupon_type= 'Deals' AND cpn.categories_id = '".$param1."' ".$coupons_type_cond." ")->num_rows();
			$data['total_shipping']	  	   	    = $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND coupon_type= 'Free Shipping' AND cpn.categories_id = '".$param1."' ".$coupons_type_cond." ")->num_rows();
			$data['total_items']	  	   	    = $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND coupon_type= 'Free Items' AND cpn.categories_id = '".$param1."' ".$coupons_type_cond." ")->num_rows();
			
		
			$data['page_limit_initial']       	= $page_limit_initial;
			$data['total_page_limit_initial']   = $total_page_limit_initial;
		/* Pagination End Here */
		}                 
		 $get_categories = $this->db->order_by('sort_order')->get_where('categories', array('status'=>'Active'))->result_array(); 
		/* Get Top Section Info */
		$get_page_type_id = $this->db->get_where('page_types', array('page_name'=>'Categories'))->row()->page_types_id;
		$top_lef_info = $this->db->get_where('static_content', array('type'=>'top_left_info', 'page_types_id'=>$get_page_type_id))->row_array();
		$top_right_newsletter = $this->db->get_where('static_content', array('type'=>'top_right_newsletter', 'page_types_id'=>$get_page_type_id))->row_array();
		$data['top_lef_info'] 	= $top_lef_info;
		$data['top_right_newsletter'] 	= $top_right_newsletter;
		/* Get Top Section Info */
		
		$data['active_tab'] = 'Coupon';
		if($param2 == "Coupon" ){
			$data['active_tab'] = 'Coupon';
		}
		else if($param2 == "Offer" ){
			$data['active_tab'] = 'Offer';
		}
		else if($param2 == "Free%20Items" ){
			$data['active_tab'] = 'Free Items';
		}
		else if($param2 == "Free%20Shipping" ){
			$data['active_tab'] = 'Free Shipping';
		}
		else if($param2 == "Deals" ){
			$data['active_tab'] = 'Deals';
		}
		$data['categories_id'] = $param1; 
		$data['param1'] = $param1;
		$data['get_categories'] = $get_categories;
		$data['page_title'] 	= 'Categories';
		$data['page_sub_title'] = '';
		$data['page_name'] 		= 'categories';
		$this->load->view('home/index', $data);
      
	}
	/***** Categories *********/
	public function redirect(){
		
        $req_url = $_SERVER['REQUEST_URI'];
			$open_coupon = '';
			if (strpos($req_url,'coupon_id') !== false ) {
				$coupon_id = $_GET['coupon_id']; 
				$tag_line = $_GET['tag_line'];  
				$coupons_data = $this->db->get_where('coupons',array('coupons_id'=>$coupon_id))->row();			
				$brand_url   = $coupons_data->brand_redirect_url;
				redirect($brand_url, 'refresh');
			}
	}
	/***** Coupons *********/
	public function coupons($param1 = '', $param2 = '', $param3 = ''){
		$date= date("Y-m-d");
		$home_page_popular_coupon_limit = 0;
		$row_num = $this->db->get_where('system_settings',array('type'=>'row_num_popular_coupons'))->row()->description;
		$query_cond = '';
		if(!empty($param2)){
			$query_cond .= "AND cpn.coupons_id = '".$param2."'";
		}
		if($param1 == 'tips'){
			
			$query_cond .= "AND cpn.tips = '1' ORDER BY cpn.tips_order ASC";
		} else if($param1 == 'trending'){
			
			$query_cond .= "AND cpn.trending = '1' ORDER BY cpn.trending_order ASC";
		}
		else if($param1 == 'popular'){
			$home_page_popular_coupon_limit = $this->db->get_where('system_settings',array('type'=>'home_page_popular_coupon_limit'))->row()->description;
			$query_cond .= "AND cpn.popular_set = '1' GROUP BY cpn.coupons_id ORDER BY cpn.date_added DESC";
		} 
		else if($param1 == 'latest'){
			$query_cond .= "AND cpn.lastest_order  != '0' ORDER BY cpn.lastest_order ASC";
		}
		else if($param1 == 'cat'){
			$query_cond .= "AND cpn.categories_id = '".$param2."' ORDER BY cpn.coupons_id DESC";
		}
	    
		else if(!empty($param1) && $param1 != 'latest' && $param1 != 'tips' && $param1 != 'trending'){
			
			$query_cond = "AND cpn.coupons_id = '".$param1."' ORDER BY cpn.coupons_id DESC";
		}
		
		
		/* Pagination Start Here */
			$req_url = $_SERVER['REQUEST_URI'];
			$page_num = '';
			if (strpos($req_url,'page') !== false || strpos($req_url,'view_all') !== false) {
				$page_num = $_GET['page'];
			}
			// $page_num = $param2;
			/* $page_limit_initial				=	$this->db->query("SELECT description FROM system_settings WHERE type='page_limit_initial'")->row()->description; */
			$page_limit_initial				=	20;
			$total_page_limit_initial		=	$this->db->query("SELECT description FROM system_settings WHERE type='total_page_limit_initial'")->row()->description;	
			if(!empty($page_num) && $page_num != 'view_all'){
				if($page_num == 1){
					$limit = $home_page_popular_coupon_limit.','.$page_limit_initial;
				} else {
					$end_limit = $page_limit_initial;
					$start_limit = $page_num * $end_limit - $end_limit;
					$limit = ($start_limit+$home_page_popular_coupon_limit).','.$end_limit;
				}
			} else {
				$limit =$home_page_popular_coupon_limit.','.$page_limit_initial;
				$page_num=1;
				$limit = $home_page_popular_coupon_limit.','.$page_limit_initial;
				/* $data['all_coupons']	  	   	=  $this->db->query("select cpn.* , brand.name as brand_name, brand.brand_image as brand_image from coupons as cpn left join brands as brand ON FIND_IN_SET(brand.brands_id, cpn.brands_id) != 0 where cpn.status = 'Active' ".$query_cond." ORDER BY cpn.coupons_id DESC LIMIT $limit")->result_array(); */
				$data['all_coupons']	  	   	=  $this->db->query("select cpn.* , brand.name as brand_name, brand.brand_image as brand_image from coupons as cpn left join brands as brand ON FIND_IN_SET(brand.brands_id, cpn.brands_id) != 0 where cpn.status = 'Active' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') ".$query_cond." LIMIT $limit ")->result_array();
			}
			if($page_num == 'view_all'){

				$data['all_coupons']			=	$this->db->query("select cpn.* , brand.name as brand_name, brand.brand_image as brand_image from coupons as cpn left join brands as brand ON FIND_IN_SET(brand.brands_id, cpn.brands_id) != 0 where cpn.status = 'Active' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') ".$query_cond."  ")->result_array();
			} else {
				if(empty($param1) ){
			
					$data['all_coupons']			=	$this->db->query("select cpn.* , brand.name as brand_name, brand.brand_image as brand_image from coupons as cpn left join brands as brand ON FIND_IN_SET(brand.brands_id, cpn.brands_id) != 0 where cpn.status = 'Active' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') ".$query_cond." limit ".$row_num."")->result_array();
				}
                else{				
				
				$data['all_coupons']			=	$this->db->query("select cpn.* , brand.name as brand_name, brand.brand_image as brand_image from coupons as cpn left join brands as brand ON FIND_IN_SET(brand.brands_id, cpn.brands_id) != 0 where cpn.status = 'Active' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') ".$query_cond."  limit $limit")->result_array();
				}
			}

			$data['query']	                    = $this->db->last_query();
			$data['param1']	  	  			    =  $param1;
			$data['page']	  	  			   	=  $page_num;
			$data['page_num']	  	  		   	=  $page_num;
			$data['total_coupons']	  	   		=  $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active' AND  cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') ".$query_cond." ")->num_rows();
			$data['total_coupons'] -= $home_page_popular_coupon_limit;
			$data['page_limit_initial']       	= $page_limit_initial;
			$data['total_page_limit_initial']   = $total_page_limit_initial;
		/* Pagination End Here */
		/* Get Top Section Info */
	

		$get_page_type_id = $this->db->get_where('page_types', array('page_name'=>'Coupons'))->row()->page_types_id;
		if($param1=="popular"){
			$text_info = "top_left_info_popular";
		}
		else if($param1=="latest"){
			$text_info = "top_left_info_latest";
		}
		else if($param1=="trending"){
			$text_info = "top_left_info_trend";
		}
		else if($param1=="tips"){
			$text_info = "top_left_info_tips";
		}
		else{
			$text_info = "";
		}
		$top_lef_info = $this->db->get_where('static_content', array('type'=>$text_info, 'page_types_id'=>$get_page_type_id))->row_array();
	/* 	echo $this->db->last_query(); exit; */
		$top_right_newsletter = $this->db->get_where('static_content', array('type'=>'top_right_newsletter', 'page_types_id'=>$get_page_type_id))->row_array();
		$data['top_lef_info'] 	= $top_lef_info;
		$data['top_right_newsletter'] 	= $top_right_newsletter;
		/* Get Top Section Info */
	
		$static_upload_url = $this->db->get_where('system_settings',array('type'=>'static_content_img_url'))->row()->description;
		$data['f_param'] 	    = $param1;
		$data['param1'] 	    = $param1;
		$data['static_upload_url'] 	= $static_upload_url;
		$data['page_title'] 	= 'Coupons';
		$data['page_sub_title'] = '';
		$data['page_name'] 		= 'coupons';
		$this->load->view('home/index', $data);
	}
	/***** Coupons *********/
	/***** Brands *********/
	public function brands($brand_name="",$param1 = '', $param2 = '', $param3 = '', $param4 = ""){
        if($param1=="go_to" || $param1=="Offer" || $param1=="Coupon" || $param1=="Deals" || $param1=="Free%20Shipping" || $param1=="Free%20Items"  ){
			redirect(base_url(), 'refresh');
		}
		$main_page = $brand_name;
		$tabs_type = $param1;
		$pagination = $param2;
		
		// echo $pagination; exit;
	   
		$brand_name_array = explode("-",$brand_name);
		if(count($brand_name_array) > 1){
		   $brand_name = str_replace('-', ' ', $brand_name);
		}
	
		// echo $brand_name; exit;
		if($brand_name!="letter" && !empty($brand_name)){
			$brands_detailss =  $this->db->get_where('brands',array('name'=>$brand_name));
			if($brands_detailss->num_rows() == 0){
				redirect(base_url(),'marken', 'refresh');
			}
			$data['thisBrand'] = $brands_detailss->row()->brands_id;
			$param4 =  $param1;
			$param1	 = $brands_detailss->row()->brands_id;
			
		}
		else{
			$param2 = $param1;
			$param1 = $brand_name;
		}

		if(isset($_GET['type'])){
			$tabs_type = $_GET['type'];
			$param4 =  $_GET['type'];
		}
	
		if(isset($_GET['name'])){
			$pagination = $_GET['name'];
		}
		

		// echo $param1; exit;
		/* for redirecting pages on clicking copens*/
			$req_url = $_SERVER['REQUEST_URI'];
			$open_coupon = '';
			if (strpos($req_url,'coupon_id') !== false ) {
				$open_coupon = $_GET['coupon_id']; 
				$data['remove_phill']      =  'Yes'; 
				$data['open_coupon_id']    =  $open_coupon; 
			}
			else if (strpos($req_url,'show_brand') !== false ) {
				$open_brands = $_GET['show_brand']; 
				$data['remove_phill']       =  'OK'; 
				$data['open_coupon_id']    =  base64_decode($open_brands); 
			}
            else{
				$data['remove_phill']      = ""; 
				$data['open_coupon_id']    = ""; 

			}			
			
		/* for redirecting pages on clicking copens*/
		$where_cond = '';
		$brands_array = array();
		if(!empty($param1) && $param1 != 'letter'){
			
			$where_cond = " AND brands_id = '".$param1."' ";
			$brands_array = $this->db->query("SELECT * FROM  brands WHERE 1=1 ".$where_cond." AND status = 'Active'  ORDER BY brands_id DESC ")->row_array();
			$date= date("Y-m-d") ;
			//print_r($date); exit;
			
			$get_coupons = $this->db->query("SELECT * FROM `coupons` WHERE FIND_IN_SET('$param1', `brands_id`) != 0 AND `status` = 'Active' AND start_date <= '".date('Y-m-d')."' AND (end_date >= '".$date."' OR end_date = '0000-00-00') ORDER BY coupons_id DESC")->result_array();
			$data['all_coupons'] 	= $get_coupons;

			
			// echo $this->db->last_query(); exit;
		
			$data['page_type'] 	= 'by_id';
			$data['brand_id'] 	= $param2;
			/* Pagination Start Here */
				$req_url = $_SERVER['REQUEST_URI'];
				$page_num = '';
				if (strpos($req_url,'page') !== false || strpos($req_url,'view_all') !== false) {
					$page_num = $_GET['page'];
				}
				/* for multi tabs pagination */
				$coupons_type = '';
				$coupons_type_cond = '';
				if(strpos($req_url,'coupon_type') !== false){
					$coupons_type = $_GET['page'];
					if($coupons_type == 'offer'){
						$coupons_type_cond = " AND cpn.coupon_type = 'Offer' ";
					} else if($coupons_type == 'coupon'){
						$coupons_type_cond = " AND cpn.coupon_type = 'Coupon' ";
					}
				}
				/* for multi tabs pagination */
				// $page_num = $param2;
		
				$page_limit_initial				=	$this->db->query("SELECT description FROM system_settings WHERE type='page_limit_initial'")->row()->description; 
				$total_page_limit_initial		=	$this->db->query("SELECT description FROM system_settings WHERE type='total_page_limit_initial'")->row()->description;	
				if(!empty($page_num) && $page_num != 'view_all'){
					if($page_num == 1){
						$limit = '0,'.$page_limit_initial;
					} else {
						$end_limit = $page_limit_initial;
						$start_limit = $page_num * $end_limit - $end_limit;
						$limit = $start_limit.','.$end_limit;
					}
				} 
				
				else {
					$limit ='0,'.$page_limit_initial;
					$page_num=1;
					$limit = '0,'.$page_limit_initial;	
				}
				
				$data['just_coupons']		=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active'   AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ORDER BY cpn.coupons_id DESC LIMIT $limit")->result_array();
	 

				$data['all_offers']			=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Offer' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00')  AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ORDER BY cpn.brands_page_order ASC LIMIT $limit")->result_array();

				$data['just_deals']		=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active'  AND cpn.coupon_type= 'Deals' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00')  AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ORDER BY cpn.brands_page_order ASC LIMIT $limit")->result_array();
				
				$data['just_shipping']		=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active'  AND cpn.coupon_type= 'Free Shipping' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ORDER BY cpn.brands_page_order ASC LIMIT $limit")->result_array();
				
				$data['just_items']		=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active'  AND cpn.coupon_type= 'Free Items' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00')  AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ORDER BY cpn.brands_page_order ASC LIMIT $limit")->result_array();
				
				$data['typo'] = "";
  
				if($tabs_type=='Coupon' && $pagination == 'page'){
                    
					$data['just_coupons']		=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active'  AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ORDER BY cpn.brands_page_order ASC,cpn.coupon_type LIMIT $limit")->result_array();



					$limit ='0,'.$page_limit_initial;
					$page_num=1;
					$limit = '0,'.$page_limit_initial;	
					
					$data['all_offers']			=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Offer' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00')   AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ORDER BY cpn.brands_page_order ASC LIMIT $limit")->result_array();
                    //   echo $this->db->last_query(); exit;
					$data['just_deals']		=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active'  AND cpn.coupon_type= 'Deals' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00')  AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ORDER BY cpn.brands_page_order ASC LIMIT $limit")->result_array();
					
					$data['just_shipping']		=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active'  AND cpn.coupon_type= 'Free Shipping' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ORDER BY cpn.brands_page_order ASC LIMIT $limit")->result_array();
					
					$data['just_items']		=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active'  AND cpn.coupon_type= 'Free Items' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ORDER BY cpn.brands_page_order ASC LIMIT $limit")->result_array();

					$page_num = $_GET['page'];
					$data['typo'] = "Coupon";

				}
           
				if($tabs_type=='Offer' && $pagination == 'page'){
                    
					$data['all_offers']			=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Offer'  AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ORDER BY cpn.coupons_id DESC LIMIT $limit")->result_array();

		
					$limit ='0,'.$page_limit_initial;
					$page_num=1;
					$limit = '0,'.$page_limit_initial;	
					
					$data['just_coupons']		=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active'   AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ORDER BY cpn.coupon_type ASC LIMIT $limit")->result_array();


					$data['just_deals']		=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active'  AND cpn.coupon_type= 'Deals' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ORDER BY cpn.brands_page_order ASC LIMIT $limit")->result_array();
					
					$data['just_shipping']		=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active'  AND cpn.coupon_type= 'Free Shipping' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00')  AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ORDER BY cpn.brands_page_order ASC LIMIT $limit")->result_array();
					
					$data['just_items']		=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active'  AND cpn.coupon_type= 'Free Items' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ORDER BY cpn.brands_page_order ASC LIMIT $limit")->result_array();

					$page_num = $_GET['page'];

					$data['typo'] = "Offer";


				} 

				if($tabs_type=='Deals' && $pagination == 'page'){
                    
					
                    $data['just_deals']		=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active'  AND cpn.coupon_type= 'Deals' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ORDER BY cpn.brands_page_order ASC LIMIT $limit")->result_array();
					
				


					$limit ='0,'.$page_limit_initial;
					$page_num=1;
					$limit = '0,'.$page_limit_initial;	
					
					$data['just_coupons']		=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active'   AND cpn.end_date >= '".$date."' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ORDER BY cpn.brands_page_order ASC,cpn.coupon_type LIMIT $limit")->result_array();
	
                    
					$data['all_offers']			=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Offer' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00')  AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ORDER BY cpn.brands_page_order ASC LIMIT $limit")->result_array();

					
					
					$data['just_shipping']		=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active'  AND cpn.coupon_type= 'Free Shipping' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00')  AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ORDER BY cpn.brands_page_order ASC LIMIT $limit")->result_array();
					
					$data['just_items']		=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active'  AND cpn.coupon_type= 'Free Items'AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00')  AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ORDER BY cpn.brands_page_order ASC LIMIT $limit")->result_array();

					$page_num = $_GET['page'];
                    $data['typo'] = "Deals";

				} 

				if($tabs_type=='Free%20Shipping' && $pagination == 'page'){
                    
					
                    
					$data['just_shipping']		=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active'  AND cpn.coupon_type= 'Free Shipping' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ORDER BY cpn.brands_page_order ASC LIMIT $limit")->result_array();


 

					$limit ='0,'.$page_limit_initial;
					$page_num=1;
					$limit = '0,'.$page_limit_initial;	
					
					$data['just_coupons']		=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active'   AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ORDER BY cpn.brands_page_order ASC,cpn.coupon_type LIMIT $limit")->result_array();
	
                    
					$data['all_offers']			=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Offer' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00')   AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ORDER BY cpn.brands_page_order ASC LIMIT $limit")->result_array();

					$data['just_deals']		=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active'  AND cpn.coupon_type= 'Deals' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00')  AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ORDER BY cpn.brands_page_order ASC LIMIT $limit")->result_array();
					
					
					
					$data['just_items']		=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active'  AND cpn.coupon_type= 'Free Items' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00')  AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ORDER BY cpn.brands_page_order ASC LIMIT $limit")->result_array();


					$page_num = $_GET['page'];
					$data['typo'] = "Shipping";


				} 

				if($tabs_type=='Free%20Items' && $pagination == 'page'){
                    
					$data['just_items']		=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active'  AND cpn.coupon_type= 'Free Items' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00')  AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ORDER BY cpn.brands_page_order ASC LIMIT $limit")->result_array();
                    
					

 

					$limit ='0,'.$page_limit_initial;
					$page_num=1;
					$limit = '0,'.$page_limit_initial;	
					
					$data['just_coupons']		=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active'   AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ORDER BY cpn.brands_page_order ASC,cpn.coupon_type LIMIT $limit")->result_array();
    
					$data['all_offers']			=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Offer' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00')  AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ORDER BY cpn.brands_page_order ASC LIMIT $limit")->result_array();

					$data['just_deals']		=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active'  AND cpn.coupon_type= 'Deals' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00')  AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ORDER BY cpn.brands_page_order ASC LIMIT $limit")->result_array();
					
					$data['just_shipping']		=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active'  AND cpn.coupon_type= 'Free Shipping' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00')  AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ORDER BY cpn.brands_page_order ASC LIMIT $limit")->result_array();
					
					$page_num = $_GET['page'];
					$data['typo'] = "Items";
					


				}

			//	print_r($data['just_coupons']); exit;
				$data['page']	  	  			=  $page_num;
				$data['page_num']	  	  		=  $page_num;
				$data['total_coupons']	  	   	=  $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active'  AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND  FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ")->num_rows();
				
				$data['count_coupons']	  	   	=  $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active'  AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ")->num_rows();	
				$data['total_offers']	  	   	= $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active' AND coupon_type= 'Offer' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ")->num_rows();
				$data['total_deals']	  	   	= $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active' AND coupon_type= 'Deals' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ")->num_rows();
				$data['total_shipping']	  	   	= $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active' AND coupon_type= 'Free Shipping' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ")->num_rows();
				$data['total_items']	  	   	= $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active' AND coupon_type= 'Free Items' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND FIND_IN_SET('".$param1."', cpn.brands_id) != 0 ".$coupons_type_cond." ")->num_rows();
				$data['page_limit_initial']     = $page_limit_initial;
				$data['total_page_limit_initial']  = $total_page_limit_initial;
			/* Pagination End Here */

		} else if(empty($param1)){
		
			$numeric_array = array('0','1','2','3','4','5','6','7','8','9');
			$alphabet_array = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
			foreach($alphabet_array as $key=>$value){					
				$group_alphabet = $this->db->query("SELECT * FROM  brands WHERE status = 'Active' AND sub_brand != '1'  AND name LIKE '".$value."%' ".$where_cond." ORDER BY brands_id DESC LIMIT 18");
				if($group_alphabet->num_rows() >= 1){
					$brands_array[$value] = $group_alphabet->result_array();
				}
			}
			$array_test = array();
			foreach($numeric_array as $key=>$value){					
				$group_alphabet = $this->db->query("SELECT * FROM  brands WHERE status = 'Active' AND sub_brand != '1'  AND name LIKE '".$value."%' ".$where_cond." ORDER BY brands_id DESC LIMIT 18");
				$numerical_record = $group_alphabet->result_array();
				foreach($numerical_record as $num_record){
					array_push($array_test,$num_record);
				}
			    
				// if($group_alphabet->num_rows() >= 1){
					
				
				// }
			}
			$brands_array['0-9'] = $array_test;
		// echo "<pre> sss";
		// print_r($brands_array['0-9']);
		// echo "</pre>"; exit;
	 
			$data['page_type'] 	= 'by_all';
		} else if(!empty($param1) && $param1 == 'letter' && !empty($param2)){
		
			if($param2 == '0-9'){
				$numeric_array = array('0','1','2','3','4','5','6','7','8','9');
				$array_temp = array();
				foreach($numeric_array as $key=>$value){					
					$group_alphabet = $this->db->query("SELECT * FROM  brands WHERE status = 'Active' AND name LIKE '".$value."%' ".$where_cond." AND sub_brand='0' ORDER BY brands_id DESC LIMIT 18");
					if($group_alphabet->num_rows() >= 1){
						foreach($group_alphabet->result_array() as $key_sec=>$value_sec){
							array_push($array_temp, $value_sec);
						}
					}
				}
				$brands_array['0-9'] = $array_temp;
			} else {
				$group_alphabet = $this->db->query("SELECT * FROM  brands WHERE status = 'Active' AND name LIKE '".$param2."%' AND sub_brand='0' ORDER BY brands_id DESC ");
				if($group_alphabet->num_rows() >= 1){
					$brands_array[$param2] = $group_alphabet->result_array();
				}
			}
			$data['page_type'] 	= 'by_letter';
			$data['letter'] 	= $param2;
		}
	 
	    if($param2=="activated"){
		  $data['alert_active'] = $param2;	
		}
		 if($param2=="unsuscribed"){
		  $data['unsuscribed_alert'] = $param2;	
		}

		$data['active_tab'] = 'Coupon';
		
		if($param4 == "Coupon" ){
			$data['active_tab'] = 'Coupon';
		}
		else if($param4 == "Offer" ){
			$data['active_tab'] = 'Offer';
		}
	
		else if($param4 == "Free Items" ){
			$data['active_tab'] = 'Free Items';
		}
		else if($param4 == "Free Shipping" ){
			$data['active_tab'] = 'Free Shipping';
		}
		else if($param4 == "Deals" ){
			$data['active_tab'] = 'Deals';
		}
		
		
		if($param2 == "Coupon" ){
			$data['active_tab'] = 'Coupon';
		}
		else if($param2 == "Offer" ){
			$data['active_tab'] = 'Offer';
		}
		else if($param2 == "Free%20Items" ){
			$data['active_tab'] = 'Free Items';
		}
		else if($param2 == "Free%20Shipping" ){
			$data['active_tab'] = 'Free Shipping';
		}
		else if($param2 == "Deals" ){
			$data['active_tab'] = 'Deals';
		}
		/* Get Top Section Info */
		

		$get_page_type_id = $this->db->get_where('page_types', array('page_name'=>'Brands'))->row()->page_types_id;
		$top_lef_info = $this->db->get_where('static_content', array('type'=>'top_left_info', 'page_types_id'=>$get_page_type_id))->row_array();
		$top_right_newsletter = $this->db->get_where('static_content', array('type'=>'top_right_newsletter', 'page_types_id'=>$get_page_type_id))->row_array();
		$data['top_lef_info'] 	= $top_lef_info;
		$data['top_right_newsletter'] 	= $top_right_newsletter;
		/* Get Top Section Info */
		
		$data['alert_position'] = $this->db->get_where('system_settings',array('type'=>'brand_page_alert_position'))->row()->description;
		if(!empty($_GET['type'])){
			$param4 = $_GET['type'];
		} 
		if(!empty($_GET['coupons_id'])){
			$param2 = $_GET['coupons_id'];
		}
	
		$data['main_page'] 	    = $main_page;
		$data['param1'] 	    = $param1;
		$data['brandss_id'] 	= $param1;
		$data['param2'] 	    = $param2;
		$data['param3'] 	    = $param3;
		$data['param4'] 	    = $param4;
		// echo $data['param4']; exit;
		// echo "<pre>";
		// print_r($brands_array['0-9']);
		// echo "</pre>"; exit;
 		$data['all_brands'] 	= $brands_array;
		$data['page_title'] 	= 'Brands';
		$data['page_sub_title'] = '';
		$data['page_name'] 		= 'brands';
		$this->load->view('home/index', $data);
	}
	/***** Brands *********/
	
	 function check_box_filter($param1=""){
		$date= date("Y-m-d") ;
	 	
		if($param1=="filter_brands"){
			$alert_position = $this->db->get_where('system_settings',array('type'=>'brand_page_alert_position'))->row()->description;
			$remove_phill="";
			$existing = "";
			$new      = "";
			$redemtion   = $this->input->post('cateID');
	
			$brand_id = $this->input->post('brand_id');
            if(!empty($redemtion)){
			$countt = count($redemtion);			
			if($countt=="1"){
				if($redemtion[0]=="Existing"){
					$existing="checked";
				 }
				 else if($redemtion[0]=="New"){
					$new="checked";
				}
			}
			else if($countt=="2"){
			
					$existing="checked";			
				    $new="checked";
		
			}
		   }
		   else{
			$existing=""; 
			$new="";
		   }
		      $redem_con = '';
		      if(!empty($redemtion)){
				$redemtion = implode(', ', $redemtion);
				$redem_con = "AND `redemption_type` IN ('$redemtion')";
			  }
		     

			$just_coupons_data = $this->db->query("SELECT * FROM `coupons` WHERE FIND_IN_SET('$brand_id', `brands_id`) != 0 AND `status` = 'Active' AND start_date <= '".date('Y-m-d')."' AND (`end_date` >= '$date' OR `end_date` = '0000-00-00') $redem_con ORDER BY `coupon_type` ASC , `brands_page_order` ASC");
	       
			$just_offers_data = $this->db->query("SELECT * FROM `coupons` WHERE FIND_IN_SET('$brand_id', `brands_id`) != 0 AND `status` = 'Active' AND `coupon_type` = 'Offer' AND start_date <= '".date('Y-m-d')."' AND (`end_date` >= '$date' OR `end_date` = '0000-00-00') $redem_con ORDER BY `brands_page_order` ASC");

			$just_free_data  = $this->db->query("SELECT * FROM `coupons` WHERE  FIND_IN_SET('$brand_id', `brands_id`) != 0 AND `status` = 'Active' AND `coupon_type` = 'Free Items' AND start_date <= '".date('Y-m-d')."' AND (`end_date` >= '$date' OR `end_date` = '0000-00-00') $redem_con
		     ORDER	BY `brands_page_order` ASC");
	
            $just_deals_data  =  $this->db->query("SELECT * FROM `coupons` WHERE FIND_IN_SET('$brand_id', `brands_id`) != 0 AND `status` = 'Active' AND `coupon_type` = 'Deals' AND start_date <= '".date('Y-m-d')."' AND (`end_date` >= '$date' OR `end_date` = '0000-00-00') $redem_con
			ORDER	BY `brands_page_order` ASC");

			$just_shipping_data  = $this->db->query("SELECT * FROM `coupons` WHERE FIND_IN_SET('$brand_id', `brands_id`) != 0 AND `status` = 'Active' AND `coupon_type` = 'Free Shipping' AND start_date <= '".date('Y-m-d')."' AND (`end_date` >= '$date' OR `end_date` = '0000-00-00') $redem_con
			ORDER	BY `brands_page_order` ASC");

			$just_coupons      = $just_coupons_data->result_array();
			$just_offers       = $just_offers_data->result_array();
			$just_free         = $just_free_data->result_array();
			$just_deals        = $just_deals_data->result_array();
			$just_shipping     = $just_shipping_data->result_array();

			$count_coupons     = $just_coupons_data->num_rows();
			$total_offers      = $just_offers_data->num_rows();
			$total_items       = $just_free_data->num_rows();
			$total_deals       = $just_deals_data->num_rows();
			$total_shipping    = $just_shipping_data->num_rows();


			
			/* $response['result'] = $get_coupons; */
			
			//print_r($response); exit;
            $data_html = '';
            $data_html.= '<ul class="nav nav-tabs tabs_filter alignment-grid"> ';
            $data_html.= ' <li class="active li_items li-1st"><a data-toggle="tab" class="filter second-width" href="#coupons">Gutscheincode <b class="bold_counter">('.$count_coupons.')</b></a></li>';
            $data_html.= ' <li class=" li_items"><a data-toggle="tab" class="filter" href="#offers">Rabatt <b class="bold_counter">('.$total_offers.')</b></a></li>';
            $data_html.= ' <li class="li_items"><a data-toggle="tab" class="filter" href="#deals">Angebote<b class="bold_counter">('.$total_deals.')</b></a></li>';
            $data_html.= ' <li class=" li_items"><a data-toggle="tab" class="filter" href="#shipping" ">Kostenloser Versand<b class="bold_counter">('.$total_shipping.')</b></a></li>';
            $data_html.= ' <li class="  li_items"><a data-toggle="tab" class="filter" href="#items">Kostenlose Artikel<b class="bold_counter">('.$total_items.')</b></a></li>';
            
             $data_html.= '</ul>';
             $data_html.= '<div style="display:none;" class="show-redem">';
             $data_html.= '<div class="cs-filter-title">';
             $data_html.= '<font style="vertical-align: inherit;">';
             $data_html.= '<font style="vertical-align: inherit;">Einlösungsart</font> ';
             $data_html.= '</font> ';
             $data_html.= '</div> ';
             $data_html.= '<ul id="" class="cs-filter-ul cs-filter-scroll" > ';
             $data_html.= '<li class="cs-filter-li"> ';
             $data_html.= '<input class="cs-filter-input checkbox" '.$existing.' date-type="mobile" name="check_filter_mob" data-brandid="'.$brand_id.'" data-cateId="" type="checkbox" id="Existing"  data-checkId="Existing"> ';
             $data_html.= '<label class="cs-filter-label" for="Existing"> ';
             $data_html.= '<font style="vertical-align: inherit;"> ';
             $data_html.= '<font style="vertical-align: inherit;">Bestehender Kunde</font> ';
             $data_html.= '</font> ';
             $data_html.= '</label> ';
             $data_html.= '</li>';
             $data_html.= '<li class="cs-filter-li">';
             $data_html.= '<input class="cs-filter-input checkbox" date-type="mobile" name="check_filter_mob" data-brandid="'.$brand_id.'" data-cateId="" type="checkbox" id="New" '.$new.'  data-checkId="New">';
             $data_html.= '<label class="cs-filter-label" for="New">';
             $data_html.= '<font style="vertical-align: inherit;">';
             $data_html.= '<font style="vertical-align: inherit;">Neukunde</font>';
             $data_html.= '</font>';
             $data_html.= '</label>';
             $data_html.= '</li>';
             $data_html.= '</ul>';
             $data_html.= '</div>';		   
            
            $data_html.= ' <div class="tab-content" style="padding-top: 10px;">';
            $data_html.= '  <div id="coupons" class="tab-pane fadein active">';
			 if(!empty($just_coupons)){											
			foreach($just_coupons as $key => $coupons){
				$category_id = $coupons['categories_id'];
				$category_details = $this->db->get_where('categories', array('categories_id'=>$category_id))->row_array();
				$cat_image = $category_details['cat_image'];
				$cat_name = $category_details['name'];
				$brand_name = $this->db->get_where('brands',array('brands_id'=>$coupons['brands_id']))->row()->name;
				if($coupons['discount_type']=="Percentage"){
					$sign = "%";
				}
				else if($coupons['discount_type']=="Fixed"){
					$sign = "&euro;";
				}
				if(empty($coupons['coupon_code'])){
					$code_text = "No code needed!"; 
				}
				else{
					$code_text = $coupons['coupon_code']; 
				}
			
            	if(!empty($coupons['special_text']) && $key!="0"){ $margin = "margin-top: 30px;"; } else{ $margin = ''; }

            $data_html.= ' <div class="cs-coupon-box cs-coupon-merchant js-fp" style="'.$margin .'" id="'.$coupons['coupons_id'].'">';
            $data_html.= '  <div class="cs-flex cs-flex-mobil cs-outer-coupon coupons_padd" >';
            $data_html.= '   <div class="cs-coupon-box-cell-1  cs-flex cs-flex-mobil coupon_click" data-page="brands" data-coupon = "'.$coupons['coupon_type'].'" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">';
            $data_html.= '    <div class="cs-coupon-logo cs-flex cs-flex-mobil">';
            $data_html.= '     <div class="cs-coupon-logo-line-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$coupons['discount_value'].$sign.'</font></font></div>';
            $data_html.= '      <div class="cs-coupon-logo-line-3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Rabatt</font></font></div>';
            $data_html.= '      </div>';
            $data_html.= '    </div>';
            $data_html.= '    <div class="cs-coupon-box-cell-2 cs-flex">';
            $data_html.= '     <div class="cs-coupon-box-description cs-coupon-box-h3">';
            $data_html.= '      <font style="vertical-align: inherit;">';
            $data_html.= '       <font style="vertical-align: inherit;">'.$coupons['short_tagline'].'';
            $data_html.= '       </font>';
            $data_html.= '      </font>';
            $data_html.= '     </div>';
            $data_html.= '     <div class="coupon_on_ss"  style="width: 44%;padding-left: 2%;">';
			
            $data_html.= '     <div class="cs-coupon-small-info bg_grey_dark show_code_div" style="background: #fff !important;">'; 
			    if(empty($coupons['coupon_code'])){
																			
				    if($remove_phill!="Yes"){
            $data_html.= '     <div class="cs-modal-cta-wrapper coupon_click" data-page="brands" data-coupon = "'. $coupons['coupon_type'].'" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">'; 
            $data_html.= '     <div class="cs-coupon-btn " title="Visit the  homepage" style="cursor: pointer;">'; 
            $data_html.= '     <div  class="coupon-btn-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'; 
            $data_html.= '     <i class="fa fa-euro"></i>'; 
            $data_html.= '     <span> Gutschein anzeigen</span>'; 
            $data_html.= '     </font></font><i class="fa fa-chevron-right" aria-hidden="true"></i>'; 
            $data_html.= '     </div>'; 
            $data_html.= '     </div>'; 
            $data_html.= '     </div>'; 
			        }
					else{
            $data_html.= '      <button class="new_peal_btn coupon_click" data-page="brands" data-tag="'.$coupons['short_tagline'].'" data-coupon = "'.$coupons['coupon_type'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">'; 
            $data_html.= '     <span class="peal_btn_block">'; 
			$data_html.= '   <i class="fa fa-euro"></i>'; 
            $data_html.= '     <span class="show_code_cover"><i class="fa fa-euro"></i><span> Gutschein anzeigen</span></span>'; 
            $data_html.= '     <span class="back_code '.$coupons['coupons_id'].'" > '.$code_text.' </span>'; 
            $data_html.= '     </span>'; 
            $data_html.= '     </button>'; 
			         }
			         }
					 else{             
            $data_html.= '   <button class="new_peal_btn coupon_click" data-coupon = "'.$coupons['coupon_type'].'"  data-page="brands" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">'; 
            $data_html.= '   <span class="peal_btn_block">'; 
            $data_html.= '   <i class="fa fa-euro"></i>'; 
			
            $data_html.= '   <span class="show_code_cover rrrr"><i class="fa fa-euro"></i><span> Gutschein anzeigen</span></span>'; 
            $data_html.= '   <span class="back_code '.$coupons['coupons_id'].'"> '.$code_text.' </span>'; 
            $data_html.= '   </span>'; 
            $data_html.= '   </button>'; 
                    }
            $data_html.= '   </div>'; 
            $data_html.= '   </div>'; 
			 if(isset($coupons['special_text'])){
            $data_html.= '   <div class="best_title_f">'.$coupons['special_text'].'</div>'; 
			}
            $data_html.= '   </div>'; 
            $data_html.= '   </div>'; 

            $data_html.= '   <div class="cs-coupon-more-details">'; 
			$data_html.= '   <div class="js-toggle-container">'; 
			$data_html.= '   <div class="cs-toggle-content">'; 
            $data_html.= '   <font style="vertical-align: inherit;">'; 
            $data_html.= '   <font style="vertical-align: inherit;">'.$coupons['description'].'</font>'; 
            $data_html.= '   </font>'; 
            $data_html.= '   </div>'; 
            $data_html.= '   <div class="cs-coupon-box-date cs-sub-info-text cs-text-no-break">'; 
			
			if($coupons['min_order_price'] > 0 && !empty($coupons['min_order_price']) && $coupons['min_order_price'] != null){ 
            $data_html.= '   <span class="">'; 
            $data_html.= '   <font style="vertical-align: inherit;">'; 
            $data_html.= '   <font style="vertical-align: inherit;position: absolute;left: 59%;"  class="left-setting-c"><span class="minimum-setting">Mindest </span>bestellwert  : '.$coupons['min_order_price'].'&euro; </font>'; 
            $data_html.= '   </font>'; 
            $data_html.= '   </span>'; 
			}
			$data_html.= '     <span>';
			if($coupons['end_date']=='0000-00-00'){
			$data_html.= '     <i class="fa fa-clock-o" style="color: transparent;" aria-hidden="true"></i> ';
			}
			else{
				$data_html.= ' <i class="fa fa-clock-o" aria-hidden="true"></i> ';
			}
			
			if($coupons['end_date']!='0000-00-00'){ 
			$data_html.= '     <font style="vertical-align: inherit;">Läuft ab: '.date('m/d/Y',strtotime($coupons['end_date'])).'</font>';
		    }

			$data_html.= '     </span>';
         

            $data_html.= '   </div>'; 
            $data_html.= '   </div>'; 


            $data_html.= '   </div>'; 
            $data_html.= '   </div>'; 
			 }
				} else{
            $data_html.= '   <div class="cs-coupon-box cs-coupon-category " style="display: flex;justify-content: center;font-size: 14px;">'; 
            $data_html.= '   <div class="cs-coupon-more-details">'; 
            $data_html.= '   Keine Gutscheine verfügbar'; 
            $data_html.= '   </div>'; 
            $data_html.= '   </div>'; 
			}
            $data_html.= '   </div>'; 
			
			$data_html.= '  <div id="offers" class="tab-pane">';
			 if(!empty($just_offers)){											
			foreach($just_offers as $key => $coupons){
				$category_id = $coupons['categories_id'];
				$category_details = $this->db->get_where('categories', array('categories_id'=>$category_id))->row_array();
				$cat_image = $category_details['cat_image'];
				$cat_name = $category_details['name'];
				
				if($coupons['discount_type']=="Percentage"){
					$sign = "%";
				}
				else if($coupons['discount_type']=="Fixed"){
					$sign = "&euro;";
				}
				if(empty($coupons['coupon_code'])){
					$code_text = "No code needed!"; 
				}
				else{
					$code_text = $coupons['coupon_code']; 
				}
            	if(!empty($coupons['special_text']) && $key!="0"){ $margin = "margin-top: 30px;"; } else{ $margin = ''; }

            $data_html.= ' <div class="cs-coupon-box cs-coupon-merchant js-fp" style="'.$margin .'" id="'.$coupons['coupons_id'].'">';
            $data_html.= '  <div class="cs-flex cs-flex-mobil cs-outer-coupon coupons_padd" >';
            $data_html.= '   <div class="cs-coupon-box-cell-1  cs-flex cs-flex-mobil coupon_click" data-page="brands" data-coupon = "'.$coupons['coupon_type'].'" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">';
            $data_html.= '    <div class="cs-coupon-logo cs-flex cs-flex-mobil">';
            $data_html.= '     <div class="cs-coupon-logo-line-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$coupons['discount_value'].$sign.'</font></font></div>';
            $data_html.= '      <div class="cs-coupon-logo-line-3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Rabatt</font></font></div>';
            $data_html.= '      </div>';
            $data_html.= '    </div>';
            $data_html.= '    <div class="cs-coupon-box-cell-2 cs-flex">';
            $data_html.= '     <div class="cs-coupon-box-description cs-coupon-box-h3">';
            $data_html.= '      <font style="vertical-align: inherit;">';
            $data_html.= '       <font style="vertical-align: inherit;">'.$coupons['short_tagline'].'';
            $data_html.= '       </font>';
            $data_html.= '      </font>';
            $data_html.= '     </div>';
            $data_html.= '     <div class="coupon_on_ss"  style="width: 44%;padding-left: 2%;">';

            $data_html.= '     <div class="cs-coupon-small-info bg_grey_dark show_code_div" style="background: #fff !important;">'; 
			    if(empty($coupons['coupon_code'])){
																			
				    if($remove_phill!="Yes"){
            $data_html.= '     <div class="cs-modal-cta-wrapper coupon_click" data-page="brands" data-coupon = "'. $coupons['coupon_type'].'" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">'; 
            $data_html.= '     <div class="cs-coupon-btn " title="Visit the  homepage" style="cursor: pointer;">'; 
            $data_html.= '     <div  class="coupon-btn-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'; 
            $data_html.= '     <i class="fa fa-euro"></i>'; 
            $data_html.= '     <span> Gutschein anzeigen</span>'; 
            $data_html.= '     </font></font><i class="fa fa-chevron-right" aria-hidden="true"></i>'; 
            $data_html.= '     </div>'; 
            $data_html.= '     </div>'; 
            $data_html.= '     </div>'; 
			        }
					else{
            $data_html.= '      <button class="new_peal_btn coupon_click" data-page="brands" data-tag="'.$coupons['short_tagline'].'" data-coupon = "'.$coupons['coupon_type'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">'; 
            $data_html.= '     <span class="peal_btn_block">'; 
			$data_html.= '   <i class="fa fa-euro"></i>'; 
            $data_html.= '     <span class="show_code_cover"><i class="fa fa-euro"></i><span> Gutschein anzeigen</span></span>'; 
            $data_html.= '     <span class="back_code '.$coupons['coupons_id'].'" > '.$code_text.' </span>'; 
            $data_html.= '     </span>'; 
            $data_html.= '     </button>'; 
			         }
			         }
					 else{             
            $data_html.= '   <button class="new_peal_btn coupon_click" data-coupon = "'.$coupons['coupon_type'].'"  data-page="brands" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">'; 
            $data_html.= '   <span class="peal_btn_block">'; 
			$data_html.= '   <i class="fa fa-euro"></i>'; 
            $data_html.= '   <span class="show_code_cover rrrr"><i class="fa fa-euro"></i><span> Gutschein anzeigen</span></span>'; 
            $data_html.= '   <span class="back_code '.$coupons['coupons_id'].'"> '.$code_text.' </span>'; 
            $data_html.= '   </span>'; 
            $data_html.= '   </button>'; 
                    }
            $data_html.= '   </div>'; 
            $data_html.= '   </div>'; 
			if(isset($coupons['special_text'])){
			$data_html.= '   <div class="best_title_f">'.$coupons['special_text'].'</div>'; 
			}
            $data_html.= '   </div>'; 
            $data_html.= '   </div>'; 
            $data_html.= '   <div class="cs-coupon-more-details">'; 
            $data_html.= '   <div class="js-toggle-container">'; 
            
			$data_html.= '   <div class="cs-toggle-content">'; 
            $data_html.= '   <font style="vertical-align: inherit;">'; 
            $data_html.= '   <font style="vertical-align: inherit;">'.$coupons['description'].'</font>'; 
            $data_html.= '   </font>'; 
            $data_html.= '   </div>'; 
            $data_html.= '   <div class="cs-coupon-box-date cs-sub-info-text cs-text-no-break">'; 
			
			if($coupons['min_order_price'] > 0 && !empty($coupons['min_order_price']) && $coupons['min_order_price'] != null){ 
            $data_html.= '   <span class="cs-mbw">'; 
            $data_html.= '   <font style="vertical-align: inherit;">'; 
            $data_html.= '   <font style="vertical-align: inherit;position: absolute;left: 59%;" ><span class="minimum-setting">Mindest </span>bestellwert :  '.$coupons['min_order_price'] .'&euro; </font>'; 
            $data_html.= '   </font>'; 
            $data_html.= '   </span>'; 
			}
			$data_html.= '     <span>';
			if($coupons['end_date']=='0000-00-00'){
			$data_html.= '     <i class="fa fa-clock-o" style="color: transparent;" aria-hidden="true"></i> ';
			}
			else{
				$data_html.= ' <i class="fa fa-clock-o" aria-hidden="true"></i> ';
			}
			
			if($coupons['end_date']!='0000-00-00'){ 
			$data_html.= '     <font style="vertical-align: inherit;">Läuft ab: '.date('m/d/Y',strtotime($coupons['end_date'])).'</font>';
		    }

			$data_html.= '     </span>';
            $data_html.= '   </div>'; 
            $data_html.= '   </div>'; 

            $data_html.= '   </div>'; 
            $data_html.= '   </div>'; 
			 }
				} else{
            $data_html.= '   <div class="cs-coupon-box cs-coupon-category " style="display: flex;justify-content: center;font-size: 14px;">'; 
            $data_html.= '   <div class="cs-coupon-more-details">'; 
            $data_html.= '   Keine Gutscheine verfügbar'; 
            $data_html.= '   </div>'; 
            $data_html.= '   </div>'; 
			}
            $data_html.= '   </div>'; 
			
			$data_html.= '  <div id="deals" class="tab-pane">';
			 if(!empty($just_deals)){											
			foreach($just_deals as $key => $coupons){
				$category_id = $coupons['categories_id'];
				$category_details = $this->db->get_where('categories', array('categories_id'=>$category_id))->row_array();
				$cat_image = $category_details['cat_image'];
				$cat_name = $category_details['name'];
				
				if($coupons['discount_type']=="Percentage"){
					$sign = "%";
				}
				else if($coupons['discount_type']=="Fixed"){
					$sign = "&euro;";
				}
				if(empty($coupons['coupon_code'])){
					$code_text = "No code needed!"; 
				}
				else{
					$code_text = $coupons['coupon_code']; 
				}
            	if(!empty($coupons['special_text']) && $key!="0"){ $margin = "margin-top: 30px;"; } else{ $margin = ''; }

            $data_html.= ' <div class="cs-coupon-box cs-coupon-merchant js-fp" style="'.$margin .'" id="'.$coupons['coupons_id'].'">';
            $data_html.= '  <div class="cs-flex cs-flex-mobil cs-outer-coupon coupons_padd" >';
            $data_html.= '   <div class="cs-coupon-box-cell-1  cs-flex cs-flex-mobil coupon_click" data-page="brands" data-coupon = "'.$coupons['coupon_type'].'" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">';
            $data_html.= '    <div class="cs-coupon-logo cs-flex cs-flex-mobil">';
            $data_html.= '     <div class="cs-coupon-logo-line-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$coupons['discount_value'].$sign.'</font></font></div>';
            $data_html.= '      <div class="cs-coupon-logo-line-3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Rabatt</font></font></div>';
            $data_html.= '      </div>';
            $data_html.= '    </div>';
            $data_html.= '    <div class="cs-coupon-box-cell-2 cs-flex">';
            $data_html.= '     <div class="cs-coupon-box-description cs-coupon-box-h3">';
            $data_html.= '      <font style="vertical-align: inherit;">';
            $data_html.= '       <font style="vertical-align: inherit;">'.$coupons['short_tagline'].'';
            $data_html.= '       </font>';
            $data_html.= '      </font>';
            $data_html.= '     </div>';
            $data_html.= '     <div class="coupon_on_ss"  style="width: 44%;padding-left: 2%;">';
            $data_html.= '     <div class="cs-coupon-small-info bg_grey_dark show_code_div" style="background: #fff !important;">'; 
			    if(empty($coupons['coupon_code'])){
																			
				    if($remove_phill!="Yes"){
            $data_html.= '     <div class="cs-modal-cta-wrapper coupon_click" data-page="brands" data-coupon = "'. $coupons['coupon_type'].'" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">'; 
            $data_html.= '     <div class="cs-coupon-btn " title="Visit the  homepage" style="cursor: pointer;">'; 
            $data_html.= '     <div  class="coupon-btn-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'; 
            $data_html.= '     <i class="fa fa-euro"></i>'; 
            $data_html.= '     <span> Gutschein anzeigen</span>'; 
            $data_html.= '     </font></font><i class="fa fa-chevron-right" aria-hidden="true"></i>'; 
            $data_html.= '     </div>'; 
            $data_html.= '     </div>'; 
            $data_html.= '     </div>'; 
			        }
					else{
            $data_html.= '      <button class="new_peal_btn coupon_click" data-page="brands" data-tag="'.$coupons['short_tagline'].'" data-coupon = "'.$coupons['coupon_type'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">'; 
            $data_html.= '     <span class="peal_btn_block">'; 
			$data_html.= '   <i class="fa fa-euro"></i>'; 
            $data_html.= '     <span class="show_code_cover"><i class="fa fa-euro"></i><span> Gutschein anzeigen</span></span>'; 
            $data_html.= '     <span class="back_code '.$coupons['coupons_id'].'" > '.$code_text.' </span>'; 
            $data_html.= '     </span>'; 
            $data_html.= '     </button>'; 
			         }
			         }
					 else{             
            $data_html.= '   <button class="new_peal_btn coupon_click" data-coupon = "'.$coupons['coupon_type'].'"  data-page="brands" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">'; 
            $data_html.= '   <span class="peal_btn_block">'; 
			$data_html.= '   <i class="fa fa-euro"></i>'; 
            $data_html.= '   <span class="show_code_cover rrrr"><i class="fa fa-euro"></i><span> Gutschein anzeigen</span></span>'; 
            $data_html.= '   <span class="back_code '.$coupons['coupons_id'].'"> '.$code_text.' </span>'; 
            $data_html.= '   </span>'; 
            $data_html.= '   </button>'; 
                    }
            $data_html.= '   </div>'; 
            $data_html.= '   </div>'; 
			if(isset($coupons['special_text'])){
				$data_html.= '   <div class="best_title_f">'.$coupons['special_text'].'</div>'; 
			}
            $data_html.= '   </div>'; 
            $data_html.= '   </div>'; 

            $data_html.= '   <div class="cs-coupon-more-details">'; 
            $data_html.= '   <div class="js-toggle-container">'; 
           
			$data_html.= '   <div class="cs-toggle-content">'; 
            $data_html.= '   <font style="vertical-align: inherit;">'; 
            $data_html.= '   <font style="vertical-align: inherit;">'.$coupons['description'].'</font>'; 
            $data_html.= '   </font>'; 
            $data_html.= '   </div>'; 
            $data_html.= '   <div class="cs-coupon-box-date cs-sub-info-text cs-text-no-break">'; 
			
			if($coupons['min_order_price'] > 0 && !empty($coupons['min_order_price']) && $coupons['min_order_price'] != null){ 
            $data_html.= '   <span class="">'; 
            $data_html.= '   <font style="vertical-align: inherit;">'; 
            $data_html.= '   <font style="vertical-align: inherit;position: absolute;left: 59%;"  class="left-setting-c"><span class="minimum-setting">Mindest </span>bestellwert : '.$coupons['min_order_price'].'&euro; </font>'; 
            $data_html.= '   </font>'; 
            $data_html.= '   </span>'; 
			}
			$data_html.= '     <span>';
			if($coupons['end_date']=='0000-00-00'){
			$data_html.= '     <i class="fa fa-clock-o" style="color: transparent;" aria-hidden="true"></i> ';
			}
			else{
				$data_html.= ' <i class="fa fa-clock-o" aria-hidden="true"></i> ';
			}
			
			if($coupons['end_date']!='0000-00-00'){ 
			$data_html.= '     <font style="vertical-align: inherit;">Läuft ab: '.date('m/d/Y',strtotime($coupons['end_date'])).'</font>';
		    }

			$data_html.= '     </span>';
            $data_html.= '   </div>'; 
            $data_html.= '   </div>';

            $data_html.= '   </div>'; 
            $data_html.= '   </div>'; 
			 }
				} else{
            $data_html.= '   <div class="cs-coupon-box cs-coupon-category " style="display: flex;justify-content: center;font-size: 14px;">'; 
            $data_html.= '   <div class="cs-coupon-more-details">'; 
            $data_html.= '   Keine Gutscheine verfügbar'; 
            $data_html.= '   </div>'; 
            $data_html.= '   </div>'; 
			}
            $data_html.= '   </div>'; 
			
			
			$data_html.= '  <div id="shipping" class="tab-pane">';
			 if(!empty($just_shipping)){											
			foreach($just_shipping as $key => $coupons){
				$category_id = $coupons['categories_id'];
				$category_details = $this->db->get_where('categories', array('categories_id'=>$category_id))->row_array();
				$cat_image = $category_details['cat_image'];
				$cat_name = $category_details['name'];
				
				if($coupons['discount_type']=="Percentage"){
					$sign = "%";
				}
				else if($coupons['discount_type']=="Fixed"){
					$sign = "&euro;";
				}
				if(empty($coupons['coupon_code'])){
					$code_text = "No code needed!"; 
				}
				else{
					$code_text = $coupons['coupon_code']; 
				}
				if(!empty($coupons['special_text']) && $key!="0"){ $margin = "margin-top: 30px;"; } else{ $margin = ''; }

			$data_html.= ' <div class="cs-coupon-box cs-coupon-merchant js-fp" style="'.$margin .'" id="'.$coupons['coupons_id'].'">';
            $data_html.= '  <div class="cs-flex cs-flex-mobil cs-outer-coupon coupons_padd" >';
            $data_html.= '   <div class="cs-coupon-box-cell-1  cs-flex cs-flex-mobil coupon_click" data-page="brands" data-coupon = "'.$coupons['coupon_type'].'" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">';
            $data_html.= '    <div class="cs-coupon-logo cs-flex cs-flex-mobil">';
            $data_html.= '     <div class="cs-coupon-logo-line-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$coupons['discount_value'].$sign.'</font></font></div>';
            $data_html.= '      <div class="cs-coupon-logo-line-3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Rabatt</font></font></div>';
            $data_html.= '      </div>';
            $data_html.= '    </div>';
            $data_html.= '    <div class="cs-coupon-box-cell-2 cs-flex">';
            $data_html.= '     <div class="cs-coupon-box-description cs-coupon-box-h3">';
            $data_html.= '      <font style="vertical-align: inherit;">';
            $data_html.= '       <font style="vertical-align: inherit;">'.$coupons['short_tagline'].'';
            $data_html.= '       </font>';
            $data_html.= '      </font>';
            $data_html.= '     </div>';
            $data_html.= '     <div class="coupon_on_ss"  style="width: 44%;padding-left: 2%;">';
            $data_html.= '     <div class="cs-coupon-small-info bg_grey_dark show_code_div" style="background: #fff !important;">'; 
			    if(empty($coupons['coupon_code'])){
																			
				    if($remove_phill!="Yes"){
            $data_html.= '     <div class="cs-modal-cta-wrapper coupon_click" data-page="brands" data-coupon = "'. $coupons['coupon_type'].'" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">'; 
            $data_html.= '     <div class="cs-coupon-btn " title="Visit the  homepage" style="cursor: pointer;">'; 
            $data_html.= '     <div  class="coupon-btn-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'; 
            $data_html.= '     <i class="fa fa-euro"></i>'; 
            $data_html.= '     <span> Gutschein anzeigen</span>'; 
            $data_html.= '     </font></font><i class="fa fa-chevron-right" aria-hidden="true"></i>'; 
            $data_html.= '     </div>'; 
            $data_html.= '     </div>'; 
            $data_html.= '     </div>'; 
			        }
					else{
            $data_html.= '      <button class="new_peal_btn coupon_click" data-page="brands" data-tag="'.$coupons['short_tagline'].'" data-coupon = "'.$coupons['coupon_type'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">'; 
            $data_html.= '     <span class="peal_btn_block">'; 
			$data_html.= '   <i class="fa fa-euro"></i>'; 
            $data_html.= '     <span class="show_code_cover"><i class="fa fa-euro"></i><span> Gutschein anzeigen</span></span>'; 
            $data_html.= '     <span class="back_code '.$coupons['coupons_id'].'" > '.$code_text.' </span>'; 
            $data_html.= '     </span>'; 
            $data_html.= '     </button>'; 
			         }
			         }
					 else{             
            $data_html.= '   <button class="new_peal_btn coupon_click" data-coupon = "'.$coupons['coupon_type'].'"  data-page="brands" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">'; 
            $data_html.= '   <span class="peal_btn_block">'; 
			$data_html.= '   <i class="fa fa-euro"></i>'; 
            $data_html.= '   <span class="show_code_cover rrrr"><i class="fa fa-euro"></i><span> Gutschein anzeigen</span></span>'; 
            $data_html.= '   <span class="back_code '.$coupons['coupons_id'].'"> '.$code_text.' </span>'; 
            $data_html.= '   </span>'; 
            $data_html.= '   </button>'; 
                    }
            $data_html.= '   </div>'; 
            $data_html.= '   </div>'; 
			if(isset($coupons['special_text'])){
				$data_html.= '   <div class="best_title_f">'.$coupons['special_text'].'</div>'; 
			}
            $data_html.= '   </div>'; 
            $data_html.= '   </div>'; 

            $data_html.= '   <div class="cs-coupon-more-details">'; 
            $data_html.= '   <div class="js-toggle-container">'; 
			
			$data_html.= '   <div class="cs-toggle-content">'; 
            $data_html.= '   <font style="vertical-align: inherit;">'; 
            $data_html.= '   <font style="vertical-align: inherit;">'.$coupons['description'].'</font>'; 
            $data_html.= '   </font>'; 
            $data_html.= '   </div>'; 
            $data_html.= '   <div class="cs-coupon-box-date cs-sub-info-text cs-text-no-break">'; 
			
			if($coupons['min_order_price'] > 0 && !empty($coupons['min_order_price']) && $coupons['min_order_price'] != null){ 
            $data_html.= '   <span class="">'; 
            $data_html.= '   <font style="vertical-align: inherit;">'; 
            $data_html.= '   <font style="vertical-align: inherit;position: absolute;left: 59%;"  class="left-setting-c"><span class="minimum-setting">Mindest </span>bestellwert: '.$coupons['min_order_price'].'&euro; </font>'; 
            $data_html.= '   </font>'; 
            $data_html.= '   </span>'; 
			}
			$data_html.= '     <span>';
			if($coupons['end_date']=='0000-00-00'){
			$data_html.= '     <i class="fa fa-clock-o" style="color: transparent;" aria-hidden="true"></i> ';
			}
			else{
				$data_html.= ' <i class="fa fa-clock-o" aria-hidden="true"></i> ';
			}
			
			if($coupons['end_date']!='0000-00-00'){ 
			$data_html.= '     <font style="vertical-align: inherit;">Läuft ab: '.date('m/d/Y',strtotime($coupons['end_date'])).'</font>';
		    }

			$data_html.= '     </span>';
            $data_html.= '   </div>'; 
            $data_html.= '   </div>';

            $data_html.= '   </div>'; 
            $data_html.= '   </div>'; 
			 }
				} else{
            $data_html.= '   <div class="cs-coupon-box cs-coupon-category " style="display: flex;justify-content: center;font-size: 14px;">'; 
            $data_html.= '   <div class="cs-coupon-more-details">'; 
            $data_html.= '   Keine Gutscheine verfügbar'; 
            $data_html.= '   </div>'; 
            $data_html.= '   </div>'; 
			}
            $data_html.= '   </div>'; 
			
			$data_html.= '  <div id="items" class="tab-pane">';
			 if(!empty($just_free)){											
			foreach($just_free as $key => $coupons){
				$category_id = $coupons['categories_id'];
				$category_details = $this->db->get_where('categories', array('categories_id'=>$category_id))->row_array();
				$cat_image = $category_details['cat_image'];
				$cat_name = $category_details['name'];
				
				if($coupons['discount_type']=="Percentage"){
					$sign = "%";
				}
				else if($coupons['discount_type']=="Fixed"){
					$sign = "&euro;";
				}
				if(empty($coupons['coupon_code'])){
					$code_text = "No code needed!"; 
				}
				else{
					$code_text = $coupons['coupon_code']; 
				}
				if(!empty($coupons['special_text']) && $key!="0"){ $margin = "margin-top: 30px;"; } else{ $margin = ''; }

            $data_html.= ' <div class="cs-coupon-box cs-coupon-merchant js-fp" style="'.$margin .'" id="'.$coupons['coupons_id'].'">';
            $data_html.= '  <div class="cs-flex cs-flex-mobil cs-outer-coupon coupons_padd" >';
            $data_html.= '   <div class="cs-coupon-box-cell-1  cs-flex cs-flex-mobil coupon_click" data-page="brands" data-coupon = "'.$coupons['coupon_type'].'" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">';
            $data_html.= '    <div class="cs-coupon-logo cs-flex cs-flex-mobil">';
            $data_html.= '     <div class="cs-coupon-logo-line-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$coupons['discount_value'].$sign.'</font></font></div>';
            $data_html.= '      <div class="cs-coupon-logo-line-3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Rabatt</font></font></div>';
            $data_html.= '      </div>';
            $data_html.= '    </div>';
            $data_html.= '    <div class="cs-coupon-box-cell-2 cs-flex">';
            $data_html.= '     <div class="cs-coupon-box-description cs-coupon-box-h3">';
            $data_html.= '      <font style="vertical-align: inherit;">';
            $data_html.= '       <font style="vertical-align: inherit;">'.$coupons['short_tagline'].'';
            $data_html.= '       </font>';
            $data_html.= '      </font>';
            $data_html.= '     </div>';
            $data_html.= '     <div class="coupon_on_ss"  style="width: 44%;padding-left: 2%;">';
            $data_html.= '     <div class="cs-coupon-small-info bg_grey_dark show_code_div" style="background: #fff !important;">'; 
			    if(empty($coupons['coupon_code'])){
																			
				    if($remove_phill!="Yes"){
            $data_html.= '     <div class="cs-modal-cta-wrapper coupon_click" data-page="brands" data-coupon = "'. $coupons['coupon_type'].'" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">'; 
            $data_html.= '     <div class="cs-coupon-btn " title="Visit the  homepage" style="cursor: pointer;">'; 
            $data_html.= '     <div  class="coupon-btn-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'; 
            $data_html.= '     <i class="fa fa-euro"></i>'; 
            $data_html.= '     <span> Gutschein anzeigen</span>'; 
            $data_html.= '     </font></font><i class="fa fa-chevron-right" aria-hidden="true"></i>'; 
            $data_html.= '     </div>'; 
            $data_html.= '     </div>'; 
            $data_html.= '     </div>'; 
			        }
					else{
            $data_html.= '      <button class="new_peal_btn coupon_click" data-page="brands" data-tag="'.$coupons['short_tagline'].'" data-coupon = "'.$coupons['coupon_type'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">'; 
            $data_html.= '     <span class="peal_btn_block">'; 
			$data_html.= '   <i class="fa fa-euro"></i>'; 
            $data_html.= '     <span class="show_code_cover"><i class="fa fa-euro"></i><span> Gutschein anzeigen</span></span>'; 
            $data_html.= '     <span class="back_code '.$coupons['coupons_id'].'" > '.$code_text.' </span>'; 
            $data_html.= '     </span>'; 
            $data_html.= '     </button>'; 
			         }
			         }
					 else{             
            $data_html.= '   <button class="new_peal_btn coupon_click" data-coupon = "'.$coupons['coupon_type'].'"  data-page="brands" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">'; 
            $data_html.= '   <span class="peal_btn_block">'; 
			$data_html.= '   <i class="fa fa-euro"></i>'; 
            $data_html.= '   <span class="show_code_cover rrrr"><i class="fa fa-euro"></i><span> Gutschein anzeigen</span></span>'; 
            $data_html.= '   <span class="back_code '.$coupons['coupons_id'].'"> '.$code_text.' </span>'; 
            $data_html.= '   </span>'; 
            $data_html.= '   </button>'; 
                    }
            $data_html.= '   </div>'; 
            $data_html.= '   </div>'; 
			if(isset($coupons['special_text'])){
				$data_html.= '   <div class="best_title_f">'.$coupons['special_text'].'</div>'; 
			}
            $data_html.= '   </div>'; 
            $data_html.= '   </div>'; 

            $data_html.= '   <div class="cs-coupon-more-details">'; 
            $data_html.= '   <div class="js-toggle-container">'; 
            
			$data_html.= '   <div class="cs-toggle-content">'; 
            $data_html.= '   <font style="vertical-align: inherit;">'; 
            $data_html.= '   <font style="vertical-align: inherit;">'.$coupons['description'].'</font>'; 
            $data_html.= '   </font>'; 
            $data_html.= '   </div>'; 
            $data_html.= '   <div class="cs-coupon-box-date cs-sub-info-text cs-text-no-break">'; 
			
			if($coupons['min_order_price'] > 0 && !empty($coupons['min_order_price']) && $coupons['min_order_price'] != null){ 
            $data_html.= '   <span class="">'; 
            $data_html.= '   <font style="vertical-align: inherit;">'; 
            $data_html.= '   <font style="vertical-align: inherit;position: absolute;left: 59%;"  class="left-setting-c"><span class="minimum-setting">Mindest </span>bestellwert : '.$coupons['min_order_price'].'&euro; </font>'; 
            $data_html.= '   </font>'; 
            $data_html.= '   </span>'; 
			}
			$data_html.= '     <span>';
			if($coupons['end_date']=='0000-00-00'){
			$data_html.= '     <i class="fa fa-clock-o" style="color: transparent;" aria-hidden="true"></i> ';
			}
			else{
				$data_html.= ' <i class="fa fa-clock-o" aria-hidden="true"></i> ';
			}
			
			if($coupons['end_date']!='0000-00-00'){ 
			$data_html.= '     <font style="vertical-align: inherit;">Läuft ab: '.date('m/d/Y',strtotime($coupons['end_date'])).'</font>';
		    }

			$data_html.= '     </span>';
            $data_html.= '   </div>'; 
            $data_html.= '   </div>';

            $data_html.= '   </div>'; 
            $data_html.= '   </div>'; 
			 }
				} else{
            $data_html.= '   <div class="cs-coupon-box cs-coupon-category " style="display: flex;justify-content: center;font-size: 14px;">'; 
            $data_html.= '   <div class="cs-coupon-more-details">'; 
            $data_html.= '   Keine Gutscheine verfügbar'; 
            $data_html.= '   </div>'; 
            $data_html.= '   </div>'; 
			}
            $data_html.= '   </div>'; 
            $data_html.= '   </div>'; 
			
			
			echo $data_html; exit; 
	    }
		 if($param1=="filter_cate"){
			$brand_imgs_url = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;
			/* print_r($_POST); exit; */
			$remove_phill="";
			$existing = "";
			$new      = "";
			$categories_id   = $this->input->post('cateID');
			$redemtion = $this->input->post('brand_id');
			/* echo $countt; exit; */
	    
			if(!empty($redemtion)){
				$countt = count($redemtion);			
				/* echo $countt; exit; */
				if($countt=="1"){
					if($redemtion[0]=="Existing"){
						$existing="checked";
					 }
					 else if($redemtion[0]=="New"){
						$new="checked";
					}
				}
				else if($countt=="2"){
				
						$existing="checked";			
						$new="checked";
			
				}
			   }
			   else{
				$existing=""; 
				$new="";
			   }
			   $redem_con = '';
		      if(!empty($redemtion)){
				$redemtion = implode(', ', $redemtion);
				$redem_con = "AND `redemption_type` IN ('$redemtion')";
			  }
		     

			$just_coupons_data = $this->db->query("SELECT * FROM `coupons` WHERE `categories_id` = '$categories_id' AND `status` = 'Active' AND start_date <= '".date('Y-m-d')."' AND (`end_date` >= '$date' OR `end_date` = '0000-00-00') $redem_con ORDER BY `coupon_type`  ASC , `cate_page_order` ASC ");
	
			$just_offers_data = $this->db->query("SELECT * FROM `coupons` WHERE `categories_id` = '$categories_id' AND `status` = 'Active' AND `coupon_type` = 'Offer' AND start_date <= '".date('Y-m-d')."' AND (`end_date` >= '$date' OR `end_date` = '0000-00-00') $redem_con ORDER BY  `cate_page_order` ASC ");
		    
		
			$just_free_data = $this->db->query("SELECT * FROM `coupons` WHERE `categories_id` = '$categories_id' AND `status` = 'Active' AND `coupon_type` = 'Free Items' AND start_date <= '".date('Y-m-d')."' AND (`end_date` >= '$date' OR `end_date` = '0000-00-00') $redem_con ORDER BY  `cate_page_order` ASC ");


			$just_deals_data = $this->db->query("SELECT * FROM `coupons` WHERE `categories_id` = '$categories_id' AND `status` = 'Active' AND `coupon_type` = 'Deals' AND start_date <= '".date('Y-m-d')."' AND (`end_date` >= '$date' OR `end_date` = '0000-00-00') $redem_con ORDER BY  `cate_page_order` ASC ");

			$just_shipping_data = $this->db->query("SELECT * FROM `coupons` WHERE `categories_id` = '$categories_id' AND `status` = 'Active' AND `coupon_type` = 'Free Shipping' AND start_date <= '".date('Y-m-d')."' AND (`end_date` >= '$date' OR `end_date` = '0000-00-00') $redem_con ORDER BY  `cate_page_order` ASC ");


			$just_coupons      = $just_coupons_data->result_array();
			$just_offers       = $just_offers_data->result_array();
			$just_free         = $just_free_data->result_array();
			$just_deals        = $just_deals_data->result_array();
			$just_shipping        = $just_shipping_data->result_array();
	        
			
			$count_coupons     = $just_coupons_data->num_rows();
			$total_offers      = $just_offers_data->num_rows();
			$total_items       = $just_free_data->num_rows();
			$total_deals       = $just_deals_data->num_rows();
			$total_shipping    = $just_shipping_data->num_rows();
			/* $response['result']   = $get_coupons; */
			$data_html ='';
			//print_r($response); exit;
            $data_html.= '<ul class="nav nav-tabs tabs_filter alignment-grid"> ';
            $data_html.= ' <li class="active li_items li-1st"><a data-toggle="tab" class="filter second-width" href="#coupons">Gutscheincode<b class="bold_counter">('.$count_coupons.')</b></a></li>';
            $data_html.= ' <li class=" li_items"><a data-toggle="tab" class="filter" href="#offers">Rabatt <b class="bold_counter">('.$total_offers.')</b></a></li>';
            $data_html.= ' <li class="li_items"><a data-toggle="tab" class="filter" href="#deals">Angebote<b class="bold_counter">('.$total_deals.')</b></a></li>';
            $data_html.= ' <li class=" li_items"><a data-toggle="tab" class="filter" href="#shipping" ">Kostenloser Versand<b class="bold_counter">('.$total_shipping.')</b></a></li>';
            $data_html.= ' <li class="  li_items"><a data-toggle="tab" class="filter" href="#items">Kostenlose Artikel<b class="bold_counter">('.$total_items.')</b></a></li>';
			$data_html.= '</ul>';
			$data_html.= '<div style="display:none;" class="show-redem">';
			$data_html.= '<div class="cs-filter-title">';
			$data_html.= '<font style="vertical-align: inherit;">';
			$data_html.= '<font style="vertical-align: inherit;">Einlösungsart</font> ';
			$data_html.= '</font> ';
			$data_html.= '</div> ';
			$data_html.= '<ul id="" class="cs-filter-ul cs-filter-scroll" > ';
			$data_html.= '<li class="cs-filter-li"> ';
			$data_html.= '<input class="cs-filter-input checkbox" '.$existing.' date-type="mobile" name="check_filter_mob" data-brandid="0" data-cateId="'.$categories_id.'" type="checkbox" id="Existing"  data-checkId="Existing"> ';
			$data_html.= '<label class="cs-filter-label" for="Existing"> ';
			$data_html.= '<font style="vertical-align: inherit;"> ';
			$data_html.= '<font style="vertical-align: inherit;">Bestehender Kunde</font> ';
			$data_html.= '</font> ';
			$data_html.= '</label> ';
			$data_html.= '</li>';
			$data_html.= '<li class="cs-filter-li">';
			$data_html.= '<input class="cs-filter-input checkbox" date-type="mobile" name="check_filter_mob" data-brandid="0" data-cateId="'.$categories_id.'" type="checkbox" id="New" '.$new.'  data-checkId="New">';
			$data_html.= '<label class="cs-filter-label" for="New">';
			$data_html.= '<font style="vertical-align: inherit;">';
			$data_html.= '<font style="vertical-align: inherit;">Neukunde</font>';
			$data_html.= '</font>';
			$data_html.= '</label>';
			$data_html.= '</li>';
			$data_html.= '</ul>';
			$data_html.= '</div>';
            $data_html.= '</ul>';
            $data_html.= ' <div class="tab-content" style="padding-top: 10px;">';

            $data_html.= ' <div id="coupons" class="tab-pane fade   in active">';
				if(!empty($just_coupons)){
				foreach($just_coupons as $key => $coupons){
					$brand_image = $this->db->get_where('brands',array('brands_id'=>$coupons['brands_id']))->row()->brand_image;									
					$brand_name = $this->db->get_where('brands',array('brands_id'=>$coupons['brands_id']))->row()->name;	
					if($coupons['discount_type']=="Percentage"){
						$sign = "%";
					}
					else if($coupons['discount_type']=="Fixed"){
						$sign = "&euro;";
					}
					if(empty($coupons['coupon_code'])){
						$code_text = "No code needed!"; 
					}
					else{
						$code_text = $coupons['coupon_code']; 
					}
					
			if(!empty($coupons['special_text']) && $key!="0"){ $margin = "margin-top: 30px;"; } else{ $margin = ''; }
			$data_html.= '  <style>  .coupons_padd {  height: 136px;  } </style>';
			$data_html.= '  <div class="cs-coupon-box cs-coupon-category" style="'.$margin.'">';
            $data_html.= '  <div class="cs-flex cs-flex-mobil cs-outer-coupon coupons_padd">';
            $data_html.= '  <div class="cs-coupon-box-cell-1 coupon_click cs-flex cs-flex-mobil" data-page="category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">';
            $data_html.= '  <div class="cs-coupon-box-logo">';
            $data_html.= '  <img class="" src="'.base_url().$brand_imgs_url.$brand_image.'" alt="'.$coupons['short_tagline'].'" title="'.$coupons['short_tagline'].'">';
            $data_html.= '  </div>';
            $data_html.= '  <div class="cs-coupon-logo cs-flex cs-flex-mobil">';
            $data_html.= '  <div class="cs-coupon-logo-line-1">';
            $data_html.= '  <font style="vertical-align: inherit;">';
            $data_html.= '  <font style="vertical-align: inherit;">'.$coupons['discount_value'].$sign.' </font>';
            $data_html.= '  </font>';
            $data_html.= '  </div>';
            $data_html.= '  <div class="cs-coupon-logo-line-3">';
            $data_html.= '  <font style="vertical-align: inherit;">';
            $data_html.= '  <font style="vertical-align: inherit;">Rabatt</font>';
            $data_html.= '  </font>';
            $data_html.= '  </div>';
            $data_html.= '  </div>';
            $data_html.= '  </div>';
            $data_html.= '  <div class="cs-coupon-box-cell-2 cs-flex">';
            $data_html.= '  <div class="cs-coupon-box-description cs-coupon-box-h3">';
            $data_html.= '  <font style="vertical-align: inherit;">';
            $data_html.= '  <font style="vertical-align: inherit;">'.$coupons['short_tagline'].'';
            $data_html.= '  </font>';
            $data_html.= '  </font>';
            $data_html.= '  </div>';
            $data_html.= '  <div class="coupon_on_ss"  style="width: 44%;padding-left: 2%;">';
            $data_html.= '  <div class="cs-coupon-small-info bg_grey_dark show_code_div" style="background: #fff !important;">';
			if(empty($coupons['coupon_code'])){
																			
				    if($remove_phill!="Yes"){
            $data_html.= '   <div class="cs-modal-cta-wrapper coupon_click" data-page="category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">';
            $data_html.= '   <div class="cs-coupon-btn " title="Visit the  homepage" style="cursor: pointer;">';
            $data_html.= '   <div class="coupon-btn-text">';
            $data_html.= '   <font style="vertical-align: inherit;">';
            $data_html.= '   <font style="vertical-align: inherit;">';
            $data_html.= '    Gutschein anzeigen';
            $data_html.= '   </font>';
            $data_html.= '   </font><i class="fa fa-chevron-right" aria-hidden="true"></i>';
            $data_html.= '   </div>';
            $data_html.= '   </div>';
            $data_html.= '   </div>';
			 }
			 else{
            $data_html.= '   <button class="new_peal_btn coupon_click" data-page="category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'" data-coupon = "'.$coupons['coupon_type'].'">';
            $data_html.= '   <span class="peal_btn_block">';
			$data_html.= '   <i class="fa fa-euro"></i>'; 
            $data_html.= '   <span class="show_code_cover"><i class="fa fa-euro"></i>    Gutschein anzeigen  </span>';
            $data_html.= '    <span class="back_code '.$coupons['coupons_id'].'" id="">'.$code_text.' </span>';
            $data_html.= '    </span>';
            $data_html.= '    </button>';
			}
				}
				else{
            $data_html.= '    <button class="new_peal_btn coupon_click" data-page="category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'" data-coupon = "'.$coupons['coupon_type'].'">';
            $data_html.= '    <span class="peal_btn_block">';
			$data_html.= '   <i class="fa fa-euro"></i>'; 
            $data_html.= '    <span class="show_code_cover"><i class="fa fa-euro"></i>  Gutschein anzeigen    </span>';
            $data_html.= '    <span class="back_code '.$coupons['coupons_id'].'" id=""> '. $code_text.' </span>';
            $data_html.= '    </span>';
            $data_html.= '    </button>';
			}
            $data_html.= '    </div>';
            $data_html.= '    </div>';
			if(isset($coupons['special_text'])){
				$data_html.= '     <div class="best_title_f"  style="bottom: 136px;">'.$coupons['special_text'].'</div>';
				}
            $data_html.= '    </div>';
            $data_html.= '    </div>';
            $data_html.= '    <div class="cs-coupon-more-details">';
            $data_html.= '    <div class="js-toggle-container cat_page">';
			if($coupons['description']==''){
				$data_html.= '     <div class="">'.$coupons['description'].'';
			}
			else{
				$data_html.= '     <div class="cs-toggle-content">'.$coupons['description'].'';
			}
            $data_html.= '    </div>';
            $data_html.= '     <div class="cs-coupon-box-date cs-sub-info-text cs-text-no-break">';
			if($coupons['min_order_price'] > 0 && !empty($coupons['min_order_price']) && $coupons['min_order_price'] != null){ 
            $data_html.= '     <span class="cs-mbw">';
            $data_html.= '     <font style="vertical-align: inherit;">';
            $data_html.= '     <font style="vertical-align: inherit;position: absolute;left: 59%;" ><span class="minimum-setting">Mindest </span>bestellwert :  '.$coupons['min_order_price'].'&euro; </font>';
            $data_html.= '     </font>';
            $data_html.= '     </span>';
			}
			$data_html.= '     <span>';
			if($coupons['end_date']=='0000-00-00'){
			$data_html.= '     <i class="fa fa-clock-o" style="color: transparent;" aria-hidden="true"></i> ';
			}
			else{
				$data_html.= ' <i class="fa fa-clock-o" aria-hidden="true"></i> ';
			}
			
			if($coupons['end_date']!='0000-00-00'){ 
			$data_html.= '     <font style="vertical-align: inherit;">Läuft ab: '.date('m/d/Y',strtotime($coupons['end_date'])).'</font>';
		    }
			$brand_name_new = "";
			$brand_name_array = explode(" ",$coupons['brand_name']);
			if(count($brand_name_array) > 0){
				$brand_name_new = str_replace(' ', '-', $coupons['brand_name']);
			}

			$data_html.= '     </span>';
            $data_html.= '     </div>';
            $data_html.= '      <div class="cs-coupon-mer-link">';
            $data_html.= '      <font style="vertical-align: inherit;">';
            $data_html.= '      <font style="vertical-align: inherit;"> Alle </font>';
            $data_html.= '      </font>';
            $data_html.= '      <a href="'.base_url()."home/brands/".$coupons['brands_id'].'" >';
            $data_html.= '      <font style="vertical-align: inherit;">';
            $data_html.= '       <font style="vertical-align: inherit;">'.$brand_name.'</font>';
            $data_html.= '      </font>';
            $data_html.= '      </a>';
            $data_html.= '      <font style="vertical-align: inherit;">';
            $data_html.= '      <font style="vertical-align: inherit;">Gutscheine anzeigen </font>';
            $data_html.= '      </font>';
            $data_html.= '      </div>';
            $data_html.= '      </div>';
            $data_html.= '      </div>';
            $data_html.= '      </div>';
			}  
			} else{
            $data_html.= '      <div class="cs-coupon-box cs-coupon-category " style="display: flex;justify-content: center;font-size: 14px;">';
            $data_html.= '      <div class="cs-coupon-more-details">';
            $data_html.= '      Keine Gutscheine verfügbar';
            $data_html.= '       </div>';
            $data_html.= '       </div>';
			}			
            $data_html.= '       </div>';
            
			$data_html.= ' <div id="offers" class="tab-pane fade ">';
			if(!empty($just_offers)){
			foreach($just_offers as $key => $coupons){
				$brand_image = $this->db->get_where('brands',array('brands_id'=>$coupons['brands_id']))->row()->brand_image;									
				$brand_name = $this->db->get_where('brands',array('brands_id'=>$coupons['brands_id']))->row()->name;	
				if($coupons['discount_type']=="Percentage"){
					$sign = "%";
				}
				else if($coupons['discount_type']=="Fixed"){
					$sign = "&euro;";
				}
				if(empty($coupons['coupon_code'])){
					$code_text = "No code needed!"; 
				}
				else{
					$code_text = $coupons['coupon_code']; 
				}
				if(!empty($coupons['special_text']) && $key!="0"){ $margin = "margin-top: 30px;"; } else{ $margin = ''; }
				$data_html.= '  <style>  .coupons_padd {  height: 136px;  } </style>';
				$data_html.= '  <div class="cs-coupon-box cs-coupon-category" style="'.$margin.'">';
				$data_html.= '  <div class="cs-flex cs-flex-mobil cs-outer-coupon coupons_padd">';
				$data_html.= '  <div class="cs-coupon-box-cell-1 coupon_click cs-flex cs-flex-mobil" data-page="category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">';
				$data_html.= '  <div class="cs-coupon-box-logo">';
				$data_html.= '  <img class="" src="'.base_url().$brand_imgs_url.$brand_image.'" alt="'.$coupons['short_tagline'].'" title="'.$coupons['short_tagline'].'">';
				$data_html.= '  </div>';
				$data_html.= '  <div class="cs-coupon-logo cs-flex cs-flex-mobil">';
				$data_html.= '  <div class="cs-coupon-logo-line-1">';
				$data_html.= '  <font style="vertical-align: inherit;">';
				$data_html.= '  <font style="vertical-align: inherit;">'.$coupons['discount_value'].$sign.' </font>';
				$data_html.= '  </font>';
				$data_html.= '  </div>';
				$data_html.= '  <div class="cs-coupon-logo-line-3">';
				$data_html.= '  <font style="vertical-align: inherit;">';
				$data_html.= '  <font style="vertical-align: inherit;">Rabatt</font>';
				$data_html.= '  </font>';
				$data_html.= '  </div>';
				$data_html.= '  </div>';
				$data_html.= '  </div>';
				$data_html.= '  <div class="cs-coupon-box-cell-2 cs-flex">';
				$data_html.= '  <div class="cs-coupon-box-description cs-coupon-box-h3">';
				$data_html.= '  <font style="vertical-align: inherit;">';
				$data_html.= '  <font style="vertical-align: inherit;">'.$coupons['short_tagline'].'';
				$data_html.= '  </font>';
				$data_html.= '  </font>';
				$data_html.= '  </div>';
				$data_html.= '  <div class="coupon_on_ss"  style="width: 44%;padding-left: 2%;">';
				$data_html.= '  <div class="cs-coupon-small-info bg_grey_dark show_code_div" style="background: #fff !important;">';
				if(empty($coupons['coupon_code'])){
																				
						if($remove_phill!="Yes"){
				$data_html.= '   <div class="cs-modal-cta-wrapper coupon_click" data-page="category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">';
				$data_html.= '   <div class="cs-coupon-btn " title="Visit the  homepage" style="cursor: pointer;">';
				$data_html.= '   <div class="coupon-btn-text">';
				$data_html.= '   <font style="vertical-align: inherit;">';
				$data_html.= '   <font style="vertical-align: inherit;">';
				$data_html.= '    Gutschein anzeigen';
				$data_html.= '   </font>';
				$data_html.= '   </font><i class="fa fa-chevron-right" aria-hidden="true"></i>';
				$data_html.= '   </div>';
				$data_html.= '   </div>';
				$data_html.= '   </div>';
				}
				else{
				$data_html.= '   <button class="new_peal_btn coupon_click" data-page="category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'" data-coupon = "'.$coupons['coupon_type'].'">';
				$data_html.= '   <span class="peal_btn_block">';
				$data_html.= '   <i class="fa fa-euro"></i>'; 
				$data_html.= '   <span class="show_code_cover"><i class="fa fa-euro"></i>    Gutschein anzeigen  </span>';
				$data_html.= '    <span class="back_code '.$coupons['coupons_id'].'" id="">'.$code_text.' </span>';
				$data_html.= '    </span>';
				$data_html.= '    </button>';
				}
					}
					else{
				$data_html.= '    <button class="new_peal_btn coupon_click" data-page="category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'" data-coupon = "'.$coupons['coupon_type'].'">';
				$data_html.= '    <span class="peal_btn_block">';
				$data_html.= '   <i class="fa fa-euro"></i>'; 
				$data_html.= '    <span class="show_code_cover"><i class="fa fa-euro"></i>  Gutschein anzeigen    </span>';
				$data_html.= '    <span class="back_code '.$coupons['coupons_id'].'" id=""> '. $code_text.' </span>';
				$data_html.= '    </span>';
				$data_html.= '    </button>';
				}
				$data_html.= '    </div>';
				$data_html.= '    </div>';
				if(isset($coupons['special_text'])){
					$data_html.= '     <div class="best_title_f"  style="bottom: 136px;">'.$coupons['special_text'].'</div>';
					}
				$data_html.= '    </div>';
				$data_html.= '    </div>';
				$data_html.= '    <div class="cs-coupon-more-details">';
				$data_html.= '    <div class="js-toggle-container cat_page">';
				if($coupons['description']==''){
					$data_html.= '     <div class="">'.$coupons['description'].'';
				}
				else{
					$data_html.= '     <div class="cs-toggle-content">'.$coupons['description'].'';
				}
				$data_html.= '    </div>';
				$data_html.= '     <div class="cs-coupon-box-date cs-sub-info-text cs-text-no-break">';
				if($coupons['min_order_price'] > 0 && !empty($coupons['min_order_price']) && $coupons['min_order_price'] != null){ 
				$data_html.= '     <span class="cs-mbw">';
				$data_html.= '     <font style="vertical-align: inherit;">';
				$data_html.= '     <font style="vertical-align: inherit;position: absolute;left: 59%;" ><span class="minimum-setting">Mindest </span>bestellwert  :  '.$coupons['min_order_price'].'&euro; </font>';
				$data_html.= '     </font>';
				$data_html.= '     </span>';
				}
				$data_html.= '     <span>';
				if($coupons['end_date']=='0000-00-00'){
				$data_html.= '     <i class="fa fa-clock-o" style="color: transparent;" aria-hidden="true"></i> ';
				}
				else{
					$data_html.= ' <i class="fa fa-clock-o" aria-hidden="true"></i> ';
				}
				
				if($coupons['end_date']!='0000-00-00'){ 
				$data_html.= '     <font style="vertical-align: inherit;">Läuft ab: '.date('m/d/Y',strtotime($coupons['end_date'])).'</font>';
				}

				$data_html.= '     </span>';
				$data_html.= '     </div>';
				$data_html.= '      <div class="cs-coupon-mer-link">';
				$data_html.= '      <font style="vertical-align: inherit;">';
				$data_html.= '      <font style="vertical-align: inherit;"> zeige alles </font>';
				$data_html.= '      </font>';
				$data_html.= '      <a href="'.base_url()."home/brands/".$coupons['brands_id'].'" title="zeige alles Gutscheine von '. $brand_name.'">';
				$data_html.= '      <font style="vertical-align: inherit;">';
				$data_html.= '       <font style="vertical-align: inherit;">'.$brand_name.'</font>';
				$data_html.= '      </font>';
				$data_html.= '      </a>';
				$data_html.= '      <font style="vertical-align: inherit;">';
				$data_html.= '      <font style="vertical-align: inherit;"> gutscheine </font>';
				$data_html.= '      </font>';
				$data_html.= '      </div>';
				$data_html.= '      </div>';
				$data_html.= '      </div>';
				$data_html.= '      </div>';
				}  
				} else{
				$data_html.= '      <div class="cs-coupon-box cs-coupon-category " style="display: flex;justify-content: center;font-size: 14px;">';
				$data_html.= '      <div class="cs-coupon-more-details">';
				$data_html.= '      Keine Gutscheine verfügbar';
				$data_html.= '       </div>';
				$data_html.= '       </div>';
				}			
				$data_html.= '       </div>';

				$data_html.= ' <div id="deals" class="tab-pane fade ">';
			if(!empty($just_deals)){
			foreach($just_deals as $key => $coupons){
				$brand_image = $this->db->get_where('brands',array('brands_id'=>$coupons['brands_id']))->row()->brand_image;									
				$brand_name = $this->db->get_where('brands',array('brands_id'=>$coupons['brands_id']))->row()->name;	
				if($coupons['discount_type']=="Percentage"){
					$sign = "%";
				}
				else if($coupons['discount_type']=="Fixed"){
					$sign = "&euro;";
				}
				if(empty($coupons['coupon_code'])){
					$code_text = "No code needed!"; 
				}
				else{
					$code_text = $coupons['coupon_code']; 
				}
				if(!empty($coupons['special_text']) && $key!="0"){ $margin = "margin-top: 30px;"; } else{ $margin = ''; }
				$data_html.= '  <style>  .coupons_padd {  height: 136px;  } </style>';
				$data_html.= '  <div class="cs-coupon-box cs-coupon-category" style="'.$margin.'">';
				$data_html.= '  <div class="cs-flex cs-flex-mobil cs-outer-coupon coupons_padd">';
				$data_html.= '  <div class="cs-coupon-box-cell-1 coupon_click cs-flex cs-flex-mobil" data-page="category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">';
				$data_html.= '  <div class="cs-coupon-box-logo">';
				$data_html.= '  <img class="" src="'.base_url().$brand_imgs_url.$brand_image.'" alt="'.$coupons['short_tagline'].'" title="'.$coupons['short_tagline'].'">';
				$data_html.= '  </div>';
				$data_html.= '  <div class="cs-coupon-logo cs-flex cs-flex-mobil">';
				$data_html.= '  <div class="cs-coupon-logo-line-1">';
				$data_html.= '  <font style="vertical-align: inherit;">';
				$data_html.= '  <font style="vertical-align: inherit;">'.$coupons['discount_value'].$sign.' </font>';
				$data_html.= '  </font>';
				$data_html.= '  </div>';
				$data_html.= '  <div class="cs-coupon-logo-line-3">';
				$data_html.= '  <font style="vertical-align: inherit;">';
				$data_html.= '  <font style="vertical-align: inherit;">Rabatt</font>';
				$data_html.= '  </font>';
				$data_html.= '  </div>';
				$data_html.= '  </div>';
				$data_html.= '  </div>';
				$data_html.= '  <div class="cs-coupon-box-cell-2 cs-flex">';
				$data_html.= '  <div class="cs-coupon-box-description cs-coupon-box-h3">';
				$data_html.= '  <font style="vertical-align: inherit;">';
				$data_html.= '  <font style="vertical-align: inherit;">'.$coupons['short_tagline'].'';
				$data_html.= '  </font>';
				$data_html.= '  </font>';
				$data_html.= '  </div>';
				$data_html.= '  <div class="coupon_on_ss"  style="width: 44%;padding-left: 2%;">';
				$data_html.= '  <div class="cs-coupon-small-info bg_grey_dark show_code_div" style="background: #fff !important;">';
				if(empty($coupons['coupon_code'])){
																				
						if($remove_phill!="Yes"){
				$data_html.= '   <div class="cs-modal-cta-wrapper coupon_click" data-page="category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">';
				$data_html.= '   <div class="cs-coupon-btn " title="Visit the  homepage" style="cursor: pointer;">';
				$data_html.= '   <div class="coupon-btn-text">';
				$data_html.= '   <font style="vertical-align: inherit;">';
				$data_html.= '   <font style="vertical-align: inherit;">';
				$data_html.= '    Gutschein anzeigen';
				$data_html.= '   </font>';
				$data_html.= '   </font><i class="fa fa-chevron-right" aria-hidden="true"></i>';
				$data_html.= '   </div>';
				$data_html.= '   </div>';
				$data_html.= '   </div>';
				}
				else{
				$data_html.= '   <button class="new_peal_btn coupon_click" data-page="category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'" data-coupon = "'.$coupons['coupon_type'].'">';
				$data_html.= '   <span class="peal_btn_block">';
				$data_html.= '   <i class="fa fa-euro"></i>'; 
				$data_html.= '   <span class="show_code_cover"><i class="fa fa-euro"></i>    Gutschein anzeigen  </span>';
				$data_html.= '    <span class="back_code '.$coupons['coupons_id'].'" id="">'.$code_text.' </span>';
				$data_html.= '    </span>';
				$data_html.= '    </button>';
				}
					}
					else{
				$data_html.= '    <button class="new_peal_btn coupon_click" data-page="category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'" data-coupon = "'.$coupons['coupon_type'].'">';
				$data_html.= '    <span class="peal_btn_block">';
				$data_html.= '   <i class="fa fa-euro"></i>'; 
				$data_html.= '    <span class="show_code_cover"><i class="fa fa-euro"></i>  Gutschein anzeigen    </span>';
				$data_html.= '    <span class="back_code '.$coupons['coupons_id'].'" id=""> '. $code_text.' </span>';
				$data_html.= '    </span>';
				$data_html.= '    </button>';
				}
				$data_html.= '    </div>';
				$data_html.= '    </div>';
				if(isset($coupons['special_text'])){
					$data_html.= '     <div class="best_title_f"  style="bottom: 136px;">'.$coupons['special_text'].'</div>';
					}
				$data_html.= '    </div>';
				$data_html.= '    </div>';
				$data_html.= '    <div class="cs-coupon-more-details">';
				$data_html.= '    <div class="js-toggle-container cat_page">';
				if($coupons['description']==''){
					$data_html.= '     <div class="">'.$coupons['description'].'';
				}
				else{
					$data_html.= '     <div class="cs-toggle-content">'.$coupons['description'].'';
				}
				$data_html.= '    </div>';
				$data_html.= '     <div class="cs-coupon-box-date cs-sub-info-text cs-text-no-break">';
				if($coupons['min_order_price'] > 0 && !empty($coupons['min_order_price']) && $coupons['min_order_price'] != null){ 
				$data_html.= '     <span class="cs-mbw">';
				$data_html.= '     <font style="vertical-align: inherit;">';
				$data_html.= '     <font style="vertical-align: inherit;position: absolute;left: 59%;" ><span class="minimum-setting">Mindest </span>bestellwert  :  '.$coupons['min_order_price'].'&euro; </font>';
				$data_html.= '     </font>';
				$data_html.= '     </span>';
				}
				$data_html.= '     <span>';
				if($coupons['end_date']=='0000-00-00'){
				$data_html.= '     <i class="fa fa-clock-o" style="color: transparent;" aria-hidden="true"></i> ';
				}
				else{
					$data_html.= ' <i class="fa fa-clock-o" aria-hidden="true"></i> ';
				}
				
				if($coupons['end_date']!='0000-00-00'){ 
				$data_html.= '     <font style="vertical-align: inherit;">Läuft ab: '.date('m/d/Y',strtotime($coupons['end_date'])).'</font>';
				}
	
				$data_html.= '     </span>';
				$data_html.= '     </div>';
				$data_html.= '      <div class="cs-coupon-mer-link">';
				$data_html.= '      <font style="vertical-align: inherit;">';
				$data_html.= '      <font style="vertical-align: inherit;"> zeige alles </font>';
				$data_html.= '      </font>';
				$data_html.= '      <a href="'.base_url()."home/brands/".$coupons['brands_id'].'" title="zeige alles Gutscheine von '. $brand_name.'">';
				$data_html.= '      <font style="vertical-align: inherit;">';
				$data_html.= '       <font style="vertical-align: inherit;">'.$brand_name.'</font>';
				$data_html.= '      </font>';
				$data_html.= '      </a>';
				$data_html.= '      <font style="vertical-align: inherit;">';
				$data_html.= '      <font style="vertical-align: inherit;"> gutscheine </font>';
				$data_html.= '      </font>';
				$data_html.= '      </div>';
				$data_html.= '      </div>';
				$data_html.= '      </div>';
				$data_html.= '      </div>';
				}  
				} else{
				$data_html.= '      <div class="cs-coupon-box cs-coupon-category " style="display: flex;justify-content: center;font-size: 14px;">';
				$data_html.= '      <div class="cs-coupon-more-details">';
				$data_html.= '      Keine Gutscheine verfügbar';
				$data_html.= '       </div>';
				$data_html.= '       </div>';
				}			
				$data_html.= '       </div>';

				$data_html.= ' <div id="shipping" class="tab-pane fade ">';

			if(!empty($just_shipping)){
			foreach($just_shipping as $key => $coupons){
				$brand_image = $this->db->get_where('brands',array('brands_id'=>$coupons['brands_id']))->row()->brand_image;									
				$brand_name = $this->db->get_where('brands',array('brands_id'=>$coupons['brands_id']))->row()->name;	
				if($coupons['discount_type']=="Percentage"){
					$sign = "%";
				}
				else if($coupons['discount_type']=="Fixed"){
					$sign = "&euro;";
				}
				if(empty($coupons['coupon_code'])){
					$code_text = "No code needed!"; 
				}
				else{
					$code_text = $coupons['coupon_code']; 
				}
				if(!empty($coupons['special_text']) && $key!="0"){ $margin = "margin-top: 30px;"; } else{ $margin = ''; }
				$data_html.= '  <style>  .coupons_padd {  height: 136px;  } </style>';
				$data_html.= '  <div class="cs-coupon-box cs-coupon-category" style="'.$margin.'">';
				$data_html.= '  <div class="cs-flex cs-flex-mobil cs-outer-coupon coupons_padd">';
				$data_html.= '  <div class="cs-coupon-box-cell-1 coupon_click cs-flex cs-flex-mobil" data-page="category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">';
				$data_html.= '  <div class="cs-coupon-box-logo">';
				$data_html.= '  <img class="" src="'.base_url().$brand_imgs_url.$brand_image.'" alt="'.$coupons['short_tagline'].'" title="'.$coupons['short_tagline'].'">';
				$data_html.= '  </div>';
				$data_html.= '  <div class="cs-coupon-logo cs-flex cs-flex-mobil">';
				$data_html.= '  <div class="cs-coupon-logo-line-1">';
				$data_html.= '  <font style="vertical-align: inherit;">';
				$data_html.= '  <font style="vertical-align: inherit;">'.$coupons['discount_value'].$sign.' </font>';
				$data_html.= '  </font>';
				$data_html.= '  </div>';
				$data_html.= '  <div class="cs-coupon-logo-line-3">';
				$data_html.= '  <font style="vertical-align: inherit;">';
				$data_html.= '  <font style="vertical-align: inherit;">Rabatt</font>';
				$data_html.= '  </font>';
				$data_html.= '  </div>';
				$data_html.= '  </div>';
				$data_html.= '  </div>';
				$data_html.= '  <div class="cs-coupon-box-cell-2 cs-flex">';
				$data_html.= '  <div class="cs-coupon-box-description cs-coupon-box-h3">';
				$data_html.= '  <font style="vertical-align: inherit;">';
				$data_html.= '  <font style="vertical-align: inherit;">'.$coupons['short_tagline'].'';
				$data_html.= '  </font>';
				$data_html.= '  </font>';
				$data_html.= '  </div>';
				$data_html.= '  <div class="coupon_on_ss"  style="width: 44%;padding-left: 2%;">';
				$data_html.= '  <div class="cs-coupon-small-info bg_grey_dark show_code_div" style="background: #fff !important;">';
				if(empty($coupons['coupon_code'])){
																				
						if($remove_phill!="Yes"){
				$data_html.= '   <div class="cs-modal-cta-wrapper coupon_click" data-page="category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">';
				$data_html.= '   <div class="cs-coupon-btn " title="Visit the  homepage" style="cursor: pointer;">';
				$data_html.= '   <div class="coupon-btn-text">';
				$data_html.= '   <font style="vertical-align: inherit;">';
				$data_html.= '   <font style="vertical-align: inherit;">';
				$data_html.= '    Gutschein anzeigen';
				$data_html.= '   </font>';
				$data_html.= '   </font><i class="fa fa-chevron-right" aria-hidden="true"></i>';
				$data_html.= '   </div>';
				$data_html.= '   </div>';
				$data_html.= '   </div>';
				}
				else{
				$data_html.= '   <button class="new_peal_btn coupon_click" data-page="category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'" data-coupon = "'.$coupons['coupon_type'].'">';
				$data_html.= '   <span class="peal_btn_block">';
				$data_html.= '   <i class="fa fa-euro"></i>'; 
				$data_html.= '   <span class="show_code_cover"><i class="fa fa-euro"></i>    Gutschein anzeigen  </span>';
				$data_html.= '    <span class="back_code '.$coupons['coupons_id'].'" id="">'.$code_text.' </span>';
				$data_html.= '    </span>';
				$data_html.= '    </button>';
				}
					}
					else{
				$data_html.= '    <button class="new_peal_btn coupon_click" data-page="category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'" data-coupon = "'.$coupons['coupon_type'].'">';
				$data_html.= '    <span class="peal_btn_block">';
				$data_html.= '   <i class="fa fa-euro"></i>'; 
				$data_html.= '    <span class="show_code_cover"><i class="fa fa-euro"></i>  Gutschein anzeigen    </span>';
				$data_html.= '    <span class="back_code '.$coupons['coupons_id'].'" id=""> '. $code_text.' </span>';
				$data_html.= '    </span>';
				$data_html.= '    </button>';
				}
				$data_html.= '    </div>';
				$data_html.= '    </div>';
				if(isset($coupons['special_text'])){
					$data_html.= '     <div class="best_title_f"  style="bottom: 136px;">'.$coupons['special_text'].'</div>';
					}
				$data_html.= '    </div>';
				$data_html.= '    </div>';
				$data_html.= '    <div class="cs-coupon-more-details">';
				$data_html.= '    <div class="js-toggle-container cat_page">';
				if($coupons['description']==''){
					$data_html.= '     <div class="">'.$coupons['description'].'';
				}
				else{
					$data_html.= '     <div class="cs-toggle-content">'.$coupons['description'].'';
				}
				$data_html.= '    </div>';
				$data_html.= '     <div class="cs-coupon-box-date cs-sub-info-text cs-text-no-break">';
				if($coupons['min_order_price'] > 0 && !empty($coupons['min_order_price']) && $coupons['min_order_price'] != null){ 
				$data_html.= '     <span class="cs-mbw">';
				$data_html.= '     <font style="vertical-align: inherit;">';
				$data_html.= '     <font style="vertical-align: inherit;position: absolute;left: 59%;" ><span class="minimum-setting">Mindest </span>bestellwert  :  '.$coupons['min_order_price'].'&euro; </font>';
				$data_html.= '     </font>';
				$data_html.= '     </span>';
				}
				$data_html.= '     <span>';
				if($coupons['end_date']=='0000-00-00'){
				$data_html.= '     <i class="fa fa-clock-o" style="color: transparent;" aria-hidden="true"></i> ';
				}
				else{
					$data_html.= ' <i class="fa fa-clock-o" aria-hidden="true"></i> ';
				}
				
				if($coupons['end_date']!='0000-00-00'){ 
				$data_html.= '     <font style="vertical-align: inherit;">Läuft ab: '.date('m/d/Y',strtotime($coupons['end_date'])).'</font>';
				}

				$data_html.= '     </span>';
				$data_html.= '     </div>';
				$data_html.= '      <div class="cs-coupon-mer-link">';
				$data_html.= '      <font style="vertical-align: inherit;">';
				$data_html.= '      <font style="vertical-align: inherit;"> zeige alles </font>';
				$data_html.= '      </font>';
				$data_html.= '      <a href="'.base_url()."home/brands/".$coupons['brands_id'].'" title="zeige alles Gutscheine von '. $brand_name.'">';
				$data_html.= '      <font style="vertical-align: inherit;">';
				$data_html.= '       <font style="vertical-align: inherit;">'.$brand_name.'</font>';
				$data_html.= '      </font>';
				$data_html.= '      </a>';
				$data_html.= '      <font style="vertical-align: inherit;">';
				$data_html.= '      <font style="vertical-align: inherit;"> gutscheine </font>';
				$data_html.= '      </font>';
				$data_html.= '      </div>';
				$data_html.= '      </div>';
				$data_html.= '      </div>';
				$data_html.= '      </div>';
				}  
				} else{
				$data_html.= '      <div class="cs-coupon-box cs-coupon-category " style="display: flex;justify-content: center;font-size: 14px;">';
				$data_html.= '      <div class="cs-coupon-more-details">';
				$data_html.= '      Keine Gutscheine verfügbar';
				$data_html.= '       </div>';
				$data_html.= '       </div>';
				}			
				$data_html.= '       </div>';

				$data_html.= ' <div id="items" class="tab-pane fade ">';

			if(!empty($just_free)){
			foreach($just_free as $key => $coupons){
				$brand_image = $this->db->get_where('brands',array('brands_id'=>$coupons['brands_id']))->row()->brand_image;									
				$brand_name = $this->db->get_where('brands',array('brands_id'=>$coupons['brands_id']))->row()->name;	
				if($coupons['discount_type']=="Percentage"){
					$sign = "%";
				}
				else if($coupons['discount_type']=="Fixed"){
					$sign = "&euro;";
				}
				if(empty($coupons['coupon_code'])){
					$code_text = "No code needed!"; 
				}
				else{
					$code_text = $coupons['coupon_code']; 
				}
				if(!empty($coupons['special_text']) && $key!="0"){ $margin = "margin-top: 30px;"; } else{ $margin = ''; }
				$data_html.= '  <style>  .coupons_padd {  height: 136px;  } </style>';
				$data_html.= '  <div class="cs-coupon-box cs-coupon-category" style="'.$margin.'">';
				$data_html.= '  <div class="cs-flex cs-flex-mobil cs-outer-coupon coupons_padd">';
				$data_html.= '  <div class="cs-coupon-box-cell-1 coupon_click cs-flex cs-flex-mobil" data-page="category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">';
				$data_html.= '  <div class="cs-coupon-box-logo">';
				$data_html.= '  <img class="" src="'.base_url().$brand_imgs_url.$brand_image.'" alt="'.$coupons['short_tagline'].'" title="'.$coupons['short_tagline'].'">';
				$data_html.= '  </div>';
				$data_html.= '  <div class="cs-coupon-logo cs-flex cs-flex-mobil">';
				$data_html.= '  <div class="cs-coupon-logo-line-1">';
				$data_html.= '  <font style="vertical-align: inherit;">';
				$data_html.= '  <font style="vertical-align: inherit;">'.$coupons['discount_value'].$sign.' </font>';
				$data_html.= '  </font>';
				$data_html.= '  </div>';
				$data_html.= '  <div class="cs-coupon-logo-line-3">';
				$data_html.= '  <font style="vertical-align: inherit;">';
				$data_html.= '  <font style="vertical-align: inherit;">Rabatt</font>';
				$data_html.= '  </font>';
				$data_html.= '  </div>';
				$data_html.= '  </div>';
				$data_html.= '  </div>';
				$data_html.= '  <div class="cs-coupon-box-cell-2 cs-flex">';
				$data_html.= '  <div class="cs-coupon-box-description cs-coupon-box-h3">';
				$data_html.= '  <font style="vertical-align: inherit;">';
				$data_html.= '  <font style="vertical-align: inherit;">'.$coupons['short_tagline'].'';
				$data_html.= '  </font>';
				$data_html.= '  </font>';
				$data_html.= '  </div>';
				$data_html.= '  <div class="coupon_on_ss"  style="width: 44%;padding-left: 2%;">';
				$data_html.= '  <div class="cs-coupon-small-info bg_grey_dark show_code_div" style="background: #fff !important;">';
				if(empty($coupons['coupon_code'])){
																				
						if($remove_phill!="Yes"){
				$data_html.= '   <div class="cs-modal-cta-wrapper coupon_click" data-page="category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">';
				$data_html.= '   <div class="cs-coupon-btn " title="Visit the  homepage" style="cursor: pointer;">';
				$data_html.= '   <div class="coupon-btn-text">';
				$data_html.= '   <font style="vertical-align: inherit;">';
				$data_html.= '   <font style="vertical-align: inherit;">';
				$data_html.= '    Gutschein anzeigen';
				$data_html.= '   </font>';
				$data_html.= '   </font><i class="fa fa-chevron-right" aria-hidden="true"></i>';
				$data_html.= '   </div>';
				$data_html.= '   </div>';
				$data_html.= '   </div>';
				}
				else{
				$data_html.= '   <button class="new_peal_btn coupon_click" data-page="category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'" data-coupon = "'.$coupons['coupon_type'].'">';
				$data_html.= '   <span class="peal_btn_block">';
				$data_html.= '   <i class="fa fa-euro"></i>'; 
				$data_html.= '   <span class="show_code_cover"><i class="fa fa-euro"></i>    Gutschein anzeigen  </span>';
				$data_html.= '    <span class="back_code '.$coupons['coupons_id'].'" id="">'.$code_text.' </span>';
				$data_html.= '    </span>';
				$data_html.= '    </button>';
				}
					}
					else{
				$data_html.= '    <button class="new_peal_btn coupon_click" data-page="category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'" data-coupon = "'.$coupons['coupon_type'].'">';
				$data_html.= '    <span class="peal_btn_block">';
				$data_html.= '    <span class="show_code_cover"><i class="fa fa-euro"></i>  Gutschein anzeigen    </span>';
				$data_html.= '    <span class="back_code '.$coupons['coupons_id'].'" id=""> '. $code_text.' </span>';
				$data_html.= '    </span>';
				$data_html.= '    </button>';
				}
				$data_html.= '    </div>';
				$data_html.= '    </div>';
				if(isset($coupons['special_text'])){
					$data_html.= '     <div class="best_title_f"  style="bottom: 136px;">'.$coupons['special_text'].'</div>';
					}
				$data_html.= '    </div>';
				$data_html.= '    </div>';
				$data_html.= '    <div class="cs-coupon-more-details">';
				$data_html.= '    <div class="js-toggle-container cat_page">';
				if($coupons['description']==''){
					$data_html.= '     <div class="">'.$coupons['description'].'';
				}
				else{
					$data_html.= '     <div class="cs-toggle-content">'.$coupons['description'].'';
				}
				$data_html.= '    </div>';
				$data_html.= '     <div class="cs-coupon-box-date cs-sub-info-text cs-text-no-break">';
				if($coupons['min_order_price'] > 0 && !empty($coupons['min_order_price']) && $coupons['min_order_price'] != null){ 
				$data_html.= '     <span class="cs-mbw">';
				$data_html.= '     <font style="vertical-align: inherit;">';
				$data_html.= '     <font style="vertical-align: inherit;position: absolute;left: 59%;" ><span class="minimum-setting">Mindest </span>bestellwert :  '.$coupons['min_order_price'].'&euro; </font>';
				$data_html.= '     </font>';
				$data_html.= '     </span>';
				}
				$data_html.= '     <span>';
				if($coupons['end_date']=='0000-00-00'){
				$data_html.= '     <i class="fa fa-clock-o" style="color: transparent;" aria-hidden="true"></i> ';
				}
				else{
					$data_html.= ' <i class="fa fa-clock-o" aria-hidden="true"></i> ';
				}
				
				if($coupons['end_date']!='0000-00-00'){ 
				$data_html.= '     <font style="vertical-align: inherit;">Läuft ab: '.date('m/d/Y',strtotime($coupons['end_date'])).'</font>';
				}
	
				$data_html.= '     </span>';
				$data_html.= '     </div>';
				$data_html.= '      <div class="cs-coupon-mer-link">';
				$data_html.= '      <font style="vertical-align: inherit;">';
				$data_html.= '      <font style="vertical-align: inherit;"> zeige alles </font>';
				$data_html.= '      </font>';
				$data_html.= '      <a href="'.base_url()."home/brands/".$coupons['brands_id'].'" title="zeige alles Gutscheine von '. $brand_name.'">';
				$data_html.= '      <font style="vertical-align: inherit;">';
				$data_html.= '       <font style="vertical-align: inherit;">'.$brand_name.'</font>';
				$data_html.= '      </font>';
				$data_html.= '      </a>';
				$data_html.= '      <font style="vertical-align: inherit;">';
				$data_html.= '      <font style="vertical-align: inherit;"> gutscheine </font>';
				$data_html.= '      </font>';
				$data_html.= '      </div>';
				$data_html.= '      </div>';
				$data_html.= '      </div>';
				$data_html.= '      </div>';
				}  
				} else{
				$data_html.= '      <div class="cs-coupon-box cs-coupon-category " style="display: flex;justify-content: center;font-size: 14px;">';
				$data_html.= '      <div class="cs-coupon-more-details">';
				$data_html.= '      Keine Gutscheine verfügbar';
				$data_html.= '       </div>';
				$data_html.= '       </div>';
				}			
				$data_html.= '       </div>';
                
				
            $data_html.= '       </div>';
			echo $data_html; exit;
	    }
		
		 if($param1=="filter_sub_cate"){
			$brand_imgs_url = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;
			/* print_r($_POST); exit; */
			$remove_phill="";
			$existing = "";
			$new      = "";
			$sub_categories_id   = $this->input->post('cateID');
			$redemtion = $this->input->post('brand_id');
			/* echo $countt; exit; */
	    
			if(!empty($redemtion)){
				$countt = count($redemtion);			
				/* echo $countt; exit; */
				if($countt=="1"){
					if($redemtion[0]=="Existing"){
						$existing="checked";
					 }
					 else if($redemtion[0]=="New"){
						$new="checked";
					}
				}
				else if($countt=="2"){
				
						$existing="checked";			
						$new="checked";
			
				}
			   }
			   else{
				$existing=""; 
				$new="";
			   }
			   $redem_con = '';
		      if(!empty($redemtion)){
				$redemtion = implode(', ', $redemtion);
				$redem_con = "AND `redemption_type` IN ('$redemtion')";
			  }
			
            // $this->db->order_by('coupon_type','asc');
			// $this->db->where_in('redemption_type', $redemtion);			
			// $just_coupons_data = $this->db->get_where('coupons', array('sub_categories_id'=>$sub_categories_id,'status'=>'Active','end_date >='=>$date));
		    //  /* echo $this->db->last_query(); */
			
			 $just_coupons_data = $this->db->query("SELECT * FROM `coupons` WHERE `sub_categories_id` = '$sub_categories_id' AND `status` = 'Active' AND start_date <= '".date('Y-m-d')."' AND (`end_date` >= '$date' OR `end_date` = '0000-00-00') $redem_con ORDER BY `coupon_type`  ASC , `cate_page_order` ASC ");
			

			 $just_offers_data = $this->db->query("SELECT * FROM `coupons` WHERE `sub_categories_id` = '$sub_categories_id' AND `status` = 'Active' AND coupon_type = 'Offer'  AND start_date <= '".date('Y-m-d')."' AND (`end_date` >= '$date' OR `end_date` = '0000-00-00') $redem_con ORDER BY `coupon_type`  ASC , `cate_page_order` ASC ");

     		// $this->db->where_in('redemption_type', $redemtion);				
			// $just_offers_data  = $this->db->get_where('coupons', array('sub_categories_id'=>$sub_categories_id,'status'=>'Active','coupon_type'=>'Offer','end_date >='=>$date));
			
			$just_free_data = $this->db->query("SELECT * FROM `coupons` WHERE `sub_categories_id` = '$sub_categories_id' AND `status` = 'Active' AND coupon_type = 'Free Items'  AND start_date <= '".date('Y-m-d')."' AND (`end_date` >= '$date' OR `end_date` = '0000-00-00') $redem_con ORDER BY `coupon_type`  ASC , `cate_page_order` ASC ");

			// $this->db->where_in('redemption_type', $redemtion);				
			// $just_free_data  = $this->db->get_where('coupons', array('sub_categories_id'=>$sub_categories_id,'status'=>'Active','coupon_type'=>'Free Items','end_date >='=>$date));
			
			$just_deals_data = $this->db->query("SELECT * FROM `coupons` WHERE `sub_categories_id` = '$sub_categories_id' AND `status` = 'Active' AND coupon_type = 'Deals'  AND start_date <= '".date('Y-m-d')."' AND (`end_date` >= '$date' OR `end_date` = '0000-00-00') $redem_con ORDER BY `coupon_type`  ASC , `cate_page_order` ASC ");


			// $this->db->where_in('redemption_type', $redemtion);				
			// $just_deals_data  = $this->db->get_where('coupons', array('sub_categories_id'=>$sub_categories_id,'status'=>'Active','coupon_type'=>'Deals','end_date >='=>$date));
			

			$just_shipping_data = $this->db->query("SELECT * FROM `coupons` WHERE `sub_categories_id` = '$sub_categories_id' AND `status` = 'Active' AND coupon_type = 'Free Shipping'  AND start_date <= '".date('Y-m-d')."' AND (`end_date` >= '$date' OR `end_date` = '0000-00-00') $redem_con ORDER BY `coupon_type`  ASC , `cate_page_order` ASC ");


			// $this->db->where_in('redemption_type', $redemtion);				
			// $just_shipping_data  = $this->db->get_where('coupons', array('sub_categories_id'=>$sub_categories_id,'status'=>'Active','coupon_type'=>'Free Shipping','end_date >='=>$date));
			
		
		
			$just_coupons      = $just_coupons_data->result_array();
			$just_offers       = $just_offers_data->result_array();
			$just_free         = $just_free_data->result_array();
			$just_deals        = $just_deals_data->result_array();
			$just_shipping      = $just_shipping_data->result_array();
	        
			
			$count_coupons     = $just_coupons_data->num_rows();
			$total_offers      = $just_offers_data->num_rows();
			$total_items       = $just_free_data->num_rows();
			$total_deals       = $just_deals_data->num_rows();
			$total_shipping    = $just_shipping_data->num_rows();
			/* $response['result']   = $get_coupons; */
			$data_html ='';
			//print_r($response); exit;
            $data_html.= '<ul class="nav nav-tabs tabs_filter alignment-grid"> ';
            $data_html.= ' <li class="active li_items li-1st"><a data-toggle="tab" class="filter second-width" href="#coupons">Gutscheincode<b class="bold_counter">('.$count_coupons.')</b></a></li>';
            $data_html.= ' <li class=" li_items"><a data-toggle="tab" class="filter" href="#offers">Rabatt <b class="bold_counter">('.$total_offers.')</b></a></li>';
            $data_html.= ' <li class="li_items"><a data-toggle="tab" class="filter" href="#deals">Angebote<b class="bold_counter">('.$total_deals.')</b></a></li>';
            $data_html.= ' <li class=" li_items"><a data-toggle="tab" class="filter" href="#shipping" ">Kostenloser Versand<b class="bold_counter">('.$total_shipping.')</b></a></li>';
            $data_html.= ' <li class="  li_items"><a data-toggle="tab" class="filter" href="#items">Kostenlose Artikel<b class="bold_counter">('.$total_items.')</b></a></li>';
            
            $data_html.= '</ul>';
			$data_html.= '<div style="display:none;" class="show-redem">';
             $data_html.= '<div class="cs-filter-title">';
             $data_html.= '<font style="vertical-align: inherit;">';
             $data_html.= '<font style="vertical-align: inherit;">Einlösungsart</font> ';
             $data_html.= '</font> ';
             $data_html.= '</div> ';
             $data_html.= '<ul id="" class="cs-filter-ul cs-filter-scroll" > ';
             $data_html.= '<li class="cs-filter-li"> ';
             $data_html.= '<input class="cs-filter-input checkbox" '.$existing.' data-dis="ne" date-type="mobile" name="check_filter_mob" data-brandid="0" data-cateId="'.$sub_categories_id.'" type="checkbox" id="Existing"  data-checkId="Existing"> ';
             $data_html.= '<label class="cs-filter-label" id="ex" for="Existing"> ';
             $data_html.= '<font style="vertical-align: inherit;"> ';
             $data_html.= '<font style="vertical-align: inherit;">Bestehender Kunde</font> ';
             $data_html.= '</font> ';
             $data_html.= '</label> ';
             $data_html.= '</li>';
             $data_html.= '<li class="cs-filter-li">';
             $data_html.= '<input class="cs-filter-input checkbox" data-dis="ex" date-type="mobile" name="check_filter_mob" data-brandid="0" data-cateId="'.$sub_categories_id.'" type="checkbox" id="New" '.$new.'  data-checkId="New">';
             $data_html.= '<label class="cs-filter-label" id="ne" for="New">';
             $data_html.= '<font style="vertical-align: inherit;">';
             $data_html.= '<font style="vertical-align: inherit;">Neukunde</font>';
             $data_html.= '</font>';
             $data_html.= '</label>';
             $data_html.= '</li>';
             $data_html.= '</ul>';
             $data_html.= '</div>';		   
            $data_html.= ' <div class="tab-content" style="padding-top: 10px;">';
            $data_html.= ' <div id="coupons" class="tab-pane fade   in active">';
				if(!empty($just_coupons)){
				foreach($just_coupons as $key => $coupons){
					$brand_image = $this->db->get_where('brands',array('brands_id'=>$coupons['brands_id']))->row()->brand_image;									
					$brand_name = $this->db->get_where('brands',array('brands_id'=>$coupons['brands_id']))->row()->name;	
					if($coupons['discount_type']=="Percentage"){
						$sign = "%";
					}
					else if($coupons['discount_type']=="Fixed"){
						$sign = "&euro;";
					}
					if(empty($coupons['coupon_code'])){
						$code_text = "No code needed!"; 
					}
					else{
						$code_text = $coupons['coupon_code']; 
					}
			if(!empty($coupons['special_text']) && $key!="0"){ $margin = "margin-top: 30px;"; } else{ $margin = ''; }
			$data_html.= '  <style>  .coupons_padd {  height: 136px;  } </style>';
			$data_html.= '  <div class="cs-coupon-box cs-coupon-category" style="'.$margin.'">';
            $data_html.= '  <div class="cs-flex cs-flex-mobil cs-outer-coupon coupons_padd">';
            $data_html.= '  <div class="cs-coupon-box-cell-1 coupon_click cs-flex cs-flex-mobil" data-page="sub_category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['sub_categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">';
            $data_html.= '  <div class="cs-coupon-box-logo">';
            $data_html.= '  <img class="" src="'.base_url().$brand_imgs_url.$brand_image.'" alt="'.$coupons['short_tagline'].'" title="'.$coupons['short_tagline'].'">';
            $data_html.= '  </div>';
            $data_html.= '  <div class="cs-coupon-logo cs-flex cs-flex-mobil">';
            $data_html.= '  <div class="cs-coupon-logo-line-1">';
            $data_html.= '  <font style="vertical-align: inherit;">';
            $data_html.= '  <font style="vertical-align: inherit;">'.$coupons['discount_value'].$sign.' </font>';
            $data_html.= '  </font>';
            $data_html.= '  </div>';
            $data_html.= '  <div class="cs-coupon-logo-line-3">';
            $data_html.= '  <font style="vertical-align: inherit;">';
            $data_html.= '  <font style="vertical-align: inherit;">Rabatt</font>';
            $data_html.= '  </font>';
            $data_html.= '  </div>';
            $data_html.= '  </div>';
            $data_html.= '  </div>';
            $data_html.= '  <div class="cs-coupon-box-cell-2 cs-flex">';
            $data_html.= '  <div class="cs-coupon-box-description cs-coupon-box-h3">';
            $data_html.= '  <font style="vertical-align: inherit;">';
            $data_html.= '  <font style="vertical-align: inherit;">'.$coupons['short_tagline'].'';
            $data_html.= '  </font>';
            $data_html.= '  </font>';
            $data_html.= '  </div>';
            $data_html.= '  <div class="coupon_on_ss" style="width: 44%;padding-left: 2%;">';
            $data_html.= '  <div class="cs-coupon-small-info bg_grey_dark show_code_div" style="background: #fff !important;">';
			if(empty($coupons['coupon_code'])){
																			
				    if($remove_phill!="Yes"){
            $data_html.= '   <div class="cs-modal-cta-wrapper coupon_click" data-page="sub_category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['sub_categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">';
            $data_html.= '   <div class="cs-coupon-btn " title="Visit the  homepage" style="cursor: pointer;">';
            $data_html.= '   <div class="coupon-btn-text">';
            $data_html.= '   <font style="vertical-align: inherit;">';
            $data_html.= '   <font style="vertical-align: inherit;">';
            $data_html.= '    Gutschein anzeigen';
            $data_html.= '   </font>';
            $data_html.= '   </font><i class="fa fa-chevron-right" aria-hidden="true"></i>';
            $data_html.= '   </div>';
            $data_html.= '   </div>';
            $data_html.= '   </div>';
			 }
			 else{
            $data_html.= '   <button class="new_peal_btn coupon_click" data-page="sub_category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['sub_categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'" data-coupon = "'.$coupons['coupon_type'].'">';
            $data_html.= '   <span class="peal_btn_block">';
			$data_html.= '   <i class="fa fa-euro"></i>'; 
            $data_html.= '   <span class="show_code_cover"><i class="fa fa-euro"></i>    Gutschein anzeigen  </span>';
            $data_html.= '    <span class="back_code '.$coupons['coupons_id'].'" id="">'.$code_text.' </span>';
            $data_html.= '    </span>';
            $data_html.= '    </button>';
			}
				}
				else{
            $data_html.= '    <button class="new_peal_btn coupon_click" data-page="sub_category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['sub_categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'" data-coupon = "'.$coupons['coupon_type'].'">';
            $data_html.= '    <span class="peal_btn_block">';
			$data_html.= '   <i class="fa fa-euro"></i>'; 
            $data_html.= '    <span class="show_code_cover"><i class="fa fa-euro"></i>  Gutschein anzeigen    </span>';
            $data_html.= '    <span class="back_code '.$coupons['coupons_id'].'" id=""> '. $code_text.' </span>';
            $data_html.= '    </span>';
            $data_html.= '    </button>';
			}
            $data_html.= '    </div>';
            $data_html.= '    </div>';
			if(isset($coupons['special_text'])){
            $data_html.= '     <div class="best_title_f"  style="bottom: 136px;">'.$coupons['special_text'].'</div>';
			}
            $data_html.= '    </div>';
            $data_html.= '    </div>';
			
            $data_html.= '    <div class="cs-coupon-more-details">';
            $data_html.= '    <div class="js-toggle-container cat_page">';
			if($coupons['description']==''){
				$data_html.= '     <div class="">'.$coupons['description'].'';
			}
			else{
				$data_html.= '     <div class="cs-toggle-content">'.$coupons['description'].'';
			}
            $data_html.= '    </div>';
            $data_html.= '     <div class="cs-coupon-box-date cs-sub-info-text cs-text-no-break">';
			if($coupons['min_order_price'] > 0 && !empty($coupons['min_order_price']) && $coupons['min_order_price'] != null){ 
            $data_html.= '     <span class="cs-mbw">';
            $data_html.= '     <font style="vertical-align: inherit;">';
            $data_html.= '     <font style="vertical-align: inherit;position: absolute;left: 59%;" ><span class="minimum-setting">Mindest </span>bestellwert  :  '.$coupons['min_order_price'].'&euro; </font>';
            $data_html.= '     </font>';
            $data_html.= '     </span>';
			}
			$data_html.= '     <span>';
			if($coupons['end_date']=='0000-00-00'){
			$data_html.= '     <i class="fa fa-clock-o" style="color: transparent;" aria-hidden="true"></i> ';
			}
			else{
				$data_html.= ' <i class="fa fa-clock-o" aria-hidden="true"></i> ';
			}
			
			if($coupons['end_date']!='0000-00-00'){ 
			$data_html.= '     <font style="vertical-align: inherit;">Läuft ab: '.date('m/d/Y',strtotime($coupons['end_date'])).'</font>';
		    }

			$data_html.= '     </span>';
            $data_html.= '     </div>';
            $data_html.= '      <div class="cs-coupon-mer-link">';
            $data_html.= '      <font style="vertical-align: inherit;">';
            $data_html.= '      <font style="vertical-align: inherit;"> zeige alles </font>';
            $data_html.= '      </font>';
            $data_html.= '      <a href="'.base_url()."home/brands/".$coupons['brands_id'].'" title="zeige alles Gutscheine von '. $brand_name.'">';
            $data_html.= '      <font style="vertical-align: inherit;">';
            $data_html.= '       <font style="vertical-align: inherit;">'.$brand_name.'</font>';
            $data_html.= '      </font>';
            $data_html.= '      </a>';
            $data_html.= '      <font style="vertical-align: inherit;">';
            $data_html.= '      <font style="vertical-align: inherit;"> gutscheine </font>';
            $data_html.= '      </font>';
            $data_html.= '      </div>';
            $data_html.= '      </div>';
            $data_html.= '      </div>';
            $data_html.= '      </div>';
			}  
			} else{
            $data_html.= '      <div class="cs-coupon-box cs-coupon-category " style="display: flex;justify-content: center;font-size: 14px;">';
            $data_html.= '      <div class="cs-coupon-more-details">';
            $data_html.= '      Keine Gutscheine verfügbar';
            $data_html.= '       </div>';
            $data_html.= '       </div>';
			}
            $data_html.= '       </div>';
            
			$data_html.= ' <div id="offers" class="tab-pane fade">';
			if(!empty($just_offers)){
			foreach($just_offers as $key => $coupons){
				$brand_image = $this->db->get_where('brands',array('brands_id'=>$coupons['brands_id']))->row()->brand_image;									
				$brand_name = $this->db->get_where('brands',array('brands_id'=>$coupons['brands_id']))->row()->name;	
				if($coupons['discount_type']=="Percentage"){
					$sign = "%";
				}
				else if($coupons['discount_type']=="Fixed"){
					$sign = "&euro;";
				}
				if(empty($coupons['coupon_code'])){
					$code_text = "No code needed!"; 
				}
				else{
					$code_text = $coupons['coupon_code']; 
				}
				if(!empty($coupons['special_text']) && $key!="0"){ $margin = "margin-top: 30px;"; } else{ $margin = ''; }
			$data_html.= '  <style>  .coupons_padd {  height: 136px;  } </style>';
			$data_html.= '  <div class="cs-coupon-box cs-coupon-category" style="'.$margin.'">';
			$data_html.= '  <div class="cs-flex cs-flex-mobil cs-outer-coupon coupons_padd">';
			$data_html.= '  <div class="cs-coupon-box-cell-1 coupon_click cs-flex cs-flex-mobil" data-page="sub_category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['sub_categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">';
			$data_html.= '  <div class="cs-coupon-box-logo">';
			$data_html.= '  <img class="" src="'.base_url().$brand_imgs_url.$brand_image.'" alt="'.$coupons['short_tagline'].'" title="'.$coupons['short_tagline'].'">';
			$data_html.= '  </div>';
			$data_html.= '  <div class="cs-coupon-logo cs-flex cs-flex-mobil">';
			$data_html.= '  <div class="cs-coupon-logo-line-1">';
			$data_html.= '  <font style="vertical-align: inherit;">';
			$data_html.= '  <font style="vertical-align: inherit;">'.$coupons['discount_value'].$sign.' </font>';
			$data_html.= '  </font>';
			$data_html.= '  </div>';
			$data_html.= '  <div class="cs-coupon-logo-line-3">';
			$data_html.= '  <font style="vertical-align: inherit;">';
			$data_html.= '  <font style="vertical-align: inherit;">Rabatt</font>';
			$data_html.= '  </font>';
			$data_html.= '  </div>';
			$data_html.= '  </div>';
			$data_html.= '  </div>';
			$data_html.= '  <div class="cs-coupon-box-cell-2 cs-flex">';
			$data_html.= '  <div class="cs-coupon-box-description cs-coupon-box-h3">';
			$data_html.= '  <font style="vertical-align: inherit;">';
			$data_html.= '  <font style="vertical-align: inherit;">'.$coupons['short_tagline'].'';
			$data_html.= '  </font>';
			$data_html.= '  </font>';
			$data_html.= '  </div>';
			$data_html.= '  <div class="coupon_on_ss" style="width: 44%;padding-left: 2%;">';
			$data_html.= '  <div class="cs-coupon-small-info bg_grey_dark show_code_div" style="background: #fff !important;">';
			if(empty($coupons['coupon_code'])){
																			
					if($remove_phill!="Yes"){
			$data_html.= '   <div class="cs-modal-cta-wrapper coupon_click" data-page="sub_category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['sub_categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">';
			$data_html.= '   <div class="cs-coupon-btn " title="Visit the  homepage" style="cursor: pointer;">';
			$data_html.= '   <div class="coupon-btn-text">';
			$data_html.= '   <font style="vertical-align: inherit;">';
			$data_html.= '   <font style="vertical-align: inherit;">';
			$data_html.= '    Gutschein anzeigen';
			$data_html.= '   </font>';
			$data_html.= '   </font><i class="fa fa-chevron-right" aria-hidden="true"></i>';
			$data_html.= '   </div>';
			$data_html.= '   </div>';
			$data_html.= '   </div>';
			}
			else{
			$data_html.= '   <button class="new_peal_btn coupon_click" data-page="sub_category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['sub_categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'" data-coupon = "'.$coupons['coupon_type'].'">';
			$data_html.= '   <span class="peal_btn_block">';
			$data_html.= '   <i class="fa fa-euro"></i>'; 
			$data_html.= '   <span class="show_code_cover"><i class="fa fa-euro"></i>    Gutschein anzeigen  </span>';
			$data_html.= '    <span class="back_code '.$coupons['coupons_id'].'" id="">'.$code_text.' </span>';
			$data_html.= '    </span>';
			$data_html.= '    </button>';
			}
				}
				else{
			$data_html.= '    <button class="new_peal_btn coupon_click" data-page="sub_category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['sub_categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'" data-coupon = "'.$coupons['coupon_type'].'">';
			$data_html.= '    <span class="peal_btn_block">';
			$data_html.= '   <i class="fa fa-euro"></i>'; 
			$data_html.= '    <span class="show_code_cover"><i class="fa fa-euro"></i>  Gutschein anzeigen    </span>';
			$data_html.= '    <span class="back_code '.$coupons['coupons_id'].'" id=""> '. $code_text.' </span>';
			$data_html.= '    </span>';
			$data_html.= '    </button>';
			}
			$data_html.= '    </div>';
			$data_html.= '    </div>';
			if(isset($coupons['special_text'])){
				$data_html.= '     <div class="best_title_f"  style="bottom: 136px;">'.$coupons['special_text'].'</div>';
				}
			$data_html.= '    </div>';
			$data_html.= '    </div>';
			$data_html.= '    <div class="cs-coupon-more-details">';
			$data_html.= '    <div class="js-toggle-container cat_page">';
			if($coupons['description']==''){
				$data_html.= '     <div class="">'.$coupons['description'].'';
			}
			else{
				$data_html.= '     <div class="cs-toggle-content">'.$coupons['description'].'';
			}
			$data_html.= '    </div>';
			$data_html.= '     <div class="cs-coupon-box-date cs-sub-info-text cs-text-no-break">';
			if($coupons['min_order_price'] > 0 && !empty($coupons['min_order_price']) && $coupons['min_order_price'] != null){ 
			$data_html.= '     <span class="cs-mbw">';
			$data_html.= '     <font style="vertical-align: inherit;">';
			$data_html.= '     <font style="vertical-align: inherit;position: absolute;left: 59%;" ><span class="minimum-setting">Mindest </span>bestellwert  :  '.$coupons['min_order_price'].'&euro; </font>';
			$data_html.= '     </font>';
			$data_html.= '     </span>';
			}
			$data_html.= '     <span>';
			if($coupons['end_date']=='0000-00-00'){
			$data_html.= '     <i class="fa fa-clock-o" style="color: transparent;" aria-hidden="true"></i> ';
			}
			else{
				$data_html.= ' <i class="fa fa-clock-o" aria-hidden="true"></i> ';
			}
			
			if($coupons['end_date']!='0000-00-00'){ 
			$data_html.= '     <font style="vertical-align: inherit;">Läuft ab: '.date('m/d/Y',strtotime($coupons['end_date'])).'</font>';
		    }

			$data_html.= '     </span>';
			$data_html.= '     </div>';
			$data_html.= '      <div class="cs-coupon-mer-link">';
			$data_html.= '      <font style="vertical-align: inherit;">';
			$data_html.= '      <font style="vertical-align: inherit;"> zeige alles </font>';
			$data_html.= '      </font>';
			$data_html.= '      <a href="'.base_url()."home/brands/".$coupons['brands_id'].'" title="zeige alles Gutscheine von '. $brand_name.'">';
			$data_html.= '      <font style="vertical-align: inherit;">';
			$data_html.= '       <font style="vertical-align: inherit;">'.$brand_name.'</font>';
			$data_html.= '      </font>';
			$data_html.= '      </a>';
			$data_html.= '      <font style="vertical-align: inherit;">';
			$data_html.= '      <font style="vertical-align: inherit;"> gutscheine </font>';
			$data_html.= '      </font>';
			$data_html.= '      </div>';
			$data_html.= '      </div>';
			$data_html.= '      </div>';
			$data_html.= '      </div>';
			}  
			} else{
			$data_html.= '      <div class="cs-coupon-box cs-coupon-category " style="display: flex;justify-content: center;font-size: 14px;">';
			$data_html.= '      <div class="cs-coupon-more-details">';
			$data_html.= '      Keine Gutscheine verfügbar';
			$data_html.= '       </div>';
			$data_html.= '       </div>';
			}
			$data_html.= '       </div>';

			$data_html.= ' <div id="deals" class="tab-pane fade">';
			if(!empty($just_deals)){

			foreach($just_deals as $key => $coupons){
				$brand_image = $this->db->get_where('brands',array('brands_id'=>$coupons['brands_id']))->row()->brand_image;									
				$brand_name = $this->db->get_where('brands',array('brands_id'=>$coupons['brands_id']))->row()->name;	
				if($coupons['discount_type']=="Percentage"){
					$sign = "%";
				}
				else if($coupons['discount_type']=="Fixed"){
					$sign = "&euro;";
				}
				if(empty($coupons['coupon_code'])){
					$code_text = "No code needed!"; 
				}
				else{
					$code_text = $coupons['coupon_code']; 
				}
				if(!empty($coupons['special_text']) && $key!="0"){ $margin = "margin-top: 30px;"; } else{ $margin = ''; }
			$data_html.= '  <style>  .coupons_padd {  height: 136px;  } </style>';
			$data_html.= '  <div class="cs-coupon-box cs-coupon-category" style="'.$margin.'">';
			$data_html.= '  <div class="cs-flex cs-flex-mobil cs-outer-coupon coupons_padd">';
			$data_html.= '  <div class="cs-coupon-box-cell-1 coupon_click cs-flex cs-flex-mobil" data-page="sub_category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['sub_categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">';
			$data_html.= '  <div class="cs-coupon-box-logo">';
			$data_html.= '  <img class="" src="'.base_url().$brand_imgs_url.$brand_image.'" alt="'.$coupons['short_tagline'].'" title="'.$coupons['short_tagline'].'">';
			$data_html.= '  </div>';
			$data_html.= '  <div class="cs-coupon-logo cs-flex cs-flex-mobil">';
			$data_html.= '  <div class="cs-coupon-logo-line-1">';
			$data_html.= '  <font style="vertical-align: inherit;">';
			$data_html.= '  <font style="vertical-align: inherit;">'.$coupons['discount_value'].$sign.' </font>';
			$data_html.= '  </font>';
			$data_html.= '  </div>';
			$data_html.= '  <div class="cs-coupon-logo-line-3">';
			$data_html.= '  <font style="vertical-align: inherit;">';
			$data_html.= '  <font style="vertical-align: inherit;">Rabatt</font>';
			$data_html.= '  </font>';
			$data_html.= '  </div>';
			$data_html.= '  </div>';
			$data_html.= '  </div>';
			$data_html.= '  <div class="cs-coupon-box-cell-2 cs-flex">';
			$data_html.= '  <div class="cs-coupon-box-description cs-coupon-box-h3">';
			$data_html.= '  <font style="vertical-align: inherit;">';
			$data_html.= '  <font style="vertical-align: inherit;">'.$coupons['short_tagline'].'';
			$data_html.= '  </font>';
			$data_html.= '  </font>';
			$data_html.= '  </div>';
			$data_html.= '  <div class="coupon_on_ss" style="width: 44%;padding-left: 2%;">';
			$data_html.= '  <div class="cs-coupon-small-info bg_grey_dark show_code_div" style="background: #fff !important;">';
			if(empty($coupons['coupon_code'])){
																			
					if($remove_phill!="Yes"){
			$data_html.= '   <div class="cs-modal-cta-wrapper coupon_click" data-page="sub_category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['sub_categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">';
			$data_html.= '   <div class="cs-coupon-btn " title="Visit the  homepage" style="cursor: pointer;">';
			$data_html.= '   <div class="coupon-btn-text">';
			$data_html.= '   <font style="vertical-align: inherit;"><i class="fa fa-euro"></i>';
			$data_html.= '   <font style="vertical-align: inherit;">';
			$data_html.= '    Gutschein anzeigen';
			$data_html.= '   </font>';
			$data_html.= '   </font><i class="fa fa-chevron-right" aria-hidden="true"></i>';
			$data_html.= '   </div>';
			$data_html.= '   </div>';
			$data_html.= '   </div>';
			}
			else{
			$data_html.= '   <button class="new_peal_btn coupon_click" data-page="sub_category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['sub_categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'" data-coupon = "'.$coupons['coupon_type'].'">';
			$data_html.= '   <span class="peal_btn_block">';
			$data_html.= '   <i class="fa fa-euro"></i>'; 
			$data_html.= '   <span class="show_code_cover"><i class="fa fa-euro"></i>    Gutschein anzeigen  </span>';
			$data_html.= '    <span class="back_code '.$coupons['coupons_id'].'" id="">'.$code_text.' </span>';
			$data_html.= '    </span>';
			$data_html.= '    </button>';
			}
				}
				else{
			$data_html.= '    <button class="new_peal_btn coupon_click" data-page="sub_category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['sub_categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'" data-coupon = "'.$coupons['coupon_type'].'">';
			$data_html.= '    <span class="peal_btn_block">';
			$data_html.= '   <i class="fa fa-euro"></i>'; 
			$data_html.= '    <span class="show_code_cover"><i class="fa fa-euro"></i>  Gutschein anzeigen    </span>';
			$data_html.= '    <span class="back_code '.$coupons['coupons_id'].'" id=""> '. $code_text.' </span>';
			$data_html.= '    </span>';
			$data_html.= '    </button>';
			}
			$data_html.= '    </div>';
			$data_html.= '    </div>';
			if(isset($coupons['special_text'])){
				$data_html.= '     <div class="best_title_f"  style="bottom: 136px;">'.$coupons['special_text'].'</div>';
				}
			$data_html.= '    </div>';
			$data_html.= '    </div>';
			$data_html.= '    <div class="cs-coupon-more-details">';
			$data_html.= '    <div class="js-toggle-container cat_page">';
			if($coupons['description']==''){
				$data_html.= '     <div class="">'.$coupons['description'].'';
			}
			else{
				$data_html.= '     <div class="cs-toggle-content">'.$coupons['description'].'';
			}
			$data_html.= '    </div>';
			$data_html.= '     <div class="cs-coupon-box-date cs-sub-info-text cs-text-no-break">';
			if($coupons['min_order_price'] > 0 && !empty($coupons['min_order_price']) && $coupons['min_order_price'] != null){ 
			$data_html.= '     <span class="cs-mbw">';
			$data_html.= '     <font style="vertical-align: inherit;">';
			$data_html.= '     <font style="vertical-align: inherit;position: absolute;left: 59%;" ><span class="minimum-setting">Mindest </span>bestellwert :  '.$coupons['min_order_price'].'&euro; </font>';
			$data_html.= '     </font>';
			$data_html.= '     </span>';
			}
			$data_html.= '     <span>';
			if($coupons['end_date']=='0000-00-00'){
			$data_html.= '     <i class="fa fa-clock-o" style="color: transparent;" aria-hidden="true"></i> ';
			}
			else{
				$data_html.= ' <i class="fa fa-clock-o" aria-hidden="true"></i> ';
			}
			
			if($coupons['end_date']!='0000-00-00'){ 
			$data_html.= '     <font style="vertical-align: inherit;">Läuft ab: '.date('m/d/Y',strtotime($coupons['end_date'])).'</font>';
		    }

			$data_html.= '     </span>';
			$data_html.= '     </div>';
			$data_html.= '      <div class="cs-coupon-mer-link">';
			$data_html.= '      <font style="vertical-align: inherit;">';
			$data_html.= '      <font style="vertical-align: inherit;"> zeige alles </font>';
			$data_html.= '      </font>';
			$data_html.= '      <a href="'.base_url()."home/brands/".$coupons['brands_id'].'" title="zeige alles Gutscheine von '. $brand_name.'">';
			$data_html.= '      <font style="vertical-align: inherit;">';
			$data_html.= '       <font style="vertical-align: inherit;">'.$brand_name.'</font>';
			$data_html.= '      </font>';
			$data_html.= '      </a>';
			$data_html.= '      <font style="vertical-align: inherit;">';
			$data_html.= '      <font style="vertical-align: inherit;"> gutscheine </font>';
			$data_html.= '      </font>';
			$data_html.= '      </div>';
			$data_html.= '      </div>';
			$data_html.= '      </div>';
			$data_html.= '      </div>';
			}  
			} else{
			$data_html.= '      <div class="cs-coupon-box cs-coupon-category " style="display: flex;justify-content: center;font-size: 14px;">';
			$data_html.= '      <div class="cs-coupon-more-details">';
			$data_html.= '      Keine Gutscheine verfügbar';
			$data_html.= '       </div>';
			$data_html.= '       </div>';
			}
			$data_html.= '       </div>';

			$data_html.= ' <div id="shipping" class="tab-pane fade">';

			if(!empty($just_shipping)){
				
			foreach($just_shipping as $key => $coupons){
				$brand_image = $this->db->get_where('brands',array('brands_id'=>$coupons['brands_id']))->row()->brand_image;									
				$brand_name = $this->db->get_where('brands',array('brands_id'=>$coupons['brands_id']))->row()->name;	
				if($coupons['discount_type']=="Percentage"){
					$sign = "%";
				}
				else if($coupons['discount_type']=="Fixed"){
					$sign = "&euro;";
				}
				if(empty($coupons['coupon_code'])){
					$code_text = "No code needed!"; 
				}
				else{
					$code_text = $coupons['coupon_code']; 
				}
				if(!empty($coupons['special_text']) && $key!="0"){ $margin = "margin-top: 30px;"; } else{ $margin = ''; }
			$data_html.= '  <style>  .coupons_padd {  height: 136px;  } </style>';
			$data_html.= '  <div class="cs-coupon-box cs-coupon-category" style="'.$margin.'">';
			$data_html.= '  <div class="cs-flex cs-flex-mobil cs-outer-coupon coupons_padd">';
			$data_html.= '  <div class="cs-coupon-box-cell-1 coupon_click cs-flex cs-flex-mobil" data-page="sub_category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['sub_categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">';
			$data_html.= '  <div class="cs-coupon-box-logo">';
			$data_html.= '  <img class="" src="'.base_url().$brand_imgs_url.$brand_image.'" alt="'.$coupons['short_tagline'].'" title="'.$coupons['short_tagline'].'">';
			$data_html.= '  </div>';
			$data_html.= '  <div class="cs-coupon-logo cs-flex cs-flex-mobil">';
			$data_html.= '  <div class="cs-coupon-logo-line-1">';
			$data_html.= '  <font style="vertical-align: inherit;">';
			$data_html.= '  <font style="vertical-align: inherit;">'.$coupons['discount_value'].$sign.' </font>';
			$data_html.= '  </font>';
			$data_html.= '  </div>';
			$data_html.= '  <div class="cs-coupon-logo-line-3">';
			$data_html.= '  <font style="vertical-align: inherit;">';
			$data_html.= '  <font style="vertical-align: inherit;">Rabatt</font>';
			$data_html.= '  </font>';
			$data_html.= '  </div>';
			$data_html.= '  </div>';
			$data_html.= '  </div>';
			$data_html.= '  <div class="cs-coupon-box-cell-2 cs-flex">';
			$data_html.= '  <div class="cs-coupon-box-description cs-coupon-box-h3">';
			$data_html.= '  <font style="vertical-align: inherit;">';
			$data_html.= '  <font style="vertical-align: inherit;">'.$coupons['short_tagline'].'';
			$data_html.= '  </font>';
			$data_html.= '  </font>';
			$data_html.= '  </div>';
			$data_html.= '  <div class="coupon_on_ss" style="width: 44%;padding-left: 2%;">';
			$data_html.= '  <div class="cs-coupon-small-info bg_grey_dark show_code_div" style="background: #fff !important;">';
			if(empty($coupons['coupon_code'])){
																			
					if($remove_phill!="Yes"){
			$data_html.= '   <div class="cs-modal-cta-wrapper coupon_click" data-page="sub_category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['sub_categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">';
			$data_html.= '   <div class="cs-coupon-btn " title="Visit the  homepage" style="cursor: pointer;">';
			$data_html.= '   <div class="coupon-btn-text">';
			$data_html.= '   <font style="vertical-align: inherit;">';
			$data_html.= '   <i class="fa fa-euro"></i>'; 
			$data_html.= '   <font style="vertical-align: inherit;">';
			$data_html.= '    Gutschein anzeigen';
			$data_html.= '   </font>';
			$data_html.= '   </font><i class="fa fa-chevron-right" aria-hidden="true"></i>';
			$data_html.= '   </div>';
			$data_html.= '   </div>';
			$data_html.= '   </div>';
			}
			else{
			$data_html.= '   <button class="new_peal_btn coupon_click" data-page="sub_category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['sub_categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'" data-coupon = "'.$coupons['coupon_type'].'">';
			$data_html.= '   <span class="peal_btn_block">';
			$data_html.= '   <i class="fa fa-euro"></i>'; 
			$data_html.= '   <span class="show_code_cover"><i class="fa fa-euro"></i>    Gutschein anzeigen  </span>';
			$data_html.= '    <span class="back_code '.$coupons['coupons_id'].'" id="">'.$code_text.' </span>';
			$data_html.= '    </span>';
			$data_html.= '    </button>';
			}
				}
				else{
			$data_html.= '    <button class="new_peal_btn coupon_click" data-page="sub_category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['sub_categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'" data-coupon = "'.$coupons['coupon_type'].'">';
			$data_html.= '    <span class="peal_btn_block">';
			$data_html.= '   <i class="fa fa-euro"></i>'; 
			$data_html.= '    <span class="show_code_cover"><i class="fa fa-euro"></i>  Gutschein anzeigen    </span>';
			$data_html.= '    <span class="back_code '.$coupons['coupons_id'].'" id=""> '. $code_text.' </span>';
			$data_html.= '    </span>';
			$data_html.= '    </button>';
			}
			$data_html.= '    </div>';
			$data_html.= '    </div>';
			if(isset($coupons['special_text'])){
				$data_html.= '     <div class="best_title_f"  style="bottom: 136px;">'.$coupons['special_text'].'</div>';
				}
			$data_html.= '    </div>';
			$data_html.= '    </div>';
			$data_html.= '    <div class="cs-coupon-more-details">';
			$data_html.= '    <div class="js-toggle-container cat_page">';
			if($coupons['description']==''){
				$data_html.= '     <div class="">'.$coupons['description'].'';
			}
			else{
				$data_html.= '     <div class="cs-toggle-content">'.$coupons['description'].'';
			}
			$data_html.= '    </div>';
			$data_html.= '     <div class="cs-coupon-box-date cs-sub-info-text cs-text-no-break">';
			if($coupons['min_order_price'] > 0 && !empty($coupons['min_order_price']) && $coupons['min_order_price'] != null){ 
			$data_html.= '     <span class="cs-mbw">';
			$data_html.= '     <font style="vertical-align: inherit;">';
			$data_html.= '     <font style="vertical-align: inherit;position: absolute;left: 59%;" ><span class="minimum-setting">Mindest </span>bestellwert :  '.$coupons['min_order_price'].'&euro; </font>';
			$data_html.= '     </font>';
			$data_html.= '     </span>';
			}
			$data_html.= '     <span>';
			if($coupons['end_date']=='0000-00-00'){
			$data_html.= '     <i class="fa fa-clock-o" style="color: transparent;" aria-hidden="true"></i> ';
			}
			else{
				$data_html.= ' <i class="fa fa-clock-o" aria-hidden="true"></i> ';
			}
			
			if($coupons['end_date']!='0000-00-00'){ 
			$data_html.= '     <font style="vertical-align: inherit;">Läuft ab: '.date('m/d/Y',strtotime($coupons['end_date'])).'</font>';
		    }

			$data_html.= '     </span>';
			$data_html.= '     </div>';
			$data_html.= '      <div class="cs-coupon-mer-link">';
			$data_html.= '      <font style="vertical-align: inherit;">';
			$data_html.= '      <font style="vertical-align: inherit;"> zeige alles </font>';
			$data_html.= '      </font>';
			$data_html.= '      <a href="'.base_url()."home/brands/".$coupons['brands_id'].'" title="zeige alles Gutscheine von '. $brand_name.'">';
			$data_html.= '      <font style="vertical-align: inherit;">';
			$data_html.= '       <font style="vertical-align: inherit;">'.$brand_name.'</font>';
			$data_html.= '      </font>';
			$data_html.= '      </a>';
			$data_html.= '      <font style="vertical-align: inherit;">';
			$data_html.= '      <font style="vertical-align: inherit;"> gutscheine </font>';
			$data_html.= '      </font>';
			$data_html.= '      </div>';
			$data_html.= '      </div>';
			$data_html.= '      </div>';
			$data_html.= '      </div>';
			}  
			} else{
			$data_html.= '      <div class="cs-coupon-box cs-coupon-category " style="display: flex;justify-content: center;font-size: 14px;">';
			$data_html.= '      <div class="cs-coupon-more-details">';
			$data_html.= '      Keine Gutscheine verfügbar';
			$data_html.= '       </div>';
			$data_html.= '       </div>';
			}
			$data_html.= '       </div>';

			$data_html.= ' <div id="items" class="tab-pane fade">';

			if(!empty($just_free)){
				
			foreach($just_free as $key => $coupons){
				$brand_image = $this->db->get_where('brands',array('brands_id'=>$coupons['brands_id']))->row()->brand_image;									
				$brand_name = $this->db->get_where('brands',array('brands_id'=>$coupons['brands_id']))->row()->name;	
				if($coupons['discount_type']=="Percentage"){
					$sign = "%";
				}
				else if($coupons['discount_type']=="Fixed"){
					$sign = "&euro;";
				}
				if(empty($coupons['coupon_code'])){
					$code_text = "No code needed!"; 
				}
				else{
					$code_text = $coupons['coupon_code']; 
				}
				if(!empty($coupons['special_text']) && $key!="0"){ $margin = "margin-top: 30px;"; } else{ $margin = ''; }
			$data_html.= '  <style>  .coupons_padd {  height: 136px;  } </style>';
			$data_html.= '  <div class="cs-coupon-box cs-coupon-category" style="'.$margin.'">';
			$data_html.= '  <div class="cs-flex cs-flex-mobil cs-outer-coupon coupons_padd">';
			$data_html.= '  <div class="cs-coupon-box-cell-1 coupon_click cs-flex cs-flex-mobil" data-page="sub_category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['sub_categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">';
			$data_html.= '  <div class="cs-coupon-box-logo">';
			$data_html.= '  <img class="" src="'.base_url().$brand_imgs_url.$brand_image.'" alt="'.$coupons['short_tagline'].'" title="'.$coupons['short_tagline'].'">';
			$data_html.= '  </div>';
			$data_html.= '  <div class="cs-coupon-logo cs-flex cs-flex-mobil">';
			$data_html.= '  <div class="cs-coupon-logo-line-1">';
			$data_html.= '  <font style="vertical-align: inherit;">';
			$data_html.= '  <font style="vertical-align: inherit;">'.$coupons['discount_value'].$sign.' </font>';
			$data_html.= '  </font>';
			$data_html.= '  </div>';
			$data_html.= '  <div class="cs-coupon-logo-line-3">';
			$data_html.= '  <font style="vertical-align: inherit;">';
			$data_html.= '  <font style="vertical-align: inherit;">Rabatt</font>';
			$data_html.= '  </font>';
			$data_html.= '  </div>';
			$data_html.= '  </div>';
			$data_html.= '  </div>';
			$data_html.= '  <div class="cs-coupon-box-cell-2 cs-flex">';
			$data_html.= '  <div class="cs-coupon-box-description cs-coupon-box-h3">';
			$data_html.= '  <font style="vertical-align: inherit;">';
			$data_html.= '  <font style="vertical-align: inherit;">'.$coupons['short_tagline'].'';
			$data_html.= '  </font>';
			$data_html.= '  </font>';
			$data_html.= '  </div>';
			$data_html.= '  <div class="coupon_on_ss" style="width: 44%;padding-left: 2%;">';
			$data_html.= '  <div class="cs-coupon-small-info bg_grey_dark show_code_div" style="background: #fff !important;">';
			if(empty($coupons['coupon_code'])){
																			
					if($remove_phill!="Yes"){
			$data_html.= '   <div class="cs-modal-cta-wrapper coupon_click" data-page="sub_category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['sub_categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">';
			$data_html.= '   <div class="cs-coupon-btn " title="Visit the  homepage" style="cursor: pointer;">';
			$data_html.= '   <div class="coupon-btn-text">';
			$data_html.= '   <font style="vertical-align: inherit;">';
			$data_html.= '   <i class="fa fa-euro"></i>'; 
			$data_html.= '   <font style="vertical-align: inherit;">';
			$data_html.= '    Gutschein anzeigen';
			$data_html.= '   </font>';
			$data_html.= '   </font><i class="fa fa-chevron-right" aria-hidden="true"></i>';
			$data_html.= '   </div>';
			$data_html.= '   </div>';
			$data_html.= '   </div>';
			}
			else{
			$data_html.= '   <button class="new_peal_btn coupon_click" data-page="sub_category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['sub_categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'" data-coupon = "'.$coupons['coupon_type'].'">';
			$data_html.= '   <span class="peal_btn_block">';
			$data_html.= '   <i class="fa fa-euro"></i>'; 
			$data_html.= '   <span class="show_code_cover"><i class="fa fa-euro"></i>    Gutschein anzeigen  </span>';
			$data_html.= '    <span class="back_code '.$coupons['coupons_id'].'" id="">'.$code_text.' </span>';
			$data_html.= '    </span>';
			$data_html.= '    </button>';
			}
				}
				else{
			$data_html.= '    <button class="new_peal_btn coupon_click" data-page="sub_category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['sub_categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'" data-coupon = "'.$coupons['coupon_type'].'">';
			$data_html.= '    <span class="peal_btn_block">';
			$data_html.= '    <span class="show_code_cover"><i class="fa fa-euro"></i>  Gutschein anzeigen    </span>';
			$data_html.= '    <span class="back_code '.$coupons['coupons_id'].'" id=""> '. $code_text.' </span>';
			$data_html.= '    </span>';
			$data_html.= '    </button>';
			}
			$data_html.= '    </div>';
			$data_html.= '    </div>';
			if(isset($coupons['special_text'])){
				$data_html.= '     <div class="best_title_f"  style="bottom: 136px;">'.$coupons['special_text'].'</div>';
				}
			$data_html.= '    </div>';
			$data_html.= '    </div>';
			$data_html.= '    <div class="cs-coupon-more-details">';
			$data_html.= '    <div class="js-toggle-container cat_page">';
			if($coupons['description']==''){
				$data_html.= '     <div class="">'.$coupons['description'].'';
			}
			else{
				$data_html.= '     <div class="cs-toggle-content">'.$coupons['description'].'';
			}
			
			$data_html.= '    </div>';
			$data_html.= '     <div class="cs-coupon-box-date cs-sub-info-text cs-text-no-break">';
			if($coupons['min_order_price'] > 0 && !empty($coupons['min_order_price']) && $coupons['min_order_price'] != null){ 
			$data_html.= '     <span class="cs-mbw">';
			$data_html.= '     <font style="vertical-align: inherit;">';
			$data_html.= '     <font style="vertical-align: inherit;position: absolute;left: 59%;" ><span class="minimum-setting">Mindest </span>bestellwert :  '.$coupons['min_order_price'].'&euro; </font>';
			$data_html.= '     </font>';
			$data_html.= '     </span>';
			}
			
			$data_html.= '     <span>';
			if($coupons['end_date']=='0000-00-00'){
			$data_html.= '     <i class="fa fa-clock-o" style="color: transparent;" aria-hidden="true"></i> ';
			}
			else{
				$data_html.= ' <i class="fa fa-clock-o" aria-hidden="true"></i> ';
			}
			
			if($coupons['end_date']!='0000-00-00'){ 
			$data_html.= '     <font style="vertical-align: inherit;">Läuft ab: '.date('m/d/Y',strtotime($coupons['end_date'])).'</font>';
		    }

			$data_html.= '     </span>';
			
			$data_html.= '     </div>';
			$data_html.= '      <div class="cs-coupon-mer-link">';
			$data_html.= '      <font style="vertical-align: inherit;">';
			$data_html.= '      <font style="vertical-align: inherit;"> zeige alles </font>';
			$data_html.= '      </font>';
			$data_html.= '      <a href="'.base_url()."home/brands/".$coupons['brands_id'].'" title="zeige alles Gutscheine von '. $brand_name.'">';
			$data_html.= '      <font style="vertical-align: inherit;">';
			$data_html.= '       <font style="vertical-align: inherit;">'.$brand_name.'</font>';
			$data_html.= '      </font>';
			$data_html.= '      </a>';
			$data_html.= '      <font style="vertical-align: inherit;">';
			$data_html.= '      <font style="vertical-align: inherit;"> gutscheine </font>';
			$data_html.= '      </font>';
			$data_html.= '      </div>';
			$data_html.= '      </div>';
			$data_html.= '      </div>';
			$data_html.= '      </div>';
			}  
			} else{
			$data_html.= '      <div class="cs-coupon-box cs-coupon-category " style="display: flex;justify-content: center;font-size: 14px;">';
			$data_html.= '      <div class="cs-coupon-more-details">';
			$data_html.= '      Keine Gutscheine verfügbar';
			$data_html.= '       </div>';
			$data_html.= '       </div>';
			}
			$data_html.= '       </div>';
			
            $data_html.= '       </div>';
			echo $data_html; exit;
	    }
	 }	

	/***** About Us *********/
	public function about_us($param1 = '', $param2 = '', $param3 = ''){
		$get_page_type_id = $this->db->get_where('page_types', array('page_name'=>'Home'))->row()->page_types_id;
		$top_right_newsletter = $this->db->get_where('static_content', array('type'=>'other_footer_pages_newsletter', 'page_types_id'=>$get_page_type_id))->row_array();

		$data['top_right_newsletter'] 	= $top_right_newsletter;
		$data['page_content'] 	= $this->db->get_where('static_pages', array('page_name'=>'about_us'))->row_array();
		$data['page_title'] 	= 'About Us';
		$data['page_sub_title'] = '';
		$data['page_name'] 		= 'about_us';
		$this->load->view('home/index', $data);
	}
	/***** About Us *********/
		/***** Imprints *********/
	public function imprints($param1 = '', $param2 = '', $param3 = ''){
		$get_page_type_id = $this->db->get_where('page_types', array('page_name'=>'Home'))->row()->page_types_id;
		$top_right_newsletter = $this->db->get_where('static_content', array('type'=>'other_footer_pages_newsletter', 'page_types_id'=>$get_page_type_id))->row_array();

		$data['top_right_newsletter'] 	= $top_right_newsletter;
		$data['page_content'] 	= $this->db->get_where('static_pages', array('page_name'=>'imprints'))->row_array();
		$data['page_title'] 	= 'Imprints';
		$data['page_sub_title'] = '';
		$data['page_name'] 		= 'imprints';
		$this->load->view('home/index', $data);
	} 
	/***** Imprints *********/
	
	/*** Advertise *********/
	public function advertise($param1 = '', $param2 = '', $param3 = ''){
		$get_page_type_id = $this->db->get_where('page_types', array('page_name'=>'Home'))->row()->page_types_id;
		$top_right_newsletter = $this->db->get_where('static_content', array('type'=>'other_footer_pages_newsletter', 'page_types_id'=>$get_page_type_id))->row_array();

		$data['top_right_newsletter'] 	= $top_right_newsletter;
		$data['page_content'] 	= $this->db->get_where('static_pages', array('page_name'=>'advertise'))->row_array();
		$data['page_title'] 	= 'Advertise';
		$data['page_sub_title'] = '';
		$data['page_name'] 		= 'advertise';
		$this->load->view('home/index', $data);
	} 
	/***** Advertise *********/
	/***** Privacy Policy *********/
	public function privacy_policy($param1 = '', $param2 = '', $param3 = ''){
		$get_page_type_id = $this->db->get_where('page_types', array('page_name'=>'Home'))->row()->page_types_id;
		$top_right_newsletter = $this->db->get_where('static_content', array('type'=>'other_footer_pages_newsletter', 'page_types_id'=>$get_page_type_id))->row_array();

		$data['top_right_newsletter'] 	= $top_right_newsletter;
		$data['page_content'] 	= $this->db->get_where('static_pages', array('page_name'=>'privacy_policy'))->row_array();
		$data['page_title'] 	= 'Privacy Policy';
		$data['page_sub_title'] = '';
		$data['page_name'] 		= 'privacy_policy';
		$this->load->view('home/index', $data);
	}
	/***** Privacy Policy *********/
	/***** Contact Us *********/
	public function contact_us($param1 = '', $param2 = '', $param3 = ''){
	
		  if($param1=='send'){
			$system_name = $this->db->get_where('system_settings',array('type'=>'system_name'))->row()->description;
			$to = $this->db->get_where('system_settings',array('type'=>'customer_support_email'))->row()->description;
			
           /*  $saveData['gender']        = $this->input->post('gender'); */
            $saveData['name']          = $this->input->post('name');
            $saveData['email']         = $this->input->post('email');
            $saveData['subject']       = $this->input->post('subject');
            $saveData['message']       = $this->input->post('body');
            $saveData['admin_response']= "No";
            $saveData['date_added']    = date('Y-m-d h:i:sa');
            $result = $this->db->insert('contact_us',$saveData);
			$insert_id = $this->db->insert_id();
            if($result){		
				$sub = "$system_name customer support";
				$msg = "Sender details :"."<br>";
				if($saveData['name']!=''){
					$msg .= "Name : ".$saveData['name']."<br>";
				}
				if($saveData['email']!=''){
					$msg .= "Email : ".$saveData['email']."<br>";
				}
				if($saveData['subject']!=''){
					$msg .= "Subject : ".$saveData['subject']."<br>";
				}
				if($saveData['message']!=''){
					$msg .= "Message : ".$saveData['message'];
				}
			//  echo $msg; exit;
				$this->Email_model->do_email($msg, $sub, $to);	
				$this->session->set_flashdata('msg_success', 'Data Added Successfully');
			}else{
				$this->session->set_flashdata('msg_error', 'Oops!something went wrong');
			}
			redirect('home/contact_us', 'refresh');
        }
		$get_page_type_id = $this->db->get_where('page_types', array('page_name'=>'Home'))->row()->page_types_id;
		$top_right_newsletter = $this->db->get_where('static_content', array('type'=>'other_footer_pages_newsletter', 'page_types_id'=>$get_page_type_id))->row_array();

		$data['top_right_newsletter'] 	= $top_right_newsletter;
		$data['page_title'] 	= 'Contact Us';
		$data['page_sub_title'] = '';
		$data['page_name'] 		= 'contact_us';
		$this->load->view('home/index', $data);
	}
	/***** Contact Us *********/
	/* Visiter subscription */
	
	public function subscription(){
	    $email   = $this->input->post('email');
		$privacy = $this->input->post('privacy');
		$page_id = $this->input->post('page_id');

        if(!empty($this->input->post('letter_type'))){
			$save_data['type'] = $this->input->post('letter_type');
		}		
	
		$check_record = $this->db->get_where('newsletter_subscription', array('email'=> $email,'status !='=>"un-subscribe",'page_types_id'=>$page_id ))->num_rows();
	 	// echo $this->db->last_query(); exit; 
		 if($check_record >= 1){			
			echo 'already';
		} else { 
			$save_data['email'] = $email;
			$privacy_check = 'Yes';
			if($privacy == 0){
				$privacy_check = 'No';				
			}
			$save_data['accept_privacy'] = $privacy_check;
			$save_data['page_types_id'] = $page_id;
			$save_data['date_added'] = date('Y-m-d H:i:s');
			$save_data['status']     = "Inactive";
			$this->db->insert('newsletter_subscription', $save_data);
			$subs_id = $this->db->insert_id();
			$email_template = $this->db->get_where('email_templates', array('type'=>'newsletter_confirmation'))->row();
			$system_name = $this->db->get_where('system_settings',array('type'=>'system_name'))->row()->description;
			$subject = $email_template->subject;
			
		    $message = file_get_contents(base_url()."home/confirmation_mail/".$subs_id);
		    // $result= $this->Email_model->do_email($message, $subject, $email);
		    $result = 1;
			if($result){
				echo 'success';
			}
			 
		 }  
		exit;
	}
	public function alert_subscription(){
	    $email    = $this->input->post('email');
		$privacy  = $this->input->post('privacy');
		$brnds_id = $this->input->post('brnds_id');
        			
		$check_record = $this->db->get_where('voucherr_alert_subscriber', array('email'=> $email,'status !='=>"un-subscribe",'brands_id'=>$brnds_id))->num_rows();
		 if($check_record >= 1){			
			echo 'already';
		} else { 
			$save_data['email'] = $email;
			$privacy_check = 'Yes';
			if($privacy == 0){
				$privacy_check = 'No';				
			}
			$save_data['privacy'] = $privacy_check;
			$save_data['date_added'] = date('Y-m-d H:i:s');
			$save_data['status']     = "Inactive";
			$save_data['brands_id']     = $brnds_id;
			$this->db->insert('voucherr_alert_subscriber', $save_data);
			$subs_id = $this->db->insert_id();	
			$subject = "Alert Activation";
		    $message = file_get_contents(base_url()."home/voucherr_alert/".$subs_id);
		    // $result= $this->Email_model->do_email($message, $subject, $email);
			$result= 1;
			if($result){
				echo 'success';
			}
			 
		 }  
		exit;
	}
	public function newletter_email(){ 
		
			$all_subscriber = $this->db->get_where('newsletter_subscription',array('status'=>'Active','email_verfied'=>'Yes'))->result_array();
			$email_template = $this->db->get_where('email_templates', array('type'=>'voucherr_email'))->row();
			$system_name    = $this->db->get_where('system_settings',array('type'=>'system_name'))->row()->description;
	    	$subject = $email_template->subject;
			/* echo "<pre>";
			print_r($all_subscriber);
			echo "</pre>"; */
			foreach($all_subscriber as $key => $all_subscr){
			  $email = $all_subscr['email'];
	
			    $message = file_get_contents(base_url()."home/voucherr_mail/".$all_subscr['newsletter_subscription_id']);
				 
			
			    // $result= $this->Email_model->do_email($message, $subject, $email);
				$result = 1;
				if($result){
					echo '<br>success<br>';
				}
				else{
					echo "error";
				}
              				
			}		
	}
   
	/* Visiter subscription */
	function blog_info(){
		$upload_url             = $this->db->get_where('system_settings',array('type'=>'blogs_img_url'))->row()->description;
		$data['image_url']    	= $upload_url;
		                         /* $this->db->limit('4'); */
		$data['blog_details'] 	= $this->db->get_where('voucherr_blogs',array('status'=>'Active'))->result_array();
		$data['page_title'] 	= 'Voucher blog info';
		$data['page_sub_title'] = '';
		$data['page_name'] 		= 'voucher_blog_info';
		$this->load->view('home/index', $data);
	}
	function blog_details($param1=""){
		$upload_url             = $this->db->get_where('system_settings',array('type'=>'blogs_img_url'))->row()->description;
		$data['image_url']    	= $upload_url;
		$data['blog_row'] 	= $this->db->get_where('voucherr_blogs',array('status'=>'Active','voucherr_blogs_id'=>$param1))->row_array();
		$data['page_title'] 	= 'Voucher blog details';
		$data['page_sub_title'] = '';
		$data['page_name'] 		= 'blog_details';
		$this->load->view('home/index', $data);
	}
	function voucherr_mail($param="",$param2=""){
 		 
		$data['coupons_list'] = $_GET['key'];
		$data['subscribr_id'] = $param;
	    $data['param2'] = $param2; 
		$data['page_name'] = "";
		$this->load->view('home/voucherr_mail', $data);
	}
	function unsubscribe($param1="",$param2="",$param3=""){

		if($param1=="check"){	  
          $checks = $this->db->get_where('newsletter_subscription',array('newsletter_subscription_id'=>$_POST['subs_id'],'status'=>'un-subscribe'))->num_rows();
		  echo $checks; exit;
		}
		if($param1=="check_alert"){	  
			$checks = $this->db->get_where('voucherr_alert_subscriber',array('voucherr_alert_subscriber_id'=>$_POST['subs_id'],'status'=>'un-subscribe'))->num_rows();
			echo $checks; exit;
		  }
        if($param1=="unsub_alert"){
			$update['un_sub_reason'] = $_POST['reason']; 
			$update['status']        = "un-subscribe"; 
			$update['modified_date'] = date('Y-m-d H:i:s'); 
			$this->db->where('voucherr_alert_subscriber_id', $param2);
			$result = 	$this->db->update('voucherr_alert_subscriber', $update);
	
			if($result){
				$this->session->set_flashdata('msg_success', ' Unsubscribe successfully');
				redirect(base_url().'home/brands/'.$param3."/unsuscribed", 'refresh');
			} 
		}
		$update['un_sub_reason'] = $_POST['reason']; 
		$update['status']        = "un-subscribe"; 
		$update['modified_date'] = date('Y-m-d H:i:s'); 
		$this->db->where('newsletter_subscription_id', $param1);
		$result = 	$this->db->update('newsletter_subscription', $update);

		if($result){
			$this->session->set_flashdata('msg_success', ' Unsubscribe successfully');
			redirect(base_url().'home', 'refresh');
		}
		

	
	}
	function voucherr_alert_mail($param="",$param2=""){
		
		$data['brands_id'] = $param;
	    $data['param2']    = $param2;
		$this->load->view('home/alert_voucher_email', $data);
	}
	function unsuscribed($param="",$param2=""){	
		$this->db->where("voucherr_alert_subscriber_id",$param);
        $result = $this->db->delete('voucherr_alert_subscriber');
		redirect(base_url().'home/brands/'.$param2."/unsuscribed", 'refresh');
	}
	function voucherr_alert($param=""){
		$all_subs = $this->db->get_where('voucherr_alert_subscriber', array('voucherr_alert_subscriber_id'=>$param))->row();
		$email    = $all_subs->email;
		$brand_id = $all_subs->brands_id;	
		$base_64_code         = base64_encode($param."_activate_".$brand_id);
		$data['subscribr_id'] = $param;
		$data['base_64_code'] = $base_64_code;
		$data['email']        = $email;
		$data['brand_name']   = $this->db->get_where('brands',array('brands_id'=>$brand_id))->row()->name;
		$data['brands_id']    = $brand_id;
		
		$this->load->view('home/alert_email', $data);
	}
	function activate_alert($param=""){
		$decode_id = base64_decode($param);
		$id_array = explode('_',$decode_id);
	    $subs_id = $id_array[0]; 
	    $brnd_id = $id_array[2]; 
		$this->db->where("voucherr_alert_subscriber_id",$subs_id);
		$this->db->update('voucherr_alert_subscriber',array('status'=>'active'));
		
		redirect(base_url().'home/brands/'.$brnd_id."/activated", 'refresh');
	}
	function confirmation_mail($param="",$param2=""){
		$secret_key           = base64_encode($param.'_'.time());
	    $data['confirmation'] = base_url().'home/subscribed/'.$secret_key;
		$data['subscribr_id'] = $param;
	    $data['param2'] = $param2;
		$this->load->view('home/confirm_login', $data);
	}
	/***** Deals *********/
	public function deals($param1 = '', $param2 = '', $param3 = ''){
		
		/* Get Top Section Info */
		$get_page_type_id = $this->db->get_where('page_types', array('page_name'=>'Deals'))->row()->page_types_id;
		$top_lef_info = $this->db->get_where('static_content', array('type'=>'top_left_info', 'page_types_id'=>$get_page_type_id))->row_array();
		$top_right_newsletter = $this->db->get_where('static_content', array('type'=>'top_right_newsletter', 'page_types_id'=>$get_page_type_id))->row_array();
		$data['top_lef_info'] 	= $top_lef_info;
		$data['top_right_newsletter'] 	= $top_right_newsletter;
		/* Get Top Section Info */
		
		// $data['all_deals'] 	= $brands_array;
		$data['page_title'] 	= 'Deals';
		$data['page_sub_title'] = '';
		$data['page_name'] 		= 'deals';
		$this->load->view('home/index', $data);
	}
	/***** Deals *********/
	/***** Faqs *********/
	public function faqs($param1 = '', $param2 = '', $param3 = ''){
		
		/* Get Top Section Info */
		$get_page_type_id = $this->db->get_where('page_types', array('page_name'=>'Faqs'))->row()->page_types_id;
		$top_lef_info = $this->db->get_where('static_content', array('type'=>'top_left_info', 'page_types_id'=>$get_page_type_id))->row_array();
		$top_right_newsletter = $this->db->get_where('static_content', array('type'=>'top_right_newsletter', 'page_types_id'=>$get_page_type_id))->row_array();
		$data['top_lef_info'] 	= $top_lef_info;
		$data['top_right_newsletter'] 	= $top_right_newsletter;
		/* Get Top Section Info */
		
		
		
		/* Get Page Data */
		$get_faqs = '';
		$page_title = '';
		$page_sub_title = '';

		$page_title = 'Faqs';
		$page_sub_title = 'Faqs';
		$get_faqs = $this->db->get_where('faqs', array('status'=>'Active'))->result_array();
			
		
		/* Get Page Data */
		$system_name = $this->db->get_where('system_settings',array('type'=>'system_name'))->row()->description;
		$data['page_content'] 	= $this->db->get_where('static_pages', array('page_name'=>'faqs'))->row_array();
		$data['system_name'] 	= $system_name;
		$data['faqs_data'] 		= $get_faqs;
		$data['page_title'] 	= $page_title;
		$data['page_sub_title'] = $page_sub_title;
		$data['page_name'] 		= 'faqs';
		$this->load->view('home/index', $data);
	}
	/***** Faqs *********/
		public function sub_categories($param1 = '', $param2 = '', $param3 = ''){
		$date= date("Y-m-d") ;
		if(!empty($param1)){
			
			$this->db->where('sub_categories_id', $param1);
			$cate_data = $this->db->get_where('sub_categories', array('status'=>'Active'))->row();
			$data['category_name']     = $cate_data->name;
			$data['long_description']  = $cate_data->long_description;
			$data['param']             =  $param1;
			$catee_id                  =  $cate_data->sub_categories_id;

			$this->db->where('sub_categories_id', $param1);
			/* for redirecting pages on clicking copens*/
			$req_url = $_SERVER['REQUEST_URI'];
			$open_coupon = '';
			if (strpos($req_url,'coupon_id') !== false ) {
				$open_coupon = $_GET['coupon_id']; 
				$data['remove_phill']      =  'Yes'; 
				$data['open_coupon_id']    =  $open_coupon; 
			}
            else{
				$data['remove_phill']      = ""; 
				$data['open_coupon_id']    = ""; 
			}			
			
			/* for redirecting pages on clicking copens*/
			
			/* Pagination Start Here */
			$req_url = $_SERVER['REQUEST_URI'];
			$page_num = '';
			if (strpos($req_url,'page') !== false || strpos($req_url,'view_all') !== false) {
				$page_num = $_GET['page']; 
			}
			/* for multi tabs pagination */
				$coupons_type = '';
				$coupons_type_cond = '';
				if(strpos($req_url,'coupon_type') !== false){
					$coupons_type = $_GET['page'];
					if($coupons_type == 'offer'){
						$coupons_type_cond = " AND cpn.coupon_type = 'Offer' ";
					} else if($coupons_type == 'coupon'){
						$coupons_type_cond = " AND cpn.coupon_type = 'Coupon' ";
					}
				}
			/* for multi tabs pagination */
			// $page_num = $param2;
		 	$page_limit_initial				=	$this->db->query("SELECT description FROM system_settings WHERE type='page_limit_initial'")->row()->description;
		
		
			$total_page_limit_initial		=	$this->db->query("SELECT description FROM system_settings WHERE type='total_page_limit_initial'")->row()->description;	
			if(!empty($page_num) && $page_num != 'view_all'){
				if($page_num == 1){
					$limit = '0,'.$page_limit_initial;
				} else {
					$end_limit = $page_limit_initial;
					$start_limit = $page_num * $end_limit - $end_limit;
					$limit = $start_limit.','.$end_limit;
				}
			} else {
				$limit ='0,'.$page_limit_initial;
				$page_num=1;
				$limit = '0,'.$page_limit_initial;
			}
			  
							
			 if($param2=='Coupon' && $param3 == 'page'){
                 

				$data['just_coupons']			=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active'  AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.sub_categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.coupon_type ASC  LIMIT $limit")->result_array();	

                $data['cates_query_limit'] = $this->db->last_query();

				$limit ='0,'.$page_limit_initial;
				$page_num=1;
				$limit = '0,'.$page_limit_initial;
				
				$data['all_offers']				=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Offer' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00')  AND cpn.sub_categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.sub_cate_order ASC  LIMIT $limit")->result_array();
						
				$data['just_deals']			=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Deals' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.sub_categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.sub_cate_order ASC  LIMIT $limit")->result_array();
				
				$data['just_shipping']	  	=  $this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Free Shipping' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.sub_categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.sub_cate_order ASC LIMIT $limit")->result_array();
					
				$data['just_items']	  	=  $this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Free Items' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.sub_categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.sub_cate_order ASC LIMIT $limit")->result_array();


			
				
				$page_num = $_GET['page'];

				$data['typo'] = "Coupon";

			}
			else if($param2=='Offer' && $param3 == 'page'){

                $data['all_offers']				=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Offer' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00')  AND cpn.sub_categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.sub_cate_order ASC  LIMIT $limit")->result_array();			

                $data['cates_query_limit'] = $this->db->last_query();

				$limit ='0,'.$page_limit_initial;
				$page_num=1;
				$limit = '0,'.$page_limit_initial;
				
				$data['just_coupons']			=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active'  AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.sub_categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.sub_cate_order ASC,cpn.coupon_type  LIMIT $limit")->result_array();
						
				$data['just_deals']			=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Deals' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00')  AND cpn.sub_categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.sub_cate_order ASC  LIMIT $limit")->result_array();
				
				$data['just_shipping']	  	=  $this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Free Shipping' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.sub_categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.sub_cate_order ASC LIMIT $limit")->result_array();
					
				$data['just_items']	  	=  $this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Free Items' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.sub_categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.sub_cate_order ASC LIMIT $limit")->result_array();
				
				$page_num = $_GET['page'];
 
				$data['typo'] = "Offer";

			}
			else if($param2=='Deals' && $param3 == 'page'){
                 
				$data['just_deals']			=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Deals' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00')  AND cpn.sub_categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.sub_cate_order ASC  LIMIT $limit")->result_array();
						

                $data['cates_query_limit'] = $this->db->last_query();

				$limit ='0,'.$page_limit_initial;
				$page_num=1;
				$limit = '0,'.$page_limit_initial;
				
				$data['just_coupons']			=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active'  AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00')  AND cpn.sub_categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.sub_cate_order ASC,cpn.coupon_type  LIMIT $limit")->result_array();
						
				$data['all_offers']				=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Offer' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.sub_categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.sub_cate_order ASC  LIMIT $limit")->result_array();	
				
				$data['just_shipping']	  	=  $this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Free Shipping' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.sub_categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.sub_cate_order ASC LIMIT $limit")->result_array();
					
				$data['just_items']	  	=  $this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Free Items' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.sub_categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.sub_cate_order ASC LIMIT $limit")->result_array();

				$page_num = $_GET['page'];
                $data['typo'] = "Deals";
				

			}
			else if($param2=='Free%20Shipping' && $param3 == 'page'){
                 
				$data['just_shipping']	  	=  $this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Free Shipping' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.sub_categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.sub_cate_order ASC LIMIT $limit")->result_array();
						

                $data['cates_query_limit'] = $this->db->last_query();

				$limit ='0,'.$page_limit_initial;
				$page_num=1;
				$limit = '0,'.$page_limit_initial;
				
				$data['just_coupons']			=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active'  AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.sub_categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.sub_cate_order ASC,cpn.coupon_type  LIMIT $limit")->result_array();
						
				$data['all_offers']				=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Offer' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.sub_categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.sub_cate_order ASC  LIMIT $limit")->result_array();	
				
				$data['just_deals']			=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Deals' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.sub_categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.sub_cate_order ASC  LIMIT $limit")->result_array();
					
				$data['just_items']	  	=  $this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Free Items' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.sub_categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.sub_cate_order ASC LIMIT $limit")->result_array();

				$page_num = $_GET['page'];
                $data['typo'] = "Shipping";
				

			}
			else if($param2=='Free%20Items' && $param3 == 'page'){
                 
					
				$data['just_items']	  	=  $this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Free Items' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.sub_categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.sub_cate_order ASC LIMIT $limit")->result_array();

                $data['cates_query_limit'] = $this->db->last_query();

				$limit ='0,'.$page_limit_initial;
				$page_num=1;
				$limit = '0,'.$page_limit_initial;
				
				$data['just_coupons']			=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active'  AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00')  AND cpn.sub_categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.sub_cate_order ASC,cpn.coupon_type  LIMIT $limit")->result_array();
						
				$data['all_offers']				=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Offer' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.sub_categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.sub_cate_order ASC  LIMIT $limit")->result_array();	
				
				$data['just_deals']			=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Deals' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.sub_categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.sub_cate_order ASC  LIMIT $limit")->result_array();
					
				$data['just_shipping']	  	=  $this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Free Shipping'  AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.sub_categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.sub_cate_order ASC LIMIT $limit")->result_array();

				$page_num = $_GET['page'];
                $data['typo'] = "Items";
				

			}
			else{
				$data['just_coupons']			=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active'  AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.sub_categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.sub_cate_order ASC ,cpn.coupon_type LIMIT $limit")->result_array();	

                $data['cates_query_limit'] = $this->db->last_query();

				$data['all_offers']				=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Offer' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00')  AND cpn.sub_categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.sub_cate_order ASC  LIMIT $limit")->result_array();
						
				$data['just_deals']			=	$this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Deals' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00')  AND cpn.sub_categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.sub_cate_order ASC  LIMIT $limit")->result_array();
				
				$data['just_shipping']	  	=  $this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Free Shipping'  AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.sub_categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.sub_cate_order ASC LIMIT $limit")->result_array();
					
				$data['just_items']	  	=  $this->db->query("select cpn.* , cat.name as cat_name, cat.cat_image as cat_image from coupons as cpn left join categories as cat ON cpn.categories_id = cat.categories_id where cpn.status = 'Active' AND cpn.coupon_type= 'Free Items' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.sub_categories_id = '".$param1."' ".$coupons_type_cond." ORDER BY cpn.sub_cate_order ASC LIMIT $limit")->result_array();

				$data['typo'] = "sdsd";
			}
			
			$data['page']	  	  			   	=  $page_num;
			$data['page_num']	  	  		   	=  $page_num;
			$data['total_coupons']	  	   		=  $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.sub_categories_id = ".$catee_id." ".$coupons_type_cond." ")->num_rows();
			// $data['count_coupons']	  	   		=  $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00')  AND cpn.coupon_type= 'Coupon' AND cpn.sub_categories_id = '".$catee_id."' ".$coupons_type_cond." ")->num_rows();	
			$data['count_coupons']	  	   		=  $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00')   AND cpn.sub_categories_id = '".$catee_id."' ".$coupons_type_cond." ")->num_rows();	

			// echo $this->db->last_query(); exit;
			$data['total_offers']	  	   		= $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active'  AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.coupon_type= 'Offer' AND cpn.sub_categories_id = '".$catee_id."' ".$coupons_type_cond." ")->num_rows();
			$data['total_deals']	  	   	    = $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND coupon_type= 'Deals' AND cpn.sub_categories_id = '".$catee_id."' ".$coupons_type_cond." ")->num_rows();
			$data['total_shipping']	  	   	    = $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND coupon_type= 'Free Shipping' AND cpn.sub_categories_id = '".$catee_id."' ".$coupons_type_cond." ")->num_rows();
			$data['total_items']	  	   	    = $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active'  AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND coupon_type= 'Free Items' AND cpn.sub_categories_id = '".$catee_id."' ".$coupons_type_cond." ")->num_rows();
			/* echo $this->db->last_query();
			exit; */
		
			$data['page_limit_initial']       	= $page_limit_initial;
			$data['total_page_limit_initial']   = $total_page_limit_initial;
		/* Pagination End Here */
		}                 
		 $get_sub_categories = $this->db->get_where('sub_categories', array('status'=>'Active'))->result_array(); 
		/* Get Top Section Info */
		$get_page_type_id = $this->db->get_where('page_types', array('page_name'=>'Categories'))->row()->page_types_id;
		$top_lef_info = $this->db->get_where('static_content', array('type'=>'top_left_info', 'page_types_id'=>$get_page_type_id))->row_array();
		$top_right_newsletter = $this->db->get_where('static_content', array('type'=>'top_right_newsletter', 'page_types_id'=>$get_page_type_id))->row_array();
		$data['top_lef_info'] 	= $top_lef_info;
		$data['top_right_newsletter'] 	= $top_right_newsletter;
		/* Get Top Section Info */
		
		$data['active_tab'] = 'Coupon';
		if($param2 == "Coupon" ){
			$data['active_tab'] = 'Coupon';
		}
		else if($param2 == "Offer" ){
			$data['active_tab'] = 'Offer';
		}
		else if($param2 == "Free%20Items" ){
			$data['active_tab'] = 'Free Items'; 
		}
		else if($param2 == "Free%20Shipping" ){
			$data['active_tab'] = 'Free Shipping';
		}
		else if($param2 == "Deals" ){
			$data['active_tab'] = 'Deals';
		}
		$data['get_sub_categories'] = $get_sub_categories;
		$data['categories_id'] 	= $param1;
		$data['param1'] 	= $param1;
		$data['page_title'] 	= 'Sub categories';
		$data['page_sub_title'] = '';
		$data['page_name'] 		= 'sub_categories';
		$this->load->view('home/index', $data);
	}
	/***** Sub Categories *********/
	public function sub_categoriesrrr($param1 = '', $param2 = '', $param3 = ''){
		
		/* Get Top Secion Info */
		$get_page_type_id = $this->db->get_where('page_types', array('page_name'=>'Faqs'))->row()->page_types_id;
		$top_lef_info = $this->db->get_where('static_content', array('type'=>'top_left_info', 'page_types_id'=>$get_page_type_id))->row_array();
		$top_right_newsletter = $this->db->get_where('static_content', array('type'=>'top_right_newsletter', 'page_types_id'=>$get_page_type_id))->row_array();
		$data['top_lef_info'] 	= $top_lef_info;
		$data['top_right_newsletter'] 	= $top_right_newsletter;
		/* Get Top Section Info */
			$date= date("Y-m-d") ;
		if(!empty($param1)){
	
			$sub_category_data = $this->db->get_where('sub_categories', array('status'=>'Active','sub_categories_id'=>$param1))->row();
			$cate_data                 =  $this->db->get_where('categories', array('status'=>'Active','categories_id'=>$sub_category_data->categories_id))->row();
			$data['sub_category_name'] =  $sub_category_data->name;
			$data['param']             =  $param1;
			$data['category_name']     =  $cate_data->name;
			$data['cate_id']           =  $cate_data->categories_id;
			
			/* Pagination Start Here */
			$req_url = $_SERVER['REQUEST_URI'];
			$page_num = '';
			if (strpos($req_url,'page') !== false || strpos($req_url,'view_all') !== false) {
				$page_num = $_GET['page'];
			}
			/* for multi tabs pagination */
				$coupons_type = '';
				$coupons_type_cond = '';
				if(strpos($req_url,'coupon_type') !== false){
					$coupons_type = $_GET['page'];
					if($coupons_type == 'offer'){
						$coupons_type_cond = " AND cpn.coupon_type = 'Offer' ";
					} else if($coupons_type == 'coupon'){
						$coupons_type_cond = " AND cpn.coupon_type = 'Coupon' ";
					}
				}
			/* for multi tabs pagination */
			// $page_num = $param2;
			$page_limit_initial				=	$this->db->query("SELECT description FROM system_settings WHERE type='page_limit_initial'")->row()->description;
			$total_page_limit_initial		=	$this->db->query("SELECT description FROM system_settings WHERE type='total_page_limit_initial'")->row()->description;	
			if(!empty($page_num) && $page_num != 'view_all'){
				if($page_num == 1){
					$limit = '0,'.$page_limit_initial;
				} else {
					$end_limit = $page_limit_initial;
					$start_limit = $page_num * $end_limit - $end_limit;
					$limit = $start_limit.','.$end_limit;
				}
			} else {
				$limit ='0,'.$page_limit_initial;
				$page_num=1;
				$limit = '0,'.$page_limit_initial;
				$data['all_coupons']	  	   	=  $this->db->query("select cpn.* , brand.name as brand_name, brand.brand_image as brand_image from coupons as cpn left join brands as brand ON FIND_IN_SET(brand.brands_id, cpn.brands_id) != 0 where cpn.status = 'Active' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.categories_id = ".$data['cate_id']." ".$coupons_type_cond." ORDER BY cpn.coupons_id DESC LIMIT $limit")->result_array();
			}
			if($page_num == 'view_all'){
				$data['all_coupons']			=	$this->db->query("select cpn.* , brand.name as brand_name, brand.brand_image as brand_image from coupons as cpn left join brands as brand ON FIND_IN_SET(brand.brands_id, cpn.brands_id) != 0 where cpn.status = 'Active' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.categories_id = ".$data['cate_id']." ".$coupons_type_cond." ORDER BY cpn.coupons_id DESC ")->result_array();
			} else {
				$data['all_coupons']			=	$this->db->query("select cpn.* , brand.name as brand_name, brand.brand_image as brand_image from coupons as cpn left join brands as brand ON FIND_IN_SET(brand.brands_id, cpn.brands_id) != 0 where cpn.status = 'Active' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.categories_id = ".$data['cate_id']." ".$coupons_type_cond." ORDER BY cpn.coupons_id DESC LIMIT $limit")->result_array();
			}
			$data['query'] = $this->db->last_query();
			$data['page']	  	  			   	=  $page_num;
			$data['page_num']	  	  		   	=  $page_num;
			$data['total_coupons']	  	   		=  $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND categories_id = ".$data['cate_id']." ".$coupons_type_cond." ")->num_rows();
			$data['page_limit_initial']       	= $page_limit_initial;
			$data['total_page_limit_initial']  = $total_page_limit_initial;
		/* Pagination End Here */
			
		}
		
		$get_sub_categories = $this->db->get_where('sub_categories', array('status'=>'Active','sub_categories_id'=>$param1))->result_array();
		$system_name    = $this->db->get_where('system_settings',array('type'=>'system_name'))->row()->description;
		$data['system_name'] 	= $system_name;
	    $data['sub_categories'] = $get_sub_categories;
		$data['page_title'] 	= 'Sub Categories';
		$data['page_sub_title'] = '';
		$data['page_name'] 		= 'sub_categories';
		$this->load->view('home/index', $data);
	}
	/***** Sub Categories *********/
	
	/***** Search Function *********/
	public function search($param1 = '', $param2 = '', $param3 = ''){
		if($param1=="show_sugges_small"){
			redirect(base_url(), 'refresh');
		}
		if($param1=="show_sugges"){
			redirect(base_url(), 'refresh');
		}
		$date     = date("Y-m-d H:i:s");
		if(!empty($_GET['type'])){
			$param1 = $_GET['type'];
		}
		
		if($param1=="show_sugges"){
			$string   = $this->input->post('val');
			
			$find_brands 	= $this->db->query("select * from brands where status = 'Active' AND sub_brand='0' AND (name LIKE '%".$string."%' OR name LIKE '%".strtolower($string)."%' OR name LIKE '%".strtoupper($string)."%') LIMIT 0, 5")->result_array();
			
			// $find_coupons	= $this->db->query("select cpn.* , brand.name as brand_name, brand.brand_image as brand_image from coupons as cpn left join brands as brand ON FIND_IN_SET(brand.brands_id, cpn.brands_id) != 0 where cpn.status = 'Active' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND ((cpn.description LIKE '%".$string."%') OR (brand.name LIKE '%".$string."%')) AND brand.sub_brand = '0' ORDER BY cpn.coupons_id DESC ")->result_array();
			$find_coupons	= $this->db->query("select cpn.* , brand.name as brand_name, brand.brand_image as brand_image from coupons as cpn left join brands as brand ON brand.brands_id = cpn.brands_id where cpn.status = 'Active' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND ((cpn.description LIKE '%".$string."%') OR (brand.name LIKE '%".$string."%')) AND brand.sub_brand = '0' ORDER BY cpn.coupons_id DESC ")->result_array();
			
			$brand_img_url = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;
			$coupon_img_url = $this->db->get_where('system_settings',array('type'=>'coupon_imgs_url'))->row()->description;
			
			$html_box = '';
			
			$html_box .= '<div class="container" id="src_data">';
			$html_box .= ' <div class="src_box show_fix" id="src_box">';
			// $html_box .= ' <div class="triangle" style="red"></div>';
			$html_box .= '  <div>';
			// $html_box .= '   <div class="layout-search__results-column">';
			$html_box .= '   <div class="">';
			$html_box .= '    <div class="layout-search__results-headline">';
			$html_box .= '     <div class="layout-search__results-link"><a href="/suche?search=ot#shops"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></a></div>';
			// $html_box .= '     <div class="layout-search__results-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Gutscheine und Aktionen</font></font></div>';
			// $html_box .= '    </div>';
			
			// if(!empty($find_coupons)){
			// foreach($find_coupons as $key => $coupons){
			// $brand_name_new = "";
			// $brand_name_array = explode(" ",$coupons['brand_name']);
			// if(count($brand_name_array) > 0){
			// 	$brand_name_new = str_replace(' ', '-', $coupons['brand_name']);
			// }
			// $brand_imag = $this->db->get_where('brands',array('brands_id'=>$coupons['brands_id']))->row()->brand_image;  
			

			// $html_box .= '   <a href="'.base_url().'marken/'.$brand_name_new.'?type=go_to&coupons_id='.$coupons['coupons_id'].'&coupon_type='.$coupons['coupon_type'].'" style="text-decoration:none">';
			// $html_box .= '   <div class="layout-search__results-suggestion search__suggestion sreach_bar" data-suggestion-name="'.$coupons['short_tagline'].'" data-suggestion-url="/gutscheine/otto#jump-405754">';
			// $html_box .= '     <div class="layout-search__suggestion-aside"><img class="layout-search__suggestion-logo" src="'.base_url().$brand_img_url.$brand_imag.'" alt="'.$coupons['short_tagline'].'"></div>';
			// $html_box .= '     <div class="layout-search__suggestion-body">';
			// $html_box .= '      <div class="layout-search__suggestion-title">';
			// $html_box .= '       <div class="layout-search__suggestion-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$coupons['short_tagline'].'</font></font></div>';
			// $html_box .= '      </div>';
			// $html_box .= '     </div>';
			// $html_box .= '  </div>';
			// $html_box .= '  </a>';
			//  }
			// }
			// else{
			// 	$html_box .= '    <div class="layout-search__results-suggestion search__suggestion sreach_bar" data-suggestion-name="" data-suggestion-url="" style="padding: 17px;">';
			// 	$html_box .= '       <div class="layout-search__suggestion-body">';
			// 	$html_box .= '        <div class="layout-search__suggestion-title">';
			// 	$html_box .= '         <div class="layout-search__suggestion-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">No Coupon found</font></font></div>';
			// 	$html_box .= '        </div>';
			// 	$html_box .= '      </div>';
			// 	$html_box .= '    </div>';
			// }
			// $html_box .= '   </div>';
			// $html_box .= '  </div>';
			// $html_box .= '  <div>';
			// $html_box .= '  <div class="layout-search__results-column">';
			// $html_box .= '   <div class="layout-search__results-headline">';
			// $html_box .= '    <div class="layout-search__results-link"><a href="/suche?search=ot#offers"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></a></div>';
			$html_box .= '    <div class="layout-search__results-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Shops</font></font></div>';
			$html_box .= '   </div>';
			if(!empty($find_brands)){
			foreach($find_brands as $brands){
			$brand_name_new = "";
			$brand_name_array = explode(" ",$brands['name']);
			if(count($brand_name_array) > 0){
				$brand_name_new = str_replace(' ', '-', $brands['name']);
			}
			// $vocuhr_count = $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND FIND_IN_SET(brand.brands_id, cpn.brands_id) != 0")->num_rows();
			$vocuhr_count = $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND FIND_IN_SET(".$brands['brands_id'].", cpn.brands_id) != 0")->num_rows();

			//  $vocuhr_count = $this->db->get_where('coupons',array('brands_id'=>$brands['brands_id'],'status'=>'Active','end_date >='=>$date))->num_rows();
			$html_box .= '   <a href="'.base_url().'marken/'.$brand_name_new.'" style="text-decoration:none">';
			$html_box .= '    <div class="layout-search__results-suggestion search__suggestion sreach_bar" data-suggestion-name="'.$brands['name'].'" >';
			$html_box .= '      <div class="layout-search__suggestion-aside"><img class="layout-search__suggestion-logo" src="'.base_url().$brand_img_url.$brands['brand_image'].'" alt="'.$brands['name'].'"></div>';
			$html_box .= '       <div class="layout-search__suggestion-body">';
			$html_box .= '        <div class="layout-search__suggestion-title">';
			$html_box .= '         <div class="layout-search__suggestion-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$brands['name'].'</font></font></div>';
			$html_box .= '        </div>';
			$html_box .= '        <div class="layout-search__suggestion-offers-count"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$vocuhr_count.' Gutscheine</font></font></div>';
			$html_box .= '      </div>';
			$html_box .= '    </div>';
			$html_box .= '    </a>';
			 }
			}else{
				$html_box .= '    <div class="layout-search__results-suggestion search__suggestion sreach_bar" style="padding: 17px;">';
				$html_box .= '       <div class="layout-search__suggestion-body">';
				$html_box .= '        <div class="layout-search__suggestion-title">';
				$html_box .= '         <div class="layout-search__suggestion-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">No shop found</font></font></div>';
				$html_box .= '        </div>';
				$html_box .= '      </div>';
				$html_box .= '    </div>';
			}
			$html_box .= ' </div>';
			$html_box .= ' </div>';
			$html_box .= ' </div>';
			$html_box .= '</div>';			
			echo $html_box; exit;			
		}

		if($param1=="show_sugges_small"){
			$data = [];
			$data['page_name'] 		= 'search';
			$this->load->view('home/index', $data);
			$string   = $this->input->post('val');
			
			// // $find_brands 	= $this->db->query("select brands.*, cpn.* from brands LEFT JOIN coupons as cpn ON brands.brands_id = cpn.brands_id where brands.status = 'Active' AND brands.sub_brand='0' AND (brands.name LIKE '%".$string."%' OR brands.name LIKE '%".strtolower($string)."%' OR brands.name LIKE '%".strtoupper($string)."%') AND cpn.status = 'Active' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') LIMIT 0, 5")->result_array();
 			// $find_brands 	= $this->db->query("select brands.*, COUNT(cpn.coupons_id) as total_coupons from brands LEFT JOIN coupons as cpn ON brands.brands_id = cpn.brands_id where brands.status = 'Active' AND brands.sub_brand='0' AND (brands.name LIKE '%".$string."%' OR brands.name LIKE '%".strtolower($string)."%' OR brands.name LIKE '%".strtoupper($string)."%')  AND cpn.status = 'Active' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') group by brands.brands_id LIMIT 0, 5")->result_array();
			// // $vocuhr_count = $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND FIND_IN_SET(".$brands['brands_id'].", cpn.brands_id) != 0")->num_rows();
			// // $find_brands 	= $this->db->query("select * from brands where status = 'Active' AND sub_brand='0' AND (name LIKE '%".$string."%' OR name LIKE '%".strtolower($string)."%' OR name LIKE '%".strtoupper($string)."%') LIMIT 0, 5")->result_array();
			// // $find_coupons	= $this->db->query("select cpn.* , brand.name as brand_name, brand.brand_image as brand_image from coupons as cpn left join brands as brand ON FIND_IN_SET(brand.brands_id, cpn.brands_id) != 0 where cpn.status = 'Active' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND ((cpn.description LIKE '%".$string."%' OR cpn.description LIKE '%".strtoupper($string)."%' OR cpn.description LIKE '%".strtolower($string)."%' ) OR (brand.name LIKE '%".$string."%' OR brand.name LIKE '%".strtoupper($string)."%' OR brand.name LIKE '%".strtolower($string)."%')) AND brand.sub_brand = '0' ORDER BY cpn.coupons_id DESC ")->result_array();
			// $brand_img_url = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;
			// $coupon_img_url = $this->db->get_where('system_settings',array('type'=>'coupon_imgs_url'))->row()->description;

			$find_brands 	= $this->db->query("select * from brands where status = 'Active' AND sub_brand='0' AND (name LIKE '%".$string."%' OR name LIKE '%".strtolower($string)."%' OR name LIKE '%".strtoupper($string)."%') LIMIT 0, 5")->result_array();
			// $find_coupons	= $this->db->query("select cpn.* , brand.name as brand_name, brand.brand_image as brand_image from coupons as cpn left join brands as brand ON FIND_IN_SET(brand.brands_id, cpn.brands_id) != 0 where cpn.status = 'Active' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND ((cpn.description LIKE '%".$string."%') OR (brand.name LIKE '%".$string."%')) AND brand.sub_brand = '0' ORDER BY cpn.coupons_id DESC ")->result_array();
			$find_coupons	= $this->db->query("select cpn.* , brand.name as brand_name, brand.brand_image as brand_image from coupons as cpn left join brands as brand ON brand.brands_id = cpn.brands_id where cpn.status = 'Active' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND ((cpn.description LIKE '%".$string."%') OR (brand.name LIKE '%".$string."%')) AND brand.sub_brand = '0' ORDER BY cpn.coupons_id DESC ")->result_array();
			$brand_img_url = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;
			$coupon_img_url = $this->db->get_where('system_settings',array('type'=>'coupon_imgs_url'))->row()->description;


			$html_box = '';
			
			$html_box .= '<div class="container" id="src_data">';
			$html_box .= ' <div class="src_box show_fix">';
			// $html_box .= ' <div class="triangle" style="red"></div>';
			$html_box .= ' <div>';
			$html_box .= '  <div class="layout-search__results-column">';
			$html_box .= '   <div class="layout-search__results-headline">';
			// $html_box .= '    <div class="layout-search__results-link"><a href="/suche?search=ot#offers"></a></div>';
			$html_box .= '    <div class="layout-search__results-title">Shops</div>';
			$html_box .= '   </div>';
			if(!empty($find_brands)){
				foreach($find_brands as $brands){
					$brand_name_new = "";
					$brand_name_array = explode(" ",$brands['name']);
					if(count($brand_name_array) > 0){
						$brand_name_new = str_replace(' ', '-', $brands['name']);
					}
					// $vocuhr_count = $brands['total_coupons'];//$this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND FIND_IN_SET(".$brands['brands_id'].", cpn.brands_id) != 0")->num_rows();
					$vocuhr_count = $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND FIND_IN_SET(".$brands['brands_id'].", cpn.brands_id) != 0")->num_rows();
					$html_box .= '   <a href="'.base_url().'marken/'.$brand_name_new.'" style="text-decoration:none">';
					$html_box .= '    <div class="layout-search__results-suggestion search__suggestion sreach_bar" data-suggestion-name="'.$brands['name'].'" >';
					$html_box .= '      <div class="layout-search__suggestion-aside"><img class="layout-search__suggestion-logo" src="'.base_url().$brand_img_url.$brands['brand_image'].'" alt="'.$brands['name'].'"></div>';
					$html_box .= '       <div class="layout-search__suggestion-body">';
					$html_box .= '        <div class="layout-search__suggestion-title">';
					$html_box .= '         <div class="layout-search__suggestion-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$brands['name'].'</font></font></div>';
					$html_box .= '        </div>';
					$html_box .= '        <div class="layout-search__suggestion-offers-count"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$vocuhr_count.' Gutscheine</font></font></div>';
					$html_box .= '      </div>';
					$html_box .= '    </div>';
					$html_box .= '    </a>';
			 	}
			}else{
				$html_box .= '    <div class="layout-search__results-suggestion search__suggestion sreach_bar" style="padding: 17px;">';
				$html_box .= '       <div class="layout-search__suggestion-body">';
				$html_box .= '        <div class="layout-search__suggestion-title">';
				$html_box .= '         <div class="layout-search__suggestion-title">No shop found or coupons expired</div>';
				$html_box .= '        </div>';
				$html_box .= '      </div>';
				$html_box .= '    </div>';
			}
            
			$html_box .= '   </div>';
			$html_box .= '  </div>';

			$html_box .= '  <div>';
			$html_box .= '   <div class="layout-search__results-column">';
			$html_box .= '    <div class="layout-search__results-headline">';
			// $html_box .= '     <div class="layout-search__results-link"><a href="/suche?search=ot#shops"></a></div>';
			// $html_box .= '     <div class="layout-search__results-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Gutscheine und Aktionen</font></font></div>';
			// $html_box .= '    </div>';
			
			// if(!empty($find_coupons)){
			// foreach($find_coupons as $key => $coupons){
			// $brand_name_new = "";
			// $brand_name_array = explode(" ",$coupons['brand_name']);
			// if(count($brand_name_array) > 0){
			// 	$brand_name_new = str_replace(' ', '-', $coupons['brand_name']);
			// }
			// $brand_imag = $this->db->get_where('brands',array('brands_id'=>$coupons['brands_id']))->row()->brand_image;

			// $html_box .= '   <a href="'.base_url().'marken/'.$brand_name_new.'?type=go_to&coupons_id='.$coupons['coupons_id'].'&coupon_type='.$coupons['coupon_type'].'"  style="text-decoration:none">';
			// $html_box .= '   <div class="layout-search__results-suggestion search__suggestion sreach_bar" data-suggestion-name="'.$coupons['short_tagline'].'" data-suggestion-url="/gutscheine/otto#jump-405754">';
			// $html_box .= '     <div class="layout-search__suggestion-aside"><img class="layout-search__suggestion-logo" src="'.base_url().$brand_img_url.$brand_imag.'" alt="'.$coupons['short_tagline'].'"></div>';
			// $html_box .= '     <div class="layout-search__suggestion-body">';
			// $html_box .= '      <div class="layout-search__suggestion-title">';
			// $html_box .= '       <div class="layout-search__suggestion-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$coupons['short_tagline'].'</font></font></div>';
			// $html_box .= '      </div>';
			// $html_box .= '     </div>';
			// $html_box .= '  </div>';
			// $html_box .= '  </a>';
			//  }
			// }
			// else{
			// 	$html_box .= '    <div class="layout-search__results-suggestion search__suggestion sreach_bar" data-suggestion-name="" data-suggestion-url="" style="padding: 17px;">';
			// 	$html_box .= '       <div class="layout-search__suggestion-body">';
			// 	$html_box .= '        <div class="layout-search__suggestion-title">';
			// 	$html_box .= '         <div class="layout-search__suggestion-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">No Coupon found</font></font></div>';
			// 	$html_box .= '        </div>';
			// 	$html_box .= '      </div>';
			// 	$html_box .= '    </div>';
			// }
            
			$html_box .= '   </div>';
			$html_box .= '  </div>';
			$html_box .= ' </div>';

			$html_box .= ' </div>';
			$html_box .= '</div>';
			
			echo $html_box;
			exit;			
		}
		
		$req_url = $_SERVER['REQUEST_URI'];
		$search_text = '';
		if (strpos($req_url,'search_str') !== false){
			$search_text = $_GET['search_str'];
		}
		
		$find_brands 	= $this->db->query("select * from brands where status = 'Active'  AND  (name LIKE '%".$search_text."%' OR name LIKE '%".strtolower($search_text)."%' OR name LIKE '%".strtoupper($search_text)."%') LIMIT 0, 10")->result_array();
		$find_coupons	= $this->db->query("select cpn.* , brand.name as brand_name, brand.brand_image as brand_image from coupons as cpn left join brands as brand ON FIND_IN_SET(brand.brands_id, cpn.brands_id) != 0 where cpn.status = 'Active' AND cpn.start_date <= '".date('Y-m-d')."' AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND ((cpn.description LIKE '%".$search_text."%' OR cpn.description LIKE '%".strtoupper($search_text)."%' OR cpn.description LIKE '%".strtolower($search_text)."%' ) OR (brand.name LIKE '%".$search_text."%' OR brand.name LIKE '%".strtoupper($search_text)."%' OR brand.name LIKE '%".strtolower($search_text)."%')) AND brand.sub_brand = '0' ORDER BY cpn.coupons_id DESC ")->result_array();
		$brands_details= $this->db->query("select name from brands where status = 'Active' AND name LIKE '%".strtoupper($search_text)."%' ");
		$brands_count = $brands_details->num_rows();

		if($brands_count > 0){
			$brands_name = $brands_details->row()->name;
			$brand_name_new = "";
			$brand_name_array = explode(" ",$brands_name);
			if(count($brand_name_array) > 0){
				$brand_name_new = str_replace(' ', '-', $brands_name);
			}
			redirect(base_url().'marken/'.$brand_name_new, 'refresh');
		}
		else{
			$system_name    = $this->db->get_where('system_settings',array('type'=>'system_name'))->row()->description;
			$data['search_query'] 	= $search_text;
			$data['system_name'] 	= $system_name;
			$data['all_brands'] 	= $find_brands;
			$data['all_coupons'] 	= $find_coupons;
			$data['page_title'] 	= 'Searched Data';
			$data['page_sub_title'] = '';
			$data['page_name'] 		= 'search';
			$this->load->view('home/index', $data);
		}
	

		
	}
	/***** Search Function *********/
	
	/***** Newsletter Confirm Subscribed Page *********/
	public function confirm_subscription($param1 = '', $param2 = '', $param3 = ''){
		$system_name    = $this->db->get_where('system_settings',array('type'=>'system_name'))->row()->description;
		$data['system_name'] 	= $system_name;
	    
		$data['page_title'] 	= 'Confirm Subscription';
		$data['page_sub_title'] = '';
		$data['page_name'] 		= 'confirm_subscription';
		$this->load->view('home/index', $data);
	}
	/***** Newsletter Confirm Subscribed Page *********/
	
	/***** Newsletter Confirm Subscribed Page *********/
	public function subscribed($param1 = '', $param2 = '', $param3 = ''){
		$system_name    = $this->db->get_where('system_settings',array('type'=>'system_name'))->row()->description;
		$data['system_name'] 	= $system_name;
	    
		$encrypted_id = $param1;
		$get_details = '';
		$subscription_id = '';
		if(!empty($encrypted_id)){
			$encrypted_key = base64_decode($encrypted_id);
			$key_array = explode('_', $encrypted_key);
			$subscription_id = $key_array[0];
			//$subscription_id = 7;
			$data['enc_subs_id'] 	= $subscription_id;
			$get_details = $this->db->get_where('newsletter_subscription', array('newsletter_subscription_id'=>$subscription_id))->row_array();
			$this->db->query("update newsletter_subscription set email_verfied = 'Yes' where newsletter_subscription_id = '".$subscription_id."' ");
			// $user_email = $get_details['email'];
		}
		
		$data['subs_details'] 	= $get_details;
		// $data['subs_id'] 		= $subscription_id;
		
		$data['page_title'] 	= 'Subscribed';
		$data['page_sub_title'] = '';
		$data['page_name'] 		= 'subscribed';
		$this->load->view('home/index', $data);
	}
	/***** Newsletter Confirm Subscribed Page *********/
	
	/***** Newsletter setting save by ajax *********/
	public function save_subscription_settings($param1 = '', $param2 = '', $param3 = ''){
		$subs_id    = $this->input->post('subs_id');
		$gender     = $this->input->post('gender');
		$first_name = $this->input->post('first_name');
		$last_name  = $this->input->post('last_name');
		$address    = $this->input->post('address');
		$house_no   = $this->input->post('house_no');
		$post_code  = $this->input->post('post_code');
		$city       = $this->input->post('city');
		$birth_date = $this->input->post('birth_date');
		$birth_month= $this->input->post('birth_month');
		$birth_year = $this->input->post('birth_year');
		$promotions = $this->input->post('promotions');
		
		$update_data['gender']     = $gender;
		$update_data['first_name'] = $first_name;
		$update_data['last_name']  = $last_name;
		$update_data['address']    = $address;
		$update_data['house_no']   = $house_no;
		$update_data['post_code']  = $post_code;
		$update_data['city']       = $city;
		$update_data['birth_date'] = $birth_date;
		$update_data['birth_month']= $birth_month;
		$update_data['birth_year'] = $birth_year;
		if(!empty($promotions)){
			$update_data['agreed_to_promotions'] = 'Yes';
		} else {
			$update_data['agreed_to_promotions'] = 'No';
		}
		$update_data['verify_date'] = date('Y-m-d H:i:sa');
		$update_data['status']      = 'Active';
		$this->db->where('newsletter_subscription_id', $subs_id);
		$this->db->update('newsletter_subscription', $update_data);
		$cat_id_array = $this->input->post('cat_id');
		$this->db->query("delete from subscribers_intrest where newsletter_subscription_id = '".$subs_id."' ");
		$categories_selected = array();
		if(!empty($cat_id_array)){
			foreach($cat_id_array as $key=>$val){
				$add_data['newsletter_subscription_id'] = $subs_id;
				$add_data['categories_id'] = $key;
				$this->db->insert('subscribers_intrest', $add_data);
				$cat_details = $this->db->get_where('categories', array('categories_id'=>$key))->row_array();
				array_push($categories_selected, $cat_details['name']);
			}
		}
		$response['page_data'] = $update_data;
		$response['categories'] = $categories_selected;
		echo json_encode($response);
		exit;
	}
	/***** Newsletter setting save by ajax *********/
	
	/***** Give review to coupon *********/
	public function give_review(){
		
		$ip_address  = $this->input->ip_address();
		$dataArray   = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip_address));
		$country_name= $dataArray->geoplugin_countryName;
		
        $type        = $this->input->post('type');
		$brand_id    = $this->input->post('brandID');
		$coupons_id  = $this->input->post('couponID');		
		$cate_id     = $this->input->post('cateID');		
		 
		$checkdata['brand_id']       = $brand_id;
		$checkdata['coupons_id']     = $coupons_id;
		$checkdata['categories_id']  = $cate_id; 
		$checkdata['user_ip']        = $ip_address;
		$reviewdata = $this->db->get_where('ratings',$checkdata);
		$check_ex   = $reviewdata->num_rows();
		if($check_ex==0){
			
			$savedata['review']         = $type;
			$savedata['brand_id']       = $brand_id;
			$savedata['coupons_id']     = $coupons_id;
			$savedata['categories_id']  = $cate_id;
			$savedata['date_added']  = date("Y-m-d H:i:s");
			$savedata['user_ip']     = $ip_address;
			$savedata['country_name']= $country_name;
			$savedata['status']      = "Active";
			
			$result = 	$this->db->insert('ratings', $savedata);
	    }
		else{
			$review_id = $reviewdata->row()->ratings_id;
		
			$updateData['review']      = $type;	
			$this->db->where('ratings_id', $review_id);
			$result = 	$this->db->update('ratings', $updateData);
			
		}
		$all_reviews  = $this->db->get_where('ratings',array('user_ip'=>$ip_address,'brand_id'=>$brand_id,'coupons_id'=>$coupons_id))->num_rows();
		
		$check_like  = $this->db->get_where('ratings',array('user_ip'=>$ip_address,'brand_id'=>$brand_id,'coupons_id'=>$coupons_id,'review'=>'Like'))->num_rows();
		
		if($all_reviews!=0){
		 $success_rate = ($check_like/$all_reviews) * 100;	
		}
		else{
		 $success_rate = 0;	
		}
		$response['type']        = $type;
		$response['total_votes'] = $all_reviews;
		$response['success_rate'] = $success_rate;
	    if($result){
			echo json_encode($response);
		}
        else{
			echo "error";
		}		
		
	
		
	}

	public function give_ratting(){
		
		$ip_address  = $this->input->ip_address();
		$dataArray   = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip_address));
		$country_name= $dataArray->geoplugin_countryName;
		
        $ratting        = $this->input->post('ratting');
		$brand_id    = $this->input->post('brandID');		
		 
		$checkdata['brands_id']       = $brand_id;
		$checkdata['user_ip']        = $ip_address;
		$reviewdata = $this->db->get_where('reviews',$checkdata);
		$check_ex   = $reviewdata->num_rows();
		if($check_ex==0){
			
			$savedata['stars']       = $ratting;
			$savedata['brands_id']   = $brand_id;
			$savedata['date_added']  = date("Y-m-d H:i:s");
			$savedata['user_ip']     = $ip_address;
			$savedata['country_name']= $country_name;			
			$result                  = 	$this->db->insert('reviews', $savedata);
			$this->db->select('AVG(stars) As avg_r');
			$all_stars    = $this->db->get_where('reviews',array('brands_id'=>$brand_id))->row()->avg_r;
			$all_reviews  = $this->db->get_where('reviews',array('brands_id'=>$brand_id))->num_rows();					
			$response['avg_star']        = round($all_stars,2);
			$response['all_reviews']     = $all_reviews;
			$response['msg']             = "success";
			
	    }
		else{
			$all_stars  = $this->db->get_where('reviews',array('user_ip'=>$ip_address,'brands_id'=>$brand_id))->row()->stars;					
			$response['avg_star']        = $all_stars;
			$response['msg']             = "already review";
		}
		
	
	    echo json_encode($response);
		
	}
	/***** Give review to coupon *********/
	public function noUrl(){
		redirect(base_url(), 'refresh');
	}
	
}