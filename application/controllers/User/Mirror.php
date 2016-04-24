<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Mirror extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
  }

  public function index(){
    if (isset($_SESSION['account'])) {
      $account = $_SESSION['account'];
      $info['user'] = $_SESSION['nickname'];
      $info['title'] = '未闻花名 的个人主页 - 沙湖';
      $this->load->view('user/template/header' , $info);
      $data['info'] = $this->user_info($account);
      $data['topic'] = $this->get_topci_follow($account);
      $data['answer'] = $this->get_answer_list($account);
      $this->load->view('User/mirror/mirror' , $data);
      $this->load->view('user/template/footer');
    }else {
      header('Location: ../Login/index');
    }
  }

  public function user_info($account){
    $this->load->model('Basic_user');
    $result = $this->Basic_user->query_user_info($account);
    // var_dump($result);
    return $result;
  }

  /**
   * 获取用户关注的话题
   *
   * @param  [type] $account [description]
   * @return [type]          [description]
   */
  public function get_topci_follow($account){
    $this->load->model('Wrk_topic_follow');
    $result = $this->Wrk_topic_follow->query_topic_follow($account);
    $data['count'] = count($result);
    $data['list'] = $result;
    return $data;
  }

  /**
   * 获取用户回答的问题
   *
   * @param  [type] $account [description]
   * @return [type]          [description]
   */
  public function get_answer_list($account){
    $this->load->model('Wrk_answer');
    $offset = 0;
    $result = $this->Wrk_answer->query_answer_by_account($account , $offset);
    // echo json_encode($result);
    return $result;
  }

  /**
   * 获取当前用户的的所有回答条数，用户展示翻页按钮
   *
   * @return [type] [description]
   */
  public function get_answer_count(){
    $this->load->model('Wrk_answer');
    $account = $_SESSION['account'];
    $result = $this->Wrk_answer->query_answer_count($account);
    $data['total'] = ceil($result[0]->count/10);
    echo json_encode($data);
  }

  public function get_answer_list2(){
    $this->load->model('Wrk_answer');
    $account = $_SESSION['account'];
    $page = $this->input->post('page');
    $offset = ($page-1)*10;
    $result = $this->Wrk_answer->query_answer_by_account($account , $offset);
    echo json_encode($result);
  }

}

?>
