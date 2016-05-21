<div class="container body">
    <div class="row col-xs-9">
        <div class="posts">
            <?php foreach ($posts as $post) :?>
                <div class="single-post">
                    <h2 class="col-xs-9">
                        <?php echo anchor('posts/view/'.$post->post_id, $post->post_title); ?>
                    </h2>
                    <article>
                        <?php if($post->post_attachment == '') : ?>
                            <img class="col-xs-4 img-thumbnail" src="<?=base_url('assets/uploads/static/default-post.png')?>">
                        <?php else : ?>
                            <img class="col-xs-4 img-thumbnail" src="<?=base_url("assets/uploads/posts/".$post->post_attachment)?>">
                        <?php endif;  ?>
                        <div class="col-xs-8">
                            <?php $post->post_body = substr( $post->post_body, 0, 200 );?>
                            <?php echo $post->post_body . '...'; ?>
                            <?php echo anchor('posts/view/'.$post->post_id, 'Click for more...'); ?>
                        </div>
                    </article>
                    <div class="col-xs-9">
                        <div class="popover-title">
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="row col-xs-3">
        <div class="sidebar">
            <div class="">
                <p class="popover-title">Categories List</p>
                <?php foreach ($categories as $category) : ?>
                <a href="/categories/view/<?php echo $category->id;?>"><?php echo $category->name; ?></a>
            <?php endforeach; ?>
            </div>
            <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds.</p>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=base_url().'assets/js/bootstrap.min.js'?>"></script>
</body>
</html>