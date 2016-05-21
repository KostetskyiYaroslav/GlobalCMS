<div class="container body">
    <div class="row col-xs-12">
        <div class="users">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>LOGIN</th>
                    <th>PASSWORD</th>
                    <th>EMAIL</th>
                    <th>ROLE ID</th>
                    <th>ROLE NAME</th>
                    <th>ROLE ACCESS</th>
                    <th class="danger">Operation</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user) :?>
                    <tr>
                        <?php if($user->id == $current_user->id) : ?>
                            <th class="success"><?php echo $user->id; ?></th>
                            <th class="success"><?php echo anchor('admin/user_single/'.$user->login,$user->login); ?></th>
                            <th class="success"><?php echo $user->password; ?></th>
                            <th class="success"><?php echo $user->email; ?></th>
                            <th class="success"><?php echo $user->role_id; ?></th>
                            <th class="success"><?php echo $user->role_name; ?></th>
                            <th class="success"><?php echo $user->role_access_lvl; ?></th><th class="danger">
                                <?php echo anchor('admin/user_delete/'.$user->id,'<i class="col-xs-6 glyphicon glyphicon-remove"></i>')?>
                                <?php echo anchor('admin/user_edit/'.$user->login,'<i class="col-xs-6 glyphicon glyphicon-edit"></i>')?>
                            </th>
                        <?php else: ?>
                            <th><?php echo $user->id; ?></th>
                            <th><?php echo anchor('admin/user_single/'.$user->login,$user->login); ?></th>
                            <th><?php echo $user->password; ?></th>
                            <th><?php echo $user->email; ?></th>
                            <th><?php echo $user->role_id; ?></th>
                            <th><?php echo $user->role_name; ?></th>
                            <th><?php echo $user->role_access_lvl; ?></th>
                            <?php if($user->role_access_lvl < $current_user->role->access_lvl ) : ?>
                                <th class="danger">
                                    <?php echo anchor('admin/user_delete/'.$user->id,'<i class="col-xs-6 glyphicon glyphicon-remove"></i>')?>
                                    <?php echo anchor('admin/user_edit/'.$user->login,'<i class="col-xs-6 glyphicon glyphicon-edit"></i>')?>
                                </th>
                            <?php endif; ?>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <a href="/admin/user_save">New User</a>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=base_url().'assets/js/bootstrap.min.js'?>"></script>
</body>
</html>