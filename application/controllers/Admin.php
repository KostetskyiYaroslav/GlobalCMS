<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['url', 'form']);
        if ($this->data['auth'] == FALSE || $this->data['user']->role->access_lvl <= 5) {
            redirect('/');
        }
    }

    public function index()
    {

    }

    public function dashboard($menu)
    {
       $this->load->view('components/view_header',
            [
                'title' => $menu . ' Menu',
                'auth' => $this->data['auth'],
                'user' => $this->data['user']
            ]
        );
        switch ($menu) {
            case 'users':
                $this->load->view('menu/view_' . $menu, ['users' => $this->data['users'], 'current_user' => $this->data['user']]);
                break;

            case 'posts':
                $this->load->view('menu/view_' . $menu, ['posts' => $this->data['posts'], 'current_user' => $this->data['user']]);
                break;

            case 'pages':
                $this->load->view('menu/view_' . $menu, ['pages' => $this->data['pages'], 'current_user' => $this->data['user']]);
                break;

            case 'comments':
                $this->load->view('menu/view_' . $menu, ['comments' => $this->data['comments'], 'current_user' => $this->data['user']]);
                break;

            case 'categories':
                $this->load->view('menu/view_' . $menu, ['categories' => $this->data['categories'], 'current_user' => $this->data['user']]);
                break;

            case 'templates':
                $this->load->view('menu/view_' . $menu, ['templates' => $this->data['templates'], 'current_user' => $this->data['user']]);
                break;

            case 'settings':
                $this->load->view('menu/view_' . $menu, ['settings' => $this->data['settings'], 'current_user' => $this->data['user']]);
                break;

            default:
                break;
        }
    }

    #region User Manipulation

    public function user_delete($id)
    {
        $this->Model_users->delete($id);
        redirect('admin/dashboard/users');
    }

    public function user_single($login)
    {
        $single_user = $this->Model_users->get_users_by(['login' => $login], TRUE);
        $edit_field = 'disabled';

        if (isset($_POST['edit'])) {
            $edit_field = '';
        }

        $this->load->view('components/view_header',
            [
                'title' => 'Single User',
                'auth' => $this->data['auth'],
                'user' => $this->data['user']
            ]
        );

        $this->load->view('user/view_single',
            array
            (
                'current_user' => $this->data['user'],
                'single_user' => $single_user,
                'edit_field' => $edit_field
            )
        );
    }

    public function user_save()
    {
        $data = array();
        $condition = true;
        $login = $password = $email = $role_id = $date_created = null;
        $message = '';

        $this->load->view('components/view_header',
            [
                'title' => 'New User',
                'auth' => $this->data['auth'],
                'user' => $this->data['user']
            ]
        );

        if (isset($_POST['new-login'])) {

            if (isset($_POST['new-login']) && $_POST['new-login'] != '') {
                $login = $this->input->get_post('new-login');

            } else {

                $condition = false;
            }
            if (isset($_POST['new-password']) && $_POST['new-password'] != '') {
                $password = $this->input->get_post('new-password');

            } else {

                $condition = false;
            }
            if (isset($_POST['new-email']) && $_POST['new-email'] != '') {
                $email = $this->input->get_post('new-email');

            }
            if (isset($_POST['new-role-id']) && $_POST['new-role-id'] != '') {
                $role_id = $this->input->get_post('new-role-id');

            }
            if (isset($_POST['new-date-created']) && $_POST['new-date-created'] != '') {
                $date_created = $this->input->get_post('new-date-created');

            } else {

                $date_created = date('Y-m-d H:i:s');
            }

            $data = array
            (
                'login' => $login,
                'password' => $password,
                'email' => $email,
                'role_id' => $role_id,
                'date_created' => $date_created
            );

            if ($condition) {
                $this->Model_users->save($data);
                $message = 'New User ' . $login . ' successfully created!';
                $existing_user = $this->Model_users->get_by(array('login' => $data['login']));

                if ($existing_user == NULL && $this->form_validation->run() == TRUE) {
                    $this->Model_users->save($data);

                }

                $this->load->view('user/view_new',
                    [
                        'message' => $message
                    ]
                );
            } else {
                $this->load->view('user/view_new',
                    [
                        'message' => 'Some error!'
                    ]
                );
            }
        } else {
            $this->load->view('user/view_new',
                [
                    'message' => ''
                ]
            );
        }

//        Update $pages = $this->Model_posts->save($data, 3);
    }

    public function user_edit()
    {
        $data = array();
        $condition = TRUE;
        $login = $this->uri->segment(3);
        $password = $email = $role_id = $date_created = $message = '';
        $update_user = $this->Model_users->get_by(['login' => $login], TRUE);

        $this->load->view('components/view_header',
            [
                'title' => 'Edit User',
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
                'update_user' => $update_user,
                'message' => $message
            ]
        );

    }

    #endregion

    #region Templates Manipulation

    public function templates_delete($id)
    {
        $this->Model_templates->delete($id);
        redirect('admin/dashboard/templates');
    }

    public function templates_single($id)
    {
        $single_template = $this->Model_templates->get($id,true);

        $this->load->view('components/view_header',
            [
                'title' => 'Single Templates',
                'auth' => $this->data['auth'],
                'user' => $this->data['user']
            ]
        );

        $this->load->view('templates/view_single',
            array
            (
                'current_user' => $this->data['user'],
                'single_template' => $single_template,
                'current_user' => $this->data['user']
            )
        );
    }

    public function templates_save()
    {
        $data = array();
        $condition = true;
        $name = $template = null;
        $message = '';

        $this->load->view('components/view_header',
            [
                'title' => 'New User',
                'auth' => $this->data['auth'],
                'user' => $this->data['user']
            ]
        );

        if (isset($_POST['new-login'])) {

            if (isset($_POST['new-login']) && $_POST['new-login'] != '') {
                $login = $this->input->get_post('new-login');

            } else {

                $condition = false;
            }
            if (isset($_POST['new-password']) && $_POST['new-password'] != '') {
                $password = $this->input->get_post('new-password');

            } else {

                $condition = false;
            }
            if (isset($_POST['new-email']) && $_POST['new-email'] != '') {
                $email = $this->input->get_post('new-email');

            }
            if (isset($_POST['new-role-id']) && $_POST['new-role-id'] != '') {
                $role_id = $this->input->get_post('new-role-id');

            }
            if (isset($_POST['new-date-created']) && $_POST['new-date-created'] != '') {
                $date_created = $this->input->get_post('new-date-created');

            } else {

                $date_created = date('Y-m-d H:i:s');
            }

            $data = array
            (
                'login' => $login,
                'password' => $password,
                'email' => $email,
                'role_id' => $role_id,
                'date_created' => $date_created
            );

            if ($condition) {
                $this->Model_users->save($data);
                $message = 'New User ' . $login . ' successfully created!';
                $existing_user = $this->Model_users->get_by(array('login' => $data['login']));

                if ($existing_user == NULL && $this->form_validation->run() == TRUE) {
                    $this->Model_users->save($data);

                }

                $this->load->view('user/view_new',
                    [
                        'message' => $message
                    ]
                );
            } else {
                $this->load->view('user/view_new',
                    [
                        'message' => 'Some error!'
                    ]
                );
            }
        } else {
            $this->load->view('user/view_new',
                [
                    'message' => ''
                ]
            );
        }

//        Update $pages = $this->Model_posts->save($data, 3);
    }

    public function templates_edit()
    {
        $data = array();
        $condition = TRUE;
        $id = $this->uri->segment(3);
        $password = $email = $role_id = $date_created = $message = '';
        $update_template = $this->Model_templates->get($id, TRUE);

        $this->load->view('components/view_header',
            [
                'title' => 'Edit User',
                'auth' => $this->data['auth'],
                'user' => $this->data['user']
            ]
        );

        if (isset($_POST['update-template'])) {
            $template = $id = NULL;
            $id = $this->input->get_post('update-id');
            $template = $this->input->get_post('update-template');

            $data =
                [
                    'template' => $template
                ];

            $this->Model_templates->save($data, $id);
            $message = 'Template successfully updated!';
        }

        if (empty($update_template)) {
            $message = 'Template dose not exist!';
        }

        $this->load->view('templates/view_edit',
            [
                'update_template' => $update_template,
                'message' => $message
            ]
        );

    }

    #endregion

    #region Post Manipulation

    public function post_delete($id)
    {
        $this->Model_posts->delete($id);
        redirect('admin/dashboard/posts');
    }
    public function post_single($id)
    {
        $single_post    = $this->Model_posts->get_posts($id, TRUE);
        $single_post->comments = $this->Model_comments->get_post_comments($single_post->post_id);
        $this->load->view( 'components/view_header',
            [
                'title' => 'Single Post',
                'auth'  => $this->data['auth'],
                'user'  => $this->data['user']
            ]
        );

        $this->load->view('posts/view_single',
            array
            (
                'current_user'  => $this->data['user'],
                'single_post'  => $single_post
            )
        );
    }
    public function post_save()
    {
        $data       = array();
        $condition  = TRUE;
        $id = $this->uri->segment(3);
        $message = NULL;
        $this->load->view( 'components/view_header',
            [
                'title' => 'Edit User',
                'auth'  => $this->data['auth'],
                'user'  => $this->data['user']
            ]
        );

        if(isset($_POST['save-post-title']))
        {
            $title = $body = $author_id = $attachment = $date = $tags = $category_id = $slug = NULL;

            if(isset($_POST['save-post-title']) && $_POST['save-post-title'] != '')
            {
                $title = $this->input->get_post('save-post-title');

            } else {

                $condition = FALSE;
            }
            if(isset($_POST['save-post-body']) && $_POST['save-post-body'] != '')
            {
                $body = $this->input->get_post('save-post-body');

            } else {

                $condition = FALSE;
            }
            if(isset($_POST['save-post-author_id']) && $_POST['save-post-author_id'] != '')
            {
                $author_id = $this->input->get_post('save-post-author_id');

            } else {

                $condition = FALSE;
            }
            if(isset($_POST['save-post-attachment']) && $_POST['save-post-attachment'] != '')
            {
                $attachment = $this->input->get_post('save-post-attachment');

            } else {

                $attachment = 'default-post.png';
            }
            if(isset($_POST['save-post-date']) && $_POST['save-post-date'] != '')
            {
                $date = $this->input->get_post('save-post-date');

            } else {

                $date = date('Y-m-d H:i:s');
            }
            if(isset($_POST['save-post-tags']))
            {
                $tags = $this->input->get_post('save-post-tags');

            } else {

                $tags = '';
            }
            if(isset($_POST['save-post-category_id']) && $_POST['save-post-category_id'] != '')
            {
                $category_id = $this->input->get_post('save-post-category_id');

            } else {

                $category_id = 1;
            }
            if(isset($_POST['save-post-slug']) && $_POST['save-post-slug'] != '')
            {
                $slug = $this->input->get_post('save-post-slug');

            } else {

                $slug = $this->_make_slug($title);
            }

            if( $condition )
            {
                $data = [
                    'title'         => $title       ,
                    'body'          => $body        ,
                    'author_id'     => $author_id   ,
                    'attachment'    => $attachment  ,
                    'date'          => $date        ,
                    'tags'          => $tags        ,
                    'category_id'   => $category_id ,
                    'slug'          => $slug
                ];

                $this->Model_posts->save($data, $id);
                $message = 'Post successfully saved!';
            } else {

                $message = 'Post data error! Try again!';
            }
        }

        $this->load->view('posts/view_save',
            [
                'message'       => $message
            ]
        );

    }

    public function post_edit()
    {
        $data       = array();
        $condition  = TRUE;
        $id = $this->uri->segment(3);
        $update_post    = $this->Model_posts->get_posts($id, TRUE);
        $message = NULL;
        $this->load->view( 'components/view_header',
            [
                'title' => 'Edit User',
                'auth'  => $this->data['auth'],
                'user'  => $this->data['user']
            ]
        );

        if(isset($_POST['update-post-id']))
        {
            $title = $body = $author_id = $attachment = $date = $tags = $category_id = $slug = NULL;

            if(isset($_POST['update-post-title']) && $_POST['update-post-title'] != '')
            {
                $title = $this->input->get_post('update-post-title');

            } else {

                $title = $update_post->post_title;
            }
            if(isset($_POST['update-post-body']) && $_POST['update-post-body'] != '')
            {
                $body = $this->input->get_post('update-post-body');

            } else {

                $body = $update_post->post_body;
            }
            if(isset($_POST['update-post-author_id']) && $_POST['update-post-author_id'] != '')
            {
                $author_id = $this->input->get_post('update-post-author_id');

            } else {

                $author_id = $update_post->post_author_id;
            }
            if(isset($_POST['update-post-attachment']) && $_POST['update-post-attachment'] != '')
            {
                $attachment = $this->input->get_post('update-post-attachment');

            } else {

                $attachment = $update_post->post_attachment;
            }
            if(isset($_POST['update-post-date']) && $_POST['update-post-date'] != '')
            {
                $date = $this->input->get_post('update-post-date');

            } else {

                $date = $update_post->post_date;
            }
            if(isset($_POST['update-post-tags']) && $_POST['update-post-tags'] != '')
            {
                $tags = $this->input->get_post('update-post-tags');

            } else {

                $tags = $update_post->post_tags;
            }
            if(isset($_POST['update-post-category_id']) && $_POST['update-post-category_id'] != '')
            {
                $category_id = $this->input->get_post('update-post-category_id');

            } else {

                $category_id = $update_post->category_id;
            }
            if(isset($_POST['update-post-slug']) && $_POST['update-post-slug'] != '')
            {
                $slug = $this->input->get_post('update-post-slug');

            } else {

                $slug = $update_post->post_slug;
            }

            $data = [
                'title'         => $title       ,
                'body'          => $body        ,
                'author_id'     => $author_id   ,
                'attachment'    => $attachment  ,
                'date'          => $date        ,
                'tags'          => $tags        ,
                'category_id'   => $category_id ,
                'slug'          => $slug
            ];

            $this->Model_posts->save($data, $id);
            $message = 'Post successfully updated!';
        }

        if(empty($update_post))
        {
            $message = 'User dose not exist!';
        }

        $this->load->view('posts/view_edit',
            [
                'update_post'   => $update_post,
                'message'       => $message
            ]
        );

    }

    #endregion

    #region Category Manipulation

    public function categories_delete($id)
    {
        $this->Model_categories->delete($id);
        redirect('admin/dashboard/categories');
    }

    public function categories_single($id)
    {
        $category_posts = $this->Model_posts->get_post_by(['category_id'=>$id]);

        if (isset($_POST['edit'])) {
            $edit_field = '';
        }

        $this->load->view('components/view_header',
            [
                'title' => 'Single Category',
                'auth' => $this->data['auth'],
                'user' => $this->data['user']
            ]
        );

        $this->load->view('categories/view_single',
            array
            (
                'current_user' => $this->data['user'],
                'categories' => $this->data['categories'],
                'category_posts' => $category_posts
            )
        );

    }

    public function categories_save()
    {
        $data = array();
        $condition = true;
        $login = $password = $email = $role_id = $date_created = null;
        $message = '';

        $this->load->view('components/view_header',
            [
                'title' => 'New User',
                'auth' => $this->data['auth'],
                'user' => $this->data['user']
            ]
        );

        if (isset($_POST['new-login'])) {
            if (isset($_POST['new-login']) && $_POST['new-login'] != '') {
                $login = $this->input->get_post('new-login');

            } else {

                $condition = false;
            }
            if (isset($_POST['new-password']) && $_POST['new-password'] != '') {
                $password = $this->input->get_post('new-password');

            } else {

                $condition = false;
            }
            if (isset($_POST['new-email']) && $_POST['new-email'] != '') {
                $email = $this->input->get_post('new-email');

            }
            if (isset($_POST['new-role-id']) && $_POST['new-role-id'] != '') {
                $role_id = $this->input->get_post('new-role-id');

            }
            if (isset($_POST['new-date-created']) && $_POST['new-date-created'] != '') {
                $date_created = $this->input->get_post('new-date-created');

            } else {

                $date_created = date('Y-m-d H:i:s');
            }

            $data = array
            (
                'login' => $login,
                'password' => $password,
                'email' => $email,
                'role_id' => $role_id,
                'date_created' => $date_created
            );

            if ($condition) {
                $this->Model_users->save($data);
                $message = 'New User ' . $login . ' successfully created!';
                $existing_user = $this->Model_users->get_by(array('login' => $data['login']));

                if ($existing_user == NULL && $this->form_validation->run() == TRUE) {
                    $this->Model_users->save($data);
                }
            } else {
                $this->load->view('user/view_new',
                    [
                        'message' => 'Some error!'
                    ]
                );
            }
        } else {
            $this->load->view('user/view_new',
                [
                    'message' => ''
                ]
            );
        }

//        Update $pages = $this->Model_posts->save($data, 3);
    }

    public function categories_edit()
    {
        $data = array();
        $condition = TRUE;
        $login = $this->uri->segment(3);
        $password = $email = $role_id = $date_created = $message = '';
        $update_user = $this->Model_users->get_by(['login' => $login], TRUE);

        $this->load->view('components/view_header',
            [
                'title' => 'Edit User',
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
                'update_user' => $update_user,
                'message' => $message
            ]
        );

    }

    #endregion

    #region Settings Manipulation

    public function settings_single($id)
    {
        $single_settings = $this->Model_settings->get($id, true);

        $this->load->view('components/view_header',
            [
                'title' => 'Single Settings',
                'auth' => $this->data['auth'],
                'user' => $this->data['user']
            ]
        );

        $this->load->view('settings/view_single',
            array
            (
                'current_user' => $this->data['user'],
                'single_settings' => $single_settings,
            )
        );
    }

    public function settings_edit()
    {
        $data = array();
        $id = $this->uri->segment(3);
        $update_settings = $this->Model_settings->get($id, TRUE);
        $message = null;
        $this->load->view('components/view_header',
            [
                'title' => 'Settings Edit',
                'auth' => $this->data['auth'],
                'user' => $this->data['user']
            ]
        );

        if (isset($_POST['update-value'])) {
            $id = NULL;
            $id = $this->input->get_post('update-id');
            $value = $this->input->get_post('update-value');

            $data =
                [
                    'value' => $value
                ];

            $this->Model_settings->save($data, $id);
            $message = 'Settings successfully updated!';
        }

        if ( empty($update_settings) ) {
            $message = 'Settings dose not exist!';
        }

        $this->load->view('settings/view_edit',
            [
                'update_settings' => $update_settings,
                'message' => $message
            ]
        );

    }

    #endregion

    private function _make_slug($title)
    {
        $string = str_replace(' ', '-', $title);

        return preg_replace('/[^A-Za-z0-9\-]/', '', $title);
    }
}
