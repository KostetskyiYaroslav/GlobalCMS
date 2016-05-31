<div class="container body">
    <div class="row col-xs-9">
        <?php if( isset( $message ) ) { ?>
            <div class="contrainer alert alert-info" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <?=$message?>
            </div>
        <?php } ?>
        <?=form_open('', ['class' => 'navbar-form navbar-left']) ?>
        <div class="row container form-group">
            <label for="restore-login" class="col-xs-2 control-label">Login</label>
            <div class="col-xs-6">
                <input type="text" class="form-control" id="restore-login" name="restore-login" placeholder="Login"/>
            </div>
        </div>
        <div class="row container form-group">
            <div class="col-xs-offset-2 col-xs-6">
                <button type="submit" class="btn btn-default">Restore</button>
            </div>
        </div>
        <?=form_close()?>
    </div>
    <div class="container col-xs-3">
        <div class="sidebar">
            <h3>Some information</h3>
            <p>Some information</p>
        </div>
    </div>    <?php $this->load->view('components/view_footer'); ?>
