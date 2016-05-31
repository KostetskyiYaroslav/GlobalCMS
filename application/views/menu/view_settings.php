<div class="container body min-width-clearfix">
    <div class="row col-xs-12">
        <div class="users">
            <table class="table table-bordered">
                <tbody >
                <tr >
                    <th class="text-center col-xs-4"><a href="/settings/widgets">Widgets</a></th>
                    <th class="text-center col-xs-4"><a href="/settings/themes">Themes</a></th>
                    <th class="text-center col-xs-4"><a href="/settings/smintresting">Ще придумаю :)</a></th>
                </tr>
                </tbody>
            </table>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>Value</th>
                    <th class="danger">Operation</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($settings as $setting) :?>
                    <tr>
                        <th><?=$setting->id?></th>
                        <th><?=anchor('admin/settings_single/'.$setting->id, $setting->name); ?></th>
                        <th><?=$setting->value?></th>
                        <th>
                            <?= anchor('admin/settings_edit/'.$setting->id, '<i class="col-xs-6 glyphicon glyphicon-edit""></i>'); ?>
                        </th>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <a href="/admin/settings_save">New Settings</a>
        </div>
    </div>
<?php $this->load->view('components/view_footer'); ?>