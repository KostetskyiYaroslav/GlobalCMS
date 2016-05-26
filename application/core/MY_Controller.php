<?php
class MY_Controller extends CI_Controller
{

    public $data = array();
    public $site_name = null;
    /**
     * MY_Controller constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Model_users');
        $this->load->model('Model_posts');
        $this->load->model('Model_categories');
        $this->load->model('Model_templates');
        $this->load->model('Model_comments');
        $this->load->model('Model_settings');

        $this->data['site_name']    = config_item('site_name');
        $this->data['error']        = array();
        $this->data['auth']         = FALSE;
        $this->data['posts']        = NULL;
        $this->data['user']         = NULL;
        $this->data['users']        = NULL;
        $this->data['pages']        = NULL;
        $this->data['comments']     = NULL;
        $this->data['categories']   = NULL;
        $this->data['sidebar']      = NULL;
        $this->data['templates']    = NULL;
        $this->data['settings']     = NULL;
        if( isset($_COOKIE['CMS_login']) )
        {
            $login = $this->input->cookie('CMS_login');

            $this->data['user']         = $this->Model_users->get_by(array('login' => $login))[0];
            $this->data['user']->role   = $this->Model_users->get_role( ['login' => $login ] );
            $this->data['auth']         = TRUE;
        }
        
        $this->data['users'] = $this->Model_users->get_users();
        $this->data['posts'] = $this->Model_posts->get_posts();
        $this->data['comments']     = $this->Model_comments->get_post_comments();
        $this->data['templates']    = $this->Model_templates->get();
        $this->data['categories']   = $this->Model_categories->get();
        $this->data['settings']     = $this->Model_settings->get();

        foreach( $this->data['posts'] as $post )
        {
            $post->comments = $this->Model_comments->get_post_comments($post->post_id);
        }

        function cmp($a, $b)
        {
            if ($a->post_date == $b->post_date) {
                return 0;
            }

            return ($a->post_date < $b->post_date) ? 1 : -1;
        }

        usort($this->data['posts'], "cmp");

        $this->site_name = $this->Model_settings->get_by(['name' => 'site_name'],true)[0]->value;
    }

}