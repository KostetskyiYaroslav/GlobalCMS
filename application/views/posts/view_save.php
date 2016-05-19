<!--Load TinyMCE-->
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<!--end Load TinyMCE-->
<div class="container body">
    <div class="row col-xs-9">
        <?php echo form_open(); ?>
        <p class="col-xs-12">
            <label class="col-xs-6" for="save-post-title">Title:</label>
            <?php echo form_input(['type'=>'text', 'class' => 'col-xs-6', 'id'=>'save-post-title', 'name'=>'save-post-title']);?>
        </p>
        <p class="col-xs-12">
            <label class="col-xs-6" for="save-post-body">Body:</label>
            <?php echo form_input(['type'=>'text', 'class' => 'col-xs-6', 'id'=>'save-post-body', 'name'=>'save-post-body']);?>
        </p>
        <p class="col-xs-12">
            <label class="col-xs-6" for="save-post-author_id">Author id:</label>
            <?php echo form_input(['type'=>'number', 'class' => 'col-xs-6', 'id'=>'save-post-author_id', 'name'=>'save-post-author_id']);?>
        </p>
        <p class="col-xs-12">
            <label class="col-xs-6" for="save-post-attachment">Attachment:</label>
            <?php echo form_input(['type'=>'file', 'class' => 'col-xs-6', 'id'=>'save-post-attachment', 'name'=>'save-post-attachment']);?>
        </p>
        <p class="col-xs-12">
            <label class="col-xs-6" for="save-post-date">Date:</label>
            <?php echo form_input(['type'=>'datetime', 'class' => 'col-xs-6', 'id'=>'save-post-date', 'name'=>'save-post-date']);?>
        </p>
        <p class="col-xs-12">
            <label class="col-xs-6" for="save-post-tags">Tag's:</label>
            <?php echo form_input(['type'=>'text', 'class' => 'col-xs-6', 'id'=>'save-post-tags', 'name'=>'save-post-tags']);?>
        </p>
        <p class="col-xs-12">
            <label class="col-xs-6" for="save-post-category_id">Category id:</label>
            <?php echo form_input(['type'=>'number', 'class' => 'col-xs-6', 'id'=>'save-post-category_id', 'name'=>'save-post-category_id']);?>
        </p>
        <p class="col-xs-12">
            <label class="col-xs-6" for="save-post-slug">Slug:</label>
            <?php echo form_input(['type'=>'text', 'class' => 'col-xs-6', 'id'=>'save-post-slug', 'name'=>'save-post-slug']);?>
        </p>
        <p class="col-xs-12">
            <?php echo form_input(['type'=>'submit', 'class' => 'btn col-xs-3','value'=>'Save']);?>
        </p>
        <?php echo form_close(); ?>
        <div class="col-xs-9">
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