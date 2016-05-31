<div class="row container body">
    <div id="outer-dropzone" class="col-xs-4 widget-location wdgt-footer-1 dropzone" title="wdgt-footer-1">
        <?php if(isset($widgets['wdgt-footer-1']) && $widgets['wdgt-footer-1']->active == 1) : ?>
            <?php $this->load->view('settings/widgets/'.$widgets['wdgt-footer-1']->path.'/widget');?>
        <?php endif;?>
    </div>
    <div id="outer-dropzone" class="col-xs-4 widget-location wdgt-footer-2 dropzone" title="wdgt-footer-2">
        <?php if(isset($widgets['wdgt-footer-2']) && $widgets['wdgt-footer-2']->active == 1) : ?>
            <?php $this->load->view('settings/widgets/'.$widgets['wdgt-footer-2']->path.'/widget');?>
        <?php endif;?>
    </div>
    <div id="outer-dropzone" class="col-xs-4 widget-location wdgt-footer-3 dropzone" title="wdgt-footer-3">
        <?php if(isset($widgets['wdgt-footer-3']) && $widgets['wdgt-footer-3']->active == 1) : ?>
            <?php $this->load->view('settings/widgets/'.$widgets['wdgt-footer-3']->path.'/widget');?>
        <?php endif;?>
    </div>
</div>
</div>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=base_url().'assets/js/bootstrap.min.js'?>"></script>
</body>
</html>
