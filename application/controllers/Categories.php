<?php

class Categories extends MY_Controller
{

    public function index()
    {
        
    }

    public function view($id = NULL)
    {
        $this->load->helper( ['url', 'form'] );

        $this->load->view( 'components/view_header',
            [
                'title' => 'Category',
                'auth'  => $this->data['auth'],
                'user'  => $this->data['user'],
                'widgets' => $this->data['widgets']

            ]
        );

        if($id == NULL)
        {
            $this->load->view( 'categories/view_categories',
                array
                (
                    'categories' => $this->data['categories'],
                    'widgets' => $this->data['widgets']
                )
            );
            
        } else {

            $category_posts = $this->Model_categories->get_categories_posts_main($id);

            $this->load->view('posts/view_posts',
                array
                (
                    'current_user' => $this->data['user'],
                    'posts' => $category_posts,
                    'categories' => $this->data['categories'],
                    'widgets' => $this->data['widgets']
                )
            );
        }
    }

}