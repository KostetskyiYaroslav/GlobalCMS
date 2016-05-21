<div class="container body">
    <div class="row col-xs-12">
        <div class="users">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>TEMPLATE</th>
                    <th class="danger">Operation</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($templates as $template) :?>
                    <tr>
                        <th><?php echo $template->id; ?></th>
                        <th><?php echo anchor('admin/templates_single/'.$template->id, $template->name); ?></th>
                        <th><?php echo $template->template; ?></th>
                        <th><?php echo anchor('admin/templates_delete/'.$template->id, $template->name); ?></th>
                        <th><?php echo anchor('admin/templates_edit/'.$template->id, $template->name); ?></th>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <a href="/admin/templates_save">New Templates</a>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=base_url().'assets/js/bootstrap.min.js'?>"></script>
</body>
</html>