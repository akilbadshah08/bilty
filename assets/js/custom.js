$(document).ready( function() {
    $('#saveform').ajaxForm({
        beforeSubmit:function(formData, jqForm, options){
            // if(!$('#co-applicant-form').valid()) {
            //     return false;
            // }
            // mApp.block('#add-co-applicant .modal-content', {});
        },
        success:function(responseText, jqForm, options){
                var data=JSON.parse(responseText);
                if(data.success=="true"){
                    alert("Successfully Submitted");
                    window.location.href=data.url;
                } else{
                    alert(data.msg);
                }
        }
    })
  
})