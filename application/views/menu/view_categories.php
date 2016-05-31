<div class="container body ">
    <div class="row col-xs-12">
        <div class="users">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>TAGS</th>
                    <th>ROLE ID</th>
                    <th class="danger">Operation</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($categories as $category) :?>
                    <tr>
                        <th><?php echo $category->id; ?></th>
                        <th><?php echo anchor('admin/categories_single/'.$category->id, $category->name); ?></th>
                        <th><?php echo $category->tags; ?></th>
                        <th><?php echo $category->role_id; ?></th>
                        <th class="danger text-center">
                            <?php echo anchor('admin/categories_delete/'.$category->id,'<i class="col-xs-6 glyphicon glyphicon-remove"></i>')?>
                            <?php echo anchor('admin/categories_edit/'.$category->id,'<i class="col-xs-6 glyphicon glyphicon-edit"></i>')?>
                        </th>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <a href="/admin/categories_save">New Category</a>
        </div>
    </div>
<?php $this->load->view('components/view_footer'); ?>