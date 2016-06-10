<div class="container body">
    <div class="row col-xs-9">
        <script>
            $().ready(function () {
                $('.posts-list-item').click(function (event) {
                    var post_id = $(event.target).attr('id');
                    $('.nav-item-link').val('/posts/view/'+post_id);
                });
            });
        </script>
        <div class="row col-xs-12">
            <h2 class="col-xs-6">
                <?=$item->name; ?>
            </h2>
            <h3 class="col-xs-6 text-right">
                <a href="" title="Come back" class="glyphicon glyphicon-step-backward" onclick="window.history.back();"></a>
            </h3>
        </div>
        <?php echo form_open('',['class' => 'row col-xs-12']); ?>
        <div class="row input-field col-xs-12">
            <label class="col-xs-6" for="update-id">Id:</label>
            <?php echo form_input(['type'=>'number','value' => $item->id, 'class' => 'col-xs-6', 'disabled'=>'disabled']);?>
            <?php echo form_input(['type'=>'number','value' => $item->id, 'class' => 'col-xs-6', 'id'=>'update-navigation-id', 'name'=>'update-navigation-id', 'hidden'=>'hidden']);?>
        </div>
        <div class="row input-field col-xs-12">
            <label class="col-xs-6" for="update-password">Name:</label>
            <?php echo form_input(['type'=>'text','value' => $item->name, 'class' => 'col-xs-6', 'id'=>'update-navigation-name', 'name'=>'update-navigation-name']);?>
        </div>
        <div class="row input-field col-xs-12">
            <label class="col-xs-6" for="update-email">Link:</label>
            <?php echo form_input(['type'=>'text','value' => $item->link, 'class' => 'nav-item-link col-xs-3', 'id'=>'update-navigation-link', 'name'=>'update-navigation-link']);?>
            <div class="dropdown col-xs-3 ">
                <button class="col-xs-12 btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Posts List<span class="caret"></span></button>
                <ul class="row dropdown-menu">
                    <?php foreach ($posts as $post) : ?>
                        <li class="posts-list-item"><a href="#" id="<?=$post->post_id?>"><?=$post->post_title?></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
        <div class="row input-field col-xs-12">
            <label class="col-xs-6" for="update-role-id">Priority:</label>
            <?php echo form_input(['type'=>'number','value' => $item->priority, 'class' => 'col-xs-6', 'id'=>'update-navigation-priority', 'name'=>'update-navigation-priority']);?>
        </div>
        <div class="row input-field col-xs-8 text-right">
            <?php echo form_input(['type'=>'submit','value' => 'Edit', 'class' => 'btn']);?>
        </div>
        <?php echo form_close(); ?>
        <div class="col-xs-9">
            <p class="row popover-title">
                <?php echo $message; ?>
            </p>
        </div>
    </div>
<?php $this->load->view('components/view_footer'); ?>