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

    public function view($where = NULL)
    {

        if($where == NULL)
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
        } else {

            $this->data['post'] = $this->Model_posts->get_post_by( ['slug' => $where], true );

            $this->load->view( 'components/view_header',
                [
                    'title' => 'Post',
                    'auth'  => $this->data['auth'],
                    'user'  => $this->data['user']
                ]
            );
            $this->load->view( 'posts/view_single_post',
                array
                (
                    'post' => $this->data['post']
                )
            );
        }
    }

    public function save()
    {
        $data = array
        (
            'title' => 'TitleInsertTest',
            'slug' => 'TitleInseasdasdasdasdasdasdasdasdasdrtTest',
            'body' => 'BodyInseasdasdrtTest',
            'author_id' => 1,
            'attachment' => '',
            'date' => date('Y-m-d H:i:s'),
            'tags' => 1,
            'category_id' => 1
        );

        $pages = $this->Model_posts->save($data, 3);
        var_dump($pages);
    }

    public function delete()
    {
        $id = 3;
        $this->Model_posts->delete($id);
    }
}