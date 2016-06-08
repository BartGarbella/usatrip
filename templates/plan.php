<?php 

$days_object = new Query();
$days = $days_object->select("calendar",null);
$content_object = new Query();
$day_content = $content_object->select("days",null);

// echo "<pre>";
// var_dump($days);
// echo "</pre>";
// echo "<pre>";
// var_dump($day_content);
// echo "</pre>";
foreach($days as &$val1){
	foreach($day_content as $key  => $value){
		if($val1['id'] == $value['id_day']) {
			$val1['content'][] = $value;
		}
	}
}




// echo "<pre>";
// var_dump($days);
// echo "</pre>";


foreach ($days as $day => $date) {
	if(array_key_exists('content', $date)) {
		foreach ($date['content'] as $value) {
			echo "<pre>";
			var_dump($value["desc"]);
			echo "</pre>";
		}
	}
	// foreach ($date as $key => $value) {
	// 	echo "<pre>";
	// 	var_dump($key);
	// 	echo "</pre>";

	// }

}

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
						<?php if(array_key_exists('content', $date)) {
							foreach ($date['content'] as $value) {
								echo ($value["desc"].'<br>');
							}
						} ?>
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



