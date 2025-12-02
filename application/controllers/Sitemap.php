<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends CI_Controller {
	/***** ADMIN INDEX *********/
	public function __construct() {
		parent::__construct();
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET, POST ,OPTIONS, PUT');
	

	}
	public function index(){
        $data['brands'] = $this->db->select('name')->where(array('status'=>'Active','name!='=>'C&A Rabattcode'))->get("brands")->result_array();
		
		$get_all_brands = $this->db->get('brands_pages')->result_array();

		// echo $this->db->last_query();
		// echo "<pre>";
		// print_r($get_all_brands); 
		// echo "</pre>"; exit;
        $data['all_brands_pages'] = $get_all_brands;
        $data['categories'] = $this->db->get_where('categories',array('status'=>'Active'))->result_array();
        $data['sub_categories'] = $this->db->get_where('sub_categories',array('status'=>'Active'))->result_array();

		header("Content-Type: text/xml;charset=iso-8859-1");
      
		$this->load->view('sitemap.php',$data);
	}
	
}