<div class="container body">
    <div class="row col-xs-9">
        <?php if( isset( $error ) ) { ?>
            <div class="contrainer alert alert-danger" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span>
                <?=$error?>
            </div>
        <?php } ?>
        <?=form_open('auth/login', ['class' => 'navbar-form navbar-left']) ?>
        <div class="row container form-group">
            <label for="login" class="col-xs-2 control-label">Login</label>
            <div class="col-xs-6">
                <input type="text" class="form-control" id="login" name="login" placeholder="Login"/>
            </div>
        </div>
        <div class="row container form-group">
            <label for="password" class="col-xs-2 control-label">Password</label>
            <div class="col-xs-6">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
        </div>
        <div class="row container form-group">
            <div class="col-xs-offset-2 col-xs-6">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" id="remember"> Remember me
                    </label>
                </div>
            </div>
        </div>
        <div class="row container form-group">
            <div class="col-xs-offset-2 col-xs-6">
                <button type="submit" class="btn btn-default">Log In</button>
                <?php if( isset( $error ) ) { ?>
                    <a type="information" href="/auth/restore" class="alert-info">Forgot password?</a>
                <?php } ?>
            </div>
        </div>
        <?=form_close()?>
    </div>
    <div class="row col-xs-3">
        <?php $this->load->view('components/view_sidebar', ['categories' => $this->data['categories']]);?>
    </div>
<?php $this->load->view('components/view_footer'); ?>