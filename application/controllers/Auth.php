<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller
{
    private $domain = NULL;
    public function __construct()
    {
        parent::__construct();
        $this->domain = $this->Model_settings->get_by(['name' => 'domain'], true)[0]->value;
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

            $user['login']          = $this->input->get_post('login');
            $user['password']       = $this->input->get_post('password');
            $user['password']       = do_hash( $user['password'] );
            $user['email']          = $this->input->get_post('email');
            $user['date_created']   = date('Y-m-d H:i:s');
            $user['role_id'] = 5;

            $existing_user = $this->Model_users->get_by(array('login' => $user['login'] ));

            if( $existing_user == NULL && $this->form_validation->run() == TRUE )
            {
                $this->Model_users->save($user);
                $this->_send_confirm_latter($user['email'], $user['login']);
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

                $this->input->set_cookie('login', $login, 804604, $this->domain, '/', 'CMS_');

                if($remember == 'on')
                    $this->input->set_cookie('remember', 'Yes', 804604, $this->domain, '/', 'CMS_');
                else
                    $this->input->set_cookie('remember', 'No', 804604, $this->domain, '/', 'CMS_');

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
            delete_cookie('login', $this->domain, '/', 'CMS_');
            delete_cookie('remember', $this->domain, '/', 'CMS_');

            redirect('main');

        } else {

            redirect('main');
        }

    }

    public function confirm( $key, $login )
    {
        $this->load->helper('form');
        if($key != NULL && $login != NULL )
        {
            $this->load->model('Model_confirmation');
            $confirmation = $this->Model_confirmation->get_by(['key' => $key, 'login' => $login], TRUE);
            if(empty($confirmation ))
            {
                redirect('/');

            } else {

                $confirmation = $confirmation[0];
                $user = $this->Model_users->get_by(['login'=>$confirmation->login], true);
                if(empty($user))
                {
                    redirect('/');
                } else
                    $user = $user[0];

                $this->Model_users->save(['role_id'=>4], $user->id);
                $this->Model_confirmation->delete($confirmation->id);
                $this->data['message'] = "You have successfully activate you'r account!";
                $this->load->view( 'components/view_header',
                    [
                        'title' => 'Okay :)',
                        'auth'  => $this->data['auth'],
                        'user'  => $this->data['user']
                    ]
                );
                $this->load->view('auth/view_confirmation_success',
                    [
                        'message' =>  $this->data['message']
                    ]
                );
            }
        } else
        {
            redirect('/');
        }
    }

    public function restore( )
    {
        $this->load->helper('form');

        $this->load->view('components/view_header',
            [
                'title' => 'Restore',
                'auth' => $this->data['auth'],
                'user' => $this->data['user']
            ]
        );

        if( isset($_POST['restore-login']))
        {
            $login = $this->input->get_post('restore-login');
            $restore_user = $this->Model_users->get_by([ 'login' => $login ], TRUE);

            if( !empty($restore_user) )
            {
                $restore_user = $restore_user[0];
            }
            $this->_send_restore_latter( $restore_user );

            $this->load->view('auth/view_restore', ['message' => "Password changed and sent to your email!"]);

        } else {

            $this->load->view('auth/view_restore');
        }
    }

    private function _send_confirm_latter($to, $login)
    {
        $this->load->model(['Model_confirmation', 'Model_templates']);
        $this->load->library('email');

        $key    = do_hash($login);
        $url    = base_url("auth/confirm/$key/$login");
        $template = $this->Model_templates->get_by(['name' => 'Confirmation'], TRUE);

        if( !empty($template))
        {
            $template = $template[0];
            $template->template = str_replace('{login}', $login, $template->template );
            $template->template = str_replace('{here}', "<a href='$url'>here</a>", $template->template );

        } else {

            $template = $url;
        }

        $data = [
            'key'   => $key,
            'login' => $login
        ];

        $this->Model_confirmation->save($data);

        $this->email->mailtype = 'html';
        $this->email->from(config_item('contact_email'), 'Account Manager');
        $this->email->to($to);
        $this->email->subject('Confirmation');
        $this->email->message($template->template);
        $this->email->send();
    }

    private function _send_restore_latter($restore_user)
    {
        $this->load->model('Model_templates');
        $this->load->helper(['security']);
        $this->load->library('email');

        $new_pass   = rand(666666,999999);
        $hash_pass  = do_hash($new_pass);
        $template = $this->Model_templates->get_by(['name'=>'Restore'], TRUE);
        if(!empty($template))
        {
            $template = $template[0];
            $template->template = str_replace('{login}', $restore_user->login, $template->template);
            $template->template = str_replace('{password}', $new_pass, $template->template);
        }
        #region Change Password

        $data = [
            'password' => $hash_pass,
        ];
        $this->Model_users->save($data, $restore_user->id);

        #endregion

        $this->email->from(config_item('contact_email'), 'Account Manager');
        $this->email->to($restore_user->email);
        $this->email->mailtype = 'html';

        $this->email->subject('Restore password');
        $this->email->message($template->template);

        $this->email->send();
    }

}
