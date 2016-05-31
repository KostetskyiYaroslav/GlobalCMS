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
<?php $this->load->view('components/view_footer', ['widgets' => $widgets]); ?>