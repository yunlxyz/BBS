<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Wrk_sports extends CI_Model{

  public function query_sports_info($rows , $offset){
    $sql = 'SELECT *
            FROM wrk_sports s
            ORDER BY s.publish_time DESC
            LIMIT ? , ?';
    $query = $this->db->query($sql , array($rows , $offset));
    return $query->result();
  }

  public function save_sports_info($sports_time , $sports_type , $contacts , $publisher ,$publish_time){
    $sql = 'INSERT INTO wrk_sports (sports_time , sports_type , contacts , publisher , publish_time)
            VALUES (? , ? , ? , ? , ?)';
    $query = $this->db->query($sql , array($sports_time , $sports_type , $contacts , $publisher ,$publish_time));
    return $query;
  }
}
