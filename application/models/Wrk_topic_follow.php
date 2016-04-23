<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * ��ע����ģ��
 *
 * 2016-04
 * @author pansichen 905424343@qq.com
 */
class Wrk_topic_follow extends CI_Model{

	/**
	 *  ��ע����
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
	 *  ȡ����ע����
	 *
	 */
	public function delete_follow_topic($follower, $follow_topic){
		$sql = "DELETE FROM wrk_topic_follow WHERE follower = '$follower' AND follow_topic = $follow_topic";
		$query = $this->db->query($sql);
		return $query;
	}

	/**
	 * ��ȡĳ�û���ע�Ļ���
	 *
	 */
	public function get_foto_by_account($follower){
		$sql = "SELECT follow_topic FROM wrk_topic_follow WHERE follower = '$follower'";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function query_topic_follow($follower){
		$sql = 'SELECT t.*
						FROM wrk_topic_follow tf
							INNER JOIN basic_topic t ON tf.follow_topic = t.id
						WHERE tf.follower = ?';
		$query = $this->db->query($sql , array($follower));
		return $query->result();
	}

}
