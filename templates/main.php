<?php 
session_start();

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
			<a class="navbar-brand" href="#">Brand</a>
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

<script type="text/javascript">

	$(document).ready(function(){
		$('#listLi').addClass('active');
		load('render','list');
	})

	$('.navbutton').click(function render() {
		$('.navbutton').parent().removeClass('active');
		$(this).parent().addClass('active');
		var file = $(this).attr('value');
		var type = 'render';
		load(type,file);
	});




	function load(type,payload) {
		var dataObject = {};
		dataObject[type] = payload;



		$.ajax({
			type: "POST",
			data: dataObject,
			url: "./include/load.php",
			success: function(data) {
				result=data;
				$('#content').html(result);
			}
		}); 
	}

	function load2(type,payload) {
		var dataObject = {};
		dataObject[type] = payload;

		console.log(dataObject);
	}

</script>

</html>