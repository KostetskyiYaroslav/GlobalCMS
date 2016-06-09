<?php

class Themes extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if($this->data['user'] == null || $this->data['user']->role->id > 4)
        {
            redirect('/');
        }
        $this->load->helper('form');
    }

    function index()
    {
        $this->load->view('components/view_header',
            [
                'title' => 'Single Settings',
                'auth' => $this->data['auth'],
                'user' => $this->data['user'],
                'widgets' => $this->data['widgets']
            ]
        );

        $this->load->view('themes/view_themes',
            [
                'title' => 'Widgets Locations',
                'auth' => $this->data['auth'],
                'user' => $this->data['user'],
                'categories' => $this->data['categories'],
                'widgets' => $this->data['widgets'],
                'themes' => $this->data['themes']
            ]
        );
    }

    function activate($id)
    {
        $this->Model_themes->activate_theme($id);
        redirect('/themes');
    }

    function edit($id)
    {
        $data = array();
        $condition = TRUE;
        $message = NULL;
        $update_theme = $this->Model_themes->get($id, true);

        $this->load->view('components/view_header',
            [
                'title' => 'Theme edit',
                'auth' => $this->data['auth'],
                'user' => $this->data['user'],
                'widgets' => $this->data['widgets']
            ]
        );

        if (isset($_POST['update-theme-id']))
        {
            $name = $path = $author = $description = $screensot = NULL;

            if(isset($_POST['update-theme-name']) && $_POST['update-theme-name'] != '')
            {
                $name = $this->input->get_post('update-theme-name');
            } else
            {
                $name = $update_theme->name;
            }
            if(isset($_POST['update-theme-path']) && $_POST['update-theme-path'] != '')
            {
                $path = $this->input->get_post('update-theme-path');
            } else
            {
                $path = $update_theme->path;
            }
            if(isset($_POST['update-theme-author']) && $_POST['update-theme-author'] != '')
            {
                $author = $this->input->get_post('update-theme-author');
            } else
            {
                $author = $update_theme->author;
            }
            if(isset($_POST['update-theme-description']) && $_POST['update-theme-description'] != '')
            {
                $description = $this->input->get_post('update-theme-description');
            } else
            {
                $description = $update_theme->description;
            }
            if(isset($_POST['update-theme-screenshot']) && $_POST['update-theme-screenshot'] != '')
            {
                $screenshot = $this->input->get_post('update-theme-screenshot');
            } else
            {
                $screenshot = $update_theme->screenshot;
            }

            $data = [
                'name'          => $name,
                'path'          => $path,
                'author'        => $author,
                'description'   => $description,
                'screenshot'    => $screenshot
            ];

            $this->Model_themes->save($data, $id);
            $message = 'Theme successfully updated!';
        }

        if(empty($update_theme))
        {
            $message = 'Theme dose not exist!';
        }

        $this->load->view('themes/view_edit',
            [
                'auth' => $this->data['auth'],
                'user' => $this->data['user'],
                'categories' => $this->data['categories'],
                'widgets' => $this->data['widgets'],
                'update_theme' => $update_theme,
                'message'   => $message
            ]
        );

    }

    function delete($id)
    {
        $remove_theme = $this->Model_themes->get($id, TRUE);

        $dirPath = './assets/themes/'.$remove_theme->path;

        if (! is_dir($dirPath)) {
            throw new InvalidArgumentException("$dirPath must be a directory");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::delete_dir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
        $this->Model_themes->delete($remove_theme->id);

        redirect('/themes');
    }

    function install()
    {
        $config['upload_path']          = './assets/themes/';
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
                    'title' => 'Theme install',
                    'auth' => $this->data['auth'],
                    'user' => $this->data['user'],
                    'widgets' => $this->data['widgets']
                ]
            );
            $this->load->view('themes/view_upload',
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
            $upload_path = './assets/themes/';
            $data = array('upload_data' => $this->upload->data());
            $raw_name = $data['upload_data']['raw_name'];
            mkdir($upload_path.$raw_name, 0744);

            $zip = new ZipArchive;
            $file = $data['upload_data']['full_path'];
            chmod($file, 0777);
            if ($zip->open($file) === TRUE) {
                $zip->extractTo($upload_path.$raw_name);
                $zip->close();
            }

            rename( $upload_path.$raw_name.'/'.$raw_name.'.css',
                $upload_path.$raw_name.'/theme.css' );

            chmod($upload_path.$raw_name, 0755);

            unlink($upload_path.$this->upload->file_name);

            $this->Model_themes->save(
                [
                    'name' => ucfirst($raw_name),
                    'author' => 'Not set',
                    'path' => $raw_name,
                    'description' => 'Not set',
                    'screenshot' => '',
                    'activate' => '0'
                ]
            );
            redirect('/settings/themes');
        }

    }

    private function _chmod_r($dir, $dirPermissions, $filePermissions) {
        $dp = opendir($dir);
        while($file = readdir($dp)) {
            if (($file == ".") || ($file == ".."))
                continue;

            $fullPath = $dir."/".$file;

            if(is_dir($fullPath)) {
                echo('DIR:' . $fullPath . "\n");
                chmod($fullPath, $dirPermissions);
                $this->chmod_r($fullPath, $dirPermissions, $filePermissions);
            } else {
                echo('FILE:' . $fullPath . "\n");
                chmod($fullPath, $filePermissions);
            }

        }
        closedir($dp);
    }

}