$(document).ready(function(){

   $('#universalModal form').submit(function (event){
       event.preventDefault();

       var formObj = {};
       var inputs = $(this).serializeArray();
       var url = '';
       $.each(inputs, function(i, input) {
           formObj[input.name] = input.value;
       });
       var len = inputs.length;
       var  dataObj = {};
       for (i=0; i<len; i++) {
                dataObj[inputs[i].name] = inputs[i].value;
        }
            //inputs['lname'];
                    $.post(url, inputs, function(data) {
                   $('#universalModal').modal('hide');

               });

   });

   $('#searchBtn_studentNum').off('click').click(function(){
       var student_num = $('input[name="student_number"]').val();

       $('#universalModal').modal('show');
       $('#universalModal .modal-title').html('<b>Enter Student Info</b>');
       $('#universalModal .modal-body').html($('#searchResultForm').val());
       $('#universalModal .modal-footer button#submitBtn').html('Save and Exit');
   });
});
