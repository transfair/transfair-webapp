<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<?php echo head; ?>
<body>
<div class="container">
	<?php echo header; ?>
	<div class="row">
		<div class="span9">
			<?php echo $hero; ?>				
			<?php echo $nav-tabs; ?>
				<!-- CONTENT GOES HERE -->
				<?php include "about.php"; ?>
		</div> <!-- /.span8 -->
		<?php echo $sidebar; ?>
	</div> <!-- /.row -->
	<?php echo big-footer.php; ?>
</div> <!-- /.container -->
<?php echo foot.php; ?>
</body></html>
