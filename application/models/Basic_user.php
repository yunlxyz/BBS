<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 用户信息类
 *
 * 2016-03
 * @author lvyun yunlxyz@163.com
 */
class Basic_user extends CI_Model{

  public function query_login($account){
    $sql = 'SELECT *
            FROM basic_user u
            WHERE u.account = ?';
    $query = $this->db->query($sql , array($account));
    return $query;
  }

  public function query_user_info($account){
    $sql = 'SELECT *
            FROM basic_user u
            WHERE u.account = ?';
    $query = $this->db->query($sql , array($account));
    return $query->result();
  }
}

?>
