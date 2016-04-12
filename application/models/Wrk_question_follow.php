<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 关注问题模型
 *
 * 2016-04
 * @author lvyun yunlxyz@163.com
 */
class Wrk_question_follow extends CI_Model{

  /**
   * 用户关注问题信息插入
   * Follow/follow_question 调用
   *
   * @param  string $follower        [description]
   * @param  date   $follow_time     [description]
   * @param  int    $follow_question [description]
   * @return array                   [description]
   */
  public function save_follow_question($follower , $follow_time , $follow_question){
    $sql = 'INSERT INTO wrk_question_follow(follower , follow_time , follow_question)
            VALUES (? , ? , ?)';
    $query = $this->db->query($sql , array($follower , $follow_time , $follow_question));
    return $query;
  }

  public function delete_follow_question($follower , $follow_question){
    $sql = 'DELETE FROM wrk_question_follow
            WHERE follower = ? AND follow_question = ?';
    $query = $this->db->query($sql , array($follower , $follow_question));
    return $query;
  }

  /**
   * 查询用户所有关注的问题
   * Follow/follow
   *
   * @param  string  $follower [description]
   * @return array             [description]
   */
  public function query_follow_question($follower){
    $sql = 'SELECT *
            FROM wrk_question_follow qf
            WHERE qf.follower = ?
            ORDER BY qf.follow_time DESC';
    $query = $this->db->query($sql , array($follower));
    return $query->result();
  }

  /**
   * 查找用户是否关注了问题
   * Index/judge_follow_question
   *
   * @param  int    $question_id [description]
   * @param  string $follower    [description]
   * @return array               [description]
   */
  public function query_judge_follow_question($question_id , $follower){
    $sql = 'SELECT *
            FROM wrk_question_follow q
            WHERE q.follow_question = ? AND q.follower = ?';
    $query = $this->db->query($sql , array($question_id , $follower));
    return $query->num_rows();
  }
}

?>
