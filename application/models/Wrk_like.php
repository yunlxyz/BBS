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
}

?>
