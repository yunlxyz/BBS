<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 主页类，首页渲染
 * 主要用于主页的显示
 *
 * 2016-03
 * @author lvyun yunlxyz@163.com
 */
class Index extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('Wrk_like');
  }

  /**
   * 首页渲染
   */
  public function index(){
    if (isset($_SESSION['account'])) {
      $info['title'] = '首页 - 沙湖社区';
      $info['user'] = $_SESSION['account'];
      $this->load->view('user/template/header' , $info);
      $result['data'] =$this->query_question();
      $this->load->view('user/index' , $result);
      $this->load->view('user/template/footer');
    }else {
      header('Location: index.php/User/Register/index');
    }
  }

  public function get_question_list(){
    $page = $this->input->get('page');
    $result = $this->query_question($page);
    // var_dump($result);
    // var_dump($page);
    echo json_encode($result);
  }
  /**
   * 首页问题查询
   * 首页问题显示，显示当前活跃的问题，以及当前问题中点赞数最多的回答
   *
   * @return array $data [description]
   */
  public function query_question($page = 1){
    $this->load->model('Wrk_question');
    $offset = ($page - 1)*10;
    $data = array();
    $i = 0;
    $result = $this->Wrk_question->query_question($offset); //查询问题，每页显示15条
    foreach ($result as $key => $value) {
        $hottest_answer = $this->query_hottest_answer((int)$value->id); //查询点赞数最多的回答，value->id 指问题ID
        $data[$i]['question'] = (array)$value; //问题数组
        $data[$i]['answer'] = (array)$hottest_answer[0]; //回答列表
        $data[$i]['like'] = $this->like_answer_people($hottest_answer[0]->id);
        $tmp_count = $this->judge_follow_question((int)$value->id); //查询用户是否已经关注问题
        if ($tmp_count > 0) { //标记用户是否已经关注问题
          $data[$i]['mark'] = 1;  //用户已经关注问题
        }else {
          $data[$i]['mark'] = 0;  //用户没有关注问题
        }
        $i ++;
    }
    return $data;
  }

  /**
   * 查询首页中点赞数最多的问题的评论
   *
   * @param  int  $question_id [description]
   * @return array             [description]
   */
  public function query_hottest_answer($question_id){
    $this->load->model('Wrk_answer');
    return $this->Wrk_answer->query_hottest_answer($question_id);
  }

  /**
   * 判断用户是否关注了问题
   * 如果用户关注了，则返回值大于0，如没有关注则等于0
   *
   * @param  int    $question_id [description]
   * @return int                 [description]
   */
  public function judge_follow_question($question_id){
    $this->load->model('Wrk_question_follow');
    $follower = $_SESSION['account'];
    $result = $this->Wrk_question_follow->query_judge_follow_question($question_id , $follower);
    return $result;
  }

  /**
   * 查看当前答案点赞的人数
   * 根据答案ID查询所有点赞人数
   *
   * @param  [type] $answer_id [description]
   * @return [type]            [description]
   */
  public function like_answer_people($answer_id){
    $result = $this->Wrk_like->query_like_answwer_people($answer_id);
    $result['like'] = $result['like'];
    $result['total'] = $result['total'];
    return $result;
  }

  /**
   * 回答点赞
   *
   */
  public function add_like(){
    $answer_id = $this->input->post('answer_id');
    $liker = $_SESSION['account'];
    $like_time = date('Y-m-d H:i:s' , time());
    $result = $this->Wrk_like->save_like($answer_id , $liker , $like_time);
    if ($result) {
      $data['code'] = 10000;
    }else {
      $data['code'] = 10001;
    }
    echo json_encode($data);
  }
}

?>
