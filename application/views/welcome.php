Hi, <strong><?php echo $username; ?></strong>! You are logged in now.
<br>
<?php echo anchor('/serviceProvider/index/', 'serviceProvider'); ?>
<br>
<?php echo anchor('/client/index/', 'client'); ?>
<br>
<?php echo anchor('/admin/index/', 'admin'); ?>
<br>
<?php echo anchor('/auth/logout/', 'Logout'); ?>