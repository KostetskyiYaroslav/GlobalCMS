<div class="container body">
    <div class="row col-xs-9">
        <div class="row col-xs-12 single-post">
            <div class="row col-xs-12">
                <h2 class="col-xs-9">
                    <?php echo $single_post->post_title; ?>
                </h2>
                <h3 class="col-xs-3 text-right">
                    <a href="" title="Come back" class="glyphicon glyphicon-step-backward" onclick="window.history.back();"></a>
                    <?php if (isset($current_user)) :?>
                        <?php if( $current_user->role->access_lvl > 5 || $single_post->author_id == $current_user->id) : ?>
                            <a href="/admin/post_edit/<?php echo $single_post->post_id;?>" title="Edit Post" class="glyphicon glyphicon-edit" ></a>
                        <?php endif;?>
                    <?php endif;?>
                </h3>
            </div>
            <article class="row col-xs-12">
                <?php if($single_post->post_attachment == '') : ?>
                    <img class="col-xs-4 img-thumbnail" src="<?=base_url('assets/uploads/static/default-post.png')?>">
                <?php else : ?>
                    <img class="col-xs-4 img-thumbnail" src="<?=base_url("assets/uploads/posts/".$single_post->post_attachment)?>">
                <?php endif;  ?>
                <div class="col-xs-8">
                    <?php echo $single_post->post_body; ?>
                </div>
            </article>
            <div class="col-xs-12">
                <p class="popover-title">
                    Posted by <b><?php echo anchor('users/single/'.$single_post->post_author_name,$single_post->post_author_name);?></b> at <u><?php echo $single_post->post_date; ?></u> in <b><?php echo $single_post->category_name;?></b>
                </p>
            </div>
        </div>
        <div class="row col-xs-12 single-post-comments">
            <?php if($single_post->comments != null) : ?>
                <?php foreach ($single_post->comments as $comment) : ?>
                    <div class=" col-xs-12 single-post-comment">
                        <div class="col-xs-3 text-center">
                            <div class="row">
                                <?php echo anchor('users/single/'.$comment->user_login, $comment->user_login).' - '.$comment->user_role; ?>
                            </div>
                            <div class="row">
                                <?php echo $comment->comment_date; ?>
                            </div>
                        </div>
                        <div class="col-xs-9">
                            <?php echo $comment->comment_body; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
            <?php endif;?>
        </div>
    </div>
    <section>

    </section>
    <div class="row col-xs-3">
        <div class="sidebar">
            <h3>Some information</h3>
            <p>Some information</p>
        </div>
    </div>
<?php $this->load->view('components/view_footer'); ?>