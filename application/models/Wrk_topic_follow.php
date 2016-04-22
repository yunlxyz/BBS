<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 关注话题模型
 *
 * 2016-04
 * @author pansichen 905424343@qq.com
 */
class Wrk_topic_follow extends CI_Model{
	
	/**
	 *  关注话题
	 *
	 *
	 */
	public function save_follow_topic($follower, $follow_topic, $follow_time ){
		$sql = "INSERT INTO wrk_topic_follow(follower, follow_topic, follow_time)
				VALUES ('$follower', $follow_topic, '$follow_time')";
		$query = $this->db->query($sql);
		return $query;
	}
	
	/**
	 *  取消关注话题
	 *
	 */
	public function delete_follow_topic($follower, $follow_topic){
		$sql = "DELETE FROM wrk_topic_follow WHERE follower = '$follower' AND follow_topic = $follow_topic";
		$query = $this->db->query($sql);
		return $query;
	}
	
	/**
	 * 获取某用户关注的话题
	 *
	 */
	public function get_foto_by_account($follower){
		$sql = "SELECT follow_topic FROM wrk_topic_follow WHERE follower = '$follower'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
}