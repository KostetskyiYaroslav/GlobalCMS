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

    public function get_categories_posts_main($id = NULL, $single = FALSE)
    {
        $method = null;

        if($id != NULL)
        {
            $this->db->where('c.'.$this->primary_key, $id);
        }

        $this->db->select(
            '`p`.`id`  AS post_id
           , `p`.`title` AS post_title
           , `p`.`body` AS post_body
           , `p`.`author_id` AS post_author_id
           , `u`.`login` AS post_author_name
           , `p`.`attachment` AS post_attachment
           , `p`.`date` AS post_date
           , `p`.`tags` AS post_tags
           , `p`.`slug` AS post_slug
           , `p`.`category_id` AS category_id
           , `c`.`name` AS category_name'
        );
        $this->db->from('posts AS p');
        $this->db->join('users AS u'        , 'p.author_id = u.id'  );
        $this->db->join('categories AS c'   , 'c.id = p.category_id');

        $query = $this->db->get();

        $method =  ( $single  == TRUE) ? 'row' : 'result';

        return $query->$method();
    }

}