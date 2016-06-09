<?php

class Media extends MY_Controller
{
    /**
     * Media constructor.
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
                'title' => 'Media Files',
                'auth' => $this->data['auth'],
                'user' => $this->data['user'],
                'widgets' => $this->data['widgets']
            ]
        );
        $this->load->view('media/view_media',
        [
            'media_files' => $this->data['media'],
        ]
    );
    }

    public function save()
    {
        $config['upload_path']          = './assets/uploads/media';
        $config['allowed_types']        = '*';
        $config['max_size']             = 50000;
        $config['overwrite']            = TRUE;
        $config['file_ext_tolower']     = TRUE;

        $this->load->library('upload', $config);
        $this->load->helper('security');

        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view( 'components/view_header',
                [
                    'title' => 'Posts',
                    'auth'  => $this->data['auth'],
                    'user'  => $this->data['user'],
                    'widgets' => $this->data['widgets']
                ]
            );
            $this->load->view('media/view_save',
                [
                    'categories' => $this->data['categories'],
                    'widgets' => $this->data['widgets'],
                    'error' => $error
                ]
            );

        } else {

            $name = $hash_name = $type = $link = $date = $author_id = $share_link = '';

            $upload_path = './assets/uploads/media/';
            $data = array('upload_data' => $this->upload->data());

            $file_name  = $data['upload_data']['file_name'];
            $name       = $data['upload_data']['raw_name'];
            $hash_name  = rand(-666666, 999999);
            $hash_name  = do_hash($hash_name, 'md5');
            $type       = $data['upload_data']['file_ext'];
            $link       =  base_url('/assets/uploads/media/'.$hash_name.$type);
            $date       = date('Y-m-d H:i:s');
            $author_id  = $this->data['user']->id;

            if($type == '.jpeg' || $type == '.png' || $type == '.jpg')
            {
                $share_link = '<img class=\'col-xs-12\' src=\''.$link.'\'></img>';

            } elseif ($type == '.3gp' || $type == '.avi' || $type == '.mp4') {

                $share_link = '<video class=\'col-xs-12\' controls=\'controls\'><source src=\''.$link.'\'></video>';

            } else {

                $share_link = $link;
            }

            rename($upload_path.$file_name,
                $upload_path.$hash_name.$type );

            chmod($upload_path.$hash_name.$type, 0644);

            $this->Model_media->save(
                [
                    'name'      => $name,
                    'hash_name' => $hash_name,
                    'link'      => $link,
                    'date'      => $date,
                    'author_id' => $author_id,
                    'type'      => $type,
                    'share_link'=> $share_link
                ]
            );

            redirect('/media');
        }
    }

    public function delete($id)
    {
        $this->Model_media->delete($id);
        redirect('/media');
    }

}