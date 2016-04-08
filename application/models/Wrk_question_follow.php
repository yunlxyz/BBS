<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Wrk_question_follow extends CI_Model{

  public function save_follow_question($follower , $follow_time , $follow_question){
    $sql = 'INSERT INTO wrk_question_follow(follower , follow_time , follow_question)
            VALUES (? , ? , ?)';
    $query = $this->db->query($sql , array($follower , $follow_time , $follow_question));
    return $query;
  }

  public function query_follow_question($follower){
    $sql = 'SELECT *
            FROM wrk_question_follow qf
            WHERE qf.follower = ?
            ORDER BY qf.follow_time DESC';
    $query = $this->db->query($sql , array($follower));
    return $query->result();
  }
}

?>
