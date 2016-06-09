<?php

class Model_media extends MY_Model
{
    protected $table_name = 'media';
    protected $primary_key = 'id';
    protected $primary_filter = 'intval';
    protected $order_by = '';
    protected $rules = array();
    protected $timestamps = FALSE;

    public function __construct()
    {
        parent::__construct();
    }

    public function delete($id)
    {
        $delete_media_file = $this->get($id, true);

        unlink('./assets/uploads/media/'.$delete_media_file->hash_name.$delete_media_file->type);

        return parent::delete($id);
    }


}