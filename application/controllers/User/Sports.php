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
	$this->load->model('Wrk_sports_follow');
  }

  public function index(){
    if (isset($_SESSION['account'])) {
      $info['user'] = $_SESSION['nickname'];
      $info['title'] = '一起运动 - 沙湖';
      $this->load->view('user/template/header' , $info);
	  $data['fsport'] = $this->get_followed_sport();

      $data['list'] = $this->get_sports_info();
      $this->load->view('user/discuss/sports' , $data);
      $this->load->view('user/template/footer');
    }else {
      header('Location: ../Register/index');
    }
  }

  /**
   * 获取已经报名的运动
   */
  public function get_followed_sport(){
	  $res = $this->Wrk_sports_follow->get_fosp_by_account($_SESSION['account']);
	  $arr = array();
	  foreach($res as $val){
		  $arr[] = $val->follow_sport;
	  }
	  return $arr;
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
  /**
   * 获取某运动已经报名的名单
   */
  public function get_already_bm(){
	  $sport_id = $this->input->post('sport_id');
	  $res = $this->Wrk_sports_follow->get_fosp_by_sportid($sport_id);
	  echo json_encode($res);
  }

  /**
   * 我要报名
   */
  public function apply_sport(){
	$follow_sport = $this->input->post('sport_id');
    $follower = $_SESSION['account'];
    $follow_time = date('Y-m-d H:i:s' , time());
    $result = $this->Wrk_sports_follow->save_follow_sport($follower, $follow_sport, $follow_time);
    if($result > 0){
      $data['code'] = 20000; //关注成功
    }else {
      $data['code'] = 20001; //关注失败
    }
    echo json_encode($data);
  }
  
  /**
   * 取消报名
   */
   public function unapply_sport(){
	   	$follow_sport = $this->input->post('sport_id');
		$follower = $_SESSION['account'];
		$result = $this->Wrk_sports_follow->delete_follow_sport($follower, $follow_sport);
		if($result > 0){
		  $data['code'] = 20000; //取关成功
		}else {
		  $data['code'] = 20001; //取关失败
		}
		echo json_encode($data);
   }
}
