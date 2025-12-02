<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Db_model extends CI_Model {
		
		function __construct() {
			parent::__construct();
		}		
		
		public function get_data($table = '', $pkey = '', $pkeydata = ''){
			$result = $this->db->get_where($table, array($pkey => $pkeydata))->row_array();	
			return $result;
		}	

		public function get_data_row($table = '', $pkey = '', $pkeydata = ''){		
			$result = $this->db->get_where($table, array($pkey => $pkeydata))->row();
			return $result;	
		}	

		public function get_data_array($table = '', $pkey = '', $pkeydata = ''){
			$result = $this->db->get_where($table, array($pkey => $pkeydata))->result_array();	
			return $result;	
		}	

		public function get_data_In_array($table = ''){
			$result = $this->db->get($table)->result_array();	
			return $result;	
		}		

		public function get_data_name($table = '', $pkey = '', $pkeydata = '' , $name=''){		
			$result = $this->db->get_where($table,array($pkey=> $pkeydata))->row()->$name;	
			return $result;	
		}		

		public function get_data_static($table = '', $pkey = '', $pkeydata = '' , $status=''){		
			$result = 	$this->db->query("SELECT * FROM $table WHERE $pkey = $pkeydata AND status = '$status'")->result_array();			
			return $result;	
		}	

		public function category_update_data($table, $id, $data){
			$this->db->where('product_categories_id' , $id);
			$this->db->update($table , $data); 
		}

		/* UPDATE DATA */	
		function set_update_data($table, $id, $data){
			$this->db->where('product_categories' , $id);
			$this->db->update($table , $data); 
			
		}		

		public function get_system_currency(){
			$result = $this->db->get_where('system_settings', array('type' =>'system_currency'))->row()->description;
			return $result;	
		}
		
		/* UPDATE DATA */	
		function update_data($table, $id, $data){
			$this->db->where($table . '_id' , $id);
			$result = $this->db->update($table , $data); 
			return $result;
		}		
		/* UPDATE DATA */ 	
		function string_replace_body($name,$email,$string){
			$string = str_replace('{user_name}', $name, $string);
			$string = str_replace('{user_email}',$email, $string);
			return $string;
			exit;
		}
		
		/* UPDATE DATA */	
		function update_email_data($table, $type, $data){
			$this->db->where('type' , $type);
			$result = $this->db->update($table , $data); 
			return $result;
		}		
		/* UPDATE DATA */ 	
		
		/* DELETE DATA BY ID */		
		function delete_data($table, $id){		
			$this->db->where($table.'_id', $id);	
			$result = $this->db->delete($table);
			return $result;
		}	
		
		/* INSERT DATA */	
		function add_data($table, $data){		
			$result = $this->db->insert($table , $data); 	
			return $result;
		}		
		/* INSERT DATA */ 	
		
		/* GET DATA BY TABLE DESC */	
		function get_data_desc($table){	
			$this->db->select();		
			$this->db->from($table);	
			$this->db->order_by($table.'_id','DESC');	
			$this->db->limit(3);
			$query = $this->db->get(); 		
			return $query->result_array();	
		}	
		/* GET DATA BY TABLE DESC */		
		
		/* Admin LOGIN */
		function login_varify_accounts(){
			$username= $this->input->post('email');
			$password= $this->input->post('password');
		    $this->db->select();
			$this->db->from('users_system');
			$this->db->where('email',$username);
			$this->db->where('password',$password);
			$query = $this->db->get(); 
			if($query->num_rows()== 1){
				return $query->row();
			} else {
				return false;
			}	
		}
		/* Admin LOGIN */
		
		/* Group USER LOGIN */
		function login_varify_group_accounts(){
			$username= $this->input->post('email');
			$password= $this->input->post('password');
		    $this->db->select();
			$this->db->from('users');
			$this->db->where('email',$username);
			$this->db->where('password',$password);
			$query = $this->db->get(); 
			if($query->num_rows()== 1){
				return $query->row();
			} else {
				return false;
			}	
		}
		/*  USER LOGIN */
		function varify_user_accounts(){
			$username = $this->input->post('user_name');
			$password = $this->input->post('user_password');
		    $this->db->select();
			$this->db->from('user');
			$this->db->where('email',$username);
			$this->db->where('password',$password);
			$query = $this->db->get(); 
			if($query->num_rows()== 1){
				// echo 'successs';exit;
				return $query->row();
			} else {
				return false;
				// echo 'fail';exit;
			}	
		}
		
		/* Send email for customer query response */
		function customer_query_response($name,$user_email,$response){  
		
               
				$sub = "Customer Query Response by Admin";
			    $message = "<b>Dear ".$name." </b><br> ".$response;
				
				$mail_response = $this->Email_model->do_email($message, $sub, $user_email);
				if($mail_response == true){
					return 'Mail Sent';
				} else {
					return 'Mail Not Sent';
				}
			
		}
		/* Send email for customer query response */
		function retrieve_password($user_email){  
			$get_email_data = $this->db->get_where('user', array('email'=>$user_email));
			
			if($get_email_data->num_rows() == 0){
				return 'Email Not Found';
			} else if($get_email_data->num_rows() == 1){
                $user_details = $get_email_data->row_array();
				$user_name = $user_details['name'];
				$user_id = $user_details['user_id'];
				$code_data = $user_id.'_'.date('Ymd h:s:i');
				$encoded_code = base64_encode($code_data);
				$recovery_link = base_url().'admin/resetpassword/'.$encoded_code;
				$sub = "Reset Password";
				// $message = "<b>Dear ".$user_name." </b><br> The link for change your password is down here. <br> <b>Please Note:<b> This link will be valid only for 1 time,<br> after that this link will be expire. <br> <a href='".$recovery_link."' target='_blank'> Reset Password </a> ";
				$get_template = $this->db->get_where('email_templates', array('type'=>'forgot_password'))->row();
				$message = $get_template->body;
				$message = str_replace("{user_name}", $user_name , $message);
				$message = str_replace("{reset_link}", $recovery_link , $message);
				$mail_response = $this->Email_model->do_email($message, $sub, $user_email);
				$this->db->query("UPDATE user SET reset_password_code = '".$encoded_code."' WHERE user_id = '".$user_id."'  ");
				if($mail_response == true){
					return 'Mail Sent';
				} else {
					return 'Mail Not Sent';
				}
			}
		}
		/* UPDATE ADMIN PROFILE */
		function update_admin_profile(){
			$save_data['first_name'] = $this->input->post('first_name');
			$save_data['mobile'] = $this->input->post('mobile');
			$save_data['city'] = $this->input->post('city');
			$save_data['email'] = $this->input->post('email');	
			$save_data['password'] = $this->input->post('password');	
			$save_data['address'] = $this->input->post('address');	

			if(!empty($_FILES['user_image']['name'])){
				$file_name = 'users_admin_'.time().$this->session->userdata('users_id').'.jpg';
				$path_to_file = 'uploads/users/'.$file_name;				
				move_uploaded_file($_FILES['user_image']['tmp_name'], $path_to_file);	
				$save_data['user_image'] = $file_name;		
			}			
				
			$this->db->where('users_system_id' , $this->session->userdata('users_id'));	
			$this->db->update('users_system' , $save_data); 	
			$this->session->set_userdata('name',$save_data['first_name']);	
		}		
		/* UPDATE ADMIN PROFILE */	
		/* UPDATE GROUP USER PROFILE */
		function update_user_profile(){
			$profile_pic_url = $this->db->get_where('system_settings',array('type'=>'user_profile_pic'))->row()->description;
			$save_data['user_name'] = $this->input->post('user_name');
			$save_data['email'] = $this->input->post('email');
			$save_data['password'] = $this->input->post('password');
			$save_data['mobile_no'] = $this->input->post('mobile_no');
			if(!empty($_FILES['profile_image']['name'])){
				$file_name = time().$this->session->userdata('users_id').'.jpg';
				$path_to_file = $profile_pic_url.$file_name;				
				move_uploaded_file($_FILES['profile_image']['tmp_name'], $path_to_file);	
				$save_data['profile_image'] = $file_name;		
			}
			$this->db->where('users_id' , $this->session->userdata('users_id'));	
			$this->db->update('users' , $save_data); 	
			$this->session->set_userdata('name',$save_data['user_name']);
			return true;
		}		
		/* UPDATE GROUP USER PROFILE */												
		/* UPDATE ADMIN SETTING */	
		function update_system_settings(){
			$save_data['description'] = $this->input->post('system_name');	
			$this->db->where('type' , 'system_name');		
			$this->db->update('system_settings' , $save_data); 	

			$save_data['description'] = $this->input->post('theme_color');
			$this->db->where('type' , 'theme_color');		
			$this->db->update('system_settings' , $save_data);

			$save_data['description'] = $this->input->post('email');
			$this->db->where('type' , 'email');		
			$this->db->update('system_settings' , $save_data); 
			
			$save_data['description'] = $this->input->post('phone');
			$this->db->where('type' , 'phone');		
			$this->db->update('system_settings' , $save_data); 
			
			$save_data['description'] = $this->input->post('city');
			$this->db->where('type' , 'city');		
			$this->db->update('system_settings' , $save_data); 
			
			$save_data['description'] = $this->input->post('state');
			$this->db->where('type' , 'state');		
			$this->db->update('system_settings' , $save_data); 
			
			$save_data['description'] = $this->input->post('address');
			$this->db->where('type' , 'address');		
			$this->db->update('system_settings' , $save_data); 
			
			$save_data['description'] = $this->input->post('smtp_host');
			$this->db->where('type' , 'smtp_host');		
			$this->db->update('system_settings' , $save_data); 		
			
			$save_data['description'] = $this->input->post('smtp_port');
			$this->db->where('type' , 'smtp_port');
			$this->db->update('system_settings' , $save_data);
			
			$save_data['description'] = $this->input->post('smtp_username');
			$this->db->where('type' , 'smtp_username');
			$this->db->update('system_settings' , $save_data);
			
			$save_data['description'] = $this->input->post('smtp_port');
			$this->db->where('type' , 'smtp_port');
			$this->db->update('system_settings' , $save_data);
			
			$save_data['description'] = $this->input->post('smtp_password');
			$this->db->where('type' , 'smtp_password');
			$this->db->update('system_settings' , $save_data);
			
			$save_data['description'] = $this->input->post('site_description');
			$this->db->where('type' , 'site_description');
			$this->db->update('system_settings' , $save_data);
			
			$save_data['description'] = $this->input->post('desc_limit');
			$this->db->where('type' , 'description_limit');
			$this->db->update('system_settings' , $save_data);
			
			$save_data['description'] = $this->input->post('brand_page_alert_position');
			$this->db->where('type' , 'brand_page_alert_position');
			$this->db->update('system_settings' , $save_data);
			
			// $save_data['description'] = $this->input->post('row_num_popular_coupons');
			// $this->db->where('type' , 'row_num_popular_coupons');
			// $this->db->update('system_settings' , $save_data);
			$save_data['description'] = $this->input->post('home_page_popular_coupon_limit');
			$this->db->where('type' , 'home_page_popular_coupon_limit');
			$this->db->update('system_settings' , $save_data);
			
			$save_data['description'] = $this->input->post('coupon_num_email');
			$this->db->where('type' , 'coupon_num_email');
			$this->db->update('system_settings' , $save_data);	
			
			$save_data['description'] = $this->input->post('exclusive_num_coupon_email');
			$this->db->where('type' , 'home_faqs_quantity');
			$this->db->update('system_settings' , $save_data);

			$save_data['description'] = $this->input->post('home_page_faqs');
			$this->db->where('type' , 'exclusive_num_coupon_email');
			$this->db->update('system_settings' , $save_data);

			$save_data['description'] = $this->input->post('popular_brands_limit');
			$this->db->where('type' , 'popular_brands_limit');
			$this->db->update('system_settings' , $save_data);

			$save_data['description'] = $this->input->post('customer_support_email');
			$this->db->where('type' , 'customer_support_email');
			$this->db->update('system_settings' , $save_data);

			$save_data['description'] = $this->input->post('top_section_brands_limit');
			$this->db->where('type' , 'top_section_brands_limit');
			$this->db->update('system_settings' , $save_data);
			
			if(!empty($_FILES['system_image']['name'])){	
				$file_name = time().'_system_image.jpg';			
				$path_to_file = 'uploads/admin/'.$file_name;	
				move_uploaded_file($_FILES['system_image']['tmp_name'], $path_to_file);		
				$save_data['description'] = $file_name;			
				$this->db->where('type' , 'system_image');	
				$this->db->update('system_settings' , $save_data); 		
			}	
		}		
		/* UPDATE ADMIN SETTING */
		
		function add_user_group(){
			$save_data['role_name'] = $this->input->post('name');
			$save_data['status'] = $this->input->post('status');
			$save_data['directory'] = 'admin';
			$this->db->insert('user_roles' , $save_data); 
			$group_id = $this->db->insert_id();
			if($group_id >= 1){
				$access_data['all_bookings'] 			= 0;
				$access_data['pending_bookings'] 		= 0;
				$access_data['accepted_bookings']		= 0;
				$access_data['rejected_bookings'] 		= 0;
				$access_data['cancelled_bookings'] 		= 0;
				$access_data['car_types'] 				= 0;
				$access_data['vehicle_model'] 			= 0;
				$access_data['vehicle_make'] 			= 0;
				$access_data['roof_type'] 				= 0;
				$access_data['gear_type'] 				= 0;
				$access_data['fuel_type'] 				= 0;
				$access_data['manage_cars'] 			= 0;
				$access_data['manage_motors'] 			= 0;
				$access_data['payment_methods'] 		= 0;
				$access_data['currencies'] 				= 0;
				$access_data['manage_topups'] 			= 0;
				$access_data['transactions'] 			= 0;
				$access_data['withdrawal'] 				= 0;
				$access_data['manage_users'] 			= 0;
				$access_data['manage_myprofile'] 		= 0;
				$access_data['system_settings'] 		= 0;
				$access_data['user_roles_id'] 			= $group_id;
				$this->db->insert('pages_access' , $access_data);
				return true;
			} 
			return false;
		}
		function update_user_group($group_id){
			$save_data['role_name'] = $this->input->post('name');
			$save_data['status'] = $this->input->post('status');
			$save_data['directory'] = 'admin';
			$this->db->where('user_roles_id', $group_id);
			$this->db->update('user_roles' , $save_data); 
			return true;
		}
		function delete_user_group($group_id){
			$this->db->query("DELETE FROM pages_access WHERE user_roles_id = '".$group_id."' ");
			$this->db->query("DELETE FROM user_roles WHERE user_roles_id = '".$group_id."' ");
			return true;
		}
		/* UPDATE USER GROUP PERMISSIONS */
		function update_group_permissions($group_id){
		    $save_data['all_bookings'] 				= $this->input->post('all_bookings');
		    $save_data['pending_bookings'] 			= $this->input->post('pending_bookings');
		    $save_data['accepted_bookings']			= $this->input->post('accepted_bookings');
		    $save_data['rejected_bookings'] 		= $this->input->post('rejected_bookings');
		    $save_data['cancelled_bookings'] 		= $this->input->post('cancelled_bookings');
		    $save_data['car_types'] 				= $this->input->post('car_types');
		    $save_data['vehicle_model'] 			= $this->input->post('vehicle_model');
		    $save_data['vehicle_make'] 				= $this->input->post('vehicle_make');
		    $save_data['roof_type'] 				= $this->input->post('roof_type');
		    $save_data['gear_type'] 				= $this->input->post('gear_type');
		    $save_data['fuel_type'] 				= $this->input->post('fuel_type');
		    $save_data['manage_cars'] 				= $this->input->post('manage_cars');
		    $save_data['manage_motors'] 			= $this->input->post('manage_motors');
		    $save_data['payment_methods'] 			= $this->input->post('payment_methods');
		    $save_data['currencies'] 				= $this->input->post('currencies');
		    $save_data['manage_topups'] 			= $this->input->post('manage_topups');
		    $save_data['transactions'] 				= $this->input->post('transactions');
		    $save_data['withdrawal'] 				= $this->input->post('withdrawal');
		    $save_data['manage_users'] 				= $this->input->post('manage_users');
		    $save_data['manage_myprofile'] 			= $this->input->post('manage_myprofile');
		    $save_data['system_settings'] 			= $this->input->post('system_settings');
			$this->db->where('user_roles_id' , $group_id);
			$this->db->update('pages_access' , $save_data);
			return true;
		}
		/* UPDATE USER GROUP PERMISSIONS */
		function add_group_users(){
			$save_data['user_name'] = $this->input->post('user_name');
			$save_data['email'] = $this->input->post('email');
			$save_data['password'] = $this->input->post('password');
			$save_data['mobile_no'] = $this->input->post('mobile_no');
			$save_data['status'] = $this->input->post('status');
			$save_data['user_roles_id'] = $this->input->post('user_group_id');
			$save_data['login_with'] = 'Email';
			$save_data['date_added'] = date('Y-m-d H:i:s');
			$this->db->insert('users' , $save_data); 
			$users_id = $this->db->insert_id();
			
			if(!empty($_FILES['profile_image']['name']) && $users_id >= 1){
				$profile_pic_url = $this->db->get_where('system_settings',array('type'=>'user_profile_pic'))->row()->description;
				$file_name = time().'_'.$users_id.'.png';			
				$path_to_file = $profile_pic_url.$file_name;	
				move_uploaded_file($_FILES['profile_image']['tmp_name'], $path_to_file);		
				$img_data['profile_image'] = $file_name;			
				$this->db->where('users_id' , $users_id);	
				$this->db->update('users' , $img_data); 		
			}
			if($users_id >= 1){				
				return true;
			}
			return false;
		}
	}