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
    </div>    <?php $this->load->view('components/view_footer'); ?>
