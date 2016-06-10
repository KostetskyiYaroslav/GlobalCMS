<?php

class Navigation extends MY_Controller
{
    /**
     * Navigation constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
    }

    public function index()
    {
        $this->load->view('components/view_header',
            [
                'title' => 'Navigation Editor',
                'auth' => $this->data['auth'],
                'user' => $this->data['user'],
                'widgets' => $this->data['widgets']
            ]
        );
        $this->load->view('settings/navigation/view_navigation',
            [
                'navigation'    => $this->data['navigation'],
                'posts'         => $this->data['posts']
            ]
        );
    }

    public function save()
    {
        $message = '';

        if(isset($_POST['save-navigation-name']) && isset($_POST['save-navigation-link']))
        {
            $item_name = $this->input->get_post('save-navigation-name');
            $item_link  = $this->input->get_post('save-navigation-link');
            $item_priority  = $this->input->get_post('save-navigation-priority');

            $data =
                [
                    'name'      => $item_name       ,
                    'link'      => $item_link       ,
                    'priority'  => $item_priority
                ];

            $this->Model_navigation->save($data);
            $message = 'Item was successfully added!';
            redirect('/navigation');
        }

        $this->load->view('components/view_header',
            [
                'title' => 'Navigation Editor',
                'auth' => $this->data['auth'],
                'user' => $this->data['user'],
                'widgets' => $this->data['widgets']
            ]
        );
        $this->load->view('settings/navigation/view_save',
            [
                'message' => $message,
                'posts'   => $this->data['posts']
            ]
        );
    }

    public function delete($id)
    {
        $this->Model_navigation->delete($id);
        redirect('/navigation');
    }

    public function edit($id)
    {
        $data       = array();
        $condition  = TRUE;
        $message    = NULL;
        $nav_item   = $this->Model_navigation->get($id, TRUE);

        $this->load->view( 'components/view_header',
            [
                'title' => 'Edit Nav Item',
                'auth'  => $this->data['auth'],
                'user'  => $this->data['user']
            ]
        );

        if(isset($_POST['update-navigation-id']))
        {
            $name = $link = $priority = NULL;

            if(isset($_POST['update-navigation-name']) && $_POST['update-navigation-name'] != '')
            {
                $name = $this->input->get_post('update-navigation-name');

            } else {

                $name = $nav_item->name;
            }
            if(isset($_POST['update-navigation-link']) && $_POST['update-navigation-link'] != '')
            {
                $link = $this->input->get_post('update-navigation-link');

            } else {

                $link = $nav_item->link;
            }
            if(isset($_POST['update-navigation-priority']) && $_POST['update-navigation-priority'] != '')
            {
                $priority = $this->input->get_post('update-navigation-priority');

            } else {

                $priority = $nav_item->priority;
            }

            $data = [
                'name'      => $name,
                'link'      => $link,
                'priority'  => $priority
            ];

            $this->Model_navigation->save($data, $id);
            $message = 'Item was successfully updated!';

            redirect('/navigation/edit/'.$id);
        }

        if(empty($nav_item))
        {
            $message = 'Item dose not exist!';
            redirect('/navigation');
        }

        $this->load->view('settings/navigation/view_edit',
            [
                'item'      => $nav_item,
                'posts'   => $this->data['posts'],
                'message'   => $message
            ]
        );
    }

}