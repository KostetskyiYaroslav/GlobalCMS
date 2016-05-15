<?php
class MY_Controller extends CI_Controller
{

    public $data = array();

    /**
     * MY_Controller constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->data['error'] = array();
        $this->data['site_name'] = config_item('site_name');
    }
}