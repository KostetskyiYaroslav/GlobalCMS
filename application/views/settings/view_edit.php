<div class="container body">
    <div class="row col-xs-9">
        <div class="col-xs-12">
            <h2 class="col-xs-6">
                <?php echo $update_settings->name; ?>
            </h2>
            <h3 class="col-xs-6 text-right">
                <a href="" title="Come back" class="glyphicon glyphicon-step-backward" onclick="window.history.back();"></a>
            </h3>
        </div>
        <?php echo form_open(); ?>
        <p class="col-xs-12">
            <label class="col-xs-6" for="update-id">Setting id:</label>
            <?php echo form_input(['type'=>'number','value' => $update_settings->id, 'class' => 'col-xs-6','disabled'=>'disabled']);?>
            <?php echo form_input(['type'=>'number','value' => $update_settings->id, 'class' => 'col-xs-6', 'id'=>'update-id', 'name'=>'update-id', 'hidden'=>'hidden']);?>
        </p>
        <p class="col-xs-12">
            <label class="col-xs-6" for="update-id">Setting Name:</label>
            <?php echo form_input(['type'=>'text','value' => $update_settings->name, 'class' => 'col-xs-6','disabled'=>'disabled']);?>
            <?php echo form_input(['type'=>'text','value' => $update_settings->name, 'class' => 'col-xs-6', 'id'=>'update-name', 'name'=>'update-name', 'hidden'=>'hidden']);?>
        </p>
        <p class="col-xs-12">
            <label class="col-xs-6" for="update-id">Setting Value:</label>
            <?php echo form_input(['type'=>'text','value' => $update_settings->value, 'class' => 'col-xs-6', 'id'=>'update-value', 'name'=>'update-value']);?>
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
<?php $this->load->view('components/view_footer'); ?>