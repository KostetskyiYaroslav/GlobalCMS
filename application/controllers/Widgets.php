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

    function install()
    {
        $config['upload_path']          = './application/views/settings/widgets/';
        $config['allowed_types']        = 'zip';
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_ext_tolower']     = TRUE;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('components/view_header',
                [
                    'title' => 'Single Settings',
                    'auth' => $this->data['auth'],
                    'user' => $this->data['user'],
                    'widgets' => $this->data['widgets']
                ]
            );
            $this->load->view('settings/widgets/view_upload',
                array
                (
                    'categories' => $this->data['categories'],
                    'widgets' => $this->data['widgets'],
                    'error' => $error
                )
            );
        }
        else
        {
            $upload_path = './application/views/settings/widgets/';
            $data = array('upload_data' => $this->upload->data());
            $raw_name = $data['upload_data']['raw_name'];
            mkdir($upload_path.$raw_name, 0744);
            $zip = new ZipArchive;
            $file = $data['upload_data']['full_path'];
            chmod($file, 0744);
            if ($zip->open($file) === TRUE) {
                $zip->extractTo($upload_path.$raw_name);
                $zip->close();
            }

            rename( $upload_path.$raw_name.'/'.$raw_name.'.php',
                $upload_path.$raw_name.'/widget.php' );
            unlink($upload_path.$this->upload->file_name);

            $this->Model_widgets->save_get_widgets_abs(
                [
                    'name' => ucfirst($raw_name),
                    'path' => $raw_name,
                    'role_id' => '6'
                ]
            );
            redirect('/settings/widgets');
        }

    }

    function delete($id)
    {
        $this->Model_widgets->delete($id);
        redirect('/settings/widgets');
    }

    public function edit($id)
    {
        $message    = NULL;

        $update_widget = $this->Model_widgets->get($id, TRUE);

        $this->load->view( 'components/view_header',
            [
                'title' => 'Edit Widget',
                'auth'  => $this->data['auth'],
                'user'  => $this->data['user']
            ]
        );
        
        if(isset($_POST['update-widget-id']))
        {
            $name = $position = $priority = $options = $active = $role_id = NULL;

            if(isset($_POST['update-widget-name']) && $_POST['update-widget-name'] != '')
            {
                $name = $this->input->get_post('update-widget-name');

            } else {

                $name = $update_widget->name;
            }
            if(isset($_POST['update-widget-position']) && $_POST['update-widget-position'] != '')
            {
                $position = $this->input->get_post('update-widget-position');

            } else {

                $position = $update_widget->position;
            }
            if(isset($_POST['update-widget-priority']) && $_POST['update-widget-priority'] != '')
            {
                $priority = $this->input->get_post('update-widget-priority');

            } else {

                $priority = $update_widget->priority;
            }
            if(isset($_POST['update-widget-options']) && $_POST['update-widget-options'] != '')
            {
                $options = $this->input->get_post('update-widget-options');

            } else {

                $options = $update_widget->options;
            }
            if(isset($_POST['update-widget-active']) && $_POST['update-widget-active'] != '')
            {
                $active = $this->input->get_post('update-widget-active');

            } else {

                $active = $update_widget->active;
            }
            if(isset($_POST['update-widget-role_id']) && $_POST['update-widget-role_id'] != '')
            {
                $role_id = $this->input->get_post('update-widget-role_id');

            } else {

                $role_id = $update_widget->role_id;
            }

            $update_data = [
                'name'=> $name,
                'position'=> $position,
                'priority'=> $priority,
                'options'=> $options,
                'active'=> $active,
                'role_id'=> $role_id
            ];

            $this->Model_widgets->save($update_data, $id);
            $message = 'Widget successfully updated!';
        }

        if(empty($update_widget))
        {
            $message = 'Widget dose not exist!';
        }

        $this->load->view('settings/widgets/view_edit',
            [
                'update_widget'   => $update_widget,
                'message'       => $message
            ]
        );

    }

}