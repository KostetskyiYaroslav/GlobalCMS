<?php

class Themes extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if($this->data['user'] == null || $this->data['user']->role->id > 4)
        {
            redirect('/');
        }
        $this->load->helper('form');
    }

    function index()
    {
        $this->load->view('components/view_header',
            [
                'title' => 'Single Settings',
                'auth' => $this->data['auth'],
                'user' => $this->data['user'],
                'widgets' => $this->data['widgets']
            ]
        );

        $this->load->view('themes/view_themes',
            [
                'title' => 'Widgets Locations',
                'auth' => $this->data['auth'],
                'user' => $this->data['user'],
                'categories' => $this->data['categories'],
                'widgets' => $this->data['widgets'],
                'themes' => $this->data['themes']
            ]
        );
    }

    function activate($id)
    {
        $this->Model_themes->save(['activate' => '1'], $id);
        redirect('/themes');
    }

    function edit($id)
    {
        $data = array();
        $condition = TRUE;
        $message = NULL;
        $update_theme = $this->Model_themes->get($id, true);

        $this->load->view('components/view_header',
            [
                'title' => 'Theme edit',
                'auth' => $this->data['auth'],
                'user' => $this->data['user'],
                'widgets' => $this->data['widgets']
            ]
        );

        if (isset($_POST['update-theme-id']))
        {
            $name = $path = $author = $description = $screensot = NULL;

            if(isset($_POST['update-theme-name']) && $_POST['update-theme-name'] != '')
            {
                $name = $this->input->get_post('update-theme-name');
            } else
            {
                $name = $update_theme->name;
            }
            if(isset($_POST['update-theme-path']) && $_POST['update-theme-path'] != '')
            {
                $path = $this->input->get_post('update-theme-path');
            } else
            {
                $path = $update_theme->path;
            }
            if(isset($_POST['update-theme-author']) && $_POST['update-theme-author'] != '')
            {
                $author = $this->input->get_post('update-theme-author');
            } else
            {
                $author = $update_theme->author;
            }
            if(isset($_POST['update-theme-description']) && $_POST['update-theme-description'] != '')
            {
                $description = $this->input->get_post('update-theme-description');
            } else
            {
                $description = $update_theme->description;
            }
            if(isset($_POST['update-theme-screenshot']) && $_POST['update-theme-screenshot'] != '')
            {
                $screenshot = $this->input->get_post('update-theme-screenshot');
            } else
            {
                $screenshot = $update_theme->screenshot;
            }

            $data = [
                'name'          => $name,
                'path'          => $path,
                'author'        => $author,
                'description'   => $description,
                'screenshot'    => $screenshot
            ];

            $this->Model_themes->save($data, $id);
            $message = 'Theme successfully updated!';
        }

        if(empty($update_theme))
        {
            $message = 'Theme dose not exist!';
        }

        $this->load->view('themes/view_edit',
            [
                'auth' => $this->data['auth'],
                'user' => $this->data['user'],
                'categories' => $this->data['categories'],
                'widgets' => $this->data['widgets'],
                'update_theme' => $update_theme,
                'message'   => $message
            ]
        );

    }

    function delete($id)
    {
        $this->Model_themes->delete($id);
        redirect('/themes');
    }

}