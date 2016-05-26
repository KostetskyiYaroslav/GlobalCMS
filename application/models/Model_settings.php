<?php

class Model_settings extends MY_Model
{
    protected $table_name = 'settings';
    protected $primary_key = 'id';
    protected $primary_filter = 'intval';
    protected $order_by = '';
    protected $rules = array();
    protected $timestamps = FALSE;

    public function __construct()
    {
        parent::__construct();
    }

}