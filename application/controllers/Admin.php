<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	/***** ADMIN INDEX *********/
	public function __construct() {
		parent::__construct();
		// $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET, POST ,OPTIONS, PUT');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

	}
	public function index(){
		if($this->session->userdata('login') == 1){
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/dashboard', 'refresh');
		}
		$this->load->view('admin/login');
	}
	/***** ADMIN INDEX *********/
	/* VERIFY ACCOUNT */
	public function login(){
		// Validate the user can login
		
		$result = $this->Db_model->login_varify_accounts();
	
		// Now we verify the result
		if($result != false || !empty($result)){
				$this->session->set_userdata('user_name',$result->first_name);
				$this->session->set_userdata('users_id',$result->users_system_id);
				$this->session->set_userdata('users_email',$result->email);
				$this->session->set_userdata('directory','admin');
				$this->session->set_userdata('role_id',$result->users_roles_id); 
				$this->session->set_userdata('login',1);
				$this->session->set_flashdata('msg_success', ' Login Successfully.');
				
			$get_permissions = $this->db->get_where('pages_access', array('user_roles_id'=>$result->users_roles_id));
			if($get_permissions->num_rows() >=1 ){
				$get_permissions = $get_permissions->row();
				$this->session->set_userdata('manage_categories',$get_permissions->manage_categories);
				$this->session->set_userdata('manage_sub_categories',$get_permissions->manage_sub_categories);
				$this->session->set_userdata('manage_brands',$get_permissions->manage_brands);
				$this->session->set_userdata('manage_coupons',$get_permissions->manage_coupons);
				$this->session->set_userdata('currencies',$get_permissions->currencies);
				$this->session->set_userdata('manage_users',$get_permissions->manage_users);
				$this->session->set_userdata('manage_myprofile',$get_permissions->manage_myprofile);
				$this->session->set_userdata('system_settings',$get_permissions->system_settings);
				$this->session->set_userdata('manage_saving_offers',$get_permissions->manage_saving_offers);
				$this->session->set_userdata('manage_static_content',$get_permissions->manage_static_content);			
				$this->session->set_userdata('manage_about_us',$get_permissions->manage_about_us);
				$this->session->set_userdata('manage_contact_us',$get_permissions->manage_contact_us);
				$this->session->set_userdata('manage_privacy_policy',$get_permissions->manage_privacy_policy);
				$this->session->set_userdata('manage_faqs',$get_permissions->manage_faqs);
				$this->session->set_userdata('manage_advertise',$get_permissions->manage_advertise);
				$this->session->set_userdata('manage_newsletter_subscription',$get_permissions->manage_newsletter_subscription);
				$this->session->set_userdata('manage_slider_images',$get_permissions->manage_slider_images);
				$this->session->set_userdata('brands_sort_order',$get_permissions->brands_sort_order);
				$this->session->set_userdata('seo_settings',$get_permissions->seo_settings);
				$this->session->set_userdata('customer_queries',$get_permissions->customer_queries);
				$this->session->set_userdata('manage_static_pages',$get_permissions->manage_static_pages);
				$this->session->set_userdata('manage_newsltter_intrests',$get_permissions->manage_newsltter_intrests);
				$this->session->set_userdata('manage_alert_subscription',$get_permissions->manage_alert_subscription);
				$this->session->set_userdata('manage_voucherr_blogs',$get_permissions->manage_voucherr_blogs);

			}
			redirect(base_url().'admin/dashboard', 'refresh');
		}
		$group_member = $this->Db_model->login_varify_group_accounts();
		if($group_member != false || !empty($group_member)){
			$this->session->set_userdata('user_name',$group_member->user_name);
			$this->session->set_userdata('users_id',$group_member->users_id);
			$this->session->set_userdata('users_email',$group_member->email);
			$this->session->set_userdata('directory','admin');
			$this->session->set_userdata('role_id',$group_member->user_roles_id); 
			$this->session->set_userdata('login',1);
			$this->session->set_flashdata('msg_success', 'Login Successfully.');
			$get_permissions = $this->db->get_where('pages_access', array('user_roles_id'=>$group_member->user_roles_id));
			if($get_permissions->num_rows() >=1 ){
				$get_permissions = $get_permissions->row();
				$this->session->set_userdata('manage_categories',$get_permissions->manage_categories);
				$this->session->set_userdata('manage_sub_categories',$get_permissions->manage_sub_categories);
				$this->session->set_userdata('manage_brands',$get_permissions->manage_brands);
				$this->session->set_userdata('manage_coupons',$get_permissions->manage_coupons);
				$this->session->set_userdata('currencies',$get_permissions->currencies);
				$this->session->set_userdata('manage_users',$get_permissions->manage_users);
				$this->session->set_userdata('manage_myprofile',$get_permissions->manage_myprofile);
				$this->session->set_userdata('system_settings',$get_permissions->system_settings);
				$this->session->set_userdata('manage_saving_offers',$get_permissions->manage_saving_offers);
				$this->session->set_userdata('manage_static_content',$get_permissions->manage_static_content);		
				$this->session->set_userdata('manage_about_us',$get_permissions->manage_about_us);
				$this->session->set_userdata('manage_contact_us',$get_permissions->manage_contact_us);
				$this->session->set_userdata('manage_privacy_policy',$get_permissions->manage_privacy_policy);
				$this->session->set_userdata('manage_faqs',$get_permissions->manage_faqs);
				$this->session->set_userdata('manage_advertise',$get_permissions->manage_advertise);
				$this->session->set_userdata('manage_newsletter_subscription',$get_permissions->manage_newsletter_subscription);
				$this->session->set_userdata('manage_slider_images',$get_permissions->manage_slider_images);
				$this->session->set_userdata('brands_sort_order',$get_permissions->brands_sort_order);			
				$this->session->set_userdata('seo_settings',$get_permissions->seo_settings);
				$this->session->set_userdata('customer_queries',$get_permissions->customer_queries);
				$this->session->set_userdata('manage_static_pages',$get_permissions->manage_static_pages);
				$this->session->set_userdata('manage_newsltter_intrests',$get_permissions->manage_newsltter_intrests);
				$this->session->set_userdata('manage_alert_subscription',$get_permissions->manage_alert_subscription);
				$this->session->set_userdata('manage_voucherr_blogs',$get_permissions->manage_voucherr_blogs);
			}
			redirect(base_url().'admin/dashboard', 'refresh');
		}
		if(empty($group_member) && empty($result) ){
			$this->session->set_flashdata('msg_error', ' Email or password not correct!');
			redirect(base_url()."admin", 'refresh');
		}
	}
	
	public function forgot_password(){
		$this->load->view('admin/forgot_password');
	}
	
	public function CheckEmail($param1='', $param2 =''){
		$email  = $this->input->post('email');
		$db_val = $this->db->get_where('user', array('email' => $email))->num_rows();
		if($db_val >0){
			echo 'email already exist';
		}else{
			echo 'notexist';
		}
		exit;
	}
	
	public function retrieve_password($param1='', $param2 =''){
		$user_email = $this->input->post('retrive_email');   
		$response = $this->Db_model->retrieve_password($user_email);
		if($response== 'Mail Sent'){
			$this->session->set_flashdata('msg_success', ' Password Reset Link Sent To Your Email Successfully');					
		} else if($response== 'Mail Not Sent'){
			$this->session->set_flashdata('msg_error', ' Error In Sending Mail. Try Again.');					
		} else if($response== 'Email Not Found'){
			$this->session->set_flashdata('msg_error', ' Email Not Found, Please Check Your Email');					
		}
		$this->load->view('admin/login');
	}
	
	public function resetpassword($verification_code=''){
		$decoded_code = base64_decode($verification_code);
		$code_array = explode("_",$decoded_code);
		$user_id = $code_array[0];
		$data['user_id'] = $user_id;
		$this->load->view('admin/reset_password',$data);
	}
	
	public function reset_password($verification_code='', $user_id = ''){
		if($verification_code == 'update_password'){
			$new_password = $this->input->post('new_password');
			$confirm_password = $this->input->post('confirm_password');
			if($new_password != $confirm_password){
				$this->session->set_flashdata('msg_error', ' Your password did not match, try again.');
				redirect(base_url(), 'refresh');
			} else if($new_password == $confirm_password){
				$this->db->query("UPDATE user SET password = '".$new_password."', reset_password_code = ''  WHERE user_id = '".$user_id."'  ");
				$this->session->set_flashdata('msg_success', ' Password Updated Successfully.');
				redirect(base_url(), 'refresh');
			}
		}
	}
		/***** Retrieve Password Page *********/
	public function logout(){ 
		$this->session->unset_userdata('login');
		$this->session->sess_destroy();
		$this->session->set_flashdata('msg_error', 'logout Successfully!.');
		redirect(base_url()."gutscheinfuralleadmin", 'refresh');
	}
	/* VERIFY ACCOUNT */ 
	
	/***** DASBOARD *********/
	public function dashboard(){
		if($this->session->userdata('login') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		
		$data['users'] 			= '';
		$data['page_title'] 	= 'Dashboard';
		$data['page_sub_title'] = '';
		$data['page_name'] 		= 'dashboard';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
	}
	/***** DASBOARD *********/
	/***** Email *********/
	function send_email($param1=''){
		if($this->session->userdata('login') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		if($param1=='request_payment'){
			$user_id	 	 = $this->input->post('user_id');
			$storage_id 	 = $this->input->post('storage_id');
			$userData		 = $this->Db_model->get_data_row('user','user_id',$user_id);
			$name 	  		 = $userData->name;
			$email    		 = $userData->email;
			$message 		 = $this->Db_model->get_data_name('email_templates','type','payment_storage_email','body');
			$message_detail  =  $this->Db_model->string_replace_storage($user_id ,$name,$email,$storage_id,$message);
			
			$result = $this->Email_model->do_email($message_detail,'Request Payment',$email);
			if($result){
				echo 'success';
			}else{
				echo 'fail';
			}
			exit;
		}
	}
	/***** Email *********/
	/***** CUSTOMERS *********/
	public function users_list($param1='', $param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('manage_users') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		
		if($param1 =='delete'){
			
			// $result = $this->Db_model->delete_data('user',$param2);
			$result = $this->db->query("UPDATE  users SET status = 'Inactive' WHERE user_id = '".$param2."' ");
			if($result){
				$this->session->set_flashdata('msg_success', 'User Deleted Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/customer_list', 'refresh');
		}
		
		$all_users = $this->db->query("select users.*, country.name as country_name, lng.name as lng_name, currency.name as currency_name 
			from users 
			Left join currencies as currency ON users.currencies_id = currency.currencies_id
			Left join countries as country ON users.countries_id = country.id
			Left join languages as lng ON users.languages_id = lng.languages_id
			WHERE users.user_roles_id = '2'
			")->result_array();
		// $data['users'] 			= $this->db->get_where('users',array('status!='=>'Inactive'))->result_array();
		$profile_pic_url = $this->db->get_where('system_settings',array('type'=>'user_profile_pic'))->row()->description;
		$data['profile_pic_url'] = $profile_pic_url;
		$data['users'] 			= $all_users;
		$data['page_title'] 	= 'Manage Users';
		$data['page_sub_title'] = 'All Users';
		$data['page_name'] 		= 'manage_users';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
	}
	/***** CUSTOMERS *********/
    /***** Manage Categories *********/
    function manage_categories($param1='',$param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('manage_categories') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
        $upload_url      = $this->db->get_where('system_settings',array('type'=>'cat_img_url'))->row()->description;   
        $upload_icon_url = $this->db->get_where('system_settings',array('type'=>'cat_icon_url'))->row()->description;   
        if($param1=='add'){
            $saveData['name']          = $this->input->post('name');
            $saveData['en_name']       = $this->input->post('en_name');
            $saveData['type']          = $this->input->post('type');
            $saveData['description']   = $this->input->post('description');
            /* $saveData['long_description']   = $this->input->post('long_description'); */
           // $saveData['font_icon']   = $this->input->post('font_icon');
            $saveData['status']        = $this->input->post('status');
			// $saveData['sort_order']    = $this->input->post('sort_order');
			// $saveData['section_sort_order']    = $this->input->post('section_sort_order');
			$saveData['cat_heading']              = $this->input->post('cat_heading');
			$saveData['seo_title']              = $this->input->post('seo_title');
			$saveData['seo_description']              = $this->input->post('seo_desc');
			$saveData['seo_key_words']              = $this->input->post('seo_keys');
			
            $result = $this->db->insert('categories',$saveData);
			$insert_id = $this->db->insert_id();
            if(!empty($_FILES['cat_image']['name'])){
				$file_name  = $insert_id.'_'.$_FILES['cat_image']['name'];
				$path_to_file = $upload_url.''.$file_name;				
				move_uploaded_file($_FILES['cat_image']['tmp_name'], $path_to_file);	
				$updateData['cat_image'] = $file_name;
				$this->db->where('categories_id', $insert_id);
				$this->db->update('categories', $updateData);
			}
			
			if(!empty($_FILES['font_icon']['name'])){
				$file_name  = $insert_id.'_'.$_FILES['font_icon']['name'];
				$path_to_file = $upload_icon_url.''.$file_name;				
				move_uploaded_file($_FILES['font_icon']['tmp_name'], $path_to_file);	
				$updateData['font_icon'] = $file_name;
				$this->db->where('categories_id', $insert_id);
				$this->db->update('categories', $updateData);
			}
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'Manage Categories';
					$desc = $mod_type.' Added from admin panel';
					$mod_desc = $mod_type.' Added';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', ' Data Added Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_categories', 'refresh');
        }
        if($param1=='edit'){
            $saveData['name']            = $this->input->post('name');
            $saveData['en_name']         = $this->input->post('en_name');
            $saveData['type']            = $this->input->post('type');
            $saveData['description']     = $this->input->post('description');
			/* $saveData['long_description']= $this->input->post('long_description'); */
			// $saveData['sort_order']      = $this->input->post('sort_order');
			// $saveData['section_sort_order']      = $this->input->post('section_sort_order');
			$saveData['seo_title']              = $this->input->post('seo_title');
			$saveData['seo_description']              = $this->input->post('seo_desc');
			$saveData['seo_key_words']              = $this->input->post('seo_keys');
            $saveData['status']                   = $this->input->post('status');
			$saveData['cat_heading']              = $this->input->post('cat_heading');
			if($saveData['status']=="Inactive"){
			  	 $this->db->where('categories_id',$param2);
                 $result = $this->db->update('coupons',array('status'=>'Inactive'));
			}
            if(!empty($_FILES['cat_image']['name'])){
				$get_old_pic = $this->db->get_where('categories', array('categories_id'=>$param2))->row()->cat_image;
				$old_file_path = $upload_url.$get_old_pic;
				if(!empty($get_old_pic) && file_exists($old_file_path)){
					unlink($old_file_path);
				}
				$file_name  = $param2.'_'.$_FILES['cat_image']['name'];
				$path_to_file = $upload_url.''.$file_name;				
				move_uploaded_file($_FILES['cat_image']['tmp_name'], $path_to_file);	
				$saveData['cat_image'] = $file_name;		
			}
			
			 if(!empty($_FILES['font_icon']['name'])){
				$get_old_pic = $this->db->get_where('categories', array('categories_id'=>$param2))->row()->font_icon;
				$old_file_path = $upload_icon_url.$get_old_pic;
				if(!empty($get_old_pic) && file_exists($old_file_path)){
					unlink($old_file_path);
				}
				$file_name  = $param2.'_'.$_FILES['font_icon']['name'];
				$path_to_file = $upload_icon_url.''.$file_name;				
				move_uploaded_file($_FILES['font_icon']['tmp_name'], $path_to_file);	
				$saveData['font_icon'] = $file_name;		
			}
            $this->db->where('categories_id',$param2);
            $result = $this->db->update('categories',$saveData);
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'Manage Categories';
					$desc = $mod_type.' Updated from admin panel';
					$mod_desc = $mod_type.' Updated';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', 'Data Updated Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_categories', 'refresh');
        }
        if($param1=='delete'){
            $this->db->where('categories_id',$param2);
            $result = $this->db->delete('categories');
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'Manage Categories';
					$desc = $mod_type.' Deleted from admin panel';
					$mod_desc = $mod_type.' Deleted';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', 'Data Deleted Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_categories', 'refresh');
        }
        $data['cat_img_url']  	= $upload_url;
        $data['cat_icon_url']  	= $upload_icon_url;
        $data['categories'] 	= $this->db->get('categories')->result_array();
		$data['page_title'] 	= 'Manage All Categories';
		$data['page_sub_title'] = 'Categories';
		$data['page_name'] 		= 'manage_categories';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    } 
    /***** Manage Categories *********/
	/***** manage brands page *********/
    function manage_brands_page($param1='',$param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('manage_categories') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}

        if($param1=='add'){

		
			
            $brands                            = $this->input->post('brands');
	
            $saveData['name']                  = $this->input->post('name');
            $saveData['status']                  = $this->input->post('status');
			$saveData['seo_title']              = $this->input->post('seo_title');
			$saveData['seo_description']              = $this->input->post('seo_desc');
			$saveData['seo_key_words']              = $this->input->post('seo_keys');
			$saveData['date_added']                  =date("Y-m-d H:i:s");
			 
            $result = $this->db->insert('brands_pages',$saveData);
		    $last_id  = $this->db->insert_id();
			foreach($brands as $key => $brand) {
				$addbrands['brands_pages_id']  = $last_id;
				$addbrands['brands_id']  = $brand;
				$addbrands['date_added']  = date("Y-m-d H:i:s");
				
				$result = $this->db->insert('brands_pages_brands',$addbrands);
				
			 }
			
            if($result){ 
				

				$this->session->set_flashdata('msg_success', ' Page Added Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_brands_page', 'refresh');
        }
        if($param1=='edit'){
			$brands                            = $this->input->post('brands');
	
            $saveData['name']                  = $this->input->post('name');
            $saveData['status']                  = $this->input->post('status');
			$saveData['seo_title']              = $this->input->post('seo_title');
			$saveData['seo_description']              = $this->input->post('seo_desc');
			$saveData['seo_key_words']              = $this->input->post('seo_keys');
	
			
			$this->db->where('brands_pages_id', $param2);
			$result = $this->db->update('brands_pages', $saveData);
            // -- Deleteing previous brands --// 
			$this->db->where('brands_pages_id',$param2);
            $result = $this->db->delete('brands_pages_brands');
           // -- Deleteing previous brands --// 
		    $last_id  = $param2;
			foreach($brands as $key => $brand) {
				$addbrands['brands_pages_id']  = $last_id;
				$addbrands['brands_id']  = $brand;
				$addbrands['date_added']  = date("Y-m-d H:i:s");
				
				$result = $this->db->insert('brands_pages_brands',$addbrands);
				
			 }
			
            if($result){ 
				

				$this->session->set_flashdata('msg_success', ' Page updated Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_brands_page', 'refresh');
        }
        if($param1=='delete'){
            $this->db->where('categories_id',$param2);
            $result = $this->db->delete('categories');
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'Manage Categories';
					$desc = $mod_type.' Deleted from admin panel';
					$mod_desc = $mod_type.' Deleted';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', 'Data Deleted Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_brands_page', 'refresh');
        }
        $data['cat_img_url']  	= @$upload_url;
        $data['cat_icon_url']  	= @$upload_icon_url;
        $data['brands_pages'] 	= $this->db->get('brands_pages')->result_array();
		$data['page_title'] 	= 'Manage brands page';
		$data['page_sub_title'] = 'brands_pages';
		$data['page_name'] 		= 'manage_brands_page';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    } 
    /***** Manage Categories *********/
    /***** Manage blogs *********/
	 function manage_voucher_blogs($param1='',$param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('manage_voucherr_blogs') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
        $upload_url      = $this->db->get_where('system_settings',array('type'=>'blogs_img_url'))->row()->description;   
      
        if($param1=='add'){
		
            $saveData['heading']             = $this->input->post('heading');
            /* $saveData['categories_id']          = $this->input->post('categories_id'); */
            $saveData['description']    = $this->input->post('long_description');
            $saveData['date_added']     = date("Y-m-d H:i:s");
            $saveData['status']         = $this->input->post('status');
			
            $result = $this->db->insert('voucherr_blogs',$saveData);
		 	$insert_id = $this->db->insert_id();
            if(!empty($_FILES['blog_image']['name'])){
				$file_name  = $insert_id.'_'.$_FILES['blog_image']['name'];
				$path_to_file = $upload_url.''.$file_name;				
				move_uploaded_file($_FILES['blog_image']['tmp_name'], $path_to_file);	
				$updateData['blog_image'] = $file_name;
				$this->db->where('voucherr_blogs_id', $insert_id);
				$this->db->update('voucherr_blogs', $updateData);
			} 
			
			
            if($result){
				
				$this->session->set_flashdata('msg_success', ' Data Added Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_voucher_blogs', 'refresh');
        }
        if($param1=='edit'){
            $saveData['heading']               = $this->input->post('heading');
            /* $saveData['categories_id']         = $this->input->post('categories_id'); */
            $saveData['description']           = $this->input->post('long_description');
            $saveData['status']                = $this->input->post('status');
		
            if(!empty($_FILES['blog_image']['name'])){
				$get_old_pic = $this->db->get_where('voucherr_blogs', array('voucherr_blogs_id'=>$param2))->row()->blog_image;
				$old_file_path = $upload_url.$get_old_pic;
				if(!empty($get_old_pic) && file_exists($old_file_path)){
					unlink($old_file_path);
				}
				$file_name  = $param2.'_'.$_FILES['blog_image']['name'];
				$path_to_file = $upload_url.''.$file_name;				
				move_uploaded_file($_FILES['blog_image']['tmp_name'], $path_to_file);	
				$saveData['blog_image'] = $file_name;		
			}
			
			
            $this->db->where('voucherr_blogs_id',$param2);
            $result = $this->db->update('voucherr_blogs',$saveData);
            if($result){
				
				$this->session->set_flashdata('msg_success', 'Data Updated Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_voucher_blogs', 'refresh');
        }
        if($param1=='delete'){
            $this->db->where('voucherr_blogs_id',$param2);
            $result = $this->db->delete('voucherr_blogs');
            if($result){
				
				$this->session->set_flashdata('msg_success', 'Data Deleted Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_voucher_blogs', 'refresh');
        }
        $data['cat_img_url']  	= $upload_url;
        $data['voucherr_blogs'] = $this->db->get('voucherr_blogs')->result_array();
		$data['page_title'] 	= 'Manage All Blog';
		$data['page_sub_title'] = 'Manage Blog';
		$data['page_name'] 		= 'manage_blog';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    } 
    /***** Manage blogs *********/
	
	/***** Manage Sub Categories *********/
    function manage_sub_categories($param1='',$param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('manage_sub_categories') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
        $upload_url = $this->db->get_where('system_settings',array('type'=>'sub_cat_img_url'))->row()->description;   
        if($param1=='add'){
            $saveData['categories_id'] = $this->input->post('categories_id'); 
            $saveData['name']          = $this->input->post('name');
            $saveData['en_name']          = $this->input->post('en_name');
            $saveData['heading']          = $this->input->post('heading');
            $saveData['description']   = $this->input->post('description');
            $saveData['sub_sort']   = "1";
            $saveData['sort_order']   = "1";
            $saveData['status']        = $this->input->post('status');
			$saveData['seo_title']              = $this->input->post('seo_title');
			$saveData['seo_description']              = $this->input->post('seo_desc');
			$saveData['seo_key_words']              = $this->input->post('seo_keys');
            $result = $this->db->insert('sub_categories',$saveData);
			$insert_id = $this->db->insert_id();
            if(!empty($_FILES['sub_cat_image']['name'])){
				$file_name  = $insert_id.'_'.$_FILES['sub_cat_image']['name'];
				$path_to_file = $upload_url.''.$file_name;				
				move_uploaded_file($_FILES['sub_cat_image']['tmp_name'], $path_to_file);	
				$updateData['sub_cat_image'] = $file_name;
				$this->db->where('sub_categories_id', $insert_id);
				$this->db->update('sub_categories', $updateData);
			}
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'Manage Sub Categories';
					$desc = $mod_type.' Added from admin panel';
					$mod_desc = $mod_type.' Added';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', ' Data Added Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_sub_categories', 'refresh');
        }
        if($param1=='edit'){
             $saveData['categories_id']   = $this->input->post('categories_id'); 
            $saveData['name']            = $this->input->post('name');
            $saveData['en_name']          = $this->input->post('en_name');
            $saveData['heading']          = $this->input->post('heading');
            $saveData['description']     = $this->input->post('description');
			$saveData['sub_sort']   = "1";
            $saveData['sort_order']   = "1";
            $saveData['status']          = $this->input->post('status');
			$saveData['seo_title']              = $this->input->post('seo_title');
			$saveData['seo_description']              = $this->input->post('seo_desc');
			$saveData['seo_key_words']              = $this->input->post('seo_keys');
			if($saveData['status']=="Inactive"){
			  	 $this->db->where('sub_categories_id',$param2);
                 $result = $this->db->update('coupons',array('status'=>'Inactive'));
			}
            if(!empty($_FILES['sub_cat_image']['name'])){
				$get_old_pic = $this->db->get_where('sub_categories', array('sub_categories_id'=>$param2))->row()->sub_cat_image;
				$old_file_path = $upload_url.$get_old_pic;
				if(!empty($get_old_pic) && file_exists($old_file_path)){
					unlink($old_file_path);
				}
				$file_name  = $param2.'_'.$_FILES['sub_cat_image']['name'];
				$path_to_file = $upload_url.''.$file_name;				
				move_uploaded_file($_FILES['sub_cat_image']['tmp_name'], $path_to_file);	
				$saveData['sub_cat_image'] = $file_name;		
			}
            $this->db->where('sub_categories_id',$param2);
            $result = $this->db->update('sub_categories',$saveData);
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'Manage Sub Categories';
					$desc = $mod_type.' Updated from admin panel';
					$mod_desc = $mod_type.' Updated';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', 'Data Updated Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_sub_categories', 'refresh');
        }
        if($param1=='delete'){
            $this->db->where('sub_categories_id',$param2);
            $result = $this->db->delete('sub_categories');
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'Manage Sub Categories';
					$desc = $mod_type.' Deleted from admin panel';
					$mod_desc = $mod_type.' Deleted';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', 'Data Deleted Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_sub_categories', 'refresh');
        }
        $data['sub_cat_img_url']  	= $upload_url;
        $data['sub_categories'] 	= $this->db->get('sub_categories')->result_array();
		$data['page_title'] 	    = 'Manage All Sub Categories';
		$data['page_sub_title']     = 'Sub Categories';
		$data['pag_type']           = "";
		$data['page_name'] 		    = 'manage_sub_categories';
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    } 
    /***** Manage Sub Categories *********/
    
	/***** Manage Brand Content  *********/
    function pages_content($param1='',$param2='',$param3=''){
		if($this->session->userdata('login') != 1 ){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		
		 
        $upload_url = $this->db->get_where('system_settings',array('type'=>'sub_cat_img_url'))->row()->description;   
        if($param1=='add'){
		   $pagess_id =	$this->input->post('pages_id');
            if($param2=="brands"){
				$saveData['brands_id']     = $this->input->post('pages_id');
				$saveData['type']          = "brand";
			}
			else if($param2=="sub_cate"){
				$saveData['sub_categories_id']     = $this->input->post('pages_id');
				$saveData['type']                  = "sub_category";
			}
			else if($param2=="cate"){
				$saveData['categories_id']     = $this->input->post('pages_id');
				$saveData['type']              = "catogery";
			}
			else if($param2=="brands_pages"){
				$saveData['brands_pages_id']     = $this->input->post('pages_id');
				$saveData['type']                = "brands_pages";
			}
			
			else if($param2=="Lastest"){
				$saveData['coupon_name']      = "lastest";
				$saveData['type']              = "coupon";
				$pagess_id = $param2;
			}
			
			else if($param2=="Tips"){
				$saveData['coupon_name']      = "tips";
				$saveData['type']              = "coupon";
				$pagess_id = $param2;
			}
			else if($param2=="Trend"){
				$saveData['coupon_name']      = "trend";
				$saveData['type']              = "coupon";
				$pagess_id = $param2;
			}
			else if($param2=="Popular"){
				$saveData['coupon_name']      = "popular";
				$saveData['type']              = "coupon";
				$pagess_id = $param2;

			}
           
            $saveData['heading']       = $this->input->post('cont_heading');
            $saveData['description']   = $this->input->post('editor1');
            $saveData['status']        = $this->input->post('status');
            $saveData['date_added']    = date("Y-m-d H:i:s");
            $result = $this->db->insert('brands_contents',$saveData);
			$insert_id = $this->db->insert_id();
         
            if($result){
				$this->session->set_flashdata('msg_success', ' Data Added Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/pages_content/'.$pagess_id.'/'.$param2, 'refresh');
        }
        if($param1=='edit'){
			$pagess_id =	$this->input->post('pages_id');
			if($param3=="brands"){
				$saveData['brands_id']     = $this->input->post('pages_id');
				$saveData['type']          = "brand";
			}
			else if($param3=="sub_cate"){
				$saveData['sub_categories_id']     = $this->input->post('pages_id');
				$saveData['type']                  = "sub_category";
			}
			else if($param3=="cate"){
				$saveData['categories_id']     = $this->input->post('pages_id');
				$saveData['type']              = "catogery";
			}
			else if($param3=="brands_pages"){
				$saveData['brands_pages_id']     = $this->input->post('pages_id');
				$saveData['type']                = "brands_pages";
			}
			else if($param3=="Lastest"){
				$saveData['coupon_name']      = "lastest";
				$saveData['type']              = "coupon";
				$pagess_id = $param3;
			}
			else if($param3=="Tips"){
				$saveData['coupon_name']      = "tips";
				$saveData['type']              = "coupon";
				$pagess_id = $param3;
			}
			else if($param3=="Trend"){
				$saveData['coupon_name']      = "trend";
				$saveData['type']              = "coupon";
				$pagess_id = $param3;
			}
			else if($param3=="Popular"){
				$saveData['coupon_name']      = "popular";
				$saveData['type']              = "coupon";
				$pagess_id = $param3;

			}
            $saveData['heading']       = $this->input->post('cont_heading');
            $saveData['description']   = $this->input->post('editor1');
            $saveData['status']        = $this->input->post('status');
            $saveData['date_added']    = date("Y-m-d H:i:s");
                      $this->db->where('brands_contents_id',$param2);
            $result = $this->db->update('brands_contents',$saveData);
            if($result){
			
				$this->session->set_flashdata('msg_success', 'Data Updated Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/pages_content/'.$pagess_id.'/'.$param3, 'refresh');
        }
        if($param1=='delete'){
            $this->db->where('brands_contents_id',$param2);
            $result = $this->db->delete('brands_contents');
            if($result){
			
				$this->session->set_flashdata('msg_success', 'Data Deleted Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_sub_categories', 'refresh');
        }
		if($param1=='sort_order'){
           if($param2=='brand_content'){
			$array = array();
            for($i=0; $i<count($_POST["page_id_array"]); $i++)
			{
				$query = "
				UPDATE brands_contents 
				SET sort_order = '".($i+1)."' 
				WHERE 	brands_contents_id = '".$_POST["page_id_array"][$i]."'";
				 
				$array[$i] = $this->db->query($query);

			}
           
			echo json_encode($array); exit;
		   }
        }
		if($param2=='brands'){
			$data['page_contents'] 	    = $this->db->order_by('sort_order','asc')->get_where('brands_contents',array('brands_id'=>$param1))->result_array();
			$data['page_id'] 	        = $param1;
			$data['pag_type']           = $param2;
			$data['page_title'] 	    = 'Manage Brand Content';
			$data['page_sub_title']     = 'Manage Brand Content';
			$data['button_cap']         = 'Add Brand Content';	
			$data['page_name'] 		    = 'manage_brands_content';
		}
		else if($param2=='sub_cate'){
            $data['page_contents'] 	    = $this->db->order_by('sort_order','asc')->get_where('brands_contents',array('sub_categories_id'=>$param1))->result_array();
			$data['page_id'] 	        = $param1;
			$data['pag_type']           = $param2;
			$data['page_title'] 	    = 'Manage Sub Category Content';
			$data['page_sub_title']     = 'Manage Sub Category Content';
			$data['button_cap']         = 'Add Sub Category Content';
			$data['page_name'] 		    = 'manage_brands_content';
		}
		else if($param2=='brands_pages'){
			$data['page_contents'] 	    = $this->db->order_by('sort_order','asc')->get_where('brands_contents',array('brands_pages_id'=>$param1))->result_array();		
			$data['page_id'] 	        = $param1;
			$data['pag_type']           = $param2;
			$data['page_title'] 	    = 'Manage Brands pages Content';
			$data['page_sub_title']     = 'Manage Brands pages Content';
			$data['button_cap']         = 'Add Brands pages Content';
			$data['page_name'] 		    = 'manage_brands_content';
		}
		else if($param2=='cate'){
            $data['page_contents'] 	    = $this->db->order_by('sort_order','asc')->get_where('brands_contents',array('categories_id'=>$param1))->result_array();
			$data['page_id'] 	        = $param1;
			$data['pag_type']           = $param2;
			$data['page_title'] 	    = 'Manage Category Content';
			$data['page_sub_title']     = 'Manage Category Content';
			$data['button_cap']         = 'Add Category Content';
			$data['page_name'] 		    = 'manage_brands_content';
		}
		else if($param1=='Lastest'){
            $data['page_contents'] 	    = $this->db->order_by('sort_order','asc')->get_where('brands_contents',array('coupon_name'=>'lastest'))->result_array();		
			$data['page_id'] 	        = $param1;
			$data['pag_type']           = $param1;
			$data['page_title'] 	    = 'Manage Lastest Content';
			$data['page_sub_title']     = 'Manage Lastest Content';
			$data['button_cap']         = 'Add Lastest Content';
			$data['page_name'] 		    = 'manage_brands_content';
		}
		else if($param1=='Tips'){
            $data['page_contents'] 	    = $this->db->order_by('sort_order','desc')->get_where('brands_contents',array('coupon_name'=>'tips'))->result_array();		
			$data['page_id'] 	        = $param1;
			$data['pag_type']           = $param1;
			$data['page_title'] 	    = 'Manage Tips Content';
			$data['page_sub_title']     = 'Manage Tips Content';
			$data['button_cap']         = 'Add Tips Content';
			$data['page_name'] 		    = 'manage_brands_content';
		}
		else if($param1=='Trend'){
            $data['page_contents'] 	    = $this->db->order_by('sort_order','asc')->get_where('brands_contents',array('coupon_name'=>'trend'))->result_array();		
			$data['page_id'] 	        = $param1;
			$data['pag_type']           = $param1;
			$data['page_title'] 	    = 'Manage Trend Content';
			$data['page_sub_title']     = 'Manage Trend Content';
			$data['button_cap']         = 'Add Trend Content';
			$data['page_name'] 		    = 'manage_brands_content';
		}
		else if($param1=='Popular'){
            $data['page_contents'] 	    = $this->db->order_by('sort_order','asc')->get_where('brands_contents',array('coupon_name'=>'popular'))->result_array();		
			$data['page_id'] 	        = $param1;
			$data['pag_type']           = $param1;
			$data['page_title'] 	    = 'Manage Popular Content';
			$data['page_sub_title']     = 'Manage Popular Content';
			$data['button_cap']         = 'Add Popular Content';
			$data['page_name'] 		    = 'manage_brands_content';
		}
		
		
		 
		
        
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    } 
    /***** Manage Brand Content end *********/


	/***** Manage similar brands *********/
    function similar_brands($param1='',$param2=''){
		if($this->session->userdata('login') != 1 ){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		if($param1=='add_similar'){
			$save_data['brands_id'] = $this->input->post('main_brands_id');	
			$save_data['similar_brand_id']     = $this->input->post('brands_id');	
			$result = $this->db->insert('similar_brands',$save_data);
			
			if($result){
				$response['status'] = 'success';
				$response['id'] = $this->db->insert_id();
			
			}
			else{
				$response['status'] = 'error';
				
			}
			echo json_encode($response); exit;
		 }
		 else if($param1=='delete_similar'){
			$save_data['brands_id'] = $this->input->post('main_brands_id');	
			$save_data['similar_brand_id']     = $this->input->post('brands_id');	
			 
			$this->db->where($save_data);
			$result = $this->db->delete('similar_brands');
			
			if($result){
				echo json_encode('success'); exit;
			}
			else{
				echo json_encode('error'); exit;
			}
			
		 }
		 if($param1=='sort_order'){
			
			 $array = array();
			 for($i=0; $i<count($_POST["page_id_array"]); $i++)
			 {
				 $query = "
				 UPDATE similar_brands 
				 SET sort_order = '".($i+1)."' 
				 WHERE 	similar_brands_id = '".$_POST["page_id_array"][$i]."'";
				  
				 $array[$i] = $this->db->query($query);
 
			 }
			
			 echo json_encode($array); exit;
			
		 }
		 
		$data['similar_brands']     = $this->db->order_by('sort_order','asc')->get_where('similar_brands',array('brands_id'=>$param1))->result_array();
		$data['similar_hidden_brands']     = $this->db->order_by('sort_order','asc')->get_where('similar_hidden_brands',array('brands_id'=>$param1))->result_array();
		$data['brand_data']         = $this->db->get('brands')->result_array();
        $data['brands_details']     = $this->db->get_where('brands',array('brands_id'=>$param1))->row();
        $data['brands_id'] 	        = $param1;
		$data['page_title'] 	    = 'Manage Similar brands';
		$data['page_sub_title']     = 'Manage Similar Brands';
		$data['page_name'] 		    = 'manage_similar_brands';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    } 
    /***** Manage similar brands *********/

	/***** Manage similar brands *********/
    function similar_hidden_brands($param1='',$param2=''){
		if($this->session->userdata('login') != 1 ){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		if($param1=='add_similar'){

			$save_data2['brands_id'] = $this->input->post('main_brands_id');	
			$save_data2['similar_brand_id']     = $this->input->post('brands_id');	
			$result = $this->db->insert('similar_hidden_brands',$save_data2);
			
			if($result){
				$response['status'] = 'success';
				$response['id'] = $this->db->insert_id();
			
			}
			else{
				$response['status'] = 'error';
				
			}
			echo json_encode($response); exit;
		 }
		 else if($param1=='delete_similar'){
			
			$save_data2['brands_id'] = $this->input->post('main_brands_id');	
			$save_data2['similar_brand_id']     = $this->input->post('brands_id');	
			
			$this->db->where($save_data2);
			$result = $this->db->delete('similar_hidden_brands');
			
			if($result){
				echo json_encode('success'); exit;
			}
			else{
				echo json_encode('error'); exit;
			}
			
		 }
		 if($param1=='sort_order'){
			
			 $array = array();
			 for($i=0; $i<count($_POST["page_id_array"]); $i++)
			 {
				 $query = "
				 UPDATE similar_hidden_brands 
				 SET sort_order = '".($i+1)."' 
				 WHERE 	similar_brands_id = '".$_POST["page_id_array"][$i]."'";
				  
				 $array[$i] = $this->db->query($query);
 
			 }
			
			 echo json_encode($array); exit;
			
		 }
		 
		$data['similar_brands']     = $this->db->order_by('sort_order','asc')->get_where('similar_brands',array('brands_id'=>$param1))->result_array();
		$data['similar_hidden_brands']     = $this->db->order_by('sort_order','asc')->get_where('similar_hidden_brands',array('brands_id'=>$param1))->result_array();
		$data['brand_data']         = $this->db->get('brands')->result_array();
        $data['brands_details']     = $this->db->get_where('brands',array('brands_id'=>$param1))->row();
        $data['brands_id'] 	        = $param1;
		$data['page_title'] 	    = 'Manage Similar brands';
		$data['page_sub_title']     = 'Manage Similar Brands';
		$data['page_name'] 		    = 'manage_similar_brands';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    } 
    /***** Manage similar brands *********/
	
	/***** Manage category Content start  *********/
    function category_content($param1='',$param2=''){
		if($this->session->userdata('login') != 1 ){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		
		 
        $upload_url = $this->db->get_where('system_settings',array('type'=>'sub_cat_img_url'))->row()->description;   
        if($param1=='add'){
            $saveData['brands_id']     = $this->input->post('brands_id');
            $saveData['heading']       = $this->input->post('cont_heading');
            $saveData['description']   = $this->input->post('editor1');
            $saveData['status']        = $this->input->post('status');
            $saveData['date_added']    = date("Y-m-d H:i:s");
            $result = $this->db->insert('brands_contents',$saveData);
			$insert_id = $this->db->insert_id();
         
            if($result){
				$this->session->set_flashdata('msg_success', ' Data Added Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/brands_contents/'.$saveData['brands_id'], 'refresh');
        }
        if($param1=='edit'){
             $saveData['brands_id']     = $this->input->post('brands_id');
            $saveData['heading']       = $this->input->post('cont_heading');
            $saveData['description']   = $this->input->post('editor1');
            $saveData['status']        = $this->input->post('status');
            $saveData['date_added']    = date("Y-m-d H:i:s");
                      $this->db->where('category_content_id',$param2);
            $result = $this->db->update('category_content',$saveData);
            if($result){
			
				$this->session->set_flashdata('msg_success', 'Data Updated Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/category_content/'.$saveData['brands_id'], 'refresh');
        }
        if($param1=='delete'){
            $this->db->where('sub_categories_id',$param2);
            $result = $this->db->delete('sub_categories');
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'Manage Sub Categories';
					$desc = $mod_type.' Deleted from admin panel';
					$mod_desc = $mod_type.' Deleted';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', 'Data Deleted Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_sub_categories', 'refresh');
        }
        $data['brands_contents'] 	= $this->db->get_where('brands_contents',array('categories_id'=>$param1,'status'=>'Active'))->result_array();
        $data['categories_id'] 	        = $param1;
		$data['page_title'] 	    = 'Manage Category Content';
		$data['page_sub_title']     = 'Manage Category Content';
		$data['page_name'] 		    = 'manage_category_content';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    } 
    /***** Manage category_content end *********/
	
	    /***** Manage sub Brands *********/

    function manage_sub_brands($param1='',$param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('manage_brands') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		$upload_url        = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;
		$slider_upload_url = $this->db->get_where('system_settings',array('type'=>'small_brands_slider'))->row()->description;
       
		
	    $data['active_slider'] 		= $this->db->get_where('brands',array('brand_slider'=>'Yes'))->num_rows();
	    $data['brands'] 		= $this->db->get_where('brands',array("sub_brand"=>1))->result_array();
		$data['brands_img_url'] = $upload_url;
		$data['slider_img_url'] = $slider_upload_url;
       
		$data['page_title'] 	= 'Manage sub Brands';
		$data['page_sub_title'] = ' All sub Brands';
		$data['page_name'] 		= 'manage_sub_brands';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    } 
    /***** Manage sub Brands *********/
    /***** Manage Brands *********/
    function manage_brands($param1='',$param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('manage_brands') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		$upload_url        = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;
		$slider_upload_url = $this->db->get_where('system_settings',array('type'=>'small_brands_slider'))->row()->description;
        if($param1=='add'){
			
            $saveData['name']          = $this->input->post('name');
             $saveData['title']          = $this->input->post('title');
            // $saveData['show_slider']   = $this->input->post('show_slider');
            $saveData['status']        = $this->input->post('status');
            $saveData['small_title']   = $this->input->post('small_title');
			$saveData['website_url']   = $this->input->post('website_url');
			$saveData['tele_phone']    = $this->input->post('telephone');
			$saveData['fax']           = $this->input->post('fax');
			$saveData['email']         = $this->input->post('email');
			$saveData['address']       = $this->input->post('address');
			$saveData['shipping_cost']     = $this->input->post('shipping_cost');
			$saveData['shipping_from']     = $this->input->post('shipping_from');
			$saveData['description']       = $this->input->post('description');
			$saveData['popular_shop']        = $this->input->post('pop');
			$saveData['show_ads']        = ($this->input->post('show_ads'))?$this->input->post('show_ads'):0;
			if($this->input->post('sub_brand')){
				$saveData['sub_brand']         = $this->input->post('sub_brand');
			}
			else{
				$saveData['sub_brand']         = 0;
			}
			
			
			// $saveData['popular_shop_order']  = $this->input->post('pop_shops');
			$saveData['popular_shop_order']  = "1";
			$saveData['seo_title']         = $this->input->post('seo_title');
			$saveData['seo_description']   = $this->input->post('seo_desc');
			$saveData['seo_key_words']     = $this->input->post('seo_keys');
			$saveData['terms_condition']   = $this->input->post('tm_comdition');
			//  $saveData['sort_order']        = $this->input->post('sort_order');
			 $saveData['sort_order']        = "1";
		
			
            $result = $this->db->insert('brands',$saveData);
			$insert_id = $this->db->insert_id();
            if(!empty($_FILES['brand_image']['name'])){
				$file_name  = $insert_id.'_'.$_FILES['brand_image']['name'];
				$path_to_file = $upload_url.''.$file_name;				
				move_uploaded_file($_FILES['brand_image']['tmp_name'], $path_to_file);	
				$updateData['brand_image'] = $file_name;
				$this->db->where('brands_id', $insert_id);
				$this->db->update('brands', $updateData);
			}
			
			 if(!empty($_FILES['slider_image']['name'])){
				$file_name  = $insert_id.'_'.$_FILES['slider_image']['name'];
				$path_to_file = $slider_upload_url.''.$file_name;				
				move_uploaded_file($_FILES['slider_image']['tmp_name'], $path_to_file);	
				$updateData['slider_image'] = $file_name;
				$this->db->where('brands_id', $insert_id);
				$this->db->update('brands', $updateData);
			}
			
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'Manage Brands';
					$desc = $mod_type.' Added from admin panel';
					$mod_desc = $mod_type.' Added';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				
				
				$this->session->set_flashdata('msg_success', ' Data Added Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_brands', 'refresh');
        }
        if($param1=='edit'){
            $saveData['name']          = $this->input->post('name');			
            $saveData['title']          = $this->input->post('title');
            // $saveData['show_slider']   = $this->input->post('show_slider');
            $saveData['status']        = $this->input->post('status');
			$saveData['small_title']   = $this->input->post('small_title');
			$saveData['website_url']   = $this->input->post('website_url');
			$saveData['tele_phone']    = $this->input->post('telephone');
			$saveData['fax']           = $this->input->post('fax');
			$saveData['email']         = $this->input->post('email');
			$saveData['address']       = $this->input->post('address');
			$saveData['shipping_cost']     = $this->input->post('shipping_cost');
			$saveData['shipping_from']     = $this->input->post('shipping_from');
			$saveData['description']       = $this->input->post('description');
			$saveData['seo_title']         = $this->input->post('seo_title');
			$saveData['seo_description']   = $this->input->post('seo_desc');
			$saveData['seo_key_words']     = $this->input->post('seo_keys');
			$saveData['popular_shop']        = $this->input->post('pop');
			($this->input->post('show_ads'))?$this->input->post('show_ads'):0;
			if($this->input->post('sub_brand')){
				$saveData['sub_brand']         = $this->input->post('sub_brand');
			}
			else{
				$saveData['sub_brand']         = 0;
			}
			$saveData['popular_shop_order']  = $this->input->post('pop_shops');
			$saveData['terms_condition']   = $this->input->post('tm_comdition');
			$saveData['sort_order']        = $this->input->post('sort_order');
			
		    if($saveData['status']=="Inactive"){
			  	 $this->db->where('brands_id',$param2);
                 $result = $this->db->update('coupons',array('status'=>'Inactive'));
			}
			if($saveData['status']=="Active"){
				$b = $this->db->select("*")->from("brands")->where("brands_id", $param2)->get()->row();

				if($b->status == "Inactive")
					$saveData['updated_at'] = date('Y-m-d H:i:s');
			}
			
            if(!empty($_FILES['brand_image']['name'])){
				$get_old_pic = $this->db->get_where('brands', array('brands_id'=>$param2))->row()->brand_image;
				$old_file_path = $upload_url.$get_old_pic;
				if(!empty($get_old_pic) && file_exists($old_file_path)){
					unlink($old_file_path);
				}
				$file_name  = $param2.'_'.$_FILES['brand_image']['name'];
				$path_to_file = $upload_url.''.$file_name;				
				move_uploaded_file($_FILES['brand_image']['tmp_name'], $path_to_file);	
				$saveData['brand_image'] = $file_name;		
			}
			
			if(!empty($_FILES['slider_image']['name'])){
				$get_old_pic = $this->db->get_where('brands', array('brands_id'=>$param2))->row()->slider_image;
				$old_file_path = $slider_upload_url.$get_old_pic;
				if(!empty($get_old_pic) && file_exists($old_file_path)){
					unlink($old_file_path);
				}
				$file_name  = $param2.'_'.$_FILES['slider_image']['name'];
				$path_to_file = $slider_upload_url.''.$file_name;				
				move_uploaded_file($_FILES['slider_image']['tmp_name'], $path_to_file);	
				$saveData['slider_image'] = $file_name;		
			}
			
            $this->db->where('brands_id',$param2);
            $result = $this->db->update('brands',$saveData);
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'Manage Brands';
					$desc = $mod_type.' Updated from admin panel';
					$mod_desc = $mod_type.' Updated';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', 'Data Updated Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_brands', 'refresh');
        }
        if($param1=='delete'){
            $this->db->where('brands_id',$param2);
            $result = $this->db->delete('brands');
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'Manage Brands';
					$desc = $mod_type.' Deleted from admin panel';
					$mod_desc = $mod_type.' Deleted';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', 'Data Deleted Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_brands', 'refresh');
        }
			
	
	    $data['active_slider'] 		= $this->db->get_where('brands',array('brand_slider'=>'Yes'))->num_rows();
	    $data['brands'] 		= $this->db->get('brands')->result_array();
		$data['brands_img_url'] = $upload_url;
		$data['slider_img_url'] = $slider_upload_url;
       
		$data['page_title'] 	= 'Manage Brands';
		$data['page_sub_title'] = ' All Brands';
		$data['page_name'] 		= 'manage_brands';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    } 
    /***** Manage Brands *********/
	 /***** Manage Brands sort order*********/
	 function brands_sort_order($param1='',$param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('brands_sort_order') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		$upload_url        = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;
		$slider_upload_url = $this->db->get_where('system_settings',array('type'=>'small_brands_slider'))->row()->description;
       
	    $data['brands'] 		= $this->db->get_where('brands',array('
		status'=>'Active'))->result_array();
		$data['brands_img_url'] = $upload_url;
		$data['slider_img_url'] = $slider_upload_url;
       
		$data['page_title'] 	= 'Sort order';
		$data['page_sub_title'] = ' Sort order';
		$data['page_name'] 		= 'brands_sort_order';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    } 
	function sub_categories_coupon_order($param1='',$param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('brands_sort_order') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		$upload_url        = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;
		$slider_upload_url = $this->db->get_where('system_settings',array('type'=>'small_brands_slider'))->row()->description;
       
	    $data['sub_categories'] 		= $this->db->get_where('sub_categories',array('
		status'=>'Active'))->result_array();
		$data['brands_img_url'] = $upload_url;
		$data['slider_img_url'] = $slider_upload_url;
       
		$data['page_title'] 	= 'All sub categories';
		$data['page_sub_title'] = 'All sub categories';
		$data['page_name'] 		= 'sub_categories_coupon_order';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    } 
	function categories_coupon_order($param1='',$param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('brands_sort_order') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		$upload_url        = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;
		$slider_upload_url = $this->db->get_where('system_settings',array('type'=>'small_brands_slider'))->row()->description;
       
	    $data['categories'] 		= $this->db->get_where('categories',array('
		status'=>'Active'))->result_array();
		$data['brands_img_url'] = $upload_url;
		$data['slider_img_url'] = $slider_upload_url;
       
		$data['page_title'] 	= 'All categories';
		$data['page_sub_title'] = 'All categories';
		$data['page_name'] 		= 'categories_coupon_order';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    } 
    /***** Manage Brands sort order *********/
	/***** Manage Brands sort order*********/
	

	function categories_order_coupon($param1='',$param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('brands_sort_order') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		$current_date = date("Y-m-d H:i:s");
	    if($param1=="update"){
			$array = array();
            for($i=0; $i<count($_POST["page_id_array"]); $i++)
			{
				$query = "
				UPDATE coupons 
				SET cate_page_order = '".($i+1)."' 
				WHERE 	coupons_id = '".$_POST["page_id_array"][$i]."'";
				 
				$array[$i] = $this->db->query($query);;

			}
           
			echo json_encode($array); exit;
			

		}
		$sortBy = 'ORDER BY cpn.cate_page_order ASC';
		

		$date= date("Y-m-d") ;
		$data['coupons_code'] = $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active'   AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.categories_id = '".$param1."' AND cpn.coupon_type = 'Coupon' $sortBy")->result_array();



		$data['coupons_offer'] = $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active'   AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.categories_id = '".$param1."' AND cpn.coupon_type = 'Offer' $sortBy")->result_array();




		$data['coupons_free'] = $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active'   AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.categories_id = '".$param1."' AND cpn.coupon_type = 'Free Items' $sortBy")->result_array();



		$data['coupons_shipping'] = $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active'   AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.categories_id = '".$param1."' AND cpn.coupon_type = 'Free Shipping' $sortBy")->result_array();


		$data['coupons_deals'] = $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active'   AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.categories_id = '".$param1."' AND cpn.coupon_type = 'Deals' $sortBy")->result_array();

        $brand_namee =  $this->db->get_where('categories',array('categories_id'=>$param1))->row()->name;
        $data["check_param"]    = $param2;
		$data['page_title'] 	= 'Category coupon Sorting order';
		$data['page_sub_title'] = ''.$brand_namee.' | coupon Sorting order';
		$data['page_name'] 		= 'categories_order_coupon';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
	} 

	function sub_categories_order_coupon($param1='',$param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('brands_sort_order') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		$current_date = date("Y-m-d H:i:s");
	    if($param1=="update"){
			$array = array();
            for($i=0; $i<count($_POST["page_id_array"]); $i++)
			{
				$query = "
				UPDATE coupons 
				SET sub_cate_order = '".($i+1)."' 
				WHERE 	coupons_id = '".$_POST["page_id_array"][$i]."'";
				 
				$array[$i] = $this->db->query($query);;

			}
           
			echo json_encode($array); exit;
			

		}
		$sortBy = 'ORDER BY cpn.sub_cate_order ASC';
		

		$date= date("Y-m-d") ;
		$data['coupons_code'] = $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active'   AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.sub_categories_id = '".$param1."' AND cpn.coupon_type = 'Coupon' $sortBy")->result_array();

		$data['coupons_offer'] = $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active'   AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.sub_categories_id = '".$param1."' AND cpn.coupon_type = 'Offer' $sortBy")->result_array();




		$data['coupons_free'] = $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active'   AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.sub_categories_id = '".$param1."' AND cpn.coupon_type = 'Free Items' $sortBy")->result_array();



		$data['coupons_shipping'] = $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active'   AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.sub_categories_id = '".$param1."' AND cpn.coupon_type = 'Free Shipping' $sortBy")->result_array();


		$data['coupons_deals'] = $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active'   AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.sub_categories_id = '".$param1."' AND cpn.coupon_type = 'Deals' $sortBy")->result_array();

        $brand_namee =  $this->db->get_where('sub_categories',array('sub_categories_id'=>$param1))->row()->name;
        $data["check_param"]    = $param2;
		$data['page_title'] 	= 'Sub category Sorting order';
		$data['page_sub_title'] = ''.$brand_namee.' | coupon Sorting order';
		$data['page_name'] 		= 'sub_categories_order_coupon';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
	} 
	function brands_sorting($param1='',$param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('brands_sort_order') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		$current_date = date("Y-m-d H:i:s");
	    if($param1=="update"){
			$array = array();
            for($i=0; $i<count($_POST["page_id_array"]); $i++)
			{
				$query = "
				UPDATE coupons 
				SET brands_page_order = '".($i+1)."' 
				WHERE 	coupons_id = '".$_POST["page_id_array"][$i]."'";
				 
				$array[$i] = $this->db->query($query);;

			}
           
			echo json_encode($array); exit;
			

		}
		$sortBy = '';
		if($param2=="coupon"){
          $sortBy = 'ORDER BY cpn.brands_page_order ASC';
		}

		$date= date("Y-m-d") ;
		$data['coupons_code'] = $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active'   AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.brands_id = '".$param1."' AND cpn.coupon_type = 'Coupon' $sortBy")->result_array();



		$data['coupons_offer'] = $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active'   AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.brands_id = '".$param1."' AND cpn.coupon_type = 'Offer' $sortBy")->result_array();




		$data['coupons_free'] = $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active'   AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.brands_id = '".$param1."' AND cpn.coupon_type = 'Free Items' $sortBy")->result_array();



		$data['coupons_shipping'] = $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active'   AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.brands_id = '".$param1."' AND cpn.coupon_type = 'Free Shipping' $sortBy")->result_array();


		$data['coupons_deals'] = $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active'   AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.brands_id = '".$param1."' AND cpn.coupon_type = 'Deals' $sortBy")->result_array();

        $brand_namee =  $this->db->get_where('brands',array('brands_id'=>$param1))->row()->name;
        $data["check_param"]    = $param2;
		$data['page_title'] 	= 'Sorting order';
		$data['page_sub_title'] = ''.$brand_namee.' | '.$param2.' Sorting order';
		$data['page_name'] 		= 'brands_sorting';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
	} 
	function popular_coupon_order($param1='',$param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('brands_sort_order') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		$current_date = date("Y-m-d H:i:s");
	    if($param1=="update"){
			$array = array();
            for($i=0; $i<count($_POST["page_id_array"]); $i++)
			{
				$query = "
				UPDATE coupons 
				SET popular_order = '".($i+1)."' 
				WHERE 	coupons_id = '".$_POST["page_id_array"][$i]."'";
				$this->db->query($query);
				$array[$i] = $this->db->last_query();

			}
           
			echo json_encode($array); exit;
			

		}
		$sortBy = 'ORDER BY cpn.popular_order ASC';
		$date= date("Y-m-d") ;
		$data['coupons_code'] = $this->db->query("select cpn.* from coupons as cpn where cpn.status = 'Active'   AND (cpn.end_date >= '".$date."' OR cpn.end_date = '0000-00-00') AND cpn.popular_set = '1' $sortBy")->result_array();
		

        // echo $this->db->last_query(); exit;
		$data['page_title'] 	= 'Popular coupon Sorting order';
		$data['page_sub_title'] = "Popular coupon Sorting order";
		$data['page_name'] 		= 'popular_coupon_order';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
	} 
	
	function popular_brands_order($param1='',$param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('brands_sort_order') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		$current_date = date("Y-m-d H:i:s");
	    if($param1=="update"){
			$array = array();
            for($i=0; $i<count($_POST["page_id_array"]); $i++)
			{
				$query = "
				UPDATE brands 
				SET popular_shop_order = '".($i+1)."' 
				WHERE 	brands_id = '".$_POST["page_id_array"][$i]."'";
				 
				$array[$i] = $this->db->query($query);;

			}
           
			echo json_encode($array); exit;
			

		}
		$sortBy = '';
	
		$sortBy = 'ORDER BY brands.popular_shop_order ASC';
		$date= date("Y-m-d") ;
		$data['all_brands'] = $this->db->query("select * from brands as brands where brands.status = 'Active' AND brands.popular_shop = '1' $sortBy")->result_array();

        // echo "<pre>";
		// print_r($data['all_brands']);
        // echo "</pre>"; exit;
      
        $data["check_param"]    = $param2;
		$data['page_title'] 	= 'Popular brands order';
		$data['page_sub_title'] = 'Popular brands order';
		$data['page_name'] 		= 'popular_brands_order';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
	} 
	function nav_bar_sorting($param1='',$param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('brands_sort_order') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		$current_date = date("Y-m-d H:i:s");
	    if($param1=="update"){
			$array = array();
            for($i=0; $i<count($_POST["page_id_array"]); $i++)
			{
				$query = "
				UPDATE brands 
				SET sort_order = '".($i+1)."' 
				WHERE 	brands_id = '".$_POST["page_id_array"][$i]."'";
				 
				$array[$i] = $this->db->query($query);;

			}
           
			echo json_encode($array); exit;
			

		}
		$sortBy = '';
		if($param2=="navbar"){
          $sortBy = 'ORDER BY brands.sort_order ASC';
		}

		$date= date("Y-m-d") ;
		$data['all_brands'] = $this->db->query("select * from brands as brands where brands.status = 'Active'  $sortBy")->result_array();

        // echo "<pre>";
		// print_r($data['all_brands']);
        // echo "</pre>"; exit;
      
        $data["check_param"]    = $param2;
		$data['page_title'] 	= 'Sorting order';
		$data['page_sub_title'] = 'Navbar brands sorting order';
		$data['page_name'] 		= 'nav_bar_sorting';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
	} 

	function nav_bar_category($param1='',$param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('brands_sort_order') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		$current_date = date("Y-m-d H:i:s");
	    if($param1=="update"){
			$array = array();
            for($i=0; $i<count($_POST["page_id_array"]); $i++)
			{
				$query = "
				UPDATE categories 
				SET sort_order = '".($i+1)."' 
				WHERE 	categories_id = '".$_POST["page_id_array"][$i]."'";
				 
				$array[$i] = $this->db->query($query);;

			}
           
			echo json_encode($array); exit;
			

		}

	
		$sortBy = 'ORDER BY categories.sort_order ASC';
		$date= date("Y-m-d") ;
		$data['all_categories'] = $this->db->query("select * from categories as categories where categories.status = 'Active' AND sort_order != '0'  $sortBy")->result_array();
		
		$cat_icon_url = $this->db->get_where('system_settings',array('type'=>'cat_icon_url'))->row()->description;
        // echo "<pre>";
		// print_r($data['all_brands']);
        // echo "</pre>"; exit;
      
        $data["check_param"]    = $param2;
		$data['page_title'] 	= 'Sorting order';
		$data['page_sub_title'] = 'Navbar Categories sorting order';
		$data['page_name'] 		= 'nav_bar_category';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
	}
	function popular_cat_order($param1='',$param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('brands_sort_order') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		$current_date = date("Y-m-d H:i:s");
	    if($param1=="update"){
			$array = array();
            for($i=0; $i<count($_POST["page_id_array"]); $i++)
			{
				$query = "
				UPDATE categories 
				SET section_sort_order = '".($i+1)."' 
				WHERE 	categories_id = '".$_POST["page_id_array"][$i]."'";
				 
				$array[$i] = $this->db->query($query);;

			}
           
			echo json_encode($array); exit;
			

		}

	
		$sortBy = 'ORDER BY categories.section_sort_order ASC';
		$date= date("Y-m-d") ;
		$data['all_categories'] = $this->db->query("select * from categories as categories where categories.status = 'Active'  $sortBy")->result_array();
		
		$cat_icon_url = $this->db->get_where('system_settings',array('type'=>'cat_icon_url'))->row()->description;
        // echo "<pre>";
		// print_r($data['all_brands']);
        // echo "</pre>"; exit;
      
        $data["check_param"]    = $param2;
		$data['page_title'] 	= 'Sorting order';
		$data['page_sub_title'] = 'Popular categories order';
		$data['page_name'] 		= 'popular_cat_order';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
	}  
	function sub_cate_order($param1='',$param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('brands_sort_order') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		$current_date = date("Y-m-d H:i:s");
	    if($param1=="update"){
			$array = array();
            for($i=0; $i<count($_POST["page_id_array"]); $i++)
			{
				$query = "
				UPDATE sub_categories 
				SET sort_order = '".($i+1)."' 
				WHERE 	sub_categories_id = '".$_POST["page_id_array"][$i]."'";
				 
				$array[$i] = $this->db->query($query);

			}
           
			echo json_encode($array); exit;
			

		}

	
		$sortBy = 'ORDER BY sub_categories.sort_order ASC';
		$date= date("Y-m-d") ;
		$data['all_categories'] = $this->db->query("select * from sub_categories as sub_categories where sub_categories.status = 'Active' AND categories_id = '$param1'  AND sub_categories.sub_sort = '1'  $sortBy")->result_array();
	
		$cat_icon_url = $this->db->get_where('system_settings',array('type'=>'cat_icon_url'))->row()->description;
        // echo "<pre>";
		// print_r($data['all_brands']);
        // echo "</pre>"; exit;
        $cate_name =  $this->db->get_where('categories',array('categories_id'=>$param1))->row()->name;
        $data["cate_name"]    = $cate_name;
		$data['page_title'] 	= 'Sorting order';
		$data['page_sub_title'] = $cate_name.' Subcategory sort order';
		$data['page_name'] 		= 'sub_cate_order';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
	} 
	/***** Manage Brands sort order *********/

	public function voucherr_alert_email($param1="",$param2=""){ 
			$all_subscriber = $this->db->get_where('voucherr_alert_subscriber',array('status'=>'active','brands_id'=>$param1))->result_array();
		   
	    	$subject = "Voucherr Alert";
			foreach($all_subscriber as $key => $all_subscr){
			  $email   = $all_subscr['email'];
			  $subs_id = $all_subscr['voucherr_alert_subscriber_id'];
			  /* $email = 'moavizq@gmail.com'; */
		
			   $message = file_get_contents(base_url()."admin/voucherr_alert_mail/".$param2."/".$subs_id); 
			   $result= $this->Email_model->do_email($message, $subject, $email);
		
				if($result){
					return "success";
				}
				else{
					return "error";
				}
          				
			}		
	}
	function voucherr_alert_mail($param="",$param2=""){
		
		$data['coupon_id'] = $param;
		$data['subs_id']   = $param2;
		$this->load->view('home/alert_voucher_email', $data);
	}
    /***** Manage Coupons *********/
    function manage_coupons($param1='',$param2='',$param3=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('manage_coupons') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		$current_date = date("Y-m-d H:i:s");
		$upload_url = $this->db->get_where('system_settings',array('type'=>'coupon_imgs_url'))->row()->description;
        if($param1=='add'){	
			// echo "<pre>";
			// print_r($_POST);
			// echo "</pre>"; exit;
			$trending = 0;
			if(!empty($this->input->post('trending')) && $this->input->post('trending') != null){
				$trending = $this->input->post('trending');
			}
			$tips = 0;
			if(!empty($this->input->post('tips')) && $this->input->post('tips') != null){
				$tips = $this->input->post('tips');
			}

			$saveData['categories_id']  = $this->input->post('categories_id');
			$saveData['brands_id']     	= implode(",", $this->input->post('brands_id'));
			$saveData['discount_type'] 	= $this->input->post('discount_type');
			$saveData['discount_value'] = $this->input->post('discount_value');
			$saveData['coupon_code']    = $this->input->post('coupon_code');
			$saveData['short_tagline'] 	= $this->input->post('short_tagline');
			$saveData['description']   	= $this->input->post('description');
			$saveData['start_date']    	= $this->input->post('start_date');
			$saveData['start_time']    	= date('H:i:s', strtotime($this->input->post('start_time')));
			$saveData['end_date']      	= $this->input->post('end_date');
			$saveData['end_time']      	= date('H:i:s', strtotime($this->input->post('end_time')));
			$saveData['redemption_type']= $this->input->post('redp_type');
			$saveData['brand_redirect_url']= $this->input->post('brand_redirect_url');
			$saveData['trending']      	= $trending;
			$saveData['tips']          	= $tips; 
			$saveData['trending_order'] = '1';
			$saveData['tips_order']     = '1';
			$saveData['lastest_order']  = '1';
			$saveData['popular_order']  = '1'; 
			$saveData['status']        	= $this->input->post('status'); 
			$saveData['coupon_type']    = $this->input->post('coupon_type');
			$saveData['date_added']     = date("Y-m-d H:i:s");
			$saveData['min_order_price']= $this->input->post('min_order_price');
			$saveData['special']        = $this->input->post('special');
			$saveData['special_text']   = $this->input->post('special_text');
			$saveData['popular_set']   = $this->input->post('popular');
			$saveData['redemption_information']   = $this->input->post('redem_info');
			$saveData['brands_page_order']        = '1';
			$saveData['cate_page_order']          = '1';
			$saveData['sub_cate_order']           = '1';
			$saveData['top_similar_brands_id']     	= ($this->input->post('top_similar_brands_id')!='')?implode(",", $this->input->post('top_similar_brands_id')):'';
			$saveData['similar_brands_id']     	= ($this->input->post('similar_brands_id')!='')?implode(",", $this->input->post('similar_brands_id')):'';
			if(!empty($this->input->post('sub_categories_id'))){
			$saveData['sub_categories_id']  = $this->input->post('sub_categories_id');	
			}
			
			$result = $this->db->insert('coupons',$saveData);
			$insert_id = $this->db->insert_id();
			if(!empty($_FILES['coupon_image']['name'])){
				$file_name  = $insert_id.'_'.$_FILES['coupon_image']['name'];
				$path_to_file = $upload_url.''.$file_name;				
				move_uploaded_file($_FILES['coupon_image']['tmp_name'], $path_to_file);	
				$updateData['coupon_image'] = $file_name;
				$this->db->where('coupons_id', $insert_id);
				$this->db->update('coupons', $updateData);
			}

			// echo $this->db->last_query(); exit;
			$insert_id = $this->db->insert_id();
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'Manage Coupons';
					$desc = $mod_type.' Added from admin panel';
					$mod_desc = $mod_type.' Added';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				//  $this->voucherr_alert_email($saveData['brands_id'],$insert_id); 
				 
				$this->session->set_flashdata('msg_success', ' Data Added Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_coupons/'.$param2, 'refresh');
        }
	
        if($param1=='edit'){
		 	/* print_r($_POST); exit; */
		 
            $saveData['categories_id']  = $this->input->post('categories_id');
			$saveData['brands_id']     	= implode(",", $this->input->post('brands_id'));
			$saveData['discount_type'] 	= $this->input->post('discount_type');
			$saveData['discount_value'] = $this->input->post('discount_value');
			$saveData['coupon_code']    = $this->input->post('coupon_code');
			$saveData['short_tagline'] 	= $this->input->post('short_tagline');
			$saveData['description']   	= $this->input->post('description');
			$saveData['start_date']    	= $this->input->post('start_date');
			$saveData['start_time']    	= date('H:i:s', strtotime($this->input->post('start_time')));
			$saveData['end_date']      	= $this->input->post('end_date');
			$saveData['end_time']      	= date('H:i:s', strtotime($this->input->post('end_time')));
			$saveData['trending']      	= $this->input->post('trending');
			$saveData['redemption_type']= $this->input->post('redp_type');
			$saveData['tips']          	= $this->input->post('tips');
			$saveData['brand_redirect_url']= $this->input->post('brand_redirect_url');
			$saveData['trending_order'] = '1';
			$saveData['tips_order']     = '1';
			$saveData['lastest_order']  = '1';
			$saveData['popular_order']  = '1'; 
			$saveData['status']        	= $this->input->post('status');
			/*  $saveData['brand_order']    = $this->input->post('brand_order');  */
			$saveData['coupon_type']    = $this->input->post('coupon_type');
			$saveData['min_order_price']= $this->input->post('min_order_price');
			$saveData['special']        = $this->input->post('special');
			$saveData['popular_set']   = $this->input->post('popular');
			$saveData['special_text']   = $this->input->post('special_text'); 
			$saveData['redemption_information']   = $this->input->post('redem_info');
			$saveData['brands_page_order']   = '1';
			$saveData['cate_page_order']   = '1';
			$saveData['sub_cate_order']   = '1';
			$saveData['top_similar_brands_id']     	= ($this->input->post('top_similar_brands_id') != '')?implode(",", $this->input->post('top_similar_brands_id')):'';
			$saveData['similar_brands_id']     	= ($this->input->post('similar_brands_id')!='')?implode(",", $this->input->post('similar_brands_id')):'';
			if(!empty($this->input->post('sub_categories_id'))){
			 $saveData['sub_categories_id']  = $this->input->post('sub_categories_id');	
			}
            $this->db->where('coupons_id',$param2);
            $result = $this->db->update('coupons',$saveData);
			if(!empty($_FILES['coupon_image']['name'])){
				$get_old_pic = $this->db->get_where('coupons', array('coupons_id'=>$param2))->row()->coupon_image;
				$old_file_path = $upload_url.$get_old_pic;
				if(!empty($get_old_pic) && file_exists($old_file_path)){
					unlink($old_file_path);
				}
				$file_name  = $param2.'_'.$_FILES['coupon_image']['name'];
				$path_to_file = $upload_url.''.$file_name;				
				move_uploaded_file($_FILES['coupon_image']['tmp_name'], $path_to_file);	
				$saveData['coupon_image'] = $file_name;		
			}
			$this->db->where('coupons_id',$param2);
            $result = $this->db->update('coupons',$saveData);

		/* 	echo $this->db->last_query(); */
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'Manage Coupons';
					$desc = $mod_type.' Updated from admin panel';
					$mod_desc = $mod_type.' Updated';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', ' Data Updated Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_coupons/'.$param3, 'refresh');
        }
        if($param1=='delete'){
            $this->db->where('coupons_id',$param2);
            $result = $this->db->delete('coupons');
            if($result){
				
				$this->session->set_flashdata('msg_success', 'Data Deleted Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_coupons/'.$param3, 'refresh');
        }
		$active_con = '';
		$in_active_con = '';
		$expire_con = '';
		$role_con = '';
		if($param1=="active"){
           
			$active_con = "status = 'Active' AND (`end_date` >= '$current_date' OR `end_date` = '0000-00-00')";
		}
		if($param1=="inactive"){
          
			$in_active_con =  "status = 'Inactive' ";
			
		}
		if($param1=="expired"){
            
			$expire_con  = "end_date < '$current_date' AND end_date !='0000-00-00' AND start_date!='0000-00-00'";
		}
		if($this->session->userdata('role_id')==2){
	
			$role_con =   "AND coupon_type != 'Coupon' ";
		}

		
		// $this->db->order_by('coupons_id','desc');
		// $data['coupons'] = $this->db->query("select * from coupons where $active_con $in_active_con $expire_con $role_con  order by coupons_id desc limit 7")->result_array();
		$data['coupons'] = [];
		// echo  $this->db->last_query()."<br> <br> <br>";
		// echo "<pre>";
		// print_r($data['coupons']);
		// echo "</pre>"; exit;
		
		// echo $this->db->last_query(); exit;
		$data['page_type']       = $param1;
		$data['coupons_img_url'] = $upload_url;
		$data['page_title'] 	= 'Manage Coupons';
		$data['page_sub_title'] = 'All Coupons';
		$data['page_name'] 		= 'manage_coupons';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    } 
	function manage_coupons_data($param1='',$param2='',$param3=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('manage_coupons') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}

		$current_date = date("Y-m-d H:i:s");
		$upload_url = $this->db->get_where('system_settings',array('type'=>'coupon_imgs_url'))->row()->description;
		$page_type       = $param1;
		$active_con = '';
		$in_active_con = '';
		$expire_con = '';
		$role_con = '';
		if($param1=="active"){
           
			$active_con = "c.status = 'Active' AND (c.end_date >= '$current_date' OR c.end_date = '0000-00-00')";
		}
		if($param1=="inactive"){
          
			$in_active_con =  "c.status = 'Inactive' ";
			
		}
		if($param1=="expired"){
            
			$expire_con  = "c.end_date < '$current_date' AND c.end_date !='0000-00-00' AND c.start_date!='0000-00-00'";
		}
		if($this->session->userdata('role_id')==2){
	
			$role_con =   "AND c.coupon_type != 'Coupon' ";
		}

		$params = $columns = $totalRecords = $data = array();
		
		$params = $_REQUEST;
		
		$columns = array(
		0 => 'coupons_id',
		1 => 'coupon_type', 
		2 => 'short_tagline',
		3 => 'brands_id',
		4 => 'categories_id',
		5 => 'sub_categories_id',
		6 => 'coupon_type',
		7 => 'special_text',
		8 => 'start_date',
		9 => 'end_date',
		10 => 'coupon_code',
		11 => 'redemption_type',
		12 => 'discount_type',
		13 => 'min_order_price',
		14 => 'discount_value',
		15 => 'coupons_id',
		16 => 'coupons_id'
		);
		
		$where_condition = $sqlTot = $sqlRec = "";
		
		if( !empty($params['search']['value']) ) {
		$where_condition .= " AND ";
		// $where_condition .= " ( c.short_tagline LIKE '%".$params['search']['value']."%' ";    
		// $where_condition .= " OR c.short_tagline LIKE '%".$params['search']['value']."%' ";
		// $where_condition .= " OR c.coupon_type LIKE '%".$params['search']['value']."%' ";
		// $where_condition .= " OR c.special_text LIKE '%".$params['search']['value']."%' ";
		// $where_condition .= " OR c.start_date LIKE '%".$params['search']['value']."%' ";
		// $where_condition .= " OR b.name LIKE '%".$params['search']['value']."%' ";
		// $where_condition .= " OR c.end_date LIKE '%".$params['search']['value']."%' )";
		$where_condition .= "( b.name LIKE '%".$params['search']['value']."%' )";
		}
		
		$sql_query = "select c.*, b.name as brands from coupons c JOIN brands b ON c.brands_id = b.brands_id where $active_con $in_active_con $expire_con $role_con ";
		$sqlTot .= $sql_query;
		$sqlRec .= $sql_query;
		
		if(isset($where_condition) && $where_condition != '') {
		
		$sqlTot .= $where_condition;
		$sqlRec .= $where_condition;
		}
		
		
		$sqlRec .=  " ORDER BY c.". $columns[$params['order'][0]['column']]."   ".$params['order'][0]['dir']."  LIMIT ".$params['start']." ,".$params['length']." ";
		// echo $sqlRec;exit;
		$queryTot = $this->db->query($sqlTot);
		
		$totalRecords = $queryTot->num_rows();
		
		$data = $this->db->query($sqlRec)->result_array();
		
		if(!empty($data)){
			for($i=0; $i < count($data); $i++){

			$total_vote  = $this->db->get_where('ratings',array('coupons_id'=>$data[$i]['coupons_id']))->num_rows();
			$check_like  = $this->db->get_where('ratings',array('coupons_id'=>$data[$i]['coupons_id'],'review'=>'Like'))->num_rows();
			if($total_vote!=0){
			 $success_rate = ($check_like/$total_vote) * 100;	
			}
			else{
			 $success_rate = 0;	
			}	
			$role_id = $this->session->userdata('role_id');

			$data[$i]['action'] = '<div class="dropdown dropdown open">
						<button class="btn btn-sm btn-inverse dropdown-toggle waves-effect waves-light " type="button" id="dropdown-7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Action</button> 
						<div class="dropdown-menu" aria-labelledby="dropdown-7" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
							<a class="dropdown-item waves-light waves-effect" href="javascript:;" onclick="showAjaxModal(\''.base_url().'modal/popup/edit_coupon/'.$data[$i]['coupons_id'].'/'.$page_type.'\')"> <i class="fa fa-pencil"></i> Edit </a>';
							
				if($role_id=="1"){
					$data[$i]['action'] .= '<a class="dropdown-item waves-light waves-effect"  style="cursor:pointer;" onclick="confirm_modal_action(\''.base_url().strtolower($this->session->userdata('directory')).'/manage_coupons/delete/'.$data[$i]['coupons_id'].'/'.$page_type.'\');" >
					<i class="fa fa-trash"></i>	Delete
				</a>';
				}
				else if($role_id=="2"){
					if($data[$i]['coupon_type']!="Coupon"){
						$data[$i]['action'] .= '<a class="dropdown-item waves-light waves-effect"  style="cursor:pointer;" onclick="confirm_modal_action(\''.base_url().strtolower($this->session->userdata('directory')).'/manage_coupons/delete/'.$data[$i]['coupons_id'].'/'.$page_type.'\');" >
					<i class="fa fa-trash"></i>	Delete
				</a>';
					}
				}							
				$data[$i]['action'] .= '</div>						
					</div>';

				$data[$i]['brands'] = @$this->db->get_where('brands', array('brands_id'=>$data[$i]['brands_id']))->row()->name;
				
				if($data[$i]['categories_id']){
				if($this->db->get_where('categories', array('categories_id'=>$data[$i]['categories_id']))->num_rows() > 0){
					$data[$i]['category'] =  $this->db->get_where('categories', array('categories_id'=>$data[$i]['categories_id']))->row()->name;
				}
				else{
					$data[$i]['category'] =  "<b>N/A</b>"; 
					}
			
				}else{
					$data[$i]['category'] =  "<b>N/A</b>"; 
				}
					
				if($data[$i]['sub_categories_id']){
					if($this->db->get_where('sub_categories', array('sub_categories_id'=>$data[$i]['sub_categories_id']))->num_rows() > 0){
						$data[$i]['sub_category'] =  $this->db->get_where('sub_categories', array('sub_categories_id'=>$data[$i]['sub_categories_id']))->row()->name;
					}else{
						$data[$i]['sub_category'] =  "<b>N/A</b>"; 
					}
				
				}else{
					$data[$i]['sub_category'] =  "<b>N/A</b>"; 
				}
				
				$data[$i]['redemption_type'] = $data[$i]['redemption_type'].' customer';
				$data[$i]['total_vote'] = $total_vote;
				$data[$i]['success_rate'] = $success_rate.'%';
			}

		}
	
		$json_data = array(
		"draw"            => intval( $params['draw'] ),   
		"recordsTotal"    => intval( $totalRecords ),  
		"recordsFiltered" => intval($totalRecords),
		"data"            => $data
		);
		
		echo json_encode($json_data);
		
		// echo  $this->db->last_query()."<br> <br> <br>";
		// echo "<pre>";
		// print_r($data['coupons']);
		// echo "</pre>"; exit;
		
		// echo $this->db->last_query(); exit;
		// echo json_encode($data['coupons']);
    } 
    /***** Manage Coupons *********/
	function show_subcate($param=""){
				
		$sub_category_id = $this->input->post('sub_category_id');	
	    
		$cate = "";
		$sub_cate = $this->db->get_where('sub_categories',array('status'=>'Active','categories_id'=>$sub_category_id))->result_array();
	
		if($sub_cate){
			$cate .= '<div class="form-group row">';
			$cate .= ' <label class="col-sm-4 col-form-label">Sub Categories</label>';
			$cate .= '  <div class="col-sm-8">';
			$cate .= '   <select  id="categories_id"  name="sub_categories_id"  class="form-control">';
			$cate .= '  <option>Select Sub Category</option>';  
            foreach($sub_cate as $cateee){
                	 
				$cate .= '  <option value="'.$cateee['sub_categories_id'].'">'.$cateee['name'].'</option>';

			}
			$cate .= '   </select>';
			$cate .= ' </div>';
			$cate .= '</div>';	
		}
		else{
			$cate .= "No subcategory";
		}
		
        echo $cate; exit;   
    }
	/***** Manage Saving Offers *********/
    function manage_saving_offers($param1='',$param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('manage_saving_offers') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
        
        if($param1=='add'){
            $saveData['name']          = $this->input->post('name');
            $saveData['status']        = $this->input->post('status');
            $result = $this->db->insert('saving_offers',$saveData);
			$insert_id = $this->db->insert_id();
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'Manage Saving Offers';
					$desc = $mod_type.' Added from admin panel';
					$mod_desc = $mod_type.' Added';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', ' Data Added Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_saving_offers', 'refresh');
        }
        if($param1=='edit'){ 
            $saveData['name']          = $this->input->post('name');
            $saveData['status']        = $this->input->post('status');
            $this->db->where('saving_offers_id',$param2);
            $result = $this->db->update('saving_offers',$saveData);
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'Manage Saving Offers';
					$desc = $mod_type.' Updated from admin panel';
					$mod_desc = $mod_type.' Updated';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', 'Data Updated Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_saving_offers', 'refresh');
        }
        if($param1=='delete'){
            $this->db->where('saving_offers_id',$param2);
            $result = $this->db->delete('saving_offers');
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'Manage Saving Offers';
					$desc = $mod_type.' Deleted from admin panel';
					$mod_desc = $mod_type.' Deleted';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', 'Data Deleted Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_saving_offers', 'refresh');
        }
        
        $data['saving_offers'] 	= $this->db->get('saving_offers')->result_array();
		$data['page_title'] 	= 'Manage All Saving Offers';
		$data['page_sub_title'] = 'Saving Offers';
		$data['page_name'] 		= 'manage_saving_offers';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    } 
    /***** Manage Saving Offers *********/
    
	/***** Manage Static Content *********/
    function manage_static_content($param1='',$param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('manage_static_content') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
        $upload_url = $this->db->get_where('system_settings',array('type'=>'static_content_img_url'))->row()->description;
        if($param1=='add'){
            $saveData['type']          	= $this->input->post('type');
            $saveData['title']   		= $this->input->post('title');
            $saveData['description']   	= $this->input->post('description');
            $saveData['status']        	= $this->input->post('status');
            $result = $this->db->insert('static_content',$saveData);
			$insert_id = $this->db->insert_id();
            if($result){
				if(!empty($_FILES['image_attached']['name'])){
					$file_name  = $insert_id.'_'.$_FILES['image_attached']['name'];
					$path_to_file = $upload_url.''.$file_name;				
					move_uploaded_file($_FILES['image_attached']['tmp_name'], $path_to_file);	
					$updateData['image'] = $file_name;
					$this->db->where('static_content_id', $insert_id);
					$this->db->update('static_content', $updateData);
				}
				/* Add Entry To System Logs */
					$mod_type = 'Manage Static Content';
					$desc = $mod_type.' Added from admin panel';
					$mod_desc = $mod_type.' Added';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', ' Data Added Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_static_content', 'refresh');
        }
        if($param1=='edit'){
            $saveData['type']          	= $this->input->post('type');
            $saveData['title']   		= $this->input->post('title');
            $saveData['description']   	= $this->input->post('description');
            $saveData['status']        	= $this->input->post('status');
            $saveData['text_1']        	= $this->input->post('text_1');
            $saveData['text_2']        	= $this->input->post('text_2');
            $saveData['text_3']        	= $this->input->post('text_3');
			if(!empty($_FILES['image_attached']['name'])){
				$get_old_pic = $this->db->get_where('static_content', array('static_content_id'=>$param2))->row()->image;
				$old_file_path = $upload_url.$get_old_pic;
				if(!empty($get_old_pic) && file_exists($old_file_path)){
					unlink($old_file_path);
				}
				$file_name  = $param2.'_'.$_FILES['image_attached']['name'];
				$path_to_file = $upload_url.''.$file_name;				
				move_uploaded_file($_FILES['image_attached']['tmp_name'], $path_to_file);	
				$saveData['image'] = $file_name;		
			}
            $this->db->where('static_content_id',$param2);
            $result = $this->db->update('static_content',$saveData);
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'Manage Static Content';
					$desc = $mod_type.' Updated from admin panel';
					$mod_desc = $mod_type.' Updated';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', 'Data Updated Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_static_content', 'refresh');
        }
        if($param1=='delete'){
            $this->db->where('static_content_id',$param2);
            $result = $this->db->delete('static_content');
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'Manage Static Content';
					$desc = $mod_type.' Deleted from admin panel';
					$mod_desc = $mod_type.' Deleted';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', 'Data Deleted Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_static_content', 'refresh');
        }
		
        $data['upload_url'] 	= $upload_url;
		                          $this->db->order_by('page_types_id','asc');
        $data['static_content'] = $this->db->where('status','Active')->get('static_content')->result_array();
		$data['page_title'] 	= 'Manage All Static Content';
		$data['page_sub_title'] = 'Static Content';
		$data['page_name'] 		= 'manage_static_content';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    } 
    /***** Manage Static Content *********/
      /***** SEO Setting *********/

	public function home_page_seo($param1='', $param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('seo_settings') != 1){
			 redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		if($param1 =='update'){
	
			$saveData['title']        = $this->input->post('home_title');
			$saveData['meta']         = $this->input->post('home_meta');
			$saveData['description']  = $this->input->post('description');
			$saveData['google_analytics']  = $this->input->post('google_analytics');
			$this->db->where("page_name",'Home page');
			$result = $this->db->update('seo_setting',$saveData);
			if($result){
				$this->session->set_flashdata('msg_success', ' Seo settings updated successfuly');
				 redirect(base_url().'admin/home_page_seo', 'refresh');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
				redirect(base_url().'admin/home_page_seo', 'refresh');
			}
		
        }
        
		$data['seo_settings'] 	= $this->db->get_where('seo_setting')->result_array();
		$data['page_title'] 	= 'Home Seo Setting';
		$data['page_sub_title'] = '';
		$data['page_name'] 		= 'home_page_seo';
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
	}

	public function brand_a_z_seo($param1='', $param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('seo_settings') != 1){
			 redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		if($param1 =='update'){
	
			$saveData['title']        = $this->input->post('home_title');
			$saveData['meta']         = $this->input->post('home_meta');
			$saveData['description']  = $this->input->post('description');

			$this->db->where("page_name",'brands_A_Z');
			$result = $this->db->update('seo_setting',$saveData);
			if($result){
				$this->session->set_flashdata('msg_success', ' Seo settings updated successfuly');
				 redirect(base_url().'admin/brand_a_z_seo', 'refresh');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
				redirect(base_url().'admin/brand_a_z_seo', 'refresh');
			}
		
        }
        
		$data['seo_settings'] 	= $this->db->get_where('seo_setting')->result_array();
		$data['page_title'] 	= 'Brands a-z seo setting';
		$data['page_sub_title'] = '';
		$data['page_name'] 		= 'brand_a_z_seo';
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
}
	public function main_category_seo($param1='', $param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('seo_settings') != 1){
			 redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		if($param1 =='update'){
	
			$saveData['title']        = $this->input->post('home_title');
			$saveData['meta']         = $this->input->post('home_meta');
			$saveData['description']  = $this->input->post('description');

			$this->db->where("page_name",'Main_categories');
			$result = $this->db->update('seo_setting',$saveData);
			if($result){
				$this->session->set_flashdata('msg_success', ' Seo settings updated successfuly');
				 redirect(base_url().'admin/main_category_seo', 'refresh');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
				redirect(base_url().'admin/main_category_seo', 'refresh');
			}
		
        }
        
		$data['seo_settings'] 	= $this->db->get_where('seo_setting')->result_array();
		$data['page_title'] 	= 'Main category seo setting';
		$data['page_sub_title'] = '';
		$data['page_name'] 		= 'main_category_seo';
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
	}
	
	public function info_blog_seo($param1='', $param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('seo_settings') != 1){
			 redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		if($param1 =='update'){
	
			$saveData['title']        = $this->input->post('home_title');
			$saveData['meta']         = $this->input->post('home_meta');
			$saveData['description']  = $this->input->post('description');

			$this->db->where("page_name",'info_blog');
			$result = $this->db->update('seo_setting',$saveData);
			if($result){
				$this->session->set_flashdata('msg_success', ' Seo settings updated successfuly');
				 redirect(base_url().'admin/info_blog_seo', 'refresh');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
				redirect(base_url().'admin/info_blog_seo', 'refresh');
			}
		
        }
        
		$data['seo_settings'] 	= $this->db->get_where('seo_setting')->result_array();
		$data['page_title'] 	= 'Info blof seo setting';
		$data['page_sub_title'] = '';
		$data['page_name'] 		= 'info_blog_seo';
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
	}

	

	public function about_us_seo($param1='', $param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('seo_settings') != 1){
			 redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		if($param1 =='update'){
	
			$saveData['title']        = $this->input->post('home_title');
			$saveData['meta']         = $this->input->post('home_meta');
			$saveData['description']  = $this->input->post('description');

			$this->db->where("page_name",'about_us');
			$result = $this->db->update('seo_setting',$saveData);
			if($result){
				$this->session->set_flashdata('msg_success', ' Seo settings updated successfuly');
				 redirect(base_url().'admin/about_us_seo', 'refresh');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
				redirect(base_url().'admin/about_us_seo', 'refresh');
			}
		
        }
        
		$data['seo_settings'] 	= $this->db->get_where('seo_setting')->result_array();
		$data['page_title'] 	= 'About us seo setting';
		$data['page_sub_title'] = '';
		$data['page_name'] 		= 'about_us_seo';
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
	}

	
	public function fags_seo($param1='', $param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('seo_settings') != 1){
			 redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		if($param1 =='update'){
	
			$saveData['title']        = $this->input->post('home_title');
			$saveData['meta']         = $this->input->post('home_meta');
			$saveData['description']  = $this->input->post('description');

			$this->db->where("page_name",'faqs');
			$result = $this->db->update('seo_setting',$saveData);
			if($result){
				$this->session->set_flashdata('msg_success', ' Seo settings updated successfuly');
				 redirect(base_url().'admin/fags_seo', 'refresh');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
				redirect(base_url().'admin/fags_seo', 'refresh');
			}
		
        }
        
		$data['seo_settings'] 	= $this->db->get_where('seo_setting')->result_array();
		$data['page_title'] 	= 'Faqs seo setting';
		$data['page_sub_title'] = '';
		$data['page_name'] 		= 'fags_seo';
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
	}

	


	public function advertise_seo($param1='', $param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('seo_settings') != 1){
			 redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		if($param1 =='update'){
	
			$saveData['title']        = $this->input->post('home_title');
			$saveData['meta']         = $this->input->post('home_meta');
			$saveData['description']  = $this->input->post('description');

			$this->db->where("page_name",'advertise');
			$result = $this->db->update('seo_setting',$saveData);
			if($result){
				$this->session->set_flashdata('msg_success', ' Seo settings updated successfuly');
				 redirect(base_url().'admin/advertise_seo', 'refresh');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
				redirect(base_url().'admin/advertise_seo', 'refresh');
			}
		
        }
        
		$data['seo_settings'] 	= $this->db->get_where('seo_setting')->result_array();
		$data['page_title'] 	= 'Advertise seo setting';
		$data['page_sub_title'] = '';
		$data['page_name'] 		= 'advertise_seo';
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
	}
	
	public function contact_us_seo($param1='', $param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('seo_settings') != 1){
			 redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		if($param1 =='update'){
	
			$saveData['title']        = $this->input->post('home_title');
			$saveData['meta']         = $this->input->post('home_meta');
			$saveData['description']  = $this->input->post('description');

			$this->db->where("page_name",'contact_us');
			$result = $this->db->update('seo_setting',$saveData);
			if($result){
				$this->session->set_flashdata('msg_success', ' Seo settings updated successfuly');
				 redirect(base_url().'admin/contact_us_seo', 'refresh');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
				redirect(base_url().'admin/contact_us_seo', 'refresh');
			}
		
        }
		
        
		$data['seo_settings'] 	= $this->db->get_where('seo_setting')->result_array();
		$data['page_title'] 	= 'Contact us seo setting';
		$data['page_sub_title'] = '';
		$data['page_name'] 		= 'contact_us_seo';
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
	}
	

	public function privacy_policy_seo($param1='', $param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('seo_settings') != 1){
			 redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		if($param1 =='update'){
	
			$saveData['title']        = $this->input->post('home_title');
			$saveData['meta']         = $this->input->post('home_meta');
			$saveData['description']  = $this->input->post('description');

			$this->db->where("page_name",'privacy_plolicy');
			$result = $this->db->update('seo_setting',$saveData);
			if($result){
				$this->session->set_flashdata('msg_success', ' Seo settings updated successfuly');
				 redirect(base_url().'admin/privacy_policy_seo', 'refresh');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
				redirect(base_url().'admin/privacy_policy_seo', 'refresh');
			}
		
        }
		
        
		$data['seo_settings'] 	= $this->db->get_where('seo_setting')->result_array();
		$data['page_title'] 	= 'Privacy policy seo setting';
		$data['page_sub_title'] = '';
		$data['page_name'] 		= 'privacy_policy_seo';
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
	}
	public function imprints_seo($param1='', $param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('seo_settings') != 1){
			 redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		if($param1 =='update'){
	
			$saveData['title']        = $this->input->post('home_title');
			$saveData['meta']         = $this->input->post('home_meta');
			$saveData['description']  = $this->input->post('description');

			$this->db->where("page_name",'imprints');
			$result = $this->db->update('seo_setting',$saveData);
			if($result){
				$this->session->set_flashdata('msg_success', ' Seo settings updated successfuly');
				 redirect(base_url().'admin/imprints_seo', 'refresh');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
				redirect(base_url().'admin/imprints_seo', 'refresh');
			}
		
        }
		
        
		$data['seo_settings'] 	= $this->db->get_where('seo_setting')->result_array();
		$data['page_title'] 	= 'Imprints seo setting';
		$data['page_sub_title'] = '';
		$data['page_name'] 		= 'imprints_seo';
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
	}
	public function popular_coupon_seo($param1='', $param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('seo_settings') != 1){
			 redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		if($param1 =='update'){
			$saveData['title']        = $this->input->post('home_title');
			$saveData['meta']         = $this->input->post('home_meta');
			$saveData['description']  = $this->input->post('description');
			$this->db->where("page_name",'popular_coupons');
			$result = $this->db->update('seo_setting',$saveData);
			if($result){
				$this->session->set_flashdata('msg_success', ' Seo settings updated successfuly');
				 redirect(base_url().'admin/popular_coupon_seo', 'refresh');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
				redirect(base_url().'admin/popular_coupon_seo', 'refresh');
			}	
        }
		$data['seo_settings'] 	= $this->db->get_where('seo_setting')->result_array();
		$data['page_title'] 	= 'Popular coupon setting';
		$data['page_sub_title'] = '';
		$data['page_name'] 		= 'popular_coupon_seo';
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
	}
	public function a_to_z_seo($param1='', $param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('seo_settings') != 1){
			 redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		$val_con = $param1."_page";
		if($param2 =='update'){
			$saveData['title']        = $this->input->post('home_title');
			$saveData['meta']         = $this->input->post('home_meta');
			$saveData['description']  = $this->input->post('description');
			$this->db->where("page_name",$val_con);
			
			$result = $this->db->update('seo_setting',$saveData);
			if($result){
				$this->session->set_flashdata('msg_success', ' Seo settings updated successfuly');
				 redirect(base_url().'admin/a_to_z_seo/'.$param1, 'refresh');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
				redirect(base_url().'admin/a_to_z_seo/'.$param1, 'refresh');
			}	
        }
		
		$data['seo_settings'] 	= $this->db->get_where('seo_setting',array("page_name"=>$val_con))->row(); 
		$data['letter'] 	    = $param1;
		$data['page_title'] 	= 'A-Z seo';
		$data['page_sub_title'] = '';
		$data['page_name'] 		= 'a_to_z_seo';
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
	}
	
	

	/***** SEO Setting  *********/
    /***** Manage Payment Methods  *********/
    function manage_payment_method($param1='',$param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('payment_methods') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		
        if($param1=='add'){
            $saveData['name']          = $this->input->post('name');
            $saveData['status']        = $this->input->post('status');
            $result = $this->db->insert('payment_methods',$saveData);
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'Payment Methods';
					$desc = $mod_type.' Added from admin panel';
					$mod_desc = $mod_type.' Added';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', ' Data Added Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_payment_method', 'refresh');
        }
        if($param1=='edit'){
            $saveData['name']          = $this->input->post('name');
            $saveData['status']        = $this->input->post('status');
            $this->db->where('payment_methods_id',$param2);
            $result = $this->db->update('payment_methods',$saveData);
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'Payment Methods';
					$desc = $mod_type.' Updated from admin panel';
					$mod_desc = $mod_type.' Updated';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', 'Data Updated Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_payment_method', 'refresh');
        }
        if($param1=='delete'){
            $this->db->where('payment_methods_id',$param2);
            $result = $this->db->delete('payment_methods');
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'Payment Methods';
					$desc = $mod_type.' Deleted from admin panel';
					$mod_desc = $mod_type.' Deleted';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', 'Data Deleted Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_payment_method', 'refresh');
        }
        $data['payment_methods']= $this->db->get('payment_methods')->result_array();
		$data['page_title'] 	= 'Manage Payment Method';
		$data['page_sub_title'] = 'Payment Method';
		$data['page_name'] 		= 'manage_payment_method';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    }
	  /***** Manage Payment Methods  *********/
	  
     /*****  Manage Newsletter Subscription  *********/

	function manage_newsletter_subscription($param1='',$param2=''){	
		if($this->session->userdata('login') != 1 || $this->session->userdata('manage_newsletter_subscription') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
                                $this->db->order_by('newsletter_subscription_id','desc');
        $data['subscription']   = $this->db->get_where('newsletter_subscription')->result_array();
		$data['page_title'] 	= 'Active Subscribers list';
		$data['page_sub_title'] = 'Active Subscribers list';
		$data['page_name'] 		= 'manage_newsletter_subscription';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    } 
	function manage_inactive_subscription($param1='',$param2=''){	
		if($this->session->userdata('login') != 1 || $this->session->userdata('manage_newsletter_subscription') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		$this->db->order_by('newsletter_subscription_id','desc');
        $data['subscription']   = $this->db->get_where('newsletter_subscription',array('status'=>"Inactive"))->result_array();
		$data['page_title'] 	= 'Inactive Subscribers list';
		$data['page_sub_title'] = 'Inactive Subscribers list';
		$data['page_name'] 		= 'manage_inactive_subscription';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    } 
	function unsubscribers_list($param1='',$param2=''){	
		if($this->session->userdata('login') != 1 || $this->session->userdata('manage_newsletter_subscription') != 1){
			 redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}

        $data['subscription']   = $this->db->get_where('newsletter_subscription',array('status'=>"un-subscribe"))->result_array();
		$data['page_title'] 	= 'Unsubscribers list';
		$data['page_sub_title'] = 'Unsubscribers list';
		$data['page_name'] 		= 'unsubscribers_list';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    } 
	function send_newsletter($param1='',$param2=''){	
		if($this->session->userdata('login') != 1 || $this->session->userdata('manage_newsletter_subscription') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
	   }
	   $months_first_date = date('Y-m-d');
	   $months_last_date = date('Y-m-t');            
	   if($param1=="sub_expiry"){
        $cate_id = $_POST['cate_id'];
		$sel_array = array();
		if(!empty($_POST['coupon_list'])){
			$sel_array = array_unique($_POST['coupon_list']);
		}
		
		$expiry = '';
		$expiry .= '<table id="" class=" table table-striped table-bordered nowrap">';
		$expiry .= ' <thead>';
		$expiry .= '  <tr>';
		$expiry .= '   <th>#</th>';
		$expiry .= '   <th>Coupon</th>';
		$expiry .= '   <th>Select for email</th>';
		$expiry .= '  </tr>';
		$expiry .= ' </thead>';
		$expiry .= ' <tbody>';
		$coupons_data = $this->db->where('status',"Active")->where('categories_id',$cate_id)->where('end_date BETWEEN "'. date('Y-m-d', strtotime($months_first_date)). '" and "'. date('Y-m-d', strtotime($months_last_date)).'"')->get('coupons');	
		
		$coupons_array = $coupons_data->result_array();
		$brand_imgs_url = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;
		$count=0; if(!empty($coupons_array)){foreach($coupons_array as $key => $coupons): $count++; 
		$cate_name = $this->db->get_where('categories',array('categories_id'=>$coupons['categories_id']))->row()->name;
		$expiry .= ' <tr>';
		$expiry .= '  <td>'.$count.'</td>';
		$expiry .= '  <td style="width: 82%;">';

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
		$this->db->order_by('newsletter_email_record_id',"DESC");
		$record_data = $this->db->get_where('newsletter_email_record',array('coupons_id'=>$coupons['coupons_id']));
		
		$count_record = $record_data->num_rows(); 
		if($count_record>0){
			$new_date    = $record_data->row()->sending_date;
		  $already = "already";
		  $black = "black";
		}
		else{
		  $already = "whhte";
		  $black = "";
		}
		$expiry .= '  <div class="cs-coupon-box cs-coupon-category '.$already.'" style="width:100%">';
		$expiry .= '   <div class="cs-flex cs-flex-mobil cs-outer-coupon coupons_padd">';
		$expiry .= '    <div class="cs-coupon-box-cell-1 coupon_click cs-flex cs-flex-mobil" data-page="category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">';
		$expiry .= '     <div class="cs-coupon-box-logo">';
		$expiry .= '      <img class="" src="'.base_url().$brand_imgs_url.$brand_image.'" alt="'.$coupons['short_tagline'].'" title="'.$coupons['short_tagline'].'">';
		$expiry .= '     </div>';
		$expiry .= '     <div class="cs-coupon-logo cs-flex cs-flex-mobil right-center '.$black.' ?>">';
		$expiry .= '      <div class="cs-coupon-logo-line-1">';
		$expiry .= '       <font style="vertical-align: inherit;">';
		$expiry .= '        <font style="vertical-align: inherit;">'.$coupons['discount_value'].$sign.' </font>';
		$expiry .= '       </font>';
		$expiry .= '     </div>';
		$expiry .= '     <div class="cs-coupon-logo-line-3">';
		$expiry .= '      <font style="vertical-align: inherit;">';
		$expiry .= '       <font style="vertical-align: inherit;">Discount</font>';
		$expiry .= '      </font>';
		$expiry .= '     </div>';
		$expiry .= '    </div>';
		$expiry .= '   </div>';
		$expiry .= '   <div class="cs-coupon-box-cell-2 cs-flex">';
		$expiry .= '    <div class="cs-coupon-box-description cs-coupon-box-h3">';
		$expiry .= '     <font style="vertical-align: inherit;padding-left: 10px;">';
		$expiry .= '      <font style="vertical-align: inherit;">'.$coupons['short_tagline'].'</font>';
		$expiry .= '     </font>';
		$expiry .= '    </div>';
		$expiry .= '    <div class="brand-width brand-bt" >';
		$expiry .= '     <div class="cs-coupon-small-info bg_grey_dark show_code_div '.$already.'" >';
		$expiry .= '       <span class="back_code '.$coupons['coupons_id'].'" style="width: 185px;text-align: center;" id=""> '.$code_text.' </span>';
		$expiry .= '     </div>';
		$expiry .= '    </div>';
		$expiry .= '    </div>';
		if($count_record>0){
		$expiry .= '    <div style="padding: 0px 5px;position: absolute;color: #0d0c0c;">';
		$expiry .= '    	<span><b>Last sended date</b> : '.date('m/d/Y',strtotime($new_date))." at ".date('h:i a',strtotime($new_date)).'</span>';
		$expiry .= '    </div>';
		}
		if($coupons['special_text']){
		$expiry .= '    <div class="best_title_se">';
		$expiry .= '     <span>'."<b>".$coupons['special_text']."</b>".'</span>';
		$expiry .= '    </div>';
		}

		$expiry .= '   </div>';
		$expiry .= '    <div class="cs-coupon-more-details">';
		$expiry .= '     <div class="js-toggle-container cat_page">';
		$expiry .= '       <div class="cs-toggle-content">'.$coupons['description'].'</div>';
		$expiry .= '        <div class="cs-coupon-box-date cs-sub-info-text cs-text-no-break">';
		if($coupons['min_order_price'] > 0 && !empty($coupons['min_order_price']) && $coupons['min_order_price'] != null){
		$expiry .= '        <span class="">';
		$expiry .= '         <font style="vertical-align: inherit;">';
		$expiry .= '         <font style="vertical-align: inherit;position: absolute;left: 49%;" class="left-setting-c"><span class="minimum-setting">Minimum</span>order value: '.$coupons['min_order_price'].'&euro; </font>';
		$expiry .= '         </font>';
		$expiry .= '        </span>';
		} 
		$expiry .= '        <span style="position: absolute;right: 6px;">';
		$expiry .= '        <i class="fa fa-clock-o" aria-hidden="true"></i> <font style="vertical-align: inherit;"><span class="display-none-one">Expries : </span>'.date('m/d/Y',strtotime($coupons['end_date'])).'</font>';
		$expiry .= '        </span>';
		$expiry .= '      </div>';
		$expiry .= '       <div class="cs-coupon-mer-link">';
		$expiry .= '        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Show all </font></font>';
		$expiry .= '         <a href="'.base_url()."home/brands/".$coupons['brands_id'].'" target="_blank" title="Show all vouchers from '.$brand_name.'"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$brand_name.'</font></font></a>';
		$expiry .= '         <font style="vertical-align: inherit;">';
		$expiry .= '           <font style="vertical-align: inherit;"> vouchers </font>';
		$expiry .= '         </font>';
		$expiry .= '        </div>';
		$expiry .= '       </div>';
		$expiry .= '      </div>';
		$expiry .= '     </div>';
		$expiry .= '    </td>';
		$expiry .= '    <td>';
		if(in_array($coupons['coupons_id'],$sel_array)){
			$check_box = "checked";
			$check_active = "active";
		}
		else{  
			$check_box = "";
			$check_active = "";
		}
		$expiry .= '     <div class="toggle-btn '.$check_active.' ">';			
		$expiry .= '      <input type="checkbox" '.$check_box.' id="check_'.$coupons['categories_id'].'"  name="checked[]"  id="cb-email" class=" check_ed" data-type="emails" value="'.$coupons['coupons_id'].'">';
		$expiry .= '     <span class="round-btn"></span>';
		$expiry .= '     </div>';
		$expiry .= '    </td>';
		$expiry .= '  </tr>';

		endforeach; }
		$expiry .= ' </tbody>';
		$expiry .= ' </table>';
		echo json_encode($expiry); exit; 
	}
		if($param1=="expiry"){

			$sel_array = array();
		    if(!empty($_POST['coupon_list'])){
				$sel_array = array_unique($_POST['coupon_list']);
			}
			
			$expiry = '';
			$expiry .= '<table id="" class=" table table-striped table-bordered nowrap">';
			$expiry .= ' <thead>';
			$expiry .= '  <tr>';
			$expiry .= '   <th>#</th>';
			$expiry .= '   <th>Category name</th>';
			$expiry .= '   <th>Coupon</th>';
			$expiry .= '   <th>Select for email</th>';
			$expiry .= '  </tr>';
			$expiry .= ' </thead>';
			$expiry .= ' <tbody>';
			$coupons_data = $this->db->where('status',"Active")->where('end_date BETWEEN "'. date('Y-m-d', strtotime($months_first_date)). '" and "'. date('Y-m-d', strtotime($months_last_date)).'"')->get('coupons');	
			
            $coupons_array = $coupons_data->result_array();
			$brand_imgs_url = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;
			$count=0; if(!empty($coupons_array)){foreach($coupons_array as $key => $coupons): $count++; 
			$cate_name = $this->db->get_where('categories',array('categories_id'=>$coupons['categories_id']))->row()->name;
			$expiry .= ' <tr>';
			$expiry .= '  <td>'.$count.'</td>';
			$expiry .= '  <td><b>'.$cate_name.'</br></td>';
			$expiry .= '  <td style="width: 82%;">';

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
			$this->db->order_by('newsletter_email_record_id',"DESC");
			$record_data = $this->db->get_where('newsletter_email_record',array('coupons_id'=>$coupons['coupons_id']));
			
			$count_record = $record_data->num_rows(); 
			if($count_record>0){
				$new_date    = $record_data->row()->sending_date;
			  $already = "already";
			  $black = "black";
			}
			else{
			  $already = "whhte";
			  $black = "";
			}
			$expiry .= '  <div class="cs-coupon-box cs-coupon-category '.$already.'" style="width:100%">';
			$expiry .= '   <div class="cs-flex cs-flex-mobil cs-outer-coupon coupons_padd">';
			$expiry .= '    <div class="cs-coupon-box-cell-1 coupon_click cs-flex cs-flex-mobil" data-page="category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">';
			$expiry .= '     <div class="cs-coupon-box-logo">';
			$expiry .= '      <img class="" src="'.base_url().$brand_imgs_url.$brand_image.'" alt="'.$coupons['short_tagline'].'" title="'.$coupons['short_tagline'].'">';
			$expiry .= '     </div>';
			$expiry .= '     <div class="cs-coupon-logo cs-flex cs-flex-mobil right-center '.$black.' ?>">';
			$expiry .= '      <div class="cs-coupon-logo-line-1">';
			$expiry .= '       <font style="vertical-align: inherit;">';
			$expiry .= '        <font style="vertical-align: inherit;">'.$coupons['discount_value'].$sign.' </font>';
			$expiry .= '       </font>';
			$expiry .= '     </div>';
			$expiry .= '     <div class="cs-coupon-logo-line-3">';
			$expiry .= '      <font style="vertical-align: inherit;">';
			$expiry .= '       <font style="vertical-align: inherit;">Discount</font>';
			$expiry .= '      </font>';
			$expiry .= '     </div>';
			$expiry .= '    </div>';
			$expiry .= '   </div>';
			$expiry .= '   <div class="cs-coupon-box-cell-2 cs-flex">';
			$expiry .= '    <div class="cs-coupon-box-description cs-coupon-box-h3">';
			$expiry .= '     <font style="vertical-align: inherit;padding-left: 10px;">';
			$expiry .= '      <font style="vertical-align: inherit;">'.$coupons['short_tagline'].'</font>';
			$expiry .= '     </font>';
			$expiry .= '    </div>';
			$expiry .= '    <div class="brand-width brand-bt" >';
			$expiry .= '     <div class="cs-coupon-small-info bg_grey_dark show_code_div '.$already.'" >';
			$expiry .= '       <span class="back_code '.$coupons['coupons_id'].'" style="width: 185px;text-align: center;" id=""> '.$code_text.' </span>';
			$expiry .= '     </div>';
			$expiry .= '    </div>';
			$expiry .= '    </div>';
			if($count_record>0){
			$expiry .= '    <div style="padding: 0px 5px;position: absolute;color: #0d0c0c;">';
			$expiry .= '    	<span><b>Last sended date</b> : '.date('m/d/Y',strtotime($new_date))." at ".date('h:i a',strtotime($new_date)).'</span>';
			$expiry .= '    </div>';
		    }
			if($coupons['special_text']){
			$expiry .= '    <div class="best_title_se">';
			$expiry .= '     <span>'."<b>".$coupons['special_text']."</b>".'</span>';
			$expiry .= '    </div>';
			}

			$expiry .= '   </div>';
			$expiry .= '    <div class="cs-coupon-more-details">';
			$expiry .= '     <div class="js-toggle-container cat_page">';
			$expiry .= '       <div class="cs-toggle-content">'.$coupons['description'].'</div>';
			$expiry .= '        <div class="cs-coupon-box-date cs-sub-info-text cs-text-no-break">';
			if($coupons['min_order_price'] > 0 && !empty($coupons['min_order_price']) && $coupons['min_order_price'] != null){
			$expiry .= '        <span class="">';
			$expiry .= '         <font style="vertical-align: inherit;">';
			$expiry .= '         <font style="vertical-align: inherit;position: absolute;left: 49%;" class="left-setting-c"><span class="minimum-setting">Minimum</span>order value: '.$coupons['min_order_price'].'&euro; </font>';
			$expiry .= '         </font>';
			$expiry .= '        </span>';
			} 
			$expiry .= '        <span style="position: absolute;right: 6px;">';
			$expiry .= '        <i class="fa fa-clock-o" aria-hidden="true"></i> <font style="vertical-align: inherit;"><span class="display-none-one">Expries : </span>'.date('m/d/Y',strtotime($coupons['end_date'])).'</font>';
			$expiry .= '        </span>';
			$expiry .= '      </div>';
			$expiry .= '       <div class="cs-coupon-mer-link">';
			$expiry .= '        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Show all </font></font>';
			$expiry .= '         <a href="'.base_url()."home/brands/".$coupons['brands_id'].'" target="_blank" title="Show all vouchers from '.$brand_name.'"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$brand_name.'</font></font></a>';
			$expiry .= '         <font style="vertical-align: inherit;">';
			$expiry .= '           <font style="vertical-align: inherit;"> vouchers </font>';
			$expiry .= '         </font>';
			$expiry .= '        </div>';
			$expiry .= '       </div>';
			$expiry .= '      </div>';
			$expiry .= '     </div>';
			$expiry .= '    </td>';
			$expiry .= '    <td>';
			if(in_array($coupons['coupons_id'],$sel_array)){
				$check_box = "checked";
				$check_active = "active";
			}
			else{
				$check_box = "";
				$check_active = "";
			}
			$expiry .= '     <div class="toggle-btn '.$check_active.' ">';			
			$expiry .= '      <input type="checkbox" '.$check_box.' id="check_'.$coupons['categories_id'].'"  name="checked[]"  id="cb-email" class=" check_ed" data-type="emails" value="'.$coupons['coupons_id'].'">';
			$expiry .= '     <span class="round-btn"></span>';
			$expiry .= '     </div>';
			$expiry .= '    </td>';
			$expiry .= '  </tr>';

		    endforeach; }
			$expiry .= ' </tbody>';
			$expiry .= ' </table>';
			echo json_encode($expiry); exit; 
		}
		if($param1=="select_sub"){
			$cate_id = $_POST['cate_id'];
			$selected = '';
			$selected .= '<table id="" class=" table table-striped table-bordered nowrap">';
			$selected .= ' <thead>';
			$selected .= '  <tr>';
			$selected .= '   <th>#</th>';
			$selected .= '   <th>Coupon</th>';
			$selected .= '   <th>Select for email</th>';
			$selected .= '  </tr>';
			$selected .= ' </thead>';
			$selected .= ' <tbody>';
			/* print_r($coupons_array); exit; */
			/* $coupons_data =	$this->db->get_where('coupons',array('status'=>"Active",'categories_id'=>1,'Date(end_date) > '=>date('Y-m-d'),'coupons IN'=>$_POST['coupon_list'])); */
			$this->db->from('coupons');
			$this->db->where('status', "Active");
			$this->db->where('categories_id', $cate_id);
			$this->db->where_in('coupons_id',$_POST['coupon_list']);
			$coupons_data = $this->db->get();			
            $coupons_array = $coupons_data->result_array();
			$brand_imgs_url = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;
			$count=0; if(!empty($coupons_array)){foreach($coupons_array as $key => $coupons): $count++; 
			$cate_name = $this->db->get_where('categories',array('categories_id'=>$coupons['categories_id']))->row()->name;
			$selected .= ' <tr>';
			$selected .= '  <td>'.$count.'</td>';
			$selected .= '  <td style="width: 82%;">';

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
			$this->db->order_by('newsletter_email_record_id',"DESC");
			$record_data = $this->db->get_where('newsletter_email_record',array('coupons_id'=>$coupons['coupons_id']));
			
			$count_record = $record_data->num_rows(); 
			if($count_record>0){
				$new_date    = $record_data->row()->sending_date;
			  $already = "already";
			  $black = "black";
			}
			else{
			  $already = "whhte";
			  $black = "";
			}
			$selected .= '  <div class="cs-coupon-box cs-coupon-category '.$already.'" style="width:100%">';
			$selected .= '   <div class="cs-flex cs-flex-mobil cs-outer-coupon coupons_padd">';
			$selected .= '    <div class="cs-coupon-box-cell-1 coupon_click cs-flex cs-flex-mobil" data-page="category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">';
			$selected .= '     <div class="cs-coupon-box-logo">';
			$selected .= '      <img class="" src="'.base_url().$brand_imgs_url.$brand_image.'" alt="'.$coupons['short_tagline'].'" title="'.$coupons['short_tagline'].'">';
			$selected .= '     </div>';
			$selected .= '     <div class="cs-coupon-logo cs-flex cs-flex-mobil right-center '.$black.' ?>">';
			$selected .= '      <div class="cs-coupon-logo-line-1">';
			$selected .= '       <font style="vertical-align: inherit;">';
			$selected .= '        <font style="vertical-align: inherit;">'.$coupons['discount_value'].$sign.' </font>';
			$selected .= '       </font>';
			$selected .= '     </div>';
			$selected .= '     <div class="cs-coupon-logo-line-3">';
			$selected .= '      <font style="vertical-align: inherit;">';
			$selected .= '       <font style="vertical-align: inherit;">Discount</font>';
			$selected .= '      </font>';
			$selected .= '     </div>';
			$selected .= '    </div>';
			$selected .= '   </div>';
			$selected .= '   <div class="cs-coupon-box-cell-2 cs-flex">';
			$selected .= '    <div class="cs-coupon-box-description cs-coupon-box-h3">';
			$selected .= '     <font style="vertical-align: inherit;padding-left: 10px;">';
			$selected .= '      <font style="vertical-align: inherit;">'.$coupons['short_tagline'].'</font>';
			$selected .= '     </font>';
			$selected .= '    </div>';
			$selected .= '    <div class="brand-width brand-bt" >';
			$selected .= '     <div class="cs-coupon-small-info bg_grey_dark show_code_div '.$already.'" >';
			$selected .= '       <span class="back_code '.$coupons['coupons_id'].'" style="width: 185px;text-align: center;" id=""> '.$code_text.' </span>';
			$selected .= '     </div>';
			$selected .= '    </div>';
			$selected .= '    </div>';
			if($count_record>0){
			$selected .= '    <div style="padding: 0px 5px;position: absolute;color: #0d0c0c;">';
			$selected .= '    	<span><b>Last sended date</b> : '.date('m/d/Y',strtotime($new_date))." at ".date('h:i a',strtotime($new_date)).'</span>';
			$selected .= '    </div>';
		    }
			if($coupons['special_text']){
			$selected .= '    <div class="best_title_se">';
			$selected .= '     <span>'."<b>".$coupons['special_text']."</b>".'</span>';
			$selected .= '    </div>';
			}

			$selected .= '   </div>';
			$selected .= '    <div class="cs-coupon-more-details">';
			$selected .= '     <div class="js-toggle-container cat_page">';
			$selected .= '       <div class="cs-toggle-content">'.$coupons['description'].'</div>';
			$selected .= '        <div class="cs-coupon-box-date cs-sub-info-text cs-text-no-break">';
			if($coupons['min_order_price'] > 0 && !empty($coupons['min_order_price']) && $coupons['min_order_price'] != null){
			$selected .= '        <span class="">';
			$selected .= '         <font style="vertical-align: inherit;">';
			$selected .= '         <font style="vertical-align: inherit;position: absolute;left: 49%;" class="left-setting-c"><span class="minimum-setting">Minimum</span>order value: '.$coupons['min_order_price'].'&euro; </font>';
			$selected .= '         </font>';
			$selected .= '        </span>';
			}
			$selected .= '        <span style="position: absolute;right: 6px;">';
			$selected .= '        <i class="fa fa-clock-o" aria-hidden="true"></i> <font style="vertical-align: inherit;"><span class="display-none-one">Expries : </span>'.date('m/d/Y',strtotime($coupons['end_date'])).'</font>';
			$selected .= '        </span>';
			$selected .= '      </div>';
			$selected .= '       <div class="cs-coupon-mer-link">';
			$selected .= '        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Show all </font></font>';
			$selected .= '         <a href="'.base_url()."home/brands/".$coupons['brands_id'].'" target="_blank" title="Show all vouchers from '.$brand_name.'"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$brand_name.'</font></font></a>';
			$selected .= '         <font style="vertical-align: inherit;">';
			$selected .= '           <font style="vertical-align: inherit;"> vouchers </font>';
			$selected .= '         </font>';
			$selected .= '        </div>';
			$selected .= '       </div>';
			$selected .= '      </div>';
			$selected .= '     </div>';
			$selected .= '    </td>';
			$selected .= '    <td>';
	
			$selected .= '     <div class="toggle-btn  active">';
			$selected .= '      <input type="checkbox" checked id="check_'.$coupons['categories_id'].'"  name="checked[]"  id="cb-email" class=" check_ed" data-type="emails" value="'.$coupons['coupons_id'].'">';
			$selected .= '     <span class="round-btn"></span>';
			$selected .= '     </div>';
			$selected .= '    </td>';
			$selected .= '  </tr>';

		    endforeach; }
			$selected .= ' </tbody>';
			$selected .= ' </table>';
         

			echo json_encode($selected); exit; 
		}
		if($param1=="selected"){
			$selected = '';
			$selected .= '<table id="" class=" table table-striped table-bordered nowrap">';
			$selected .= ' <thead>';
			$selected .= '  <tr>';
			$selected .= '   <th>#</th>';
			$selected .= '   <th>Category name</th>';
			$selected .= '   <th>Coupon</th>';
			$selected .= '   <th>Select for email</th>';
			$selected .= '  </tr>';
			$selected .= ' </thead>';
			$selected .= ' <tbody>';
			/* print_r($coupons_array); exit; */
			/* $coupons_data =	$this->db->get_where('coupons',array('status'=>"Active",'categories_id'=>1,'Date(end_date) > '=>date('Y-m-d'),'coupons IN'=>$_POST['coupon_list'])); */
			$this->db->from('coupons');
			$this->db->where('status', "Active");
			$this->db->where_in('coupons_id',$_POST['coupon_list']);
			$coupons_data = $this->db->get();			
            $coupons_array = $coupons_data->result_array();
			$brand_imgs_url = $this->db->get_where('system_settings',array('type'=>'brand_imgs_url'))->row()->description;
			$count=0; if(!empty($coupons_array)){foreach($coupons_array as $key => $coupons): $count++; 
			$cate_name = $this->db->get_where('categories',array('categories_id'=>$coupons['categories_id']))->row()->name;
			$selected .= ' <tr>';
			$selected .= '  <td>'.$count.'</td>';
			$selected .= '  <td><b>'.$cate_name.'</br></td>';
			$selected .= '  <td style="width: 82%;">';

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
			$this->db->order_by('newsletter_email_record_id',"DESC");
			$record_data = $this->db->get_where('newsletter_email_record',array('coupons_id'=>$coupons['coupons_id']));
			
			$count_record = $record_data->num_rows(); 
			if($count_record>0){
				$new_date    = $record_data->row()->sending_date;
			  $already = "already";
			  $black = "black";
			}
			else{
			  $already = "whhte";
			  $black = "";
			}
			$selected .= '  <div class="cs-coupon-box cs-coupon-category '.$already.'" style="width:100%">';
			$selected .= '   <div class="cs-flex cs-flex-mobil cs-outer-coupon coupons_padd">';
			$selected .= '    <div class="cs-coupon-box-cell-1 coupon_click cs-flex cs-flex-mobil" data-page="category" data-tag="'.$coupons['short_tagline'].'" data-type="'.$coupons['categories_id'].'" id="'.$coupons['brands_id'].'_'.$coupons['coupons_id'].'">';
			$selected .= '     <div class="cs-coupon-box-logo">';
			$selected .= '      <img class="" src="'.base_url().$brand_imgs_url.$brand_image.'" alt="'.$coupons['short_tagline'].'" title="'.$coupons['short_tagline'].'">';
			$selected .= '     </div>';
			$selected .= '     <div class="cs-coupon-logo cs-flex cs-flex-mobil right-center '.$black.' ?>">';
			$selected .= '      <div class="cs-coupon-logo-line-1">';
			$selected .= '       <font style="vertical-align: inherit;">';
			$selected .= '        <font style="vertical-align: inherit;">'.$coupons['discount_value'].$sign.' </font>';
			$selected .= '       </font>';
			$selected .= '     </div>';
			$selected .= '     <div class="cs-coupon-logo-line-3">';
			$selected .= '      <font style="vertical-align: inherit;">';
			$selected .= '       <font style="vertical-align: inherit;">Discount</font>';
			$selected .= '      </font>';
			$selected .= '     </div>';
			$selected .= '    </div>';
			$selected .= '   </div>';
			$selected .= '   <div class="cs-coupon-box-cell-2 cs-flex">';
			$selected .= '    <div class="cs-coupon-box-description cs-coupon-box-h3">';
			$selected .= '     <font style="vertical-align: inherit;padding-left: 10px;">';
			$selected .= '      <font style="vertical-align: inherit;">'.$coupons['short_tagline'].'</font>';
			$selected .= '     </font>';
			$selected .= '    </div>';
			$selected .= '    <div class="brand-width brand-bt" >';
			$selected .= '     <div class="cs-coupon-small-info bg_grey_dark show_code_div '.$already.'" >';
			$selected .= '       <span class="back_code '.$coupons['coupons_id'].'" style="width: 185px;text-align: center;" id=""> '.$code_text.' </span>';
			$selected .= '     </div>';
			$selected .= '    </div>';
			$selected .= '    </div>';
			if($count_record>0){
			$selected .= '    <div style="padding: 0px 5px;position: absolute;color: #0d0c0c;">';
			$selected .= '    	<span><b>Last sended date</b> : '.date('m/d/Y',strtotime($new_date))." at ".date('h:i a',strtotime($new_date)).'</span>';
			$selected .= '    </div>';
		    }
			if($coupons['special_text']){
			$selected .= '    <div class="best_title_se">';
			$selected .= '     <span>'."<b>".$coupons['special_text']."</b>".'</span>';
			$selected .= '    </div>';
			}

			$selected .= '   </div>';
			$selected .= '    <div class="cs-coupon-more-details">';
			$selected .= '     <div class="js-toggle-container cat_page">';
			$selected .= '       <div class="cs-toggle-content">'.$coupons['description'].'</div>';
			$selected .= '        <div class="cs-coupon-box-date cs-sub-info-text cs-text-no-break">';
			if($coupons['min_order_price'] > 0 && !empty($coupons['min_order_price']) && $coupons['min_order_price'] != null){
			$selected .= '        <span class="">';
			$selected .= '         <font style="vertical-align: inherit;">';
			$selected .= '         <font style="vertical-align: inherit;position: absolute;left: 49%;" class="left-setting-c"><span class="minimum-setting">Minimum</span>order value: '.$coupons['min_order_price'].'&euro; </font>';
			$selected .= '         </font>';
			$selected .= '        </span>';
			}
			$selected .= '        <span style="position: absolute;right: 6px;">';
			$selected .= '        <i class="fa fa-clock-o" aria-hidden="true"></i> <font style="vertical-align: inherit;"><span class="display-none-one">Expries : </span>'.date('m/d/Y',strtotime($coupons['end_date'])).'</font>';
			$selected .= '        </span>';
			$selected .= '      </div>';
			$selected .= '       <div class="cs-coupon-mer-link">';
			$selected .= '        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Show all </font></font>';
			$selected .= '         <a href="'.base_url()."home/brands/".$coupons['brands_id'].'" target="_blank" title="Show all vouchers from '.$brand_name.'"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$brand_name.'</font></font></a>';
			$selected .= '         <font style="vertical-align: inherit;">';
			$selected .= '           <font style="vertical-align: inherit;"> vouchers </font>';
			$selected .= '         </font>';
			$selected .= '        </div>';
			$selected .= '       </div>';
			$selected .= '      </div>';
			$selected .= '     </div>';
			$selected .= '    </td>';
			$selected .= '    <td>';
	
			$selected .= '     <div class="toggle-btn  active">';
			$selected .= '      <input type="checkbox" checked id="check_'.$coupons['categories_id'].'"  name="checked[]"  id="cb-email" class=" check_ed" data-type="emails" value="'.$coupons['coupons_id'].'">';
			$selected .= '     <span class="round-btn"></span>';
			$selected .= '     </div>';
			$selected .= '    </td>';
			$selected .= '  </tr>';

		    endforeach; }
			$selected .= ' </tbody>';
			$selected .= ' </table>';
         

			echo json_encode($selected); exit; 
		}
		if($param1=="send"){
          /* echo "<pre>";
		  print_r($_POST);   */
		  $coupun_array = array_unique($_POST['checked']);
		 /*  print_r($coupun_array); exit;   */
		  $cate_array = array();

		  foreach($_POST['checked'] as $value){
            $cate_ids = $this->db->get_where('coupons',array('coupons_id'=>$value))->row()->categories_id;
            array_push($cate_array,$cate_ids);
		  }
		  $cate_array = array_unique($cate_array);

  
		   $all_subscriber = $this->db->get_where('newsletter_subscription',array('status'=>'Active','email_verfied'=>'Yes'))->result_array();
           if(!empty($all_subscriber )){
		 
		   foreach($all_subscriber as $key => $all_subscr){
			$email = $all_subscr['email'];
			$subject ="Voucherr newsletter";
			  $message = file_get_contents(base_url()."home/voucherr_mail/".$all_subscr['newsletter_subscription_id']."/?key=".urlencode(json_encode($coupun_array)));
			  $check_cate_interest =  $this->db->where_in('categories_id',$cate_array)->where('newsletter_subscription_id',$all_subscr['newsletter_subscription_id'])->get('subscribers_intrest')->num_rows();	
               if($check_cate_interest>0){
				 $result= $this->Email_model->do_email($message, $subject, $email); 
			   }
			   else{
				$result = "";  
			   }
			  	
			}

			foreach($_POST['checked'] as $record){

				$insert['coupons_id'] = $record;
				$insert['sending_date'] = date('Y-m-d H:i:sa');

				$this->db->insert('newsletter_email_record', $insert);


			}

			if($result){
				$this->session->set_flashdata('msg_success', ' Newsletter send successfully');
			}
			else{
				$this->session->set_flashdata('msg_error', ' Newsletter not send. Something went wrong!');
			}

		 }
		 else{
			$this->session->set_flashdata('msg_error', ' No one subscribe our site yet');
		 }
			redirect(base_url()."admin/send_newsletter", 'refresh'); 
	    
		   
		}
                            $this->db->order_by('sort_order','asc');
        $data['choose_coupons'] = $this->db->get_where('categories',array('status'=>"Active"))->result_array();
        $data['total_coupons']  = $this->db->get_where('coupons',array('status'=>"Active",'Date(end_date) > '=>date('Y-m-d')))->num_rows();
        $data['total_expiry']   = $this->db->where('status',"Active")->where('end_date BETWEEN "'. date('Y-m-d', strtotime($months_first_date)). '" and "'. date('Y-m-d', strtotime($months_last_date)).'"')->get('coupons')->num_rows();
		$data['page_title'] 	= 'Choose coupons for email';
		$data['page_sub_title'] = 'Choose coupons for email';
		$data['page_name'] 		= 'send_newsletter';
		$data['pag_type']       = "";
		$this->load->view('admin/index', $data);
    }
	public function newletter_email(){ 
		
			$all_subscriber = $this->db->get_where('newsletter_subscription',array('status'=>'Active','email_verfied'=>'Yes'))->result_array();
			$email_template = $this->db->get_where('email_templates', array('type'=>'voucherr_email'))->row();
			$system_name    = $this->db->get_where('system_settings',array('type'=>'system_name'))->row()->description;
	    	$subject        = $email_template->subject;
			/* echo "<pre>";
			print_r($all_subscriber);
			echo "</pre>"; */
			foreach($all_subscriber as $key => $all_subscr){
			  $email = $all_subscr['email'];
	
			    $message = file_get_contents(base_url()."home/voucherr_mail/".$all_subscr['newsletter_subscription_id']);				
			    $result= $this->Email_model->do_email($message, $subject, $email);          				
			}
		    if($result){
			    $this->session->set_flashdata('msg_success', ' Newsletter send successfully');
			}
			else{
				$this->session->set_flashdata('msg_error', ' Newsletter not send. Something went wrong!');
			}
			redirect(base_url()."admin/manage_newsletter_subscription", 'refresh');  		
	}
    /***** Manage Newsletter Subscription *********/
	
	
	 /*****  manage_alert_subscriber *********/

	function manage_alert_subscriber($param1='',$param2=''){	
		if($this->session->userdata('login') != 1 || $this->session->userdata('manage_newsletter_subscription') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}

        $data['subscription']   = $this->db->get_where('voucherr_alert_subscriber',array('status'=>'active'))->result_array();
		$data['page_title'] 	= 'Active Alert Subscriber list';
		$data['page_sub_title'] = 'Active Alert Subscriber list';
		$data['page_name'] 		= 'manage_alert_subscriber';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    } 
	function inactive_subscriber_list($param1='',$param2=''){	
		if($this->session->userdata('login') != 1 || $this->session->userdata('manage_newsletter_subscription') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}

        $data['subscription']   = $this->db->get_where('voucherr_alert_subscriber',array('status'=>'inactive'))->result_array();
		$data['page_title'] 	= 'Inactive Subscribers list';
		$data['page_sub_title'] = 'Inactive Subscribers list';
		$data['page_name'] 		= 'manage_inactive_alert_subscription';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    } 
	function alert_unsubscriber_list($param1='',$param2=''){	
		if($this->session->userdata('login') != 1 || $this->session->userdata('manage_newsletter_subscription') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}

        $data['subscription']   = $this->db->get_where('voucherr_alert_subscriber',array('status'=>"un-subscribe"))->result_array();
		$data['page_title'] 	= 'Unsubscribers list';
		$data['page_sub_title'] = 'Unsubscribers list';
		$data['page_name'] 		= 'alert_unsubscriber_list';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    }
    /***** manage_alert_subscriber*********/
	  /****  Manage Newsletter interest  ********/

	function manage_newsletter_interest($param1='',$param2=''){	
		if($this->session->userdata('login') != 1 || $this->session->userdata('manage_newsletter_subscription') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
        if($param1=='add_interest'){
		   $save_data['categories_id'] = $this->input->post('cat_id');	
		   $save_data['brands_id']     = $this->input->post('brands_id');	
		   $result = $this->db->insert('newsletter_interests',$save_data);
		   
		   if($result){
			   echo json_encode('success'); exit;
		   }
		   else{
			   echo json_encode('error'); exit;
		   }
		   
		}
		else if($param1=='delete_interest'){
		   $save_data['categories_id'] = $this->input->post('cat_id');	
		   $save_data['brands_id']     = $this->input->post('brands_id');	
		    
		   $this->db->where($save_data);
           $result = $this->db->delete('newsletter_interests');
		   
		   if($result){
			   echo json_encode('success'); exit;
		   }
		   else{
			   echo json_encode('error'); exit;
		   }
		   
		}
                             
        $data['details']        = $this->db->get_where('categories',array('status'=>'Active'))->result_array();
		$data['page_title'] 	= 'Manage Newsletter Interest';
		$data['page_sub_title'] = 'Newsletter Interest';
		$data['page_name'] 		= 'manage_newsletter_interest';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);

    } 
    /**** Manage Newsletter interest ********/
	
     /*****  Manage Customer query  *********/

	function manage_customer_query($param1='',$param2=''){	
		if($this->session->userdata('login') != 1 || $this->session->userdata('manage_contact_us') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
	
         if($param1=='update'){
            
            $user_name                    = $this->input->post('name');
            $email                        = $this->input->post('email');
            $saveData['response']         = $this->input->post('answer');
            $saveData['admin_response']   = "Yes";
			 $saveData['date_modified']   = date('Y-m-d h:i:sa');
            $this->db->where('contact_us_id',$param2);
            $result = $this->db->update('contact_us',$saveData);
			
            if($result){
				$this->Db_model->customer_query_response($user_name,$email,$saveData['response']);
				/* Add Entry To System Logs */
					$mod_type = 'Customer Query';
					$desc = $mod_type.' Updated from admin panel';
					$mod_desc = $mod_type.' Updated';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', ' Response send Successfully');
				
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_customer_query', 'refresh');
        }
		 if($param1=='delete'){
            $this->db->where('contact_us_id',$param2);
            $result = $this->db->delete('contact_us');
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'Customer Query';
					$desc = $mod_type.' Deleted from admin panel';
					$mod_desc = $mod_type.' Deleted';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', 'Data Deleted Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_customer_query', 'refresh');
        }
        
        $data['customer_query'] = $this->db->get_where('contact_us')->result_array();
		$data['page_title'] 	= 'Manage Customer Query';
		$data['page_sub_title'] = 'Customer Query';
		$data['page_name'] 		= 'manage_customer_query';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    } 
    /***** Manage Customer query *********/
	 function email(){
		echo $this->Db_model->customer_query_response('Moaivz','moavizq@gmail.com','your msg');
	}   
    /*****  Manage about us  *********/

	function manage_about_us($param1='',$param2=''){	
		if($this->session->userdata('login') != 1 || $this->session->userdata('manage_about_us') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
	
        if($param1=='update'){
            $saveData['heading']          = $this->input->post('heading');
            $saveData['description']      = $this->input->post('editor1');
 
			 $saveData['date_modified']   = date('Y-m-d h:i:sa');
            $this->db->where('page_name',"about_us");
            $result = $this->db->update('static_pages',$saveData);
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'About us';
					$desc = $mod_type.' Updated from admin panel';
					$mod_desc = $mod_type.' Updated';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', ' Data Updated Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_about_us', 'refresh');
        }
        
        $data['page_data']     = $this->db->get_where('static_pages',array('page_name'=>'about_us'))->row_array();
		$data['page_title'] 	= 'Manage About Us Page';
		$data['page_sub_title'] = 'About Us';
		$data['page_name'] 		= 'manage_about_us';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    } 
	

	/*****  manage_fqs  *********/

	function manage_fqs($param1='',$param2=''){	
		if($this->session->userdata('login') != 1 || $this->session->userdata('manage_about_us') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
	
        if($param1=='update'){
            $saveData['heading']          = $this->input->post('heading');
            $saveData['description']      = $this->input->post('editor1');
 
			 $saveData['date_modified']   = date('Y-m-d h:i:sa');
            $this->db->where('page_name',"faqs");
            $result = $this->db->update('static_pages',$saveData);
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'faqs';
					$desc = $mod_type.' Updated from admin panel';
					$mod_desc = $mod_type.' Updated';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', ' Data Updated Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_fqs', 'refresh');
        }
        
        $data['page_data']     = $this->db->get_where('static_pages',array('page_name'=>'faqs'))->row_array();
		$data['page_title'] 	= 'Manage faqs Page';
		$data['page_sub_title'] = 'Manage faqs';
		$data['page_name'] 		= 'manage_fqs';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    } 

	function upload_images($param1='',$param2=''){
			
		$slider_upload_url = "uploads/editor_images";
		if($param1=='add'){
			
		
			if(!empty($_FILES['image_name']['name'])){

				$file_name  = $_FILES['image_name']['name'];
				$path_to_file = $slider_upload_url.''.$file_name;				
				move_uploaded_file($_FILES['image_name']['tmp_name'], $path_to_file);	
				$saveData['name'] = $file_name;
			    $result = $this->db->insert('uploaded_images',$saveData);
				if($result){
			
					$this->session->set_flashdata('msg_success', ' Image uploaded Successfully');
				}
				else{
					$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
				}
			}
			else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong with image');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/upload_images', 'refresh');
		}

	
	
	$data['slider_img_url'] = $slider_upload_url;
	$data['uploaded_images'] 	= $this->db->order_by('uploaded_images_id','desc')->get('uploaded_images')->result_array();
	$data['page_title'] 	= 'Upload Images';
	$data['page_sub_title'] = ' Upload Images';
	$data['pag_type']           = "";
	$data['page_name'] 		= 'upload_images';
	$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
} 

	function manage_imprints($param1='',$param2=''){	
		if($this->session->userdata('login') != 1 || $this->session->userdata('manage_about_us') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
	
        if($param1=='update'){
            $saveData['heading']          = $this->input->post('heading');
            $saveData['description']      = $this->input->post('editor1');

			$saveData['date_modified']   = date('Y-m-d h:i:sa');
            $this->db->where('page_name',"imprints");
            $result = $this->db->update('static_pages',$saveData);
            if($result){
				
				$this->session->set_flashdata('msg_success', ' Data Updated Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_imprints', 'refresh');
        }
        
        $data['page_data']     = $this->db->get_where('static_pages',array('page_name'=>'imprints'))->row_array();
		$data['page_title'] 	= 'Manage Imprints';
		$data['page_sub_title'] = 'Manage Imprints';
		$data['page_name'] 		= 'manage_imprints';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    } 
	
    /***** Manage about us *********/
	
	/*****  Manage Advertise  *********/

	function manage_advertise($param1='',$param2=''){	
		if($this->session->userdata('login') != 1 || $this->session->userdata('manage_advertise') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
	
         if($param1=='update'){
            $saveData['heading']          = $this->input->post('heading');
            $saveData['description']      = $this->input->post('editor1');
			 $saveData['date_modified']   = date('Y-m-d h:i:sa');
            $this->db->where('page_name',"advertise");
            $result = $this->db->update('static_pages',$saveData);
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'Advertise';
					$desc = $mod_type.' Updated from admin panel';
					$mod_desc = $mod_type.' Updated';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', ' Data Updated Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_advertise', 'refresh');
        }
        
        $data['page_data']     = $this->db->get_where('static_pages',array('page_name'=>'advertise'))->row_array();
		$data['page_title'] 	= 'Manage Advertise Page';
		$data['page_sub_title'] = 'Advertise';
		$data['page_name'] 		= 'manage_advertise';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    } 
    /***** Manage Advertise *********/
	
    /*****  Manage Privacy Policy *********/

	function manage_privacy_policy($param1='',$param2=''){	
		if($this->session->userdata('login') != 1 || $this->session->userdata('manage_privacy_policy') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
	
         if($param1=='update'){
            $saveData['heading']          = $this->input->post('heading');
            $saveData['description']      = $this->input->post('editor1');
            $saveData['date_modified']    = date('Y-m-d h:i:sa');
            $this->db->where('page_name',"privacy_policy");
            $result = $this->db->update('static_pages',$saveData);
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'Privacy Policy';
					$desc = $mod_type.' Updated from admin panel';
					$mod_desc = $mod_type.' Updated';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', ' Data Updated Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_privacy_policy', 'refresh');
        }
        
        $data['page_data']      = $this->db->get_where('static_pages',array('page_name'=>'privacy_policy'))->row_array();
		$data['page_title'] 	= 'Manage Privacy Policy';
		$data['page_sub_title'] = 'Privacy Policy';
		$data['page_name'] 		= 'manage_privacy_policy';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    } 
    /***** Manage Privacy Policy *********/
	
	   /*****  Manage Privacy Policy *********/

	function manage_faqs($param1='',$param2=''){	
		if($this->session->userdata('login') != 1 || $this->session->userdata('manage_faqs') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
	
       
        if($param1=='update_faqs'){
			$saveData['seo_title']      = $this->input->post('seo_title');
            $saveData['seo_desc']      = $this->input->post('seo_desc');
            $saveData['seo_keys']      = $this->input->post('seo_keys');
			$saveData['date_modified']   = date('Y-m-d h:i:sa');
            $this->db->where('page_name',"faqs");
            $result = $this->db->update('static_pages',$saveData);
			if($result){				
				$this->session->set_flashdata('msg_success', ' Data Updated Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_faqs', 'refresh');
		}
		if($param1=='delete'){
			
            $this->db->where('faqs_id', $param2);	
			$result = $this->db->delete('faqs');
	
			if($result){				
				$this->session->set_flashdata('msg_success', ' Data Deleted Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_faqs', 'refresh');
		}
		$this->db->order_by('faqs_id','desc');
		if($param1=="brands"){
		  $data['faqs']         = $this->db->get_where('faqs',array('question_type'=>'4','unique_id'=>$param2))->result_array();
		  
		}
		if($param1==""){
			
		   $data['faqs'] 	        = $this->db->get_where('faqs')->result_array();
		}
		$data['page_type']      = $param1;
		$data['unique_id']      = $param2;
		$data['page_title'] 	= 'Manage FAQS';
		$data['page_sub_title'] = 'FAQS';
		$data['page_name'] 		= 'manage_faqs';
	
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    }
	public function manage_add_faqs($param1='',$param2=''){
		if($param1=='add'){
			
            $saveData['question']      = $this->input->post('question');
            $saveData['answer']        = $this->input->post('editor1');
            $saveData['unique_id']     = $this->input->post('unique_id');
            $saveData['question_type'] = $this->input->post('question_type');
            $saveData['status']        = $this->input->post('status');
            $saveData['date_added']    = date('Y-m-d h:i:sa');
            $result = $this->db->insert('faqs',$saveData);
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'FAQS';
					$desc = $mod_type.' Added from admin panel';
					$mod_desc = $mod_type.' Added';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', ' Data Added Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_faqs', 'refresh');
        }

		$data['page_id'] 	= $param1;
		$data['brand_id'] 	= $param2;
		$data['page_title'] 	= 'Manage add FAQS';
		$data['page_sub_title'] = 'Add FAQS';
		$data['page_name'] 		= 'manage_add_faqs';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
	} 
	public function manage_edit_faqs($param1='',$param2=''){
		if($param1=='edit'){
			// echo "<pre>";
			// print_r($_POST);
			// echo "</pre>"; exit;
            $saveData['question']      = $this->input->post('question');
			$saveData['unique_id']     = $this->input->post('unique_id');
            $saveData['answer']        = $this->input->post('editor1');
			$saveData['question_type'] = $this->input->post('question_type');
            $saveData['status']        = $this->input->post('status');
            $saveData['date_modified'] = date('Y-m-d h:i:sa');
			
            $this->db->where('faqs_id',$param2);
            $result = $this->db->update('faqs',$saveData);
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'FAQS';
					$desc = $mod_type.' Updated from admin panel';
					$mod_desc = $mod_type.' Updated';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', ' Data Updated Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_faqs', 'refresh');
        }
		$data['param1'] 	    = $param1;
		$data['page_title'] 	= 'Manage add FAQS';
		$data['page_sub_title'] = 'Edit FAQS';
		$data['page_name'] 		= 'manage_edit_faqs';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
	}
    /***** Manage Privacy Policy *********/
	
     /***** Manage Currencies  *********/
    function manage_currencies($param1='',$param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('currencies') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		
        if($param1=='add'){
            $saveData['name']                = $this->input->post('name');
            $saveData['symbol']              = $this->input->post('symbol');
            $saveData['exchange_rate']       = $this->input->post('exchange_rate');
            $saveData['code']                = $this->input->post('code');
            $saveData['exchange_rate_def']   = $this->input->post('exchange_rate_def');
            $saveData['country_id']          = $this->input->post('country_id');
            $saveData['status']              = $this->input->post('status');
            $result = $this->db->insert('currencies',$saveData);
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'Currencies';
					$desc = $mod_type.' Added from admin panel';
					$mod_desc = $mod_type.' Added';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', ' Data Added Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_currencies', 'refresh');
        }
        if($param1=='edit'){
            $saveData['name']                = $this->input->post('name');
            $saveData['symbol']              = $this->input->post('symbol');
            $saveData['exchange_rate']       = $this->input->post('exchange_rate');
            $saveData['code']                = $this->input->post('code');
            $saveData['exchange_rate_def']   = $this->input->post('exchange_rate_def');
            $saveData['country_id']          = $this->input->post('country_id');
            $saveData['status']              = $this->input->post('status');
            $this->db->where('currencies_id',$param2);
            $result = $this->db->update('currencies',$saveData);
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'Currencies';
					$desc = $mod_type.' Updated from admin panel';
					$mod_desc = $mod_type.' Updated';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', 'Data Updated Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_currencies', 'refresh');
        }
        if($param1=='delete'){
            $this->db->where('currencies_id',$param2);
            $result = $this->db->delete('currencies');
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'Currencies';
					$desc = $mod_type.' Deleted from admin panel';
					$mod_desc = $mod_type.' Deleted';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', 'Data Deleted Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_currencies', 'refresh');
        }
        $data['currencies']     = $this->db->get('currencies')->result_array();
		$data['page_title'] 	= 'Manage Currencies';
		$data['page_sub_title'] = 'Manage Currencies';
		$data['page_name'] 		= 'manage_currencies';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    } 
    /***** Manage Currencies  *********/
    
	/***** MY PROFILE *********/
	public function myprofile($param1=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('manage_myprofile') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		
		if($param1 == 'update'){
			$response = $this->Db_model->update_admin_profile();
			/* Add Entry To System Logs */
				$mod_type = 'Manage Users';
				$desc = $mod_type.' Profile Updated from admin panel';
				$mod_desc = $mod_type.' Profile Updated';
				$this->save_system_logs($desc, $mod_type, $mod_desc);
			/* Add Entry To System Logs */
			$this->session->set_flashdata('msg_success', ' Updated Successfully');
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/myprofile', 'refresh');
		}
		
		$data['profile_data'] 	= $this->db->get_where('users_system', array('users_system_id' => $this->session->userdata('users_id')))->row();
		$data['page_title'] 	= 'My Profile';
		$data['page_sub_title'] = 'Update Your Profile';
		$data['page_name'] = 'myprofile';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
	}
	/***** MY PROFILE *********/

	/***** SYSTEM SETTINGS *********/
	public function system_settings($param1=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('system_settings') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		
		if($param1 == 'update'){
			$response = $this->Db_model->update_system_settings();
			/* Add Entry To System Logs */
				$mod_type = 'System Settings';
				$desc = $mod_type.' Updated from admin panel';
				$mod_desc = $mod_type.' Updated';
				$this->save_system_logs($desc, $mod_type, $mod_desc);
			/* Add Entry To System Logs */
			$this->session->set_flashdata('msg_success', ' Updated Successfully');
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/system_settings', 'refresh');
		}
		
		$data['system_data'] 	= $this->db->get('system_settings')->result();
		$data['page_title'] 	= 'System Settings';
		$data['page_sub_title'] = 'Update Your System Settings';
		$data['page_name']      = 'system_settings';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
	}
	/***** SYSTEM SETTINGS *********/
	
	public function add_page_content($param1='',$param2=''){
		if($this->session->userdata('login') != 1 ){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
	
		if($param2=='brands'){
			$data['param1'] 	    = $param1;
			$data['param2'] 	    = $param2;
			$data['page_title'] 	= 'Add Brands Content';
			$data['page_sub_title'] = 'Add brands Content';
		}
		else if($param2=='sub_cate'){
            $data['param1'] 	    = $param1;
			$data['param2'] 	    = $param2;
			$data['page_title'] 	= 'Add Sub Category Content';
			$data['page_sub_title'] = 'Add Sub Category Content';
		}
		else if($param2=='brands_pages'){
            $data['param1'] 	    = $param1;
			$data['param2'] 	    = $param2;
			$data['page_title'] 	= 'Add Brands pages Content';
			$data['page_sub_title'] = 'Add Brands pages Content';
		}
		else if($param2=='cate'){
			$data['param1'] 	    = $param1;
			$data['param2'] 	    = $param2;
			$data['page_title'] 	= 'Add Category Content';
			$data['page_sub_title'] = 'Add Category Content';
		}
		else if($param1=='Lastest'){
			$data['param2'] 	    = $param1;
			$data['page_title'] 	= 'Add Lastest Content';
			$data['page_sub_title'] = 'Add Lastest Content';
		}
		else if($param1=='Tips'){
			$data['param2'] 	    = $param1;
			$data['page_title'] 	= 'Add Tips Content';
			$data['page_sub_title'] = 'Add Tips Content';
		}
		else if($param1=='Trend'){
			$data['param2'] 	    = $param1;
			$data['page_title'] 	= 'Add Trend Content';
			$data['page_sub_title'] = 'Add Trend Content';
		}
		else if($param1=='Popular'){
			$data['param2'] 	    = $param1;
			$data['page_title'] 	= 'Add Popular Content';
			$data['page_sub_title'] = 'Add Popular Content';
		}
		$data['pag_type'] 	    = "";
		$data['page_name']      = 'manage_add_content';
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
	}
	public function edit_pages_content($param1='',$param2='',$param3=''){
		if($this->session->userdata('login') != 1){  
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		if($param3=='brands'){
			$data['param1'] 	    = $param1;
			$data['param2'] 	    = $param2;
			$data['pg_type'] 	    = $param3;
			$data['page_title'] 	= 'Edit Brands Content';
			$data['page_sub_title'] = 'Edit brands Content';
		}
		else if($param3=='sub_cate'){
            $data['param1'] 	    = $param1;
			$data['param2'] 	    = $param2;
			$data['pg_type'] 	    = $param3;
			$data['page_title'] 	= 'Edit Sub Category Content';
			$data['page_sub_title'] = 'Edit Sub Category Content';
		}
		else if($param3=='brands_pages'){
            $data['param1'] 	    = $param1;
			$data['param2'] 	    = $param2;
			$data['pg_type'] 	    = $param3;
			$data['page_title'] 	= 'Edit brands Pages Content';
			$data['page_sub_title'] = 'Edit brands Pages Content';
		}
		else if($param3=='cate'){
			$data['param1'] 	    = $param1;
			$data['param2'] 	    = $param2;
			$data['pg_type'] 	    = $param3;
			$data['page_title'] 	= 'Edit Category Content';
			$data['page_sub_title'] = 'Edit Category Content';
		}
		else if($param2=='Lastest'){
			$data['param1'] 	    = $param1;
			$data['pg_type'] 	    = $param2;
			$data['page_title'] 	= 'Edit Lastest Content';
			$data['page_sub_title'] = 'Edit Lastest Content';
		}
		else if($param2=='Tips'){
			$data['param1'] 	    = $param1;
			$data['pg_type'] 	    = $param2;
			$data['page_title'] 	= 'Edit Tips Content';
			$data['page_sub_title'] = 'Edit Tips Content';
		}
		else if($param2=='Trend'){
			$data['param1'] 	    = $param1;
			$data['pg_type'] 	    = $param2;
			$data['page_title'] 	= 'Edit Trend Content';
			$data['page_sub_title'] = 'Edit Trend Content';
		}
		else if($param2=='Popular'){
			$data['param1'] 	    = $param1;
			$data['pg_type'] 	    = $param2;
			$data['page_title'] 	= 'Edit Popular Content';
			$data['page_sub_title'] = 'Edit Popular Content';
		}

		$data['page_name']      = 'manage_edit_content';
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
	}
	
	
	
	/***** SYSTEM SETTINGS *********/
	
	public function add_category_content($param1=''){
		if($this->session->userdata('login') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		

		$data['param1'] 	    = $param1;
		$data['page_title'] 	= 'Add Category Content';
		$data['page_sub_title'] = 'Add Category Content';
		$data['page_name']      = 'add_category_content';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
	}
	public function edit_category_content($param1='',$param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('system_settings') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		

		$data['param1'] 	    = $param1;
		$data['param2'] 	    = $param2;
		$data['page_title'] 	= 'Edit Category Content';
		$data['page_sub_title'] = 'Edit Category Content';
		$data['page_name']      = 'edit_category_content';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
	}
	/***** Manage User Groups  *********/
    function manage_user_groups($param1='',$param2=''){
        if($this->session->userdata('login') != 1 || $this->session->userdata('role_id') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		
		if($param1 == 'add'){
			$response = $this->Db_model->add_user_group();
			if($response == true){
				/* Add Entry To System Logs */
					$mod_type = 'User Groups';
					$desc = $mod_type.' Added from admin panel';
					$mod_desc = $mod_type.' Added';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', ' Added Successfully');
			} else {
				$this->session->set_flashdata('msg_error', ' Oops! There is some error. Please try again.');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_user_groups', 'refresh');
		}
		if($param1 == 'update'){
			$response = $this->Db_model->update_user_group($param2);
			if($response == true){
				/* Add Entry To System Logs */
					$mod_type = 'User Groups';
					$desc = $mod_type.' Updated from admin panel';
					$mod_desc = $mod_type.' Updated';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', ' Updated Successfully');
			} else {
				$this->session->set_flashdata('msg_error', ' Oops! There is some error. Please try again.');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_user_groups', 'refresh');
		}
		if($param1 == 'delete'){
			$response = $this->Db_model->delete_user_group($param2);
			if($response == true){
				/* Add Entry To System Logs */
					$mod_type = 'User Groups';
					$desc = $mod_type.' Deleted from admin panel';
					$mod_desc = $mod_type.' Deleted';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', ' Deleted Successfully');
			} else {
				$this->session->set_flashdata('msg_error', ' Oops! There is some error. Please try again.');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_user_groups', 'refresh');
		}
		if($param1 == 'permissions'){
			$response = $this->Db_model->update_group_permissions($param2);
			if($response == true){
				/* Add Entry To System Logs */
					$mod_type = 'User Group Permissions';
					$desc = $mod_type.' Updated from admin panel';
					$mod_desc = $mod_type.' Updated';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', ' Updated Successfully');
			} else {
				$this->session->set_flashdata('msg_error', ' Oops! There is some error. Please try again.');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_user_groups', 'refresh');
		}
        $data['groups']   		= $this->db->query("SELECT * FROM user_roles WHERE user_roles_id > 2")->result_array();
		$data['page_title'] 	= 'Manage User Groups';
		$data['page_sub_title'] = 'All User Groups';
		$data['page_name'] 		= 'manage_user_groups';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    } 
    /***** Manage User Groups  *********/
	/***** MANAGE GROUP USERS *********/
	public function manage_group_users($param1='', $param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('role_id') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		
		if($param1 =='add'){
			$result = $this->Db_model->add_group_users();
			if($result){
				/* Add Entry To System Logs */
					$mod_type = 'Group User';
					$desc = $mod_type.' Added from admin panel';
					$mod_desc = $mod_type.' Added';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', 'User Added Successfully');
			} else {
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_group_users', 'refresh');
		}
		if($param1 =='delete'){
			$result = $this->db->query("Delete From users WHERE users_id = '".$param2."' ");
			if($result){
				/* Add Entry To System Logs */
					$mod_type = 'Group User';
					$desc = $mod_type.' Deleted from admin panel';
					$mod_desc = $mod_type.' Deleted';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', 'User Deleted Successfully');
			} else {
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_group_users', 'refresh');
		}
		
		$all_users = $this->db->query("select users.*, us_roles.role_name as group_name
			from users 
			Left join user_roles as us_roles ON users.user_roles_id = us_roles.user_roles_id
			WHERE users.user_roles_id > '2'
			")->result_array();
		$profile_pic_url = $this->db->get_where('system_settings',array('type'=>'user_profile_pic'))->row()->description;
		$data['profile_pic_url'] = $profile_pic_url;
		$data['users'] 			= $all_users;
		$data['page_title'] 	= 'Manage Group Users';
		$data['page_sub_title'] = 'All Group Users';
		$data['page_name'] 		= 'manage_group_users';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
	}
	/***** MANAGE GROUP USERS *********/
	
	/***** Create System Logs *********/
	public function save_system_logs($desc = '', $mod_type = '', $mod_desc = ''){
		$save_data['logged_by_users_id'] = $this->session->userdata('users_id');
		$save_data['user_role_id'] = $this->session->userdata('role_id');
		$save_data['description'] = $desc;
		$save_data['module_type'] = $mod_type;
		$save_data['module_description'] = $mod_desc;
		$save_data['date_created'] = date('Y-m-d H:i:s');
		$this->db->insert('system_logs', $save_data);
		return true;
	}
	/***** Create System Logs *********/
	
    /***** Manage Slider Images *********/
    function manage_slider_images($param1='',$param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('manage_slider_images') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		
		$slider_upload_url = $this->db->get_where('system_settings',array('type'=>'brand_slider_imgs_url'))->row()->description;
        if($param1=='add'){
            $saveData['status']        = $this->input->post('status');
			$saveData['website_url']   = $this->input->post('website_url');
            $result = $this->db->insert('slider_images',$saveData);
			$insert_id = $this->db->insert_id();
			if(!empty($_FILES['image_name']['name'])){

				$file_name  = $insert_id.'_'.$_FILES['image_name']['name'];
				$path_to_file = $slider_upload_url.''.$file_name;				
				move_uploaded_file($_FILES['image_name']['tmp_name'], $path_to_file);	
				$updateData['image_name'] = $file_name;
				$this->db->where('slider_images_id', $insert_id);
				$this->db->update('slider_images', $updateData);

			}
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'Manage Slider Images';
					$desc = $mod_type.' Added from admin panel';
					$mod_desc = $mod_type.' Added';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', ' Data Added Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_slider_images', 'refresh');
        }
        if($param1=='edit'){
            $saveData['status']        = $this->input->post('status');
			$saveData['website_url']   = $this->input->post('website_url');
			if(!empty($_FILES['image_name']['name'])){
				$get_old_pic = $this->db->get_where('slider_images', array('slider_images_id'=>$param2))->row()->image_name;
				$old_file_path = $slider_upload_url.$get_old_pic;
				if(!empty($get_old_pic) && file_exists($old_file_path)){
					unlink($old_file_path);
				}
				$file_name  = $param2.'_'.$_FILES['image_name']['name'];
				$path_to_file = $slider_upload_url.''.$file_name;				
				move_uploaded_file($_FILES['image_name']['tmp_name'], $path_to_file);	
				$saveData['image_name'] = $file_name;		
			}
            $this->db->where('slider_images_id',$param2);
            $result = $this->db->update('slider_images',$saveData);
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'Manage Slider Images';
					$desc = $mod_type.' Updated from admin panel';
					$mod_desc = $mod_type.' Updated';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', ' Data Updated Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_slider_images', 'refresh');
        }
        if($param1=='delete'){
            $this->db->where('slider_images_id',$param2);
            $result = $this->db->delete('slider_images');
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'Manage Slider Images';
					$desc = $mod_type.' Deleted from admin panel';
					$mod_desc = $mod_type.' Deleted';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', ' Data Deleted Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_slider_images', 'refresh');
        }
		
		$data['active_slider'] = $this->db->get_where('slider_images',array('status'=>'Active'))->num_rows();
		$data['slider_img_url'] = $slider_upload_url;
        $data['slider_images'] 	= $this->db->get('slider_images')->result_array();
		$data['page_title'] 	= 'Manage Slider Images';
		$data['page_sub_title'] = ' All Slider Images';
		$data['pag_type']           = "";
		$data['page_name'] 		= 'manage_slider_images';
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    } 
	function manage_tv_slider($param1='',$param2=''){
		if($this->session->userdata('login') != 1 || $this->session->userdata('manage_slider_images') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
		
		$slider_upload_url = $this->db->get_where('system_settings',array('type'=>'brand_slider_imgs_url'))->row()->description;
        if($param1=='add'){
			$saveData['status']        = $this->input->post('status');
			$saveData['start_date']        = $this->input->post('start_date');
			$saveData['end_date']        = $this->input->post('end_date');
			$saveData['link']   = $this->input->post('link');
			// $saveData['description']   = $this->input->post('desc');
            $result = $this->db->insert('tv_slider_images',$saveData);
			$insert_id = $this->db->insert_id();
			if(!empty($_FILES['image']['name'])){

				$file_name  = $insert_id.'_'.$_FILES['image']['name'];
				$path_to_file = $slider_upload_url.''.$file_name;				
				move_uploaded_file($_FILES['image']['tmp_name'], $path_to_file);	
				$updateData['image'] = $file_name;
				$this->db->where('tv_slider_images_id', $insert_id);
				$this->db->update('tv_slider_images', $updateData);

			}
            if($result){
			
				$this->session->set_flashdata('msg_success', ' Data Added Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_tv_slider', 'refresh');
        }
        if($param1=='edit'){

            $saveData['status']        = $this->input->post('status');
			$saveData['start_date']        = $this->input->post('start_date');
			$saveData['end_date']        = $this->input->post('end_date');
			$saveData['link']   = $this->input->post('link');
			// $saveData['description']   = $this->input->post('desc');
			if(!empty($_FILES['image']['name'])){
				$get_old_pic = $this->db->get_where('tv_slider_images', array('tv_slider_images_id'=>$param2))->row()->image;
				$old_file_path = $slider_upload_url.$get_old_pic;
				if(!empty($get_old_pic) && file_exists($old_file_path)){
					unlink($old_file_path);
				}
				$file_name  = $param2.'_'.$_FILES['image']['name'];
				$path_to_file = $slider_upload_url.''.$file_name;				
				move_uploaded_file($_FILES['image']['tmp_name'], $path_to_file);	
				$saveData['image'] = $file_name;		
			}
            $this->db->where('tv_slider_images_id',$param2);
            $result = $this->db->update('tv_slider_images',$saveData);
            if($result){
			
				$this->session->set_flashdata('msg_success', ' Data Updated Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_tv_slider', 'refresh');
        }
        if($param1=='delete'){
            $this->db->where('slider_images_id',$param2);
            $result = $this->db->delete('slider_images');
            if($result){
				/* Add Entry To System Logs */
					$mod_type = 'Manage Slider Images';
					$desc = $mod_type.' Deleted from admin panel';
					$mod_desc = $mod_type.' Deleted';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				/* Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', ' Data Deleted Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_tv_slider', 'refresh');
        }
		
		$data['active_slider'] = $this->db->get_where('tv_slider_images',array('status'=>'Active'))->num_rows();
		$data['slider_img_url'] = $slider_upload_url;
        $data['tv_slider_images'] 	= $this->db->get('tv_slider_images')->result_array();
		$data['page_title'] 	= 'Manage Tv Slider';
		$data['page_sub_title'] = ' All Tv Slider Images';
		$data['pag_type']           = "";
		$data['page_name'] 		= 'manage_tv_slider';
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    } 
    /***** Manage Slider Images *********/
	
		/* For user status */
	 public function update_status(){
	   
		$data['for_email'] = $this->input->post('status');
		$id    = $this->input->post('slider_imagesId');
		$table = $this->input->post('table');
		 $this->db->where($table.'_id',$id);
		$result = $this->db->update($table,$data);

		
		if($result){
			echo 'true';
		}else{
			echo 'false';
		}
		exit;
	 }
	 public function update_coupon(){
	   echo  "moaviz";
		/* $data['for_email'] = $this->input->post('status');
		$id    = $this->input->post('couponsId');
		$table = $this->input->post('table');
		 $this->db->where($table.'_id',$id);
		$result = $this->db->update($table,$data);

		
		if($result){
			echo 'true';
		}else{
			echo 'false';
		} */
		exit;
	 }
	 /* Manage users */
	 function manage_users($param1='',$param2=''){

		if($this->session->userdata('login') != 1 || $this->session->userdata('manage_users') != 1){
			redirect(base_url().'gutscheinfuralleadmin', 'refresh');
		}
 
        if($param1=='add'){ 
            $saveData['users_roles_id']          = $this->input->post('users_roles_id');
            $saveData['email']                   = $this->input->post('email');
			$saveData['password']                   = $this->input->post('password');
            $saveData['first_name']              = $this->input->post('first_name');
            $saveData['mobile']                  = $this->input->post('mobile');
             $saveData['city']   				 = $this->input->post('city');
            $saveData['address']   				 = $this->input->post('address');
   			/* $saveData['is_deleted']   			 = $this->input->post('is_deleted'); */
			$saveData['status']    				 = $this->input->post('status');
            $result = $this->db->insert('users_system',$saveData);
			$insert_id = $this->db->insert_id();
			$upload_url  = $this->db->get_where('system_settings',array('type'=>'user_profile_pic'))->row()->description;
            if(!empty($_FILES['user_image']['name'])){
				$file_name  = $insert_id.'_'.$_FILES['user_image']['name'];
				$path_to_file = $upload_url.''.$file_name;				
				move_uploaded_file($_FILES['user_image']['tmp_name'], $path_to_file);	
				$updateData['user_image'] = $file_name;
				$this->db->where('users_system_id', $insert_id);
				$this->db->update('users_system', $updateData);
			}
			
            if($result){
				/* Add Entry To System Logs 
					$mod_type = 'Manage Categories';
					$desc = $mod_type.' Added from admin panel';
					$mod_desc = $mod_type.' Added';
					$this->save_system_logs($desc, $mod_type, $mod_desc);
				 Add Entry To System Logs */
				$this->session->set_flashdata('msg_success', ' Data Added Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_users', 'refresh');
        }
        if($param1=='edit'){
            $saveData['users_roles_id']          = $this->input->post('users_roles_id');
            $saveData['email']                   = $this->input->post('email');
            $saveData['password']                = $this->input->post('password');
            $saveData['first_name']              = $this->input->post('first_name');
            $saveData['mobile']                  = $this->input->post('mobile');
            $saveData['city']   				 = $this->input->post('city');
            $saveData['address']   				 = $this->input->post('address');
			$saveData['status']    				 = $this->input->post('status');
          
            $this->db->where('users_system_id',$param2);
            $result = $this->db->update('users_system',$saveData);
			$upload_url  = $this->db->get_where('system_settings',array('type'=>'user_profile_pic'))->row()->description;
            if(!empty($_FILES['user_image']['name'])){
				$file_name  = $param2.'_'.$_FILES['user_image']['name'];
				$path_to_file = $upload_url.''.$file_name;				
				move_uploaded_file($_FILES['user_image']['tmp_name'], $path_to_file);	
				$updateData['user_image'] = $file_name;
				$this->db->where('users_system_id', $param2);
				$this->db->update('users_system', $updateData);
			}
            if($result){
				$this->session->set_flashdata('msg_success', 'Data Edit Successfully');
			}
			else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_users', 'refresh');
        }
        if($param1=='delete'){
            $this->db->where('users_system_id',$param2);
            $result = $this->db->delete('users_system');
            if($result){
				$this->session->set_flashdata('msg_success', 'Data Deleted Successfully');
			}else{
				$this->session->set_flashdata('msg_error', ' Oops!something went wrong');
			}
			redirect(base_url().strtolower($this->session->userdata('directory')) . '/manage_users', 'refresh');
        }

	
        $data['profile_pic_url'] = $this->db->get_where('system_settings',array('type'=>'user_profile_pic'))->row()->description;
        $data['all_users'] 	= $this->db->get_where('users_system',array('users_roles_id!='=>1))->result_array();
		$data['page_title'] 	= 'Manage System Users';
		$data['page_sub_title'] = 'Manage System Users';
		$data['page_name'] 		= 'manage_users';
		$data['pag_type']           = "";
		$this->load->view(strtolower($this->session->userdata('directory')) .'/index', $data);
    } 
	 public function update_slider(){
	   
		$data['brand_slider'] = $this->input->post('status');
		$id    = $this->input->post('brandsId');
		$table = 'brands';
		 $this->db->where($table.'_id',$id);
		$result = $this->db->update($table,$data);

		
		if($result){
			echo 'true';
		}else{
			echo 'false';
		}
		exit;
	 }
	/* For user status */
	/***********************aiman******************* */

	public function sortswaping(){
		$data['values'] = $_POST;
		$sort_type = "";
		$max_value_array = array();
		$new_value = $this->input->post('new_value');
		$item_id   = $this->input->post('item_id');
		$pagetype    = $this->input->post('pagetype');
		$sorttype  = $this->input->post('sorttype');
		$pagetype_id  = $pagetype.'_id';

		if($sorttype=="sort"){
			$sort_type = "sort_order"; 
		}
		if($sorttype=="popularsort"){ 
			$sort_type = "popular_shop_order"; 
		}
		if($sorttype=="lastest"){
			$sort_type = "lastest_order"; 
		} 
		if($sorttype=="trending"){
			$sort_type = "trending_order"; 
		}
		if($sorttype=="tips"){
			$sort_type = "tips_order"; 
		}
		if($sorttype=="cate"){
			$sort_type = "cate_page_order"; 
		}
		if($sorttype=="subcate"){
			$sort_type = "sub_cate_order"; 
		}
		if($sorttype=="section"){
			$sort_type = "section_sort_order"; 
		}
		if($sorttype=="popular"){
			$sort_type = "popular_order"; 
		}
		$same_order_coupon_array  = $this->db->query("select $pagetype_id from $pagetype where $sort_type ='".$new_value."'")->result_array();

		$max_sort = $this->db->query("SELECT MAX( $sort_type ) AS max FROM $pagetype" )->row()->max;
		foreach($same_order_coupon_array as $key => $order_coupon){
			$max_sort++;
			$this->db->query("UPDATE  $pagetype SET $sort_type = '".$max_sort."' WHERE $pagetype_id = '".$order_coupon[$pagetype_id]."' ");	
			$max_value_array[$key]['updated_ids']    =  $order_coupon[$pagetype_id];
			$max_value_array[$key]['updated_values'] =  $max_sort;
		}
        $result = $this->db->query("UPDATE  $pagetype SET $sort_type = '".$new_value."' WHERE $pagetype_id = '".$item_id."' ");
		$data['max_value_array'] = $max_value_array;
	
		echo json_encode($data); exit;   
		
	}
	public function send_otp(){
		$otp_to_send = $_POST['otp'];
		$email       = $_POST['email'];
		$subject = "System settings updation authentication";
		$message = "Here is your otp code to update system settings ".$otp_to_send;
		$result = $this->Email_model->do_email($message, $subject, $email); 
        if($result==1){
			$data['description'] = $otp_to_send;
			$this->db->where('type' , "admin_profile_otp");
			$this->db->update("system_settings" , $data); 
		}
		echo $result; exit;
		
	}
	public function send_otp_account(){
		$otp_to_send = $_POST['otp'];
		$email       = $_POST['email'];
		$subject = "My profile updation authentication";
		$message = "Here is your otp code to update my profile ".$otp_to_send;
		$result = $this->Email_model->do_email($message, $subject, $email); 
        if($result==1){
			$data['description'] = $otp_to_send;
			$this->db->where('type' , "admin_profile_otp");
			$this->db->update("system_settings" , $data); 
		}
		echo $result; exit;
		
	}
	public function check_otp(){
		$check_opt = $_POST['check_opt'];
		$real_otp = $this->db->get_where('system_settings',array('type'=>'admin_profile_otp'))->row()->description;
		if($check_opt==$real_otp){
			$results = "1";
		}
		else{
			$results = "0";
		}
		echo $results; exit;
	}
	function sorting_management($table,$new_value,$sort_type){
		$same_order_coupon_array  = $this->db->query("select $table_id from $table where $sort_type ='".$new_value."'")->result_array();
		$max_sort = $this->db->query("SELECT MAX( $sort_type ) AS max FROM $table" )->row()->max;
	    foreach($same_order_coupon_array as $key => $order_coupon){
			$max_sort++;
			$this->db->query("UPDATE  $table SET $sort_type = '".$max_sort."' WHERE $table_id = '".$order_coupon[$table_id]."' ");	
		}
	}
}