<div class="container body">
    <div class="row col-xs-9">
        <div class="single-post">
            <div class="row col-xs-12">
                <h2 class="col-xs-9">
                    <?php echo $single_settings->name; ?>
                </h2>
                <h3 class="col-xs-3 text-right">
                    <a href="" title="Come back" class="glyphicon glyphicon-step-backward" onclick="window.history.back();"></a>
                    <?php if($current_user->role->access_lvl > 5) : ?>
                        <a href="/admin/settings_edit/<?php echo $single_settings->id;?>" title="Edit Settings" class="glyphicon glyphicon-edit" ></a>
                    <?php endif;?>
                </h3>
            </div>
            <article class="row col-xs-12">
                <div class="col-xs-8">
                    <?php echo $single_settings->value; ?>
                </div>
            </article>
        </div>
    </div>
    <section>

    </section>
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