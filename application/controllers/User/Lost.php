<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Lost extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('Wrk_lost');
  }

  public function index(){
    if (isset($_SESSION['account'])) {
      $info['user'] = $_SESSION['nickname'];
      $info['title'] = '失物招领 - 沙湖';
      $this->load->view('user/template/header' , $info);

      $data['list'] = $this->lost_info();
      $this->load->view('user/discuss/lost_found' , $data);
      $this->load->view('user/template/footer');
    }else {
      header('Location: ../Register/index');
    }
  }

  /**
   * 查询所有的信息
   *
   * @return [type] [description]
   */
  public function lost_info(){
    $result = $this->Wrk_lost->query_lost_info();
    return $result;
  }

  /**
   * 新建丢失信息
   * 用户创建丢失物品信息
   *
   * @return [type] [description]
   */
  public function new_lost_info(){
    $lost_goods = $this->input->post('lost-goods');
    $lost_address = $this->input->post('lost-address');
    $lost_time = $this->input->post('lost-time');
    $contact = $this->input->post('contact');
    $publish_time = date('Y-m-d H:i:s' , time());
    $this->Wrk_lost->save_new_lost_info($lost_goods , $lost_address , $lost_time , $contact , $publish_time);
    $t['code'] = 10000;
    echo json_encode($t);
  }
}

?>
