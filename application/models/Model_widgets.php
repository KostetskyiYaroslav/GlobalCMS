<?php

class Model_widgets extends MY_Model
{
    protected $table_name = 'widgets';
    protected $primary_key = 'id';
    protected $primary_filter = 'intval';
    protected $order_by = '';
    protected $rules = array();
    protected $timestamps = FALSE;

    public function __construct()
    {
        parent::__construct();
    }

    public function get_available()
    {
        $this->db->group_by('name');
        return $this->db->get($this->table_name)->result();
    }
}