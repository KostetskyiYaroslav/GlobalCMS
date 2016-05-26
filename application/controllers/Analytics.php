<?php

class Analytics extends  MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        if ($this->data['auth'] == FALSE || $this->data['user']->role->access_lvl <= 5) {
            redirect('/');
        }
    }
    
    public function index()
    {
        $this->load->view('components/view_header',
            [
                'title' => 'Analytics',
                'auth' => $this->data['auth'],
                'user' => $this->data['user']
            ]
        );

        $analytics = null;

        $analytics['posts'] = $this->Model_posts->get_analytics('posts');
        $analytics['roles'] = $this->Model_users->get_analytics('roles');
        $analytics['users'] = $this->Model_users->get_analytics('users');
        $analytics['comments']  = $this->Model_comments->get_analytics('comments');
        $analytics['settings']  = $this->Model_settings->get_analytics('settings');
        $analytics['templates'] = $this->Model_templates->get_analytics('templates');
        $analytics['categories']    = $this->Model_categories->get_analytics('categories');
        $analytics['confirmation']  = $this->Model_users->get_analytics('confirmation');

        $this->load->view('analytics/view_analytics',['analytics' => $analytics]);
    }

}