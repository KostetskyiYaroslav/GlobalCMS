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
        $this->load->model('Model_widgets');
        $this->load->model('Model_themes');

        //$this->data['site_name']    = config_item('site_name');
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
        $this->data['widgets']      = NULL;
        $this->data['themes']       = NULL;
        $this->data['active_theme'] = NULL;

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
        $this->data['widgets']      = $this->Model_widgets->get();
        $this->data['themes']       = $this->Model_themes->get();
        $this->data['active_theme'] = $this->Model_themes->get_by(['activate' => '1']);

        $this->data['active_theme'] =
            (empty($this->data['active_theme']))
                ? $this->Model_themes->get_by(['name' => 'Standard'])[0]
                : $this->data['active_theme'][0];

        function sort_widget($a, $b) {
            if($a->priority == $b->priority){ return 0 ; }
            return ($a->priority < $b->priority) ? 1 : -1;
        }

        usort($this->data['widgets'], "sort_widget");

        $i = 0;
        foreach ($this->data['widgets'] as $widget)
        {
            $this->data['widgets'][$widget->position][$i] = $widget;
            unset($this->data['widgets'][$i]);
            $i++;
        }
        unset($i);

        foreach( $this->data['posts'] as $post )
        {
            $post->comments = $this->Model_comments->get_post_comments($post->post_id);
        }

        function cmp($a, $b)
        {
            if ($a->post_date == $b->post_date) { return 0; }
            return ($a->post_date < $b->post_date) ? 1 : -1;
        }
        usort($this->data['posts'], "cmp");

        $this->site_name = $this->Model_settings->get_by(['name' => 'site_name'],true)[0]->value;
    }

}