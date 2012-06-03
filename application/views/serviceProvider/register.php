<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<?php echo $head; ?>
<body>
<div class="container">
    <?php echo $header; ?>
    <div class="row">
        <div class="span8">
            <?php echo $navtabs; ?>

            <!-- CONTENT GOES HERE -->
            <div class="content">
                <p>
                    <header><h2>We find international jobs that match your skillset.</h2></header>
                    <ul>
                        <li>Fair wages (see here).</li>
                        <li>Opportunity to work from home for international customers.</li>
<li>Improve your skills with the feedback from mentors and customers.</li>
                    </ul>
                </p> 
            
                <form action='#' method='post' class="well">
                    <?php echo $form; ?>
                    <input type='submit' value='Apply now!' />
                </form>
            </div>    
        </div> <!-- /.span8 -->
        <?php echo $sidebar; ?>
    </div> <!-- /.row -->
</div> <!-- /.container -->
<?php echo $foot; ?>
</body></html>
