<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Part_time extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('Wrk_part_time');
  }

  public function index(){
    if (isset($_SESSION['account'])) {
      $info['user'] = $_SESSION['account'];
      $info['title'] = '兼职信息 - 沙湖';
      $this->load->view('user/template/header' , $info);

      $data['list'] = $this->get_part_info();
      $this->load->view('user/discuss/part_time' , $data);
      $this->load->view('user/template/footer');
    }else {
      header('Location: ../Login/index');
    }
  }

  public function get_part_info($page = 1){
    $offset = ($page-1)*15;
    $result = $this->Wrk_part_time->query_part_all($offset);
    return $result;
  }

  public function get_detail_part(){
    $id = $this->input->post('pid');
    $result = $this->Wrk_part_time->query_part_signal($id);
    if ($result != NULL) {
      $data['code'] = 10000;
      $data['info'] = $result;
    }else {
      $data['code'] = 10001;
    }
    echo json_encode($data);
  }

  public function add_part(){
    $publisher = $_SESSION['account'];
    $publish_time = date('Y-m-d H:i:s' , time());
    $time = $this->input->post('time');
    $contact_link = $this->input->post('contact_link');
    $contents = $this->input->post('contents');
    $title = $this->input->post('title');
    $application = $this->input->post('application');
    $result = $this->Wrk_part_time->save_part_info($publisher , $publish_time , $time , $contact_link , $contents , $title , $application);
    if ($result) {
      $data['code'] = 10000;
    }else {
      $data['code'] = 10001;
    }
    echo json_encode($data);
  }
}
