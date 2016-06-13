<?php 

$days_object = new Query();
$days = $days_object->select("calendar",null);
$content_object = new Query();
$day_content = $content_object->select("days",null);


foreach($days as &$val1){
	foreach($day_content as $key  => $value){
		if($val1['id'] == $value['id_day']) {
			$val1['content'][] = $value;
		}
	}
}



// foreach ($days as $day => $date) {
// 	if(array_key_exists('content', $date)) {
// 		foreach ($date['content'] as $value) {
// 			echo "<pre>";
// 			var_dump($value["desc"]);
// 			echo "</pre>";
// 		}
// 	}


// }

?>

<div class="container">
	<div class="row seven-cols">
		<?php foreach ($days as $day => $date) { ?>
			<div class="col-md-1 col-calendar">
				<div class="panel panel-calendar">
					<div class="panel-heading">
						<h4><?= $date['day'].', '.$date['date'] ?></h4>
					</div>
					<div class="panel-body">
						<?php if(array_key_exists('content', $date)) {
							foreach ($date['content'] as $value) { ?>
								<p class="day-element" id="element-<?= $value['id'] ?>"><?= $value['title'].', '.$value['time'] ?></p>
						<?php }
						} ?>
					</div>
					<div class="panel-footer">
						<span id="<?= $date['id'] ?>" class="glyphicon glyphicon-plus add-element"></span>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>

<script type="text/javascript" src="src/js/functions_plan.js" charset="utf-8"></script>

