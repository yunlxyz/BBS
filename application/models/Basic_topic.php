<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Basic_topic extends CI_Model
{
  public function query_topic_all(){
    $sql = 'SELECT *
            FROM basic_topic t
            ORDER BY t.topic_create_time
            DESC LIMIT 0 , 20';
    $query = $this->db->query($sql);
    return $query->result();
  }
}

?>
