<div class="container body min-width-clearfix">
    <div class="row col-xs-12">
        <div class="posts">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>PATH</th>
                    <th>AUTHOR</th>
                    <th>PHOTO</th>
                    <th>DESCRIPTION</th>
                    <th class="danger">Operation</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($themes as $theme) :?>
                    <?php if($theme->activate == 1) : ?>
                        <tr class="label-success">
                    <?php else: ?>
                        <tr>
                    <?php endif; ?>
                    <th><?php echo $theme->id; ?></th>
                    <th><?php echo anchor('themes/edit/'.$theme->id,$theme->name); ?></th>
                    <th><?php echo $theme->path; ?></th>
                    <th><?php echo $theme->author; ?></th>
                    <?php if($theme->screenshot != '') : ?>
                        <th><img class="thumbnail col-xs-12" src="<?=$theme->screenshot?>"/></th>
                    <?php else: ?>
                        <th><img class="thumbnail col-xs-12" src="<?=base_url('/assets/themes').'/'.$theme->path.'/screenshot.PNG'?>"/></th>
                    <?php endif; ?>
                    <th><div><?php echo $theme->description = substr($theme->description, 0, 100 ); ?></div></th>
                    <th class="danger text-center ">
                        <?=anchor('themes/activate/'.$theme->id,'<i class="col-xs-12 glyphicon glyphicon-ok"></i>');?><br />
                        <?=anchor('themes/edit/'.$theme->id,'<i class="col-xs-12 glyphicon glyphicon-edit"></i>');?><br />
                        <?=anchor('themes/delete/'.$theme->id,'<i class="col-xs-12 glyphicon glyphicon-remove"></i>');?><br />
                    </th>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <a href="/themes/install" class="row col-xs-12 btn btn-success">Add new theme</a>
        </div>
    </div>
<?php $this->load->view('components/view_footer'); ?>