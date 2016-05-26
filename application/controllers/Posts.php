<?php

class Posts extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['form']);
    }

    public function index()
    {
        $this->load->view( 'components/view_header',
            [
                'title' => 'Posts',
                'auth'  => $this->data['auth'],
                'user'  => $this->data['user']
            ]
        );
        $this->load->view( 'posts/view_posts',
            array
            (
                'posts' => $this->data['posts']
            )
        );
    }

    public function view($id = NULL)
    {
        $this->load->helper( ['url', 'form'] );

        $this->load->view( 'components/view_header',
            [
                'title' => 'Welcome',
                'auth'  => $this->data['auth'],
                'user'  => $this->data['user']
            ]
        );

        if($id == NULL)
        {
            $this->load->view( 'view_main',
                array
                (
                    'posts' => $this->data['posts']
                )
            );

        } else {

            $single_post = $this->Model_posts->get_posts($id, TRUE);
            $single_post->comments    = $this->Model_comments->get_post_comments($single_post->post_id);

            $this->load->view('posts/view_single',
                array
                (
                    'current_user'  => $this->data['user'],
                    'single_post'  => $single_post
                )
            );
        }
    }

}