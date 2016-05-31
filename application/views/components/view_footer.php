<div class="row container body">
    <div class="col-xs-4 widget-location wdgt-footer-1">
        <?php if(isset($widgets['wdgt-footer-1']) && $widgets['wdgt-footer-1']->active == 1) : ?>
            <?php $this->load->view('settings/widgets/'.$widgets['wdgt-footer-1']->path.'/widget');?>
        <?php endif;?>
    </div>
    <div class="col-xs-4 widget-location wdgt-footer-2">
        <?php if(isset($widgets['wdgt-footer-2']) && $widgets['wdgt-footer-2']->active == 1) : ?>
            <?php $this->load->view('settings/widgets/'.$widgets['wdgt-footer-2']->path.'/widget');?>
        <?php endif;?>
    </div>
    <div class="col-xs-4 widget-location wdgt-footer-3">
        <?php if(isset($widgets['wdgt-footer-3']) && $widgets['wdgt-footer-3']->active == 1) : ?>
            <?php $this->load->view('settings/widgets/'.$widgets['wdgt-footer-3']->path.'/widget');?>
        <?php endif;?>
    </div>
    <div class="row col-xs-12">
    </div>
</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=base_url().'assets/js/bootstrap.min.js'?>"></script>
</body>
</html>
