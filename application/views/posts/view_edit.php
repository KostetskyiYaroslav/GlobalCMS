<!--Load TinyMCE-->
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<!--end Load TinyMCE-->
<div class="container body">
    <div class="row col-xs-9">
        <div class="col-xs-12">
            <h2 class="col-xs-6">
                <?php echo $update_post->post_title; ?>
            </h2>
            <h3 class="col-xs-6 text-right">
                <a href="" title="Come back" class="glyphicon glyphicon-step-backward" onclick="window.history.back();"></a>
                <a href="" title="Edit post" class="glyphicon glyphicon-edit" ></a>
            </h3>
        </div>
        <?php echo form_open(); ?>
        <?php if( TRUE || $update_post->avatar == '') : ?>
            <img class="col-xs-4 img-thumbnail" src="<?=base_url('assets/uploads/static/default-post.png')?>">
        <?php else : ?>
            <img class="col-xs-4 img-thumbnail" src="<?=base_url("assets/uploads/posts/".$update_post->post_attachment)?>">
        <?php endif;  ?>
        <p class="col-xs-8">
            <textarea id="update-post-body" name="update-post-body" class="col-xs-12" rows="10">
                <?php echo $update_post->post_body; ?>
            </textarea>
        </p>
        <p class="col-xs-12">
            <label class="col-xs-6" for="update-id">Post id:</label>
            <?php echo form_input(['type'=>'number','value' => $update_post->post_id, 'class' => 'col-xs-6', 'disabled' => 'disabled']);?>
            <?php echo form_input(['type'=>'number','value' => $update_post->post_id, 'class' => 'col-xs-6', 'id'=>'update-post-id', 'name'=>'update-post-id', 'hidden'=>'hidden']);?>
        </p>
        <p class="col-xs-12">
            <label class="col-xs-6" for="update-post-title">Title:</label>
            <?php echo form_input(['type'=>'text','value' => $update_post->post_title, 'class' => 'col-xs-6', 'id'=>'update-post-title', 'name'=>'update-post-title']);?>
        </p>
        <p class="col-xs-12">
            <label class="col-xs-6" for="update-post-author_id">Author id:</label>
            <?php echo form_input(['type'=>'number','value' => $update_post->post_author_id, 'class' => 'col-xs-6', 'id'=>'update-post-author_id', 'name'=>'update-post-author_id']);?>
        </p>
        <p class="col-xs-12">
            <label class="col-xs-6" for="update-post-date">Date:</label>
            <?php echo form_input(['type'=>'datetime','value' => $update_post->post_date, 'class' => 'col-xs-6', 'id'=>'update-post-date', 'name'=>'update-post-date']);?>
        </p>
        <p class="col-xs-12">
            <label class="col-xs-6" for="update-post-tags">Tags:</label>
            <?php echo form_input(['type'=>'text','value' => $update_post->post_tags, 'class' => 'col-xs-6', 'id'=>'update-post-tags', 'name'=>'update-post-tags']);?>
        </p>
        <p class="col-xs-12">
            <label class="col-xs-6" for="update-post-category_id">Category Id:</label>
            <?php echo form_input(['type'=>'number','value' => $update_post->category_id, 'class' => 'col-xs-6', 'id'=>'update-post-category_id', 'name'=>'update-post-category_id']);?>
        </p>
        <p class="col-xs-12">
            <label class="col-xs-6" for="update-post-slug">Slug:</label>
            <?php echo form_input(['type'=>'text','value' => $update_post->post_slug, 'class' => 'col-xs-6', 'id'=>'update-post-slug', 'name'=>'update-post-slug']);?>
        </p>
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
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=base_url().'assets/js/bootstrap.min.js'?>"></script>
</body>
</html>