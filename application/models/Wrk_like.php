<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Wrk_like extends CI_Model{
  public function query_like_answwer_people($answer_id){
    $sql = 'SELECT l.*
            FROM wrk_like l
            WHERE l.answer_id = ?
            ORDER BY l.like_time
            DESC LIMIT 0 , 3';
    $query = $this->db->query($sql , array($answer_id));
    $count_sql = 'SELECT count(l.id) as count_like
                  FROM wrk_like l
                  WHERE l.answer_id = ?';
    $count_query = $this->db->query($count_sql , array($answer_id));
    $result['like'] = $query->result();
    $result['total'] = $count_query->result();
    return $result;
  }

  public function query_like_people($answer_id){
    $sql = 'SELECT *
            FROM wrk_like l
            WHERE l.answer_id = ?
            ORDER BY l.like_time DESC
            LIMIT 0 , 3';
    $query = $this->db->query($sql , array($answer_id));
    return $query->result();
  }

  public function query_judge_like($answer_id , $account){
    $sql ='SELECT COUNT(*) AS total
           FROM wrk_like l
           WHERE l.answer_id = ? AND l.liker = ?';
    $query = $this->db->query($sql , array($answer_id , $account));
    return $query->result();
  }

  public function save_like($answer_id , $liker , $like_time){
    $sql = 'INSERT INTO wrk_like (answer_id , liker , like_time)
            VALUES(? , ? , ?)';
    $query = $this->db->query($sql , array($answer_id , $liker , $like_time));
    return $query;
  }

  public function delete_like($answer_id , $liker){
    $sql = 'DELETE FROM wrk_like
            WHERE answer_id = ? AND liker = ?';
    $query = $this->db->query($sql , array($answer_id , $liker));
    return $query;
  }

}

?>
