<div class="container body">
    <div class="row col-xs-9">
        <div class="col-xs-12">
            <h2 class="col-xs-6">
                <?php echo $update_widget->name; ?>
            </h2>
            <h3 class="col-xs-6 text-right">
                <a href="" title="Come back" class="glyphicon glyphicon-step-backward" onclick="window.history.back();"></a>
            </h3>
        </div>
        <?php echo form_open(); ?>
        <p class="col-xs-12">
            <label class="col-xs-6" for="update-widget-id">Widget Id:</label>
            <?php echo form_input(['type'=>'number','value' => $update_widget->id, 'class' => 'col-xs-6','disabled'=>'disabled']);?>
            <?php echo form_input(['type'=>'number','value' => $update_widget->id, 'class' => 'col-xs-6', 'id'=>'update-widget-id', 'name'=>'update-widget-id', 'hidden'=>'hidden']);?>
        </p>
        <p class="col-xs-12">
            <label class="col-xs-6" for="update-widget-path">Widget Path:</label>
            <?php echo form_input(['type'=>'text','value' => $update_widget->path, 'class' => 'col-xs-6','disabled'=>'disabled']);?>
            <?php echo form_input(['type'=>'text','value' => $update_widget->path, 'class' => 'col-xs-6', 'id'=>'update-widget-path', 'name'=>'update-widget-path', 'hidden'=>'hidden']);?>
        </p>
        <p class="col-xs-12">
            <label class="col-xs-6" for="update-widget-name">Widget Name:</label>
            <?php echo form_input(['type'=>'text','value' => $update_widget->name, 'class' => 'col-xs-6', 'id'=>'update-widget-name', 'name'=>'update-widget-name']);?>
        </p>
        <p class="col-xs-12">
            <label class="col-xs-6" for="update-widget-priority">Widget Priority:</label>
            <?php echo form_input(['type'=>'number','value' => $update_widget->priority, 'class' => 'col-xs-6', 'id'=>'update-widget-priority', 'name'=>'update-widget-priority']);?>
        </p>
        <p class="col-xs-12">
            <label class="col-xs-6" for="update-widget-position">Widget Position:</label>
            <?php echo form_input(['type'=>'text','value' => $update_widget->position, 'class' => 'col-xs-6', 'id'=>'update-widget-position', 'name'=>'update-widget-position']);?>
        </p>
        <p class="col-xs-12">
            <label class="col-xs-6" for="update-widget-options">Widget Options:</label>
            <?php echo form_input(['type'=>'text','value' => $update_widget->options, 'class' => 'col-xs-6', 'id'=>'update-widget-options', 'name'=>'update-widget-options']);?>
        </p>
        <p class="col-xs-12">
            <label class="col-xs-6" for="update-widget-active">Widget Active:</label>
            <?php echo form_input(['type'=>'number','value' => $update_widget->active, 'class' => 'col-xs-6', 'id'=>'update-widget-active', 'name'=>'update-widget-active']);?>
        </p>
        <p class="col-xs-12">
            <label class="col-xs-6" for="update-widget-role_id">Widget Role Id:</label>
            <?php echo form_input(['type'=>'number','value' => $update_widget->role_id, 'class' => 'col-xs-6', 'id'=>'update-widget-role_id', 'name'=>'update-widget-role_id']);?>
        </p>
        <p class="col-xs-12 text-right">
            <?php echo form_input(['type'=>'submit','value' => 'Edit', 'class' => 'btn btn-success']);?>
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