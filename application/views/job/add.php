<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<?php echo $head; ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(). 'uploadify/uploadify.css' ?>">
<body>
<div class="container">
    <?php echo $header; ?>
    <div class="row">
        <div class="span8">
            <?php echo $navtabs; ?>

            <input type="file" name="file_upload" id="file_upload" />

        </div> <!-- /.span8 -->
        <?php echo $sidebar; ?>
    </div> <!-- /.row -->
</div> <!-- /.container -->
<?php echo $foot; ?>

<script type="text/javascript" src="<?php echo base_url() . 'uploadify/jquery.uploadify-3.1.min.js' ?>"></script>
<script type="text/javascript">
$(function() {
    $('#file_upload').uploadify({
        'swf'      : 'uploadify/uploadify.swf',
        'uploader' : 'uploadify/uploadify.php'
        // Your options here
    });
});
</script>

</body></html>