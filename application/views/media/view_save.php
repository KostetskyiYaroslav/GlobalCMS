<div class="container body">
    <div class="row col-xs-9">
        <div class="row col-xs-12">
            <?php foreach ($error as $item): ?>
                <?=$item?>
            <?php endforeach;?>
            <?php echo form_open_multipart('');?>
            <?php echo form_input(['type'=>'file', 'class' => 'fileUpload', 'name' => 'userfile']);?>
            <?php echo form_input(['type'=>'submit', 'class' => 'btn btn-success', 'value' => 'Upload']);?>
            <?php echo form_close(); ?>
        </div>
    </div>
    <div class="row col-xs-3">
        <?php $this->load->view('components/view_sidebar', ['categories' => $categories]);?>
    </div>
<?php $this->load->view('components/view_footer', ['widgets' => $widgets]); ?>