<div class="container body">
    <div class="row col-xs-12">
        <div class="posts">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>BODY</th>
                    <th>AUTHOR</th>
                    <th>ATTACHMENT</th>
                    <th>DATE</th>
                    <th>TAGS</th>
                    <th>CATEGORY</th>
                    <th>SLUG</th>
                    <th class="danger">Operation</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($posts as $post) :?>
                    <tr>
                        <?php $post->post_body = substr($post->post_body,0,36); ?>
                        <?php if($post->post_author_id == $current_user->id) : ?>
                            <th class="success"><?php echo $post->post_id; ?></th>
                            <th class="success"><?php echo anchor('admin/post_single/'.$post->post_id,$post->post_title); ?></th>
                            <th class="success"><?php echo $post->post_body; ?></th>
                            <th class="success"><?php echo $post->post_author_name; ?></th>
                            <th class="success"><?php echo $post->post_attachment; ?></th>
                            <th class="success"><?php echo $post->post_date; ?></th>
                            <th class="success"><?php echo $post->post_tags; ?></th>
                            <th class="success"><?php echo $post->category_name; ?></th>
                            <th class="success"><?php echo $post->post_slug; ?></th>
                            <th class="danger">
                                <?php echo anchor('admin/post_delete/'.$post->post_id,'<i class="col-xs-6 glyphicon glyphicon-remove"></i>')?>
                                <?php echo anchor('admin/post_edit/'.$post->post_id,'<i class="col-xs-6 glyphicon glyphicon-edit"></i>')?>
                            </th>
                        <?php else: ?>
                            <th><?php echo $post->post_id; ?></th>
                            <th><?php echo anchor('admin/post_single/'.$post->post_id,$post->post_title); ?></th>
                            <th><?php echo $post->post_body; ?></th>
                            <th><?php echo $post->post_author_name; ?></th>
                            <th><?php echo $post->post_attachment; ?></th>
                            <th><?php echo $post->post_date; ?></th>
                            <th><?php echo $post->post_tags; ?></th>
                            <th><?php echo $post->category_name; ?></th>
                            <th><?php echo $post->post_slug; ?></th>
                            <th class="danger">
                                <?php echo anchor('admin/post_delete/'.$post->post_id,'<i class="col-xs-6 glyphicon glyphicon-remove"></i>')?>
                                <?php echo anchor('admin/post_edit/'.$post->post_id,'<i class="col-xs-6 glyphicon glyphicon-edit"></i>')?>
                            </th>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <a href="/admin/post_save">New Post</a>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=base_url().'assets/js/bootstrap.min.js'?>"></script>
</body>
</html>