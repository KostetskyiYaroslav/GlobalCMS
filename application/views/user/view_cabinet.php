<div class="container body">
    <div class="col-xs-9">
        <div class=" col-xs-12">
            <h2 class=" col-xs-6">
                <?php echo $cabinet_user->login; ?>
            </h2>
            <h3 class="col-xs-6 text-right">
                <a href="" title="Come back" class="glyphicon glyphicon-step-backward" onclick="window.history.back();"></a>
                <a href="" title="Edit user" class="glyphicon glyphicon-edit" ></a>
            </h3>
        </div>
        <?php echo form_open(); ?>
        <?php if( TRUE || $cabinet_user->avatar == '') : ?>
            <img class="col-xs-4 img-thumbnail" src="<?=base_url('assets/uploads/static/default-user.png')?>">
        <?php else : ?>
            <img class="col-xs-4 img-thumbnail" src="<?=base_url("assets/uploads/users/".$cabinet_user->post_attachment)?>">
        <?php endif;  ?>
        <p class="col-xs-8">
            <label class="col-xs-6" for="update-id">User id:</label>
            <?php echo form_input(['type'=>'number','value' => $cabinet_user->id, 'class' => 'col-xs-6','disabled'=>'disabled']);?>
            <?php echo form_input(['type'=>'number','value' => $cabinet_user->id, 'class' => 'col-xs-6', 'id'=>'update-id', 'name'=>'update-id', 'hidden'=>'hidden']);?>
        </p>
        <p class="col-xs-8">
            <label class="col-xs-6" for="update-password">Password:</label>
            <?php echo form_input(['type'=>'text','value' => $cabinet_user->password, 'class' => 'col-xs-6', 'id'=>'update-password', 'name'=>'update-password']);?>
        </p>
        <p class="col-xs-8">
            <label class="col-xs-6" for="update-email">Email:</label>
            <?php echo form_input(['type'=>'email','value' => $cabinet_user->email, 'class' => 'col-xs-6', 'id'=>'update-email', 'name'=>'update-email']);?>
        </p>
        <p class="col-xs-8">
            <label class="col-xs-6" for="update-role-id">Role id:</label>
            <?php echo form_input(['type'=>'number','value' => $cabinet_user->role_id, 'class' => 'col-xs-6', 'id'=>'update-role-id', 'name'=>'update-role-id']);?>
        </p>
        <p class="col-xs-8">
            <label class="col-xs-6"  for="update-date">Date created:</label>
            <?php echo form_input(['type'=>'datetime','value' => $cabinet_user->date_created, 'class' => 'col-xs-6', 'id'=>'update-date', 'name'=>'update-date']);?>
        </p>
        <p class="col-xs-8 text-right">
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