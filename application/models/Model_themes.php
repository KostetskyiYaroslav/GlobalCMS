<?php

class Model_themes extends MY_Model
{

    protected $table_name = 'themes';
    protected $primary_key = 'id';
    protected $primary_filter = 'intval';
    protected $order_by = '';
    protected $rules = array();
    protected $timestamps = FALSE;

    public function __construct()
    {
        parent::__construct();
    }

    public function activate_theme($id)
    {
        $this->db->where(['activate' => '1']);
        $this->db->update($this->table_name, ['activate' => '0']);
        $this->save(['activate' => '1'], $id);
    }
}