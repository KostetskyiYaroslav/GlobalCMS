<div class="container body">

    <div class="row col-xs-9">
        <div class="posts">
            <?php foreach ($posts as $post) :?>
                <div class="single-post">
                    <h2 class="col-xs-9">
                        <?php echo anchor('posts/view/'.$post->post_slug, $post->post_title); ?>
                    </h2>
                    <article>
                        <?php if($post->post_attachment == '') : ?>
                            <img class="col-xs-4 img-thumbnail" src="<?=base_url('assets\uploads\welcome.jpg')?>">
                        <?php else : ?>
                            <img class="col-xs-4 img-thumbnail" src="<?=base_url("assets\\uploads\\".$post->post_attachment)?>">
                        <?php endif;  ?>
                        <p class="col-xs-8">
                            <?php $post->post_body = substr( $post->post_body, 0, 600 );?>
                            <?php echo $post->post_body . '...'; ?>
                            <?php echo anchor('posts/view/'.$post->post_slug, 'Click for more...'); ?>
                        </p>
                    </article>
                    <div class="col-xs-9">
                        <p class="popover-title">
                            Posted by <b><u><?php echo $post->post_author_name; ?></u></b> at <u><?php echo $post->post_date; ?></u> in <b><?php echo $post->category_name;?></b>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="row col-xs-3">
        <div class="sidebar">
            <h3><?php echo 'CodeIgniter Information'; ?></h3>
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