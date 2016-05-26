<div class="container body">
    <div class="row col-xs-12">
        <div class="analytics">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>NAME</th>
                    <th>COUNT</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($analytics as $analytic) :?>
                    <tr>
                        <th>
                            <?=$analytic['name']?>
                        </th>
                        <th>
                            <?=$analytic['count']?>
                        </th>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=base_url().'assets/js/bootstrap.min.js'?>"></script>
</body>
</html>