<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<?php include "templates/head.php"; ?>
<body>
<div class="container">
	<?php include "templates/header.php"; ?>
	<div class="row">
		<div class="span8">
			<?php include "templates/nav-tabs.php"; ?>
				
				<!-- CONTENT GOES HERE -->
				<?php include "about.php"; ?>
		</div> <!-- /.span8 -->
		<?php include "templates/sidebar-logged-in.php"; ?> 
	</div> <!-- /.row -->
</div> <!-- /.container -->
<?php include "templates/foot.php"; ?>
</body></html>
