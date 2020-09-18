$(document).ready( function() {
    $('#saveform').ajaxForm({
        beforeSubmit:function(formData, jqForm, options){
            // if(!$('#co-applicant-form').valid()) {
            //     return false;
            // }
            // mApp.block('#add-co-applicant .modal-content', {});
        },
        success:function(formData, jqForm, options){
                alert(responseText);
                $('#saveform').resetForm();
        }
    })
      $('.price-change').change(function(){
        var price=0.00;
        $('.price-change').each(function(){
            price=price+parseFloat($(this).val());
        })
        $('.grand_total').val(price);
    })
    $('.weight-change').change(function(){
        var weight=0.00;
        $('.weight-change').each(function(){
            weight=weight+parseFloat($(this).val());
        })
        $('.grand_weight').val(weight);
    })


})