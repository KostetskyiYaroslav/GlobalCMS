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
                    <th>ROLE ACCESS LEVEL</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user) :?>
                 <tr>
                     <th><?php echo $user->id; ?></th>
                     <th><?php echo $user->login; ?></th>
                     <th><?php echo $user->password; ?></th>
                     <th><?php echo $user->email; ?></th>
                     <th><?php echo $user->role_id; ?></th>
                     <th><?php echo $user->role_name; ?></th>
                     <th><?php echo $user->role_access_lvl; ?></th>
                 </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=base_url().'assets/js/bootstrap.min.js'?>"></script>
</body>
</html>