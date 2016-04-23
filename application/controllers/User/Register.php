<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Register extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Basic_user');
		$this->load->library('session');
	}
 
	public function index(){
		$data['title'] = '注册';
		$this->load->view('User/login/register' , $data);
	}
	
	public function register(){
		$nickname = trim($this->input->post('nickname'));
		$account = trim($this->input->post('account'));
		$password = trim($this->input->post('password'));
		$password2 = trim($this->input->post('password2'));
		if(empty($nickname)||empty($account)||empty($password)||empty($password2)){
			echo json_encode(array('code'=>10001,'message'=>'请确认信息填写完整~'));
			exit;
		}
		if(strlen($password)<6||strlen($password)>20){
			echo json_encode(array('code'=>10001,'message'=>'密码长度要在6-20之间~'));
			exit;
		}
		if($password !== $password2){
			echo json_encode(array('code'=>10001,'message'=>'两次密码输入不同'));
			exit;
		}
		$res = $this->Basic_user->query_login($account);
		if($res->num_rows()>0){
			echo json_encode(array('code'=>10001,'message'=>'账号"'.$account.'"已被占用~'));
			exit;
		}
		$res = $this->Basic_user->get_info_by_nickname($nickname);
		if($res->num_rows()>0){
			echo json_encode(array('code'=>10001,'message'=>'昵称"'.$nickname.'"已被占用'));
			exit;
		}
		$password = md5($password);
		$res = $this->Basic_user->add_new_user($account,$password,$nickname);
		if($res > 0){
			echo json_encode(array('code'=>10000,'message'=>'注册成功,请登录'));
		}
	}


 
}