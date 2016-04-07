<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Login extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('Basic_user');
    $this->load->library('session');
  }

  public function index(){
    $data['title'] = '沙湖 － 带你遨游湖大，走向不一样的世界';
    $this->load->view('User/login/login' , $data);
  }

  /**
   * 用户登录
   *
   * @return [type] [description]
   */
  public function login(){
    $account = $this->input->post('account');
    $password = $this->input->post('password');

    $query = $this->Basic_user->query_login($account);
    if ($query->num_rows() > 0) {
      $tmp = $query->result();
      if ($tmp[0]->password == $password) {
        $data['code'] = 10000; //登录成功
        $session_array = array('account' => $account , 'logged_in' => TRUE);
        $this->session->set_userdata($session_array);
      }else {
        $data['code'] = 10001; //登录失败，密码错误
      }
    }else {
      $data['code'] = 10002; //登录失败，用户不存在
    }
    echo json_encode($data);
  }

  /**
   * 用户注销
   *
   * @return [type] [description]
   */
  public function loggout(){
    unset($_SESSION['account']);
    header('Location: ../Login/index');
  }
}

?>
