<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Wrk_sports extends CI_Models{
  public function query_sports_info(){
    $sql = '';
    $query = $this->db->query($sql , array());
    return $query->result();
  }
}

?>
