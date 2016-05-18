<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
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

    public function single($login)
    {
        $single_user = $this->Model_users->get_users_by(['login' => $login], TRUE);

        $this->load->view( 'components/view_header',
            [
                'title' => 'Single User',
                'auth'  => $this->data['auth'],
                'user'  => $this->data['user']
            ]
        );

        $this->load->view('user/view_single',
            array
            (
                'current_user'  => $this->data['user'],
                'single_user'  => $single_user
            )
        );

    }

}
