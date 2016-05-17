<div class="container body">
    <div class="row col-xs-9">
        Logout page
     <!--   <?/*=form_open('auth/logout', ['class' => 'navbar-form navbar-left']) */?>
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
            <label for="conf-password" class="col-xs-2 control-label">Password</label>
            <div class="col-xs-6">
                <input type="password" class="form-control" id="conf-password" name="conf-password" placeholder="Password">
            </div>
        </div>
        <div class="row container form-group">
            <label for="email" class="col-xs-2 control-label">Email</label>
            <div class="col-xs-6">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>
        </div>
        <div class="row container form-group">
            <div class="col-xs-offset-2 col-xs-6">
                <button type="submit" class="btn btn-default">Sign Up</button>
            </div>
        </div>
        --><?/*=form_close()*/?>
    </div>
    <div class="container col-xs-3">
        <div class="sidebar">
            <h3>Some information</h3>
            <p>Some information</p>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=base_url().'assets/js/bootstrap.min.js'?>"></script>
</body>
</html>