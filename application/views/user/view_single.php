<div class="container body">
    <div class="row col-xs-9">
        <div class="single-post">
            <div class="col-xs-12">
                <h2 class="col-xs-6">
                    <?php echo $single_user->login; ?>
                </h2>
                <h3 class="col-xs-6 text-right">
                    <a href="" title="Come back" class="glyphicon glyphicon-step-backward" onclick="window.history.back();"></a>
                    <?php if (isset($current_user)) :?>
                        <?php if($current_user->role->access_lvl> 5) : ?>
                            <a href="/admin/user_edit/<?php echo $single_user->login;?>" title="Edit user" class="glyphicon glyphicon-edit" ></a>
                        <?php endif;?>
                    <?php endif;?>
                </h3>
            </div>
            <section>
                <?php if( TRUE || $single_user->avatar == '') : ?>
                    <img class="col-xs-4 img-thumbnail" src="<?=base_url('assets/uploads/static/default-user.png')?>">
                <?php else : ?>
                    <img class="col-xs-4 img-thumbnail" src="<?=base_url("assets/uploads/users/".$single_user->attachment)?>">
                <?php endif;  ?>
                <p class="col-xs-8">
                    <label class="col-xs-6" for="email">
                        Email:
                    </label>
                    <input class="col-xs-6" name="email" id="email" type="email" value="<?php echo $single_user->email;?>" disabled />
                </p>
                <p class="col-xs-8">
                    <label class="col-xs-6"  for="role-name">
                        Role name:
                    </label>
                    <input class="col-xs-6" name="role-name" id="role-name" type="text" value="<?php echo $single_user->role_name;?>" disabled/>
                </p>
                <p class="col-xs-8">
                    <label class="col-xs-6"  for="date">
                        Date created:
                    </label>
                    <input class="col-xs-6" name="date" id="date" type="datetime" value="<?php echo $single_user->date_created;?>" disabled/>
                </p>
            </section>
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