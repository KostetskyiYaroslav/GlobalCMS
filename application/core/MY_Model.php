<?php

class MY_Model extends CI_Model
{
    protected $table_name = '';
    protected $primary_key = 'id';
    protected $primary_filter = 'intval';
    protected $order_by = '';
    protected $rules = array();
    protected $timestamps = FALSE;

    /**
     * MY_Model constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function  get( $id, $single = FALSE )
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

        if( !count( $this->db->ar_orderby ) )
        {
            $this->db->order_by( $this->order_by );
        }

        return $this->db->get( $this->table_name )->$method();
    }

    public function  get_by( $where, $single = FALSE )
    {
        $this->db->where( $where );

        return $this->db->get( NULL, $single );
    }
    
    public function  save(){}
    public function  delete(){}
}