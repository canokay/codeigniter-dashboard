<?php
class UserApiModel extends CI_Model
{
    public $tableName = "user";
    public function __construct()
    {
        parent::__construct();
        
    }


    public function get($where = array())
    {
        return json_encode($this->db->where($where)->get($this->tableName)->row());
    }
    public function get_all($where = array())
    {
        return json_encode($this->db->where($where)->get($this->tableName)->result());
    }
    public function add($data = array())
    {
        return json_encode($this->db->insert($this->tableName, $data));
    }
    public function update($where = array(), $data = array())
    {
        return json_encode($this->db->where($where)->update($this->tableName, $data));
    }
    public function delete($where = array())
    {
        return json_encode($this->db->where($where)->delete($this->tableName));
    }
}
