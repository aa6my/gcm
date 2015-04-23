$(document).ready(function(){
          
    $('#newContractSel').change(function(){
        var selsalestaff = $('#saletaff');
        var selsvcstaff = $('#svcstaff');
        
        selsalestaff.empty();
        selsvcstaff.empty();
            
        selsalestaff.append($("<option />").val('').text('--Select One--'));
        selsvcstaff.append($("<option />").val('').text('--Select One--'));
            
        if($(this).val() != "")
        {
            showLoading();
            selsalestaff.prop('disabled', false);
            selsvcstaff.prop('disabled', false);
            
            $.ajax({
               url: 'pages/ajax/ajaxDBcontroller.php',
               type: 'post',
               data: {'action':'GetStaff', 'id':$(this).val(), 'order':'1'},
               success: function(json){
                   $.each(json,function(i, item){
                       if(typeof item == 'object'){
                           selsalestaff.append($("<option />").val(item.adminId).text(item.theStaff));
                           selsvcstaff.append($("<option />").val(item.adminId).text(item.theStaff));
                       }
                   }) //end $.each() loop
                   closeLoading();
                },
                error: function(xhr, desc, err) {
                    console.log(xhr);
                    console.log("Details: " + desc + "\nError:" + err);
                }
            });
        }
        else
        {
            selsalestaff.prop('disabled', 'disabled');
            selsvcstaff.prop('disabled', 'disabled');
        }
    });
    
    $('#newcontractstartdate').datetimepicker({
            format: 'yyyy-mm-dd',
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            minView: 2,
            forceParse: 0
    });
    

    $('#clientDob').datetimepicker({
            format: 'yyyy-mm-dd',
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            minView: 2,
            forceParse: 0
    });
    
    $(document).on("click", ".deleteContractModal", function () {
        var myContractFileId = $(this).data('id');
        $(".modal-body #hddcontractfileid").val( myContractFileId );
        console.log($(".modal-body #hddcontractfileid").val());
        // As pointed out in comments, 
        // it is superfluous to have to manually call the modal.
        // $('#addBookDialog').modal('show');
    });
    
    //CheckInOut
    if($('#hddvisitstatus').val() == 'Check In')
    {
        if ($("#timetrack").hasClass("btn-success")) {
			$("#timetrack").removeClass("btn-success");
			$("#timetrack").addClass('btn-warning');
		}
		if ($("#timetrack i").hasClass("fa fa-sign-in")) {
			$("#timetrack i").removeClass("fa fa-sign-in");
			$("#timetrack i").addClass('fa fa-sign-out');
		}
		$("#timetrack").addClass('btn-warning');
		$("#timetrack i").addClass('fa fa-sign-out');
		$(".clock-status").html("Check In");
		$("#timetrack span").html("Check Out");
    }
    else
    {
        if ($("#timetrack").hasClass("btn-warning")) {
			$("#timetrack").removeClass("btn-warning");
			$("#timetrack").addClass('btn-success');
		}
		if ($("#timetrack i").hasClass("fa fa-sign-out")) {
			$("#timetrack i").removeClass("fa fa-sign-out");
			$("#timetrack i").addClass('fa fa-sign-in');
		}
		$("#timetrack").addClass('btn-success');
		$("#timetrack i").addClass('fa fa-sign-in');
		$(".clock-status").html("Check Out");
		$("#timetrack span").html("Check In");
    }
});