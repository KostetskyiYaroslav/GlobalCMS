<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin Menu <span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li><?php echo anchor('admin/dashboard/users','Users Menu'); ?></li>
        <li><?php echo anchor('admin/dashboard/posts','Posts Menu'); ?></li>
        <li><?php echo anchor('admin/dashboard/pages','Pages Menu'); ?></li>
        <li role="separator" class="divider"></li>
        <li><a href="#">Separated link</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="#">Client Menu</a></li>
    </ul>
</li>