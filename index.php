<!DOCTYPE html>
<html>
<head>
	<title>DevOps - EXPERT ~ PONSET ~ BRAMONTE</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="icon" href="favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" type="text/css" id="theme" href=""/>
	<script src="https://use.fontawesome.com/ccf55cb418.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- START BOOTSRAP -->
		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- END BOOTSRAP -->
</head>
<body class="container">
	<form action="pay.php" method="post" class="form-horizontal">
		<fieldset class="row col-sm-4 col-sm-offset-4"> <legend>Market</legend>
			<div class="form-group">
				<div class="col-sm-9 col-sm-offset-1">
					<select name="market" class="form-control">
							<option value="3000">Fursuit - 3000$</option>
							<option value="5">Strawberries - 5$</option>
							<option value="60">Zelda Breath of the Wild - 60$</option>
							<option value="50">Myre Chronicles of Yria - 50$</option>
							<option value="15">BluRay Zootopia - 15$</option>
					</select>
				</div>
			</div>			
		</fieldset>
	<div class="row">
		<fieldset class="col-sm-6"> <legend>Personnal Informations</legend>
			<div class="form-group">
				<label class="col-sm-4 control-label">First Name</label>
				<div class="col-sm-4">
					<input type="text" name="firstName" maxlength="50" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label">Last Name</label>
				<div class="col-sm-4">
					<input type="text" name="lastName" maxlength="50" class="form-control">
				</div>
			</div>
			
		</fieldset>

		<fieldset class="col-sm-6"> <legend>Bank Card Informations</legend>
			<div class="form-group">
				<label class="col-sm-4 control-label">Card number</label>
				<div class="col-sm-4">
					<input type="text" name="cardNumber" minlength="16" maxlength="16" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label">Expiration date</label>
				<div class="col-sm-4">
					<input type="text" name="expirationDate" id="datepicker" class="form-control" readonly>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label">CVV</label>
				<div class="col-sm-2">
					<input type="text" name="cvv" minlength="3" maxlength="3" class="form-control">
				</div>
			</div>
		</fieldset>
		<button type="submit" class="btn btn-primary col-sm-2 col-sm-offset-4">Send</button>
		<button type="reset" class="btn btn-danger col-sm-2">Reset</button>
	</div>
	</form>

<hr>

	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Card number</th>
				<th>Expiration date</th>
				<th>CVV</th>
				<th>Money</th>
			</tr>
		</thead>
		<?php 
			include 'getUser.php';
			echo '<tbody>';
				foreach ($users as $user) {
					echo(
						'<tr>
							<td>'.$user['id'].'</td>
							<td>'.$user['firstName'].'</td>
							<td>'.$user['lastName'].'</td>
							<td>'.$user['cardNumber'].'</td>
							<td>'.$user['expirationDate'].'</td>
							<td>'.$user['cvv'].'</td>
							<td>'.$user['accountMoney'].' $</td>
						</tr>'
					);
				} 
		?>
		</tbody>
	</table>
</body>
</html>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- MONTH/YEAR PICKER -->
<script>
	$(function() {
	     $('#datepicker').datepicker(
            {
                dateFormat: "mm/yy",
                changeMonth: true,
                changeYear: true,
                showButtonPanel: true,
                onClose: function(dateText, inst) {


                    function isDonePressed(){
                        return ($('#ui-datepicker-div').html().indexOf('ui-datepicker-close ui-state-default ui-priority-primary ui-corner-all ui-state-hover') > -1);
                    }

                    if (isDonePressed()){
                        var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                        var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                        $(this).datepicker('setDate', new Date(year, month, 1)).trigger('change');
                        
                         $('.date-picker').focusout()//Added to remove focus from datepicker input box on selecting date
                    }
                },
                beforeShow : function(input, inst) {

                    inst.dpDiv.addClass('month_year_datepicker')

                    if ((datestr = $(this).val()).length > 0) {
                        year = datestr.substring(datestr.length-4, datestr.length);
                        month = datestr.substring(0, 2);
                        $(this).datepicker('option', 'defaultDate', new Date(year, month-1, 1));
                        $(this).datepicker('setDate', new Date(year, month-1, 1));
                        $(".ui-datepicker-calendar").hide();
                    }
                }
            })
	});
</script>
<style>
.ui-datepicker-calendar {
    display: none;
    }
</style>
<!-- END MONTH/YEAR PICKER -->