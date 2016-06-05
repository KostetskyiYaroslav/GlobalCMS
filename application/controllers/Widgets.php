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
            mkdir($upload_path.$raw_name, 0700);

            $zip = new ZipArchive;
            $file = $data['upload_data']['full_path'];
            chmod($file, 0777);
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
}