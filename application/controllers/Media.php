<?php

class Media extends MY_Controller
{
    /**
     * Media constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view( 'components/view_header',
            [
                'title' => 'Posts',
                'auth'  => $this->data['auth'],
                'user'  => $this->data['user'],
                'widgets' => $this->data['widgets']
            ]
        );
        //TODO: view for display all media files
    }

    public function save()
    {
        $this->load->view( 'components/view_header',
            [
                'title' => 'Load Media file',
                'auth'  => $this->data['auth'],
                'user'  => $this->data['user'],
                'widgets' => $this->data['widgets']
            ]
        );
    }
}