<?php

class Model_widgets extends MY_Model
{
    protected $table_name = 'widgets_act';
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

    public function get_widgets_abs($id = NULL, $single = FALSE )
    {
        if( $id != NULL )
        {
            $filter = $this->primary_filter;
            $id = $filter( $id );
            $this->db->where( $this->primary_key, $id );
            $method = 'row';

        } elseif ( $single == TRUE ) {

            $method = 'row';

        } else {

            $method = 'result';
        }

        return $this->db->get('widgets_abs')->$method();
    }

    public function get_widgets_abs_by( $where, $single = FALSE )
    {
        $this->db->where( $where );

        return $this->db->get( 'widgets_abs', $single )->result();
    }
}