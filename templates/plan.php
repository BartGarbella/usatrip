<?php 

$object = new Query();
$days = $object->selectAll("calendar");

// var_dump($days);
// exit;

?>

<div class="container">
	<div class="row seven-cols">
		<?php foreach ($days as $day => $date) { ?>
        <div class="col-md-1 col-calendar">
	        <div class="panel panel-calendar">
	        	<div class="panel-heading">
	        		<span><?= $date['day'].','.$date['date'] ?></span>
	        	</div>
	        	<div class="panel-body">
	        		body
	        	</div>
	        	<div class="panel-footer">
	        		<div class="btn-group">
		        		<button type="">+</button>
	        		</div>
	        	</div>
	        </div>
        </div>
        <?php } ?>
      </div>
</div>