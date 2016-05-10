<div class="container container-create">
	<form id="createform" class="" accept-charset="utf-8">
		<div class="form-group form-line">

			<label for="InputName">Titel/ Posten</label>


			<input type="text" class="form-control" name="Name" id="InputName" required placeholder="Titel/ Posten">

		</div>
		<div class="form-group form-line">

			<label for="InputSum">Kosten</label>

			<input type="text" class="form-control" name="Sum" id="InputSum" required placeholder="Format: 0.00">

		</div>
		<div class="form-group">
			<label for="InputPaidBy">Währung</label>
			<select class="form-control" name="PaidBy">
				<option value="USD">U.S. Dollar $</option>
				<option value="EUR">Euro €</option>
			</select>
		</div>
		<div class="form-group form-line">
			<label for="InputSum">Anteil - Bart / Jessi</label>
			<div class="row">
				<div class="col-xs-6">
					<input type="text" class="form-control" name="ShareBart" min="0" max="100" id="InputShareBart" required value="50">
				</div>
				<div class="col-xs-6">
					<input type="text" class="form-control" name="ShareJessi" id="InputShareJessi" readonly  placeholder="" value="50">					
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="InputPaidBy">Wer bezahlt?</label>
			<select class="form-control" name="PaidBy">
				<option value="Bart">Bart</option>
				<option value="Jessi">Jessi</option>
			</select>
		</div>
		<input type="hidden"></input>
	</form>
	<button id="createbtn" class="btn btn-default">Speichern</button>	
</div>

<script>
	$('#InputShareBart').on('input change',function(){
		$('#InputShareJessi').val(100 - $('#InputShareBart').val())
		if(parseInt($("#InputShareBart").val()) > 100) {
			$("#InputShareBart").val("100");
			$("#InputShareJessi").val("0");
		}
	})

	$('input, select').on("focus",function(){
		$(this).parent().addClass('labelcolor');
		$('.navbar-toggle').addClass('collapsed');
		$('.navbar-toggle').attr('aria-expanded','false');
		$('#bs-example-navbar-collapse-1').attr('aria-expanded','false');
		$('#bs-example-navbar-collapse-1').removeClass('in');
	})
	$('input, select').on("focusout",function(){
		$(this).parent().removeClass('labelcolor');
	})


	$('#createbtn').click(function(){

		var _ShareBart = $('#InputShareBart').val();
		var _ShareJessi = $('#InputShareJessi').val();
		
		$('#InputShareBart').val(_ShareBart/100);
		$('#InputShareJessi').val(_ShareJessi/100);
		
		var _type = 'submit';
		var _payload = $('#createform').serialize();
		load(_type,_payload);
		load("render","list");
	})


</script>