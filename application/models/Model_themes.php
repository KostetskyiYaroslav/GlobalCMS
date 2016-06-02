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

}