<?php 
$object = new Query();
$resultRow = $object->selectAll("costs");
$objectBart = new Query();
$balanceBart = $objectBart->selectAll("balancebart")[0]['ToBalance'];
$objectJessi = new Query();
$balanceJessi = $objectJessi->selectAll("balancejessi")[0]['ToBalance'];
?>
<div class="container">
	<div class="panel panel-custom">
		<div class="panel-heading">
			<p class="panel-custom-heading">Noch auzugleichen</p>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6">
					<p class="panel-custom-heading">Bart an Jessi</p>
					<p><?php echo $balanceJessi.' €' ?></p>
				</div>
				<div class="col-md-6">
					<p class="panel-custom-heading">Jessi an Bart</p>
					<p><?php echo $balanceBart.' €' ?></p>
				</div>				
			</div>
		</div>
		<div class="panel-footer" style="background-color: #777">
			<p class="panel-custom-heading">Verrechnet</p>
			<?php if($balanceBart >
			 $balanceJessi) echo "<p>Jessi an Bart: ".($balanceBart - $balanceJessi).' €</p>' ?>
			<?php if($balanceJessi >
			 $balanceBart) echo "<p>Jessi an Bart: ".($balanceJessi - $balanceBart).' €</p>' ?>
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
			<tr id="row<?= $value['ID'] ?>">
				<td><?= $value['Name'] ?></td>
				<td style="text-align: right"><?= $value['Currency'] == 'USD' ? '~ '.number_format($value['Sum']*(0.87),2).' €' : $value['Sum'].' €' ?></td>
				<td><?= $value['ShareBart']*(100).' / '.$value['ShareJessi']*(100)?></td>
				<td style="text-align: right"><?= $value['Currency'] == 'USD' ? number_format($value['Sum']*(0.87)*$value['ShareBart'],2).' €' : $share_1 =  number_format($value['Sum']*$value['ShareBart'],2).' €' ?></td>
				<td style="text-align: right"><?= $value['Currency'] == 'USD' ? number_format($value['Sum']*(0.87)*$value['ShareJessi'],2).' €' : $share_1 =  number_format($value['Sum']*$value['ShareJessi'],2).' €' ?></td>
				<td><?= $value['PaidBy'] ?></td>
				<td><?= $value['Balanced'] == '1' ? $value['BalancedDate'].' <span class="glyphicon glyphicon-ok"></span>' : 'Noch nicht <span class="glyphicon glyphicon-remove"></span>' ?></td>
				<td>
					<button id="deleteBtn<?= $value['ID'] ?>" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span></button>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

