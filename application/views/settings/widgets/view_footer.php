<div class="text-center row container body">
    <div id="outer-dropzone" class="col-xs-4 widget-location wdgt-footer-1 dropzone" title="wdgt-footer-1">
        <?php if(isset($widgets['wdgt-footer-1']) && !empty($widgets['wdgt-footer-1'])) : ?>
            <?php foreach ($widgets['wdgt-footer-1'] as $widgets_position => $item): ?>
                <div id="widget" class="col-xs-12 row draggable drag-drop" title="<?=$item->id?>">#<?=$item->name?>, priority:<?=$item->priority?></div>
                <?php //$this->load->view('settings/widgets/'.$item->path.'/widget');?>
            <?php endforeach;?>
        <?php endif; ?>
    </div>
    <div id="outer-dropzone" class="col-xs-4 widget-location wdgt-footer-2 dropzone" title="wdgt-footer-2">
        <?php if(isset($widgets['wdgt-footer-2']) && !empty($widgets['wdgt-footer-2'])) : ?>
            <?php foreach ($widgets['wdgt-footer-2'] as $widgets_position => $item): ?>
                <div id="widget" class="col-xs-12 row draggable drag-drop" title="<?=$item->id?>">#<?=$item->name?>, priority:<?=$item->priority?></div>
                <?php //$this->load->view('settings/widgets/'.$item->path.'/widget');?>
            <?php endforeach;?>
        <?php endif; ?>
    </div>
    <div id="outer-dropzone" class="col-xs-4 widget-location wdgt-footer-3 dropzone" title="wdgt-footer-3">
        <?php if(isset($widgets['wdgt-footer-3']) && !empty($widgets['wdgt-footer-3'])) : ?>
            <?php foreach ($widgets['wdgt-footer-3'] as $widgets_position => $item): ?>
                <div id="widget" class="col-xs-12 row draggable drag-drop" title="<?=$item->id?>">#<?=$item->name?>, priority:<?=$item->priority?></div>
                <?php //$this->load->view('settings/widgets/'.$item->path.'/widget');?>
            <?php endforeach;?>
        <?php endif; ?>
    </div>
</div>
</div>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=base_url().'assets/js/bootstrap.min.js'?>"></script>
</body>
</html>
