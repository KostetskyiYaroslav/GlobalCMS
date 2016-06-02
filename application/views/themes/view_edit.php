<!--Load TinyMCE-->
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<!--end Load TinyMCE-->
<div class="container body">
    <div class="row col-xs-9">
        <div class="col-xs-12">
            <h2 class="col-xs-6">
                <?php echo 'Theme | '.$update_theme->name; ?>
            </h2>
            <h3 class="col-xs-6 text-right">
                <a href="" title="Come back" class="glyphicon glyphicon-step-backward" onclick="window.history.back();"></a>
            </h3>
        </div>
        <?php echo form_open(); ?>
        <p class="col-xs-12">
            <label class="col-xs-6" for="update-theme-id">Theme id:</label>
            <?php echo form_input(['type'=>'number','value' => $update_theme->id, 'class' => 'col-xs-6', 'disabled' => 'disabled']);?>
            <?php echo form_input(['type'=>'number','value' => $update_theme->id, 'class' => 'col-xs-6', 'id'=>'update-theme-id', 'name'=>'update-theme-id', 'hidden'=>'hidden']);?>
        </p>
        <p class="col-xs-12">
            <label class="col-xs-6" for="update-theme-name">Title:</label>
            <?php echo form_input(['type'=>'text','value' => $update_theme->name, 'class' => 'col-xs-6', 'id'=>'update-theme-name', 'name'=>'update-theme-name']);?>
        </p>
        <p class="col-xs-12">
            <label class="col-xs-6" for="update-theme-path">Path:</label>
            <?php echo form_input(['type'=>'text','value' => $update_theme->path, 'class' => 'col-xs-6', 'id'=>'update-theme-path', 'name'=>'update-theme-path']);?>
        </p>
        <p class="col-xs-12">
            <label class="col-xs-6" for="update-theme-author">Author:</label>
            <?php echo form_input(['type'=>'text','value' => $update_theme->author, 'class' => 'col-xs-6', 'id'=>'update-theme-author', 'name'=>'update-theme-author']);?>
        </p>
        <p class="col-xs-12">
            <label class="col-xs-6" for="update-theme-screenshot">Screenshot:</label>
            <?php echo form_input(['type'=>'text','value' => $update_theme->screenshot, 'class' => 'col-xs-6', 'id'=>'update-theme-screenshot', 'name'=>'update-theme-screenshot']);?>
        </p>
        <p class="col-xs-8">
            <textarea id="update-post-body" name="update-post-body" class="col-xs-12" rows="10">
                <?php echo $update_theme->description; ?>
            </textarea>
        </p>
        <?php if( $update_theme->screenshot == '') : ?>
            <img class="col-xs-12 img-thumbnail" src="<?=base_url('assets/uploads/static/default-post.png')?>">
        <?php else : ?>
            <img class="col-xs-12 img-thumbnail" src="<?=$update_theme->screenshot?>">
        <?php endif;  ?>
        <div class="col-xs-12 text-right">
            <input type="submit" class="btn" value="Save Changes" />
        </div>
        <?php echo form_close(); ?>
        <div class="col-xs-9 row">
            <p class="popover-title container">
                <?php echo $message; ?>
            </p>
        </div>
    </div>
    <div class="row col-xs-3">
        <div class="sidebar">
            <h3>Some information</h3>
            <p>Some information</p>
        </div>
    </div>
<?php $this->load->view('components/view_footer'); ?>