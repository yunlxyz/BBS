<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class News extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('Wrk_news');
    $this->load->library('session');
  }

  public function index(){
    if (isset($_SESSION['account'])) {
      $info['user'] = $_SESSION['account'];
      $info['title'] = '发现,每天不一样的湖大 - 沙湖';
      $this->load->view('user/template/header' , $info);

      $result['news'] = $this->news_latest();
      $this->load->view('user/news/news' , $result);
      $this->load->view('user/template/footer');
    }else {
      header('Location: ../Register/index');
    }
  }

  /**
   * 获取新闻信息
   * @return [type] [description]
   */
  public function news_latest(){
    $result = $this->Wrk_news->query_news_latest();
    return $result;
  }

  public function get_news_signal(){
    $news_id = $this->input->post('news_id');
    $result = $this->Wrk_news->query_news_signal($news_id);
    if(count($result) > 0){
      $data['code'] = 10000;
      $data['news'] = $result;
    }else {
      $data['code'] = 10001;
      $data['news'] = '';
    }
    // var_dump($result);
    echo json_encode($data);
  }
}

?>
