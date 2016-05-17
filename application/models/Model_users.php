<?php

class Model_users extends MY_Model
{
    protected $table_name = 'users';
    protected $primary_key = 'id';
    protected $primary_filter = 'intval';
    protected $order_by = '';
    protected $rules = array();
    protected $timestamps = FALSE;

    public function __construct()
    {
        parent::__construct();
    }

    public function get_role_name($where)
    {
        $this->db->select('roles.name');
        $this->db->from('users');
        $this->db->where($where);
        $this->db->order_by($this->order_by);

        $this->db->join('roles', 'roles.id = users.role_id');

        $query = $this->db->get();

        return $query->row();
    }

    public function get_role($where)
    {
        $this->db->select('roles.*');
        $this->db->from('users');
        $this->db->where($where);
        $this->db->order_by($this->order_by);

        $this->db->join('roles', 'roles.id = users.role_id');

        $query = $this->db->get();

        return $query->row();
    }

    public function get_users( $id = NULL, $single = FALSE )
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
            '`u`.`id`  AS id
           , `u`.`login` AS login
           , `u`.`password` AS password
           , `u`.`email` AS email
           , `u`.`role_id` AS role_id
           , `r`.`name` AS role_name
           , `r`.`access_lvl` AS role_access_lvl'
        );
        $this->db->from('users AS u');
        $this->db->join('roles AS r', 'r.id = u.role_id'  );

        return $this->db->get()->$method();
    }


}