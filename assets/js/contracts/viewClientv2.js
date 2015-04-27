$(document).ready(function(){
     $(document).on('click','#cloneButton', function(){

          var cloneContentLength = $('#cloneParent').find('.cloneContent').length;

         
          if(cloneContentLength>1){
            //pick();
            var new_i_val = (cloneContentLength + 1);
            $('.cloneContent').last().clone(true).insertAfter($('.cloneContent').last());
            // $('.cloneContent').last().find('div').first().attr('data-increment', new_i_val).end().find('span').first().text('Route '+ new_i_val);
             $('.cloneContent').last().find('.form-group').filter('.picker').find('input').attr('id','d'+new_i_val);
             //pick();


          }
          else{
           
            var new_i_val = (cloneContentLength + 1);
            $('.cloneContent').clone(true).insertAfter($('.cloneContent').last());
           // $('.cloneContent').last().find('div').first().attr('data-increment', new_i_val).end().find('span').first().text('Route '+ new_i_val);
           // $('.cloneContent').last().find('.form-group').filter('.picker').find('input').attr('id','d'+new_i_val);
            $('<br/><input type="button" class="btn btn-danger btn-sm cloneDeleteButton" value="Remove"/>').insertAfter($('.cloneContent').last().find('.row').last());
           // pick();

          }

        });

        
           
    $('#cloneParent').on('click', '.cloneDeleteButton', function(){
        $(this).closest('.cloneContent').remove();
      });



    $('#cloneParent').on('change','.newContractSel',function(){
        var target = $(this).parents('.cloneContent').find('.myDestination select');
        var myUrl = $(this)[0].getAttribute('data-myUrl');
        
        target.empty();
            
        target.append($("<option />").val('').text('--Select One--'));
            
        if($(this).val() != "")
        {
            
           target.prop('disabled', false);
            
            $.ajax({
               url: myUrl,
               type: 'post',
               data: {'action':'GetStaff', 'id':$(this).val(), 'order':'1'},
               success: function(json){

                var j = $.parseJSON(json);
                   $.each(j,function(i, item){
                    
                      if(typeof item == 'object'){
                           target.append($("<option />").val(item.adminId).text(item.adminFirstName + " " + item.adminLastName));
                      }
                   }) 
                 
                },
                error: function(xhr, desc, err) {
                    console.log(xhr);
                    console.log("Details: " + desc + "\nError:" + err);
                }
            });
        }
        else
        {
            target.prop('disabled', 'disabled');
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