<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>
<?php echo form_open($this->uri->uri_string(), 'class="well"'); ?>
<form class="well" action="http://transfair.local/index.php/auth/login" method="post" accept-charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url() . 'bootstrap/css/bootstrap.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url() . 'css/styles.css'; ?>">
<fieldset>
	<label for="<?php echo $login['id']; ?>">
		<span><?php echo $login_label; ?></span>
		<span style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></span>
	</label>
		<?php echo form_input($login); ?>
		<span style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></span>

	<label for="<?php echo $password['id']; ?>">
		<span>Password</span>	
		<span style="color: red;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></span>
	</label>
	<?php echo form_password($password); ?>

	
	<label for="<?php echo $remember['id']; ?>">
		<?php echo form_checkbox($remember); ?>
		<span>Remember me</span>
	</label>
	<p><?php echo anchor('/auth/forgot_password/', 'Forgot password'); ?></p>
	<p><?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Register'); ?></p>
</fieldset>
<?php echo form_submit('submit', 'Login', 'class="btn btn-primary"'); ?>
<?php echo form_close(); ?>