<?php 
$object = new Query();

$resultRow = $object->selectAll("costs");
?>
<div class="container">
	<div class="panel panel-custom">
		<div class="panel-heading">
			Noch zu Ausgleichen
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6">
					<p>Bart an Jessi</p>
				</div>
				<div class="col-md-6">
					<p>Jessi an Bart</p>
				</div>				
			</div>
		</div>
	</div>
	
</div>

<div class="container">
	<table class="table table-hover">
		<thead>
			<tr>
				<td>
					<span>Posten</span>
				</td>
				<td>
					<span>Preis</span>
				</td>
				<td>
					<span>Anteil</span>
				</td>
				<td>
					<span>Bart</span>
				</td>
				<td>
					<span>Jessi</span>
				</td>
				<td>
					<span>Vorkasse</span>
				</td>
				<td>
					<span>Ausgleich am</span>
				</td>
			</tr>
		</thead>
		<tbody>
		<!-- TO DO: FOREACH LOOP -->
			<?php foreach ($resultRow as $key => $value) { ?>
			<tr>
				<td><?= $value['Name'] ?></td>
				<td><?= $value['Currency'] == 'USD' ? '~ '.number_format($value['Sum']*(0.87),2).' €' : $value['Sum'].' €' ?></td>
				<td><?= $value['Share'] ?></td>
				<td><!--  --></td>
				<td><!--  --></td>
				<td><?= $value['PaidBy'] ?></td>
				<td><?= $value['Balanced'] == '1' ? $value['BalancedDate'].' <span class="glyphicon glyphicon-ok"></span>' : 'Noch nicht <span class="glyphicon glyphicon-remove"></span>' ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
