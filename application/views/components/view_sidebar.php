<div class="sidebar">
    <div>
        <p class="popover-title">Categories List</p>
        <?php foreach ($categories as $category) : ?>
            <a class="row" href="/categories/view/<?php echo $category->id;?>"><?php echo $category->name; ?></a>
        <?php endforeach; ?>
    </div>
    <div>
        <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds.</p>
    </div>
    <div id="outer-dropzone" class="col-xs-12 widget-location wdgt-sidebar-1 dropzone" title="wdgt-sidebar-1">
        <?php if(isset($widgets['wdgt-sidebar-1']) && !empty($widgets['wdgt-sidebar-1'])) : ?>
            <?php foreach ($widgets['wdgt-sidebar-1'] as $widgets_position => $item): ?>
                <?php $this->load->view('settings/widgets/'.$item->path.'/widget');?>
            <?php endforeach;?>
        <?php endif; ?>
    </div>
</div>