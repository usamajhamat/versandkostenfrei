<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Robots extends CI_Controller {
	/***** ADMIN INDEX *********/
	public function __construct() {
		parent::__construct();
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET, POST ,OPTIONS, PUT');
	

	}
	public function index(){
       

		header("Content-Type: text/xml;charset=iso-8859-1");
      
		$this->load->view('robots.php');
	}
	
}