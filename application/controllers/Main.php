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
                'user'  => $this->data['user'],
                'widgets' => $this->data['widgets']
            ]
        );

        $this->load->view( 'posts/view_posts',
            array
            (
                'posts' => $this->data['posts'],
                'sidebar' => $this->data['sidebar'],
                'categories' => $this->data['categories'],
                'widgets' => $this->data['widgets']
            )
        );
    }
}
