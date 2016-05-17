<?php

class Model_posts extends MY_Model
{
    protected $table_name = 'posts';
    protected $primary_key = 'id';
    protected $primary_filter = 'intval';
    protected $order_by = '';
    protected $rules = array();
    protected $timestamps = FALSE;

    public function __construct()
    {
        parent::__construct();
    }
    
    public function get_posts( $id = NULL, $single = FALSE )
    {
        if( $id != NULL )
        {
            $filter = $this->primary_filter;
            $id     = $filter( $id );
            $method = 'row';

            $this->db->where( $this->primary_key, $id );

        } elseif ( $single == TRUE ) {

            $method = 'row';

        } else {

            $method = 'result';
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
        $this->db->from('users AS u');
        $this->db->join('posts AS p'        , 'p.author_id = u.id'  );
        $this->db->join('categories AS c'   , 'c.id = p.category_id');

        return $this->db->get()->$method();
    }

    public function get_post_by( $where , $single = FALSE )
    {
        if( $single == TRUE  )
        {
            $method = 'row';


        } else {

            $method = 'result';
        }

        $this->db->where( $where );

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
        $this->db->from('users AS u');
        $this->db->join('posts AS p'        , 'p.author_id = u.id'  );
        $this->db->join('categories AS c'   , 'c.id = p.category_id');

        return $this->db->get()->$method();
    }

}