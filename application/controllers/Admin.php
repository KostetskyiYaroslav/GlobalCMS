<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper( ['url', 'form'] );
        if( $this->data['auth'] == FALSE || $this->data['user']->role->access_lvl <= 5)
        {
            redirect(base_url());
        }
    }

    public function index()
    {

    }

    public function dashboard($menu)
    {
        $this->load->view( 'components/view_header',
            [
                'title' => 'Welcome',
                'auth'  => $this->data['auth'],
                'user'  => $this->data['user']
            ]
        );
        switch ($menu)
        {
            case 'users':
                $this->load->view('menu/view_'.$menu, ['users' => $this->data['users']]);
                break;

            case 'posts':
                $this->load->view('menu/view_'.$menu, ['posts' => $this->data['posts']]);
                break;

            case 'pages':
                $this->load->view('menu/view_'.$menu, ['pages' => $this->data['pages']]);
                break;

            case 'comments':
                $this->load->view('menu/view_'.$menu, ['comments' => $this->data['comments']]);
                break;

            default:
                break;
        }
    }

}
