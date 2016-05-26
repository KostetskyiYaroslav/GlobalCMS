<div class="container body min-width-clearfix">
    <div class="row col-xs-12">
        <div class="users">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>Value</th>
                    <th class="danger">Operation</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($settings as $setting) :?>
                    <tr>
                        <th><?=$setting->id?></th>
                        <th><?=anchor('admin/settings_single/'.$setting->id, $setting->name); ?></th>
                        <th><?=$setting->value?></th>
                        <th>
                            <?= anchor('admin/settings_edit/'.$setting->id, '<i class="col-xs-6 glyphicon glyphicon-edit""></i>'); ?>
                        </th>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <a href="/admin/settings_save">New Settings</a>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=base_url().'assets/js/bootstrap.min.js'?>"></script>
</body>
</html>