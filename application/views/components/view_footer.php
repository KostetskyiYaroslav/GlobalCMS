<div class="row container body">
    <div class="col-xs-4 widget-location wdgt-footer-1">
        <?php if(isset($widgets['wdgt-footer-1']) && !empty($widgets['wdgt-footer-1'])) : ?>
            <?php foreach ($widgets['wdgt-footer-1'] as $widgets_position => $item): ?>
                <?php $this->load->view('settings/widgets/'.$item->path.'/widget');?>
            <?php endforeach;?>
        <?php endif; ?>
    </div>
    <div class="col-xs-4 widget-location wdgt-footer-2">
        <?php if(isset($widgets['wdgt-footer-2']) && !empty($widgets['wdgt-footer-2'])) : ?>
            <?php foreach ($widgets['wdgt-footer-2'] as $widgets_position => $item): ?>
                <?php $this->load->view('settings/widgets/'.$item->path.'/widget');?>
            <?php endforeach;?>
        <?php endif; ?>
    </div>
    <div class="col-xs-4 widget-location wdgt-footer-3">
        <?php if(isset($widgets['wdgt-footer-3']) && !empty($widgets['wdgt-footer-3'])) : ?>
            <?php foreach ($widgets['wdgt-footer-3'] as $widgets_position => $item): ?>
                <?php $this->load->view('settings/widgets/'.$item->path.'/widget');?>
            <?php endforeach;?>
        <?php endif; ?>
    </div>
</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=base_url().'assets/js/bootstrap.min.js'?>"></script>
</body>
</html>
