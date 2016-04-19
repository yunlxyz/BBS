<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Sports extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('Wrk_sports');
  }

  public function index(){
    if (isset($_SESSION['account'])) {
      $info['user'] = $_SESSION['account'];
      $info['title'] = '一起运动 - 沙湖';
      $this->load->view('user/template/header' , $info);

      $data['list'] = $this->get_sports_info();
      $this->load->view('user/discuss/sports' , $data);
      $this->load->view('user/template/footer');
    }else {
      header('Location: ../Login/index');
    }
  }

  public function get_sports_info(){
    $rows = 0;
    $offset = 15;
    $result = $this->Wrk_sports->query_sports_info($rows , $offset);
    return $result;
    // var_dump($result);
  }

  /**
   * 添加新运动信息
   *
   *
   */
  public function add_sports_info(){
    $sports_time = $this->input->post('sports_time');
    $sports_type = $this->input->post('sports_type');
    $contacts = $this->input->post('contacts');
    $publisher = $_SESSION['account'];
    $publish_time = date('Y-m-d H:i:s' , time());

    $result = $this->Wrk_sports->save_sports_info($sports_time , $sports_type , $contacts , $publisher ,$publish_time);
    if ($result) {
      $data['code'] = 10000;
    }else {
      $data['code'] = 10001;
    }
    echo json_encode($data);
  }

}
