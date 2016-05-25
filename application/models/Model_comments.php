<?php

class Model_comments extends MY_Model
{
    protected $table_name = 'comments';
    protected $primary_key = 'id';
    protected $primary_filter = 'intval';
    protected $order_by = '';
    protected $rules = array();
    protected $timestamps = FALSE;

    public function __construct()
    {
        parent::__construct();
    }

    public function get_post_comments($post_id = NULL, $single = FALSE)
    {
        $method = ($single == FALSE) ? 'result' : 'row';

        $this->db->select
        (
            '`c`.`id`           AS comment_id
            ,`c`.`body`         AS comment_body
            ,`c`.`date`         AS comment_date
            ,`c`.`author_id`    AS comment_author_id
            ,`c`.`post_id`      AS comment_post_id
            ,`r`.`name`         AS user_role
            ,`u`.`login`        AS user_login'
        );
        $this->db->from('comments AS c');
        $this->db->join('users AS u', 'c.author_id = u.id'  );
        $this->db->join('roles AS r', 'r.id = u.role_id'  );

        if($post_id != NULL)
        {
            $this->db->where(['post_id' => $post_id]);
        }

        return $this->db->get()->$method();
    }

}