<div class="container body">
    <!--Load TinyMCE-->
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <!--end Load TinyMCE-->
    <div class="row col-xs-9">
        <div class="col-xs-12">
            <h2 class="col-xs-6">
                <?php echo $update_template->name; ?>
            </h2>
            <h3 class="col-xs-6 text-right">
                <a href="" title="Come back" class="glyphicon glyphicon-step-backward" onclick="window.history.back();"></a>
            </h3>
        </div>
        <?php echo form_open(); ?>
        <p class="col-xs-12">
            <label class="col-xs-6" for="update-id">Template id:</label>
            <?php echo form_input(['type'=>'number','value' => $update_template->id, 'class' => 'col-xs-6','disabled'=>'disabled']);?>
            <?php echo form_input(['type'=>'number','value' => $update_template->id, 'class' => 'col-xs-6', 'id'=>'update-id', 'name'=>'update-id', 'hidden'=>'hidden']);?>
        </p>
        <p class="col-xs-12">
            <label class="col-xs-4" for="update-template">Template:</label><br />
            <textarea id="update-template" name="update-template" class="col-xs-8" rows="10"><?php echo$update_template->template; ?></textarea>
        </p>
        <p class="col-xs-12 text-right">
            <?php echo form_input(['type'=>'submit','value' => 'Edit', 'class' => 'btn']);?>
        </p>
        <?php echo form_close(); ?>
        <div class="col-xs-9">
            <p class="row popover-title">
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