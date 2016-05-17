<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->helper( ['url', 'form'] );

        $this->load->view( 'components/view_header',
            [
                'title' => 'Welcome',
                'auth'  => $this->data['auth'],
                'user'  => $this->data['user']
            ]
        );

        $this->load->view( 'view_main',
            array
            (
                'posts' => $this->data['posts']
            )
        );
    }
}
