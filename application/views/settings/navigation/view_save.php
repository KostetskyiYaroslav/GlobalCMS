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
        <?php echo form_open(); ?>
        <div class="col-xs-12">
            <label class="col-xs-4" for="save-navigation-name">Name:</label>
            <?php echo form_input(['type'=>'text', 'class' => 'input-field col-xs-6', 'id'=>'save-navigation-name', 'name'=>'save-navigation-name']);?>
        </div>
        <div class="col-xs-12">
            <label class="col-xs-4" for="save-navigation-link">Link:</label>
            <?php echo form_input(['type'=>'text', 'class' => 'input-field nav-item-link col-xs-3', 'id'=>'save-navigation-link', 'name'=>'save-navigation-link']);?>
            <div class="dropdown col-xs-3 ">
                <button class="col-xs-12 btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Posts List<span class="caret"></span></button>
                <ul class="row dropdown-menu">
                    <?php foreach ($posts as $post) : ?>
                        <li class="posts-list-item"><a href="#" id="<?=$post->post_id?>"><?=$post->post_title?></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
        <div class="col-xs-12">
            <label class="col-xs-4" for="save-navigation-priority">Priority:</label>
            <?php echo form_input(['type'=>'number', 'class' => 'input-field col-xs-6', 'id'=>'save-navigation-priority', 'name'=>'save-navigation-priority']);?>
        </div>
        <div class="col-xs-12">
            <?php echo form_input(['type'=>'submit', 'class' => 'btn col-xs-3','value'=>'Save']);?>
        </div>
        <?php echo form_close(); ?>
        <div class="col-xs-9">
            <p class="popover-title container">
                <?php echo $message; ?>
            </p>
        </div>
    </div>
<?php $this->load->view('components/view_footer'); ?>