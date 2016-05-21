<?php

class Model_categories extends MY_Model
{
    protected $table_name = 'categories';
    protected $primary_key = 'id';
    protected $primary_filter = 'intval';
    protected $order_by = '';
    protected $rules = array();
    protected $timestamps = FALSE;

    public function __construct()
    {
        parent::__construct();
    }

    public function get_categories_posts($id = NULL, $single = FALSE)
    {
        $method = null;

        $this->db->select('posts.*');
        $this->db->from('categories');

        if($id != NULL)
        {
            $this->db->where($this->table_name.'.'.$this->primary_key, $id);
        }

        $this->db->join('posts', 'posts.category_id = categories.id');
        $query = $this->db->get();

        $method =  ( $single  == TRUE) ? 'row' : 'result';

        return $query->$method();
    }

}