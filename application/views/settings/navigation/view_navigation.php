<div class="container body min-width-clearfix">
    <div class="row col-xs-12">
        <div class="users">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>LINK</th>
                    <th>PRIORITY</th>
                    <th class="danger">Operation</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($navigation as $item) :?>
                    <tr>
                        <th><?=$item->id?></th>
                        <th><?=anchor('navigation/edit/'.$item->id, $item->name); ?></th>
                        <th><?=$item->link?></th>
                        <th><?=$item->priority?></th>
                        <th>
                            <?= anchor('navigation/delete/'.$item->id, '<i class="col-xs-6 glyphicon glyphicon-remove""></i>'); ?>
                            <?= anchor('navigation/edit/'.$item->id, '<i class="col-xs-6 glyphicon glyphicon-edit""></i>'); ?>
                        </th>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <a href="/navigation/save" class="col-xs-12 btn btn-success">New Item</a>
        </div>
    </div>
<?php $this->load->view('components/view_footer'); ?>