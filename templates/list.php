<?php 
$object = new Query();
$resultRow = $object->selectAll("costs");
$object2 = new Query();
$balanceBart = $object2->selectAll("balance");
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
					<p></p>
				</div>
				<div class="col-md-6">
					<p>Jessi an Bart</p>
					<p><?php var_dump($balanceBart)?></p>
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
				<td style="text-align: right">
					<span>Preis</span>
				</td>
				<td>
					<span>Anteil</span>
				</td>
				<td style="text-align: right">
					<span>Bart</span>
				</td>
				<td style="text-align: right">
					<span>Jessi</span>
				</td>
				<td>
					<span>Vorkasse</span>
				</td>
				<td>
					<span>Ausgleich am</span>
				</td>
				<td>
					<span class="glyphicon glyphicon-wrench"></span>
				</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($resultRow as $key => $value) { ?>
			<tr>
				<td><?= $value['Name'] ?></td>
				<td style="text-align: right"><?= $value['Currency'] == 'USD' ? '~ '.number_format($value['Sum']*(0.87),2).' €' : $value['Sum'].' €' ?></td>
				<td><?= $value['Share']*(100).' %'?></td>
				<td style="text-align: right"><?= $value['Currency'] == 'USD' ? number_format($value['Sum']*(0.87),2)*explode("/", $value['Share'])[0].' €' : $share_1 =  $value['Sum']*$value['Share'].' €' ?></td>
				<td style="text-align: right"><?= $value['Sum'] - $share_1 ?></td>
				<td><?= $value['PaidBy'] ?></td>
				<td><?= $value['Balanced'] == '1' ? $value['BalancedDate'].' <span class="glyphicon glyphicon-ok"></span>' : 'Noch nicht <span class="glyphicon glyphicon-remove"></span>' ?></td>
				<td>
					
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

