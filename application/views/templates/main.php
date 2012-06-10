<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Transfair</title>
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="<?php echo base_url() . 'bootstrap/css/bootstrap.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url() . 'css/styles.css'; ?>">
</head>
<body>
<div class="container">
	<?php echo $header; ?>
	<div class="row">
		<div class="span9">
            <?php echo $hero; ?>				
			<?php echo $navtabs; ?>
                
            <div class="content">
                <?php echo $content; ?>
            </div>
		</div> <!-- /.span9 -->
		<?php echo $sidebar; ?>
	</div> <!-- /.row -->
	<?php echo $footer; ?>
</div> <!-- /.container -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo base_url() . 'js/libs/jquery-1.7.2.min.js"><\/script>'; ?>');</script>
<script src="<?php echo base_url() . 'js/scripts.js' ?>"></script>
</body></html>
