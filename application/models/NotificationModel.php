<?php

class NotificationModel extends CI_Model
{

    public $tableName = "notification";

    public function __construct()
    {
        parent::__construct();

    }

    public function get($where = array())
    {
        return $this->db->where($where)->get($this->tableName)->row();
    }

    public function get_all($where = array())
    {
        return $this->db->order_by('id','desc')->where($where)->get($this->tableName)->result();
    }

    public function add($data = array())
    {
        return $this->db->insert($this->tableName, $data);
    }

    public function update($where = array(), $data = array())
    {
        return $this->db->where($where)->update($this->tableName, $data);
    }

    public function delete($where = array())
    {
        return $this->db->where($where)->delete($this->tableName);
    }

    public function join($join = array(), $select = ""){
        $this->db->select($select);
        $this->db->from($this->tableName);
        $this->db->join($join["table"], $join["condition"]);
        return $this->db->get()->result();
	}
}