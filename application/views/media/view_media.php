<div class="container body min-width-clearfix">
    <div class="col-xs-12">
        <link href="/assets/css/tooltipster.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="/assets/js/jquery.tooltipster.min.js"></script>
        <script src="/assets/js/clipboard.js"></script>
        <script>

            //TODO: Do method to get clicked media files ID

            $(document).ready(function() {
                $('.media-file-info').tooltipster({
                    trigger: 'click',
                    content: $('<span>Will be information</span>')
                });
            });
            new Clipboard('#btn-copy', {
                text: function(trigger) {
                    alert('Copied!');
                    return trigger.getAttribute('data-clipboard-text');
                }
            });
        </script>
        <div class="posts row ">
            <table class="table table-bordered col-xs-12">
                <thead >
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>HASH NAME</th>
                    <th>TYPE</th>
                    <th>AUTHOR ID</th>
                    <th class="danger">Operation</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($media_files as $file) :?>
                    <tr>
                        <th><?=$file->id?></th>
                        <th class="col-xs-2 media-file-info" id="<?=$file->id?>"><?=anchor('media/edit/'.$file->id,$file->name); ?></th>
                        <th><?=$file->hash_name?></th>
                        <th><?=$file->type?></th>
                        <th><?=$file->author_id?></th>
                        <th class="danger text-center ">
                            <?=anchor('media/edit/'.$file->id,'<i class="col-xs-12 glyphicon glyphicon-edit"></i>');?><br />
                            <?=anchor('media/delete/'.$file->id,'<i class="col-xs-12 glyphicon glyphicon-remove"></i>');?><br />
                            <button id="btn-copy" class="btn btn-info" data-clipboard-text="<?=$file->share_link?>">
                                Copy link!
                            </button>
                        </th>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <a href="/media/save" class="row col-xs-12 btn btn-success">Add new Media File</a>
        </div>
    </div>
<?php $this->load->view('components/view_footer'); ?>