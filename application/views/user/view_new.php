<div class="container body">
    <div class="row col-xs-9">
        <div class="col-xs-12">
            <h2 class="col-xs-6">
                <?php echo $title; ?>
            </h2>
            <h3 class="col-xs-6 text-right">
                <a href="" title="Come back" class="glyphicon glyphicon-step-backward" onclick="window.history.back();"></a>
                <a href="" title="Edit user" class="glyphicon glyphicon-edit" ></a>
            </h3>
        </div>
        <?php echo form_open('', ['class="form"'])?>
        <label class="col-xs-6" for="new-login">Login*</label>
        <input id="new-login"  name="new-login" class="col-xs-6"/>
        <label class="col-xs-6" for="new-password">Password*</label>
        <input id="new-password"  name="new-password" class="col-xs-6"/>
        <label class="col-xs-6" for="new-email">Email*</label>
        <input id="new-email"  name="new-email" class="col-xs-6"/>
        <label class="col-xs-6" for="new-role-id">Role Id</label>
        <input id="new-role-id"  name="new-role-id" class="col-xs-6"/>
        <label class="col-xs-6" for="new-date-created">Date Create</label>
        <input id="new-date-created" name="new-date-created" class="col-xs-6"/>
        <input type="submit" class="btn" value="Create"/>
        <?php echo form_close()?>
        <div class="col-xs-9">
            <p class="popover-title container">
                <?php echo $message;?>
            </p>
        </div>
    </div>
    <div class="row col-xs-3">
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