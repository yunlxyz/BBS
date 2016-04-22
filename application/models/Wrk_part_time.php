<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Wrk_part_time extends CI_Model{

  public function query_part_all($offset){
    $sql = 'SELECT *
            FROM wrk_part_time pt
            ORDER BY pt.publish_time
            DESC LIMIT ? , 15;';
    $query = $this->db->query($sql , array($offset));
    return $query->result();
  }

  public function query_part_signal($id){
    $sql = 'SELECT *
            FROM wrk_part_time pt
            WHERE pt.id = ?';
    $query = $this->db->query($sql , array($id));
    return $query->result();
  }

  public function save_part_info($publisher , $publish_time , $time , $contact_link , $contents , $title , $application){
    $sql = 'INSERT INTO wrk_part_time (publisher , publish_time , time , contact_link , contents , title , application)
            VALUES(? , ? , ? , ? , ? , ? , ?)';
    $query = $this->db->query($sql , array($publisher , $publish_time , $time , $contact_link , $contents , $title , $application));
    return $query;
  }
}
