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




// $days[]['content'] = $day_content[0];

// echo "<pre>";
// var_dump($days);
// echo "</pre>";

$arr1 = array(
	array(
		'id' => 18,
		'name' => 'name1',
		'stuff' => null
		),
	array(
		'id' => 29,
		'name' => 'name2',
		'stuff' => null
		)
	);



$arr2 = array(
	array(
		'id' => 1,
		'text' => 'abc',
		'ref_id' => 18
		),
	array(
		'id' => 2,
		'text' => 'abc',
		'ref_id' => 18
		),
	array(
		'id' => 3,
		'text' => 'abc',
		'ref_id' => 29
		)
	);


foreach($arr1 as &$val1){
	foreach($arr2 as $key  => $value){
		// echo "<pre>";
		// var_dump($val1);
		// echo "</pre>";
		if($val1['id'] == $value['ref_id']) {
			$val1['stuff'][] = $value;
		}
	}
}
echo "<pre>";
var_dump($arr1);
echo "</pre>";
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



