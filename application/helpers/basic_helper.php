<?php 
define('WEBSITE_NAME', 'Transportation' );
function check_active_menu($segment,$menu,$child_menu=''){

	if($segment==$menu || ($child_menu!='' && strpos($child_menu, $segment) !== false)){
		echo "active";
	} else{
		echo  "";
	}
}
function admin_url($prefix=''){
	return site_url('admin/'.$prefix);
}
function agent_url($prefix=''){
	return site_url('agent/'.$prefix);
}
function convert_all_json_to_column($rows){
	foreach ($rows as $rowk => $row) {
		foreach($row as $colk=> $col){
			if(is_json($col)){
				$col=json_decode($col,true);
				if(is_array($col)){
					$tcol=$col;
					unset($rows[$rowk][$colk]);
					foreach ($tcol as $skey => $svalue) {
						$rows[$rowk][$colk][$skey]=$svalue;
					}

				}
			}		
		}
	} 
	return $rows;
}
function is_json($string,$return_data = false) {
      $data = json_decode($string);
     return (json_last_error() == JSON_ERROR_NONE) ? ($return_data ? $data : TRUE) : FALSE;
}
function franchise_roles(){
	return [
		'BP' => 'Bussiness Manager',
		'RM' => 'Relationship Manager',
		'TC' => 'Tele Callers',
		'OT' => 'Operations Team',
	];
}
function franchise_bank_type(){
	return [
		'Savings Deposit'=> 'Savings Deposit A/c',
		'Current Deposit'=> 'Current Deposit A/c',
		// 'Fixed Deposit' => 'Fixed Deposit A/c',
		'Recurring Deposit'=> 'Recurring Deposit A/c',
	];
}
function channel_bank_type(){
	return [
		'Savings Deposit'=> 'Savings Deposit A/c',
		'Current Deposit'=> 'Current Deposit A/c',
		'Recurring Deposit'=> 'Recurring Deposit A/c',
	];
}
//
function franchise_entity_type(){
	return [
		'Partnership'=> 'Partnership',
		'Property'=> 'Property',
		'Private Limited'=> 'Private Limited',
		'Others'=> 'others',
	];
}
//

//
function admin_roles(){
	return [
		'ACC' => 'Accountant',
		'SA' => 'Sub Admin',
	];
}
function get_role_name_by_id($id){
	$allroles=array_merge(admin_roles(),franchise_roles());
	return $allroles[$id];
}
function Response($array,$print=false){
	if($print){
		echo json_encode($array);
	} else{
		return json_encode($array);
	}

}
function get_all_pages(){
	return [
	'lead/edit' => "Lead Request Edit", 
	'lead/add' => "Lead Request Add",
	'lead/index' => "Lead List",
	'user/add' => "User Add",
	'user/edit' => "User Edit",
	'user/index' => "User List",
	'customer/edit' => "Customer Edit", 
	'customer/add' => "Customer Add",
	'customer/index' => "Customer List", 

	'franchise/edit' => "Franchise Edit", 
	'franchise/add' => "Franchise Add",
	'franchise/index' => "Franchise List", 


	'channelpartner/edit' => "Channel Partner Edit", 
	'channelpartner/add' => "Channel Partner Add",
	'channelpartner/index' => "Channel Partner List", 
	];
}

function get_all_admin_pages(){
	$fr=get_all_pages();
	$admin=[
		'adminuser/add' => 'Admin User Add',
		'adminuser/edit' => 'Admin User Edit',
		'adminuser/index' => 'Admin User list',
		'setting/accesscontrol' => 'Restrict Access Control',
	];
	return array_merge($fr,$admin);
}
	
function is_accessisble(){
	$CI=get_instance();
	$class=$CI->router->fetch_class();
	$func= $CI->router->fetch_method();
	$cant_access=cant_access();
	$assign_role=$CI->user_data['assign_roles'];

	if($assign_role!='' && !empty($cant_access[$assign_role]) && in_array($class.'/'.$func,$cant_access[$assign_role])) die('You cant access this page');			
}
function is_accessisble_by_parmeter($class,$func){
		$CI=get_instance();
		$cant_access=cant_access();
		$assign_role=$CI->user_data['assign_roles'];
		if(!empty($cant_access[$assign_role]) && in_array($class.'/'.$func,$cant_access[$assign_role])) return false;
		return true;			
	}

function cmp($a, $b)
{
    return strcmp($a["loan_type_category"], $b["loan_type_category"]);
}

function set_parent_on_null(array $elements) {
    $branch = array();

    foreach ($elements as $keys => $element) {
        if ($element['loan_type_category'] == '') {
 			$elements[$keys]['loan_type_category']=$element['loan_type_id'];
        }
    }

    return $elements;
}


function check_old_password($old_password){
		$ci =&get_instance();
		$ci->load->model(['User_Model']);
		$old_password_hash = $ci->User_Model->password_encrypt($old_password);
		
		$ci->load->library(['form_validation']);
		$user=$ci->User_Model->get_row_where(['user_id' => $ci->user_data['user_id'],'password' => $old_password_hash]);
		if(!empty($user)){
			return true;
		} else {
			$ci->form_validation->set_message('oldpassword_check', 'Old password not match');
			return false;
		}
	}
function dashboard_link(){
		$ci=&get_instance();
		return "<a href='".site_url($ci->curent_user_level.'/dashboard')."'>Home</a>";
	}

function check_cibil_score(){
	return 6.64;
}	

	function verify_otp(){
	$ci =&get_instance();
	$sotp=$this->session->userdata('user_otp');
	if($sotp == $ci->input->post('entered_otp')) return true;
	return false;
}

function send_otp($phone){
	$ci =&get_instance();
	/*Your authentication key*/
	$authKey = MSG91_KEY;
	/*Multiple mobiles numbers separated by comma*/
	$mobileNumber = $phone;
	/*Sender ID,While using route4 sender id should be 6 characters long.*/
	$senderId = "ABCDEF";
	/*Your message to send, Add URL encoding here.*/
	$rndno=rand(1000, 9999);
	// $message = urlencode("OTP number.".$rndno);
	// /*Define route */
	// $route = "route=4";
	// /*Prepare you post parameters*/
	// $postData = array(
	// 'authkey' => $authKey,
	// 'mobiles' => $mobileNumber,
	// 'message' => $message,
	// 'sender' => $senderId,
	// 'route' => $route
	// );
	// /*API URL*/
	// $url="https://control.msg91.com/api/sendhttp.php";
	// /* init the resource*/
	// $ch = curl_init();
	// curl_setopt_array($ch, array(
	// CURLOPT_URL => $url,
	// CURLOPT_RETURNTRANSFER => true,
	// CURLOPT_POST => true,
	// CURLOPT_POSTFIELDS => $postData
	// /*,CURLOPT_FOLLOWLOCATION => true));*/
	// /*Ignore SSL certificate verification*/
	// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	// /*get response*/
	// $output = curl_exec($ch);
	// /*Print error if any*/
	// if(curl_errno($ch))
	// {
	// echo 'error:' . curl_error($ch);
	// }
	// curl_close($ch);
	$output=['status' => true,'msg' => "OTP sent successfully".$rndno];
	$ci->session->set_userdata('user_otp',$rndno);				
	Response($output,true);
		
	
}
function numberTowords($num)
{
	return "";
}