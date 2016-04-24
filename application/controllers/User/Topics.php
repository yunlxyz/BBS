<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Topics extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('Basic_topic');
    $this->load->library('session');
	$this->load->model('Wrk_topic_follow');
	$this->load->model('Wrk_question');
  }

  public function index(){
    if (isset($_SESSION['account'])) {
      $info['user'] = $_SESSION['nickname'];
      $info['title'] = '话题广场 - 沙湖';
      $this->load->view('user/template/header' , $info);
	    $res = $this->Wrk_topic_follow->get_foto_by_account($_SESSION['account']);
  	  $arr = array();
  	  foreach($res as $value){
  		  $arr[] = $value->follow_topic;
  	  }
	    $result['ftopic'] = $arr;
      $result['topic'] = $this->topic_all();
      $this->load->view('user/question/topics' , $result);
      $this->load->view('user/template/footer');
    }else {
      header('Location: ../Register/index');
    }
  }

  public function topic_all(){
    $result = $this->Basic_topic->query_topic_all();
    return $result;
  }

  public function follow_topic(){
	$follow_topic = $this->input->post('topic_id');
    $follower = $_SESSION['account'];
    $follow_time = date('Y-m-d H:i:s' , time());
    $result = $this->Wrk_topic_follow->save_follow_topic($follower, $follow_topic, $follow_time);
    if($result > 0){
      $data['code'] = 20000; //关注成功
    }else {
      $data['code'] = 20001; //关注失败
    }
    echo json_encode($data);
  }

	public function unfollow_topic(){
		$follow_topic = $this->input->post('topic_id');
		$follower = $_SESSION['account'];
		$result = $this->Wrk_topic_follow->delete_follow_topic($follower, $follow_topic);
		if($result > 0){
			$data['code'] = 20000;//取关成功
		}else{
			$data['code'] = 20001;//取关失败
		}
		echo json_encode($data);

	}
	
	public function topic_list($topic_id){
	if (isset($_SESSION['account'])) {
      $info['user'] = $_SESSION['nickname'];
      $info['title'] = '话题列表 - 沙湖';
      $this->load->view('user/template/header' , $info);
	  $res = $this->Wrk_question->query_topic_question($topic_id);
	  $topic_title = $this->Basic_topic->get_topic_by_id($topic_id);
	  $data['list'] = $res;
	  $data['topic_title'] = $topic_title;
	  $this->load->view('user/question/topics_list',$data);
      $this->load->view('user/template/footer');
    }else {
      header('Location: ../Register/index');
    }
	}
	
	
}

?>
