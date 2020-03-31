<?php

class DashboardModel extends CI_Model
{

    public function get_notification_alerts()
    {
        return $this->db->limit(5)->order_by('id','desc')->get("notification")->result();
    }

    public function get_ticket_alerts()
    {
        return $this->db->limit(5)->order_by('id','desc')->get("ticket")->result();
    }
}
