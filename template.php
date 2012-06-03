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
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>

<div class="container">

<header>
	<h1>Transfair</h1>
</header>

<div class="row">
  <div class="span8">
  	<img src="img/keyboard.jpg" alt="" />
	<nav>
		<ul class="nav nav-tabs">
			<li class="active"><a href="#">About Transfair</a></li>
			<li><a href="#">Create a job</a></li>
			<li><a href="#">Become a partner</a></li>
		</ul>
	</nav>  
	<form>
		<fieldset id="group">
			<legend>Group 0</legend>
		
			<label for="camelCase">
				<span>Field Name</span>
				<input id="camelCase" aria-describedby="explaination">
			</label>
			<p class="explanation" id="explanation">This is why we want this</p>
		
			<label for="camelCase1">
				<span>Field Name</span>
				<input id="camelCase1">
			</label>
		</fieldset>
		<fieldset id="group1">
			<legend>Group 1</legend>
		
			<label for="camelCase2">
				<span>Field Name</span>
				<input id="camelCase2" aria-describedby="explaination1">
			</label>
			<p class="explanation" id="explanation1">This is why we want this</p>
		
			<label for="camelCase3">
				<span>Field Name</span>
				<input id="camelCase3">
			</label>
			
			<label for="camelCase4">
				<span>Field Name</span>
				<input id="camelCase4">
			</label>
		</fieldset>
		<div>
			<input class="btn btn-primary" type="submit" value="apply"/>
		</div>
	</form>
	  
  </div>
  <div class="span4">
	  
	  Login form goes here
	  
  </div>
</div>

</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.2.min.js"><\/script>')</script>
<script src="js/scripts.js"></script>

</body></html>