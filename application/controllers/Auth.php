<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function sign_up()
    {
        $this->load->helper( ['url', 'form', 'security'] );

        #region Form Validation

        $this->load->library('form_validation');

        $this->form_validation->set_rules('login', 'Login', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[conf-password]');
        $this->form_validation->set_rules('conf-password', 'Confirmation Password', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        #endregion

        #region Header

        $this->load->view('components/view_header',
            [
                'title' => 'Sign Up',
                'auth' => $this->data['auth'],
                'user' => $this->data['user']
            ]
        );
        #endregion

        if ( isset($_POST['login']) )
        {
            $user = [];

            $user['login']      = $this->input->get_post('login');
            $user['password']   = $this->input->get_post('password');
            $user['password']   = do_hash( $user['password'] );
            $user['email']      = $this->input->get_post('email');

            if( $user['email'] == '')
            {
                $user['role_id'] = 5;

            } else {

                $user['role_id'] = 4;
            }

            $existing_user = $this->Model_users->get_by(array('login' => $user['login'] ));

            if( $existing_user == NULL && $this->form_validation->run() == TRUE )
            {
                $this->Model_users->save($user);
                $this->load->view('auth/view_success_reg');

            } elseif ( $this->form_validation->run() == FALSE ) {

                $this->load->view('auth/view_sing_up');

            } else {

                $this->load->view('auth/view_sing_up',
                    [
                        'error' => 'User already exist!'
                    ]
                );
            }

        } else {

            $this->load->view('auth/view_sing_up');
        }

    }

    public function login()
    {
        $this->load->helper( ['url', 'form', 'security'] );

        #region Header

        $this->load->view('components/view_header',
            [
                'title' => 'Log In',
                'auth' => $this->data['auth'],
                'user' => $this->data['user']
            ]
        );

        #endregion

        if( isset( $_COOKIE['CMS_login'] ) )
        {
            $this->load->view('view_main');

        } elseif ( isset( $_POST['login'] ) ) {

            $login      = $this->input->get_post('login');
            $password   = $this->input->get_post('password');
            $password   = do_hash( $password );
            $remember   = $this->input->get_post('remember');

            $user = $this->Model_users->get_by(array('login' => $login), true );

            if ( !empty($user) && $user[0]->password == $password ) {

                $this->input->set_cookie('login', $login, 804604, config_item('domain'), '/', 'CMS_');

                if($remember == 'on')
                    $this->input->set_cookie('remember', 'Yes', 804604, config_item('domain'), '/', 'CMS_');
                else
                    $this->input->set_cookie('remember', 'No', 804604, config_item('domain'), '/', 'CMS_');

                redirect('main');

            } else {

                $this->load->view('auth/view_login',
                    [
                        'error' => 'Login / Password is not correct!'
                    ]
                );
            }

        } else {

            $this->load->view('auth/view_login');
        }

    }

    public function logout()
    {
        $this->load->helper(['url', 'form', 'cookie']);

        if ( isset( $_COOKIE['CMS_login'] ) )
        {
            delete_cookie('login', config_item('domain'), '/', 'CMS_');
            delete_cookie('remember', config_item('domain'), '/', 'CMS_');

            redirect('main');

        } else {

            redirect('main');
        }

    }

}
