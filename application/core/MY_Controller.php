<?php
class MY_Controller extends CI_Controller
{

    public $data = array();

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

        if( isset($_COOKIE['CMS_login']) )
        {
            $login = $this->input->cookie('CMS_login');

            $this->data['user']         = $this->Model_users->get_by(array('login' => $login))[0];
            $this->data['user']->role   = $this->Model_users->get_role( ['login' => $login ] );
            $this->data['auth']         = TRUE;
        }
        
        $this->data['users'] = $this->Model_users->get_users();
        $this->data['posts'] = $this->Model_posts->get_posts();
        $this->data['categories'] = $this->Model_categories->get();

        function cmp($a, $b)
        {
            if ($a->post_date == $b->post_date) {
                return 0;
            }

            return ($a->post_date < $b->post_date) ? 1 : -1;
        }

        usort($this->data['posts'], "cmp");
    }
}