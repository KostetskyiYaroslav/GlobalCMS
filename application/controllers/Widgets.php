<?php
class Widgets extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
    }

    function index()
    {
        $available_widgets = $this->Model_widgets->get_widgets_abs();

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

}