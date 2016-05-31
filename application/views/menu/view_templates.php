<div class="container body ">
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
                        <th>
                            <?php echo anchor('admin/templates_delete/'.$template->id, '<i class="col-xs-6 glyphicon glyphicon-remove"></i>'); ?>
                            <?php echo anchor('admin/templates_edit/'.$template->id, '<i class="col-xs-6 glyphicon glyphicon-edit""></i>'); ?>
                        </th>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <a href="/admin/templates_save">New Templates</a>
        </div>
    </div>
<?php $this->load->view('components/view_footer'); ?>