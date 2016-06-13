<?php 
session_start();
require('../management/functions/session.php');

$requiredFiles = array(
	'src/js/jquery-1.12.3.min.js',
	'src/js/bootstrap.min.js',
	'src/css/bootstrap.css',
	'src/css/style.css'
	);


$registeredFiles = new Files();
// echo hash("sha256","test");
?>


<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">
	<meta name=viewport content="width=device-width, initial-scale=1">
	<title>Backend</title>
	<?= $registeredFiles->registerFiles($requiredFiles); ?>
</head>
<body>

<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/backend">Backend</span></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li id="planLi"><a class="navbutton" value="plan">Reiseplanung</a></li>
				<li id="listLi"><a class="navbutton" value="list">Liste</a></li>
				<li><a class="navbutton" value="create">Erstellen</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			<?php if(isset($_SESSION['loggedin'])) { ?>
        		<li><a href="/management/functions/logout.php">Logout</a></li>
        	<?php } ?>
      		</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>

<!-- All dynamic content is being displayed in #content -->
<div id="content"></div>


</body>

<script type="text/javascript" src="src/js/functions.js" charset="utf-8"></script>



</html>