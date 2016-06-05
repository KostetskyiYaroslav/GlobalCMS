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
            $id     = $filter( $id );
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

    public function save_get_widgets_abs($data, $id = NULL)
    {
        if($this->timestamps == TRUE)
        {
            $now = date('Y-m-d H:i:s');
            $id || $data['created'] = $now;
            $data['modified'] = $now;
        }

        if($id == NULL)
        {
            !isset($data[$this->primary_key]) || $data[$this->primary_key] = NULL;
            $this->db->set($data);
            $this->db->insert('widgets_abs');
            $id = $this->db->insert_id();
        }

        else
        {
            $filter = $this->primary_filter;
            $id = $filter($id);
            $this->db->set($data);
            $this->db->where($this->primary_key, $id);
            $this->db->update('widgets_abs');
        }

        return $id;
    }
}