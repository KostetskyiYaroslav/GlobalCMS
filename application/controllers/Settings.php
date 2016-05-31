<?php

class Settings extends MY_Controller
{

    /**
     * Settings constructor.
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
                'title' => 'Settings',
                'auth' => $this->data['auth'],
                'user' => $this->data['user']
            ]
        );
        $this->load->view('menu/view_settings', ['settings' => $this->data['settings'], 'current_user' => $this->data['user']]);
    }

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

    public function widgets()
    {
        $available_widgets = $this->Model_widgets->get_available();

        $this->load->view('components/view_header',
            [
                'title' => 'Single Settings',
                'auth' => $this->data['auth'],
                'user' => $this->data['user'],
                'widgets_location_style' => true,
                'widgets' => $this->data['widgets']
            ]
        );

        $this->load->view('settings/widgets/view_locations',
            [
                'title' => 'Widgets Locations',
                'auth' => $this->data['auth'],
                'user' => $this->data['user'],
                'categories' => $this->data['categories'],
                'widgets' => $this->data['widgets'],
                'available_widgets' => $available_widgets
            ]
        );
    }

    public function widgets_save()
    {
        if($this->data['user'] == null || $this->data['user']->role->id > 4)
        {
            redirect('/');
        }

        if(isset($_POST['widget_position']) && isset($_POST['widget_name']))
        {
            $widget_name = $this->input->get_post('widget_name');
            $widget_position = $this->input->get_post('widget_position');

            $widget = $this->Model_widgets->get_by(['path' => $widget_name], true);

            if(!empty($widget ))
            {
                $widget = $widget[0];
            }

            $data =
                [
                    'name' => $widget->name,
                    'path' => $widget->path,
                    'style' => $widget->style,
                    'options' => $widget->options,
                    'active' => $widget->active,
                    'position' => $widget_position,
                    'role_id' => $widget->role_id
                ];

            $this->Model_widgets->save($data);
        }
    }

}