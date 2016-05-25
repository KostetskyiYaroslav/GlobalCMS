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

    public function cabinet()
    {
        $data = array();
        $condition = TRUE;
        $login = $this->uri->segment(3);
        $password = $email = $role_id = $date_created = $message = '';
        $update_user = $this->Model_users->get_by(['login' => $this->data['user']->login], TRUE);

        $this->load->view('components/view_header',
            [
                'title' => 'Personal cabinet',
                'auth' => $this->data['auth'],
                'user' => $this->data['user']
            ]
        );

        if (isset($_POST['update-email'])) {
            $email = $password = $role_id = $date_created = $id = NULL;
            $id = $this->input->get_post('update-id');
            $email = $this->input->get_post('update-email');
            $password = $this->input->get_post('update-password');
            $role_id = $this->input->get_post('update-role-id');
            $date_created = $this->input->get_post('update-date');

            $data =
                [
                    'email' => $email,
                    'password' => $password,
                    'role_id' => $role_id,
                    'date_created' => $date_created
                ];

            $this->Model_users->save($data, $id);
            $message = 'User successfully updated!';
        }

        if (!empty($update_user)) {

            $update_user = $update_user[0];

        } else {

            $message = 'User dose not exist!';
        }

        $this->load->view('user/view_edit',
            [
                'cabinet_user' => $update_user,
                'message' => $message
            ]
        );
    }

}
