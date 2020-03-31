<?php

class DashboardModel extends CI_Model
{

    public function get_notification_alerts()
    {
        return $this->db->limit(5)->order_by('id','desc')->get("notification")->result();
    }

    public function get_ticket_alerts()
    {
        $this->db->select("ticket.id, ticket.title, user.username, ticket.created_at");
        $this->db->from("ticket");
        $this->db->join("user", "user.id = ticket.user_id");
        $this->db->order_by('ticket.id','desc');
        return $this->db->get()->result();
    }
}
