<!DOCTYPE html>
<html>
<head>
	<title>DevOps - EXPERT ~ PONSET ~ BRAMONTE</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="icon" href="favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" type="text/css" id="theme" href=""/>
	<script src="https://use.fontawesome.com/ccf55cb418.js"></script>

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
	<form action="pay.php" method="post">
		<fieldset> <legend>Bank Card Informations</legend>
<div class="row">
			<label class="col-md-2">Card number</label>
			<input type="text" name="cardNumber" maxlength="16" class="col-md-2">
</div>
<div class="row">
			<label class="col-md-2">End date</label>
			<input type="text" name="endDate" id="datepicker" class="col-md-2" readonly>
			
</div>
<div class="row">
			<label class="col-md-2">CVV</label>
			<input type="text" name="cvv" maxlength="3" class="col-md-2">
</div>
<div class="row">
			<button type="submit" class="btn btn-primary col-md-2">Send</button>
			<button type="reset" class="btn btn-danger col-md-2">Reset</button>
</div>
		</fieldset>
	</form>
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