$(document).ready(function() {
    $('#ptSession').removeAttr("required");
    $('#ptCostPerSession').removeAttr("required");
    $('#ptSaleCommPerSession').removeAttr("required");
    $('#ptServiceCommPerSession').removeAttr("required");

    $('#msPeriod').removeAttr("required");
    $('#msCost').removeAttr("required");
    $('#msSaleComm').removeAttr("required");
    $('#msRenewAlert').removeAttr("required");

    /** ******************************
    * Calculate Sale and Service Comm
    ****************************** **/
    $('#ptSaleCommPerSession').blur(function(){
        if($.isNumeric($('#ptSession').val()) && $.isNumeric($('#ptCostPerSession').val()) && $.isNumeric($('#ptSaleCommPerSession').val()))
        {
            var value = $('#ptSession').val() * $('#ptCostPerSession').val() * $('#ptSaleCommPerSession').val() / 100;
            $('#ptsaleComm').html(value.toFixed(2));
            $('#hddptsaleComm').val(value.toFixed(2));
        }
    });
   
    $('#ptServiceCommPerSession').blur(function(){
        if($.isNumeric($('#ptSession').val()) && $.isNumeric($('#ptCostPerSession').val()) && $.isNumeric($('#ptServiceCommPerSession').val()))
        {
            var value = $('#ptSession').val() * $('#ptCostPerSession').val() * $('#ptServiceCommPerSession').val() / 100;
            $('#ptserviceComm').html(value.toFixed(2));
            $('#hddptserviceComm').val(value.toFixed(2));
        }
    });
    
    $('#msSaleComm').blur(function(){
        if($.isNumeric($('#msCost').val()))
        {
            var value = $('#msCost').val() * $('#msSaleComm').val() / 100;
            $('#mssaleComm').html(value.toFixed(2));
            $('#hddmssaleComm').val(value.toFixed(2));
        }
    });
    
      
    if($('#contractType').val() === "1"){
        $('#membershiprow').show();
	$('#ptrow').hide();
    }
    else if($('#contractType').val() === "2"){
        $('#membershiprow').hide();
	$('#ptrow').show();
    }
    else
    {
        $('#membershiprow').hide();
	$('#ptrow').hide();
    }
    /** ******************************
    * MultiSelect
    ****************************** **/
	$('select[multiple]').chosen({no_results_text: "Oops, nothing found!"}); 

	

	$('#contractType').change(function(){

		//reset value
		$('#ptSession').val("");
		$('#ptCostPerSession').val("");
		$('#ptSaleCommPerSession').val("");
		$('#ptServiceCommPerSession').val("");

		$('#msPeriod').val("");
		$('#msCost').val("");
		$('#msSaleComm').val("");
		$('#msRenewAlert').val("");
                
		if($(this).val() == "1")    //Membership
		{
			$('#membershiprow').slideDown();
			$('#ptrow').slideUp();
                        
                        $('#msPeriod').attr('required','');
                        $('#msCost').attr('required','');
                        $('#msSaleComm').attr('required','');
                        $('#msRenewAlert').attr('required','');
                        
		} else if($(this).val() == "2"){    //PT
			$('#ptrow').slideDown();
			$('#membershiprow').slideUp();
                        
                        $('#ptSession').attr('required','');
                        $('#ptCostPerSession').attr('required','');
                        $('#ptSaleCommPerSession').attr('required','');
                        $('#ptServiceCommPerSession').attr('required','');

		} else{
			$('#ptrow').slideUp();
			$('#membershiprow').slideUp();
		}


	})
    /** ******************************
    * Date Picker
    ****************************** **/
    $('#startDate').datetimepicker({
		format: 'yyyy-mm-dd',
		todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		minView: 2,
		forceParse: 0
	});

    $('#dueDate').datetimepicker({
		format: 'yyyy-mm-dd',
		todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		minView: 2,
		forceParse: 0
	});


	$("#addgstmscost").change(function(){
		if(this.checked)
		{
			if($("#msCost").val() != "")
			{
                            var avalue = $("#msCost").val() * 1.07;
                            $("#msCost").val(avalue.toFixed(2));
			}
		}
	});

	
	
	$("#addgstptcost").change(function(){
		if(this.checked)
		{
			if($('#ptCostPerSession').val() != "")
			{
                            var avalue = $('#ptCostPerSession').val() * 1.07;
                            $('#ptCostPerSession').val(avalue.toFixed(2));
			} 
		}
	});
});